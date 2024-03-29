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

		$this->load->model(array('age_group', 'members_backup', 'payment', 'kifle_ketema', 'mender', 'kebele', 'note', 'user', 'cnfg', 'member', 'timeline', 'group', 'group_member', 'job_type', 'membership_cause', 'membership_level', 'ministry'));
		$this->load->helper('text', 'file');

		$this->lang->load('label_lang', 'amharic');
	}


	public function index() {
		$data['total_members'] = $this->member->record_count();
		$data['total_groups'] = $this->group->record_count();
		$data['latest_members'] = $this->member->latest_members();
		$data['gender_count'] = $this->member->gender_count();
		$data['membership_levels'] = $this->member->membership_level_count();
		$data['active_menu'] = "dashboard";
		$this->load->view('templates/header', $data);
		$this->load->view('home');
		$this->load->view('templates/footer');
	}




	public function users() {

		$config = array(
				'base_url' => base_url('admin/users'), 
				'per_page' => 8,
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
				'last_tagl_close' => "</li>",
				'total_rows' => $this->user->users_count()
			);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['links'] = $this->pagination->create_links();
		$data['active_menu'] = "users";
		$data['users'] = $this->user->get_all_users($config['per_page'], $page);
		$this->load->view('templates/header', $data);
		$this->load->view('list_users');
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
		$data['age_groups']	= $this->age_group->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('general_setting');
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
			$this->session->set_flashdata('success', 'የተጠቃሚው አካውንት በትክክል ተከፍቷል።');
			redirect('admin/users');
		} else {
			$this->session->set_flashdata('error', 'የተጠቃሚውን አካውንት መክፈት አልተቻለም።');
			$this->newuserform();
		}
	}

	public function edituser($uid) {
		if($this->user->edit($uid)) {
			$this->session->set_flashdata('success', 'የተጠቃሚው አካውንት በትክክል ተቀይሯል።');
			redirect('admin/users');
		} else {
			$this->session->set_flashdata('error', 'የተጠቃሚውን አካውንት መቀየር አልተቻለም።');
			$this->newuserform();
		}
	}


	public function edituserform($userid) {
		$data['active_menu'] = "";
		$data['user'] = $this->user->get_user('id', $userid);
		$this->load->view('templates/header', $data);
		$this->load->view('edit_user_form', $data);
		$this->load->view('templates/footer');
	}

	public function savesetting() {
		
		$this->cnfg->edit_one('system_name', $this->input->post('system_name'));
		$this->cnfg->edit_one('system_name_short', $this->input->post('system_name_short'));
		$this->cnfg->edit_one('church_name', $this->input->post('church_name'));
		$this->cnfg->edit_one('default_password', $this->input->post('default_password'));

		$this->session->set_flashdata('success', 'የሲስተም ለውጦች በትክክል ተመዝግበዋል።');

		redirect('admin/generalsetting');

	}


	public function personregistration() {

		$data['active_menu'] = "personregistration";
		$data['job_types'] = $this->job_type->get_all();
		$data['membership_causes'] = $this->membership_cause->get_all();
		$data['membership_levels'] = $this->membership_level->get_all();
		$data['kifle_ketemas'] = $this->kifle_ketema->get_all();
		$data['ministries'] = $this->ministry->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('new_member_form', $data);
		$this->load->view('templates/footer');

	}

	// AJAX function 
	public function get_gender_specific_ajax() {
		$searchTerm = $this->input->post('searchTerm');
		$gender = $this->input->post('gender');
		$res = $this->member->get_gender_specific_ajax($searchTerm, $gender);
		
		echo json_encode($res);
	}

	public function listmembers() {

		$data['job_types'] = $this->job_type->get_all();
		$data['age_groups'] = $this->age_group->get_all();
		$data['membership_causes'] = $this->membership_cause->get_all();
		$data['membership_levels'] = $this->membership_level->get_all();
		$data['ministries'] = $this->ministry->get_all();

		if(isset($_POST['submit'])) {

			$filtermember = array(
				'gender' => $this->input->post('gender'),
				'job_type' => $this->input->post('job_type'), 
				'membership_level' => $this->input->post('membership_level'),
				'ministry' => $this->input->post('ministry'),
				'marital_status' => $this->input->post('marital_status'),
				'age_group' => $this->input->post('age_group')
			);
			$this->session->set_userdata('filtermember', $filtermember);
			$sage = null;
			$eage = null;
			if($this->input->post('age_group')) {
				$sage = $this->age_group->get_one($this->input->post('age_group'))['start_age'];
				$eage = $this->age_group->get_one($this->input->post('age_group'))['end_age'];
			}

			$data['active_menu'] = "listmembers";
			$data['members'] = $this->member->get_filtered_sorted($sage, $eage);
			$this->load->view('templates/header', $data);
			$this->load->view('list_members');
			$this->load->view('templates/footer');

		} else {

			$sage = null;
			$eage = null;
			if($_SESSION['filtermember']['age_group']) {
				$sage = $this->age_group->get_one($_SESSION['filtermember']['age_group'])['start_age'];
				$eage = $this->age_group->get_one($_SESSION['filtermember']['age_group'])['end_age'];
			}


			$data['active_menu'] = "listmembers";
			$data['members'] = $this->member->get_filtered_sorted($sage, $eage);
			$this->load->view('templates/header', $data);
			$this->load->view('list_members');
			$this->load->view('templates/footer');
		}
	}

	public function clearfilter () {
			$filtermember = array(
				'gender' => NULL,
				'job_type' => NULL,
				'membership_level' => NULL,
				'ministry' => NULL,
				'marital_status' => NULL,
				'age_group' => NULL
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

	    if($this->member->check_member()) {
			if($this->member->add($avatar)) {
				$this->session->set_flashdata('success', 'የምዕመን መረጃ በትክክል ተመዝግቧል።');
				redirect('admin/personregistration');
			} else {
				$this->session->set_flashdata('error', 'የምዕመን መረጃ ሊመዘገብ አልተቻለም።');
				redirect('admin/personregistration');			
			}
		} else {
			$this->session->set_flashdata('error', 'በዚህ ስም የተመዘገበ ምዕመን አለ።');
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
			redirect('admin/memberdetails/'.$this->input->post('id'));
		} else {
			$this->session->set_flashdata('error', 'የምዕመኑን መረጃ መቀየር አልተቻለም።');
			redirect('admin/editmember/'.$this->input->post('id'));			
		}
	}

	public function memberdetails($id = NULL, $active_tab=NULL) {
		$data['active_menu'] = "listmembers";
		$data['active_tab'] = $active_tab;
		$data['member'] = $this->member->get_one($id);
		$data['timelines'] = $this->timeline->get_timeline($id);
		$data['assigned_groups'] = $this->group->get_assigned_groups($id);
		$data['notes'] = $this->note->get_notes($id);
		$data['payments'] = $this->payment->get_payments($id);
		$this->load->view('templates/header', $data);
		$this->load->view('member_details');
		$this->load->view('templates/footer');		
	}

	public function editmember($id = NULL) {
		$data['active_menu'] = '';
		$data['member'] = $this->member->get_one($id);
		$data['members'] = $this->member->get_gender_specific($data['member']['gender']);	
		$data['job_types'] = $this->job_type->get_all();		
		$data['membership_causes'] = $this->membership_cause->get_all();
		$data['membership_levels'] = $this->membership_level->get_all();
		$data['ministries'] = $this->ministry->get_all();
		$data['kifle_ketemas'] = $this->kifle_ketema->get_all();
		$data['kebeles'] = $this->kebele->get_from_kifle_ketema($data['member']['kifle_ketema']);
		$data['menders'] = $this->mender->get_from_kebele($data['member']['kebele']);
		$this->load->view('templates/header', $data);
		$this->load->view('edit_member_form');
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

	public function deletemembersbackup($id) {
		if($this->members_backup->delete($id)) {
			$this->session->set_flashdata('success', 'የተዘጋጀው ባካፕ በትክክል ጠፍቷል።');
			redirect('admin/membersexport');
		} else {
			$this->session->set_flashdata('error', 'የተዘጋጀውን ባካፕ ማጥፋት አልተቻለም።');
			redirect('admin/membersexport');
		}		
	}

	public function export_members_excel_backup() {
		$filename = "ChurchDb_members ".date('F j_Y h-i-s').".xlsx";
		$this->load->library('excel');

		$members = $this->member->get_members_for_export();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'የአባት ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'የአያት ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ፆታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'ክፍለ ከተማ');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'ቀበሌ');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'መንደር');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'የተወለዱበት ቀን');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'እድሜ');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'የትውልድ ሥፍራ');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'የሞባይል ስልክ ቁጥር');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'ኢሜል');
		$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'የሥራ አይነት');
		$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'የመሥሪያ ቤቱ ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'የመሥሪያ ቤት ስልክ ቁጥር');
		$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'የቤተክርስትያኒቱ አባል የሆኑበት ዘመን');
		$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'የቤተክርስትያኒቱ አባል የሆኑበት ሁኔታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'በቤተክርስትያኒቱ የአባልነት ደረጃ');
		$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'የአገልግሎት ዘርፍ');
		$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'የጋብቻ ሁኔታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'የትዳር አጋር');

		$rowCount = 2; 
		foreach ($members as $member) {
			$objPHPExcel->getActiveSheet()->SetCellValue('A'. $rowCount, $member['firstname']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'. $rowCount, $member['middlename']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'. $rowCount, $member['lastname']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'. $rowCount, $member['gender']);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'. $rowCount, $member['kifle_ketema']);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'. $rowCount, $member['kebele']);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'. $rowCount, $member['mender']);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'. $rowCount, $member['birthdate']);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'. $rowCount, $member['age']);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'. $rowCount, $member['birth_place']);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'. $rowCount, $member['mobile_phone']);
			$objPHPExcel->getActiveSheet()->SetCellValue('L'. $rowCount, $member['email']);
			$objPHPExcel->getActiveSheet()->SetCellValue('M'. $rowCount, $member['job_type']);
			$objPHPExcel->getActiveSheet()->SetCellValue('N'. $rowCount, $member['workplace_name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('O'. $rowCount, $member['workplace_phone']);
			$objPHPExcel->getActiveSheet()->SetCellValue('P'. $rowCount, $member['membership_year']);
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'. $rowCount, $member['membership_cause']);
			$objPHPExcel->getActiveSheet()->SetCellValue('R'. $rowCount, $member['membership_level']);
			$objPHPExcel->getActiveSheet()->SetCellValue('S'. $rowCount, $member['ministry']);
			$objPHPExcel->getActiveSheet()->SetCellValue('T'. $rowCount, $member['marital_status']);
			$objPHPExcel->getActiveSheet()->SetCellValue('U'. $rowCount, $member['spouse_name']);
			$rowCount++;
		}

		header('Content-Type:application/vnd.ms-excel');
		header('Content-Disposition:attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel,'CSV');
		$objWriter->save('/data/www/amyc.org.et/churchdb.amyc.org.et/download/'.$filename);
		
		$this->members_backup->add($filename);

		redirect('admin/membersexport');

	}

	public function export_members_excel() {
		$filename = "ChurchDb_members ".date('F j_Y h-i-s').".xlsx";
		$this->load->library('excel');

		$members = $this->member->get_members_for_export();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'የአባት ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'የአያት ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'ፆታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'ክፍለ ከተማ');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'ቀበሌ');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'መንደር');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'የተወለዱበት ቀን');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'እድሜ');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'የትውልድ ሥፍራ');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'የሞባይል ስልክ ቁጥር');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'ኢሜል');
		$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'የሥራ አይነት');
		$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'የመሥሪያ ቤቱ ስም');
		$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'የመሥሪያ ቤት ስልክ ቁጥር');
		$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'የቤተክርስትያኒቱ አባል የሆኑበት ዘመን');
		$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'የቤተክርስትያኒቱ አባል የሆኑበት ሁኔታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'በቤተክርስትያኒቱ የአባልነት ደረጃ');
		$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'የአገልግሎት ዘርፍ');
		$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'የጋብቻ ሁኔታ');
		$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'የትዳር አጋር');

		$rowCount = 2; 
		foreach ($members as $member) {
			$objPHPExcel->getActiveSheet()->SetCellValue('A'. $rowCount, $member['firstname']);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'. $rowCount, $member['middlename']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'. $rowCount, $member['lastname']);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'. $rowCount, $member['gender']);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'. $rowCount, $member['kifle_ketema']);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'. $rowCount, $member['kebele']);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'. $rowCount, $member['mender']);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'. $rowCount, $member['birthdate']);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'. $rowCount, $member['age']);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'. $rowCount, $member['birth_place']);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'. $rowCount, $member['mobile_phone']);
			$objPHPExcel->getActiveSheet()->SetCellValue('L'. $rowCount, $member['email']);
			$objPHPExcel->getActiveSheet()->SetCellValue('M'. $rowCount, $member['job_type']);
			$objPHPExcel->getActiveSheet()->SetCellValue('N'. $rowCount, $member['workplace_name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('O'. $rowCount, $member['workplace_phone']);
			$objPHPExcel->getActiveSheet()->SetCellValue('P'. $rowCount, $member['membership_year']);
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'. $rowCount, $member['membership_cause']);
			$objPHPExcel->getActiveSheet()->SetCellValue('R'. $rowCount, $member['membership_level']);
			$objPHPExcel->getActiveSheet()->SetCellValue('S'. $rowCount, $member['ministry']);
			$objPHPExcel->getActiveSheet()->SetCellValue('T'. $rowCount, $member['marital_status']);
			$objPHPExcel->getActiveSheet()->SetCellValue('U'. $rowCount, $member['spouse_name']);
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

	public function memberdetailsprint($mid) {
		$data['assigned_groups'] = $this->group->get_assigned_groups($mid);
		$data['member'] = $this->member->get_one($mid);
		$data['church_name'] = $this->cnfg->get('church_name');
		$this->load->view('member_details_print', $data);		
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

	public function deleteuser($uid) {
		if($this->user->delete_user($uid)) {
			$this->session->set_flashdata('success', 'የተጠቃሚው አካውንት በትክክል ጠፍቷል።');
			redirect('admin/users');
		} else {
			$this->session->set_flashdata('error', 'የተጠቃሚው አካውንት ማጥፋት አልተቻለም።');
			redirect('admin/users');
		}
	}

	public function profile() {
		$data['active_menu'] = "account";
		$data['current_user'] = $this->user->get_current_user(); 
		$this->load->view('templates/header', $data);
		$this->load->view('profile');
		$this->load->view('templates/footer');							
	}

	public function saveprofilechange() {
		$profile_picture = NULL; 

		if(!empty($_FILES['profile_picture_input']['name'])) {

			$new_name = "churchdb".time().$_FILES["profile_picture_input"]['name'];

	        $config['upload_path']    = './assets/profile_pictures/';
	        $config['allowed_types']  = 'jpg|png';
	        $config['max_size']       = 1000;
	        $config['max_width']      = 1235;
	        $config['max_height']     = 835;
	        $config['file_name'] 	  = $new_name; 

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('profile_picture_input')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/profile');			
	        } else {
	            $profile_picture = $this->upload->data('file_name');
	        }
	    }


		if($this->user->saveprofilechange($profile_picture)) {
			$this->session->set_flashdata('success', 'የዚህ አካውንት መረጃ በትክክል ተቀይሯል።');
			redirect('admin/profile');
		} else {
			$this->session->set_flashdata('error', 'የተጠቃሚውን መረጃ መቀየር አልተቻለም።');
			redirect('admin/profile');			
		}

	}

	public function savepasswordchange() {
		if(md5($this->input->post('current_password')) != $_SESSION['current_user']['password']) {
			$this->session->set_flashdata('password-change-failure', 'ያስገቡት የይለፍ ቃል ትክክል አይደለም እንደገና ይሞክሩ።');
			redirect('admin/profile');			
		} else if($this->input->post('new_password') != $this->input->post('confirm_password')) {
			$this->session->set_flashdata('password-change-failure', 'አዲሱ የይለፍ ቃል ከድጋሚው ጋር አንድ አይደለም በትክክል በድጋሚ ያስገቡ።');
			redirect('admin/profile');						
		} 

		if($this->user->changepassword()) {
			$this->session->set_flashdata('password-change-success', 'የይለፍ ቃል በትክክል ተቀይሯ።');
			redirect('admin/profile');			
		} else {
			$this->session->set_flashdata('password-change-failure', 'የየለፍ ቃሉን መቀየር አልተቻለም።');
			redirect('admin/profile');			
		}
	}

	public function savenote() {
		if($this->note->add()) {
			$this->session->set_flashdata('note-save-success', 'የፃፉት ማስታወሻ በትክክል ተመዝግቧል።');
			redirect('admin/memberdetails/'.$this->input->post('member_id').'/notes');
		} else {
			$this->session->set_flashdata('note-save-error', 'የፃፉትን ማስታወሻ መመዝገብ አልተቻለም።');
			redirect('admin/memberdetails/'.$this->input->post('member_id').'/notes');
		}
	}

	public function deletegroup($gid) {
		if($this->group->deletegroup($gid)) {
			$this->session->set_flashdata('success', 'ቡድኑ በትክክል ጠፍቷል።');			
			redirect('admin/listgroups');
		} else {
			$this->session->set_flashdata('error', 'የቡድኑን መረጃ ማጥፋት አልተቻለም።');			
			redirect('admin/listgroups');			
		}
	}

	public function changestatus() {
		if($this->member->changestatus()) {
			$this->session->set_flashdata('status_change_success', 'የምዕመን ሁኔታ በትክክል ተቀይሯል።');			
			redirect('admin/memberdetails/'.$this->input->post('id').'/status');			
		} else {
			$this->session->set_flashdata('status_change_error', 'የምዕመን ሁኔታ መቀየር አልተቻለም።');			
			redirect('admin/memberdetails/'.$this->input->post('id').'/status');						
		}
	}

	public function savepayment() {
		$ret = $this->payment->add();
		if($ret) { 
			$this->session->set_flashdata('payment_save_success', 'የክፍያው መረጃ በትክክል ተመዝግቧል።');			
			$this->session->set_flashdata('transaction_id', $ret);
			if($this->input->post('page') == 'memberdetails') { 
				redirect('admin/memberdetails/'.$this->input->post('member_id').'/payment'); 
			} else { 
				redirect('admin/listpayments');
			}			
		} else {
			$this->session->set_flashdata('payment_save_error', 'የክፍያውን መረጃ መመዝገብ አልተቻለም።');			
			if($this->input->post('page') == 'memberdetails') { 
				redirect('admin/memberdetails/'.$this->input->post('member_id').'/payment'); 
			} else { 
				redirect('admin/listpayments');
			}			
		}
	}

	public function listpayments() {
		$data['active_menu'] = "listpayments";
		$data['members'] = $this->member->get_all();
		$data['payments'] = $this->payment->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('list_payments');
		$this->load->view('templates/footer');									
	}

	public function printreceipt($pid) {
		$data['details'] = $this->payment->get_details($pid);
		$this->load->view('payment_receipt_print', $data);
	}

	public function membersexport() {
		$data['active_menu'] = "membersexport";
		$data['age_groups'] = $this->age_group->get_all();
		$data['membership_levels'] = $this->membership_level->get_all();
		$data['ministries'] = $this->ministry->get_all();
		$data['job_types'] = $this->job_type->get_all();
		$data['export_backups'] = $this->members_backup->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('export_members');
		$this->load->view('templates/footer');											
	}

	public function deletemember($id) {
		if($this->member->delete_member($id)) {
			$this->session->set_flashdata('success', 'የምዕመኑ መረጃ በትክክል ጠፍቷል።');			
			redirect('admin/listmembers'); 
		} else {
			$this->session->set_flashdata('error', 'የምዕመኑ መረጃ ማጥፋት አልተቻለም።');			
			redirect('admin/listmembers'); 			
		}
	}

	public function recyclebin() {
		$data['active_menu'] = "recyclebin";
		$data['members'] = $this->member->get_inactive_members();
		$this->load->view('templates/header', $data);
		$this->load->view('recyclebin');
		$this->load->view('templates/footer');													
	}

	public function backupdatabase() {
		$data['active_menu'] = "backupdatabase";
		$this->load->view('templates/header', $data);
		$this->load->view('backup_database');
		$this->load->view('templates/footer');													
	}

	public function generatebackup() {
		$this->load->dbutil();
		$prefs = array(
			'format' => 'txt', 
			'filename' => 'mybackup.sql',
			'newline' => '\n'
			);

		$backup = $this->dbutil->backup($prefs);

		$this->load->helper('file');
		write_file('database/mybackup.txt', $backup);

		$this->load->helper('download');
		force_download('mybackup.txt', $backup);
	}

	public function editagegroup() {
		if($this->age_group->editagegrouop()) {
			$this->session->set_flashdata('edit_age_group_success', 'የምዕመን እድሜ በድን መረጃ በትክክል ተቀይሯል።');			
			redirect('admin/generalsetting'); 
		} else {
			$this->session->set_flashdata('edit_age_group_error', 'የምዕመን እድሜ በድን መረጃ መቀየር አልተቻለም።');			
			redirect('admin/generalsetting'); 			
		}
	}

	// AJAX function
	public function fetch_kebeles() {
		if($this->input->post('kifle_ketema_title')) {
			echo $this->kebele->fetch_kebeles($this->input->post('kifle_ketema_title'));
		}
	}
	// Ajax function
	public function fetch_menders() {
		if($this->input->post('kebele_title')) {
			echo $this->mender->fetch_menders($this->input->post('kebele_title'));
		}
	}

	public function editmembershiplevels() {
		$data['active_menu'] = "formelements";
		$data['membership_level_choices'] = $this->membership_level->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('list_membership_level_choices');
		$this->load->view('templates/footer');			
	}

	public function editmembershipcauses() {
		$data['active_menu'] = "formelements";
		$data['membership_cause_choices'] = $this->membership_cause->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('list_membership_cause_choices');
		$this->load->view('templates/footer');			
	}

	public function addmembershiplevelchoice() {
		if($this->membership_level->add_choice()) {
			$this->session->set_flashdata('success', 'የአባልነት ደረጃ በትክክል ተመዝግቧል።');
			redirect('admin/editmembershiplevels');
		} else {
			$this->session->set_flashdata('error', 'የአባልነት ደረጃ መመዝገብ አልተቻለም።');
			redirect('admin/editmembershiplevels');
		}		
	}

	public function addmembershipcausechoice() {
		if($this->membership_cause->add_choice()) {
			$this->session->set_flashdata('success', 'አባል የሆኑበት ምክንያት በትክክል ተመዝግቧል።');
			redirect('admin/editmembershipcauses');
		} else {
			$this->session->set_flashdata('error', 'አባል የሆኑበት ምክንያት መመዝገብ አልተቻለም።');
			redirect('admin/editmembershipcauses');
		}		
	}

	public function addministrychoice() {
		if($this->ministry->add_choice()) {
			$this->session->set_flashdata('success', 'የአገልግሎት ዘርፍ በትክክል ተመዝግቧል።');
			redirect('admin/editministries');
		} else {
			$this->session->set_flashdata('error', 'የአገልግሎት ዘርፍ መመዝገብ አልተቻለም።');
			redirect('admin/editministries');
		}		
	}

	public function addkifleketemachoice() {
		if($this->kifle_ketema->add_choice()) {
			$this->session->set_flashdata('success', 'ክፍለ ከተማው በትክክል ተመዝግቧል።');
			redirect('admin/editkifleketemas');
		} else {
			$this->session->set_flashdata('error', 'ክፍለ ከተማውን መመዝገብ አልተቻለም።');
			redirect('admin/editkifleketemas');
		}				
	}

	public function addkebelechoice() {
		if($this->kebele->add_choice()) {
			$this->session->set_flashdata('success', 'ቀበሌው በትክክል ተመዝግቧል።');
			redirect('admin/editkebeles/'.$this->input->post('kifle_ketema_id'));
		} else {
			$this->session->set_flashdata('error', 'ቀበሌውን መመዝገብ አልተቻለም።');
			redirect('admin/editkebeles/'.$this->input->post('kifle_ketema_id'));
		}						
	}

	public function addmenderchoice() {
		if($this->mender->add_choice()) {
			$this->session->set_flashdata('success', 'መንደሩ በትክክል ተመዝግቧል።');
			redirect('admin/editmenders/'.$this->input->post('kebele_id'));
		} else {
			$this->session->set_flashdata('error', 'መንደሩን መመዝገብ አልተቻለም።');
			redirect('admin/editmenders/'.$this->input->post('kebele_id'));
		}						
	}

	public function editministries() {
		$data['active_menu'] = "formelements";
		$data['ministries'] = $this->ministry->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('list_ministry_choices');
		$this->load->view('templates/footer');					
	}

	public function editkifleketemas() {
		$data['active_menu'] = "formelements";
		$data['kifle_ketemas'] = $this->kifle_ketema->get_all();
		$this->load->view('templates/header', $data);
		$this->load->view('list_kifle_ketema_choices');
		$this->load->view('templates/footer');							
	}

	public function editkebeles($kifle_ketema_id) {
		$data['active_menu'] = "formelements";
		$data['kifle_ketema'] = $this->kifle_ketema->from_id($kifle_ketema_id);
		$data['kebeles'] = $this->kebele->get_from_kifle_ketema($data['kifle_ketema']['kifle_ketema_title']);
		$this->load->view('templates/header', $data);
		$this->load->view('list_kebele_choices');
		$this->load->view('templates/footer');									
	}

	public function editmenders($kebele_id) {
		$data['active_menu'] = "formelements";
		$data['kebele'] = $this->kebele->from_id($kebele_id);
		$data['menders'] = $this->mender->get_from_kebele($data['kebele']['kebele_title']);
		$this->load->view('templates/header', $data);
		$this->load->view('list_mender_choices');
		$this->load->view('templates/footer');									
	}

	public function editkifleketemachoice() {
		if($this->kifle_ketema->update_kifle_ketema()) {
			$this->session->set_flashdata('success', 'የክፍለ ከተማው መረጃ በትክክል ተቀይሯል።');
			redirect('admin/editkifleketemas');
		} else {
			$this->session->set_flashdata('error', 'የክፈለ ከተማውን መረጃ መቀየር አልተቻለም።');
			redirect('admin/editkifleketemas');
		}						
	}

	public function editkebelechoice() {
		if($this->kebele->update_kebele()) {
			$this->session->set_flashdata('success', 'የቀበሌው መረጃ በትክክል ተቀይሯል።');
			redirect('admin/editkebeles/'.$this->input->post('kifle_ketema_id'));
		} else {
			$this->session->set_flashdata('error', 'የቀበሌውን መረጃ መቀየር አልተቻለም።');
			redirect('admin/editkebeles/'.$this->input->post('kifle_ketema_id'));
		}						
	}

	public function editmenderchoice() {
		if($this->mender->update_mender()) {
			$this->session->set_flashdata('success', 'የመንደሩ መረጃ በትክክል ተቀይሯል።');
			redirect('admin/editmenders/'.$this->input->post('kebele_id'));
		} else {
			$this->session->set_flashdata('error', 'የመንደሩን መረጃ መቀየር አልተቻለም።');
			redirect('admin/editmenders/'.$this->input->post('kebele_id'));
		}						
	}

	public function deletekifleketema($id) {
		$data = $this->kifle_ketema->from_id($id);
		if($this->kifle_ketema->delete_kifle_ketema($id, $data['kifle_ketema_title'])) {
			$this->session->set_flashdata('success', 'የክፍለ ከተማው መረጃ በትክክል ጠፍቷል።');
			redirect('admin/editkifleketemas');
		} else {
			$this->session->set_flashdata('error', 'የክፈለ ከተማውን መረጃ ማጥፋት አልተቻለም።');
			redirect('admin/editkifleketemas');
		}								
	}

	public function deletekebele($kebele_id, $kifle_ketema_id) {
		$data = $this->kebele->from_id($kebele_id);
		if($this->kebele->delete_kebele($kebele_id, $data['kebele_title'])) {
			$this->session->set_flashdata('success', 'የቀበሌው መረጃ በትክክል ጠፍቷል።');
			redirect('admin/editkebeles/'.$kifle_ketema_id);
		} else {
			$this->session->set_flashdata('error', 'የቀበሌውን መረጃ ማጥፋት አልተቻለም።');
			redirect('admin/editkebeles/'.$kifle_ketema_id);
		}								
	}

	public function deletemender($mender_id, $kebele_id) {
		$data = $this->mender->from_id($mender_id);
		if($this->mender->delete_mender($mender_id, $data['mender_title'])) {
			$this->session->set_flashdata('success', 'የመንደር መረጃ በትክክል ጠፍቷል።');
			redirect('admin/editmenders/'.$kebele_id);
		} else {
			$this->session->set_flashdata('error', 'የመንደሩን መረጃ ማጥፋት አልተቻለም።');
			redirect('admin/editmenders/'.$kebele_id);
		}								
	}

	public function editmembershiplevelchoice() {
		if($this->membership_level->update_membership_level()) {
			$this->session->set_flashdata('success', 'የአባልነት ደረጃ በትክክል ተቀይሯል።');
			redirect('admin/editmembershiplevels');
		} else {
			$this->session->set_flashdata('error', 'የአባልነት ደረጃ መቀየር አልተቻለም።');
			redirect('admin/editmembershiplevels');
		}						
	}

	public function deletemembershiplevel($id) {
		$data = $this->membership_level->from_id($id);
		if($this->membership_level->delete_membership_level($id, $data['membership_level_title'])) {
			$this->session->set_flashdata('success', 'የአባልነት ደረጃ በትክክል ጠፍቷል።');
			redirect('admin/editmembershiplevels');
		} else {
			$this->session->set_flashdata('error', 'የአባልነት ደረጃ ማጥፋት አልተቻለም።');
			redirect('admin/editmembershiplevels');
		}										
	}

	public function editmembershipcausechoice() {
		if($this->membership_cause->update_membership_cause()) {
			$this->session->set_flashdata('success', 'አባል የሆኑበት ሁኔታ በትክክል ተቀይሯል።');
			redirect('admin/editmembershipcauses');
		} else {
			$this->session->set_flashdata('error', 'አባል የሆኑበት ሁኔታ መቀየር አልተቻለም።');
			redirect('admin/editmembershipcauses');
		}						
	}

	public function deletemembershipcause($id) {
		$data = $this->membership_cause->from_id($id);
		if($this->membership_cause->delete_membership_cause($id, $data['membership_cause_title'])) {
			$this->session->set_flashdata('success', 'አባል የሆኑበት ሁኔታ በትክክል ጠፍቷል።');
			redirect('admin/editmembershipcauses');
		} else {
			$this->session->set_flashdata('error', 'አባል የሆኑበት ሁኔታ ማጥፋት አልተቻለም።');
			redirect('admin/editmembershipcauses');
		}										
	}

	public function editministrychoice() {
		if($this->ministry->update_ministry()) {
			$this->session->set_flashdata('success', 'የአገልግሎት ዘርፍ በትክክል ተቀይሯል።');
			redirect('admin/editministries');
		} else {
			$this->session->set_flashdata('error', 'የአገልግሎት ዘርፍ መቀየር አልተቻለም።');
			redirect('admin/editministries');
		}						
	}

	public function deleteministry($id) {
		$data = $this->ministry->from_id($id);
		if($this->ministry->delete_ministry($id, $data['membership_cause_title'])) {
			$this->session->set_flashdata('success', 'የአገልግሎት ዘርፍ በትክክል ጠፍቷል።');
			redirect('admin/editministries');
		} else {
			$this->session->set_flashdata('error', 'የአገልግሎት ዘርፍ ማጥፋት አልተቻለም።');
			redirect('admin/editministries');
		}										
	}

	public function permanentdeletemember($id) {
		if($this->member->permanent_delete($id)) {
			$this->session->set_flashdata('success', 'የምዕመን መረጃ በትክክል ጠፍቷል።');
			redirect('admin/recyclebin');
		} else {
			$this->session->set_flashdata('error', 'የምዕመን መረጃ ማጥፋት አልተቻለም።');
			redirect('admin/recyclebin');
		}												
	}















}
