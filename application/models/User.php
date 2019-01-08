<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct() {
		parent::__construct();

		
	}

	public function user_can_log_in($username, $password) {

		$data = array(
			'username' => $username ,
			'password' => $password
			);
		
		$this->db->where($data);
		$query = $this->db->get('users');

		if($query->num_rows() == 1){
			return true;
		} else {
			return false;
		}
	}


	public function get_user_type($username) {
		$this->db->where('username', $username);
		$res = $this->db->get('users');
		$res = $res->result_array();
		return $res[0]['user_type'];
	}




}