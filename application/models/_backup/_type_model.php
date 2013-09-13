<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class type_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*
if($this->session->userdata['logged_in']['type']=="no"){
			redirect('backoffice/login', 'refresh');
			exit;
	
		}*/
    }
    	
	function insert(){
		 if($this->input->post('send')!=NULL){
        		
                 //add data		
			    	$data = array(
			    	   'cate_id' => $this->input->post('cate_id'),
			    	   'type_name' => $this->input->post('title_th'),
			    	   
					);
				
                if($this->db->insert("type_job", $data))
			{
			  redirect('backoffice/type/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Insert data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/type/add';</script>";
			}     
                }// eddn check submit
         
	}// end function
	
	function edit_data(){
		$id =$this->uri->segment(4);
		
		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):
		    
			    $query = $this->db->get_where('type_job', array('type_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->type_img;
				     $del = unlink("images/type/thumbs/$img");
				     $del2 = unlink("images/type/resize/$img");
				     
				} 
					$data = array(
						'type_img' => "NULL",
					);
			    $this->db->where('type_id', $value);
			    $this->db->update('type', $data);
		
		    endforeach;
		       
	   
    	}
    	if($this->input->post('send')!=NULL){
	    	$data = array(
	    		'cate_id' => $this->input->post('cate_id'),
			    'type_name' => $this->input->post('title_th'),
	    	  
			);
			
			$this->db->where('type_id', $id);
			
			if($this->db->update("type_job", $data))
			{
			  redirect("backoffice/type/list_type/$id",'refresh');
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
$query = $this->db->get_where('type', array('type_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->type_img;
				     $del = unlink("images/type/thumbs/$img");
				     $del2 = unlink("images/type/resize/$img");
				     
				} 
*/
		
		$this->db->where('type_id', $id);
		if($this->db->delete('type_job'))
			{
			  redirect('backoffice/type/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Delete data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/type/';</script>";
			} 
	} //end function
	
	

} // end class	
	
?>