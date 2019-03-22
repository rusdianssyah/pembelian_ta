<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_permintaan extends CI_Model {

 
	public function kode()   {
			  $q = $this->db->query("select MAX(RIGHT(id_permintaan,3)) as kode from tb_permintaan");
		    $code = "";
		    if($q->num_rows()>0){
		        foreach($q->result() as $cd){
		            $tmp = ((int)$cd->kode)+1;
		            $code = sprintf("%03s", $tmp);
		        }
		    }else{ 
		        $code = "001";
		    }
		    return "PMTN".$code;
		}


		 	function tampil_data()
		{
			$query = "SELECT * FROM tb_permintaan WHERE tb_permintaan.status = 'pending'";
		return $this->db->query($query);
		}

		function tampil_data_tolak()
		{
			$query = "SELECT * FROM tb_permintaan WHERE tb_permintaan.status = 'tolak'";
		return $this->db->query($query);
		}


	function sparepart ()
	{
		
		$this->db->order_by('nama_sparepart','ASC');
		$sparepart= $this->db->get('tb_sparepart');
		return $sparepart->result_array();
	}
	function inputminta()
	{
		$id_permintaan  = $this->input->post ('id_permintaan');
		$tgl_permintaan = $this->input->post ('tgl_permintaan');
		$lap_kerusakan = $this->input->post ('lap_kerusakan');
		$status = $this->input->post ('status');
		
		$data = array(
			'id_permintaan' => $this->input->post('id_permintaan'),
			'tgl_permintaan' => $this->input->post('tgl_permintaan'),
			'lap_kerusakan' => $this->input->post('lap_kerusakan'),
			'status' => $this->input->post('status')

			 );
		$this->db->insert('tb_permintaan', $data);
		$this->db->query("update tb_permintaan_detail set id_permintaan = '".$id_permintaan."' where status = 'waiting'");
		$this->db->query("update tb_permintaan_detail set status = 'pending' where status = 'waiting'");

		//ini bot
		$id_permintaan = $_POST['id_permintaan'];
		$lap_kerusakan = $_POST['lap_kerusakan'];

		$message = "Selamat siang bapak Manajer %0ADiinformasikan bahwa terdapat permintaan baru dengan id permintaan '$id_permintaan' %0ADengan laporan kerusakan sebagai berikut:  '$lap_kerusakan' %0ASilahkan gunakan fungsi /detail $id_permintaan untuk mengetahui detail permintaan atau fungsi /validasi507377012 $id_permintaan [valid/tolak] untuk melakukan validasi permintaan.%0ATerimakasih";

		$api = 'https://api.telegram.org/bot571896094:AAGrYNWy7FsSwt0XFzoR4blXSJe5-SXBHmw/sendMessage?chat_id=507377012&text='.$message.'';


		$ch = curl_init($api);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);

		var_dump($api);
	}

	function tabel_detail()
	{
		$query = "SELECT tb_sparepart.nama_sparepart, tb_permintaan_detail.id_permintaan_detail, tb_permintaan_detail.jumlah, tb_permintaan_detail.keterangan FROM tb_sparepart, tb_permintaan_detail WHERE tb_permintaan_detail.id_sparepart=tb_sparepart.id_sparepart AND tb_permintaan_detail.status = 'waiting'";
		return $this->db->query($query);
	}

	
	function delete_detail($id_permintaan_detail)
	{
		$this->db->where('id_permintaan_detail', $id_permintaan_detail);
		$this->db->delete('tb_permintaan_detail');
	}

	function delete_minta($id_permintaan)
	{
		// $this->db->select('*');
  //   	$this->db->from('tb_permintaan');
  //   	$this->db->join('tb_permintaan_detail','tb_permintaan_detail.id_permintaan = tb_permintaan.id_permintaan');
  //   	$this->db->where('tb_permintaan.id_permintaan',$id_permintaan);
  //   	$this->db->delete('tb_permintaan', 'tb_permintaan_detail ');
  //   	return true;
		$this->db->where('id_permintaan', $id_permintaan); 
		$this->db->delete('tb_permintaan'); 
		// $this->db->query("DELETE FROM tb_permintaan_detail WHERE tb_permintaan_detail.id_permintaan == '".$id_permintaan."'";
	}

	function tampil_detail ($id_permintaan = NULL)
		{
			$query = "SELECT * FROM tb_permintaan WHERE  id_permintaan = '$id_permintaan'";
		 return $this->db->query($query);
		}

		function tampil_detail1 ($id_permintaan)
		{
		 $query = "SELECT tb_permintaan.id_permintaan, tb_permintaan.tgl_permintaan, tb_permintaan.lap_kerusakan, tb_permintaan.status, tb_permintaan_detail.id_permintaan_detail, tb_permintaan_detail.jumlah, tb_sparepart.nama_sparepart,tb_sparepart.id_sparepart,tb_permintaan_detail.id_sparepart 
		from tb_permintaan,tb_permintaan_detail,tb_sparepart WHERE tb_permintaan_detail.id_sparepart =tb_sparepart.id_sparepart 
		AND tb_permintaan_detail.id_permintaan=tb_permintaan.id_permintaan AND
		 tb_permintaan_detail.id_permintaan = '$id_permintaan'";
		 return $this->db->query($query);
		}

	 function tampil_setuju()
	{
		$query = "SELECT * FROM tb_permintaan WHERE tb_permintaan.status = 'valid'";
		return $this->db->query($query);
	}

}

/* End of file model_permintaan.php */
/* Location: ./application/models/model_permintaan.php */