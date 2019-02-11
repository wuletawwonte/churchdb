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
		$colors = array("#00c0ef", "#dd4b39", "#00a65a", "#f39c12", "#932ab6", "#f56954");
		$data['profile_color'] = $colors[array_rand($colors, 1)];
		$this->db->insert('families', $data);
		return true;
	}

	public function get_all($attrib, $order, $limit = NULL, $start = Null) {
       $this->db->limit($limit, $start);

		$this->db->order_by($attrib, $order);
		$data = $this->db->get('families');
		return $data->result_array();	
	}


	public function get_one($id) {
		$res = $this->db->get_where('families', array('id' => $id));
		$res = $res->result_array();
		return  $res[0];
	}

	public function get_by_attrib($attrib, $name) {
		$this->db->where('name', $name);
		$res = $this->db->get('families');
		$res = $res->result_array();
		return $res[0]['id'];
	}


}