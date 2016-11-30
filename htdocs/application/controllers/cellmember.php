<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cellmember extends CI_Controller {
	
function __construct(){
	parent::__construct();
	$this->load->library(array('sessiondata'));
	if($this->session->userdata('user_name')==""){
		$here = $_SERVER['REQUEST_URI'];
		header('Location: /auth/login?ref='.urlencode($here));
		exit;
	}
	useraccount::redirect_non_cellleader();
}//end function




function index(){
    $this->dashboard();	
}//end function



function dashboard(){
	
		global $page_res;
		sessiondata::general_page_resource();
		
		$data['page_title'] = "Dashboard - Cell Leader";
		$page_res['page_name'] = "DASHBOARD";
		
		$this->load->view('v2/cell_leader/vw_dashboard', array('data'=>$data, 'page_res'=>$page_res));
	
	
}//end function
	

	
	
	




///////////////////////////////////////////////////
}//end class
