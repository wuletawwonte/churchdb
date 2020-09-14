<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('member');
	}


	public function get_members() {
		$result = $this->member->get_all_for_mobile();

		echo json_encode($result);
	}






}