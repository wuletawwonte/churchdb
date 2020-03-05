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

		$this->load->model(array('user', 'cnfg', 'member', 'timeline', 'group', 'group_member', 'job_type', 'membership_cause', 'membership_level', 'ministry'));
		$this->load->helper('text', 'file');

		$this->lang->load('label_lang', 'amharic');
	}


	public function index() {
		$data['total_members'] = $this->member->record_count();
		$data['total_groups'] = $this->group->record_count();
		$data['latest_members'] = $this->member->latest_members();
		$data['active_menu'] = "dashboard";
		$this->load->view('templates/header', $data);
		$this->load->view('home');
		$this->load->view('templates/footer');

	}




	public function users() {

		$data['active_menu'] = "users";
		$data['users'] = $this->user->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('users');
		$this->load->view('templates/footer');
	}

	public function newuserform() {

		$data['active_menu'] = "";
		$this->load->view('templates/header', $data);
		$this->load->view('new_user_form');
		$this->load->view('templates/footer');

	}

	public function generalsetting() {

		$data['active_menu'] = "generalsetting";
		$data['system_name'] = $this->cnfg->get('system_name');
		$data['system_name_short'] = $this->cnfg->get('system_name_short');
		$data['church_name'] = $this->cnfg->get('church_name');
		$data['default_password'] = $this->cnfg->get('default_password');
		$this->load->view('templates/header', $data);
		$this->load->view('generalsetting');
		$this->load->view('templates/footer');

	}

	public function usersetting() {

		$data['active_menu'] = "usersetting";
		$data['users'] = $this->user->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('usersetting');
		$this->load->view('templates/footer');

	}


	public function registeruser() {

		if($this->user->add()) {
			$this->session->set_flashdata('success', 'ስኬት: የተጠቃሚው አካውንት በትክክል ተከፍቷል።');
			redirect('admin/users');
		} else {
			$this->session->set_flashdata('error', 'ስህተት፡ የተጠቃሚውን አካውንት መክፈት አልተቻለም።');
			$this->newuserform();
		}
	
	}


	public function edituserform($userid) {
		$data['active_menu'] = "";
		$data['user'] = $this->user->get_user('id', $userid);
		$data['churches'] = $this->church->get_all();		
		$this->load->view('templates/header', $data);
		$this->load->view('edituserform');
		$this->load->view('templates/footer');
	}

	public function savesetting() {
		
		$this->cnfg->edit_one('system_name', $this->input->post('system_name'));
		$this->cnfg->edit_one('system_name_short', $this->input->post('system_name_short'));

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
		$data['members'] = $this->member->get_all();
		$data['job_types'] = $this->job_type->get_all();
		$data['membership_causes'] = $this->membership_cause->get_all();
		$data['membership_levels'] = $this->membership_level->get_all();
		$data['ministries'] = $this->ministry->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('new_member_form', $data);
		$this->load->view('templates/footer');

	}

	public function listmembers() {

		$config = array(
				'base_url' => base_url('admin/listmembers'), 
				'per_page' => $_SESSION['filtermember']['rows_per_page'],
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
		$data['job_types'] = $this->job_type->get_all();
		$data['membership_causes'] = $this->membership_cause->get_all();
		$data['membership_levels'] = $this->membership_level->get_all();
		$data['ministries'] = $this->ministry->get_all();

		if(isset($_POST['submit'])) {

			$filtermember = array(
				'search_key' => $this->input->post('search_key'),
				'gender' => $this->input->post('gender'),
				'job_type' => $this->input->post('job_type'), 
				'membership_level' => $this->input->post('membership_level'),
				'ministry' => $this->input->post('ministry'),
				'marital_status' => $this->input->post('marital_status'),
				'rows_per_page' => $_SESSION['filtermember']['rows_per_page']
			);
			$this->session->set_userdata('filtermember', $filtermember);

			$config['total_rows'] = $this->member->filtered_members_count();
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['links'] = $this->pagination->create_links();
			$data['active_menu'] = "listmembers";
			$data['members'] = $this->member->get_filtered_sorted('created', 'DESC', $config['per_page'], $page);
			$this->load->view('templates/header', $data);
			$this->load->view('list_members');
			$this->load->view('templates/footer');

		} else {
			$config['total_rows'] = $this->member->filtered_members_count();

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data['links'] = $this->pagination->create_links();
			$data['active_menu'] = "listmembers";
			$data['members'] = $this->member->get_filtered_sorted('created', 'DESC', $config['per_page'], $page);
			$this->load->view('templates/header', $data);
			$this->load->view('list_members');
			$this->load->view('templates/footer');
		}
	}

	public function clearfilter () {
			$filtermember = array(
				'search_key' => NULL,
				'gender' => NULL,
				'job_type' => NULL,
				'membership_level' => NULL,
				'ministry' => NULL,
				'marital_status' => NULL,
				'rows_per_page' => $_SESSION['filtermember']['rows_per_page']
			);
			$this->session->set_userdata('filtermember', $filtermember);		
			redirect('admin/listmembers'); 
	}

	public function changerowsperpage() {
		$filtermember = array(
			'search_key' => $_SESSION['filtermember']['search_key'],
			'gender' => $_SESSION['filtermember']['gender'],
			'job_type' => $_SESSION['filtermember']['job_type'],
			'membership_level' => $_SESSION['filtermember']['membership_level'],
			'ministry' => $_SESSION['filtermember']['ministry'],
			'marital_status' => $_SESSION['filtermember']['marital_status'],
			'rows_per_page' => $this->input->post('rowsperpage'), 
		);
		$this->session->set_userdata('filtermember', $filtermember);		
		redirect('admin/listmembers');
	}

	public function savemember() {

		$avatar = NULL; 

		if($_FILES['avatar_input']['error'] !== 4) {

	        $config['upload_path']          = './assets/avatars/';
	        $config['allowed_types']        = 'jpg|png';
	        $config['max_size']             = 100;
	        $config['max_width']            = 1235;
	        $config['max_height']           = 835;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('avatar_input'))
	        {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/personregistration');			
	        }
	        else
	        {
	            $avatar = $this->upload->data('file_name');
	        }
	    }

		if($this->member->add($avatar)) {
			$this->session->set_flashdata('success', 'ስኬት: የምዕመን መረጃ በትክክል ተመዝግቧል።');
			redirect('admin/personregistration');
		} else {
			$this->session->set_flashdata('error', 'ስህተት: የምዕመን መረጃ ሊመዘግብ አልተቻለም።');
			redirect('admin/personregistration');			
		}
	}	

	public function savememberchanges() {

		$avatar = NULL; 

		if(!empty($_FILES['avatar_input']['name'])) {

			 $new_name = "churchdb".time().$_FILES["avatar_input"]['name'];

	        $config['upload_path']    = './assets/avatars/';
	        $config['allowed_types']  = 'jpg|png';
	        $config['max_size']       = 1000;
	        $config['max_width']      = 1235;
	        $config['max_height']     = 835;
	        $config['file_name'] 	  = $new_name; 

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('avatar_input'))
	        {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/editmember/'.$this->input->post('id'));			
	        }
	        else
	        {
	            $avatar = $this->upload->data('file_name');
	        }
	    }


		if($this->member->edit($this->input->post('id'), $avatar)) {
			$this->session->set_flashdata('success', 'የምዕመኑ መረጃ በትክክል ተቀይሯል።');
			redirect('admin/editmember/'.$this->input->post('id'));
		} else {
			$this->session->set_flashdata('error', 'የምዕመኑን መረጃ መቀየር አልተቻለም።');
			redirect('admin/editmember/'.$this->input->post('id'));			
		}
	}

	public function memberdetails($id = NULL) {
		$data['active_menu'] = "listmembers";
		$data['member'] = $this->member->get_one($id);
		$data['timelines'] = $this->timeline->get_timeline($id);
		$data['assigned_groups'] = $this->group->get_assigned_groups($id);
		$this->load->view('templates/header', $data);
		$this->load->view('member_details');
		$this->load->view('templates/footer');		
	}

	public function editmember($id = NULL) {
		$data['active_menu'] = '';
		$data['members'] = $this->member->get_all();		
		$data['member'] = $this->member->get_one($id);
		$data['job_types'] = $this->job_type->get_all();		
		$data['membership_causes'] = $this->membership_cause->get_all();
		$data['membership_levels'] = $this->membership_level->get_all();
		$data['ministries'] = $this->ministry->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('edit_person_form');
		$this->load->view('templates/footer');		
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
		$this->load->view('templates/header', $data);
		$this->load->view('list_groups');
		$this->load->view('templates/footer');		
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

	public function export_members_excel() {
		$filename = "ChurchDb_members_".date('Ymd').".xlsx";
		$this->load->library('excel');

		$members = $this->member->get_members_for_export();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'የአባት ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'የአያት ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ፆታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'የተወለዱበት ቀን');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'እድሜ');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'የትውልድ ሥፍራ');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'የሞባይል ስልክ ቁጥር');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'ኢሜል');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'የሥራ አይነት');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'የመሥሪያ ቤቱ ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'የመሥሪያ ቤት ስልክ ቁጥር');
		$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'የቤተክርስትያኒቱ አባል የሆኑበት ዘመን');
		$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'የቤተክርስትያኒቱ አባል የሆኑበት ሁኔታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'በቤተክርስትያኒቱ የአባልነት ደረጃ');
		$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'የአገልግሎት ዘርፍ');
		$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'የጋብቻ ሁኔታ');

		$rowCount = 2; 
		foreach ($members as $member) {
			$objPHPExcel->getActiveSheet()->SetCellValue('A'. $rowCount, $member['firstname']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'. $rowCount, $member['middlename']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'. $rowCount, $member['lastname']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'. $rowCount, $member['gender']);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'. $rowCount, $member['birthdate']);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'. $rowCount, $member['age']);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'. $rowCount, $member['birth_place']);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'. $rowCount, $member['mobile_phone']);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'. $rowCount, $member['email']);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'. $rowCount, $member['job_type_title']);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'. $rowCount, $member['workplace_name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('L'. $rowCount, $member['workplace_phone']);
			$objPHPExcel->getActiveSheet()->SetCellValue('M'. $rowCount, $member['membership_year']);
			$objPHPExcel->getActiveSheet()->SetCellValue('N'. $rowCount, $member['membership_cause_title']);
			$objPHPExcel->getActiveSheet()->SetCellValue('O'. $rowCount, $member['membership_level_title']);
			$objPHPExcel->getActiveSheet()->SetCellValue('P'. $rowCount, $member['ministry_title']);
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'. $rowCount, $member['marital_status']);
			$rowCount++;
		}

		header('Content-Type:application/vnd.ms-excel');
		header('Content-Disposition:attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel,'CSV');
		$objWriter->save('php://output');
	}

	public function export_members_csv() {
		$filename = "ChurchDb_members_".date('Ymd').".csv";
		$this->load->library('excel');

		$members = $this->member->get_members_for_export();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'የአባት ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'የአያት ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ፆታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'የተወለዱበት ቀን');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'እድሜ');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'የትውልድ ሥፍራ');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'የሞባይል ስልክ ቁጥር');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'ኢሜል');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'የሥራ አይነት');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'የመሥሪያ ቤቱ ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'የመሥሪያ ቤት ስልክ ቁጥር');
		$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'የቤተክርስትያኒቱ አባል የሆኑበት ዘመን');
		$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'የቤተክርስትያኒቱ አባል የሆኑበት ሁኔታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'በቤተክርስትያኒቱ የአባልነት ደረጃ');
		$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'የአገልግሎት ዘርፍ');
		$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'የጋብቻ ሁኔታ');

		$rowCount = 2; 
		foreach ($members as $member) {
			$objPHPExcel->getActiveSheet()->SetCellValue('A'. $rowCount, $member['firstname']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'. $rowCount, $member['middlename']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'. $rowCount, $member['lastname']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'. $rowCount, $member['gender']);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'. $rowCount, $member['birthdate']);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'. $rowCount, $member['age']);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'. $rowCount, $member['birth_place']);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'. $rowCount, $member['mobile_phone']);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'. $rowCount, $member['email']);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'. $rowCount, $member['job_type_title']);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'. $rowCount, $member['workplace_name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('L'. $rowCount, $member['workplace_phone']);
			$objPHPExcel->getActiveSheet()->SetCellValue('M'. $rowCount, $member['membership_year']);
			$objPHPExcel->getActiveSheet()->SetCellValue('N'. $rowCount, $member['membership_cause_title']);
			$objPHPExcel->getActiveSheet()->SetCellValue('O'. $rowCount, $member['membership_level_title']);
			$objPHPExcel->getActiveSheet()->SetCellValue('P'. $rowCount, $member['ministry_title']);
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'. $rowCount, $member['marital_status']);
			$rowCount++;
		}

		header('Content-Type:application/vnd.ms-excel');
		header('Content-Disposition:attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel,'CSV');
		$objWriter->save('php://output');
	}

	public function export_members_print() {
		$data['members'] = $this->member->get_members_for_export();
		$this->load->view('members_print', $data);
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
		$this->load->view('templates/header', $data);
		$this->load->view('group_details');
		$this->load->view('templates/footer');				
	}

	public function sunday_school_classes() {
		$data['active_menu'] = "sunday_school";
		$data['sunday_school_classes'] = $this->group->get_sunday_classes();
		$this->load->view('templates/header', $data);
		$this->load->view('sunday_school_classes');
		$this->load->view('templates/footer');						
	}

	public function remove_group_member($mid, $gid) {
		$this->group_member->remove_group_member($mid, $gid);
		redirect('admin/groupdetails/'.$gid);
	}

	public function listformelements() {
		$data['active_menu'] = "formelements";
		$data['job_types'] = $data['job_types'] = $this->job_type->get_all();
		$data['membership_causes'] = $this->membership_cause->get_all();
		$data['membership_levels'] = $this->membership_level->get_all();
		$data['ministries'] = $this->ministry->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('list_form_elements');
		$this->load->view('templates/footer');								
	}

	public function adminreport() {
		$data['active_menu'] = "adminreport";
		$data['church_name'] = $this->cnfg->get('church_name');
		$this->load->view('templates/header', $data);
		$this->load->view('report');
		$this->load->view('templates/footer');								
	}

	public function adminreportprint() {
		$data['church_name'] = $this->cnfg->get('church_name');
		$this->load->view('report_print', $data);		
	}

	public function addmembershiplevelchoice() {
		if($this->membership_level->add_choice()) {
			$this->session->set_flashdata('success', 'የአባልነት ደረጃ በትክክል ተመዝግቧል።');
			redirect('admin/listformelements');
		} else {
			$this->session->set_flashdata('error', 'የአባልነት ደረጃ መመዝገብ አልተቻለም።');
			redirect('admin/listformelements');
		}		
	}

	public function addjobtypechoice() {
		if($this->job_type->add_choice()) {
			$this->session->set_flashdata('success', 'የስራ አይነት በትክክል ተመዝግቧል።');
			redirect('admin/listformelements');
		} else {
			$this->session->set_flashdata('error', 'የስራ አይነት መመዝገብ አልተቻለም።');
			redirect('admin/listformelements');
		}		
	}

	public function addmembershipcausechoice() {
		if($this->membership_cause->add_choice()) {
			$this->session->set_flashdata('success', 'አባል የሆኑበት ሁኔታ በትክክል ተመዝግቧል።');
			redirect('admin/listformelements');
		} else {
			$this->session->set_flashdata('error', 'አባል የሆኑበት ሁኔታ መመዝገብ አልተቻለም።');
			redirect('admin/listformelements');
		}		
	}

	public function addministrychoice() {
		if($this->ministry->add_choice()) {
			$this->session->set_flashdata('success', 'የአገልግሎት ዘርፍ በትክክል ተመዝግቧል።');
			redirect('admin/listformelements');
		} else {
			$this->session->set_flashdata('error', 'የአገልግሎት ዘርፍ መመዝገብ አልተቻለም።');
			redirect('admin/listformelements');
		}		
	}

	public function deletemembershiplevelchoice($mlid) {
		if($this->membership_level->delete_choice($mlid)) {
			$this->session->set_flashdata('success', 'የአገልግሎት ዘርፍ ምርጫው በትክክል ጠፍቷል።');
			redirect('admin/listformelements');
		} else {
			$this->session->set_flashdata('error', 'የአገልግሎት ዘርፍ ምርጫውን ማጥፋት አልተቻለም።');
			redirect('admin/listformelements');
		}		
	}	

	public function deletejobtypechoice($jtid) {
		if($this->job_type->delete_choice($jtid)) {
			$this->session->set_flashdata('success', 'የስራ አይነት ምርጫው በትክክል ጠፍቷል።');
			redirect('admin/listformelements');
		} else {
			$this->session->set_flashdata('error', 'የስራ አይነት ምርጫውን ማጥፋት አልተቻለም።');
			redirect('admin/listformelements');
		}				
	}

	public function deletemembershipcausechoice($mcid) {
		if($this->membership_cause->delete_choice($mcid)) {
			$this->session->set_flashdata('success', 'አባል የሆኑበት ሁኔታ ምርጫው በትክክል ጠፍቷል።');
			redirect('admin/listformelements');
		} else {
			$this->session->set_flashdata('error', 'አባል የሆኑበት ሁኔታ ለሚለው ምርጫውን ማጥፋት አልተቻለም።');
			redirect('admin/listformelements');
		}						
	}

	public function deleteministrychoice($mid) {
		if($this->ministry->delete_choice($mid)) {
			$this->session->set_flashdata('success', 'የአገልግሎት ዘርፍ ምርጫው በትክክል ጠፍቷል።');
			redirect('admin/listformelements');
		} else {
			$this->session->set_flashdata('error', 'የአገልግሎት ዘርፍ ለሚለው ምርጫውን ማጥፋት አልተቻለም።');
			redirect('admin/listformelements');
		}						
	}

}
