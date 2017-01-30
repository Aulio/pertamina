<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('SESS_IT_IS_LOGIN') && $this->session->userdata('SESS_IT_USER_PRIV') === 3) {
			redirect(base_url('staf_it/home'));
		}
		
		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');

		$this->load->model('login_model');

		$this->load->library('Userauth');
		
	}


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


		


		if ($this->form_validation->run() === FALSE) {
			
			$this->load->view('staf_it/login_view');
			
		} else {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$salt = $this->get_id($username);
			
			
			if ($salt) {
				$hash_password = $this->get_hash_password($salt, $password);

			}else{
				$hash_password = 0;
			}

			if ($this->login_model->cek_user($username) > 0) {
				$data = array(
					'username' => $this->input->post('username'),
					'password'	 => $hash_password,
					'hak_akses'	 => 3
				);
						
				$user = $this->login_model->select_user($data);

				if (count($user) > 0) {
				
						if ($user->is_active == 1) {


							$session = array(
								'SESS_IT_ID_USER' => $user->id_user,
								'SESS_IT_USER_NAME' => $user->username,
								'SESS_IT_NAMA_USER' => $user->nama,
								'SESS_IT_PICTURE_USER' => $user->picture,
								'SESS_IT_USER_PRIV' => 3,
								'SESS_IT_IS_LOGIN' => TRUE
							);
						
							$this->session->set_userdata( $session );

							redirect('staf_it/home');
						
					}else {
						$this->session->set_flashdata('username',$this->input->post('username'));
						
						$this->session->set_flashdata('message', 'Akun anda belum aktif, segera hubungi staf it.');
											
						redirect('staf_it/login');

					}
				} else {
					$this->session->set_flashdata('username',$this->input->post('username'));
						
					$this->session->set_flashdata('message', 'Username atau Password anda salah');
										
					redirect('staf_it/login');
				}
			
			}else {
					$this->session->set_flashdata('username',$this->input->post('username'));
						
					$this->session->set_flashdata('message', 'Username atau Password anda tidak terdaftar');
					
					redirect('staf_it/login');
				}
		}

	}

	public function get_id($username)
	{
		$salt = $this->login_model->get_id($username);
		return $salt;
		if ($salt) {
			return $salt;
		}else{
			return false;
		}
	}

	public function get_hash_password($salt, $password)
	{
		$hash_password = md5($salt.$password);
		return $hash_password;
	}

	

	// public function tes()
	// {
	// 	$id = '1';
	// 	$username = 'staf it';
	// 	$password = 'it';
	// 	$cek = $this->get_id($username);
	// 	$hash = $this->get_hash_password($cek, $password);
	// 	echo json_encode($hash);
	// 	exit();
	// }
}

