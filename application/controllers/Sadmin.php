<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sadmin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect('users/index');
		}

		$this->load->model('church');
		$this->load->model('user');
		$this->load->model('cnfg');

		$this->lang->load('label_lang', $this->session->userdata('language'));
	}


	public function index() {

		$data['active_menu'] = "dashboard";
		$this->load->view('sadmin_templates/admin_header', $data);
		$this->load->view('home');
		$this->load->view('sadmin_templates/footer');

	}

	public function churches() {

		$data['active_menu'] = "churches";
		$data['churches'] = $this->church->get_all();
		$this->load->view('sadmin_templates/admin_header', $data);
		$this->load->view('churches');
		$this->load->view('sadmin_templates/footer');

	}

	public function newchurchform() {

		$data['active_menu'] = "";
		$this->load->view('sadmin_templates/admin_header', $data);
		$this->load->view('newchurchform');
		$this->load->view('sadmin_templates/footer');

	}

	public function users() {

		$data['active_menu'] = "users";
		$data['users'] = $this->user->get_all();
		$this->load->view('sadmin_templates/admin_header', $data);
		$this->load->view('users');
		$this->load->view('sadmin_templates/footer');

	}

	public function newuserform() {

		$data['active_menu'] = "";
		$data['churches'] = $this->church->get_all();
		$this->load->view('sadmin_templates/admin_header', $data);
		$this->load->view('newuserform');
		$this->load->view('sadmin_templates/footer');

	}

	public function generalsetting() {

		$data['active_menu'] = "generalsetting";
		$data['system_name'] = $this->cnfg->get('system_name');
		$data['system_name_short'] = $this->cnfg->get('system_name_short');
		$data2['skin'] = $this->user->get_my('skin');
		$data2['language'] = $this->user->get_my('language');
		$this->load->view('sadmin_templates/admin_header', $data);
		$this->load->view('generalsetting', $data2);
		$this->load->view('sadmin_templates/footer');

	}

	public function usersetting() {

		$data['active_menu'] = "usersetting";
		$data2['users'] = $this->user->get_all();
		$this->load->view('sadmin_templates/admin_header', $data);
		$this->load->view('usersetting', $data2);
		$this->load->view('sadmin_templates/footer');

	}


	public function registerchurch() {

		if($this->church->add()) {
			$this->session->set_flashdata('success', 'Success: Church Successfully Added.');
			if($this->input->post('addchurchsubmit') == 'Save') {
				redirect('sadmin/churches');
			} else if($this->input->post('addchurchsubmit') == 'Save and Add') {
				redirect('sadmin/newchurchform');
			}
		} else {
			$this->session->set_flashdata('error', '');
			$this->newchurchform();
		}
	
	}

	public function registeruser() {

		if($this->user->add()) {
			$this->session->set_flashdata('success', 'Success: User Account Successfully Created.');
			if($this->input->post('addusersubmit') == 'Save') {
				redirect('sadmin/users');
			} else if($this->input->post('addusersubmit') == 'Save and Add') {
				redirect('sadmin/newuserform');
			}
		} else {
			$this->session->set_flashdata('error', '');
			$this->newuserform();
		}
	
	}


	public function editchurchform($churchid) {

		$data['active_menu'] = "";
		$data2['church'] = $this->church->get_church('id', $churchid);
		$this->load->view('sadmin_templates/admin_header', $data);
		$this->load->view('editchurchform', $data2);
		$this->load->view('sadmin_templates/footer');

	}

	public function savesetting() {
		
		$this->cnfg->edit_one('system_name', $this->input->post('system_name'));
		$this->cnfg->edit_one('system_name_short', $this->input->post('system_name_short'));
		$this->user->edit_one('skin', $this->input->post('skin'));
		$this->user->edit_one('language', $this->input->post('language'));

		redirect('sadmin/generalsetting');

	}











}
