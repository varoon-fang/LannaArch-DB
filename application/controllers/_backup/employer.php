<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Employer extends CI_Controller {

     function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("employer_model");
        
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }

	 function index() {
    	
    	$this->load->view('backoffice/employer/preview');
    }
   /*
 function show_preview() {
    	
    	$this->load->view('backoffice/employer/preview');
    }
*/
    
    function save_preview() {
    	
    	$this->employer_model->insert_preview();
    }
    
	 function add()
    {
	    $this->load->view('backoffice/employer/add');
	    
		
		$this->employer_model->insert();
	} // end function
	
     function edit($id){
		$this->employer_model->edit_data();
			
		$sql="select * from employer_job where cate_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/employer/edit', $data); 
			
			
		
    }// end function edit
    
	 function edit_pic($id){
	
		$this->employer_model->update_pic();
	
	} //end function edit pic


     function delete($id){
    	
    	$this->employer_model->delete_data();
    }
    
    function upload(){
    	
    	$this->employer_model->delete_data();
   } 	
  
}// end class