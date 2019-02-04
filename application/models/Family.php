<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function record_count() {
		return $this->db->count_all('families');
	}


	public function add($data) {

		$this->db->insert('families', $data);
		return true;
	}

	public function get_all_paginated($attrib, $order, $limit, $start) {
       $this->db->limit($limit, $start);

		$this->db->order_by($attrib, $order);
		$data = $this->db->get('families');
		return $data->result_array();	
	}

	public function get_all($attrib, $order) {

		$this->db->order_by($attrib, $order);
		$data = $this->db->get('families');
		return $data->result_array();	
	}


}