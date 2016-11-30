<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {


function __construct(){
	parent::__construct();
	
}//end function


function processlogindetails(){

	$usr = validator_lib::cleanUserName($this->input->post('usn'));

	$pwd = $this->inputfilter->process($this->input->post('usr_pwd'));
	
	//echo $pwd; exit;

	$_church_id  = 0;
	$_flag_notfound = false;

	$user = authmanager::authenticate_user($usr, $pwd);

	if($user){
		$_acc_level = $this->authmanager->get_user_access_level($user['access_level_id'][0], $tblname="tbl_access_levels");
		
		
		if($_acc_level){
				$is_updated = mysql::update($tbl = 'tbl_users', $setflds = array('is_online'=>1), $where=array('user_name'=>$usr));	
			
				$this->session->set_userdata($user);
				$this->session->set_userdata(array('session_id'=>misc::random_string('alnum',30)));
								
				//load the session library and create the session information
				
				$this->load->library('sessiondata');
				
				global $page_res;
				sessiondata::general_page_resource();
				
				//update the user log timer
				mysql::insert(array('user_id'=>$this->session->userdata('user_id'), 'time_logged_in'=>time(), 'is_logged_in'=>1),"tbl_log_sessions");
				mysql::update($tbl = 'tbl_users', $setflds = array('is_logged_in'=>1, 'enabled'=>1), $where=array('id'=>$this->session->userdata('user_id')));
				
				
				
				echo "success|".$_acc_level;	exit;
		
		  }else{
			   //echo "success|".$_SERVER['REQUEST_URI']; exit;
			   echo "success|/churchmember/";	exit;
			  	
		  }//
			
	
	}else{
		#header("Location:/auth/login/?refr=".base64_encode($_SERVER['REQUEST_URI'])."");
		echo "failure| <img src=\"/images/icons/invalid_small.png\" align='absmiddle' /> Kindly ensure your user details are valid.";	
	}//end if-else

	
}//end function
function logout(){
	
	$this->load->library('sessiondata');
	
	global $page_res;
	
	sessiondata::general_page_resource();
	
	 #lets update the is_online flag for this user; setting it to 0
	$logged_in_account = $this->session->userdata('user_name');
	
	//echo $logged_in_account; exit;
	$is_updated = mysql::update($tbl = 'tbl_users', $setflds = array('is_online'=>0), $where=array('user_name'=>$logged_in_account));
	
	mysql::insert(array('user_id'=>$this->session->userdata('user_id'), 'time_logged_out'=>time(), 'is_logged_out'=>1),"tbl_log_sessions");
	mysql::update($tbl = 'tbl_users', $setflds = array('is_logged_in'=>0,'enabled'=>0), $where=array('id'=>$this->session->userdata('user_id')));
	
	#echo($is_updated);exit;
	 
	 $CI =& get_instance();
     
	 ///destroy all authentication variables
       
     $CI->session->unset_userdata('user_name');
	 $CI->session->unset_userdata($page_res);
	
	//$this->session->unset_userdata('user_name');
	$CI->session->sess_destroy();
	
	header("Location:".CUSTOM_BASE_URL);	
	exit;
}//end function
//////////////////////////////////////////////////////////////////////////////////////////////////////////

function forgotpass(){
	
	global $page_res;
	$this->general_page_resource();
	
	$view = "vw_forgot_password";
	$data['page_title'] = "Recover Password | Christ Embassy Live Streaming Portal.";
	$data['css_cls'] = 'info';
	$data['info_msg'] = 'To retreive your password, kindly fill out the below form.';
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
}//end function


function recover_password(){
	
	//echo 'Isaac'; exit;
	
	$email = validator_lib::cleanEmail($_POST['email']);
	
	$user = useraccount::loadDetails('tbl_users',$arrFilter=array('email'=>$email),$arrAttribute=array('first_name', 'last_name', 'user_name', 'user_pwd'),$num=1,$orderBy='');
	
	if($user['user_pwd'][0]){
		
		$name = $user['first_name'][0].' '.$user['last_name'][0];
		//echo $name; exit;
		$detail = array('name'=>$name,
						'email'=>$email,
						'password'=>$user['user_pwd'][0]);
		// dispatch mail to the user
		$mail_sent = useraccount::dispatch_password_recovery_mail($detail,$arrMoreInfo=NULL, $tblname='tbl_users');
		
		if($mail_sent['status']):
			util_lib::display_message($arrMessage=array('Your password has been sent to your email address specified.'), $msg_type='success', $img_source='/images/icons/success_small.png');
		endif;//end if

	}else{
		
		util_lib::display_message($arrMessage=array('The email address you specified does not exist or is invalid.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
	
	}
	
}//end function

function resetpassword(){
	$usn = misc::cleanUserName($_POST['usn']);
	$ismember = authmanager::isUser($usn);
	if( $ismember ) {
		//lets generate new temporary password for this user
		$p = substr(md5(uniqid(rand( ), true)), 0, 4);
		$tp = $p;
		$p = misc::hash($p);
		//update the user account with the new password
		$input = array('pwd'=>$p);
		$where = array('username'=>$usn);
		//get the user email
		$user = contentmanager::loadUserByUserName($usn);
	
		$fn = @(string)$user['firstname'];
		//$em = @(string)$user['email'];
	
		$isupdated = querymanager::update('adminusers', $input, $where);
		
		if( $isupdated ){
			$detail2 = array('hashpwd'=>$p);
			querymanager::insert($detail2, 'hashedpassword');

			//lets mail the new password to the user
			$this->load->library('email');
			
			$this->email->from('admin@demo.schinfosystem.com');
			$this->email->to($user['email']); 
			
			$msg = 'Dear User'.$fn.', <br>Your password to log into website http://peakinschinfosystem.focusedexperiential.com has been temporarily changed to '.$tp.'. <br><br>Please log in using that password and this username'.$usn.' Then you may change your password to something more familiar.';
			
		
			/*echo $msg;
			exit;*/
			$this->email->subject('Your temporary password');
			$this->email->message($msg);	

			@$this->email->send();
			
			echo "success|Your password has been changed.You will receive the new, temporary password via email. Once you have logged in with this new password, you may change it.";
			
		}else{
			//do nothing
		}//end-inne if-else
	}else{
		echo "failure| The detail you entered is invalid.";
	}//end if-else
}//end function


function activate(){
        ///user is trying to activate his account
        $userID = (int)($this->uri->segment(3));
		
        if(empty($userID)){
            //$this->flashnotice->add('Error activating account.','error');
            header("Location:/dashboard/activation/error/");
            exit;
        }
        //validate
        $arrUserInfo = $this->useraccount->loadRefUser($userID,'tbl_users');
     
        if(!is_array($arrUserInfo)){
            //userID does not exist
            //$this->flashnotice->add('Error activating account.','error');
            header("Location:/dashboard/activation/error/");
            exit;
            
        }

        if($arrUserInfo['status'][0] == '0'){
            $this->useraccount->activateAccount($userID,$tblname='tbl_users');
            //$this->flashnotice->add('Your account was successfully activated.','success'); 
            header("Location:/dashboard/activation/success/");
            exit;  
        }
        if($arrUserInfo['status'][0] == '1'){
            //$this->useraccount->activateAccount($userID);
            //$this->flashnotice->add('Account already activated.','info');   
            header("Location:/dashboard/activation/prevactivated/");
            exit;
        }
      header("Location:/dashboard/");
            exit;  
        
    }//end function

}//end class



