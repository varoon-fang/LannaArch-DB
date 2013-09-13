<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Management extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->load->model("backend/Management_model");
        
        if($this->session->userdata['logged_in']['type']!="admin"){
			redirect('admin/dashboard');
			exit;	
		}
    }

	public function index() {
    	$sql_cate="select * from admin where admin_type='user' ";
			$rs=$this->db->query($sql_cate);
						
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->result();
			}   
		
    	$this->load->view('admin/management/index', $data);
    }
    
	public function add()
    {
		//$this->load->view('admin/management/add');
		//if($this->input->post('send')!=NULL){
		    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.admin_user]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('c_pass', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[admin.admin_email]');
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/management/add');
			//exit;
		}else{
			$add_head = new management_model();
	        if($add_head->insert()) 
	        {
	        	redirect('admin/management', $data);
	        } 
		}
	      
	} // end function
	
    public function edit($id){
		
		$edit = new management_model();
	        if($edit->edit_data($id)) 
	        {
	        	redirect('admin/management', $data);
	        } 
	        	
		$sql="select * from admin where admin_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('admin/management/edit', $data); 
			
			
		
    }// end function edit
    
	public function edit_pic($id){
	
		$this->Management_model->update_pic();
	
	} //end function edit pic


    public function delete($id){
    	
    	$this->Management_model->delete_data();
    }
    
   public function upload(){
    	
    	$this->Management_model->delete_data();
   } 	
  
}// end class