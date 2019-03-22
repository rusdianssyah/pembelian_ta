 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_surat extends CI_Model {
 

	public function kode()   {
		  $q = $this->db->query("select MAX(RIGHT(id_surat,3)) as kode from tb_surat");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->kode)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        } 
        return "SRTJ".$code;
	}

	function tampil_permintaan ()
		{
			$query = "SELECT * FROM tb_po WHERE tb_po.status = 'pending'";
		return $this->db->query($query);
		}


	 	function tampil_data()
	{
		return $this->db->get('tb_surat'); 
	}

	function modal($id_po)
	{
		$query = "SELECT tb_po.id_po, tb_supplier.nama_supplier FROM tb_po, tb_supplier WHERE tb_supplier.id_supplier = tb_po.id_supplier AND tb_po.id_po='$id_po'";
		 return $this->db->query($query);
	}
// dropdown
	function sparepart ()
	{
		$this->db->order_by('nama_sparepart','ASC');
		$sparepart= $this->db->get('tb_sparepart');
		return $sparepart->result_array();
	}

function supplier ()
	{
		$this->db->order_by('nama_supplier','ASC');
		$supplier= $this->db->get('tb_supplier');
		return $supplier->result_array();
	}
function po ()
	{
		
		$this->db->order_by('id_po','ASC');
		$this->db->where('status', 'pending');
		$po= $this->db->get('tb_po');
		return $po->result_array();
	}
	function tabel_detail()
	{
		$query = "SELECT tb_sparepart.nama_sparepart, tb_surat_detail.id_surat_detail, tb_surat_detail.jumlah, tb_surat_detail.keterangan FROM tb_sparepart, tb_surat_detail WHERE tb_surat_detail.id_sparepart=tb_sparepart.id_sparepart AND tb_surat_detail.status = 'waiting'";
		return $this->db->query($query);
	}

	function inputminta()
	{
		$id_surat  = $this->input->post ('id_surat');
		$id_po = $this->input->post ('id_po');
		$tgl_surat = $this->input->post ('tgl_surat');
		$no_surat_supplier = $this->input->post ('no_surat_supplier');
		$id_supplier = $this->input->post ('id_supplier');
		$nama_pengirim = $this->input->post ('nama_pengirim');
		
		$data = array(
			'id_surat' => $this->input->post('id_surat'),
			'id_po' => $this->input->post('id_po'),
			'tgl_surat' => $this->input->post('tgl_surat'),
			'no_surat_supplier' => $this->input->post('no_surat_supplier'),
			'id_supplier' => $this->input->post('id_supplier'),
			'nama_pengirim' => $this->input->post('nama_pengirim')

			 );
		$this->db->insert('tb_surat', $data);
		$this->db->query ("INSERT INTO tb_surat_detail (id_sparepart, jumlah, status)
							SELECT id_sparepart, qty, status 
							FROM tb_po_detail WHERE tb_po_detail.id_po='".$id_po."'");
		$this->db->query("update tb_surat_detail set id_surat = '".$id_surat."' where status = 'po'");
		$this->db->query("update tb_surat_detail set status = 'masukpo' where status = 'po'"); 
	}

	function delete_detail($id_surat_detail)
	{
		$this->db->where('id_surat_detail', $id_surat_detail);
		$this->db->delete('tb_surat_detail');
	}

	function tampil_detail($id_surat)
	{
		$query = "SELECT * FROM tb_surat WHERE  id_surat = '$id_surat'";
		 return $this->db->query($query);
	}

	function tampil_detail1($id_surat)
	{
		$query = "SELECT tb_surat.id_surat,  tb_surat.id_po,  tb_surat.tgl_surat,  tb_surat.no_surat_supplier,  tb_surat.id_supplier,  tb_surat.nama_pengirim,  tb_surat_detail.id_sparepart, tb_surat_detail.jumlah, tb_surat_detail.keterangan, tb_sparepart.id_sparepart, tb_sparepart.nama_sparepart, tb_supplier.id_supplier, tb_supplier.nama_supplier 
		FROM tb_surat, tb_surat_detail, tb_sparepart, tb_supplier 
		WHERE  tb_surat_detail.id_surat=tb_surat.id_surat 
		AND tb_sparepart.id_sparepart=tb_surat_detail.id_sparepart 
		AND tb_supplier.id_supplier=tb_surat.id_supplier 
		AND tb_surat_detail.id_surat = '$id_surat'";
		return $this->db->query($query);
	}
	
	function tampil_detail2($id_surat)
	{
		$query = "SELECT tb_surat.id_surat, tb_surat.id_supplier, tb_supplier.nama_supplier FROM tb_surat, tb_supplier WHERE tb_supplier.id_supplier = tb_surat.id_supplier AND tb_surat.id_surat='$id_surat'";
		 return $this->db->query($query);
	}

	function delete_surat($id_surat)
	{
		$this->db->where('id_surat', $id_surat);
		$this->db->delete('tb_surat');
	}

	function tampil_detail_po ($id_po= NULL)
		{
			$query = "SELECT * FROM tb_po WHERE  id_po = '$id_po'";
		 	return $this->db->query($query);
		}

		function tampil_detail1_po ($id_po)
		{

		$query = "SELECT tb_po.id_po, tb_po.id_supplier, tb_po.tgl_po, tb_po_detail.id_sparepart, tb_po_detail.qty, tb_sparepart.id_sparepart, tb_sparepart.nama_sparepart
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
	

}

/* End of file model_surat.php */
/* Location: ./application/models/model_surat.php */