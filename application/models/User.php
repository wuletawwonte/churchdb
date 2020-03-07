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
			$data = $query->result_array();
			$this->db->where('username', $username);
			$input_data = array(
				'login_count' => $data[0]['login_count']+1, 
				'last_login' => date('Y-m-d h:m:s')
				);
			$this->db->update('users', $input_data);
			return true;			
		} else {
			return false;
		}
	}

	public function get_user($attrib, $username) {
		$this->db->where($attrib, $username);
		$res = $this->db->get('users');
		$res = $res->result_array();
		return $res[0];
	}

	public function add() {
		$this->load->model('cnfg');		
		$psw = $this->cnfg->get('default_password');
		$user_type = 'standard';
		if($this->input->post('administrator')) {
			$user_type = "administrator";
		}

		$data = array(
			'firstname' => $this->input->post('firstname'), 
			'lastname' => $this->input->post('lastname'), 
			'username' => $this->input->post('username'), 
			'password' => md5($psw),  
			'user_type' => $user_type,
			'p_register_member' => $this->input->post('p_register_member'),
			'p_edit_member' => $this->input->post('p_edit_member'),
			'p_delete_member' => $this->input->post('p_delete_member'),
			'p_manage_form' => $this->input->post('p_manage_form'),
			'p_manage_group' => $this->input->post('p_manage_group'),
			'p_generate_member_report' => $this->input->post('p_generate_member_report'),
			);		
		if($this->db->insert('users', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function edit($uid) {
		$user_type = 'standard';
		if($this->input->post('administrator')) {
			$user_type = "administrator";
		}

		$data = array(
			'firstname' => $this->input->post('firstname'), 
			'lastname' => $this->input->post('lastname'), 
			'username' => $this->input->post('username'), 
			'user_type' => $user_type,
			'p_register_member' => $this->input->post('p_register_member'),
			'p_edit_member' => $this->input->post('p_edit_member'),
			'p_delete_member' => $this->input->post('p_delete_member'),
			'p_manage_form' => $this->input->post('p_manage_form'),
			'p_manage_group' => $this->input->post('p_manage_group'),
			'p_generate_member_report' => $this->input->post('p_generate_member_report'),
			);		
		$this->db->where('id', $uid);
		if($this->db->update('users', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function get_all() {
		$res = $this->db->get('users');
		return $res->result_array();
	}

	public function get_my($attrib) {
		$this->db->where('username', $this->session->userdata('current_user')['username']);
		$data = $this->db->get('users');
		$data = $data->result_array(); 

		return $data[0][$attrib];
	}

	public function edit_one($attrib, $value) {
		$data = array(
			$attrib => $value
			);
		$this->db->where('username', $this->session->userdata('current_user')['username']);
		$this->db->update('users', $data);
	}

	public function delete_user($uid) {
		$this->db->where('id', $uid);
		if($this->db->delete('users')) {
			return true;
		} else {
			return false;
		}
	}

	public function users_count() {
		$data = $this->db->get('users');
		return $data->num_rows();
	}

	public function get_all_users($limit = NULL, $start = NULL) {
		$this->db->limit($limit, $start);
		$data = $this->db->get('users');

		return $data->result_array();
	}




}