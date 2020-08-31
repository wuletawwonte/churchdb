<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_member extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}



	public function add_group_member() {
		$data = array(
			'group_id' => $this->input->post('group_id'), 
			'member_id' => $this->input->post('member_id'), 
			'role' => $this->input->post('role') 
			);
		$this->db->insert('group_members', $data);
	
	}

	public function remove_group_member($mid, $gid) {
		$data = array(
			'member_id' => $mid, 
			'group_id' => $gid
			);
		$this->db->where($data);
		$this->db->delete('group_members');
	}





}
