<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
    }
    	
	function insert(){
         //add data		
	    	$data = array(
	    	   'menu_name' => $this->input->post('title'),
	    	   'menu_value' => $this->input->post('amount'),
	    	   'menu_status' => '0',
			);
			$query =$this->db->insert("menu", $data);
			return ($query);
			   
	}// end function
	
	function edit_data(){
		
	    	$data = array(
	    	   'menu_name' => $this->input->post('title'),
	    	   'menu_value' => $this->input->post('amount'),
			);
			
			$this->db->where('menu_id', $this->id);
			
			$query = $this->db->update("menu", $data);
			return ($query);
			
	}// end function
	
	function change_view(){
		$id =$this->uri->segment(4);
		
			$query1 = $this->db->get_where('menu', array('menu_id' => $id));
	    		foreach( $query1->result() as $fett)
	    		{
		    		$menu_status= $fett->menu_status;
	    		}
	    			
		    if($menu_status=='0'){
			    $change='1';
		    }else{
			    $change='0';
		    }
			    	$data = array(
						'menu_status' => $change
					);
					$this->db->where('menu_id', $id);
			    $query = $this->db->update('menu', $data);
			
			return ($query);
		    
	}// end function
	
	function delete_data(){
			
		$this->db->where('menu_id', $this->id);
		return ($this->db->delete('menu'));
	} //end function
	

} // end class	
	
?>