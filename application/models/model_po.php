<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_po extends CI_Model { 

	public function kode()   {
			  $q = $this->db->query("select MAX(RIGHT(id_po,3)) as kode from tb_po");
		    $code = ""; 
		    if($q->num_rows()>0){ 
		        foreach($q->result() as $cd){
		            $tmp = ((int)$cd->kode)+1;
		            $code = sprintf("%03s", $tmp);
		        }
		    }else{ 
		        $code = "001";
		    }   
		    return "PORD".$code;
		}

		function tampil ()
		{
			$query = "SELECT * FROM tb_permintaan WHERE tb_permintaan.status = 'valid'";
		return $this->db->query($query);
		}
 

		 function permintaan ()
	{
		$this->db->order_by('id_permintaan','ASC');
		$supplier= $this->db->get('tb_permintaan');
		return $supplier->result_array();
	}

		function sparepart ()
	{

		$this->db->order_by('id_sparepart','ASC');
		$this->db->where('status', 'Valid');
		$sparepart= $this->db->get('tb_permintaan_detail');
		return $sparepart->result_array();
	}

	function supplier ()
	{
		$this->db->order_by('id_supplier','ASC');
		$supplier= $this->db->get('tb_supplier');
		return $supplier->result_array();
	}

	function inputdetail()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$id_sparepart = $this->input->post('id_sparepart');
		$qty = $this->input->post('qty');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');
				
		$data = array(
			'id_permintaan' => $this->input->post('id_permintaan'),
			'id_sparepart' => $this->input->post('id_sparepart'),
			'qty' => $this->input->post('qty'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan')

			 );
		$this->db->insert('tb_po_detail', $data);
		$this->db->query("update tb_permintaan_detail set status = 'Po' where id_permintaan = '".$id_permintaan."' AND id_sparepart='".$id_sparepart."'");
		
	}

	
	function tabel_detail()
	{
		$query = "SELECT * FROM tb_po_detail  WHERE tb_po_detail.status = 'waiting'";
		return $this->db->query($query);
	}

	function inputpo()
	{
		$id_po  = $this->input->post ('id_po');
		$id_supplier  = $this->input->post ('id_supplier');
		$tgl_po = $this->input->post ('tgl_po');
		$status = $this->input->post ('status');
		
		$data = array(
			'id_po' => $this->input->post('id_po'),
			'id_supplier' => $this->input->post('id_supplier'),
			'tgl_po' => $this->input->post('tgl_po'),
			'status' => $this->input->post('status')

			 );
		$this->db->insert('tb_po', $data);
		$this->db->query("update tb_po_detail set id_po = '".$id_po."' where status = 'waiting'");
		$this->db->query("update tb_po_detail set status = 'po' where status = 'waiting'");
	}

	function delete_detail($id_po_detail)
	{
		$this->db->where('id_po_detail', $id_po_detail);
		$this->db->delete('tb_po_detail');
	}


	function tampil_detail ($id_permintaan = NULL)
		{
			$query = "SELECT * FROM tb_permintaan WHERE  id_permintaan = '$id_permintaan'";
		 return $this->db->query($query);
		}

		function tampil_detail1 ($id_permintaan)
		{
		 $query = "SELECT tb_permintaan.id_permintaan, tb_permintaan.tgl_permintaan, tb_permintaan.lap_kerusakan, tb_permintaan.status, tb_permintaan_detail.id_permintaan_detail, tb_permintaan_detail.jumlah,tb_permintaan_detail.id_sparepart,  tb_sparepart.nama_sparepart,tb_sparepart.id_sparepart,tb_permintaan_detail.id_sparepart, tb_permintaan_detail.keterangan  
		from tb_permintaan,tb_permintaan_detail,tb_sparepart WHERE tb_permintaan_detail.id_sparepart =tb_sparepart.id_sparepart 
		AND tb_permintaan_detail.id_permintaan=tb_permintaan.id_permintaan AND
		 tb_permintaan_detail.id_permintaan = '$id_permintaan'";
		 return $this->db->query($query);
		}
		
		function tampil_po_masuk ()
		{
			$query = "SELECT * FROM tb_po WHERE tb_po.status = 'pending'";
		return $this->db->query($query);
		}


		function tampil_detail_po ($id_po= NULL)
		{
			$query = "SELECT * FROM tb_po WHERE  id_po = '$id_po'";
		 	return $this->db->query($query);
		}

		function tampil_detail1_po ($id_po)
		{

		$query = "SELECT tb_po.id_po, tb_po.id_supplier, tb_po.tgl_po, tb_po_detail.id_sparepart, tb_po_detail.qty, tb_sparepart.id_sparepart, tb_sparepart.nama_sparepart, tb_po_detail.keterangan
		from tb_po, tb_po_detail, tb_sparepart WHERE tb_po_detail.id_sparepart =tb_sparepart.id_sparepart 
		AND tb_po_detail.id_po=tb_po.id_po AND
		 tb_po_detail.id_po = '$id_po'";
		 return $this->db->query($query);

		}

		function tampil_detail2_po ($id_po)
		{

		$query = "SELECT tb_po.id_po, tb_po.id_supplier, tb_supplier.id_supplier, tb_supplier.nama_supplier
		from tb_po, tb_supplier WHERE 
		tb_po.id_supplier=tb_supplier.id_supplier AND
		 tb_po.id_po = '$id_po'";
		 return $this->db->query($query);

		}

		function selesai($id_permintaan)
		{
		$this->db->query("update tb_permintaan set status = 'Selesai' where id_permintaan ='".$id_permintaan."'");
		}

		function cetak_laporan($tgl_awal,$tgl_akhir)
		{
			
			$query = "SELECT tb_po.id_po, tb_po.tgl_po, tb_po_detail.id_permintaan, tb_sparepart.nama_sparepart, tb_supplier.nama_supplier, tb_po_detail.qty from tb_po, tb_po_detail, tb_sparepart, tb_supplier where tb_po.id_po=tb_po_detail.id_po and tb_po_detail.id_sparepart=tb_sparepart.id_sparepart and tb_po.id_supplier=tb_supplier.id_supplier and tb_po.tgl_po BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'";
			return $this->db->query($query);
		}
}

/* End of file model_po.php */
/* Location: ./application/models/model_po.php */