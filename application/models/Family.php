<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add($data) {

		$this->db->insert('families', $data);
		return true;
		// try{
		// 	for ($x=0; $x < count($members); $x++) { 
		// 		$member = array(
		// 			'firstname' => $members[$x]['firstname'], 
		// 			'middlename' => $members[$x]['middlename'], 
		// 			'lastname' => $members[$x]['lastname'], 
		// 			'birthdate' => $members[$x]['birthdate'], 
		// 			'birthmonth' => $members[$x]['birthmonth'], 
		// 			'birthyear' => $members[$x]['birthyear'], 
		// 			'family_id' => $res[0]['id'] 
		// 			);				
		// 		$this->db->insert('members', $member);
		// 	}
		// 	return 'success';
		// } catch(Exception $e) {
		// 	return 'error'.$e;
		// }
	}

	public function get_all($attrib, $order) {
		$this->db->order_by($attrib, $order);
		$data = $this->db->get('families');
		return $data->result_array();	
	}


}