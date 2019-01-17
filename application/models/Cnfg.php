<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnfg extends CI_Model {

	public function __construct() {
		parent::__construct();

		
	}


	public function get($name) {
		$this->db->where('name', $name);
		$data = $this->db->get('cnfg');
		$data = $data->result_array();
		return $data[0]['value'];
	}



}