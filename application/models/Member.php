<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add_from_family($data, $family_id) {
		$colors = array('#00c0ef', '#0073b7', '#3c8dbc', '#39cccc', '#f39c12', '#ff851b', '#00a65a', '#01ff70', '#dd4b39', '#605ca8', '#f012be', '#777777', '#001f3f');		
		$data->profile_color = $colors[array_rand($colors, 1)];
		$data->family_id = $family_id; 
		$this->db->insert('members', $data);
		$last_id = $this->db->insert_id();
		if($data->family_role == 'ባል') {
			$this->db->where('id', $family_id);
			$this->db->update('families', array('head_id' => $last_id));
		}
		$tracked_change = array(
			'by_user' => $this->session->userdata('name'),
			'change_occured' => "created",
			'member_id' => $last_id
			);
		$this->db->insert('timelines', $tracked_change);

		return true;
	}

	public function add() {
		$colors = array('#00c0ef', '#0073b7', '#3c8dbc', '#39cccc', '#f39c12', '#ff851b', '#00a65a', '#01ff70', '#dd4b39', '#605ca8', '#f012be', '#777777', '#001f3f');		
		$data = array(
			'title' => $this->input->post('title'), 
			'firstname' => $this->input->post('firstname'), 
			'middlename' => $this->input->post('middlename'), 
			'lastname' => $this->input->post('lastname'), 
			'gender' => $this->input->post('gender'), 
			'job_type' => $this->input->post('job_type'), 
			'workplace_name' => $this->input->post('workplace_name'), 
			'workplace_phone' => $this->input->post('workplace_phone'), 
			'mobile_phone' => $this->input->post('mobile_phone'), 
			'email' => $this->input->post('email'), 
			'birthdate' => $this->input->post('birthdate'), 
			'hide_age' => $this->input->post('hide_age'), 
			'birth_place' => $this->input->post('birth_place'), 
			'membership_year' => $this->input->post('membership_year'), 
			'cause_of_membership' => $this->input->post('cause_of_membership'), 
			'level_of_membership' => $this->input->post('level_of_membership'), 
			'serving_as' => $this->input->post('serving_as'), 
			'family_role' => $this->input->post('family_role'), 
			'family_id' => $this->input->post('family'),
			'profile_color' => $colors[array_rand($colors, 1)] 
			);

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

	public function edit($id) {
		$data = array(
			'title' => $this->input->post('title'), 
			'firstname' => $this->input->post('firstname'), 
			'middlename' => $this->input->post('middlename'), 
			'lastname' => $this->input->post('lastname'), 
			'gender' => $this->input->post('gender'), 
			'job_type' => $this->input->post('job_type'), 
			'workplace_name' => $this->input->post('workplace_name'), 
			'workplace_phone' => $this->input->post('workplace_phone'), 
			'mobile_phone' => $this->input->post('mobile_phone'), 
			'email' => $this->input->post('email'), 
			'birthdate' => $this->input->post('birthdate'), 
			'hide_age' => $this->input->post('hide_age'), 
			'birth_place' => $this->input->post('birth_place'), 
			'membership_year' => $this->input->post('membership_year'), 
			'cause_of_membership' => $this->input->post('cause_of_membership'), 
			'level_of_membership' => $this->input->post('level_of_membership'), 
			'serving_as' => $this->input->post('serving_as'), 
			'family_role' => $this->input->post('family_role'), 
			'family_id' => $this->input->post('family') 
			);

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

	public function get_all_for_selection() {
		$this->db->where('family_id', 0);
		$res = $this->db->get('members');
		return $res->result_array();
	}

	public function add_family_member() {
		$data = array(
			'family_role' => $this->input->post('family_role'), 
			'family_id' => $this->input->post('family_id')
			);
		$this->db->where('id', $this->input->post('member_id'));
		$this->db->update('members', $data);
	}

	public function remove_member_from_family($id) {
		$data = array(
			'family_role' => 'አልተመረጠም', 
			'family_id' => 0
			);
		$this->db->where('id', $id);
		$this->db->update('members', $data);
	}











}