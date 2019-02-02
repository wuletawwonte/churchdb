<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add($data) {
		$this->db->insert('members', $data);
		return true;
	}








}