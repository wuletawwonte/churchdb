<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Model {

	public function __construct() {
		parent::__construct();
		
	}

	public function add() {
		$data = array(
			'member_id' => $this->input->post('member_id'),
			'note_content' => $this->input->post('note_content'),
			'user_id' => $_SESSION['current_user']['id'] 
			);
		if($this->db->insert('notes', $data)) {
			return true;
		} else {
			return false;

		}
	}

	public function get_notes($id) {
		$this->db->from('notes');
		$this->db->where('member_id', $id);
		$this->db->join('users', 'notes.user_id = users.id');
		$res = $this->db->get();
		return $res->result_array();
	}


	// public function time_ago( $time )
 //    {
 //        $out    = ''; // what we will print out
 //        $now    = time(); // current time
 //        $diff   = $now - $time; // difference between the current and the provided dates

 //        if( $diff < 60 ) // it happened now
 //            return TIMEBEFORE_NOW;

 //        elseif( $diff < 3600 ) // it happened X minutes ago
 //            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

 //        elseif( $diff < 3600 * 24 ) // it happened X hours ago
 //            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

 //        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
 //            return TIMEBEFORE_YESTERDAY;

 //        else // falling back on a usual date format as it happened later than yesterday
 //            return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
 //    }








}	
