<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	function __construct()  
	{ 
		parent::__construct();
		$this->load->model('model_permintaan');
		
		if($this->session->userdata('status') != "login")
	  {
	   redirect("login"); 
	  }
	} 
 

	public function index()
	{
		$data = array(
			"container" => "Permintaan/index", "dataspl" => $this->model_permintaan->tampil_data());
		$this->load->view('template', $data);
	}

	public function index_tolak()
	{
		$data = array(
			"container" => "Permintaan/index_tolak", "dataspl" => $this->model_permintaan->tampil_data_tolak());
		$this->load->view('template', $data);
	}

	public function index_setuju()
	{
		$data = array(
			"container" => "Permintaan/index_setuju", "dataspl" => $this->model_permintaan->tampil_setuju());
		$this->load->view('template', $data);
	}

	public function add()
 
	{
		
		$data = array(
			"container" => "Permintaan/form_input_detail", "sppart" => $this->model_permintaan->sparepart(),
			"kode" => $this->model_permintaan->kode(),
			"dataspl" => $this->model_permintaan->tabel_detail());
		$this->load->view('template', $data);
	}
// <!--detail-->
	public function action_add_detail()
	{
		$data = array(

			'id_sparepart' => $this->input->post('id_sparepart'),
			'jumlah' => $this->input->post('jumlah'),
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan')
			 );
		$this->db->insert('tb_permintaan_detail', $data);
		redirect('Permintaan/add','refresh');
	}
// <!--modal-->
	public function action_add ()
	{	
		// $tgl          = date("Y-m-d");
		// if($tgl_permintaan < $tgl){
		// 	$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
		// 		Pastikan: <br>
		// 		1. Tanggal Aju Tidak Boleh Kurang dari hari ini atau kosong.<br> 
		// 		2. Tangal mulai harus 3 hari dari hari tanggal aju dan tidak boleh kosong.<br>
		// 		3. Tanggal selesai tidak boleh kurang dari tgl mulai.<br>
		// 		4. Tanggal Mulai dan Selesai Tidak Boleh Kosong.<br>
		// 	 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
		// 	 );
		// 	 	redirect('permintaan/add');
		// 	 }
			 
		$this->model_permintaan->inputminta();
		redirect('Permintaan','refresh');
	}

// <!--detail-->
	public function delete_detail( $id_permintaan_detail = NULL )
	{
		$id=	$this->uri->segment(3);
		$this->model_permintaan->delete_detail($id_permintaan_detail);
		redirect('Permintaan/add','refresh');
	}



	  

   public function tampil_detail1( $id_permintaan = NULL )
	{
		$this->db->where('id_permintaan', $id_permintaan);
		$data = array(
			"container" => "validasi/form_detail_validasi", "dataspl" => $this->db->get('tb_permintaan','tb_permintaan_detail'));
		$this->load->view('template', $data);
	}

	public function tampil_detail()
	{
		$id_permintaan 	=$this->uri->segment(3);
		$data = array(
		"container" => "Permintaan/form_detail_minta", 
		"dataspl" =>	$this->model_permintaan->tampil_detail($id_permintaan), 
		"dataspl1" =>	$this->model_permintaan->tampil_detail1($id_permintaan));

		$this->load->view('template', $data);
	}

	public function delete_minta($id_permintaan = NULL)
	{
		$id=	$this->uri->segment(3);
		$this->model_permintaan->delete_minta($id_permintaan);
		redirect('Permintaan','refresh');
	}




	

}

/* End of file Permintaan.php */
/* Location: ./application/controllers/Permintaan.php */