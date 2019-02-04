<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add($data) {
		$colors = array("#00ff00", "#4ABDAC", "#FC4A1A", "#F7B733", "#07889B", "#6D7993");
		$data['profile_color'] = $colors[array_rand($colors, 1)]; 
		$this->db->insert('members', $data);
		return true;
	}

	public function get_all($attrib, $order, $limit = NULL, $start = NULL) {
        $this->db->limit($limit, $start);

		$this->db->order_by($attrib, $order);
		$data = $this->db->get('members');
		return $data->result_array();			
	}

	public function record_count() {
		return $this->db->count_all('members');
	}

	public function get_one($id = NULL) {
		$res = $this->db->get_where('members', array('id' => $id));
		$res = $res->result_array();
		return  $res[0];
	}





}