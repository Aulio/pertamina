<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class mahasiswa_model extends CI_Model 
	{

		public function add($data)
		{
			return $this->db->insert('mahasiswa', $data);
		}

		public function all()
		{
			$this->db->select('mahasiswa.id_mahasiswa, mahasiswa.nama, mahasiswa.email, mahasiswa.semester, mahasiswa.id_jurusan, mahasiswa.id_matakuliah, matakuliah.id_matakuliah, matakuliah.nama_matakuliah, matakuliah.sks, jurusan.id_jurusan, jurusan.nama_jurusan');
			$this->db->from('mahasiswa');
			$this->db->join('matakuliah', 'mahasiswa.id_matakuliah = matakuliah.id_matakuliah');
			$this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan');
			$this->db->where('mahasiswa.is_delete', 0);
			$this->db->order_by('mahasiswa.id_mahasiswa', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function pagingmember($num, $offset)
		{
			$this->db->select('mahasiswa.id_mahasiswa, mahasiswa.nama, mahasiswa.email, mahasiswa.semester, mahasiswa.id_jurusan, mahasiswa.id_matakuliah, matakuliah.id_matakuliah, matakuliah.nama_matakuliah, matakuliah.sks, jurusan.id_jurusan, jurusan.nama_jurusan');
			$this->db->from('mahasiswa');
			$this->db->join('matakuliah', 'mahasiswa.id_matakuliah = matakuliah.id_matakuliah');
			$this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan');
			$this->db->where('mahasiswa.is_delete', 0);
			$this->db->order_by('mahasiswa.id_mahasiswa', 'desc');
			$this->db->limit($num, $offset);
			$query = $this->db->get();
			return $query->result();

		}

		public function searchmember()
		{
			$this->db->select('mahasiswa.id_mahasiswa, mahasiswa.nama, mahasiswa.email, mahasiswa.semester, mahasiswa.id_jurusan, mahasiswa.id_matakuliah, matakuliah.id_matakuliah, matakuliah.nama_matakuliah, matakuliah.sks, jurusan.id_jurusan, jurusan.nama_jurusan');
			$this->db->from('mahasiswa');
			$this->db->join('matakuliah', 'mahasiswa.id_matakuliah = matakuliah.id_matakuliah');
			$this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan');
			
			$search = $this->input->POST('key');
			$this->db->like('nama_matakuliah',$search);
			$this->db->where('mahasiswa.is_delete', 0);
			$this->db->order_by('mahasiswa.id_mahasiswa', 'desc');
			$query = $this->db->get();
			return $query->result();
		}

		public function find($id_mahasiswa)
		{
			$this->db->select('mahasiswa.id_mahasiswa, mahasiswa.nama, mahasiswa.email, mahasiswa.semester, mahasiswa.id_jurusan, mahasiswa.id_matakuliah, matakuliah.id_matakuliah, matakuliah.nama_matakuliah, matakuliah.sks, jurusan.id_jurusan, jurusan.nama_jurusan');
			$this->db->from('mahasiswa');
			$this->db->join('matakuliah', 'mahasiswa.id_matakuliah = matakuliah.id_matakuliah');
			$this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan');
			$where = array('mahasiswa.id_mahasiswa' => $id_mahasiswa);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function delete($id_mahasiswa, $data)
		{
			return $this->db->update('mahasiswa', $data, array('id_mahasiswa' => $id_mahasiswa));
		}


	}

?>