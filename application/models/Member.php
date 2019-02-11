<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add_from_family($data, $family_id) {
		$colors = array("#00c0ef", "#dd4b39", "#00a65a", "#f39c12", "#932ab6", "#f56954");
		$data->profile_color = $colors[array_rand($colors, 1)];
		$data->family_id = $family_id; 
		$this->db->insert('members', $data);
		$last_id = $this->db->insert_id();
		
		$tracked_change = array(
			'by_user' => $this->session->userdata('name'),
			'change_occured' => "created",
			'member_id' => $last_id
			);
		$this->db->insert('timelines', $tracked_change);

		return true;
	}

	public function add($data) {
		$colors = array("#00c0ef", "#dd4b39", "#00a65a", "#f39c12", "#932ab6", "#f56954");
		$data['profile_color'] = $colors[array_rand($colors, 1)]; 
		$this->db->insert('members', $data);
		$last_id = $this->db->insert_id();
		$tracked_change = array(
			'by_user' => $this->session->userdata('name'),
			'change_occured' => "created",
			'member_id' => $last_id
			);
		$this->db->insert('timelines', $tracked_change);

		return true;
	}

	public function edit($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('members', $data);
		$tracked_change = array(
			'by_user' => $this->session->userdata('name'),
			'change_occured' => "updated",
			'member_id' => $id
			);
		$this->db->insert('timelines', $tracked_change);
		return true;
	}

	public function get_all_sorted($attrib, $order, $limit = NULL, $start = NULL) {
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

	public function filtered_members_count() {
		$this->db->like('firstname', $this->input->post('name'));
		$this->db->or_like('middlename', $this->input->post('name'));
        $this->db->where('gender', $this->input->post('gender'));
		$this->db->from('members');
		return $this->db->count_all_results();
	}

	public function get_filtered_sorted($attrib, $order, $limit = NULL, $start = NULL) {
        $this->db->limit($limit, $start);
        $this->db->like('firstname', $this->input->post('name'));
        $this->db->or_like('middlename', $this->input->post('name'));
        $this->db->where('gender', $this->input->post('gender'));
		$this->db->order_by($attrib, $order);
		$data = $this->db->get('members');
		return $data->result_array();			
	}

	public function get_by_attrib($attrib, $id) {
		$this->db->where('id', $id);
		$res = $this->db->get('members');
		$res = $res->result_array();
		return $res[0][$attrib];
	}

	public function members_in_family($id) {
		$this->db->where('family_id', $id);
		$res = $this->db->get('members');
		return $res->result_array();
	}















}