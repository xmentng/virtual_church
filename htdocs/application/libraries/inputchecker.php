<?php

class Inputchecker{
	
function check_registration_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['first_name'])){
		$msg = 'Please the name of the Church Pastor in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['last_name'])){
		$msg = 'Please enter your church name in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['email'])){
		$msg = 'Please enter a valid email address in the field provided.';	
		$error[] = $msg;
	}
	
	
	if( !misc::required($detail['user_name'])){
		$msg = 'Please enter a valid user name in the field provided.';	
		$error[] = $msg;
	}
	
	
	if( !misc::required($detail['user_pwd'])){
		$msg = 'Please enter a valid password in the field provided.';	
		$error[] = $msg;
	}
	
	
	if( !misc::required($detail['country'])){
		$msg = 'Please select your country from the list provided.';	
		$error[] = $msg;
	}
	
	return $error;
	
	
}//end function


}//end class



