<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kifle_ketema extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$data = $this->db->get('kifle_ketemas');
		return $data->result_array();
	}







}