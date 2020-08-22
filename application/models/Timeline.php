<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_timeline($id) {
		$this->db->order_by('id', 'DESC');
		$this->db->where('member_id', $id);
		$res = $this->db->get_where('timelines');
		
		return $res->result_array();
	}

}