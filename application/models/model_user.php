<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	function login($username,$password)
	{
		$chek=	$this->db->get_where('users',array('username'=>$username,'password'=>$password));
		
		// untuk check data username dan password ada atau tidak
		if ($chek->num_rows()>0) 
		{
			return 1;
		}
		else {
			return 0;
		}
	}

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */