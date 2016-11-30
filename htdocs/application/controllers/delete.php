<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {
	
function __construct(){
	parent::__construct();
	$this->load->library(array('validator_lib'));
}//end function

function remove_ref_nbcontent(){
	$id = intval($this->uri->segment(3));	
	//echo $id; exit;
	mysql::query("DELETE FROM tbl_churches_notice_board_contents WHERE id=\"$id\"");
	echo "The content has been successfully deleted.";

}//end function

function remove_ref_useraccount(){
	
	$id = intval($this->uri->segment(3));	
	//echo $id; exit;
	mysql::query("DELETE FROM tbl_users WHERE id=\"$id\"");
	echo "Account successfully deleted.";

	
}//end function

function remove_ref_help_line(){
	$id = intval($this->uri->segment(3));	
	//echo $id; exit;
	mysql::query("DELETE FROM help_lines WHERE id=\"$id\"");
	echo "The content has been successfully deleted.";

}//end function

function remove_ref_cell(){
	
	$id = intval($this->uri->segment(3));	
	//echo $id; exit;
	mysql::query("DELETE FROM tbl_cells WHERE id=\"$id\"");
	echo "The cell has been successfully deleted.";
	
}//end function


function remove_ref_cell_leader(){
	
	$id = intval($this->uri->segment(3));	
	//echo $id; exit;
	mysql::query("DELETE FROM tbl_cell_leaders WHERE id=\"$id\"");
	echo "The cell has been successfully deleted.";
	
}//end function


function cancel_ref_timer(){
	
	$id = intval($this->uri->segment(3));	
	//echo $id; exit;
	mysql::update("tbl_online_timmer", array('status'=>0), array('id'=>$id));
	echo "The timer has been successfully cancelled.";
	
	
}//end function


function logout_ref_account(){
	
	$id = intval($this->uri->segment(3));	
	//echo $id; exit;
	mysql::update("tbl_users", array('is_online'=>0, 'enabled'=>0), array('id'=>$id));
	mysql::insert(array('user_id'=>$id, 'time_logged_out'=>time(), 'is_logged_out'=>1),"tbl_log_sessions");
	echo "The account has been successfully logged out.";
	
	
}//end function

function cancel_ref_meeting(){
	
	$id = intval($this->uri->segment(3));	
	//echo $id; exit;
	mysql::update("tbl_meetings", array('status'=>0), array('id'=>$id));
	echo "The meeting has been successfully cancelled.";
	
}//end function


///////////////////////////////////////////////////
}//end class
