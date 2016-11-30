<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {


function __construct(){
	parent::__construct();
	
}//end function

function general_page_resource(){
		
		global $page_res, $comment;

		#retrieve the users online.
		$logged_in_account = @$this->session->userdata('user_name');
		
		$church_id = useraccount::getAttributeValue($detail=array('id','church_id'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'church_id');	
		$first_name = useraccount::getAttributeValue($detail=array('id','first_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'first_name');
		
		$last_name = useraccount::getAttributeValue($detail=array('id','last_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'last_name');
		
		$email = useraccount::getAttributeValue($detail=array('id','email'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'email');
		
		$access_level = useraccount::getAttributeValue($detail=array('id','access_level_id'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'access_level_id');
		
		$is_online = useraccount::getAttributeValue($detail=array('id','is_online'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'is_online');
		
		//echo $access_level; exit;
		
		$church_banner = useraccount::getLastAttributeValue(array('id', 'church_id', 'church_banner'), $tblname='tbl_church_banners', array('church_id'=>$church_id), $retval='church_banner');
		
		if(!$church_banner){
			$data['church_banner'] = "/images/banner.png";	
		}else{
			$data['church_banner'] = $church_banner;
		}
		
		$data['church_id'] = $church_id;
		$data['logged_in_account'] = $logged_in_account;
		
		$comment = useraccount::loadDetails('tbl_service_blog_comments',$arrFilter=array('church_id'=>$church_id, 'approved'=>1),array('id', 'account_name', 'name', 'church_id', 'stream_url', 'country', 'comment', 'time_posted', 'approved'),$num=NULL,$orderBy='');
		
		$ncomments = useraccount::loadTotalRefRecord($where=array('church_id'=>$church_id, 'approved'=>1), $fld='id', $tblname='tbl_service_blog_comments');
		
		$page_res = array('church_banner'=>$data['church_banner'],
						  'logged_in_account'=>$logged_in_account,
						  'name_of_user'=>$first_name.' '.$last_name,
						  'access_level_id'=>$access_level,
						  'email'=>$email,
						  'is_online'=>$is_online, 
						  'church_id'=>$church_id,
						  'ncomments'=>$ncomments,
						  'session_id'=>misc::random_string('alnum',30));
		
		
		
		
	}//end function

function processlogindetails(){

	$usr = validator_lib::cleanUserName($this->input->post('usn'));
	
	//echo $usr; exit;
	
	$pwd = $this->inputfilter->process($this->input->post('usr_pwd'));
	
	//echo $pwd; exit;

	$_church_id  = 0;
	$_flag_notfound = false;

	$user = authmanager::authenticate_user($usr, $pwd);

	if($user){
		$_acc_level = $this->authmanager->get_user_access_level($user['access_level_id'][0], $tblname="tbl_access_levels");
		
		if($_acc_level){
				$is_updated = mysql::update($tbl = 'tbl_users', $setflds = array('is_online'=>1), $where=array('user_name'=>$usr));	
				
				$this->session->set_userdata('user_name', $usr);
				echo "success|".$_acc_level;	
				exit;
		  }else{
			   echo "success|/churchmember/";	
			  exit;	
		  }//
			
	
	}else{
		#header("Location:/auth/login/?refr=".base64_encode($_SERVER['REQUEST_URI'])."");
		echo "failure| <img src=\"/images/icons/invalid_small.png\" align='absmiddle' /> Kindly ensure your user details are valid.";	
	}//end if-else

	
}//end function
function logout(){
	
	 #lets update the is_online flag for this user; setting it to 0
	$logged_in_account = $this->session->userdata('user_name');
	//echo $logged_in_account; exit;
	$is_updated = mysql::update($tbl = 'tbl_users', $setflds = array('is_online'=>0), $where=array('user_name'=>$logged_in_account));
	#echo($is_updated);exit;
	 
	 $CI =& get_instance();
        ///destroy all authentication variables
       
     $CI->session->unset_userdata('user_name');
	
	//$this->session->unset_userdata('user_name');
	$CI->session->sess_destroy();
	
	header("Location:/");	
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



