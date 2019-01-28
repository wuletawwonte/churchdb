<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add() {
		$data = array(
			'name' => $this->input->post('name'), 
			'subcity' => $this->input->post('subcity'),
			'kebele' => $this->input->post('kebele'),
			'house_number' => $this->input->post('house_number'),
			'home_phone' => $this->input->post('home_phone'),
			'wedding_year' => $this->input->post('wedding_year')
			);
		$members = $this->input->post('members');
		try{
			$this->db->insert('families', $data);
			return 'success';
		} catch(Exception $e) {
			return 'error';
		}
	}

	public function get_all() {
		$data = $this->db->get('families');
		return $data->result_array();	
	}


}