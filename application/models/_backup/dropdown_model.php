<?php
class Dropdown_model extends CI_Model{
	
	public $option_id = null;

	function __construc(){
		parent::__construc();
	}


	function getOptions(){
		$options = $this->db->select('*')
						->get('province')->result();

		$options_arr;

		$options_arr[''] = '-- เลือกจังหวัด --';

		// Format for passing into form_dropdown function

		foreach ($options as $option) {
			$options_arr[$option->province_id] = $option->province_name;
		}

		return $options_arr;
	}

	function getSubOptions(){
		if(!is_null($this->option_id)){
			$this->db->select('*');
			$this->db->where('province_id', $this->option_id);
			$suboptions = $this->db->get('amphur');

			// if there are suboptinos for this option...
			if($suboptions->num_rows() > 0){
				$suboptions_arr;
				
				// Format for passing into jQuery loop

				foreach ($suboptions->result() as $SubOption)
				{
					$suboptions_arr[$SubOption->amphur_id] = $SubOption->amphur_name;
				}

				return $suboptions_arr;
			}else{
				$suboptions_arr['0'] = '-- Please Select Option --';
				return $suboptions_arr;
			}
		}

		return;
	}
	
	// show edit data
	/*
function getOptions_edit(){
		$options = $this->db->select('*')
						->get('province')->result();

		$options_arr;

		//$options_arr[''] = '-- เลือกจังหวัด --';

		// Format for passing into form_dropdown function

		foreach ($options as $option) {
			$options_arr[$option->province_id] = $option->province_name;
		}

		return $options_arr;
	}

	function getSubOptions_edit(){
		if(!is_null($this->option_id)){
			$this->db->select('*');
			$this->db->where('province_id', $this->option_id);
			$suboptions = $this->db->get('amphur');

			// if there are suboptinos for this option...
			if($suboptions->num_rows() > 0){
				$suboptions_arr;
				
				// Format for passing into jQuery loop

				foreach ($suboptions->result() as $SubOption)
				{
					$suboptions_arr[$SubOption->amphur_id] = $SubOption->amphur_name;
				}

				return $suboptions_arr;
			}else{
				$suboptions_arr['0'] = '-- Please Select Option --';
				return $suboptions_arr;
			}
		}

		return;
	}
*/
	
}
?>