<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function record_count() {
		return $this->db->count_all('groups');
	}

	public function get_all($attrib, $order, $limit = NULL, $start = Null) {
        $this->db->limit($limit, $start);

		$this->db->order_by($attrib, $order);
		$data = $this->db->get('groups');
		return $data->result_array();	
	}

	public function add() {
		$data = array(
			'type' => $this->input->post('type'), 
			'name' => $this->input->post('name')
			);
		$this->db->insert('groups', $data);
	}

	public function get_one($id) {
		$this->db->where('gid', $id);
		$res = $this->db->get('groups');
		$res = $res->result_array();
		return $res[0];
	}




}