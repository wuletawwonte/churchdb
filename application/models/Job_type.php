<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_type extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$data = $this->db->get('job_types');
		return $data->result_array();
	}

	public function add_choice() {
		$data = array(
			'job_type_title' => $this->input->post('job_type_title')
			);
		if($this->db->insert('job_types', $data)) {
			return true;
		} else {
			return false;
		}		
	}

	public function delete_choice($jtid) {
		$this->db->where('Job_type_id', $jtid);
		if($this->db->delete('job_types')) {
			$this->db->where('job_type', $jtid);
			$this->db->update('members', array('job_type' => 1));
			return true;
		} else {
			return false;
		}
	}







}