<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Change extends CI_Controller{

	public function language() 
	{
		$lang = $this->uri->segment(3);
		$uri = $this->input->get('uri');
		
		if($lang == 'english' || $lang == 'thailand'){
			$this->session->set_userdata('language', $lang);
			redirect($uri, 'refresh');
			//echo "<script>history.go(-1);</script>";
			//echo "<script>location.reload();</script>";
		}else{
						
			redirect("/");
		}
	}

}// end class