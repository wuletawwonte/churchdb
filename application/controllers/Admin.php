<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect('users/index');
		} else {
			$interval = time() - $this->session->userdata('last_visited');
 			if($interval > 1200 && $interval < 7200) {
				redirect('users/relogin');
			} else if($interval > 7200) {
				redirect('users/logout');
			}

		}

		$this->session->set_userdata('last_visited', time());

		$this->load->model('user');
		$this->load->model('cnfg');
		$this->load->model('family');
		$this->load->model('member');
		$this->load->helper('text');

		$this->lang->load('label_lang', $this->session->userdata('language'));
	}


	public function index() {
		$data['total_families'] = $this->family->record_count();
		$data['total_members'] = $this->member->record_count();
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
		$data['families'] = $this->family->get_all('name', 'ASC');
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

		$config['base_url'] = base_url('admin/listfamilies');
		$config['total_rows'] = $this->family->record_count();
		$config['per_page'] = 5;
		$config["uri_segment"] = 3;

		$config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['links'] = $this->pagination->create_links();
		$data['active_menu'] = "listfamilies";
		$data['families'] = $this->family->get_all('created', 'DESC', $config["per_page"], $page);
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_list_families');
		$this->load->view('admin_templates/footer');

	}

	public function listmembers() {

		$config = array(
				'base_url' => base_url('admin/listmembers'), 
				'per_page' => 5,
				'uri_segment'=> 3,
				'full_tag_open' => "<ul class='pagination pagination-sm'>",
				'full_tag_close' => "</ul>",
				'num_tag_open' => '<li>',
				'num_tag_close' => '</li>',
				'cur_tag_open' => "<li class='disabled'><li class='active'><a href='#'>",
				'cur_tag_close' => "<span class='sr-only'></span></a></li>",
				'next_tag_open' => "<li>",
				'next_tagl_close' => "</li>",
				'prev_tag_open' => "<li>",
				'prev_tagl_close' => "</li>",
				'first_tag_open' => "<li>",
				'first_tagl_close' => "</li>",
				'last_tag_open' => "<li>",
				'last_tagl_close' => "</li>"

			);

		if(isset($_POST['submit'])) {

			$config['total_rows'] = $this->member->filtered_members_count();

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['links'] = $this->pagination->create_links();
			$data['active_menu'] = "listmembers";
			$data['members'] = $this->member->get_filtered_sorted('created', 'DESC', $config['per_page'], $page);
			$this->load->view('admin_templates/admin_header', $data);
			$this->load->view('admin_list_members');
			$this->load->view('admin_templates/footer');

		} else {
			$config['total_rows'] = $this->member->record_count();

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['links'] = $this->pagination->create_links();
			$data['active_menu'] = "listmembers";
			$data['members'] = $this->member->get_all_sorted('created', 'DESC', $config['per_page'], $page);
			$this->load->view('admin_templates/admin_header', $data);
			$this->load->view('admin_list_members');
			$this->load->view('admin_templates/footer');
		}
	}


	public function savefamily() {
		$data = array(
			'name' => $this->input->post('family_name'), 
			'subcity' => $this->input->post('subcity'),
			'kebele' => $this->input->post('kebele'),
			'house_number' => $this->input->post('house_number'),
			'home_phone' => $this->input->post('home_phone_number'),
			'wedding_year' => $this->input->post('wedding_year')
			);

		if($this->family->add($data)) {
			$family_id = $this->family->get_by_attrib('id', $data['name']);
			$decoded_members = json_decode($this->input->post('members'));
			foreach ($decoded_members as $member) {
				$this->member->add_from_family($member, $family_id);
			}

			$this->session->set_flashdata('success', 'Success: Family Successfully Registered.');

			redirect('admin/listfamilies');
		} else {
			$this->session->set_flashdata('error', 'Error: Family not Registered.');
			echo json_encode(array('status' => $result));			
		}
	}

	public function savemember() {
		$data = array(
			'title' => $this->input->post('title'), 
			'firstname' => $this->input->post('firstname'), 
			'middlename' => $this->input->post('middlename'), 
			'lastname' => $this->input->post('lastname'), 
			'gender' => $this->input->post('gender'), 
			'job_type' => $this->input->post('job_type'), 
			'workplace_name' => $this->input->post('workplace_name'), 
			'workplace_phone' => $this->input->post('workplace_phone'), 
			'mobile_phone' => $this->input->post('mobile_phone'), 
			'email' => $this->input->post('email'), 
			'birthdate' => $this->input->post('birthdate'), 
			'hide_age' => $this->input->post('hide_age'), 
			'birth_place' => $this->input->post('birth_place'), 
			'membership_year' => $this->input->post('membership_year'), 
			'cause_of_membership' => $this->input->post('cause_of_membership'), 
			'level_of_membership' => $this->input->post('level_of_membership'), 
			'serving_as' => $this->input->post('serving_as'), 
			'family_role' => $this->input->post('family_role'), 
			'family_id' => $this->input->post('family') 
			);

		if($this->member->add($data)) {
			$this->session->set_flashdata('success', 'Success: Member Successfully Registered.');
			redirect('admin/personregistration');
		} else {
			$this->session->set_flashdata('error', 'Error: Member Can not be Registered.');
			redirect('admin/personregistration');			
		}
	}	

	public function savememberchanges() {
		$data = array(
			'title' => $this->input->post('title'), 
			'firstname' => $this->input->post('firstname'), 
			'middlename' => $this->input->post('middlename'), 
			'lastname' => $this->input->post('lastname'), 
			'gender' => $this->input->post('gender'), 
			'job_type' => $this->input->post('job_type'), 
			'workplace_name' => $this->input->post('workplace_name'), 
			'workplace_phone' => $this->input->post('workplace_phone'), 
			'mobile_phone' => $this->input->post('mobile_phone'), 
			'email' => $this->input->post('email'), 
			'birthdate' => $this->input->post('birthdate'), 
			'hide_age' => $this->input->post('hide_age'), 
			'birth_place' => $this->input->post('birth_place'), 
			'membership_year' => $this->input->post('membership_year'), 
			'cause_of_membership' => $this->input->post('cause_of_membership'), 
			'level_of_membership' => $this->input->post('level_of_membership'), 
			'serving_as' => $this->input->post('serving_as'), 
			'family_role' => $this->input->post('family_role'), 
			'family_id' => $this->input->post('family') 
			);

		if($this->member->edit($this->input->post('id'), $data)) {
			$this->session->set_flashdata('success', 'Success: Member Successfully Edited.');
			redirect('admin/listmembers');
		} else {
			$this->session->set_flashdata('error', 'Error: Member Can not be Edited.');
			redirect('admin/listmembers');			
		}
	}

	public function memberdetails($id = NULL) {
		$data['active_menu'] = "listmembers";
		$data['member'] = $this->member->get_one($id);
		$family_id = $this->member->get_by_attrib('family_id', $id);
		if($family_id != 0) {
			$data['family'] = $this->family->get_one($family_id);
		}
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('member_details');
		$this->load->view('admin_templates/footer');		
	}

	public function editmember($id = NULL) {
		$data['active_menu'] = '';
		$data['member'] = $this->member->get_one($id);
		$data['families'] = $this->family->get_all('name', 'ASC');
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_edit_person_form');
		$this->load->view('admin_templates/footer');		
	}

}
