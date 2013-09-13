<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

     function __construct(){
        parent::__construct();
          $this->load->model("menu_model");
          
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }

	 function index() {
    	
    	$this->load->view('backoffice/menu/index');
    }
    
	  function view($data) {
    	
    	$this->load->view('backoffice/menu/view', $data);
    }
    
    function add() {
    	
    	if($this->input->post('send')!=NULL)
    	{
			$this->menu_model->insert();
			$edit = new Menu_model();
	        if($edit->edit_data()) 
	        {
	            redirect('backoffice/menu/');
	        }
	        else
	        {
		        echo "<script>alert('Edit data fail.');</script>";
				//echo "<script>window.location.href = '" . base_url() . "backoffice/menu';</script>";
	        }
        }	
        
    	$this->load->view('backoffice/menu/add');
	    //$this->menu_model->insert();
    	
    }
    
    function change_status() {
    	
    	//$this->menu_model->change_view();
    	
    	$change = new Menu_model();
        $change->id = $this->uri->segment(4);
        if($change->change_view()) {
            redirect('backoffice/menu/');
        }
    }
    
    public function edit($id)
    {
		if($this->input->post('send')!=NULL)
    	{
			$this->menu_model->edit_data();
			$edit = new Menu_model();
	        $edit->id = $this->uri->segment(4);
	        if($edit->edit_data()) {
	            redirect('backoffice/menu/');
	        }else{
		        echo "<script>alert('Edit data fail.');</script>";
				//echo "<script>window.location.href = '" . base_url() . "backoffice/menu';</script>";
	        }
        }	
		$sql="select * from menu where menu_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/menu/edit', $data); 
		
    }// end function edit
    
    public function delete()
    {
        $post = new Menu_model();
        $post->id = $this->uri->segment(4);
        if($post->delete_data()) {
            redirect('backoffice/menu/');
        }
    }  
  
}// end class