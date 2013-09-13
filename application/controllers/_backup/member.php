<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Member_model');
		
		if($this->session->userdata['logged_in']['member']=="no"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
			
	}
	
    function index() {
    	
    	$this->load->view('backoffice/member/index');
    }
    
    function add(){
		
		$this->Member_model->insert();
	    
	    $this->load->view('backoffice/member/add');
	    
    }// end add
    
 	function edit($id){
    	
		$this->Member_model->update();
			
		$sql="select * from member where member_id='$id'";
			$rs=$this->db->query($sql);
			
			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}   
				
			$this->load->view('backoffice/member/edit', $data); 
    }// end function edit
    
    function edit_bid($id){
    	$this->Member_model->update_bid();
    	
    	
    }// end function edit_bid
    
    function notification(){
		$this->load->view('backoffice/member/notification'); 
    }// end function  	    

	function mailto(){
		if($this->input->post('send')!=NULL){
			foreach($this->input->post('m_mail') as $value ):
				$emailto= "$value,";
				
				$this->load->library('email');

				$this->email->from("sendmail@rgb7.com");
				$this->email->to("$emailto");
				
				$this->email->subject($this->input->post('title_th'));
				$this->email->message($this->input->post('detail_th'));
				
				$this->email->send();
			endforeach;
			
			echo "<script>alert('Send email success.');</script>";
			echo "<script>window.location.href = '" . base_url() . "backoffice/member/';</script>";
		}
		
	}// end function
	
    function delete($id){
    	$data_del = array(
    		'member_delete' => "yes",
    	);
	    $this->db->where('member_id', $id);
			if($this->db->update("member", $data_del))
			{
			  redirect('backoffice/member/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Delete data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/member/';</script>";
			} 
			
    }  // end delete 
  
}// end class