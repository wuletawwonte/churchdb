<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Church extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add() {
		
		$data = array(
			'name' => $this->input->post('name'), 
			'description' => $this->input->post('description') 
			);
		if($this->db->insert('churches', $data)) {
			return true;
		} else {
			return false;
		}

	}

	public function get_all() {
		$res = $this->db->get('churches');	
		return $res->result_array();
	}



}