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
		if($this->db->insert('payments', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_payments($id) {
		$this->db->where('member_id', $id);
		$res = $this->db->get('payments');
		
		return $res->result_array(); 
	}






}	
