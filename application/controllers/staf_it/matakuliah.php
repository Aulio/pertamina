<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class matakuliah extends CI_Controller {
	
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
			$data['list'] = $this->matakuliah_model->all();

			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/matakuliah/matakuliah_view',$data);
			$this->load->view('global_staf_it/foot_staf_it');
	}

	public function add()
	{

		$this->form_validation->set_rules('nama_matakuliah', 'Nama Matakuliah', 'trim|xss_clean');
		$this->form_validation->set_rules('sks', 'SKS', 'trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE) {
			
			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/matakuliah/tambah_matakuliah');
			$this->load->view('global_staf_it/foot_staf_it');
		
		} else {

			$nama_matakuliah= $this->input->post('nama_matakuliah');
			$sks= $this->input->post('sks');
			

					$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
			
					$data = array(
						'nama_matakuliah' => $nama_matakuliah,
						'sks' => $sks,
						'created_at' => $date->format('Y-m-d H:i:s'),
						'is_delete' => 0
						);

					$this->session->set_userdata($data);
			
					if ($this->matakuliah_model->add($data)) {

						$this->session->set_flashdata('message', 'Tambah data matakuliah berhasil.');

						redirect(base_url('staf_it/matakuliah'));
					} else {

						$this->session->set_flashdata('warning', 'Maaf, Anda Belum Bisa Tambah Data Matakuliah');

						redirect(base_url('staf_it/matakuliah/add'));
					}
			}
		
	}
	
	

	public function delete($id_matakuliah)
	{
		$delete_matakuliah = $this->matakuliah_model->find($id_matakuliah);
		
		if ($delete_matakuliah) {
			$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
			$data = array(
				'deleted_at' => $date->format('Y-m-d H:i:s'),
				'is_delete' => 1,
				);

			if ($this->matakuliah_model->delete($id_matakuliah, $data)) {

				$this->session->set_flashdata('message', 'data ' . $delete_matakuliah->nama_matakuliah . ' berhasil di hapus');
				
				redirect(base_url('staf_it/matakuliah'));
			} else {

				$this->session->set_flashdata('message', 'data gagal di hapus');

				redirect(base_url('staf_it/matakuliah/delete'));
			}

		} else {

			redirect(base_url('staf_it/matakuliah'));
		}
	}

	
	
}