<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership_cause extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$data = $this->db->get('membership_causes');
		return $data->result_array();
	}

	public function add_choice() {
		$data = array(
			'membership_cause_title' => $this->input->post('membership_cause_title')
			);
		if($this->db->insert('membership_causes', $data)) {
			return true;
		} else {
			return false;
		}		
	}

	public function delete_choice($mcid) {
		$this->db->where('membership_cause_id', $mcid);
		if($this->db->delete('membership_causes')) {
			$this->db->where('membership_cause', $mcid);
			$this->db->update('members', array('membership_cause' => 1));
			return true;
		} else {
			return false;
		}
	}



}