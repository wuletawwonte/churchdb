<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members_backup extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function get_all() {
		$data = $this->db->get('members_backups');
		return $data->result_array();
	}

	public function add($filename) {
		$data = array(
			'title' => date('F j, Y'),
			'filename' => $filename
			);
		$this->db->insert('members_backups', $data);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('members_backups');
		return true;
	}







}