<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kifle_ketema extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$this->db->order_by('kifle_ketema_id', "DESC");
		$data = $this->db->get('kifle_ketemas');
		return $data->result_array();
	}

	public function add_choice() {
		$data = array(
			'kifle_ketema_title' => $this->input->post('kifle_ketema_title')
			);
		if($this->db->insert('kifle_ketemas', $data)) {
			return true;
		} else {
			return false;
		}		
	}

	public function from_id($id) {
		$this->db->where('kifle_ketema_id', $id);
		$res = $this->db->get('kifle_ketemas')->result_array();

		return $res[0];
	}

	public function update_kifle_ketema() {
		$this->db->where('kifle_ketema_title', $this->input->post('kifle_ketema_old_title'));
		$this->db->update('kifle_ketemas', array('kifle_ketema_title' => $this->input->post('kifle_ketema_new_title')));
		$this->db->where('kifle_ketema_title', $this->input->post('kifle_ketema_old_title'));
		$this->db->update('kebeles', array('kifle_ketema_title' => $this->input->post('kifle_ketema_new_title')));
		$this->db->where('kifle_ketema', $this->input->post('kifle_ketema_old_title'));
		$this->db->update('members', array('kifle_ketema' => $this->input->post('kifle_ketema_new_title')));
		return true;
	}

	public function delete_kifle_ketema($id, $title) {
		$this->db->where('kifle_ketema_id', $id);
		$this->db->delete('kifle_ketemas');
		$this->db->where('kifle_ketema_title', $title);
		$res = $this->db->get('kebeles')->result_array();
		foreach($res as $kebele) {
			$this->db->where('kebele_title', $kebele['kebele_title']);
			$this->db->delete('menders');
		}
		$this->db->where('kifle_ketema_title', $title);
		$this->db->delete('kebeles');
		$this->db->where('kifle_ketema', $title);
		$this->db->update('members', array('kifle_ketema' => '', 'kebele' => '', 'mender' => ''));
		return true;
	}



}