<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Information_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
// ------------------------ Get Mode ------------------------
function list_cate()
	{
	 	$sql_cate="select * from information_group ";
			$list_cate=$this->db->query($sql_cate);

			return $list_cate;
	}


// ------------------------ Category Mode ------------------------
function insert_cate()
{
	// add data
	if($this->input->post('send')!=NULL)
	{
            $data=array(
        	'information_group_name' => $this->input->post('title_th'),

        );
        $query = $this->db->insert('information_group', $data);


        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Insert data successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Insert data Unsuccessful!</strong>
		    </div>');

	    }
    }
	   return ($query);
}// end function

function edit_cate($id)
{
	// add data
	if($this->input->post('send')!=NULL)
	{
            $data=array(
        	'information_group_name' => $this->input->post('title_th'),

        );

         $this->db->where('information_group_id', $id);
        $query = $this->db->update('information_group', $data);


        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Edit data successful.</strong>
		    </div>');
        	//$data = "Successful";

	    }else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Edit data Unsuccessful!</strong>
		    </div>');

	    }
    }
	   return ($query);
}// end function

function delete_cate($id)
{
	// delete information
	$query_act = $this->db->get_where('information', array('information_group' => $id));
		foreach ($query_act->result_array() as $row)
		{
			$act_id = $row['information_id'];
		}
	$query = $this->db->get_where('information_album', array('information_id' => $act_id));

			foreach ($query->result() as $row)
			{
			     $img = $row->information_album_name;
			     $del = unlink("images/information/thumbs/$img");
			     $del2 = unlink("images/information/resize/$img");

			}

    $this->db->where('information_id', $act_id);
    $this->db->delete('information_album');

	$this->db->where('information_group', $id);
	$query = $this->db->delete('information');

	//delete group
	$this->db->where('information_group_id', $id);
	$query = $this->db->delete('information_group');
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
// ------------------------ information Mode ------------------------
	function insert(){
		if($this->input->post('send')!=NULL){
        $upload_conf = array(
            'upload_path'   => ('./images/information/'),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
            );

        $this->upload->initialize( $upload_conf );

        //add data
	    	$data = array(
	    	   'information_group'		=> $this->input->post('group'),
	    	   'information_title' 	=> ($this->input->post('title_th')),
			   'information_detail' 	=> ($this->input->post('detail_th')),
			   'information_date' 		=> date('Y-m-d H:i:s'),
			);
		$this->db->insert("information", $data);

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
                  // select information
                  $sql="select * from information order by information_id desc limit 1";
		    		$rs=$this->db->query($sql)->result();

		    		foreach($rs as $row){
		    			$idd=$row->information_id;

		    		}
    		// add images
                    $data_img=array(
                	'information_id' => "$idd",
                	'information_album_name' => $upload_data['file_name'],
                	'information_album_num' => $j++,
                );
                $query = $this->db->insert('information_album', $data_img);

                }
            }
        } // end loop upload images

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

	function edit_data($id){
		if($this->input->post('del_img')!=NULL){
			foreach( $this->input->post('img_id') as $value ):

			    //echo $value;
			    $query = $this->db->get_where('information', array('information_id' => $value));

				foreach ($query->result() as $row)
				{
				     $img = $row->information_img;
				     $del = unlink("images/information/thumbs/$img");
				     $del2 = unlink("images/information/resize/$img");

				}
					$data = array(
						'information_img' => "NULL",
					);
			    $this->db->where('information_id', $value);
			    $this->db->update('information', $data);

		    endforeach;


    	}
    	if($this->input->post('send')!=NULL){

        //add data
	    	$data = array(
	    	   'information_group'		=> $this->input->post('group'),
	    	   'information_title' 	=> ($this->input->post('title_th')),
			   'information_detail' 	=> ($this->input->post('detail_th')),
			);
			$this->db->where('information_id', $id);

			$query = ($this->db->update("information", $data));

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

	function update_pic(){
		$id=$this->input->post('id_information');

	    if($this->input->post('upload_img')!=NULL){
        $upload_conf = array(
            'upload_path'   => realpath('images/information/'),
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
           // $j = 1;
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
             //count img
             	$sql = $this->db->get_where('information_album', array('information_id' => $id));
             		$count= $sql->num_rows();
			 		$j=$count+1;
    		// add images
    			$idd=$this->input->post('id_information');
                    $data_img=array(
                	'information_album_num' => $j++,
                	'information_album_name' => $upload_data['file_name'],
                	'information_id' =>$id
                );
               // $this->db->where('information_id', $id);
                $query = $this->db->insert('information_album', $data_img);


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
	}// end function

function delete_img($id)
    {
    	$id = $this->uri->segment(4);
    	$query = $this->db->get_where('information_album', array('information_album_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->information_album_name;
				     $del = unlink("images/information/thumbs/$img");
				     $del2 = unlink("images/information/resize/$img");

				}

        $this->db->where('information_album_id', $id);
        $query = $this->db->delete('information_album');

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

function delete()
    {
    	$id = $this->uri->segment(4);
    	$query = $this->db->get_where('information_album', array('information_id' => $id));

				foreach ($query->result() as $row)
				{
				     $img = $row->information_album_name;
				     $del = unlink("images/information/thumbs/$img");
				     $del2 = unlink("images/information/resize/$img");

				}

        $this->db->where('information_album_id', $id);
        $this->db->delete('information_album');

         $this->db->where('information_id', $id);
        $query = $this->db->delete('information');
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