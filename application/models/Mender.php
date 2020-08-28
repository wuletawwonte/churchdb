<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mender extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}


	public function fetch_menders($kebele_title) {
		$this->db->where('kebele_title', $kebele_title);
		$this->db->order_by('mender_title', 'ASC');
		$res = $this->db->get('menders');
		$output = '<option value="">አልተመረጠም</option>';
		foreach($res->result() as $row) {
			$output .= '<option value="'.$row->mender_title.'">'.$row->mender_title.'</option>';
		}
		return $output;
	}

	public function get_all() {
		$data = $this->db->get('kifle_ketemas');
		return $data->result_array();
	}

	public function from_id($id) {
		$this->db->where('mender_id', $id);
		$res = $this->db->get('menders')->result_array();

		return $res[0];
	}

	public function get_from_kebele($kebele) {
		$this->db->where('kebele_title', $kebele);
		$res = $this->db->get('menders');

		return $res->result_array();
	}


	public function add_choice() {
		$data = array(
			'mender_title' => $this->input->post('mender_title'), 
			'kebele_title' => $this->input->post('kebele_title')
		);
		if($this->db->insert('menders', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function update_mender() {
		$this->db->where('mender_title', $this->input->post('mender_old_title'));
		$this->db->update('menders', array('mender_title' => $this->input->post('mender_new_title')));
		$this->db->where('mender', $this->input->post('mender_old_title'));
		$this->db->update('members', array('mender' => $this->input->post('mender_new_title')));
		return true;

	}

	public function delete_mender($id, $title) {
		$this->db->where('mender_id', $id);
		$this->db->delete('menders');
		$this->db->where('mender', $title);
		$this->db->update('members', array('mender' => ''));
		return true;
	}



}