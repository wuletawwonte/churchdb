<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('user');
		$this->load->model('cnfg');
	}


	public function index()
	{
		if($this->session->userdata('is_logged_in') == TRUE) {
			if($this->session->userdata('user_type') == "administrator") {
				redirect('admin/index');
			} 			
		} else {
			$data['system_name'] = $this->cnfg->get('system_name');
			$this->load->view('login', $data);
		}
	}


	public function login() {


		$this->form_validation->set_rules('username', 'username', 'required|trim|callback_validate_user_credentials');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if($this->form_validation->run()){
			$userdata = $this->user->get_user('username', $this->input->post('username'));
			$data = array(
				'name' => $userdata['firstname'].' '.$userdata['lastname'],
				'username' => $this->input->post('username'),
				'is_logged_in' => TRUE,
				'user_type' => $userdata['user_type'],
				'skin' => $userdata['skin'],
				'language' => $userdata['language']
				);

			$this->session->set_userdata($data);
			
			if($this->session->userdata('user_type') == "administrator") {

				$this->session->set_userdata('system_name', $this->cnfg->get('system_name'));
				$this->session->set_userdata('system_name_short', $this->cnfg->get('system_name_short'));

				redirect('admin/index');

			} else {
				$this->session->unset_userdata('is_logged_id');
				$this->session->set_flashdata("login_failed", "ያስገቡት መረጃ ትክክል አይደለም");
				redirect('users/index');
			}

		} else {
			$this->session->unset_userdata('is_logged_id');
			$this->session->set_flashdata("login_failed", "ይቅርታ, ያስገቡት መረጃ ትክክል አይደለም");
			redirect('users/index');
		}	

	}

	public function validate_user_credentials() {

		if($this->user->user_can_log_in($this->input->post('username'), $this->input->post('password'))) {
			return true;
		} else {
			return false;
		}

	}

	public function logout() {
		$this->session->sess_destroy();
		redirect();
	}




}
