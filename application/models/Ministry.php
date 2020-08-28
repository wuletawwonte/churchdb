<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ministry extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$this->db->order_by('ministry_id', 'DESC');
		$data = $this->db->get('ministries');
		return $data->result_array();
	}

	public function add_choice() {
		$data = array(
			'ministry_title' => $this->input->post('ministry_title')
			);
		if($this->db->insert('ministries', $data)) {
			return true;
		} else {
			return false;
		}		
	}

	public function delete_choice($mid) {
		$this->db->where('ministry_id', $mid);
		if($this->db->delete('ministries')) {
			$this->db->where('ministry', $mid);
			$this->db->update('members', array('ministry' => 1));
			return true;
		} else {
			return false;
		}
	}


	public function update_ministry() {
		$this->db->where('ministry_title', $this->input->post('ministry_old_title'));
		$this->db->update('ministries', array('ministry_title' => $this->input->post('ministry_new_title')));
		$this->db->where('ministry', $this->input->post('ministry_old_title'));
		$this->db->update('members', array('ministry' => $this->input->post('ministry_new_title')));
		return true;
	}

	public function from_id($id) {
		$this->db->where('ministry_id', $id);
		$res = $this->db->get('ministries')->result_array();

		return $res[0];
	}

	public function delete_ministry($id, $title) {
		$this->db->where('ministry_id', $id);
		$this->db->delete('ministries');
		$this->db->where('ministry', $title);
		$this->db->update('members', array('ministry' => ''));
		return true;
	}




}