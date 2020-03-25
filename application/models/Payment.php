<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add() {
		$data = array(
			'member_id' => $this->input->post('member_id'), 
			'payment_type' => $this->input->post('payment_type'),
			'payment_amount' => $this->input->post('payment_amount')
			);
		return ($this->db->insert('payments', $data)) ? $this->db->insert_id() : false;
	}

	public function get_payments($id) {
		$this->db->where('member_id', $id);
		$res = $this->db->get('payments');
		
		return $res->result_array(); 
	}

	public function get_details($pid) {
		$this->db->select('*, payments.id as pid');
		$this->db->where('payments.id', $pid);
		$this->db->from('payments');
		$this->db->join('members', 'members.id = payments.member_id');
		$res = $this->db->get();
		return $res->result_array()[0];
	}







}	
