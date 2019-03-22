<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sparepart extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_sparepart');

		if($this->session->userdata('status') != "login")
	  {
	   redirect("login");
	  }
		
	}

	public function index()
	{
		$data = array(
			"container" => "Sparepart/index", "dataspl" => $this->model_sparepart->tampil_data());
		$this->load->view('template', $data);
	}

	public function add()
 
	{
		$data = array(
			"container" => "Sparepart/form_input");
		$this->load->view('template', $data);
	}

	public function action_add()
	{
		$data = array(

			'nama_sparepart' => $this->input->post('nama_sparepart'),
			'satuan' => $this->input->post('satuan'),
			'spesifikasi' => $this->input->post('spesifikasi')
			 );
		$this->db->insert('tb_sparepart', $data);
		redirect('Sparepart','refresh');
	}

	public function update( $id_sparepart = NULL )
	{
		$this->db->where('id_sparepart', $id_sparepart);
		$data = array(
			"container" => "sparepart/form_update", "dataspl" => $this->db->get('tb_sparepart'));
		$this->load->view('template', $data);
	}

	public function action_update( $id_sparepart = '')
	
	{
		$data = array(
			'id_sparepart' => $this->input->post('id_sparepart'),
			'nama_sparepart' => $this->input->post('nama_sparepart'),
			'satuan' => $this->input->post('satuan'),
			'spesifikasi' => $this->input->post('spesifikasi')
			 );

		$this->db->where('id_sparepart', $id_sparepart);
		$this->db->update('tb_sparepart', $data);
		redirect('Sparepart','refresh');
	}

	public function delete( $id_sparepart = NULL )
	{
		$id=	$this->uri->segment(3);
		$this->model_sparepart->delete($id_sparepart);
		redirect('Sparepart','refresh');
	}

}

/* End of file Sparepart.php */
/* Location: ./application/controllers/Sparepart.php */