<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add() {
		$data = array(
			'name' => $this->input->post('name'), 
			'subcity' => $this->input->post('subcity'),
			'kebele' => $this->input->post('kebele'),
			'house_number' => $this->input->post('house_number'),
			'home_phone' => $this->input->post('home_phone'),
			'wedding_year' => $this->input->post('wedding_year')
			);

		$members = $this->input->post('members');
		try{
			$res = $this->db->insert('families', $data);
			for ($x=0; $x < count($members); $x++) { 
				$member = array(
					'firstname' => $members[$x]['firstname'], 
					'middlename' => $members[$x]['middlename'], 
					'lastname' => $members[$x]['lastname'], 
					'birthdate' => $members[$x]['birthdate'], 
					'birthmonth' => $members[$x]['birthmonth'], 
					'birthyear' => $members[$x]['birthyear'], 
					'family_id' => $res[0]['id'] 
					);				
				$this->db->insert('members', $member);
			}
			return 'success';
		} catch(Exception $e) {
			return 'error';
		}
	}

	public function get_all() {
		$data = $this->db->get('families');
		return $data->result_array();	
	}


}