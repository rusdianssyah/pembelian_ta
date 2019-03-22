<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_supplier');

	if($this->session->userdata('status') != "login")
	  {
	   redirect("login");
	  }
	 
	}

 
	public function index()
	{
		
		$data = array(
			"container" => "Supplier/index", "dataspl" => $this->model_supplier->tampil_data());
		$this->load->view('template', $data);

	}

	public function add()
 
	{
		$data = array(
			"container" => "Supplier/form_input");
		$this->load->view('template', $data);
	}
 
	public function action_add()
	{
		$data = array(

			'nama_supplier' => $this->input->post('nama_supplier'),
			'alamat' => $this->input->post('alamat'),
			'no_tlp' => $this->input->post('no_tlp'),
			'fax' => $this->input->post('fax'),
			'email' => $this->input->post('email')
			 );
		$this->db->insert('tb_supplier', $data);
		redirect('Supplier','refresh');
	}

	public function update( $id_supplier = NULL )
	{
		$this->db->where('id_supplier', $id_supplier);
		$data = array(
			"container" => "supplier/form_update", "dataspl" => $this->db->get('tb_supplier'));
		$this->load->view('template', $data);
	}

	public function action_update( $id_supplier = '')
	
	{
		$data = array(
			'id_supplier' => $this->input->post('id_supplier'),
			'nama_supplier' => $this->input->post('nama_supplier'),
			'alamat' => $this->input->post('alamat'),
			'no_tlp' => $this->input->post('no_tlp'),
			'fax' => $this->input->post('fax'),
			'email' => $this->input->post('email')	
			 );

		$this->db->where('id_supplier', $id_supplier);
		$this->db->update('tb_supplier', $data);
		redirect('Supplier','refresh');
	}

	public function delete( $id_supplier = NULL )
	{
		$id=	$this->uri->segment(3);
		$this->model_supplier->delete($id_supplier);
		redirect('Supplier','refresh');
	}
			

}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */