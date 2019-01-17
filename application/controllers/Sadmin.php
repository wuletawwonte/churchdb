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
	}


	public function index() {

		$data['skin'] = $this->cnfg->get('skin');
		$data['active_menu'] = "dashboard";
		$this->load->view('templates/admin_header', $data);
		$this->load->view('home');
		$this->load->view('templates/footer');

	}

	public function churches() {

		$data['skin'] = $this->cnfg->get('skin');
		$data['active_menu'] = "churches";
		$data['churches'] = $this->church->get_all();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('churches');
		$this->load->view('templates/footer');

	}

	public function newchurchform() {

		$data['skin'] = $this->cnfg->get('skin');
		$data['active_menu'] = "";
		$this->load->view('templates/admin_header', $data);
		$this->load->view('newchurchform');
		$this->load->view('templates/footer');

	}

	public function users() {

		$data['skin'] = $this->cnfg->get('skin');
		$data['active_menu'] = "users";
		$data['users'] = $this->user->get_all();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('users');
		$this->load->view('templates/footer');

	}

	public function newuserform() {

		$data['skin'] = $this->cnfg->get('skin');
		$data['active_menu'] = "";
		$data['churches'] = $this->church->get_all();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('newuserform');
		$this->load->view('templates/footer');

	}

	public function generalsetting() {

		$data['skin'] = $this->cnfg->get('skin');
		$data['active_menu'] = "generalsetting";
		$data['system_name'] = $this->cnfg->get('system_name');
		$data2['skin'] = $this->cnfg->get('skin');
		$this->load->view('templates/admin_header', $data);
		$this->load->view('generalsetting', $data2);
		$this->load->view('templates/footer');

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














}
