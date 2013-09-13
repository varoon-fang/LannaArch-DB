<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function insert_1(){

        $upload_conf = array(
            'upload_path'   => ('./images/banner/'),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
            'quality' 		=> '100',
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
                    'quality' => '100',
                    'remove_spaces' => TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
                    'width'         => 1170,
                    'height'        => 407
                    );


                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
					    'width' => 380,
					    'height' => 108
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
                    $data_img=array(
                	'banner_head_name' => $upload_data['file_name'],

                );
                $query = $this->db->insert('banner_head', $data_img);


                }
            }
        }
        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload images Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload images Unsuccessful!</strong>
		    </div>');
        	//$data = "whoops!";
	    }
	   return ($query);


	}// end function

	function insert_2(){
		 if($this->input->post('send')!=NULL){
        $upload_conf = array(
            'upload_path'   => ('./images/banner/'),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
            'quality' 		=> '100',
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
                    'quality' => '100',
                    'remove_spaces' => TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
                    'width'         => 1170,
                    'height'        => 407
                    );


                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 380,
					    'height' => 153
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
               //count img
             	$sql = $this->db->get('banner_top');
             		$count= $sql->num_rows();
			 		$j=$count+1;

    		// add images
                    $data_img=array(
                	'banner_top_name' => $upload_data['file_name'],
                	'banner_top_num' =>$j++

                );
                $query = $this->db->insert('banner_top', $data_img);


                }
            }
        }
		if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload images Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload images Unsuccessful!</strong>
		    </div>');
        	//$data = "whoops!";
	    }
	   return ($query);


     }

	}// end function

	function insert_3(){
		 if($this->input->post('send')!=NULL){
        $upload_conf = array(
            'upload_path'   => ('./images/banner/'),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
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
                    'quality' => '100',
                    'remove_spaces' => TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
                    'width'         => 221,
                    'height'        => 314
                    );


                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
					    'width' => 121,
					    'height' => 164
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
                    $data_img=array(
                	'banner_buttom_name' => $upload_data['file_name'],

                );
                $query = $this->db->insert('banner_buttom', $data_img);


                }
            }
        }
		if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload images Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload images Unsuccessful!</strong>
		    </div>');
        	//$data = "whoops!";
	    }
	   return ($query);


     }

	}// end function

	function insert_4(){
		 if($this->input->post('send')!=NULL){
        $upload_conf = array(
            'upload_path'   => ('./images/banner/'),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
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
                    'quality' => '100',
                    'remove_spaces' => TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
                    'width'         => 221,
                    'height'        => 162
                    );


                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 121,
					    'height' => 83
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
                    $data_img=array(
                	'banner_size_name' => $upload_data['file_name'],

                );
                $query = $this->db->insert('banner_size', $data_img);


                }
            }
        }
		if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload images Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload images Unsuccessful!</strong>
		    </div>');
        	//$data = "whoops!";
	    }
	   return ($query);

     }

	}// end function
// ----------------------- Delete banner -----------------------
	function delete_banner_1(){
		$id= $this->uri->segment(4);

		$query = $this->db->get_where('banner_head', array('banner_head_id' => $this->id));

			foreach ($query->result() as $row)
			{
			     $img = $row->banner_head_name;
			     $del = unlink("images/banner/thumbs/$img");
			     $del2 = unlink("images/banner/resize/$img");

			}

		$this->db->where('banner_head_id', $id);
		$del_query = ($this->db->delete('banner_head'));

		if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete images Successful.</strong>
		    </div>');

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete images Unsuccessful!</strong>
		    </div>');

	    }

		return ($del_query);
	} //end function

	function delete_banner_2(){
		$id= $this->uri->segment(4);

		$query = $this->db->get_where('banner_top', array('banner_top_id' => $id));

			foreach ($query->result() as $row)
			{
			     $img = $row->banner_top_name;
			     $del = unlink("images/banner/thumbs/$img");
			     $del2 = unlink("images/banner/resize/$img");

			}

		 $this->db->where('banner_top_id', $id);
		$query =$this->db->delete('banner_top');
		if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete images Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete images Unsuccessful!</strong>
		    </div>');
        	//$data = "whoops!";
	    }
	   return ($query);

	} //end function

	function delete_banner_3(){
		$id= $this->uri->segment(4);

		$query = $this->db->get_where('banner_buttom', array('banner_buttom_id' => $id));

			foreach ($query->result() as $row)
			{
			     $img = $row->banner_head_name;
			     $del = unlink("images/banner/thumbs/$img");
			     $del2 = unlink("images/banner/resize/$img");

			}

		$this->db->where('banner_buttom_id', $id);
		$query = $this->db->delete('banner_buttom');
		if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete images Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else{
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete images Unsuccessful!</strong>
		    </div>');
        	//$data = "whoops!";
	    }
	   return ($query);
   } //end function

	function delete_banner_4(){
		$id= $this->uri->segment(4);

		$query = $this->db->get_where('banner_size', array('banner_size_id' => $id));

			foreach ($query->result() as $row)
			{
			     $img = $row->banner_head_name;
			     $del = unlink("images/banner/thumbs/$img");
			     $del2 = unlink("images/banner/resize/$img");

			}

		$this->db->where('banner_size_id', $id);
		$query = $this->db->delete('banner_size');
		if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete images Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else{
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete images Unsuccessful!</strong>
		    </div>');
        	//$data = "whoops!";
	    }
	   return ($query);
   } //end function

} // end class

?>