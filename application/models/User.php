<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct() {
		parent::__construct();

		
	}

	public function user_can_log_in($username, $password) {

		$data = array(
			'username' => $username ,
			'password' => md5($password)
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

	public function add() {
		$data = array(
			'firstname' => $this->input->post('firstname'), 
			'lastname' => $this->input->post('lastname'), 
			'username' => $this->input->post('username'), 
			'password' => md5($this->input->post('password')), 
			'role' => $this->input->post('role'), 
			'church' => $this->input->post('church'), 
			'user_type' => 'administrator' 
			);
		if($this->db->insert('users', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_all() {
		$res = $this->db->get('users');
		return $res->result_array();
	}




}