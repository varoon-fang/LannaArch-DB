<?php if( !defined('BASEPATH')) exit('No direct script access allowed');

class Tree_d extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model("backend/tree_d_model");

        if($this->session->userdata['logged_in']['status']!="yes"){
			redirect('admin/dashboard');
			exit;
		}
    }

	public function index()
	{
    	$sql="select * from 3d ";
			$res=$this->db->query($sql);
				$data['res_3d'] = $res;

    	$this->load->view('admin/3d/index', $data);
    }

	public function add()
    {

    	$this->load->view('admin/3d/add');

	    $add_head = new tree_d_model();
	        if($add_head->insert())
	        {
	        	redirect('admin/tree_d', $data);
	         }
	} // end function

    function edit($id)
	{
		$sql="select * from 3d where 3d_id='$id' ";
			$rs=$this->db->query($sql);

			if($this->db->query($sql)->num_rows()!=1){
				echo "<script>alert('ไม่พบข้อมูล')</script>";
				echo "<script>window.location.href='". base_url() ."admin/tree_d'</script>";
			}

			if($rs->num_rows()==0){
				$data['rs']=array();
			}else{
				$data['rs']=$rs->row_array();
			}
		$sql2="select * from 3d_album where 3d_id='$id' order by 3d_album_num asc ";
			$res=$this->db->query($sql2);

				$data['rs_3d_img']=$res;

		$this->load->view('admin/3d/edit', $data);

	    $add_head = new tree_d_model();
	        if($add_head->edit_data($id))
	        {
	        	redirect("admin/tree_d/edit/$id", $data);
	         }
	}// end function edit

	public function edit_pic($id){

    	$id_3d = $this->input->post('id_3d');
			$post = new tree_d_model();
	        if ($post->update_pic($id)) {
	            redirect("admin/tree_d/edit/$id_3d");
	        }

	} //end function edit pic

	public function delete_image($id)
    {
    	$sql2="select * from 3d_album where 3d_album_id='$id'";
			$res=$this->db->query($sql2);
			foreach($res->result_array() as $row){
				$id_3d = $row['3d_id'];
			}
        $post = new tree_d_model();
        if ($post->delete_img($id)) {
            redirect("admin/tree_d/edit/$id_3d");
        }
    }

	public function delete($id)
    {
        $post = new tree_d_model();
        if ($post->delete_data($id)) {
            redirect('admin/tree_d/');
        }
    }

   public function update_number(){

    	$this->tree_d_model->change_num();
   }

}// end class