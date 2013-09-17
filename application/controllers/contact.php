<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct()
    {
        // Call the constructor
        parent::__construct();

        	$this->load->helper('text');
        	$this->data['meta_title'] = "ติดต่อเรา";
    }

	function index()
	{


		$this->load->view('front/temp/header', $this->data);
		$this->load->view('front/contactus');
		$this->load->view('front/temp/footer');

		if($this->input->post('send')!=NULL)
		{
			$this->load->library('email');
			$this->load->library('form_validation');

		 $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('detail', 'detail', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('feedback', ' <div class="alert alert-danger" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>กรุณากรอกข้อมูลให้ครบ.</strong>
			    </div>');

			    redirect('contact');

			}else{

				$contact_name   = $this->input->post('name', true);
				$contact_title 	= $this->input->post('title', true);
				$contact_detail =  $this->input->post('detail', true);


			$this->email->from('sendmail@abcdproperty.com', 'Contact');
			$this->email->to('regulators13@gmail.com');
			//$this->email->bcc('vrn.fang@gmail.com');

			$this->email->subject('ติดต่อจากเว็บไซต์');
			$this->email->message("ผู้ติดต่อ : $contact_name \n หัวข้อ : $contact_title \n รายละเอียด : $contact_detail");

			$this->email->send();


			$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>ส่งข้อความติดต่อเรียบร้อย.</strong>
			    </div>');
			redirect('contact');

			}
		}
	}

}
