<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class jurusan_model extends CI_Model 
	{

		public function add($data)
		{
			return $this->db->insert('jurusan', $data);
		}
		
		public function all()
		{
			$this->db->where('is_delete', 0);
			$this->db->order_by('id_jurusan', 'desc');
			return $this->db->get('jurusan')->result();
		}

		public function find($id_jurusan)
		{
			$this->db->select('jurusan.*');
			$this->db->from('jurusan');
			$where = array('id_jurusan' => $id_jurusan);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function delete($id_jurusan, $data)
		{
			return $this->db->update('jurusan', $data, array('id_jurusan' => $id_jurusan));
		}

		public function select_name($value)
		{
			
			return $this->db->get('jurusan', array('is_delete' => 0), array('id_jurusan' => $value ))->row();
		}

	}

?>