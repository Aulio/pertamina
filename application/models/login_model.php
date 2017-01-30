<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class login_model extends CI_Model 
	{

		public function cek_user($data) 
		{
			$this->db->select('pengguna.*');
			$this->db->from('pengguna');
			$this->db->where('pengguna.username', $data);
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function cek_nip($data) 
		{
			$this->db->select('pengguna.*');
			$this->db->from('pengguna');
			$this->db->where('pengguna.nip', $data);
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function select_user($data)
		{
			$this->db->select('pengguna.*');
			$this->db->from('pengguna');
			$this->db->where($data);
			$query = $this->db->get();
			return $query->row();
		}

		public function update($id_user, $data)
		{
			return $this->db->update('pengguna', $data, array('id_user' => $id_user));
		}

		public function find_staf($id_user)
		{
			$this->db->select('pengguna.*');
			$this->db->from('pengguna');
			$where = array('pengguna.id_user' => $id_user);
			$this->db->where('hak_akses', 1);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function find_stafit($id_user)
		{
			$this->db->select('pengguna.*');
			$this->db->from('pengguna');
			$where = array('pengguna.id_user' => $id_user);
			$this->db->where('hak_akses', 3);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function find_guru($id_user)
		{
			$this->db->select('pengguna.*');
			$this->db->from('pengguna');
			$where = array('pengguna.id_user' => $id_user);
			$this->db->where('hak_akses', 2);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function get_id($username)
		{
			$this->db->select('id_user');
			$this->db->from('pengguna');
			$this->db->where('username', $username);
			$query = $this->db->get();
			$hasil = $query->num_rows();
			if ($hasil = 1) {
				foreach($query->result() as $hasil ){
					$id_user = $hasil->id_user;
				}
			}else{
				$id_user = false;
			}

				return $id_user;

		}

	}

?>