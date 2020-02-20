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


}