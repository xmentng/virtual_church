<?php

class Validator_lib{
	
function validate_online_giving($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::numeric($detail['amount']) || $detail['amount']==0){
		$msg = 'Kindly enter an amount in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['category_code'])){
		$msg = 'Kindly select a category from the list provided.';	
		$error[] = $msg;
	}
	
	return $error;
	
	
}//end function

function validate_share_testimony_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['test_body'])){
		$msg = 'Kindly enter your testimony in the field provided.';	
		$error[] = $msg;
	}
	
	return $error;
	
}//end function

function validate_cell_member_cell_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::numeric($detail['cell_id']) || $detail['cell_id']==0){
		$msg = 'Kindly select a cell from the list provided.';	
		$error[] = $msg;
	}
	
	return $error;
	
}//end function
	
function validate_salvation_call_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['invite_name'])){
		$msg = 'Kindly enter the friend name in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['invite_email'])){
		$msg = 'Kindly enter a valid email address.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['invite_country'])){
		$msg = 'Kindly select a country from the list provided.';	
		$error[] = $msg;
	}
	
	
	return $error;
	
}//end function

function validate_service_timer_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['year'])){
		$msg = 'Kindly enter the service year in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['month'])){
		$msg = 'Kindly enter the service month in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['day'])){
		$msg = 'Kindly enter the service month in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['hour'])){
		$msg = 'Kindly enter the service hour in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['minute'])){
		$msg = 'Kindly enter the service minutes in the field provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['time_zone'])){
		$msg = 'Kindly select a time zone from the list provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['service_day'])){
		$msg = 'Kindly select a service day from the list provided.';	
		$error[] = $msg;
	}

	return $error;
	
}//end function

function validate_cleader_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::numeric($detail['cell_id']) || $detail['cell_id']==0){
		$msg = 'Kindly select a cell from the list provided.';	
		$error[] = $msg;
	}
	
	if( !misc::numeric($detail['cell_leader_id']) || $detail['cell_leader_id']==0){
		$msg = 'Kindly select a cell leader from the list provided.';	
		$error[] = $msg;
	}

	if( !misc::required($detail['country'])){
		$msg = 'Kindly select a country from the list provided.';	
		$error[] = $msg;
	}
	

	return $error;
	
}//end function

function validate_updated_cell_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['cell_name'])){
		$msg = 'Kindly enter a valid cell name.';	
		$error[] = $msg;
	}
	

	if( !misc::required($detail['country'])){
		$msg = 'Kindly select a country from the list provided.';	
		$error[] = $msg;
	}
	
	return $error;
	
}//end function

function validate_create_cell_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['cell_name'])){
		$msg = 'Kindly enter a valid cell name.';	
		$error[] = $msg;
	}
	

	if( !misc::required($detail['country'])){
		$msg = 'Kindly select a country from the list provided.';	
		$error[] = $msg;
	}
	
	return $error;
	
}//end function

function validate_post_comment_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['email'])){
		$msg = 'Kindly enter a valid email.';	
		$error[] = $msg;
	}
	

	if( !misc::required($detail['country'])){
		$msg = 'Kindly select a country from the list provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['comment'])){
		$msg = 'Kindly enter your comment in the field provided.';	
		$error[] = $msg;
	}
	

	return $error;
	
}//end function


function validate_egiving_input($detail){
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['giving_cat'])){
		$msg = 'Kindly select a giving category from the list provided.';	
		$error[] = $msg;
	}
	

	if( !misc::required($detail['currency_type'])){
		$msg = 'Kindly select a currency type from the list provided.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['payment_method'])){
		$msg = 'Kindly select a payment method.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['amount']) && (!misc::numeric($detail['amount']))){
		$msg = 'Kindly enter an amount in the field provided.';	
		$error[] = $msg;
	}

	return $error;
}//end function


function validate_invite_inputs($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['invite_first_name'])){
		$msg = 'Kindly enter the first name of the invite.';	
		$error[] = $msg;
	}
	

	if( !misc::required($detail['invite_last_name'])){
		$msg = 'Kindly enter the last name of the invite.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['invite_email'])){
		$msg = 'Kindly enter a valid email address.';	
		$error[] = $msg;
	}
	
	if( !misc::required($detail['invite_email'])){
		$msg = 'Kindly enter a valid email address in the field provided.';	
		$error[] = $msg;
	}

	return $error;
		
}//end function

function validate_notice_board_content_input($detail){
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['notice_board_content'])){
			$msg = 'Kindly enter your notice board content in the field provided.';	
			$error[] = $msg;
	}
	
	return $error;
}//end function

function validate_help_line_input($detail){
	
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['help_line'])){
			$msg = 'Kindly enter the help line(s) in the field provided.';	
			$error[] = $msg;
	}
	
	return $error;
	
}//end function

function validate_church_user_account_inputs($detail){
	$error = array();
	$msg = '';
	
		if( !misc::required($detail['first_name'])){
			$msg = 'Kindly enter the user first name in the field provided.';	
			$error[] = $msg;
		}
		

		if( !misc::required($detail['user_name'])){
			$msg = 'Kindly enter a valid user name in the field provided.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['user_pwd'])){
			$msg = 'Kindly enter a valid password.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['email'])){
			$msg = 'Kindly enter a valid email address in the field provided.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['country'])){
			$msg = "Kindly select a country of residence for this church member/user.";	
			$error[] = $msg;
		}

		return $error;
}//end function

function validate_create_church_inputs($detail){
	
		
	$error = array();
	$msg = '';
	
	if( !misc::required($detail['user_name'])){
			$msg = 'Kindly enter a valid user name in the field provided.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['password'])){
			$msg = 'Kindly enter a valid password.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['email'])){
			$msg = 'Kindly enter a valid email address in the field provided.';	
			$error[] = $msg;
		}
		
		
		if( !misc::required($detail['church_name']) ){
			$msg = 	'Kindly enter a church name.';
			$error[] = $msg;	
		}
		
		if( !misc::required($detail['stream_url']) ){
			$msg = 'Kindly enter a streaming url.';
			$error[] = $msg;	
		}
		
		if( !misc::required($detail['ipad']) ){
			$msg = 'Kindly enter a valid iPad stream url.';
			$error[] = 	$msg;
		}
		
		
		if( !misc::required($detail['blackberry']) ){
			$msg = 'Kindly enter a valid blackberry streaming url.';	
			$error[] = $msg;
		}
		
		
		if( !misc::required($detail['android'])){
			$msg = 'Kindly enter a valid android streaming url.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['file_stream'])){
			$msg = 'Kindly enter a valid file stream name.';	
			$error[] = $msg;
		}
		
		return $error;
}//end function
	
	
function validate_smspurchased_input($detail){
	
	$error = array();
	$msg = '';
	
	if($detail['sms_bundle_id']==0){
		$msg = 'Kindly select your preferred sms bundle plan from the list provided.';
		$error[] = $msg;
	}//endif;
	
	if($detail['bank_teller_no']==0){
		$msg = 'Kindly enter a valid bank teller no. in the field provided.';
		$error[] = $msg;
	}//endif;
	
	
	if($detail['bank_id']==0){
		$msg = 'Kindly select the bank you paid into from thhe list provided.';
		$error[] = $msg;
	}//endif;
	
	
	if(!misc::required($detail['bank_account_name'])){
		$msg = 'Kindly the bank account name in the field provided.';
		$error[] = $msg;
	}//endif;
	
	
	if($detail['bank_account_no']==0){
		$msg = 'Kindly the bank account no. in the field provided.';
		$error[] = $msg;
	}//endif;

	if(!misc::required($detail['sms_payment_date'])){
		$msg = 'Kindly select the payment date for this transaction.';
		$error[] = $msg;
	}//endif;
	
	$arrpdate = explode(' ', @$detail['sms_payment_date']);
	$pdate = @$arrpdate[0]; $strlen = strlen($pdate);
	$pyear = substr(@$pdate, 6, 4);
	$pday = substr(@$pdate, 0, 2);
	
	
	
	if($pyear==date('Y')){
		if($pday > date('d')){
			$msg = 'Your payment date cannot be greater than today.';
			$error[] = $msg;
		}
	}
	
	if($detail['sms_unit_purchased']==0){
		$msg = 'Kindly enter the quantity of sms you intend to buy in the field provided.';
		$error[] = $msg;
	}//endif;
	
	
	return $error;
}//end function

///////////////////////////////////////////////////////////////////////////////////////////////////
function validate_operator_gateway_input($detail){
	$error = array();
	$msg = '';
	
	#validate if null input in any of the required field
	
	if($detail['account_id']==0 || $detail['country_code'] =='' || $detail['gsm_operator_name']=='' || $detail['gateway_provider_name']==''){
		
		$msg = 'Kindly ensure all required field are completely filled.';
		$error[] = $msg;	
		return $error;
	}
	
	if($detail['account_id']==0){
		$msg = 'Kindly select the client from the drop down list provided.';
		$error[] = $msg;
	}//endif;
	
	if(!misc::required($detail['gsm_operator_name'])){
		$msg = 'Kindly select a gsm operator from the list provided.';
		$error[] = $msg;
	}//endif;
	
	
	if(!misc::required($detail['gateway_provider_name'])){
		$msg = 'Kindly select a gateway provider from the list provided.';
		$error[] = $msg;
	}//endif;
	
	return $error;
	
}#end function

///////////////////////////////////////////////////////////////////////////////////////////////////
function validate_dispatched_single_message_inputs($detail){
	
	$error = array();
	$msg = '';

	if($detail['account_id']==0){
		$msg = 'Kindly select the client from the drop down list provided.';
		$error[] = $msg;
	}//endif;
	
	if(!misc::required($detail['sender_name'])){
		$msg = 'Kindly enter the sender name in the spaces provided.';
		$error[] = $msg;
	}//endif;
	
	if(!misc::required($detail['recipient_phone_no'])){
		$msg = 'Kindly enter the recipient mobile number in the field provided.';
		$error[] = $msg;
	}//endif;
	
	if(!misc::required($detail['message'])){
		$msg = 'Kindly enter your message in the field provided.';
		$error[] = $msg;
	}//endif;
	
	
	return $error;
}//end function

///////////////////////////////////////////////////////////////////////////////////////////////////
function validate_qued_message($detail){
	$error = array();
	$msg = '';
	
	#validate if null input in any of the required field
	
	
	if($detail['account_id']==0){
		$msg = 'Kindly select the client from the drop down list provided.';
		$error[] = $msg;
	}//endif;
	
	if(!misc::required($detail['sender_name'])){
		$msg = 'Kindly enter the sender name in the spaces provided.';
		$error[] = $msg;
	}//endif;
	
	if(!misc::required($detail['message'])){
		$msg = 'Kindly enter your message in the field provided.';
		$error[] = $msg;
	}//endif;
	
	
	return $error;
	
}#end function


//////////////////////////////////////////////////////////////////////////////////////////////////////////
#----------This section validates common user input such as email, phone, user name, password etc
//////////////////////////////////////////////////////////////////////////////////////////////////////////
function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}

	// --------------------------------------------------------------------
	
	function cleanName($str){
		return ( ! preg_match('/^[A-Za-z \'.-]{2,25}$/i', $str) ) ? FALSE : mysql_real_escape_string($str);

	}//end function
	
	// --------------------------------------------------------------------
	
	function cleanBankAccountNo($str){
		return ( ! preg_match('/^[0-9]{10,10}$/i', $str) ) ? FALSE : mysql_real_escape_string($str);

	}//end function
	
	function cleanUserName($str){
		return ( ! preg_match('/^[A-Za-z0-9 \'.-_]{2,30}$/i', $str) ) ? FALSE : mysql_real_escape_string($str);

	}//end function
	
	function cleanPassword($str){
		return (!preg_match ('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/', $str) ) ? FALSE : mysql_real_escape_string($str);
	}//end function
	
	function cleanEmail($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : mysql_real_escape_string($str);
		//return (!filter_var($str,FILTER_VALIDATE_EMAIL)) ? FALSE : mysql_real_escape_string($str);
		
	}
	
	
	function cleanUrlSegment($str){
		return ( ! preg_match('/^[A-Za-z0-9 \'.-_]{2,30}$/i', $str) ) ? FALSE : $str;
	}//end function
	
	function clean_bank_teller_no($str){
		return ( ! preg_match('/^[0-9]{2,30}$/i', $str) ) ? FALSE : mysql_real_escape_string($str);

	}//end function
	
	
	function clean_numeric_data($str){
		return ( ! preg_match('/^[0-9]{2,30}$/i', $str) ) ? FALSE : mysql_real_escape_string($str);

	}//end function
	
	
	function clean_bank_account_name($str){
		return ( ! preg_match("/^[a-zA-Z\s-]+$/i", $str) ) ? FALSE : mysql_real_escape_string($str);

	}//end function
	
	/*function clean_alphabetic_data($str){
		return ( ! preg_match("/^[a-zA-Z\s-]$/i", $str) ) ? FALSE : mysql_real_escape_string($str);

	}//end function*/
	
	function clean_alphabetic_data($str){
		//return ( ! preg_match("/^[a-zA-Z -]+$/", $str) ) ? FALSE : mysql_real_escape_string($str);
		return ( ! preg_match("/^[a-zA-Z\s-]+$/i", $str) ) ? FALSE : mysql_real_escape_string($str);

	}//end functions
	
	function filter_integer_data($str){
		return (! filter_var($str,FILTER_VALIDATE_INT,array("min_range"=>1))) ? FALSE : mysql_real_escape_string($str);
	}//end function
	
	function filter_float_data($str){
		return (! filter_var($str,FILTER_VALIDATE_FLOAT)) ? FALSE : mysql_real_escape_string($str);
	}//end function
	
	function sanitize($text) {
		$text = htmlspecialchars($text, ENT_QUOTES);
		$text = str_replace("\n\r","\n",$text);
		$text = str_replace("\r\n","\n",$text);
		$text = str_replace("\n","<br>",$text);
		return mysql_real_escape_string($text);
}//end function
	
	

}//end class



