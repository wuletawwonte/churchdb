<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sadmin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect('users/index');
		}
		$this->load->model('church');
	}


	public function index() {

		$data['active_menu'] = "dashboard";
		$this->load->view('templates/admin_header', $data);
		$this->load->view('home');
		$this->load->view('templates/footer');

	}

	public function churches() {

		$data['active_menu'] = "churches";
		$this->load->view('templates/admin_header', $data);
		$this->load->view('churches');
		$this->load->view('templates/footer');

	}

	public function newchurchform() {

		$data['active_menu'] = "";
		$this->load->view('templates/admin_header', $data);
		$this->load->view('newchurchform');
		$this->load->view('templates/footer');

	}

	public function users() {

		$data['active_menu'] = "users";
		$this->load->view('templates/admin_header', $data);
		$this->load->view('users');
		$this->load->view('templates/footer');

	}

	public function newuserform() {

		$data['active_menu'] = "";
		$this->load->view('templates/admin_header', $data);
		$this->load->view('newuserform');
		$this->load->view('templates/footer');

	}

}
