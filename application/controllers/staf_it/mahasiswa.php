<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mahasiswa extends CI_Controller {
	
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
	
	public function index($page = 0)
	{
		$this->load->library('pagination');
		
		$this->form_validation->set_rules('key', 'search', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$config['base_url'] = base_url() . 'staf_it/mahasiswa/index/';
			$config['total_rows'] = count($this->mahasiswa_model->all());
			$config['per_page'] = 10;
			$config['uri_segment'] = 4;
			$config['num_links'] = 4 ;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			
			$config['first_link'] = '&laquo; First';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last &raquo;';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Next &rarr;';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			
			$config['prev_link'] = '&larr; Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="">';
			$config['cur_tag_close'] = '</a></li>';
			
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			
			$data['halaman'] = $this->pagination->create_links();
			
			$data['data_lengkap'] = $this->mahasiswa_model->pagingmember($config['per_page'],$page);

			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/mahasiswa/member_view', $data);
			$this->load->view('global_staf_it/foot_staf_it');
		}else{
			$key = $this->mahasiswa_model->searchmember();
			$data['list'] = $key;
			// echo json_encode($key);exit();
			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/mahasiswa/membersearch_view',$data);
			$this->load->view('global_staf_it/foot_staf_it');
		}
	}

	public function add()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
		$this->form_validation->set_rules('semester', 'semester', 'trim|xss_clean');
		$this->form_validation->set_rules('id_matakuliah', 'mata kuliah', 'trim|xss_clean');
		$this->form_validation->set_rules('id_jurusan', ' jurusan', 'trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE) {

			$data['groups1'] = $this->matakuliah_model->all();
			$data['groups2'] = $this->jurusan_model->all();

			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/mahasiswa/tambah_manual', $data);
			$this->load->view('global_staf_it/foot_staf_it');
		
		} else {

			$nama= $this->input->post('nama');
			$email= $this->input->post('email');
			$semester= $this->input->post('semester');
			$id_matakuliah= $this->input->post('id_matakuliah');
			$id_jurusan = $this->input->post('id_jurusan');
			$password= $this->input->post('password');
			$matakuliah = $this->matakuliah_model->select_name($id_matakuliah)->nama_matakuliah;
			$jurusan = $this->jurusan_model->select_name($id_jurusan)->nama_jurusan;
			$sks = $this->matakuliah_model->select_name($id_matakuliah)->sks;

					$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
			
					$data = array(
						'nama' => $nama,
						'email' => $email,
						'semester' => $semester,
						'id_matakuliah' => $id_matakuliah,
						'id_jurusan' => $id_jurusan,
						'created_at' => $date->format('Y-m-d H:i:s'),
						'is_delete' => 0
						);

					$this->session->set_userdata($data);
			
					if ($this->mahasiswa_model->add($data)) {

						$this->session->set_flashdata('message', 'Terimakasih, Registrasi Mahasiswa ' . $nama . ' Berhasil.');

						redirect(base_url('staf_it/mahasiswa/add'));
					} else {

						$this->session->set_flashdata('warning', 'Maaf, Anda Belum Bisa Regristrasi Mohon Isi Data Dengan Benar');

						redirect(base_url('staf_it/mahasiswa/add'));
					}
			}
		
	}
	
	

	public function delete($id_member)
	{
		$delete_member = $this->mahasiswa_model->find($id_member);
		
		if ($delete_member) {
			$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
			$data = array(
				'deleted_at' => $date->format('Y-m-d H:i:s'),
				'is_delete' => 1,
				);

			if ($this->mahasiswa_model->delete($id_member, $data)) {

				$this->session->set_flashdata('message', 'data ' . $delete_member->nama . ' berhasil di hapus');
				
				redirect(base_url('staf_it/mahasiswa'));
			} else {

				$this->session->set_flashdata('message', 'data gagal di hapus');

				redirect(base_url('staf_it/mahasiswa/delete'));
			}

		} else {

			redirect(base_url('staf_it/mahasiswa'));
		}
	}

	
	
}