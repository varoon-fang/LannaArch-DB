<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Special_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        if($this->session->userdata['logged_in']['lucky']=="no"){
			redirect('backoffice/login', 'refresh');
			exit;	
		}
    }
    	
	function insert(){
		 if($this->input->post('send')!=NULL){
        $upload_conf = array(
            'upload_path'   => ('./images/special/'),
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '30000',
            'quality' 		=> '80',
            'encrypt_name'	=> TRUE,
            'width'			=> 800,
            'hieght'		=> 800
            );
            
        $this->upload->initialize( $upload_conf );
        
       
				
        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
                $i++;   
            }
            
        }
        // Unset the useless one ;)
        unset($_FILES['userfile']);
        
        // Put each errors and upload data to an array
        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error 
                $error['upload'][] = $this->upload->display_errors();
            }
            else
            {
            	
				
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();
                
                // set the resize config
                $resize = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['file_path'].$upload_data['file_name'], 
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                   // 'create_thumbs' => true,
                    'quality' => '80',
                    'remove_spaces' => TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
                    'width'         => 300,
                    'height'        => 300
                    );
                
										
                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 150,
					    'height' => 150
					);              
					$this->image_lib->initialize($config);              
					$this->image_lib->resize();
					
                    // initializing
                $this->image_lib->initialize($resize);
                
                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                	
                    // otherwise, put each upload data to an array.
                    $success[] = $upload_data;
                    unlink($upload_data['full_path']);
                  // select special
                  $sql="select * from product_lucky order by lucky_id desc limit 1";
		    		$rs=$this->db->query($sql)->result();
		    		
		    		foreach($rs as $row){  
		    			$idd=$row->special_id;
		    			
		    		} 
    		
                 //add data		
			    	$data = array(
			    	   'lucky_title' => $this->input->post('title_th'),
			    	   'lucky_detail' => $this->input->post('detail_th'),
					   'lucky_img' => $upload_data['file_name'],
					   'lucky_range_start' => $this->input->post('range_start') ,
					   'lucky_range_end' => $this->input->post('range_end'),
					   'lucky_price'	=> $this->input->post('prices'),
					   'lucky_bid'	=> $this->input->post('bid'),
					   'lucky_date' => date('Y-m-d H:i:s')
					);
				$this->db->insert("product_lucky", $data);
                    
                }
            }
        }

        // see what we get
        if(count($error > 0))
        {
            $data['error'] = $error;
        }
        else
        {
            $data['success'] = $upload_data;
        }
        
       redirect('backoffice/special/', 'refresh');
		exit(); 
     }
	}// end function
	
	function edit_data(){
		$id =$this->uri->segment(4);
		
		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):
		    
			    $query = $this->db->get_where('product_lucky', array('lucky_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->lucky_img;
				     $del = unlink("images/special/thumbs/$img");
				     $del2 = unlink("images/special/resize/$img");
				     
				} 
					$data = array(
						'lucky_img' => "NULL",
					);
			    $this->db->where('lucky_id', $value);
			    $this->db->update('product_lucky', $data);
		
		    endforeach;
		       
	   
    	}
    	if($this->input->post('send')!=NULL){
	    	$data = array(
			   'lucky_title' => $this->input->post('title_th'),
	    	   'lucky_detail' => $this->input->post('detail_th'),
			   'lucky_range_start' => $this->input->post('range_start'),
			   'lucky_range_end' => $this->input->post('range_end'),
			   'lucky_price'	=> $this->input->post('prices'),
			   'lucky_bid'	=> $this->input->post('bid')
			);
			
			$this->db->where('lucky_id', $id);
			
			if($this->db->update("product_lucky", $data))
			{
			  redirect("backoffice/special/edit/$id",'refresh');
			  exit();	
			}else{
				//print_r($data);
				echo "<script>alert('Update data fail.');</script>";
				//echo "<script>window.location.href = '" . base_url() . "backoffice/work/';</script>";
			} 
		
		}
		
	}// end function
	
	function update_pic(){
		$id=$this->input->post('id_lucky');
    	
	    if($this->input->post('upload_img')!=NULL){	
        $upload_conf = array(
            'upload_path'   => realpath('images/special/'),
            'allowed_types' => 'gif|jpg|png',
            'quality' 		=> '80',
            'max_size'      => '0',
            'encrypt_name'	=> TRUE,
            'encrypt_name'	=>TRUE,
            'width'         => 600,
            'height'        => 400
            );
       
               
       $this->upload->initialize($upload_conf);
       		$this->image_lib->initialize($upload_conf);              
			$this->image_lib->resize(); 
      // $this->image_lib->initialize($upload_conf);	 
      
        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
                $i++;   
            }
            
        }
        // Unset the useless one ;)
        unset($_FILES['userfile']);
        
        // Put each errors and upload data to an array
        $error = array();
        $success = array();
        
        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error 
                $error['upload'][] = $this->upload->display_errors();
            }
            else
            {
            	
				
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();
                               
                // set the resize config
               $resize = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['file_path'].$upload_data['file_name'], 
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                   // 'create_thumbs' => true,
                    'quality' => '80',
                    'remove_spaces' =>TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
                    'width'         => 300,
                    'height'        => 300
                    );
                
                
                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 150,
					    'height' => 150
					);              
					$this->image_lib->initialize($config);              
					$this->image_lib->resize();

                    // initializing
                $this->image_lib->initialize($resize);
                
                
                // do it!
                if ( ! $this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                }
                else
                {
                	// otherwise, put each upload data to an array.
                    $success[] = $upload_data;
                    unlink($upload_data['full_path']);
                 
                 
    		// add images 
    			$idd=$this->input->post('id_lucky');
                    $data_img=array(
                	
                	'lucky_img' => $upload_data['file_name'],
                );
                $this->db->where('lucky_id', $idd);
                $this->db->update('product_lucky', $data_img);
                
                    
                }
            }
        }

        // see what we get
        if(count($error > 0))
        {
            $data['error'] = $error;
        }
        else
        {
            $data['success'] = $upload_data;
        }
        
        redirect("backoffice/special/edit/$id",'refresh');
			exit(); 
      }
	}// end function
	
	function delete_data(){
		$id= $this->uri->segment(4);
		$query = $this->db->get_where('product_lucky', array('lucky_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->lucky_img;
				     $del = unlink("images/special/thumbs/$img");
				     $del2 = unlink("images/special/resize/$img");
				     
				} 
		
		$this->db->where('lucky_id', $id);
		if($this->db->delete('product_lucky'))
			{
			  redirect('backoffice/special/','refresh');
			  exit();	
			}else{
				echo "<script>alert('Delete data fail.');</script>";
				echo "<script>window.location.href = '" . base_url() . "backoffice/special/';</script>";
			} 
	} //end function
	
	

} // end class	
	
?>