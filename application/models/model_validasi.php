<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_validasi extends CI_Model {

	function tampil_data()
		{ 
			return $this->db->get('tb_permintaan');  
		}

		function tampil_validasi() 
	{
		$query = "SELECT * FROM tb_permintaan WHERE tb_permintaan.status = 'pending'";
		return $this->db->query($query);
	}
 
	function tampil_setuju()
	{
		$query = "SELECT * FROM tb_permintaan WHERE tb_permintaan.status = 'valid'";
		return $this->db->query($query);
	}

		function tampil_detail ($id_permintaan = NULL)
		{
			$query = "SELECT * FROM tb_permintaan WHERE  id_permintaan = '$id_permintaan'";
		 return $this->db->query($query);
		}

		function tampil_detail1 ($id_permintaan)
		{
		 $query = "SELECT tb_permintaan.id_permintaan, tb_permintaan.tgl_permintaan, tb_permintaan.lap_kerusakan, tb_permintaan.status, tb_permintaan_detail.id_permintaan_detail, tb_permintaan_detail.jumlah, tb_permintaan_detail.keterangan, tb_sparepart.nama_sparepart,tb_sparepart.id_sparepart,tb_permintaan_detail.id_sparepart 
		from tb_permintaan,tb_permintaan_detail,tb_sparepart WHERE tb_permintaan_detail.id_sparepart =tb_sparepart.id_sparepart 
		AND tb_permintaan_detail.id_permintaan=tb_permintaan.id_permintaan AND
		 tb_permintaan_detail.id_permintaan = '$id_permintaan'";
		 return $this->db->query($query);
		}

		function setuju($id_permintaan)
		{
		$this->db->query("update tb_permintaan set status = 'Valid' where id_permintaan ='".$id_permintaan."'");
		$this->db->query("update tb_permintaan_detail set status = 'Valid' where id_permintaan ='".$id_permintaan."'");
		}

		function tolak()
		{
		$id_permintaan = $this->input->post ('id_permintaan');
		$keterangan  = $this->input->post ('keterangan');

		$this->db->query("update tb_permintaan set status = 'Tolak', keterangan = '".$keterangan."' where id_permintaan ='".$id_permintaan."'");
		$this->db->query("update tb_permintaan_detail set status = 'Tolak' where id_permintaan ='".$id_permintaan."'");
		}

		function delete_detail($id_permintaan_detail)
	{
		$this->db->where('id_permintaan_detail', $id_permintaan_detail);
		$this->db->delete('tb_permintaan_detail');
	}

}

/* End of file model_validasi.php */
/* Location: ./application/models/model_validasi.php */