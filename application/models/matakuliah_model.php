<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class matakuliah_model extends CI_Model 
	{

		public function add($data)
		{
			return $this->db->insert('matakuliah', $data);
		}
		
		public function all()
		{
			$this->db->where('is_delete', 0);
			$this->db->order_by('id_matakuliah', 'desc');
			return $this->db->get('matakuliah')->result();
		}

		public function find($id_matakuliah)
		{
			$this->db->select('matakuliah.*');
			$this->db->from('matakuliah');
			$where = array('id_matakuliah' => $id_matakuliah);
			$this->db->where($where);
			$query = $this->db->get();
			return $query->row();
		}

		public function delete($id_matakuliah, $data)
		{
			return $this->db->update('matakuliah', $data, array('id_matakuliah' => $id_matakuliah));
		}

		public function select_name($value)
		{
			
			return $this->db->get('matakuliah', array('is_delete' => 0), array('id_matakuliah' => $value ))->row();
		}

	}

?>