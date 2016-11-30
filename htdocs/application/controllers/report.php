<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {
	
function __construct(){
	parent::__construct();
	$this->load->library(array('validator_lib'));
}//end function

function churchattendance(){
	
	$mode = strip_tags($_GET['mode']);
	echo $mode;
	
	switch ($mode):
	
		case 'total':
			$this->loadTotalChurchAttendance();
		break;
		
		case 'bychurch':
			$this->loadAttendanceByChurch();
		break;
		
		default:
			header('Location:/centraladmin/report/index');
	
	endswitch;
	
}//end function 

function loadTotalChurchAttendance(){
	
	
	
}//end function

///////////////////////////////////////////////////
}//end class
