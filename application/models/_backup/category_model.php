<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        if($this->session->userdata['logged_in']['status']!="admin"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }
    	
	public function insert_preview()
	{
			$id=$this->uri->segment(4);
        	
			$query1 = $this->db->get_where('category_job', array('cate_id' => $id));
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
		    $query = $this->db->update('category_job', $data);
		    
		    return ($query);
					 
	}// end function
	
	public function insert()
	{
		//add data		
		$data = array(
		   'cate_name' => serialize($this->input->post('title_th')),//$this->input->post('title_th'),
		   'cate_preview' => '1'
		);
		
		$query = $this->db->insert("category_job", $data);
		return ($query);
				         
	}// end function
	
	public function edit_data($id)
	{
		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):
		    
			    $query = $this->db->get_where('category_job', array('category_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->category_img;
				     $del = unlink("images/category/thumbs/$img");
				     $del2 = unlink("images/category/resize/$img");
				     
				} 
					$data = array(
						'category_img' => "NULL",
					);
			    $this->db->where('category_id', $value);
			    $this->db->update('category', $data);
		
		    endforeach;
		 
    	}
    	if($this->input->post('send')!=NULL){
	    	$data = array(
			   'cate_name' => serialize($this->input->post('title_th')),//$this->input->post('title_th'),
	    	);
			
			$this->db->where('cate_id', $id);
			$query = ($this->db->update("category_job", $data));
			return ($query);
		}
		
	}// end function
	
	
	public function delete_data($id)
	{
         $data = array(
                'cate_previce' =>'0',
            );
            
		$this->db->where('cate_id', $id);
		$query = $this->db->delete('category_job');
		
		 if($query)
	        {
	        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Delete data successful.</strong>
			    </div>');
	        				
		    }else {
	        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <strong>Delete data Unsuccessful!</strong>
			    </div>');
	        	
		    }
		return ($query);

	} //end function

} // end class	
	
?>