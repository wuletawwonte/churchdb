<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Age_group extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$res = $this->db->get('age_groups');
		return $res->result_array();
	}

	public function editagegroup() {
		$data = array(
			'start_age' => $this->input->post('start_age'), 
			'end_age' => $this->input->post('end_age')
			);
		$this->db->where('ag_id', $this->input->post('ag_id'));
		if($this->db->update('age_groups', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_one($id){
		$this->db->where('age_groups.ag_id', $id);
		$res = $this->db->get('age_groups');

		return $res->result_array()[0];
	}



}
 