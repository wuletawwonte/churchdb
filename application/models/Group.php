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

	public function get_sunday_classes() {
		$this->db->where('type', 'የሰንበት ትምህርት ቡድን');
		$res = $this->db->get('groups');
		return $res->result_array();
	}

	public function get_assigned_groups($id) {

		$this->db->select('groups.gid, groups.name, groups.type, groups.created, group_members.role');
		$this->db->from('groups');
		$this->db->where('group_members.member_id', $id);
		$this->db->join('group_members', 'groups.gid = group_members.group_id', 'INNER');
		$res = $this->db->get();

		return $res->result_array();
	}


}