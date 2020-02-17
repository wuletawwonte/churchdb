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

		$this->load->model(array('user', 'cnfg', 'family', 'member', 'timeline', 'group', 'group_member'));
		$this->load->helper('text');

		$this->lang->load('label_lang', $this->session->userdata('language'));
	}


	public function index() {
		$data['total_families'] = $this->family->record_count();
		$data['total_members'] = $this->member->record_count();
		$data['total_groups'] = $this->group->record_count();
		$data['latest_members'] = $this->member->latest_members();
		$data['latest_families'] = $this->family->latest_families();
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
		$this->load->view('admin_new_member_form');
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

	public function savemember() {

		if($this->member->add()) {
			$this->session->set_flashdata('success', 'Success: Member Successfully Registered.');
			redirect('admin/personregistration');
		} else {
			$this->session->set_flashdata('error', 'Error: Member Can not be Registered.');
			redirect('admin/personregistration');			
		}
	}	

	public function savememberchanges() {

		if($this->member->edit($this->input->post('id'))) {
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
			$data['family_members'] = $this->member->members_in_family($family_id);		
		}
		$data['timelines'] = $this->timeline->get_timeline($id);
		$data['assigned_groups'] = $this->group->get_assigned_groups($id);
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

	public function listgroups() {

		$config['base_url'] = base_url('admin/listgroups');
		$config['total_rows'] = $this->group->record_count();
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
		$data['active_menu'] = "groups";
		$data['groups'] = $this->group->get_all('created', 'DESC', $config["per_page"], $page);
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('admin_list_groups');
		$this->load->view('admin_templates/footer');		
	}

	public function savegroup() {
		$this->group->add();
		redirect('admin/listgroups');
	}

	public function export_families_csv() {
		$filename = "family_details_on_".date('Ymd').".csv";
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachement; filename=$filename");
		header("content-Type: application/csv;");
		$families = $this->family->get_all_for_export();

		$file = fopen('php://output', 'w');

		$header = array(lang('family_name'), lang('living_subcity'), lang('living_kebele'), lang('house_number'), lang('wedding_year'), lang('home_phone'), lang('created'));
		fputcsv($file, $header); 
		foreach($families as $family) {
			fputcsv($file, $family);
		}
		fclose($file);
		exit;
	}


	public function add_group_member() {
		$this->group_member->add_group_member();
		redirect('admin/groupdetails/'.$this->input->post('group_id'));		
	}

	public function ajax_get_member() {

		$json = [];
		$res = $this->member->ajax_get_members();
		$json = $res->result();
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function groupdetails($id) {
		$data['active_menu'] = "";
		$data['group'] = $this->group->get_one($id);
		$data['group_members'] = $this->member->get_group_members($id);
		$data['non_group_members'] = $this->member->get_non_group_members($id);
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('group_details');
		$this->load->view('admin_templates/footer');				
	}

	public function sunday_school_classes() {
		$data['active_menu'] = "sunday_school";
		$data['sunday_school_classes'] = $this->group->get_sunday_classes();
		$this->load->view('admin_templates/admin_header', $data);
		$this->load->view('sunday_school_classes');
		$this->load->view('admin_templates/footer');						
	}

	public function remove_group_member($mid, $gid) {
		$this->group_member->remove_group_member($mid, $gid);
		redirect('admin/groupdetails/'.$gid);
	}


}
