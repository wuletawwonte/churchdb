<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('kifle_ketema','kebele','mender');
	}

	public function add($avatar) {
		$colors = array('#00c0ef', '#0073b7', '#3c8dbc', '#39cccc', '#f39c12', '#ff851b', '#00a65a', '#01ff70', '#dd4b39', '#605ca8', '#f012be', '#777777', '#001f3f');	
		$spouse = $this->input->post('spouse');
		if($this->input->post('spouse') == 0){
			$spouse = null;
		}

		$data = array(
			'title' => $this->input->post('title'), 
			'firstname' => $this->input->post('firstname'), 
			'middlename' => $this->input->post('middlename'), 
			'lastname' => $this->input->post('lastname'), 
			'gender' => $this->input->post('gender'), 
			'kifle_ketema' => $this->input->post('kifle_ketema'), 
			'kebele' => $this->input->post('kebele'), 
			'mender' => $this->input->post('mender'), 
			'house_number' => $this->input->post('house_number'), 
			'home_phone' => $this->input->post('home_phone'), 
			'level_of_education' => $this->input->post('level_of_education'), 
			'field_of_study' => $this->input->post('field_of_study'), 
			'job_type' => $this->input->post('job_type'), 
			'workplace_name' => $this->input->post('workplace_name'), 
			'workplace_phone' => $this->input->post('workplace_phone'), 
			'monthly_income' => $this->input->post('monthly_income'), 
			'mobile_phone' => $this->input->post('mobile_phone'), 
			'email' => $this->input->post('email'), 
			'birthdate' => $this->input->post('birthdate'), 
			'hide_age' => $this->input->post('hide_age'), 
			'birth_place' => $this->input->post('birth_place'), 
			'membership_year' => $this->input->post('membership_year'), 
			'membership_cause' => $this->input->post('membership_cause'), 
			'membership_level' => $this->input->post('membership_level'), 
			'ministry' => $this->input->post('ministry'), 
			'marital_status' => $this->input->post('marital_status'), 
			'spouse' => $spouse,
			'avatar' => $avatar,
			'profile_color' => $colors[array_rand($colors, 1)] 
			);

		$this->db->insert('members', $data);		
		$last_id = $this->db->insert_id();
		$tracked_change = array(
			'by_user' => $this->session->userdata('current_user')['firstname'].' '.$this->session->userdata('current_user')['lastname'],
			'change_occured' => "created",
			'member_id' => $last_id
			);
		$this->db->insert('timelines', $tracked_change);

		if($this->input->post('spouse') != NULL) {
			$this->db->where('id', $this->input->post('spouse'));
			$this->db->update('members', array('marital_status' => 'ያገባ/ች', 'spouse' => $last_id));
		}

		return true;
	}

	public function check_member() {
		$this->db->where('firstname', $this->input->post('firstname'))
					->where('middlename', $this->input->post('middlename'));
		$res = $this->db->get('members')->result_array();
		if(empty($res)) {
			return true;
		} else {
			return false;
		}
	}

	public function edit($id, $avatar) {
		$spouse = $this->input->post('spouse');
		if($this->input->post('spouse') == 0){
			$spouse = null;
		}

		if($avatar == NULL) {
			$data = array(
				'title' => $this->input->post('title'), 
				'firstname' => $this->input->post('firstname'), 
				'middlename' => $this->input->post('middlename'), 
				'lastname' => $this->input->post('lastname'), 
				'gender' => $this->input->post('gender'), 
				'kifle_ketema' => $this->input->post('kifle_ketema'), 
				'kebele' => $this->input->post('kebele'), 
				'mender' => $this->input->post('mender'), 
				'house_number' => $this->input->post('house_number'), 
				'home_phone' => $this->input->post('home_phone'), 
				'level_of_education' => $this->input->post('level_of_education'), 
				'field_of_study' => $this->input->post('field_of_study'), 
				'job_type' => $this->input->post('job_type'), 
				'workplace_name' => $this->input->post('workplace_name'), 
				'workplace_phone' => $this->input->post('workplace_phone'), 
				'monthly_income' => $this->input->post('monthly_income'), 
				'mobile_phone' => $this->input->post('mobile_phone'), 
				'email' => $this->input->post('email'), 
				'birthdate' => $this->input->post('birthdate'), 
				'hide_age' => $this->input->post('hide_age'), 
				'birth_place' => $this->input->post('birth_place'), 
				'membership_year' => $this->input->post('membership_year'), 
				'membership_cause' => $this->input->post('membership_cause'), 
				'membership_level' => $this->input->post('membership_level'), 
				'ministry' => $this->input->post('ministry'), 
				'marital_status' => $this->input->post('marital_status'), 
				'spouse' => $spouse
				);
		} else {
			$data = array(
				'title' => $this->input->post('title'), 
				'firstname' => $this->input->post('firstname'), 
				'middlename' => $this->input->post('middlename'), 
				'lastname' => $this->input->post('lastname'), 
				'gender' => $this->input->post('gender'), 
				'kifle_ketema' => $this->input->post('kifle_ketema'), 
				'kebele' => $this->input->post('kebele'), 
				'mender' => $this->input->post('mender'), 
				'house_number' => $this->input->post('house_number'), 
				'home_phone' => $this->input->post('home_phone'), 
				'level_of_education' => $this->input->post('level_of_education'), 
				'field_of_study' => $this->input->post('field_of_study'), 
				'job_type' => $this->input->post('job_type'), 
				'workplace_name' => $this->input->post('workplace_name'), 
				'workplace_phone' => $this->input->post('workplace_phone'), 
				'monthly_income' => $this->input->post('monthly_income'), 
				'mobile_phone' => $this->input->post('mobile_phone'), 
				'email' => $this->input->post('email'), 
				'birthdate' => $this->input->post('birthdate'), 
				'hide_age' => $this->input->post('hide_age'), 
				'birth_place' => $this->input->post('birth_place'), 
				'membership_year' => $this->input->post('membership_year'), 
				'membership_cause' => $this->input->post('membership_cause'), 
				'membership_level' => $this->input->post('membership_level'), 
				'ministry' => $this->input->post('ministry'), 
				'marital_status' => $this->input->post('marital_status'), 
				'spouse' => $spouse,
				'avatar' => $avatar
				);
		}

		$this->db->where('id', $id);
		$this->db->update('members', $data);
		$tracked_change = array(
			'by_user' => $this->session->userdata('current_user')['firstname'].' '.$this->session->userdata('current_user')['lastname'],
			'change_occured' => "updated",
			'member_id' => $id
			);
		$this->db->insert('timelines', $tracked_change);
		return true;
	}

	public function get_all() {
		$this->db->where('status', 'ያለ');
		$this->db->order_by('firstname', 'ASC');
		$data = $this->db->get('members');

		return $data->result_array(); 
	}

	public function get_all_for_mobile() {
		$this->db->select('firstname, middlename, lastname, avatar, profile_color, gender, membership_level');
		$this->db->where('status', 'ያለ');
		$this->db->order_by('firstname', 'ASC');
		$data = $this->db->get('members');

		return $data->result_array(); 		
	}

	public function latest_members(){
		$this->db->where('status', 'ያለ');
		$this->db->limit(12);
		$this->db->order_by('created', 'DESC');
		$res = $this->db->get('members')->result_array();
		return $res;
	}

	public function record_count() {
		$this->db->where('status', 'ያለ');
		$res = $this->db->get('members');
		return $res->num_rows();
		// return $this->db->count_all('members');
	}

	public function get_one($id = NULL) {
		$this->db->select('m.*, TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) AS age, m2.id spouse_id, CONCAT(m2.firstname, " ", m2.middlename) AS spouse_name ');
		$this->db->where('m.id', $id);
		$this->db->join('members m2', 'm.spouse = m2.id', 'LEFT');
		$res = $this->db->get('members m');

		$res = $res->result_array();
		return  $res[0];
	}

	public function get_filtered_sorted($sage=NULL, $eage=NULL) {
		$this->load->model('age_group');
		$this->db->select('m.*, TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) AS age, m2.id spouse_id, CONCAT(m2.firstname, " ", m2.middlename) AS spouse_name ');
		$this->db->where('m.status', 'ያለ');
	    if($_SESSION['filtermember']['gender'] != NULL) {
	    	$this->db->where('m.gender', $_SESSION['filtermember']['gender']);
	    }
	    if($_SESSION['filtermember']['job_type'] != NULL) {
	    	$this->db->where('m.job_type', $_SESSION['filtermember']['job_type']);
	    }
	    if($_SESSION['filtermember']['membership_level'] != NULL) {
	    	$this->db->where('m.membership_level', $_SESSION['filtermember']['membership_level']);
	    }
	    if($_SESSION['filtermember']['ministry'] != NULL) {
	    	$this->db->where('m.ministry', $_SESSION['filtermember']['ministry']);
	    }
	    if($_SESSION['filtermember']['marital_status'] != NULL) {
	    	$this->db->where('m.marital_status', $_SESSION['filtermember']['marital_status']);
	    }
	    if($sage != NULL) {
	    	$this->db->where('TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) >', $sage);
	    	$this->db->where('TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) <', $eage);
	    }

		$this->db->join('members m2', 'm.spouse = m2.id', 'LEFT');
		$data = $this->db->get('members m');
		return $data->result_array();			
	}

	public function get_members_for_export() {
		$this->db->select('m.*, TIMESTAMPDIFF(YEAR,m.birthdate,CURDATE()) AS age, m2.id spouse_id, CONCAT(m2.firstname, " ", m2.middlename) AS spouse_name ');	    
		if($_SESSION['filtermember']['gender'] != NULL) {
	    	$this->db->where('m.gender', $_SESSION['filtermember']['gender']);
	    }
	    if($_SESSION['filtermember']['job_type'] != NULL) {
	    	$this->db->where('m.job_type', $_SESSION['filtermember']['job_type']);
	    }
	    if($_SESSION['filtermember']['membership_level'] != NULL) {
	    	$this->db->where('m.membership_level', $_SESSION['filtermember']['membership_level']);
	    }
	    if($_SESSION['filtermember']['ministry'] != NULL) {
	    	$this->db->where('m.ministry', $_SESSION['filtermember']['ministry']);
	    }
	    if($_SESSION['filtermember']['marital_status'] != NULL) {
	    	$this->db->where('m.marital_status', $_SESSION['filtermember']['marital_status']);
	    }
		$this->db->order_by('m.firstname', 'ASC');

		$this->db->join('members m2', 'm.spouse = m2.id', 'LEFT');
		$data = $this->db->get('members m');
		return $data->result_array();					
	}

	public function get_by_attrib($attrib, $id) {
		$this->db->where('id', $id);
		$res = $this->db->get('members');
		$res = $res->result_array();
		return $res[0][$attrib];
	}

	public function ajax_get_members() {
		$this->db->like('firstname', $this->input->get('q'));
		$this->db->or_like('middlename', $this->input->get('q'));
		$res = $this->db->select("id,concat(firstname,' ',middlename) AS text")
						->limit(8)
						->get('members');
		return $res;
	}

	public function get_group_members($id) {
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('group_members', 'members.id = group_members.member_id', 'INNER');
		$this->db->where('group_members.group_id', $id);
		$res = $this->db->get();

		return $res->result_array();
	}

	public function get_non_group_members($id) {
		$this->db->where('group_id', $id);
		$res = $this->db->get('group_members')->result_array();
		if(sizeof($res) == 0) {
			return $this->get_all();
		}
		$coll = [];
		foreach ($res as $key) {
			# code...
			array_push($coll, $key['member_id']);
		}
		$this->db->where_not_in('id', $coll);
		$this->db->order_by('firstname', 'ASC');
		$result = $this->db->get('members')->result_array();
		return $result;
	}

	public function gender_count() {		
		$this->db->where('status', 'ያለ');
		$this->db->where('gender', 'ወንድ');
		$data['male'] = $this->db->get('members')->num_rows();

		$this->db->where('status', 'ያለ');
		$this->db->where('gender', 'ሴት');
		$data['female'] = $this->db->get('members')->num_rows();

		return $data;
	}

	public function membership_level_count() {
		$result = $this->db->get('membership_levels')->result_array();
		$this->db->where('status', 'ያለ');
		$this->db->where('membership_level', 'አልተመረጠም')->or_where('membership_level', '');
		$resCount = $this->db->get('members')->num_rows();
		$data = [array('title' => "አልተመረጠም",'count' => $resCount,'color' => '#D3D3D3')];
		$colors = array('#001f3f', '#00a65a', '#0073b7', '#39cccc', '#f39c12', '#ff851b' , '#01ff70', '#dd4b39', '#605ca8', '#f012be', '#777777');	

		$index = 0;
		foreach($result as $res) {
			$this->db->where('status', 'ያለ');
			$this->db->where('membership_level', $res['membership_level_title']);
			$count = $this->db->get('members')->num_rows();
			$arrayRecord = array(
				'title' => $res['membership_level_title'], 
				'count' => $count,
				'color' => $colors[$index]
				); 
			array_push($data, $arrayRecord);
			$index++;
		}		

		return $data;
	}

	public function changestatus() {
		$data = array(
			'status' => $this->input->post('status'),
			'status_remark' => $this->input->post('status_remark') 
			);
		$this->db->where('id', $this->input->post('id'));
		if($this->db->update('members', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function delete_member($id) {
		$this->db->where('id', $id);
		if($this->db->update('members', array('status' => 'የጠፋ', 'status_remark' => ''))) {
			return true;
		} else {
			return false;
		}
	}

	public function get_inactive_members() {
		$this->db->where('status', 'የሌለ')->or_where('status', 'የጠፋ');
		$res = $this->db->get('members');

		return $res->result_array();
	}

	public function get_gender_specific($gender) {
		$this->db->select('id, CONCAT(firstname," ", middlename) as text');
		$this->db->where('gender !=', $gender);
		$this->db->where('status', 'ያለ');
		$this->db->where('spouse IS NULL');
		$data = $this->db->get('members');

		return $data->result_array();
	}

	public function get_gender_specific_ajax($search, $gender) {
		$this->db->select('id, CONCAT(firstname," ", middlename) as text');
		$this->db->where('spouse IS NULL');
		$this->db->where('status', 'ያለ');
		$this->db->like("firstname", $search, 'both');
		$this->db->where('gender !=', $gender);
		$data = $this->db->get('members');

		return $data->result_array();
	}

	public function permanent_delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('members');
		$this->db->where('spouse', $id);
		$this->db->update('members', array('spouse' => NULL));

		return true;
	}




}



