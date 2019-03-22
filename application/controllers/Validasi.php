<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_validasi');

	if($this->session->userdata('status') != "login")
	  {
	   redirect("login");
	  }
	 
	}

 
	public function index()
	{
		
		$data = array(
			"container" => "Validasi/index", "dataspl" => $this->model_validasi->tampil_validasi());
		$this->load->view('template', $data);

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
		"container" => "validasi/form_detail_validasi", 
		"dataspl" =>	$this->model_validasi->tampil_detail($id_permintaan), 
		"dataspl1" =>	$this->model_validasi->tampil_detail1($id_permintaan));

		$this->load->view('template', $data);
	}
//setuju
	public function tampil_setuju()
	{
		$data = array(
			"container" => "Validasi/index_setuju", "dataspl" => $this->model_validasi->tampil_setuju());
		$this->load->view('template', $data);
	}

	public function tampil_detail1_setuju( $id_permintaan = NULL )
	{
		$this->db->where('id_permintaan', $id_permintaan);
		$data = array(
			"container" => "validasi/form_detail_validasi_setuju", "dataspl" => $this->db->get('tb_permintaan','tb_permintaan_detail'));
		$this->load->view('template', $data);
	}

	public function tampil_detail_setuju()
	{
		$id_permintaan 	=$this->uri->segment(3);
		$data = array(
		"container" => "validasi/form_detail_validasi_setuju", 
		"dataspl" =>	$this->model_validasi->tampil_detail($id_permintaan), 
		"dataspl1" =>	$this->model_validasi->tampil_detail1($id_permintaan));

		$this->load->view('template', $data);
	}

	public function persetujuan()
	{
		$id_permintaan = $this->uri->segment(3);
		$this->model_validasi->setuju($id_permintaan);
		redirect('validasi');
	}

	public function tolak()
	{
		$id_permintaan = $this->uri->segment(3);
		$this->model_validasi->tolak($id_permintaan);
		redirect('validasi');
	}

	public function delete_detail( $id_permintaan_detail = NULL )
	{
		$id=	$this->uri->segment(3);
		$this->model_validasi->delete_detail($id_permintaan_detail);
		redirect('validasi','refresh');
	}

}

/* End of file Validasi.php */
/* Location: ./application/controllers/Validasi.php */