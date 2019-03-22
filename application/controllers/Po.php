<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po extends CI_Controller {
 
	function __construct() 
	{ 
		parent::__construct();
		$this->load->model('model_po');
		
		if($this->session->userdata('status') != "login")
	  {
	   redirect("login"); 
	  } 
	}  
 
	public function index() 
	{
		$data = array(
		"container" => "Po/index", "dataspl" => $this->model_po->tampil(),
		"datadetail" => $this->model_po->tabel_detail(), 
		"supplier" => $this->model_po->supplier(),
		"kode" => $this->model_po->kode());
		$this->load->view('template', $data);  
	}

	public function buat_po($id_permintaan = "")
	{
		$id_permintaan 	= $this->uri->segment(3);
		$this->db->where('id_permintaan', $id_permintaan);
		/*
		$data = array(
			"container" => "Po/form_input_po", "dataspl" => $this->db->get('tb_permintaan'),
			"sparepart" => $this->model_po->sparepart('PMTN027'),
			"datadetail" => $this->db->get('tb_po_detail'));
			*/
			$data['container'] =  "Po/form_input_po";
			$data['dataspl'] = $this->db->get('tb_permintaan');
			$data['datadetail'] = $this->db->get('tb_po_detail');
		$this->db->where('status', 'Valid');
		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->order_by('id_sparepart','ASC');
		$data['sparepart'] = $this->db->get('tb_permintaan_detail');
		$this->load->view('template', $data); 
	}

	public function action_add_detail()
	{
		$this->model_po->inputdetail();
		redirect('Po/index/','refresh');
	}

	public function action_add()
	{
		$this->model_po->inputpo();
		redirect('Po/po_masuk/','refresh');
	}

	public function delete_detail($id_po_detail = NULL)
	{
		$id=	$this->uri->segment(3);
		$this->model_po->delete_detail($id_po_detail);
		redirect('Po/index/','refresh');
	}


	public function tampil_detail_setuju()
	{
		$id_permintaan 	=$this->uri->segment(3);
		$data = array(
		"container" => "po/form_detail", 
		"dataspl" =>	$this->model_po->tampil_detail($id_permintaan), 
		"dataspl1" =>	$this->model_po->tampil_detail1($id_permintaan));

		$this->load->view('template', $data);
	}
	

	public function po_masuk()
	{
		$data = array(
		"container" => "Po/po_masuk", "dataspl" => $this->model_po->tampil_po_masuk());
		
		$this->load->view('template', $data); 
	}


	public function tampil_detail_po()
	{
		$id_po 	=$this->uri->segment(3);
		$data = array(
		"container" => "po/form_detail_po", 
		"datapo" =>	$this->model_po->tampil_detail_po($id_po), 
		"datapo1" =>	$this->model_po->tampil_detail1_po($id_po),
		"datapo2" =>	$this->model_po->tampil_detail2_po($id_po));

		$this->load->view('template', $data);
	}

	public function cetak_po()
	{
		$id_po 	=$this->uri->segment(3);
		$this->load->library('pdf');
		$data = array(
		"dataspl1" =>	$this->model_po->tampil_detail1_po($id_po),
		"dataspl" =>	$this->model_po->tampil_detail_po($id_po),
		"datapo2" =>	$this->model_po->tampil_detail2_po($id_po));
		
    
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "Purchase_Order_NIJU.pdf";
    $this->pdf->load_view('po/cetak_po', $data);
	}

	public function selesai()
	{
		$id_permintaan = $this->uri->segment(3);
		$this->model_po->selesai($id_permintaan);
		redirect('Po');
	}

	public function panggil_lap()
	{
		$data = array(
			"container" => "laporan/form_laporan");

		$this->load->view('template', $data);
	}

	public function cetak_laporan()
	{
		$this->load->library('pdf');
		$tgl_awal			= $this->input->post('tgl_awal');
	 	$tgl_akhir			= $this->input->post('tgl_akhir');
		
		$data = array(
		"datapo" =>	$this->model_po->cetak_laporan($tgl_awal,$tgl_akhir));

		$this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "Laporan_Pembelian_NIJU.pdf";
    $this->pdf->load_view('po/laporan', $data);
    
	}
	public function kirim_email()
	{
		$data = array(
			"container" => "po/kirim_po",
			"error" => " ",
			"supplier" => $this->model_po->supplier());
		$this->load->view('template',$data);
	}


	public function send_mail() { 

         $from_email = "niju.nusaindah@gmail.com"; 
         $to_email = $this->input->post('email');
         $pesan =  $this->input->post('pesan');
         $subject = $this->input->post('subject');

         $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => 'nanas12345',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1',
                'wordwrap'  => TRUE
        );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");   

         $this->email->from($from_email, 'PT NIJU'); 
         $this->email->to($to_email);
         $this->email->subject($subject); 
         $this->email->message($pesan);
         //configure upload
         $conploud['upload_path']          = './upload/';
		$conploud['allowed_types']        = 'jpeg|jpg|pdf';
		$this->upload->initialize($conploud	);

		//perform upload
		$this->upload->do_upload('lampiran');
			$upload_data = $this->upload->data();
			$this->email->attach($upload_data['full_path']);
			



         //Send mail 
         if($this->email->send()){
                $this->session->set_flashdata("notif","Email berhasil terkirim.");
                $data = array(
					"container" => "po/upload_sukses");
				$this->load->view('template', $data); 
         }else {
                $this->session->set_flashdata("notif","Email gagal dikirim."); 
                $this->load->view('template','po/kirim_po'); 
         } 
      }


      public function aksi_upload(){
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpeg|jpg|pdf';
		$this->upload->initialize($config);
 
			$this->upload->do_upload('lampiran');
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('po/upload_sukses', $data);
		
	}

	public function panggilbot()
	{
		$data = array(
			"container" => "po/cobabot");
		$this->load->view('template',$data);
	}

	public function bot()
	{
		$email = $_POST['email'];
		$pesan = $_POST['pesan'];

		$message = "Bro ada pesan ni  dari '.$email.'' : %0A'.$pesan.";

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


	// public function send_mail() { this code working

 //         $from_email = "rusdiansyah.x9@gmail.com"; 
 //         $to_email = $this->input->post('email');
 //         $pesan =  $this->input->post('pesan');

 //         $config = Array(
 //                'protocol' => 'smtp',
 //                'smtp_host' => 'ssl://smtp.googlemail.com',
 //                'smtp_port' => 465,
 //                'smtp_user' => $from_email,
 //                'smtp_pass' => 'xxxxxxxx',
 //                'mailtype'  => 'html', 
 //                'charset'   => 'iso-8859-1',
 //                'wordwrap'  => TRUE
 //        );

 //            $this->load->library('email', $config);
 //            $this->email->set_newline("\r\n");   

 //         $this->email->from($from_email, 'PT NIJU'); 
 //         $this->email->to($to_email);
 //         $this->email->subject('Test Pengiriman Email'); 
 //         $this->email->message($pesan);
 //         //configure upload
 //         $conploud['upload_path']          = './upload/';
	// 	$conploud['allowed_types']        = 'jpeg|jpg|pdf';
	// 	$this->upload->initialize($conploud	);

	// 	//perform upload
	// 	$this->upload->do_upload('lampiran');
	// 		$upload_data = $this->upload->data();
	// 		$this->email->attach($upload_data['full_path']);
			



 //         //Send mail 
 //         if($this->email->send()){
 //                $this->session->set_flashdata("notif","Email berhasil terkirim."); 
 //         }else {
 //                $this->session->set_flashdata("notif","Email gagal dikirim."); 
 //                $this->load->view('template','po/kirim_po'); 
 //         } 
 //      }

	// public function aksi_upload(){
	// 	$config['upload_path']          = './upload/';
	// 	$config['allowed_types']        = 'jpeg|jpg|pdf';
	// 	$this->upload->initialize($config);
 
	// 	if ( ! $this->upload->do_upload('lampiran')){
	// 		$error = array('error' => $this->upload->display_errors());
	// 		$this->load->view('template','po/kirim_po', $error);
	// 	}else{
	// 		$data = array('upload_data' => $this->upload->data());
	// 		$this->load->view('po/upload_sukses', $data);
	// 	}

}

/* End of file Po.php */
/* Location: ./application/controllers/Po.php */