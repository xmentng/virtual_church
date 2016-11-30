<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {


function __construct(){
	parent::__construct();
	$this->load->library('inputchecker');
	
}//end function

function index(){

	$data['title'] = 'Registration | Virtual Church';
	$data['page_name'] = 'Virtual Church Registration';
	
	$this->load->view('vchurch/v1/registration', $data);

}//end function

function process(){

	$detail = array('first_name'=>strip_tags($_POST['fname']),
					'last_name'=>strip_tags($_POST['lname']),
					'email'=>validator_lib::cleanEmail($_POST['email']),
					'user_name'=>strip_tags($_POST['username']),
					'user_pwd'=>strip_tags($_POST['password']),
					'country'=>strip_tags($_POST['country']),
					'access_level_id'=>3,
					'church_id'=>7,
					'status'=>1,
					'date_created'=>time());
	//validate the user input
	//echo json_encode(array('status'=>false, 'message'=>$detail['church_pastor'])); exit;
	$error=array();
	$error = inputchecker::check_registration_inputs($detail);
	//echo json_encode(array('status'=>false, 'message'=>count($error))); exit;
	
	if(count($error)>0):
		echo json_encode(array('status'=>false, 'message'=>'&nbsp;Please ensure all fields are completely filled.')); exit;
	endif;
	
	
	
	if(count($error)==0):
	
		//check if this record previously exist
		$flag_exist = useraccount::checkforDuplicate($tblname='tbl_users', array('user_name', 'email'), array('user_name'=>$detail['user_name'], 'email'=>validator_lib::cleanEmail($_POST['email'])));
		
		//echo json_encode(array('status'=>false, 'message'=>count($error))); exit;
		
		//echo json_encode(array('status'=>false, 'message'=>$flag_exist)); exit;
		
	
		
		if($flag_exist==false):
			
			$flag_saved = mysql::insert($detail, 'tbl_users');
			
			if($flag_saved):
				echo json_encode(array('status'=>true, 'message'=>'&nbsp; Registration successfully processed.')); exit;
			endif;
			
			if($flag_saved):
				echo json_encode(array('status'=>false, 'message'=>'&nbsp; We are sorry for the inconvenience, kindly refresh the page and try again.')); exit;
			endif;
		endif;
		if($flag_exist==true):
			
				echo json_encode(array('status'=>false, 'message'=>'&nbsp; The record you entered previously exist.'));exit;
			
		endif;
	
	endif;

}//end function

}//end class



