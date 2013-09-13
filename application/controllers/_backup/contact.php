<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('front/banner_top');
        $this->load->helper('text');
        
        
        if($this->session->userdata('language') == null){
          $lang=  $this->session->set_userdata('language', 'thailand');
		}
		 
    }
	
	
    function index()
    {
    	$data['meta_title'] = "เว็บไซต์ รับประกาศ ฝากขายบ้าน ที่ดิน คอนโด อาพาร์ทเม้นท์ อสังหาริมทรัพย์ เชียงใหม่";
    	$data['banner'] = $this->banner_top->banner_list();
    	$data['banner_rignt_top'] = $this->banner_top->banner_right();	
    		 	
        $this->load->view('contactus', $data);
    }
    
    public function mailto()
    {
	    $this->load->library('email');
		$this->load->library('form_validation');

		 $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('title_th', 'title_th', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('detail_th', 'detail_th', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('contactus');
		}else{
		
			$contact_name   = $this->input->post('name', true);
			$contact_title 	= $this->input->post('title_th', true);
			$contact_detail =  $this->input->post('detail_th', true);


		$this->email->from('sendmail@abcdproperty.com', 'Contact ABCDproperty');
		$this->email->to('regulators13@gmail.com');
		//$this->email->bcc('vrn.fang@gmail.com');
		
		$this->email->subject('ติดต่อจากเว็บไซต์ ABCDproprety');
		$this->email->message("ผู้ติดต่อ : $contact_name \n หัวข้อ : $contact_title \n รายละเอียด : $contact_detail");
		
		$this->email->send();
		echo "<script>alert('ได้ทำการส่งข้อความติดต่อเรียบร้อยแล้วค่ะ.');</script>";
		echo "<script>window.location.href = '" . site_url() . "';</script>";
		}
		
    }
   

}

?>