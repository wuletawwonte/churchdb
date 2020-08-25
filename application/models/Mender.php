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






}