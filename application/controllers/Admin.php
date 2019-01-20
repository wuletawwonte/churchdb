<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('home');
		$this->load->view('sadmin_templates/footer');

	}

	public function generalsetting() {
		$temp = $this->church->get_church('id', $this->session->church);

		$data['active_menu'] = "generalsetting";
		$data['system_name'] = $temp['short_name'];
		$data['system_name_short'] = $temp['mini_logo'];
		$data['skin'] = $this->user->get_my('skin');
		$data['language'] = $this->user->get_my('language');
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_generalsetting');
		$this->load->view('admin_templates/footer');

	}








}
