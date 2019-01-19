<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Church extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add() {
		
		$data = array(
			'name' => $this->input->post('name'), 
			'short_name' => $this->input->post('short_name'), 
			'mini_logo' => $this->input->post('mini_logo'), 
			'description' => $this->input->post('description'), 
			'denomination' => $this->input->post('denomination') 
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

	public function get_church($attrib, $value) {
		$this->db->where($attrib, $value);
		$data = $this->db->get('churches');
		$data = $data->result_array();

		return $data[0];
	}



}