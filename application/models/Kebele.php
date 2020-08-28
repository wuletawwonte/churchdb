<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebele extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function fetch_kebeles($kifle_ketema_title) {
		$this->db->where('kifle_ketema_title', $kifle_ketema_title);
		$this->db->order_by('kebele_title', 'ASC');
		$res = $this->db->get('kebeles');
		$output = '<option value="">አልተመረጠም</option>';
		foreach($res->result() as $row) {
			$output .= '<option value="'.$row->kebele_title.'">'.$row->kebele_title.'</option>';
		}
		return $output;
	}

	public function get_all() {
		$data = $this->db->get('kebeles');
		return $data->result_array();
	}

	public function get_from_kifle_ketema($kifle_ketema) {
		$this->db->where('kifle_ketema_title', $kifle_ketema);
		$res = $this->db->get('kebeles');

		return $res->result_array();
	}

	public function from_id($id) {
		$this->db->where('kebele_id', $id);
		$res = $this->db->get('kebeles')->result_array();

		return $res[0];
	}

	public function add_choice() {
		$data = array(
			'kebele_title' => $this->input->post('kebele_title'), 
			'kifle_ketema_title' => $this->input->post('kifle_ketema_title')
		);
		if($this->db->insert('kebeles', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function update_kebele() {
		$this->db->where('kebele_title', $this->input->post('kebele_old_title'));
		$this->db->update('kebeles', array('kebele_title' => $this->input->post('kebele_new_title')));
		$this->db->where('kebele_title', $this->input->post('kebele_old_title'));
		$this->db->update('menders', array('kebele_title' => $this->input->post('kebele_new_title')));
		$this->db->where('kebele', $this->input->post('kebele_old_title'));
		$this->db->update('members', array('kebele' => $this->input->post('kebele_new_title')));
		return true;

	}




}