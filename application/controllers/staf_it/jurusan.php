<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class jurusan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('SESS_IT_IS_LOGIN') && $this->session->userdata('SESS_IT_USER_PRIV') !==3)
		{
			redirect(base_url('staf_it/login'));
		}

			$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
			$this->output->set_header('Pragma: no-cache');
			
			$this->load->model('login_model');
			$this->load->model('member_model');
			$this->load->model('mahasiswa_model');
			$this->load->model('jurusan_model');
			$this->load->model('matakuliah_model');
			
	}
	
	public function index()
	{
			$data['list'] = $this->jurusan_model->all();

			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/jurusan/jurusan_view',$data);
			$this->load->view('global_staf_it/foot_staf_it');
	}

	public function add()
	{

		$this->form_validation->set_rules('nama_jurusan', 'Nama jurusan', 'trim|xss_clean');
		$this->form_validation->set_rules('sks', 'SKS', 'trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE) {
			
			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/jurusan/tambah_jurusan');
			$this->load->view('global_staf_it/foot_staf_it');
		
		} else {

			$nama_jurusan= $this->input->post('nama_jurusan');
			$sks= $this->input->post('sks');
			

					$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
			
					$data = array(
						'nama_jurusan' => $nama_jurusan,
						'created_at' => $date->format('Y-m-d H:i:s'),
						'is_delete' => 0
						);

					$this->session->set_userdata($data);
			
					if ($this->jurusan_model->add($data)) {

						$this->session->set_flashdata('message', 'Tambah data jurusan berhasil.');

						redirect(base_url('staf_it/jurusan'));
					} else {

						$this->session->set_flashdata('warning', 'Maaf, Anda Belum Bisa Tambah Data jurusan');

						redirect(base_url('staf_it/jurusan/add'));
					}
			}
		
	}
	
	

	public function delete($id_jurusan)
	{
		$delete_jurusan = $this->jurusan_model->find($id_jurusan);
		
		if ($delete_jurusan) {
			$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
			$data = array(
				'deleted_at' => $date->format('Y-m-d H:i:s'),
				'is_delete' => 1,
				);

			if ($this->jurusan_model->delete($id_jurusan, $data)) {

				$this->session->set_flashdata('message', 'data ' . $delete_jurusan->nama_jurusan . ' berhasil di hapus');
				
				redirect(base_url('staf_it/jurusan'));
			} else {

				$this->session->set_flashdata('message', 'data gagal di hapus');

				redirect(base_url('staf_it/jurusan/delete'));
			}

		} else {

			redirect(base_url('staf_it/jurusan'));
		}
	}

	
	
}