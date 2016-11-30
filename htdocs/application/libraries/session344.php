<?php

class Session{

	private $_tblsession_log = "tbl_session_logs";
	
	function __construct(){
		$this->start();
	}//end function

	
	function start(){
		
		
			session_start();	
	
	}// end function
	

	function deactivate(){
			
		session::start();
				
		unset($_SESSION['username']);
		unset($_SESSION['user_id']);
		unset($_SESSION['logdate']);

		#set all sessions to null		
		$_SESSION['username'] = NULL;
		$_SESSION['user_id']= NULL;
		$_SESSION['logdate']= NULL;
		
		$_SESSION = array();
	
		session_destroy();
		setcookie(session_name( ), '', time( )-300);
		
		header('Location:/');
			
	}//end function
function set(){
	
	if(isset($_SESSION)){
		return true;
	}else{
		return false;	
	}
}//end function

function getdetail(){

  $detail = array('session_id'=>$_SESSION['session_id'],
		  'user_name'=>$_SESSION['user_name']);
  return $detail;

}//end function getdetail


	
}// end class



