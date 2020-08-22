<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ministry extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
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


}