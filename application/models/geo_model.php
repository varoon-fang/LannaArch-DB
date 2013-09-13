<?php
class Geo_model extends CI_Model{
	
	public $option_id = null;

	function __construc(){
		parent::__construc();
	}


	function getOptions(){
		$options = $this->db->select('*')
						->get('geography')->result();

		$options_arr;

		$options_arr[''] = 'ท้ังหมด';

		// Format for passing into form_dropdown function

		foreach ($options as $option) {
			$options_arr[$option->geo_id] = $option->geo_name;
		}

		return $options_arr;
	}
	
	
	function getSubOptions(){
		if(!is_null($this->option_id)){
			$this->db->select('*');
			$this->db->where('geo_id', $this->option_id);
			$suboptions = $this->db->get('province');

			// if there are suboptinos for this option...
			if($suboptions->num_rows() > 0){
				$suboptions_arr;
				
				// Format for passing into jQuery loop

				foreach ($suboptions->result() as $SubOption)
				{
					$suboptions_arr[$SubOption->province_id] = $SubOption->province_name;
				}

				return $suboptions_arr;
			}else{
				$suboptions_arr['0'] = '-- ทั้งหมด --';
				return $suboptions_arr;
			}
		}

		return;
	}
	
}
?>