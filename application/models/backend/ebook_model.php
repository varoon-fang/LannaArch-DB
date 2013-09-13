<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Ebook_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
// ------------------------ Get Mode ------------------------
function list_cate()
	{
	 	$sql_cate="select * from ebook_group ";
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
        	'ebook_group_name' => $this->input->post('title_th'),

        );
        $query = $this->db->insert('ebook_group', $data);


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
        	'ebook_group_name' => $this->input->post('title_th'),

        );

         $this->db->where('ebook_group_id', $id);
        $query = $this->db->update('ebook_group', $data);


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
	// delete ebook
	$query_act = $this->db->get_where('ebook', array('ebook_group' => $id));
		foreach ($query_act->result_array() as $row)
		{
			$act_id = $row['ebook_id'];
			$ebook_pdf = $row['ebook_pdf'];
			$ebook_example = $row['ebook_example'];

			unlink("images/ebook/$ebook_pdf");
			unlink("images/ebook/$ebook_example");
		}
	$query = $this->db->get_where('ebook_album', array('ebook_id' => $act_id));

			foreach ($query->result() as $row)
			{
			     $img = $row->ebook_album_name;
			     $del = unlink("images/ebook/img/$img");

			}

    $this->db->where('ebook_id', $act_id);
    $this->db->delete('ebook_album');

	$this->db->where('ebook_group', $id);
	$query = $this->db->delete('ebook');

	//delete group
	$this->db->where('ebook_group_id', $id);
	$query = $this->db->delete('ebook_group');
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
// ------------------------ ebook Mode ------------------------

public function insert()
	{
		if (isset($_POST['send']))
        {

            $config['upload_path'] = './images/ebook';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '0';
            $config['encrypt_name']= TRUE;

            $this->upload->initialize($config);

			foreach($_FILES as $field => $file)
            {
               // So lets upload
                if ($this->upload->do_upload($field))
                {
                    $data[$field] = $this->upload->data();

                }
                else
                {
                    $errors = $this->upload->display_errors();
                }
            }
			//add data
	    	$data = array(
	    	   'ebook_group'         => $this->input->post('group'),
			   'ebook_major'         => $this->input->post('major'),
			   'ebook_researcher'    => $this->input->post('research'),
			   'ebook_research_year' => $this->input->post('year'),
	    	   'ebook_title'      	 => $this->input->post('title_th'),
			   'ebook_example'       => $data['file_example']['file_name'],
			   'ebook_pdf'           => $data['file_pdf']['file_name'],
			   'ebook_date'          => date('Y-m-d H:i:s'),
			);
		$query = $this->db->insert("ebook", $data);

		$sql= "select * from ebook order by ebook_id desc limit 1";
			$result = $this->db->query($sql)->result_array();
				foreach($result as $row){
					$ebook_id = $row['ebook_id'];
				}
		unset($_FILES['file_pdf']);
		unset($_FILES['file_example']);


		// ------ add more pic ---------

		$upload_conf = array(
            'upload_path'   => ('./images/ebook/img/'),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
            );

        $this->upload->initialize( $upload_conf );

		$file_img = $_FILES['userfile'];
		foreach($file_img as $key=>$val)
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
        foreach($_FILES as $field_name => $file_2)
        {
            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error
                $error['upload'][] = $this->upload->display_errors();
            }
            else
            {
				$upload_data = $this->upload->data();

				// set the resize config
                $resize = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['file_path'].$upload_data['file_name'],
                   // 'create_thumbs' => true,
                    'quality' => '100',
                    'remove_spaces' => TRUE,
                    'encrypt_name' => true,
                    'new_image'     => $upload_data['file_path'].$upload_data['file_name'],
                    );

					$this->image_lib->resize();

                    // initializing
	                $this->image_lib->initialize($resize);
			}

			// add images
                    $data_img=array(
                	'ebook_id' => "$ebook_id",
                	'ebook_album_name' => $upload_data['file_name'],
                	'ebook_album_num' => $j++,
                );
                $query1 = $this->db->insert('ebook_album', $data_img);

		}

        if($query)
		        {
		        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>Insert data Successful.</strong>
				    </div>');

			    }else{
		        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>Insert data Unsuccessful!</strong>
				    </div>');
			    }

				return ($query);
		}
	} // end function

public function edit_data($id)
	{
		if($this->input->post('del_img')!=NULL)
		{
			foreach( $this->input->post('img_id') as $value ):
				$query1 = $this->db->get_where('ebook_album', array('ebook_album_id' => $value));

				foreach ($query1->result_array() as $row)
				{
				     $img = $row['ebook_album_name'];
				     $del = unlink("images/ebook/img/$img");

				}
		        $this->db->where('ebook_album_id', $value);
		        $query = $this->db->delete('ebook_album');


		    endforeach;
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

    	if($this->input->post('send')!=NULL){

        //add data
	    	$data = array(
	    	   'ebook_group'		=> $this->input->post('group'),
	    	   'ebook_title' 	=> ($this->input->post('title_th')),
			   'ebook_detail' 	=> ($this->input->post('detail_th')),
			);
			$this->db->where('ebook_id', $id);

			$query = ($this->db->update("ebook", $data));

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

public function update_pic($id)
	{
		if($this->input->post('upload_img'))
		{
			$ebook_id = $this->input->post('id_ebook');
		// ------ add more pic ---------
		$upload_conf = array(
            'upload_path'   => ('./images/ebook/img/'),
            'allowed_types' => 'gif|jpg|png',
            'encrypt_name'	=> TRUE,
            );

        $this->upload->initialize( $upload_conf );

		$file_img = $_FILES['userfile'];
		foreach($file_img as $key=>$val)
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
        foreach($_FILES as $field_name => $file_2)
        {
            if ( ! $this->upload->do_upload($field_name))
            {
                // if upload fail, grab error
                $error['upload'][] = $this->upload->display_errors();
            }
            else
            {
				$upload_data = $this->upload->data();

				// set the resize config
                $resize = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['file_path'].$upload_data['file_name'],
                   // 'create_thumbs' => true,
                    'quality' => '100',
                    'remove_spaces' => TRUE,
                    'encrypt_name' => true,
                    'new_image'     => $upload_data['file_path'].$upload_data['file_name'],
                    );

					$this->image_lib->resize();

                    // initializing
	                $this->image_lib->initialize($resize);
			}

			// add images
                    $data_img=array(
                	'ebook_id' => "$ebook_id",
                	'ebook_album_name' => $upload_data['file_name'],
                	'ebook_album_num' => $j++,
                );
                $query1 = $this->db->insert('ebook_album', $data_img);

		}

        if($query1)
		        {
		        	$this->session->set_flashdata('feedback', ' <div class="alert alert-success" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>Insert data Successful.</strong>
				    </div>');

			    }else{
		        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
					    <button class="close" data-dismiss="alert"></button>
					    <strong>Insert data Unsuccessful!</strong>
				    </div>');
			    }

				return ($query1);
		}
	}

public function update_file_pdf()
	{
	    if($this->input->post('upload_img')!=NULL){
        	$config['upload_path'] = './images/ebook';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '0';
            $config['encrypt_name']= TRUE;

            $this->upload->initialize($config);

            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
                        $data[$field] = $this->upload->data();

					}
                    else
                    {
                        $errors = $this->upload->display_errors();
                    }
                }
               // print_r($data);

            }

    		// add images
    			$idd=$this->input->post('id_ebook');
                    $data_img =array(
                	'ebook_pdf' => $data['file_pdf']['file_name'],

                );
                $this->db->where('ebook_id', $idd);
                $query = $this->db->update('ebook', $data_img);

				if(!$query)
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
	}// end function

public function update_file_example()
	{
	    if($this->input->post('upload_img')!=NULL){
        	$config['upload_path'] = './images/ebook';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '0';
            $config['encrypt_name']= TRUE;

            $this->upload->initialize($config);

            foreach($_FILES as $field => $file)
            {
                // No problems with the file
                if($file['error'] == 0)
                {
                    // So lets upload
                    if ($this->upload->do_upload($field))
                    {
                        $data[$field] = $this->upload->data();

					}
                    else
                    {
                        $errors = $this->upload->display_errors();
                    }
                }
               // print_r($data);

            }

    		// add images
    			$idd=$this->input->post('id_ebook');
                    $data_img =array(
                	'ebook_example' => $data['file_example']['file_name'],

                );
                $this->db->where('ebook_id', $idd);
                $query = $this->db->update('ebook', $data_img);

				if(!$query)
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
	}// end function

public function delete_pdf($id)
    {
    	$query = $this->db->get_where('ebook', array('ebook_pdf' => $id));

				foreach ($query->result_array() as $row)
				{
					 $idd = $row['ebook_id'];
				     $pdf = $row['ebook_pdf'];
				     $del = unlink("images/ebook/$pdf");

				}
				$data = array(
					'ebook_pdf' => NULL,
				);
        $this->db->where('ebook_id', $idd);
        $query = $this->db->update('ebook', $data);

        if(!$query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Successful.</strong>
		    </div>');
		}else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Unsuccessful!</strong>
		    </div>');
		}
		return($query);
    }

public function delete_example($id)
    {
    	$query = $this->db->get_where('ebook', array('ebook_example' => $id));

				foreach ($query->result_array() as $row)
				{
					 $idd = $row['ebook_id'];
				     $pdf = $row['ebook_example'];
				     $del = unlink("images/ebook/$pdf");

				}
				$data = array(
					'ebook_example' => NULL,
				);
        $this->db->where('ebook_id', $idd);
        $query = $this->db->update('ebook', $data);

        if(!$query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Successful.</strong>
		    </div>');
		}else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Unsuccessful!</strong>
		    </div>');
		}
		return($query);
    }

public function delete_img($id)
    {
    	$query = $this->db->get_where('ebook_album', array('ebook_album_id' => $id));

				foreach ($query->result_array() as $row)
				{
				     $img = $row['ebook_album_name'];
				     $del = unlink("images/ebook/img/$img");

				}
        $this->db->where('ebook_album_id', $id);
        $query = $this->db->delete('ebook_album');

        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Successful.</strong>
		    </div>');
		}else {
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Unsuccessful!</strong>
		    </div>');
		}
		return($query);
    }

public function delete()
    {
    	$id = $this->uri->segment(4);
    	$query = $this->db->get_where('ebook', array('ebook_id' => $id));

				foreach ($query->result() as $row)
				{
				     $example = $row->ebook_example;
				     $pdf = $row->ebook_pdf;
				     $del = unlink("images/ebook/$example");
				     $del2 = unlink("images/ebook/$pdf");

				}
		$query_2= $this->db->get_where('ebook_album', array('ebook_id' => $id));

				foreach ($query_2->result() as $row)
				{
				     $img = $row->ebook_album_name;
				     $del = unlink("images/ebook/img/$img");
				 }
		$this->db->where('ebook_id', $id);
        $query = $this->db->delete('ebook_album');

        $this->db->where('ebook_id', $id);
        $query = $this->db->delete('ebook');
        if($query)
        {
        	$this->session->set_flashdata('feedback', ' <div class="alert alert-error" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Successful.</strong>
		    </div>');

	    }else{
        	$this->session->set_flashdata('feedback', '<div class="alert alert-warning" id="alert-message">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    <strong>Delete data Unsuccessful!</strong>
		    </div>');
	    }

        return ($query);
    }

public function change_num()
    {
	    $action = ($this->input->post('action'));
		 $updateRecordsArray = $this->input->post('recordsArray');

		if ($action == "updateRecord"){

			$listingCounter = 1;
			foreach ($updateRecordsArray as $recordIDValue) {


				$data = array(
					'ebook_album_num' => "$listingCounter",

				);

				$this->db->where('ebook_album_id', "$recordIDValue");
				$query = $this->db->update("ebook_album", $data);

				$listingCounter = $listingCounter + 1;
			}
		}
	}


} // end class

?>