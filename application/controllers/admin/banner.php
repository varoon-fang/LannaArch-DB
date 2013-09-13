<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("backend/banner_model");
        
        if($this->session->userdata['logged_in']['status']!="yes"){
			redirect('admin/dashboard');
			exit;	
		}
    }

	public function index() {
    	
    	$this->load->view('admin/banner/add-1');
    }
    
	public function add_banner1()
    {
	    $this->load->view('admin/banner/add-1');
	  
	    if($this->input->post('send')!=NULL)
	    {
			$add_head = new Banner_model();
	        if($add_head->insert_1()) 
	        {
	        	redirect('admin/banner/add_banner1', $data);
	         } 
	        
        }
		
		//$this->banner_model->insert();
	} // end function
	
	public function add_banner2()
    {
	    $this->load->view('admin/banner/add-2', $this->data);
	    $add_head = new Banner_model();
	        if($add_head->insert_2()) 
	        {
	        	redirect('admin/banner/add_banner2', $data);
	         } 
		
		
	} // end function
 
	public function add_banner3()
    {
	    $this->load->view('admin/banner/add-3', $this->data);
	    $add_head = new Banner_model();
	        if($add_head->insert_3()) 
	        {
	        	redirect('admin/banner/add_banner3', $data);
	         }
		
	} // end function

	public function add_banner4()
    {
	    $this->load->view('admin/banner/add-4', $this->data);
	    $add_head = new Banner_model();
	        if($add_head->insert_4()) 
	        {
	        	redirect('admin/banner/add_banner4', $data);
	         }
		
	} // end function
	
	public function delete_banner1()
	{
    	
    	$del_head = new Banner_model();
        $del_head->id = $this->uri->segment(4);
        if($del_head->delete_banner_1()) {
            redirect('admin/banner/add_banner1');
        }
    }

    public function delete_banner2($id)
    {
    	$del_head = new Banner_model();
        $del_head->id = $this->uri->segment(4);
        if($del_head->delete_banner_2()) {
            redirect('admin/banner/add_banner2');
        }
    }
    
   public function delete_banner3($id)
   {
    	$del_head = new Banner_model();
        $del_head->id = $this->uri->segment(4);
        if($del_head->delete_banner_3()) {
            redirect('admin/banner/add_banner3');
        }
    }
    public function delete_banner4($id)
    {
    	$del_head = new Banner_model();
        $del_head->id = $this->uri->segment(4);
        if($del_head->delete_banner_4()) {
            redirect('admin/banner/add_banner4');
        }
    }	
  
}// end class