<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('model_surat');

	if($this->session->userdata('status') != "login")
	  {
	   redirect("login");
	  }
	}

	public function index()
	{
		$data = array(
			"container" => "surat/index", "dataspl" => $this->model_surat->tampil_data());
		$this->load->view('template', $data);
	}

	public function add() 
	{
		$data = array(
			"container" => "surat/form_input_detail", "dataspl" => $this->model_surat->tampil_permintaan(),
			"kode" => $this->model_surat->kode());
		$this->load->view('template', $data);
	}

	public function add1($id_po) 
	{
		$data = array(
			"container" => "surat/form-surat",
		"datapo" =>	$this->model_surat->tampil_detail_po($id_po), 
		"datapo1" =>	$this->model_surat->tampil_detail1_po($id_po),
		"kode" => $this->model_surat->kode(),
		"datapo2" =>	$this->model_surat->tampil_detail2_po($id_po));
		$this->load->view('template', $data);
	}

	public function action_add_detail()
	{
		$data = array(

			'id_sparepart' => $this->input->post('id_sparepart'),
			'jumlah' => $this->input->post('jumlah'),
			'status' => $this->input->post('status'),
			'keterangan' =>$this->input->post('keterangan'),
			 );
		$this->db->insert('tb_surat_detail', $data);
		redirect('Surat/add','refresh');
	}

	// <!--modal-->
	public function action_add ()
	{
		$this->model_surat->inputminta();
		redirect('Surat','refresh');
	}

	// <!--detail-->
	public function delete_detail( $id_surat_detail = NULL )
	{
		$id=	$this->uri->segment(3);
		$this->model_surat->delete_detail($id_surat_detail);
		redirect('Surat/add','refresh');
	}


	

	public function tampil_detail( $id_surat = NULL )
	{
		$id_surat 	=$this->uri->segment(3);
		$data = array(
		"container" => "surat/form_detail_surat", 
		"dataspl" =>	$this->model_surat->tampil_detail($id_surat), 
		"dataspl1" =>	$this->model_surat->tampil_detail1($id_surat),
		"dataspl2" =>	$this->model_surat->tampil_detail2($id_surat));

		$this->load->view('template', $data);
	}

	// public function tampil_surat_detail ($id_surat = NULL)
	// {
	// 	$id_surat 	=$this->uri->segment(3);
	// 	$data['dataspl1']=	$this->model_surat->tampil_table($id_surat)->result();
	// 	$data['dataspl2']=	$this->model_surat->tampil_table($id_surat)->row_array();
	// 	$this->load->view('surat/form_detail_surat',$data);
	// }

	public function delete_surat($id_surat=NULL)
	{
		$id=	$this->uri->segment(3);
		$this->model_surat->delete_surat($id_surat);
		redirect('Surat/index','refresh');
	}

}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */