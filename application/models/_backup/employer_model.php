<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Employer_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        if($this->session->userdata['logged_in']['employer']=="no"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }
    	
	function insert_preview($id){
		
        	$id=$this->uri->segment(4);
        	
			 $query1 = $this->db->get_where('employer_job', array('cate_id' => $id));
		    		foreach( $query1->result() as $fett){
			    		$cate_preview= $fett->cate_preview;
		    		}
		    		
		    		
		    if($cate_preview=='0'){
			    $change='1';
		    }else{
			    $change='0';
		    }
			    	$data = array(
						'cate_preview' => $change
					);
					$this->db->where('cate_id', $id);
			    $query = $this->db->update('employer_job', $data);
			
			       
            if($query){
			  	echo "<script>window.location.href = '" . base_url() . "backoffice/employer';</script>";	
			}else{
				echo "<script>alert('Change data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/employer';</script>";
			}
			// if($this->input->post('submit')!=NULL){     
              //  }// eddn check submit
         
	}// end function
	
	function insert(){
		 if($this->input->post('send')!=NULL){
        		
                 //add data		
			    	$data = array(
			    	   'cate_name' => $this->input->post('title_th'),
			    	   'cate_preview' => '0'
					);
				
                if($this->db->insert("employer_job", $data))
			{
			  redirect('backoffice/employer/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Insert data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/employer/add';</script>";
			}     
                }// eddn check submit
         
	}// end function
	
	function edit_data(){
		$id =$this->uri->segment(4);
		
		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):
		    
			    $query = $this->db->get_where('employer_job', array('employer_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->employer_img;
				     $del = unlink("images/employer/thumbs/$img");
				     $del2 = unlink("images/employer/resize/$img");
				     
				} 
					$data = array(
						'employer_img' => "NULL",
					);
			    $this->db->where('employer_id', $value);
			    $this->db->update('employer', $data);
		
		    endforeach;
		       
	   
    	}
    	if($this->input->post('send')!=NULL){
	    	$data = array(
			   'cate_name' => $this->input->post('title_th'),
	    	  
			);
			
			$this->db->where('cate_id', $id);
			
			if($this->db->update("employer_job", $data))
			{
			  redirect("backoffice/employer/",'refresh');
			  exit();	
			}else{
				//print_r($data);
				echo "<script>alert('Update data fail.');</script>";
				//echo "<script>window.location.href = '" . base_url() . "backoffice/work/';</script>";
			} 
		
		}
		
	}// end function
	
	
	function delete_data(){
		$id= $this->uri->segment(4);
		/*
$query = $this->db->get_where('employer', array('employer_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->employer_img;
				     $del = unlink("images/employer/thumbs/$img");
				     $del2 = unlink("images/employer/resize/$img");
				     
				} 
*/
		
		$this->db->where('cate_id', $id);
		if($this->db->delete('employer_job'))
			{
			  redirect('backoffice/employer/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Delete data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/employer/';</script>";
			} 
	} //end function
	
	

} // end class	
	
?>