<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
	  parent::__construct();

	  if($this->session->userdata('status') != "login")
	  {
	   redirect("login");
	  }
	 } 

	public function index()
	{
		$data = array(
			"container" => "home");
		$this->load->view('template', $data);
	}

	

}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */