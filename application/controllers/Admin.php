<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect('users/index');
		}

		$this->load->model('user');
		$this->load->model('cnfg');
		$this->load->model('family');

		$this->lang->load('label_lang', $this->session->userdata('language'));
	}


	public function index() {

		$data['active_menu'] = "dashboard";
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('home');
		$this->load->view('admin_templates/footer');

	}




	public function users() {

		$data['active_menu'] = "users";
		$data['users'] = $this->user->get_all();
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('users');
		$this->load->view('admin_templates/footer');

	}

	public function newuserform() {

		$data['active_menu'] = "";
		$data['churches'] = $this->church->get_all();
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('newuserform');
		$this->load->view('admin_templates/footer');

	}

	public function generalsetting() {

		$data['active_menu'] = "generalsetting";
		$data['system_name'] = $this->cnfg->get('system_name');
		$data['system_name_short'] = $this->cnfg->get('system_name_short');
		$data['default_password'] = $this->cnfg->get('default_password');
		$data['skin'] = $this->user->get_my('skin');
		$data['language'] = $this->user->get_my('language');
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('generalsetting');
		$this->load->view('admin_templates/footer');

	}

	public function usersetting() {

		$data['active_menu'] = "usersetting";
		$data['users'] = $this->user->get_all();
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('usersetting');
		$this->load->view('admin_templates/footer');

	}


	public function registeruser() {

		if($this->user->add()) {
			$this->session->set_flashdata('success', 'Success: User Account Successfully Created.');
			if($this->input->post('addusersubmit') == 'Save') {
				redirect('admin/users');
			} else if($this->input->post('addusersubmit') == 'Save and Add') {
				redirect('admin/newuserform');
			}
		} else {
			$this->session->set_flashdata('error', '');
			$this->newuserform();
		}
	
	}


	public function edituserform($userid) {
		$data['active_menu'] = "";
		$data['user'] = $this->user->get_user('id', $userid);
		$data['churches'] = $this->church->get_all();		
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('edituserform');
		$this->load->view('admin_templates/footer');
	}

	public function savesetting() {
		
		$this->cnfg->edit_one('system_name', $this->input->post('system_name'));
		$this->cnfg->edit_one('system_name_short', $this->input->post('system_name_short'));
		$this->user->edit_one('skin', $this->input->post('skin'));
		$this->user->edit_one('language', $this->input->post('language'));

		redirect('admin/generalsetting');

	}

	public function edituser() {
	
		if($this->user->update_user()) {
			$this->session->set_flashdata('success', 'Success, User account information successfully updated.');
		} else {
			$this->session->set_flashdata('error', 'Error, Something went wrong please check fill carefully.');
		}

		redirect('admin/users');
	}



	public function personregistration() {

		$data['active_menu'] = "personregistration";
		$data['families'] = $this->family->get_all();
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_new_person_form');
		$this->load->view('admin_templates/footer');

	}

	public function familyregistration() {

		$data['active_menu'] = "familyregistration";
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_new_family_form');
		$this->load->view('admin_templates/footer');

	}

	public function listfamilies() {
		$data['active_menu'] = "listfamilies";
		$data['families'] = $this->family->get_all();
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_list_families');
		$this->load->view('admin_templates/footer');

	}


	public function savefamily() {

		$result = $this->family->add();
		if($result == 'success') {
			$this->session->set_flashdata('success', 'Success: Family Successfully Registered.');
			redirect('admin/listfamilies');
		} else {
			$this->output->set_content_type('application/json');
			echo json_encode(array('status' => $result));			
		}
	}





}
