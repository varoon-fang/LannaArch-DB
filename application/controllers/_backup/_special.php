<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Special extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("special_model");
        
        if($this->session->userdata['logged_in']['lucky']=="no"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }

	public function index() {
    	
    	$this->load->view('backoffice/special/index');
    }
    
	public function add()
    {
	    $this->load->view('backoffice/special/add');
	    
		
		$this->special_model->insert();
	} // end function
	
    public function edit($id){
		$this->special_model->edit_data();
			
		$sql="select * from product_lucky where lucky_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/special/edit', $data); 
			
			
		
    }// end function edit
    
	public function edit_pic($id){
	
		$this->special_model->update_pic();
	
	} //end function edit pic


    public function delete($id){
    	
    	$this->special_model->delete_data();
    }
    
   public function upload(){
    	
    	$this->special_model->delete_data();
   } 	
  
}// end class