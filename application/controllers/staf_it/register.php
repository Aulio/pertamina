<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

			if ($this->session->userdata('SESS_IT_IS_LOGIN') || ($this->session->userdata('SESS_IT_IS_LOGIN') && $this->session->userdata('SESS_IT_USER_PRIV') === 2)) 
		{
			redirect(base_url('staf_it/home'));
		}
		
		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		
		$this->load->model('login_model');
		$this->load->model('member_model');
		
	}

	public function index()
	{

		$this->form_validation->set_rules('nip', 'NIP', 'trim|xss_clean');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|xss_clean');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|xss_clean');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
		$this->form_validation->set_rules('hak_ases', ' Hak akses', 'trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE) {

			$this->load->view('staf_it/register_view');
		
		} else {

			$nip= $this->input->post('nip');
			$nama= $this->input->post('nama');
			$jabatan= $this->input->post('jabatan');
			$alamat= $this->input->post('alamat');
			$telepon= $this->input->post('telepon');
			$username = $this->input->post('username');
			$password= $this->input->post('password');

			$polanip = "/^.{10,}$/";
			$polausername = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
			$polapassword ="/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,}$/";
			$polatelepon ="/^.{6,}$/";
			
			if($this->member_model->member_konflik($username) > 0 || $this->member_model->telepon_konflik($telepon) > 0  || !preg_match($polanip, $this->input->post('nip')) || !preg_match($polapassword, $this->input->post('password')) || !preg_match($polausername, $this->input->post('username')) || !preg_match($polatelepon, $this->input->post('telepon'))){
				if (!preg_match($polanip, $this->input->post('nip'))) {
					$this->session->set_flashdata('nip', 'Nip minimal terdiri dari 10 karakter');
				}
				if (!preg_match($polapassword, $this->input->post('password'))) {
					$this->session->set_flashdata('password', 'Password minimal 5 digit dan terdiri dari huruf, angka serta beberapa karakter "!@#$%"');
				}
				if (!preg_match($polausername, $this->input->post('username'))) {
					$this->session->set_flashdata('username_konfirm', 'Email Tidak Valid');
				}
				
				if ($this->member_model->member_konflik($username) > 0) {
					$this->session->set_flashdata('username', 'Email telah terdaftar sebelumnya');
				}
				if (!preg_match($polatelepon, $this->input->post('telepon'))) {
					$this->session->set_flashdata('telepon', 'Nomor telepon minimal terdiri dari 6 karakter');
				}
				if ($this->member_model->telepon_konflik($telepon) > 0) {
					$this->session->set_flashdata('telepon_konfirm', 'Nomor Telepon tersebut sudah digunakan');
				}
				
				$this->session->set_flashdata('NI',$this->input->post('nip'));
				$this->session->set_flashdata('NAM',$this->input->post('nama'));
				$this->session->set_flashdata('JABATA',$this->input->post('jabatan'));
				$this->session->set_flashdata('ALAMA',$this->input->post('alamat'));
				$this->session->set_flashdata('TELEPO',$this->input->post('telepon'));
				$this->session->set_flashdata('USERNAM',$this->input->post('username'));
				$this->session->set_flashdata('PASSWOR',$this->input->post('password'));

				redirect(base_url('staf_it/register'));

			}else {
					$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

					$data = array(
						'nip' => $nip,
						'nama' => $nama,
						'jabatan' => $jabatan,
						'alamat' => $alamat,
						'telepon' => $telepon,
						'username' => $username,
						'password' => $password,
						'hak_akses' => 3,
						'is_active' => 1,
						'created_at' => $date->format('Y-m-d H:i:s'),
						'is_delete' => 0
						);
				
					$this->session->set_userdata($data);
			
					if ($this->member_model->add($data)) {
						$this->session->set_flashdata('indikator_register', 'true');
						$this->session->set_flashdata('message', 'Terimakasih, Registrasi Member Berhasil, silahkan login');

						redirect(base_url('staf_it/register'));
					} else {

						$this->session->set_flashdata('warning', 'Maaf, Anda Belum Bisa Regristrasi Mohon Isi Data Dengan Benar');

						redirect(base_url('staf_it/register'));
					}
			}
		}
	}

	
}
