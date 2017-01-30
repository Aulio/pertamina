<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

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
		$this->load->model('mahasiswa_model');
		$this->load->model('matakuliah_model');

		
	}

	public function index()
	{

			$data['profile_stafit'] = $this->login_model->find_stafit($id_user);

			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/updateProfile_form', $data);
			$this->load->view('global_staf_it/foot_staf_it');
	}
	

	public function update($id_user)
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|xss_clean');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|xss_clean');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|xss_clean');

		if ( $this->form_validation->run() === FALSE ) {
			
			$username = $this->session->userdata('SESS_IT_USER_NAME');
			
			$data['list'] = $this->login_model->find_stafit($id_user);

			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/updateProfile_form', $data);
			$this->load->view('global_staf_it/foot_staf_it');

		} else {

				$id = $this->session->userdata('SESS_IT_ID_USER');
			 	$nip= $this->input->post('nip');
                $nama= $this->input->post('nama');
                $alamat= $this->input->post('alamat');
                $telepon= $this->input->post('telepon');

                $polanip = "/^.{10,}$/";
                $polatelepon ="/^.{6,}$/";

                if(!preg_match($polanip, $this->input->post('nip')) || !preg_match($polatelepon, $this->input->post('telepon')))
                {
                    if (!preg_match($polanip, $this->input->post('nip'))) {
                        $this->session->set_flashdata('nip', 'Nip minimal terdiri dari 10 karakter');
                    }
                    if (!preg_match($polatelepon, $this->input->post('telepon'))) {
                        $this->session->set_flashdata('telepon', 'Nomor telepon minimal terdiri dari 6 karakter');
                    }
                    
                    $this->session->set_flashdata('NI',$this->input->post('nip'));
                    $this->session->set_flashdata('NAM',$this->input->post('nama'));
                    $this->session->set_flashdata('ALAMA',$this->input->post('alamat'));
                    $this->session->set_flashdata('TELEPO',$this->input->post('telepon'));

                    redirect(base_url('staf_it/profile/update/' . $id_user));

                }else {

					$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

					$data = array(
                            'nama' => $nama,
                            'nip' => $nip,
                            'alamat' => $alamat,
                            'telepon' => $telepon,
                            'updated_at' => $date->format('Y-m-d H:i:s')
                    );
					
						
						if ($this->login_model->update($id_user, $data)) 
						{

							$this->session->set_userdata('SESS_IT_NAMA_USER', $nama);
                        
                        	$this->session->set_flashdata('message', 'Data informasi profil ' . $nama . ' berhasil di update');

                        	redirect(base_url('staf_it/profile/update/' . $id_user));

                    	} else {
                        
                        	$this->session->set_flashdata('message', 'Data gagal di update');

                        	redirect(base_url('staf_it/profile/update/' . $id_user));
                    	}
					
					}
            }
        
	}

	public function edit_modal($id_member)
	{
		$data['list']= $this->mahasiswa_model->find($id_member);
		
		$this->load->view('staf_it/guru/edit_modal_member', $data);
	}

	public function update_foto($id_member) {

		$data['list']= $this->login_model->find_stafit($id_member);
         
        $this->load->view('staf_it/guru/upload_modal', $data);
        
    }


    public function insert($id_user)
    {

        $this->load->library('upload');

        $nmfile = $this->input->post('filefoto'); //nama file saya beri nama langsung dan diikuti fungsi time
        $filename = "profilepicture_".$this->session->userdata('SESS_IT_ID_USER');
        $config['upload_path'] = './uploads/profil/'; //path folder
        $config['allowed_types'] = '*'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2000'; //maksimum besar file 3M
		$config['overwrite'] = true;
      	$config['file_name'] = $filename;
 
        $this->upload->initialize($config);
         
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {	
            	$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                $gbr = $this->upload->data();
                $data = array(
                	'uploaded_at' => $date->format('Y-m-d H:i:s'),
                	'updated_at' => $date->format('Y-m-d H:i:s'),
                  	'picture' => $gbr['file_name']
                  	
                );

                $this->mahasiswa_model->get_insert($data,$this->session->userdata('SESS_IT_ID_USER'));
               	
                $this->session->set_userdata('SESS_IT_PICTURE_USER',$gbr['file_name']);

               	$this->session->set_flashdata('message', 'Upload foto berhasil');

                redirect('staf_it/profile/update/' . $id_user); 
            }else{
               	$this->session->set_flashdata('warning', 'Maaf, foto tidak dapat diunggah, silahkan ulangi kembali');

                redirect('staf_it/profile/update/' . $id_user);
            }
        }
    }

	public function update_akun($id_user)
	{
		$this->form_validation->set_rules('password', 'Password ', 'trim|xss_clean');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|xss_clean');
		$this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'trim|xss_clean');

		if ( $this->form_validation->run() === FALSE ) {
						
			$data['list'] = $this->login_model->find_stafit($id_user);

			$this->load->view('global_staf_it/head_staf_it');
			$this->load->view('staf_it/updateAkun_form', $data);
			$this->load->view('global_staf_it/foot_staf_it');

		} else {

			$id = $this->session->userdata('SESS_IT_ID_USER');
			$pass_now = $this->mahasiswa_model->get_pass($id);
			$password = $this->input->post('password');
			$hash = $this->get_hash_password($id, $password);

			$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

			$data = array(
				// ,
				'pengguna.id_user' => $id_user,
				'password' => $hash
					);
					
					$user = $this->login_model->select_user($data);
						
						if($hash == $pass_now)
                            {
                                if ($this->input->post('password_new') == $this->input->post('password_konfirm')) 
                                {
                                    $polapassword ="/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,}$/";
                                    if(!preg_match($polapassword, $this->input->post('password_new'))){
                
                                       
                                            $this->session->set_flashdata('warning', 'Password baru minimal 5 digit dan terdiri dari huruf, angka serta beberapa karakter "!@#$%"');
                                        
                                        redirect(base_url('staf_it/profile/update_akun/' . $id_user));
                                    }else {

                                            $data = array(
                                            'password' => $this->get_hash_password($id,$this->input->post('password_new')),
                                            'updated_at' => $date->format('Y-m-d H:i:s'));
                                            
                                            if ($this->login_model->update($id_user, $data)) 
                                            {   
                                                $this->session->set_flashdata('message', 'Data akun berhasil di ubah');

                                                redirect(base_url('staf_it/profile/update_akun/' . $id_user));

                                            } else {

                                                $this->session->set_flashdata('message', 'Data akun gagal di ubah');
                                                }
                                        }
                                }else {

                                    $this->session->set_flashdata('warning', 'password baru dan konfirmasi password tidak sama');
                                    }
                            } else {
                                $this->session->set_flashdata('warning', 'password lama salah');
                                }

					redirect(base_url('staf_it/profile/update_akun/' . $id_user));
				}
	}

	public function get_hash_password($salt, $password)
	{
		$hash_password = md5($salt.$password);
		return $hash_password;

	}

	
	
}



