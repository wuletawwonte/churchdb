<?php

declare(strict_types=1);

namespace App\Controllers;

class Admin extends BaseController
{
    protected $ageGroupModel;
    protected $membersBackupModel;
    protected $paymentModel;
    protected $kifleKetemaModel;
    protected $menderModel;
    protected $kebeleModel;
    protected $noteModel;
    protected $userModel;
    protected $cnfgModel;
    protected $memberModel;
    protected $timelineModel;
    protected $groupModel;
    protected $groupMemberModel;
    protected $jobTypeModel;
    protected $membershipCauseModel;
    protected $membershipLevelModel;
    protected $ministryModel;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger,
    ) {
        parent::initController($request, $response, $logger);
        helper(['form', 'url', 'text', 'file', 'date', 'download']);

        $this->ageGroupModel        = model('Age_group');
        $this->membersBackupModel = model('Members_backup');
        $this->paymentModel         = model('Payment');
        $this->kifleKetemaModel     = model('Kifle_ketema');
        $this->menderModel        = model('Mender');
        $this->kebeleModel          = model('Kebele');
        $this->noteModel            = model('Note');
        $this->userModel            = model('User');
        $this->cnfgModel            = model('Cnfg');
        $this->memberModel          = model('Member');
        $this->timelineModel        = model('Timeline');
        $this->groupModel           = model('Group');
        $this->groupMemberModel     = model('Group_member');
        $this->jobTypeModel         = model('Job_type');
        $this->membershipCauseModel = model('Membership_cause');
        $this->membershipLevelModel = model('Membership_level');
        $this->ministryModel        = model('Ministry');

        $request->setLocale('amharic');
        service('language')->setLocale($request->getLocale());
    }

	public function index() {
		$data['total_members'] = $this->memberModel->record_count();
		$data['total_groups'] = $this->groupModel->record_count();
		$data['latest_members'] = $this->memberModel->latest_members();
		$data['gender_count'] = $this->memberModel->gender_count();
		$data['membership_levels'] = $this->memberModel->membership_level_count();
		$data['active_menu'] = "dashboard";
		echo view('templates/header', $data);
		echo view('home');
		echo view('templates/footer');
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
				'total_rows' => $this->userModel->users_count()
			);

		$page = (int) ($this->request->getUri()->getSegment(3) ?? 0);
		$data['links'] = $this->paginationByOffset('admin/users', $config['per_page'], $config['total_rows'], $page);
		$data['active_menu'] = "users";
		$data['users'] = $this->userModel->get_all_users($config['per_page'], $page);
		echo view('templates/header', $data);
		echo view('list_users');
		echo view('templates/footer');
	}

	public function newuserform() {

		$data['active_menu'] = "";
		echo view('templates/header', $data);
		echo view('new_user_form');
		echo view('templates/footer');

	}

	public function generalsetting() {

		$data['active_menu'] = "generalsetting";
		$data['system_name'] = $this->cnfgModel->get('system_name');
		$data['system_name_short'] = $this->cnfgModel->get('system_name_short');
		$data['church_name'] = $this->cnfgModel->get('church_name');
		$data['default_password'] = $this->cnfgModel->get('default_password');
		$data['age_groups']	= $this->ageGroupModel->get_all();
		echo view('templates/header', $data);
		echo view('general_setting');
		echo view('templates/footer');
	}

	public function usersetting() {

		$data['active_menu'] = "usersetting";
		$data['users'] = $this->userModel->get_all();
		echo view('templates/header', $data);
		echo view('usersetting');
		echo view('templates/footer');

	}


	public function registeruser() {

		if($this->userModel->add()) {
			session()->setFlashdata('success', 'የተጠቃሚው አካውንት በትክክል ተከፍቷል።');
			return redirect()->to(site_url('admin/users'));
		} else {
			session()->setFlashdata('error', 'የተጠቃሚውን አካውንት መክፈት አልተቻለም።');
			$this->newuserform();
		}
	}

	public function edituser($uid) {
		if($this->userModel->edit($uid)) {
			session()->setFlashdata('success', 'የተጠቃሚው አካውንት በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/users'));
		} else {
			session()->setFlashdata('error', 'የተጠቃሚውን አካውንት መቀየር አልተቻለም።');
			$this->newuserform();
		}
	}


	public function edituserform($userid) {
		$data['active_menu'] = "";
		$data['user'] = $this->userModel->get_user('id', $userid);
		echo view('templates/header', $data);
		echo view('edit_user_form', $data);
		echo view('templates/footer');
	}

	public function savesetting() {
		
		$this->cnfgModel->edit_one('system_name', $this->request->getPost('system_name'));
		$this->cnfgModel->edit_one('system_name_short', $this->request->getPost('system_name_short'));
		$this->cnfgModel->edit_one('church_name', $this->request->getPost('church_name'));
		$this->cnfgModel->edit_one('default_password', $this->request->getPost('default_password'));

		session()->set([
			'system_name'       => (string) $this->request->getPost('system_name'),
			'system_name_short' => (string) $this->request->getPost('system_name_short'),
			'church_name'       => (string) $this->request->getPost('church_name'),
		]);

		session()->setFlashdata('success', 'የሲስተም ለውጦች በትክክል ተመዝግበዋል።');

		return redirect()->to(site_url('admin/generalsetting'));

	}


	public function personregistration() {

		$data['active_menu'] = "listmembers";
		$data['job_types'] = $this->jobTypeModel->get_all();
		$data['membership_causes'] = $this->membershipCauseModel->get_all();
		$data['membership_levels'] = $this->membershipLevelModel->get_all();
		$data['kifle_ketemas'] = $this->kifleKetemaModel->get_all();
		$data['ministries'] = $this->ministryModel->get_all();
		echo view('templates/header', $data);
		echo view('new_member_form', $data);
		echo view('templates/footer');

	}

	// AJAX function 
	public function get_gender_specific_ajax() {
		$searchTerm = $this->request->getPost('searchTerm');
		$gender = $this->request->getPost('gender');
		$res = $this->memberModel->get_gender_specific_ajax($searchTerm, $gender);
		
		echo json_encode($res);
	}

	public function listmembers() {

		$data['job_types'] = $this->jobTypeModel->get_all();
		$data['age_groups'] = $this->ageGroupModel->get_all();
		$data['membership_causes'] = $this->membershipCauseModel->get_all();
		$data['membership_levels'] = $this->membershipLevelModel->get_all();
		$data['ministries'] = $this->ministryModel->get_all();

		if(isset($_POST['submit'])) {

			$filtermember = array(
				'gender' => $this->request->getPost('gender'),
				'job_type' => $this->request->getPost('job_type'), 
				'membership_level' => $this->request->getPost('membership_level'),
				'ministry' => $this->request->getPost('ministry'),
				'marital_status' => $this->request->getPost('marital_status'),
				'age_group' => $this->request->getPost('age_group')
			);
			session()->set('filtermember', $filtermember);
			$sage = null;
			$eage = null;
			if($this->request->getPost('age_group')) {
				$sage = $this->ageGroupModel->get_one($this->request->getPost('age_group'))['start_age'];
				$eage = $this->ageGroupModel->get_one($this->request->getPost('age_group'))['end_age'];
			}

			$data['active_menu'] = "listmembers";
			$data['members'] = $this->memberModel->get_filtered_sorted($sage, $eage);
			echo view('templates/header', $data);
			echo view('list_members');
			echo view('templates/footer');

		} else {

			$sage = null;
			$eage = null;
			if((session()->get('filtermember') ?? [])['age_group']) {
				$sage = $this->ageGroupModel->get_one((session()->get('filtermember') ?? [])['age_group'])['start_age'];
				$eage = $this->ageGroupModel->get_one((session()->get('filtermember') ?? [])['age_group'])['end_age'];
			}


			$data['active_menu'] = "listmembers";
			$data['members'] = $this->memberModel->get_filtered_sorted($sage, $eage);
			echo view('templates/header', $data);
			echo view('list_members');
			echo view('templates/footer');
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
			session()->set('filtermember', $filtermember);		
			return redirect()->to(site_url('admin/members')); 
	}

	public function savemember() {

		$avatar = null;
		$file   = $this->request->getFile('avatar_input');
		if ($file !== null && $file->isValid() && $file->getError() !== UPLOAD_ERR_NO_FILE) {
			$newName = $file->getRandomName();
			$file->move(FCPATH . 'assets/avatars', $newName);
			$avatar = $newName;
		}

	    if($this->memberModel->check_member()) {
			if($this->memberModel->add($avatar)) {
				session()->setFlashdata('success', 'የምዕመን መረጃ በትክክል ተመዝግቧል።');
				return redirect()->to(site_url('admin/personregistration'));
			} else {
				session()->setFlashdata('error', 'የምዕመን መረጃ ሊመዘገብ አልተቻለም።');
				return redirect()->to(site_url('admin/personregistration'));			
			}
		} else {
			session()->setFlashdata('error', 'በዚህ ስም የተመዘገበ ምዕመን አለ።');
			return redirect()->to(site_url('admin/personregistration'));						
		}
	}	

	public function savememberchanges() {

		$avatar = null;
		$file   = $this->request->getFile('avatar_input');
		if ($file !== null && $file->isValid() && $file->getError() !== UPLOAD_ERR_NO_FILE) {
			$new_name = 'churchdb' . time() . $file->getClientName();
			$file->move(FCPATH . 'assets/avatars', $new_name);
			$avatar = $new_name;
		}


		if($this->memberModel->edit($this->request->getPost('id'), $avatar)) {
			session()->setFlashdata('success', 'የምዕመኑ መረጃ በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/memberdetails/'.$this->request->getPost('id')));
		} else {
			session()->setFlashdata('error', 'የምዕመኑን መረጃ መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/editmember/'.$this->request->getPost('id')));			
		}
	}

	public function memberdetails($id = NULL, $active_tab=NULL) {
		$data['active_menu'] = "listmembers";
		$data['active_tab'] = $active_tab;
		$data['member'] = $this->memberModel->get_one($id);
		$data['timelines'] = $this->timelineModel->get_timeline($id);
		$data['assigned_groups'] = $this->groupModel->get_assigned_groups($id);
		$data['notes'] = $this->noteModel->get_notes($id);
		$data['payments'] = $this->paymentModel->get_payments($id);
		echo view('templates/header', $data);
		echo view('member_details');
		echo view('templates/footer');		
	}

	public function editmember($id = NULL) {
		$data['active_menu'] = '';
		$data['member'] = $this->memberModel->get_one($id);
		$data['members'] = $this->memberModel->get_gender_specific($data['member']['gender']);	
		$data['job_types'] = $this->jobTypeModel->get_all();		
		$data['membership_causes'] = $this->membershipCauseModel->get_all();
		$data['membership_levels'] = $this->membershipLevelModel->get_all();
		$data['ministries'] = $this->ministryModel->get_all();
		$data['kifle_ketemas'] = $this->kifleKetemaModel->get_all();
		$data['kebeles'] = $this->kebeleModel->get_from_kifle_ketema($data['member']['kifle_ketema']);
		$data['menders'] = $this->menderModel->get_from_kebele($data['member']['kebele']);
		echo view('templates/header', $data);
		echo view('edit_member_form');
		echo view('templates/footer');		
	}

	public function listgroups() {

		$config['base_url'] = base_url('admin/listgroups');
		$config['total_rows'] = $this->groupModel->record_count();
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

		$page = (int) ($this->request->getUri()->getSegment(3) ?? 0);
		$data['links'] = $this->paginationByOffset('admin/listgroups', $config['per_page'], $config['total_rows'], $page);
		$data['active_menu'] = "groups";
		$data['groups'] = $this->groupModel->get_all('created', 'DESC', $config["per_page"], $page);
		echo view('templates/header', $data);
		echo view('list_groups');
		echo view('templates/footer');		
	}

	public function savegroup() {
		$this->groupModel->add();
		return redirect()->to(site_url('admin/listgroups'));
	}

		public function export_families_csv() {
		session()->setFlashdata('error', 'Family export is not available.');
		return redirect()->to(site_url('admin/members'));
	}

	public function deletemembersbackup($id) {
		if($this->membersBackupModel->delete($id)) {
			session()->setFlashdata('success', 'የተዘጋጀው ባካፕ በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/membersexport'));
		} else {
			session()->setFlashdata('error', 'የተዘጋጀውን ባካፕ ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/membersexport'));
		}		
	}

	public function export_members_excel_backup() {
		$filename = "ChurchDb_members ".date('F j_Y h-i-s').".xlsx";
		require_once APPPATH . 'ThirdParty/PHPExcel.php';

		$members = $this->memberModel->get_members_for_export();

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
		if (! is_dir(WRITEPATH . 'downloads')) {
			mkdir(WRITEPATH . 'downloads', 0775, true);
		}
		$objWriter->save(WRITEPATH . 'downloads/' . $filename);
		
		$this->membersBackupModel->add($filename);

		return redirect()->to(site_url('admin/membersexport'));

	}

	public function export_members_excel() {
		$filename = "ChurchDb_members ".date('F j_Y h-i-s').".xlsx";
		require_once APPPATH . 'ThirdParty/PHPExcel.php';

		$members = $this->memberModel->get_members_for_export();

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
		require_once APPPATH . 'ThirdParty/PHPExcel.php';

		$members = $this->memberModel->get_members_for_export();

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
		$data['members'] = $this->memberModel->get_members_for_export();
		echo view('members_print', $data);
	}


	public function add_group_member() {
		$this->groupMemberModel->add_group_member();
		return redirect()->to(site_url('admin/groupdetails/'.$this->request->getPost('group_id')));		
	}

	public function ajax_get_member() {
		$res = $this->memberModel->ajax_get_members();
		$this->response->setJSON($res->getResult());
		return $this->response;
	}

	public function groupdetails($id) {
		$data['active_menu'] = "";
		$data['group'] = $this->groupModel->get_one($id);
		$data['group_members'] = $this->memberModel->get_group_members($id);
		$data['non_group_members'] = $this->memberModel->get_non_group_members($id);
		echo view('templates/header', $data);
		echo view('group_details');
		echo view('templates/footer');				
	}

	public function sunday_school_classes() {
		$data['active_menu'] = "sunday_school";
		$data['sunday_school_classes'] = $this->groupModel->get_sunday_classes();
		echo view('templates/header', $data);
		echo view('sunday_school_classes');
		echo view('templates/footer');						
	}

	public function remove_group_member($mid, $gid) {
		$this->groupMemberModel->remove_group_member($mid, $gid);
		return redirect()->to(site_url('admin/groupdetails/'.$gid));
	}

	public function listformelements() {
		$data['active_menu'] = "formelements";
		$data['job_types'] = $data['job_types'] = $this->jobTypeModel->get_all();
		$data['membership_causes'] = $this->membershipCauseModel->get_all();
		$data['membership_levels'] = $this->membershipLevelModel->get_all();
		$data['ministries'] = $this->ministryModel->get_all();
		echo view('templates/header', $data);
		echo view('list_form_elements');
		echo view('templates/footer');								
	}

	public function adminreport() {
		$data['active_menu'] = "adminreport";
		$data['church_name'] = $this->cnfgModel->get('church_name');
		echo view('templates/header', $data);
		echo view('report');
		echo view('templates/footer');								
	}

	public function adminreportprint() {
		$data['church_name'] = $this->cnfgModel->get('church_name');
		echo view('report_print', $data);		
	}

	public function memberdetailsprint($mid) {
		$data['assigned_groups'] = $this->groupModel->get_assigned_groups($mid);
		$data['member'] = $this->memberModel->get_one($mid);
		$data['church_name'] = $this->cnfgModel->get('church_name');
		echo view('member_details_print', $data);		
	}

	public function addjobtypechoice() {
		if($this->jobTypeModel->add_choice()) {
			session()->setFlashdata('success', 'የስራ አይነት በትክክል ተመዝግቧል።');
			return redirect()->to(site_url('admin/listformelements'));
		} else {
			session()->setFlashdata('error', 'የስራ አይነት መመዝገብ አልተቻለም።');
			return redirect()->to(site_url('admin/listformelements'));
		}		
	}

	public function deletemembershiplevelchoice($mlid) {
		if($this->membershipLevelModel->delete_choice($mlid)) {
			session()->setFlashdata('success', 'የአገልግሎት ዘርፍ ምርጫው በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/listformelements'));
		} else {
			session()->setFlashdata('error', 'የአገልግሎት ዘርፍ ምርጫውን ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/listformelements'));
		}		
	}	

	public function deletejobtypechoice($jtid) {
		if($this->jobTypeModel->delete_choice($jtid)) {
			session()->setFlashdata('success', 'የስራ አይነት ምርጫው በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/listformelements'));
		} else {
			session()->setFlashdata('error', 'የስራ አይነት ምርጫውን ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/listformelements'));
		}				
	}

	public function deletemembershipcausechoice($mcid) {
		if($this->membershipCauseModel->delete_choice($mcid)) {
			session()->setFlashdata('success', 'አባል የሆኑበት ሁኔታ ምርጫው በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/listformelements'));
		} else {
			session()->setFlashdata('error', 'አባል የሆኑበት ሁኔታ ለሚለው ምርጫውን ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/listformelements'));
		}						
	}

	public function deleteministrychoice($mid) {
		if($this->ministryModel->delete_choice($mid)) {
			session()->setFlashdata('success', 'የአገልግሎት ዘርፍ ምርጫው በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/listformelements'));
		} else {
			session()->setFlashdata('error', 'የአገልግሎት ዘርፍ ለሚለው ምርጫውን ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/listformelements'));
		}						
	}

	public function deleteuser($uid) {
		if($this->userModel->delete_user($uid)) {
			session()->setFlashdata('success', 'የተጠቃሚው አካውንት በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/users'));
		} else {
			session()->setFlashdata('error', 'የተጠቃሚው አካውንት ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/users'));
		}
	}

	public function profile() {
		$currentUser = $this->userModel->get_current_user();
		if ($currentUser === null) {
			session()->remove(['current_user', 'is_logged_in']);
			session()->setFlashdata('login_failed', 'ክፍለ ጊዜዎ አልቋል ወይም ተጠቃሚው በመረጃ ቋቱ ላይ አይገኝም። እባክዎ እንደገና ይግቡ።');

			return redirect()->to(site_url('users'));
		}
		$data['active_menu'] = "account";
		$data['current_user'] = $currentUser;
		echo view('templates/header', $data);
		echo view('profile');
		echo view('templates/footer');							
	}

	public function saveprofilechange() {
		$profile_picture = null;
		$file            = $this->request->getFile('profile_picture_input');
		if ($file !== null && $file->isValid() && $file->getError() !== UPLOAD_ERR_NO_FILE) {
			$new_name = 'churchdb' . time() . $file->getClientName();
			$file->move(FCPATH . 'assets/profile_pictures', $new_name);
			$profile_picture = $new_name;
		}


		if($this->userModel->saveprofilechange($profile_picture)) {
			session()->setFlashdata('success', 'የዚህ አካውንት መረጃ በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/profile'));
		} else {
			session()->setFlashdata('error', 'የተጠቃሚውን መረጃ መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/profile'));			
		}

	}

	public function savepasswordchange() {
		if(md5($this->request->getPost('current_password')) != session()->get('current_user')['password']) {
			session()->setFlashdata('password-change-failure', 'ያስገቡት የይለፍ ቃል ትክክል አይደለም እንደገና ይሞክሩ።');
			return redirect()->to(site_url('admin/profile'));			
		} else if($this->request->getPost('new_password') != $this->request->getPost('confirm_password')) {
			session()->setFlashdata('password-change-failure', 'አዲሱ የይለፍ ቃል ከድጋሚው ጋር አንድ አይደለም በትክክል በድጋሚ ያስገቡ።');
			return redirect()->to(site_url('admin/profile'));						
		} 

		if($this->userModel->changepassword()) {
			session()->setFlashdata('password-change-success', 'የይለፍ ቃል በትክክል ተቀይሯ።');
			return redirect()->to(site_url('admin/profile'));			
		} else {
			session()->setFlashdata('password-change-failure', 'የየለፍ ቃሉን መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/profile'));			
		}
	}

	public function savenote() {
		if($this->noteModel->add()) {
			session()->setFlashdata('note-save-success', 'የፃፉት ማስታወሻ በትክክል ተመዝግቧል።');
			return redirect()->to(site_url('admin/memberdetails/'.$this->request->getPost('member_id').'/notes'));
		} else {
			session()->setFlashdata('note-save-error', 'የፃፉትን ማስታወሻ መመዝገብ አልተቻለም።');
			return redirect()->to(site_url('admin/memberdetails/'.$this->request->getPost('member_id').'/notes'));
		}
	}

	public function deletegroup($gid) {
		if($this->groupModel->deletegroup($gid)) {
			session()->setFlashdata('success', 'ቡድኑ በትክክል ጠፍቷል።');			
			return redirect()->to(site_url('admin/listgroups'));
		} else {
			session()->setFlashdata('error', 'የቡድኑን መረጃ ማጥፋት አልተቻለም።');			
			return redirect()->to(site_url('admin/listgroups'));			
		}
	}

	public function changestatus() {
		if($this->memberModel->changestatus()) {
			session()->setFlashdata('status_change_success', 'የምዕመን ሁኔታ በትክክል ተቀይሯል።');			
			return redirect()->to(site_url('admin/memberdetails/'.$this->request->getPost('id').'/status'));			
		} else {
			session()->setFlashdata('status_change_error', 'የምዕመን ሁኔታ መቀየር አልተቻለም።');			
			return redirect()->to(site_url('admin/memberdetails/'.$this->request->getPost('id').'/status'));						
		}
	}

	public function savepayment() {
		$ret = $this->paymentModel->add();
		if($ret) { 
			session()->setFlashdata('payment_save_success', 'የክፍያው መረጃ በትክክል ተመዝግቧል።');			
			session()->setFlashdata('transaction_id', $ret);
			if($this->request->getPost('page') == 'memberdetails') { 
				return redirect()->to(site_url('admin/memberdetails/'.$this->request->getPost('member_id').'/payment')); 
			} else { 
				return redirect()->to(site_url('admin/listpayments'));
			}			
		} else {
			session()->setFlashdata('payment_save_error', 'የክፍያውን መረጃ መመዝገብ አልተቻለም።');			
			if($this->request->getPost('page') == 'memberdetails') { 
				return redirect()->to(site_url('admin/memberdetails/'.$this->request->getPost('member_id').'/payment')); 
			} else { 
				return redirect()->to(site_url('admin/listpayments'));
			}			
		}
	}

	public function listpayments() {
		$data['active_menu'] = "listpayments";
		$data['members'] = $this->memberModel->get_all();
		$data['payments'] = $this->paymentModel->get_all();
		echo view('templates/header', $data);
		echo view('list_payments');
		echo view('templates/footer');									
	}

	public function printreceipt($pid) {
		$data['details'] = $this->paymentModel->get_details($pid);
		echo view('payment_receipt_print', $data);
	}

	public function membersexport() {
		$data['active_menu'] = "membersexport";
		$data['age_groups'] = $this->ageGroupModel->get_all();
		$data['membership_levels'] = $this->membershipLevelModel->get_all();
		$data['ministries'] = $this->ministryModel->get_all();
		$data['job_types'] = $this->jobTypeModel->get_all();
		$data['export_backups'] = $this->membersBackupModel->get_all();
		echo view('templates/header', $data);
		echo view('export_members');
		echo view('templates/footer');											
	}

	public function deletemember($id) {
		if($this->memberModel->delete_member($id)) {
			session()->setFlashdata('success', 'የምዕመኑ መረጃ በትክክል ጠፍቷል።');			
			return redirect()->to(site_url('admin/members')); 
		} else {
			session()->setFlashdata('error', 'የምዕመኑ መረጃ ማጥፋት አልተቻለም።');			
			return redirect()->to(site_url('admin/members')); 			
		}
	}

	public function recyclebin() {
		$data['active_menu'] = "recyclebin";
		$data['members'] = $this->memberModel->get_inactive_members();
		echo view('templates/header', $data);
		echo view('recyclebin');
		echo view('templates/footer');													
	}

	public function backupdatabase() {
		$data['active_menu'] = "backupdatabase";
		echo view('templates/header', $data);
		echo view('backup_database');
		echo view('templates/footer');													
	}

	public function generatebackup() {
		
		$prefs = [
			'format'   => 'txt',
			'filename' => 'mybackup.sql',
			'newline'  => "\n",
		];

		$backup = \CodeIgniter\Database\Config::utils()->backup($prefs);

		helper(['file']);
		write_file(ROOTPATH . 'database/mybackup.txt', $backup);

		helper(['download']);
		force_download('mybackup.txt', $backup);
	}

	public function editagegroup() {
		if($this->ageGroupModel->editagegroup()) {
			session()->setFlashdata('edit_age_group_success', 'የምዕመን እድሜ በድን መረጃ በትክክል ተቀይሯል።');			
			return redirect()->to(site_url('admin/generalsetting')); 
		} else {
			session()->setFlashdata('edit_age_group_error', 'የምዕመን እድሜ በድን መረጃ መቀየር አልተቻለም።');			
			return redirect()->to(site_url('admin/generalsetting')); 			
		}
	}

	// AJAX function
	public function fetch_kebeles() {
		if($this->request->getPost('kifle_ketema_title')) {
			echo $this->kebeleModel->fetch_kebeles($this->request->getPost('kifle_ketema_title'));
		}
	}
	// Ajax function
	public function fetch_menders() {
		if($this->request->getPost('kebele_title')) {
			echo $this->menderModel->fetch_menders($this->request->getPost('kebele_title'));
		}
	}

	public function editmembershiplevels() {
		$data['active_menu'] = "formelements";
		$data['membership_level_choices'] = $this->membershipLevelModel->get_all();
		echo view('templates/header', $data);
		echo view('list_membership_level_choices');
		echo view('templates/footer');			
	}

	public function editmembershipcauses() {
		$data['active_menu'] = "formelements";
		$data['membership_cause_choices'] = $this->membershipCauseModel->get_all();
		echo view('templates/header', $data);
		echo view('list_membership_cause_choices');
		echo view('templates/footer');			
	}

	public function addmembershiplevelchoice() {
		if($this->membershipLevelModel->add_choice()) {
			session()->setFlashdata('success', 'የአባልነት ደረጃ በትክክል ተመዝግቧል።');
			return redirect()->to(site_url('admin/editmembershiplevels'));
		} else {
			session()->setFlashdata('error', 'የአባልነት ደረጃ መመዝገብ አልተቻለም።');
			return redirect()->to(site_url('admin/editmembershiplevels'));
		}		
	}

	public function addmembershipcausechoice() {
		if($this->membershipCauseModel->add_choice()) {
			session()->setFlashdata('success', 'አባል የሆኑበት ምክንያት በትክክል ተመዝግቧል።');
			return redirect()->to(site_url('admin/editmembershipcauses'));
		} else {
			session()->setFlashdata('error', 'አባል የሆኑበት ምክንያት መመዝገብ አልተቻለም።');
			return redirect()->to(site_url('admin/editmembershipcauses'));
		}		
	}

	public function addministrychoice() {
		if($this->ministryModel->add_choice()) {
			session()->setFlashdata('success', 'የአገልግሎት ዘርፍ በትክክል ተመዝግቧል።');
			return redirect()->to(site_url('admin/editministries'));
		} else {
			session()->setFlashdata('error', 'የአገልግሎት ዘርፍ መመዝገብ አልተቻለም።');
			return redirect()->to(site_url('admin/editministries'));
		}		
	}

	public function addkifleketemachoice() {
		if($this->kifleKetemaModel->add_choice()) {
			session()->setFlashdata('success', 'ክፍለ ከተማው በትክክል ተመዝግቧል።');
			return redirect()->to(site_url('admin/editkifleketemas'));
		} else {
			session()->setFlashdata('error', 'ክፍለ ከተማውን መመዝገብ አልተቻለም።');
			return redirect()->to(site_url('admin/editkifleketemas'));
		}				
	}

	public function addkebelechoice() {
		if($this->kebeleModel->add_choice()) {
			session()->setFlashdata('success', 'ቀበሌው በትክክል ተመዝግቧል።');
			return redirect()->to(site_url('admin/editkebeles/'.$this->request->getPost('kifle_ketema_id')));
		} else {
			session()->setFlashdata('error', 'ቀበሌውን መመዝገብ አልተቻለም።');
			return redirect()->to(site_url('admin/editkebeles/'.$this->request->getPost('kifle_ketema_id')));
		}						
	}

	public function addmenderchoice() {
		if($this->menderModel->add_choice()) {
			session()->setFlashdata('success', 'መንደሩ በትክክል ተመዝግቧል።');
			return redirect()->to(site_url('admin/editmenders/'.$this->request->getPost('kebele_id')));
		} else {
			session()->setFlashdata('error', 'መንደሩን መመዝገብ አልተቻለም።');
			return redirect()->to(site_url('admin/editmenders/'.$this->request->getPost('kebele_id')));
		}						
	}

	public function editministries() {
		$data['active_menu'] = "formelements";
		$data['ministries'] = $this->ministryModel->get_all();
		echo view('templates/header', $data);
		echo view('list_ministry_choices');
		echo view('templates/footer');					
	}

	public function editkifleketemas() {
		$data['active_menu'] = "formelements";
		$data['kifle_ketemas'] = $this->kifleKetemaModel->get_all();
		echo view('templates/header', $data);
		echo view('list_kifle_ketema_choices');
		echo view('templates/footer');							
	}

	public function editkebeles($kifle_ketema_id) {
		$data['active_menu'] = "formelements";
		$data['kifle_ketema'] = $this->kifleKetemaModel->from_id($kifle_ketema_id);
		$data['kebeles'] = $this->kebeleModel->get_from_kifle_ketema($data['kifle_ketema']['kifle_ketema_title']);
		echo view('templates/header', $data);
		echo view('list_kebele_choices');
		echo view('templates/footer');									
	}

	public function editmenders($kebele_id) {
		$data['active_menu'] = "formelements";
		$data['kebele'] = $this->kebeleModel->from_id($kebele_id);
		$data['menders'] = $this->menderModel->get_from_kebele($data['kebele']['kebele_title']);
		echo view('templates/header', $data);
		echo view('list_mender_choices');
		echo view('templates/footer');									
	}

	public function editkifleketemachoice() {
		if($this->kifleKetemaModel->update_kifle_ketema()) {
			session()->setFlashdata('success', 'የክፍለ ከተማው መረጃ በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/editkifleketemas'));
		} else {
			session()->setFlashdata('error', 'የክፈለ ከተማውን መረጃ መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/editkifleketemas'));
		}						
	}

	public function editkebelechoice() {
		if($this->kebeleModel->update_kebele()) {
			session()->setFlashdata('success', 'የቀበሌው መረጃ በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/editkebeles/'.$this->request->getPost('kifle_ketema_id')));
		} else {
			session()->setFlashdata('error', 'የቀበሌውን መረጃ መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/editkebeles/'.$this->request->getPost('kifle_ketema_id')));
		}						
	}

	public function editmenderchoice() {
		if($this->menderModel->update_mender()) {
			session()->setFlashdata('success', 'የመንደሩ መረጃ በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/editmenders/'.$this->request->getPost('kebele_id')));
		} else {
			session()->setFlashdata('error', 'የመንደሩን መረጃ መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/editmenders/'.$this->request->getPost('kebele_id')));
		}						
	}

	public function deletekifleketema($id) {
		$data = $this->kifleKetemaModel->from_id($id);
		if($this->kifleKetemaModel->delete_kifle_ketema($id, $data['kifle_ketema_title'])) {
			session()->setFlashdata('success', 'የክፍለ ከተማው መረጃ በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/editkifleketemas'));
		} else {
			session()->setFlashdata('error', 'የክፈለ ከተማውን መረጃ ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/editkifleketemas'));
		}								
	}

	public function deletekebele($kebele_id, $kifle_ketema_id) {
		$data = $this->kebeleModel->from_id($kebele_id);
		if($this->kebeleModel->delete_kebele($kebele_id, $data['kebele_title'])) {
			session()->setFlashdata('success', 'የቀበሌው መረጃ በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/editkebeles/'.$kifle_ketema_id));
		} else {
			session()->setFlashdata('error', 'የቀበሌውን መረጃ ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/editkebeles/'.$kifle_ketema_id));
		}								
	}

	public function deletemender($mender_id, $kebele_id) {
		$data = $this->menderModel->from_id($mender_id);
		if($this->menderModel->delete_mender($mender_id, $data['mender_title'])) {
			session()->setFlashdata('success', 'የመንደር መረጃ በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/editmenders/'.$kebele_id));
		} else {
			session()->setFlashdata('error', 'የመንደሩን መረጃ ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/editmenders/'.$kebele_id));
		}								
	}

	public function editmembershiplevelchoice() {
		if($this->membershipLevelModel->update_membership_level()) {
			session()->setFlashdata('success', 'የአባልነት ደረጃ በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/editmembershiplevels'));
		} else {
			session()->setFlashdata('error', 'የአባልነት ደረጃ መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/editmembershiplevels'));
		}						
	}

	public function deletemembershiplevel($id) {
		$data = $this->membershipLevelModel->from_id($id);
		if($this->membershipLevelModel->delete_membership_level($id, $data['membership_level_title'])) {
			session()->setFlashdata('success', 'የአባልነት ደረጃ በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/editmembershiplevels'));
		} else {
			session()->setFlashdata('error', 'የአባልነት ደረጃ ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/editmembershiplevels'));
		}										
	}

	public function editmembershipcausechoice() {
		if($this->membershipCauseModel->update_membership_cause()) {
			session()->setFlashdata('success', 'አባል የሆኑበት ሁኔታ በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/editmembershipcauses'));
		} else {
			session()->setFlashdata('error', 'አባል የሆኑበት ሁኔታ መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/editmembershipcauses'));
		}						
	}

	public function deletemembershipcause($id) {
		$data = $this->membershipCauseModel->from_id($id);
		if($this->membershipCauseModel->delete_membership_cause($id, $data['membership_cause_title'])) {
			session()->setFlashdata('success', 'አባል የሆኑበት ሁኔታ በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/editmembershipcauses'));
		} else {
			session()->setFlashdata('error', 'አባል የሆኑበት ሁኔታ ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/editmembershipcauses'));
		}										
	}

	public function editministrychoice() {
		if($this->ministryModel->update_ministry()) {
			session()->setFlashdata('success', 'የአገልግሎት ዘርፍ በትክክል ተቀይሯል።');
			return redirect()->to(site_url('admin/editministries'));
		} else {
			session()->setFlashdata('error', 'የአገልግሎት ዘርፍ መቀየር አልተቻለም።');
			return redirect()->to(site_url('admin/editministries'));
		}						
	}

	public function deleteministry($id) {
		$data = $this->ministryModel->from_id($id);
		if($this->ministryModel->delete_ministry($id, $data['membership_cause_title'])) {
			session()->setFlashdata('success', 'የአገልግሎት ዘርፍ በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/editministries'));
		} else {
			session()->setFlashdata('error', 'የአገልግሎት ዘርፍ ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/editministries'));
		}										
	}

	public function permanentdeletemember($id) {
		if($this->memberModel->permanent_delete($id)) {
			session()->setFlashdata('success', 'የምዕመን መረጃ በትክክል ጠፍቷል።');
			return redirect()->to(site_url('admin/recyclebin'));
		} else {
			session()->setFlashdata('error', 'የምዕመን መረጃ ማጥፋት አልተቻለም።');
			return redirect()->to(site_url('admin/recyclebin'));
		}												
	}















}
