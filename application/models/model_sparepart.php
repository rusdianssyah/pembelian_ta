<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sparepart extends CI_Model {

	function tampil_data()
	{
		return $this->db->get('tb_sparepart');
	}

	function post()
	{
		$this->db->insert('tb_sparepart', $data);
	}

	function update($where,$table)
	{		
	return $this->db->get_where($table,$where);
	}

	function delete($id_sparepart)
	{
		$this->db->where('id_sparepart', $id_sparepart);
		$this->db->delete('tb_sparepart');
	}

	

}

/* End of file model_sparepart.php */
/* Location: ./application/models/model_sparepart.php */