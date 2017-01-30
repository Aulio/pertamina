<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('SESS_IT_IS_LOGIN') || ($this->session->userdata('SESS_IT_IS_LOGIN') && $this->session->userdata('SESS_IT_USER_PRIV') !== 3)) 
		{
		
			redirect(base_url('staf_it/login'));
			
		}
			$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
			$this->output->set_header('Pragma: no-cache');
			
			$this->load->model('member_model');
			$this->load->model('mahasiswa_model');
			$this->load->model('matakuliah_model');
			$this->load->model('jurusan_model');
			
	}

	public function index()
	{
		$this->load->view('global_staf_it/head_staf_it');
		$this->load->view('staf_it/staf_it_home_view');
		$this->load->view('global_staf_it/foot_staf_it');

	}

	public function logout($id_member)
	{
		$data['list'] = $this->member_model->find($id_member);
		
		$this->load->view('staf_it/logout_modal', $data);
	}

	public function logout_konfirm($id_member)
	{
		$data['list'] = $this->member_model->find($id_member);
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

		if ($data['list']) {			

				$data = array(
						'last_login' => $date->format('Y-m-d H:i:s')					
				);

			if ($this->member_model->last_login($id_member, $data)) {

				$this->session->sess_destroy();

				redirect(base_url('staf_it/login'));

			} else {

				$this->session->set_flashdata('message', 'Anda gagal logout');
				
				redirect(base_url('staf_it/home'));
			}
		} else {
			
			redirect(base_url('staf_it/home'));
		}

	}

}
