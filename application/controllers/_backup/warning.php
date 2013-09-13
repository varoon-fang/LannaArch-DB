<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Warning extends CI_Controller {

     function __construct(){
        parent::__construct();
          $this->load->model("warning_model");
          
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }

	 function index() {
    	
    	$this->load->view('backoffice/warning/index');
    }
    
	  function view($data) {
    	
    	$this->load->view('backoffice/warning/view', $data);
    }
    
    function add() {
    	
    	$this->load->view('backoffice/warning/add');
	    $this->warning_model->insert();
    	
    }
    
    function edit($id){
		$this->warning_model->edit_data();
		
		//$id=$this->uri->segment(4);
			
		$sql="select * from warning_job where warning_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/warning/edit', $data); 
			
			
		
    }// end function edit
    
     public function delete()
    {
        $post = new Warning_model();
        $post->id = $this->uri->segment(4);
        if($post->delete_data()) {
            redirect('backoffice/warning/');
        }
    } 
     
  
}// end class