<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership_level extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$data = $this->db->get('membership_levels');
		return $data->result_array();
	}

	public function add_choice() {
		$data = array(
			'membership_level_title' => $this->input->post('membership_level_title')
			);
		if($this->db->insert('membership_levels', $data)) {
			return true;
		} else {
			return false;
		}
		
	}

}