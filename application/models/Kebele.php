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





}