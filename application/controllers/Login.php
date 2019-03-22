<?php
/**
* 
*/
class Login extends CI_Controller
{
	
	 function __construct(){
  parent::__construct();
  $this->load->model('model_login');

 }

 function index(){
  $this->load->view('form_login');
 }

 function cek_login(){
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  $level_user = $this->db->get_where('users',array('username'=>$username))->row_array();
  $where = array(
   'username' => $username,
   'password' => $password
   );
  $cek = $this->model_login->cek_login("users",$where)->num_rows();
  if($cek > 0){

   $data_session = array(
    'username' => $username,
    'status' => "login",
    'level_user' => $level_user
    );

   $this->session->set_userdata($data_session);

   redirect ('home');

  }else{
   echo "<script type='text/javascript'>
               alert ('Maaf Username Dan Password Anda Salah !');
        </script>";
  }
 }

 function logout(){
  $this->session->sess_destroy();
  redirect('login');
 }
}
