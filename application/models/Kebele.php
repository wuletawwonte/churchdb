<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebele extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$data = $this->db->get('kebeles');
		return $data->result_array();
	}








}