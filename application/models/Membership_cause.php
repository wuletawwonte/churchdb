<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership_cause extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$data = $this->db->get('membership_causes');
		return $data->result_array();
	}

	public function add_choice() {
		$data = array(
			'membership_cause_title' => $this->input->post('membership_cause_title')
			);
		if($this->db->insert('membership_causes', $data)) {
			return true;
		} else {
			return false;
		}
		
	}



}