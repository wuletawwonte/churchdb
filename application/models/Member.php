<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add($data) {
		$this->db->insert('members', $data);
		return true;
	}

	public function get_all($attrib, $order) {
		$this->db->order_by($attrib, $order);
		$data = $this->db->get('members');
		return $data->result_array();			
	}







}