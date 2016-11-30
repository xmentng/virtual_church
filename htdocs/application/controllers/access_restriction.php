<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_restriction extends CI_Controller {
	
function __construct(){
	parent::__construct();
		
}//end function

function index(){
	
	//view
	/*
	$view = "v2/foundation_school/registration";
	$data['page_title'] = 'Foundation School Registration - '.CUSTOM_PAGE_TITLE;
	$page_res['page_name'] = 'Foundation School Registration';

		
	$this->load->view($view, array('page_res'=>$page_res,'data'=>$data));
	*/
	
	echo 'Access denied. Please go back.';
	
}



///////////////////////////////////////////////////
}//end class
