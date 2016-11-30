<?php
class Session_lib{
	function __construct(){
		$this->startsession();
	}//end function
	
	function startsession(){
		session_start();	
	}//end function
	
	function destroysession($redirection){
		
		if($redirection=='myaccount'):
			$_SESSION  = array('account_name'=>NULL,
							   'account_id'=>NULL,
							   'client_first_name'=>NULL,
							   'client_last_name'=>NULL,
							   'active'=>NULL,
							   'session_id'=>NULL,
							   'ip_address'=>NULL,
							   'user_agent'=>NULL,
							   'time_stamp'=>NULL);
			$_SESSION = array();
			session_destroy();
			setcookie(session_name( ), '', time( )-300);
			header('Location: http://sms.globalnetworkcity/');
		endif;
		
		if($redirection=='admin'):
			$_SESSION  = array('admin_name'=>NULL,
							   'admin_id'=>NULL,
							   'firstname'=>NULL,
							   'lastname'=>NULL,
							   'active'=>NULL,
							   'session_id'=>NULL,
							   'ip_address'=>NULL,
							   'user_agent'=>NULL,
							   'time_stamp'=>NULL);
			$_SESSION = array();
			session_destroy();
			setcookie(session_name( ), '', time( )-300);
			header('Location: http://sms.globalnetworkcity/cpanel/');
		endif;
			
	}//end function
	
	
	
}//end class