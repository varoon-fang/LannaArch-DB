<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Models_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

	function insert(){
		if($this->input->post('send')!=NULL){
        $upload_conf = array(
            'upload_path'   => ('./images/models/'),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
            );

        $this->upload->initialize( $upload_conf );

        //add data
	    	$data = array(
	    	   'models_title' 	=> ($this->input->post('title_th')),
			   'models_detail' 	=> ($this->input->post('detail_th')),
			   'models_date' 	=> date('Y-m-d H:i:s'),
			);
		$this->db->insert("models", $data);

        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
            $j = 1;
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
                    'quality' => '100',
                    'remove_spaces' => TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
                    'width'         => 800,
                    'height'        => 533
                    );


                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 285,
					    'height' => 190
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
                  // select activity
                  $sql="select * from models order by models_id desc limit 1";
		    		$rs=$this->db->query($sql);

		    		foreach($rs->result_array() as $row){
		    			$idd=$row['models_id'];

		    		}
    		// add images
                    $data_img=array(
                	'models_id' => "$idd",
                	'models_album_name' => $upload_data['file_name'],
                	'models_album_num' => $j++,
                );
                $query = $this->db->insert('models_album', $data_img);



                }
            }
        }
		 if($query)
		        {
		        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <strong>Upload data Successful.</strong>
				    </div>');
		        	//$data = "Successful";

			    }else{
		        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <strong>Delete data Unsuccessful!</strong>
				    </div>');
			    }

				return ($query);
    }
	} // end function

	function edit_data(){
		$id =$this->uri->segment(4);

		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):

			    $query = $this->db->get_where('models', array('models_id' => $value));

				foreach ($query->result_array() as $row)
				{
				     $img = $row['models_img'];
				     $del = unlink("images/models/thumbs/$img");
				     $del2 = unlink("images/models/resize/$img");

				}
					$data = array(
						'models_img' => "NULL",
					);
			    $this->db->where('models_id', $value);
			    $this->db->update('models', $data);

		    endforeach;


    	}
    	if($this->input->post('send')!=NULL){
	    	$data = array(
			   'models_title' 	=> ($this->input->post('title_th')),
			   'models_detail' 	=> ($this->input->post('detail_th')),
			);

			$this->db->where('models_id', $id);

			$query = ($this->db->update("models", $data));

			 if($query)
		        {
		        	$this->session->set_flashdata('feedback_edit', ' <div class="alert alert-success" id="alert-message">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <strong>Edit data Successful.</strong>
				    </div>');
		        	//$data = "Successful";

			    }else{
		        	$this->session->set_flashdata('feedback_edit', '<div class="alert alert-warning" id="alert-message">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <strong>Edit data Unsuccessful!</strong>
				    </div>');
			    }

				return ($query);

		}

	}// end function

	function update_pic($id){

	    if($this->input->post('upload_img')!=NULL){
        $upload_conf = array(
            'upload_path'   => realpath('images/models/'),
            'allowed_types' => 'gif|jpg|png',
            'quality' 		=> '80',
            'max_size'      => '0',
            'encrypt_name'	=> TRUE,
            'encrypt_name'	=>TRUE,
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
                    'quality' => '80',
                    'remove_spaces' =>TRUE,
                    'maintain_ratio' => false,
                    'new_image'     => $upload_data['file_path'].'thumbs/'.$upload_data['file_name'],
                    'width'         => 800,
                    'height'        => 533
                    );


                    $config = array(
					    'image_library' => 'gd2',
					    'quality' => '100',
					    'remove_spaces' => TRUE,
					    'maintain_ratio' => false,
					    'source_image' => $upload_data['file_path'].$upload_data['file_name'],
					    'new_image' => $upload_data['file_path'].'resize/'.$upload_data['file_name'],
					    'width' => 285,
					    'height' => 190
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

              $idd=$this->input->post('id_models');
             //count img
             	$sql = $this->db->get_where('models_album', array('models_id' => $idd));
             		$count= $sql->num_rows();
			 		$j=$count+1;
    		// add images

                    $data_img=array(
                    'models_id' => $idd,
                	'models_album_num' => $j,
                	'models_album_name' => $upload_data['file_name'],
                );
               $query = $this->db->insert('models_album', $data_img);


                }
            }
        }// end loop upload images

       if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Upload data Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else{
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Unsuccessful!</strong>
		    </div>');
	    }

		return ($query);
      }
	}// end function

	function delete_img($id)
    {
    	$id = $this->uri->segment(4);
    	$query = $this->db->get_where('models_album', array('models_album_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->activity_album_name;
				     $del = unlink("images/models/thumbs/$img");
				     $del2 = unlink("images/models/resize/$img");

				}

        $this->db->where('models_album_id', $id);
        $query = $this->db->delete('models_album');

        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else{
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Unsuccessful!</strong>
		    </div>');
	    }

        return ($query);

    }

	function delete_data($id)
    {
    	$query = $this->db->get_where('models_album', array('models_id' => $id));

				foreach ($query->result_array() as $row)
				{
				     $img = $row['models_album_name'];
				     $del = unlink("images/models/thumbs/$img");
				     $del2 = unlink("images/models/resize/$img");

				}

        $this->db->where('models_id', $id);
        $query= $this->db->delete('models');
        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else{
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Unsuccessful!</strong>
		    </div>');
	    }

        return ($query);
    }

} // end class

?>