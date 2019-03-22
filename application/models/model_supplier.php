<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_supplier extends CI_Model {

	
function tampil_data()
	{
		return $this->db->get('tb_supplier');
	}

	function post()
	{
		$this->db->insert('tb_supplier', $data);
	}
 
	function update($where,$table)
	{		
	return $this->db->get_where($table,$where);
	}

	function delete($id_supplier)
	{
		$this->db->where('id_supplier', $id_supplier);
		$this->db->delete('tb_supplier');
	}

}

/* End of file model_supplier.php */
/* Location: ./application/models/model_supplier.php */