<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership_level extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$this->db->order_by('membership_level_id', 'DESC');
		$data = $this->db->get('membership_levels');
		return $data->result_array();
	}

	public function add_choice() {
		$data = array(
			'membership_level_title' => $this->input->post('membership_level_title')
			);
		if($this->db->insert('membership_levels', $data)) {
			return true;
		} else {
			return false;
		}	
	}

	public function delete_choice($mlid) { 
		$this->db->where('membership_level_id', $mlid);
		if($this->db->delete('membership_levels')) {
			$this->db->where('Membership_level', $mlid);
			$this->db->update('members', array('membership_level' => 1));
			return true;
		} else {
			return false;
		}
	}

	public function update_membership_level() {
		$this->db->where('membership_level_title', $this->input->post('membership_level_old_title'));
		$this->db->update('membership_levels', array('membership_level_title' => $this->input->post('membership_level_new_title')));
		$this->db->where('membership_level', $this->input->post('membership_level_old_title'));
		$this->db->update('members', array('membership_level' => $this->input->post('membership_level_new_title')));
		return true;
	}

	public function from_id($id) {
		$this->db->where('membership_level_id', $id);
		$res = $this->db->get('membership_levels')->result_array();

		return $res[0];
	}

	public function delete_membership_level($id, $title) {
		$this->db->where('membership_level_id', $id);
		$this->db->delete('membership_levels');
		$this->db->where('membership_level', $title);
		$this->db->update('members', array('membership_level' => ''));
		return true;
	}


}