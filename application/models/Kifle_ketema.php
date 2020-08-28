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



}