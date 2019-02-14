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
		$colors = array('#00c0ef', '#0073b7', '#3c8dbc', '#39cccc', '#f39c12', '#ff851b', '#00a65a', '#01ff70', '#dd4b39', '#605ca8', '#f012be', '#777777', '#001f3f');		
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

	public function latest_families(){
		$this->db->limit(12);
		$this->db->order_by('created', 'DESC');
		$res = $this->db->get('families')->result_array();
		return $res;
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

	public function get_all_for_export() {
		$this->db->select(array('name', 'subcity', 'kebele', 'house_number', 'wedding_year', 'home_phone', 'created'));
		$res = $this->db->get('families');
		return $res->result_array();
	}

}