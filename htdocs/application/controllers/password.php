<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}//end function
	
	function index()
	{
		$this->loadPwdRetrivePage();
	}//end function
	
	function loadPwdRetrivePage()
	{

		$data['welcome_msg'] = "Retreive Password";
		$data['page_title'] = 'Retrieve Password - '.CUSTOM_PAGE_TITLE;
		$data['page_content'] = "<h3>Welcome</h3>The IMM Live Streaming Portal affords a user new features and experiences in the streaming of our ministry events and programs. Kindly login using your email and password given to you by your group church. For more information on login into this portal, kindly call the following help lines: ";
		$data['css_class'] = "info";
		$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> Please enter your Username or Email address in the form below.";

		$this->load->view('password/retrieve_pwd', array('data'=>$data));
		
	}//end function
	
	function getUserLoginInfo(){
	
	$param = mysql_real_escape_string($_POST['usn']);
	
	//echo $param; exit;
	
	//$user = useraccount::loadDetails('tbl_users',$arrFilter=array('email'=>$email),$arrAttribute=array('first_name', 'last_name', 'user_name', 'user_pwd'),$num=1,$orderBy='');
	
	$sql = "SELECT * FROM tbl_users WHERE user_name=\"$param\" OR email=\"$param\" LIMIT 1";
	$user = useraccount::getUserLoginDetails($sql);
	
	//var_dump($user); exit;
	
	if($user['user_pwd'][0]){
		
		$name = $user['first_name'][0].' '.$user['last_name'][0];
		//echo $name; exit;
		$detail = array('name'=>$name,
						'email'=>$user['email'][0],
						'password'=>$user['user_pwd'][0]);
						
		// dispatch mail to the user
		$mail_sent = useraccount::dispatch_password_recovery_mail($detail,$arrMoreInfo=NULL, $tblname='tbl_users');
		
		if($mail_sent['status']):
			util_lib::display_message($arrMessage=array('Your password has been sent to your email address.'), $msg_type='success', $img_source='/images/icons/success_small.png');
		endif;//end if

	}else{
		
		util_lib::display_message($arrMessage=array('The detail you specified does not exist or is invalid.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
	
	}
	
	}//end function
	
	
	
	function change_admin_password(){
	
		$this->load->library(array('sessiondata'));
		
		global $page_res;
		sessiondata::general_page_resource();
		
		$page_res['page_name'] = 'Change Password.';
		$data['page_title'] = 'Change Password - '.CUSTOM_PAGE_TITLE;
		
		$str_view = 'church_admin/change_password';
		
		$this->load->view($str_view, array('page_res'=>$page_res, 'data'=>$data));
		
		
	
	}//end function
	
	
	///////////////////////////////////////////////////////////////////
}//end class
