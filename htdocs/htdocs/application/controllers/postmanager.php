<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class postmanager extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('validator_lib', 'sessiondata'));
	}//end function
	
	function general_page_resource(){
		
		global $page_res, $comment;

		#retrieve the users online.
		$logged_in_account = $this->session->userdata('user_name');
		
		$user_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'id');
		
		$church_id = useraccount::getAttributeValue($detail=array('id','church_id'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'church_id');
		
		$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$church_id),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream', 'user_name'),$num=1,$orderBy='');
		
		
		$first_name = useraccount::getAttributeValue($detail=array('id','first_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'first_name');
		
		$last_name = useraccount::getAttributeValue($detail=array('id','last_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'last_name');
		
		$phone_no = useraccount::getAttributeValue($detail=array('id','phone_no'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'phone_no');
		
		$user_pic = useraccount::getAttributeValue($detail=array('id','profile_pic', 'user_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'profile_pic');
		
		$country = useraccount::getAttributeValue($detail=array('id','country'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'country');
		
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
						  'user_id'=>$user_id,
						  'logged_in_account'=>$logged_in_account,
						  'name_of_user'=>$first_name.' '.$last_name,
						  'first_name'=>$first_name,
						  'last_name'=>$last_name,
						  'access_level_id'=>$access_level,
						  'email'=>$email,
						  'phone_no'=>$phone_no,
						  'country'=>$country,
						  'is_online'=>$is_online, 
						  'church_id'=>$church_id,
						  'church_account_name' => $church_detail['user_name'][0],
						  'church_name'=>$church_detail['church_name'][0],
						  'ncomments'=>$ncomments,
						  'profile_pic' =>$user_pic,
						  'ipad_stream' =>$church_detail['ipad'][0],
						  'android_stream' =>$church_detail['android'][0],
						  'blackberry_stream' =>$church_detail['blackberry'][0],
						  'stream_url' =>$church_detail['stream_url'][0],
						  'session_id'=>misc::random_string('alnum',30));
		
		
		//echo $page_res['church_account_name']; exit;
		
		
	}//end function
	
	function create_church_admin()
	{
		$error = array();
		$msg = "";
		
		//retrieving and validating the user inputs
		
		$detail = array('first_name'=>misc::cleanUserName($_POST['first_name']),
						'last_name'=>misc::cleanUserName($_POST['last_name']),
						'user_name'=>misc::cleanUserName($_POST['usn']),
						'church_id'=>intval($this->input->post('church_id')),
						'user_pwd'=>trim($_POST['usr_pwd']),
						'email'=>misc::cleanEmail($_POST['email']),
						'access_level_id'=>intval($this->input->post('access_level_id')),
						'status'=>0,
						'date_created'=>$this->misc->serverTime(),
						'date_modified'=>$this->misc->serverTime(),
						'created_by'=>$this->misc->cleanUserName($this->session->userdata('user_name')),
						'rec_exist'=>1);
		#lets check for null inputs

	
		if( !misc::required($detail['first_name']) ){
			$msg = 	'Kindly enter a first name.';
			$error[] = $msg;	
		}
		
		if( !misc::required($detail['last_name']) ){
			$msg = 'Kindly enter a last name.';
			$error[] = $msg;	
		}
		
		if( !misc::required($detail['email']) ){
			$msg = 'Kindly enter a valid email address.';
			$error[] = 	$msg;
		}
		
		if( $detail['church_id'] == 0 ){
			$msg = 'Kindly select a church from the list provided.';	
			$error[] = $msg;
		}
		
		if( $detail['access_level_id'] == 0 ){
			$msg = 'Kindly select a user access level.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['user_name']) ){
			$msg = 'Kindly enter a valid Username.';	
			$error[] = $msg;
		}
		
		
		if( !misc::required($detail['user_pwd'])){
			$msg = 'Kindly enter a valid password for this user.';	
			$error[] = $msg;
		}
		
		#-----------------------------
		if(count($error) > 0):
			$this->errormanager->_show_error($error, $mgsrc='', $msg='');
			exit;
		endif;
		
		if(count($error)==0):
			#check if user account exist
			$flag_exist = $this->useraccount->checkforDuplicate('tbl_users', $detail, array('user_name'=>$detail['user_name']));
			if($flag_exist){
				$msg = "Kindly note that the record previously exist.";
				$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
				$this->errormanager->_show_error($error='',$imgsrc, $msg);
			}else{
				#save the user data and send a mail to the user	
				$flag_saved = $this->querymanager->insert($detail, 'tbl_users');
				
				if($flag_saved){
					
					$flag_mail_sent = $this->useraccount->dispatchActivationMail($detail, $tblname='tbl_users');
					if($flag_mail_sent['status']==true):
						echo "success| <img src=\"/images/icons/success_small.png\" />&nbsp;The record has been successfully created.";
						exit;
					endif;	
				}else{
					$msg = "Kindly note that the record previously exist.";
					$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
					$this->errormanager->_show_error($error='',$mgsrc, $msg);
					exit;
				}
				
				echo "success| <img src=\"/images/icons/success_small.png\" />&nbsp;The record has been successfully created.";
				exit;
			}
		endif;
		

}//end function

function update_churchadmin_user(){
		$error = array();
		$msg = "";
		
		//retrieving and validating the user inputs
		$detail = array('first_name'=>misc::cleanUserName($_POST['first_name']),
						'last_name'=>misc::cleanUserName($_POST['last_name']),
						'user_name'=>misc::cleanUserName($_POST['usn']),
						'user_pwd'=>strip_tags($_POST['usr_pwd']),
						'email'=>misc::cleanEmail($_POST['email']),
						'access_level_id'=>intval($_POST['access_level_id']),
						'church_id'=>intval($_POST['church_id']),
						'date_modified'=>$this->misc->serverTime());
		#lets check for null inputs
	
		$user_id = intval($_POST['id']);
		
		
		if( !misc::required($detail['first_name']) ){
			$msg = 	'Kindly enter a first name.';
			$error[] = $msg;	
		}
		
		if( !misc::required($detail['last_name']) ){
			$msg = 'Kindly enter a last name.';
			$error[] = $msg;	
		}
		
		if( !misc::required($detail['email']) ){
			$msg = 'Kindly enter a valid email address.';
			$error[] = 	$msg;
		}
		
		if( $detail['church_id'] == 0 ){
			$msg = 'Kindly select a church from the list provided.';	
			$error[] = $msg;
		}
		
		if( $detail['access_level_id'] == 0 ){
			$msg = 'Kindly select a user access level.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['user_name']) ){
			$msg = 'Kindly enter a valid Username.';	
			$error[] = $msg;
		}
		
		
		if( !misc::required($detail['user_pwd'])){
			$msg = 'Kindly enter a valid password for this user.';	
			$error[] = $msg;
		}

		#-----------------------------
		if(count($error) > 0):
			$this->errormanager->_show_error($error, $mgsrc='', $msg='');
			exit;
		endif;
		
		if(count($error)==0):

				#save the user data and send a mail to the user	
				$flag_saved = $this->mysql->update('tbl_users',$detail , array('id'=>$user_id));
				
				if($flag_saved){
					
					echo "success| <img src=\"/images/icons/success_small.png\" />&nbsp;The record has been successfully updated.";
					exit;	
				}else{
					$msg = "Error!, Kindly refresh the page and try again. We apologize for the inconvenience.";
					$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
					$this->errormanager->_show_error($error='',$mgsrc, $msg);
					exit;
				}
		endif;
	
}//end function

function create_invite_account(){
	
	$error = array();
	$msg = "";
	
	//retrieving and validating the user inputs
	$detail = array('first_name'=>validator_lib::cleanUserName($_POST['first_name']),
					'last_name'=>validator_lib::cleanUserName($_POST['last_name']),
					'user_name'=>validator_lib::cleanUserName($_POST['usn']),
					'user_pwd'=>mysql_real_escape_string($_POST['usr_pwd']),
					'email'=>validator_lib::cleanEmail($_POST['email']),
					'country'=>strip_tags($_POST['country']),
					'access_level_id'=>intval($_POST['access_level_id']),
					'church_id'=>intval($_POST['church_id']),
					'status'=>0,
					'is_online'=>0,
					'date_created'=>$this->misc->serverTime(),
					'date_modified'=>$this->misc->serverTime(),
					'created_by'=>$this->validator_lib->cleanUserName($this->session->userdata('user_name')), 
					'rec_exist'=>1);
	#lets check for null inputs
	
	//echo "success|".$detail['user_pwd']; exit;
	
	$error = validator_lib::validate_church_user_account_inputs($detail);

	if(count($error) > 0):
		util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
	endif;
	
	if(count($error)==0):
		
		$return_flag  = post_lib::save_church_user_account($detail);

		if($return_flag == 1){	
			
				$flag_mail_sent = $this->useraccount->dispatchActivationMail($detail, $tblname='tbl_users');
				
				//lets update the tbl_church_service_invites shema
				mysql::update('tbl_church_service_invites', array('invite_accepted'=>1), array('invite_email'=>$detail['email']));

				if($flag_mail_sent['status']==true):
					util_lib::display_message($error=array('The church user account has been successfully created; and an activation mail sent to the recipient.'), $msg_type='success', $img_source='/images/icons/success_small.png');
				endif;
		}

		if($return_flag == 2){
				util_lib::display_message($error=array('The church user account previously exist.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		}
			
		if($return_flag == 0){
			util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		}

	endif;
		
		
}//end function
	
function create_church_user_account(){
		$error = array();
		$msg = "";
		
		//retrieving and validating the user inputs
		$detail = array('first_name'=>validator_lib::cleanUserName($_POST['first_name']),
						'last_name'=>validator_lib::cleanUserName($_POST['last_name']),
						'user_name'=>validator_lib::cleanUserName($_POST['usn']),
						'user_pwd'=>mysql_real_escape_string($_POST['usr_pwd']),
						'email'=>validator_lib::cleanEmail($_POST['email']),
						'country'=>strip_tags($_POST['country']),
						'access_level_id'=>3,
						'church_id'=>intval($_POST['church_id']),
						'status'=>0,
						'is_online'=>0,
						'date_created'=>$this->misc->serverTime(),
						'date_modified'=>$this->misc->serverTime(),
						'created_by'=>$this->validator_lib->cleanUserName($this->session->userdata('user_name')), 
						'rec_exist'=>1);
		#lets check for null inputs
		
		$error = validator_lib::validate_church_user_account_inputs($detail);

		if(count($error) > 0):
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		endif;
		
		if(count($error)==0):
			
			$return_flag  = post_lib::save_church_user_account($detail);
	
			if($return_flag == 1){	
				
					$flag_mail_sent = $this->useraccount->dispatchActivationMail($detail, $tblname='tbl_users');

					if($flag_mail_sent['status']==true):
						util_lib::display_message($error=array('The church user account has been successfully created; and an activation mail sent to the recipient.'), $msg_type='success', $img_source='/images/icons/success_small.png');
					endif;
			}

			if($return_flag == 2){
					util_lib::display_message($error=array('The church user account previously exist.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
				
			if($return_flag == 0){
				util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}

		endif;	
}//end function


function update_notice_board_content(){
		
		$error = array();
		$msg = "";
		
		//retrieving and validating the user inputs
		$detail = array('content_title'=>misc::cleanUserName($_POST['title']),
						'content_author'=>NULL,
						'content_desc'=>NULL,
						'content_type_id'=>intval($_POST['content_type_id']),
						'content_pic_banner'=>NULL,
						'content_body'=>strip_tags($_POST['content_body']),
						'status'=>0,
						'date_created'=>$this->misc->serverTime(),
						'date_modified'=>$this->misc->serverTime(),
						'created_by'=>$this->misc->cleanUserName($this->session->userdata('user_name')), 
						'rec_exist'=>1);
		#lets check for null inputs

		if( !misc::required($detail['content_body']) || misc::numeric($detail['content_body'])){
			$msg = 'Kindly enter a valid content text in the field provided.';	
			$error[] = $msg;
		}
		
		#-----------------------------
		if(count($error) > 0):
			$this->errormanager->_show_error($error, $mgsrc='', $msg='');
			exit;
		endif;
		
		if(count($error)==0):
			#check if user account exist
			$flag_exist = $this->useraccount->checkforDuplicate('tbl_contents', $detail, array('content_body'=>$detail['content_body'],'content_type_id'=>$detail['content_type_id'],'rec_exist'=>1));
			
			if($flag_exist){
				$msg = "Kindly note that the record previously exist.";
				$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
				$this->errormanager->_show_error($error='',$imgsrc, $msg);
			}else{
				#save the user data and send a mail to the user	
				$flag_saved = $this->querymanager->insert($detail, 'tbl_contents');
				
				if($flag_saved){
					
					
						  echo "success| <img src=\"/images/icons/success_small.png\" />&nbsp;The record has been successfully posted.";
						  exit;
				
				}else{
						$msg = "Error! Kindly refresh the page and try again.";
						$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
						$this->errormanager->_show_error($error='',$mgsrc, $msg);
						exit;
				}
			}
		endif;
}//end function
////////////////////////////////
function update_churchuser_account(){
	$error = array();
		$msg = "";
		
		//retrieving and validating the user inputs
		$detail = array('first_name'=>misc::cleanUserName($_POST['first_name']),
						'last_name'=>misc::cleanUserName($_POST['last_name']),
						'user_name'=>misc::cleanUserName($_POST['usn']),
						'user_pwd'=>trim($_POST['usr_pwd']),
						'email'=>misc::cleanEmail($_POST['email']),
						'country'=>strip_tags($_POST['country']),
						'access_level_id'=>intval($_POST['access_level_id']),
						'church_id'=>intval($_POST['church_id']),
						'date_modified'=>$this->misc->serverTime());
		#lets check for null inputs
	
		$user_id = intval($_POST['id']);
		
		
		if( !misc::required($detail['first_name']) ){
			$msg = 	'Kindly enter a first name.';
			$error[] = $msg;	
		}
		
		if( !misc::required($detail['last_name']) ){
			$msg = 'Kindly enter a last name.';
			$error[] = $msg;	
		}
		
		if( !misc::required($detail['email']) ){
			$msg = 'Kindly enter a valid email address.';
			$error[] = 	$msg;
		}
		
		if( $detail['church_id'] == 0 ){
			$msg = 'Kindly select a church from the list provided.';	
			$error[] = $msg;
		}
		
		if( $detail['access_level_id'] == 0 ){
			$msg = 'Kindly select a user access level.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['user_name']) ){
			$msg = 'Kindly enter a valid Username.';	
			$error[] = $msg;
		}
		
		
		if( !misc::required($detail['user_pwd'])){
			$msg = 'Kindly enter a valid password for this user.';	
			$error[] = $msg;
		}

		#-----------------------------
		if(count($error) > 0):
			$this->errormanager->_show_error($error, $mgsrc='', $msg='');
			exit;
		endif;
		
		if(count($error)==0):

				#save the user data and send a mail to the user	
				$flag_saved = $this->mysql->update('tbl_users',$detail , array('id'=>$user_id));
				
				if($flag_saved){
					
					echo "success| <img src=\"/images/icons/success_small.png\" />&nbsp;The record has been successfully updated.";
					exit;	
				}else{
					$msg = "Error!, Kindly refresh the page and try again. We apologize for the inconvenience.";
					$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
					$this->errormanager->_show_error($error='',$mgsrc, $msg);
					exit;
				}
		endif;
}//end function

function create_church(){
		
		$error = array();
		$msg = "";
		
		//retrieving and validating the user inputs
		$detail = array('church_name'=>validator_lib::cleanUserName($_POST['church_name']),
						'stream_url'=>trim($_POST['stream_url']),
						'ipad'=>trim($_POST['ipad_stream']),
						'blackberry'=>trim($_POST['bb_stream']),
						'android'=>trim($_POST['droid_stream']),
						'user_name'=>validator_lib::cleanUserName($_POST['usn']),
						'password'=>trim($_POST['pwd']),
						'email'=>validator_lib::cleanEmail($_POST['email']),
						'file_stream'=>strip_tags($_POST['file_stream']),
						'status'=>0,
						'created_by'=>$this->session->userdata('user_name'));
		#lets check for null inputs
		
		$error = validator_lib::validate_create_church_inputs($detail);

		if(count($error) > 0):
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		endif;
		
		$church_id = 0;
		
		if(count($error)==0):
			
			$return_flag  = post_lib::save_church_created($detail);
	
			if($return_flag == 1){	
				$church_id = useraccount::getLastAttributeValue(array('id', 'church_name'), $tblname='tbl_churches', $where=array('church_name'=>$detail['church_name']), $retval='id');
				$detail_users = array(	'first_name'=>validator_lib::cleanUserName($detail['user_name']),
									  	'user_name'=>$detail['user_name'],
										  'user_pwd'=>$detail['password'],
										  'email'=>$detail['email'],
										  'access_level_id'=>2,
										  'church_id'=>$church_id,
										  'date_created'=>$this->misc->serverTime(),
										  'date_modified'=>$this->misc->serverTime(),
										  'created_by' => validator_lib::cleanUserName($this->session->userdata('user_name')), 
										  'status'=>1,
										  'is_online'=>0,
										  'rec_exist'=>1);
				
				$return_flag2  = post_lib::save_church_created_in_tblusers($detail_users);
	
				
				if($return_flag2 == 1):
					$flag_mail_sent = $this->useraccount->dispatchActivationMail($detail_users, $tblname='tbl_users');

					if($flag_mail_sent['status']==true):
						util_lib::display_message($error=array('The church account has been successfully created; and an activation mail sent to the recipient.'), $msg_type='success', $img_source='/images/icons/success_small.png');
					endif;
				endif;
				
				if($return_flag2 == 2):
					util_lib::display_message($error=array('The church account previously exist.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
				endif;
				
				if($return_flag2 == 0):
					util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
				endif;
	
			}
			
			
			if($return_flag == 2){
					util_lib::display_message($error=array('The church account previously exist.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
				
			if($return_flag == 0){
				util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
				
				
			
			
		endif;	

}//end function


function update_church(){
	$error = array();
		$msg = "";
		
		//retrieving and validating the user inputs
		$detail = array('church_name'=>misc::cleanUserName($_POST['church_name']),
						'stream_url'=>trim($_POST['stream_url']),
						'ipad'=>trim($_POST['ipad_stream']),
						'blackberry'=>trim($_POST['bb_stream']),
						'android'=>trim($_POST['droid_stream']),
						'user_name'=>$this->misc->cleanUserName($_POST['usn']),
						'password'=>trim($_POST['pwd']),
						'email'=>$this->misc->cleanEmail($_POST['email']),
						'file_stream'=>strip_tags($_POST['file_stream']),
						'created_by'=>$this->session->userdata('user_name'));
		#lets check for null inputs
		
		$user_id = intval($_POST['id']);
		
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
		
		#-----------------------------
		if(count($error) > 0):
			$this->errormanager->_show_error($error, $mgsrc='', $msg='');
			exit;
		endif;
		
		if(count($error)==0):

				#save the user data and send a mail to the user	
				/*$flag_saved = $this->mysql->update('tbl_churches',$detail , array('id'=>$user_id));
				
				if($flag_saved){
					
					echo "success| <img src=\"/images/icons/success_small.png\" />&nbsp;The record has been successfully updated.";
					exit;	
				}else{
					$msg = "Error!, Kindly refresh the page and try again. We apologize for the inconvenience.";
					$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
					$this->errormanager->_show_error($error='',$mgsrc, $msg);
					exit;
				}*/
				#check if user account exist
			//$flag_exist = $this->useraccount->checkforDuplicate('tbl_users', $detail, array('user_name'=>$detail['user_name']));
			/*if($flag_exist){
				$msg = "Kindly note that the record previously exist.";
				$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
				$this->errormanager->_show_error($error='',$imgsrc, $msg);
			}else{*/
				#save the user data and send a mail to the user	
				$flag_saved = $this->mysql->update('tbl_churches',$detail , array('id'=>$user_id));
				
				if($flag_saved){
					
					/*$flag_mail_sent = $this->useraccount->dispatchActivationMail($detail, $tblname='tbl_churches');
					if($flag_mail_sent['status']==true):
						echo "success| <img src=\"/images/icons/success_small.png\" />&nbsp;The record has been successfully created.";
						exit;
					endif;	*/
				}else{
					$msg = "Kindly refresh your browser and start again.";
					$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
					$this->errormanager->_show_error($error='',$mgsrc, $msg);
					exit;
				}
			
		endif;
}//end function

function add_help_lines(){
	
	$count =  intval($this->uri->segment(3));
	
	#echo $count; exit;
	$flag_success = false;
	$error = array();
	$church_id = intval($this->input->post('church_id'));
		#echo $church_id; exit;
	for($i = 1; $i <= $count; $i++){
					
		$help_line = "help_line".$i;
		#echo $help_line; exit;
		$help_line_x = $_POST[$help_line];
		
		
		#echo $help_line_x; exit;
	
		$detail = array("church_id"=>$church_id,
						"help_line"=>mysql_real_escape_string($help_line_x),
						"status"=>1);
		#echo $detail['help_line']; exit;
		$error = validator_lib::validate_help_line_input($detail);
		
		if(count($error) > 0):
			#util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
			$flag_success = false;
		endif;
		
		if(count($error) == 0):
			$return_flag  = post_lib::save_help_lines_inputted($detail);
	
			if($return_flag == 1){	
				$flag_success = true;
			}
		endif;

	}
	
	switch ($flag_success):
		
			case true:
				util_lib::display_message($error=array('The help line(s) has been successfully processed.'), $msg_type='success', $img_source='/images/icons/success_small.png');
			break;
			
			
			case false:
				util_lib::display_message($error=array('Kindly ensure all help line(s) are entered in the field(s) provided.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
			break;
			
			default: 
				util_lib::display_message($error=array('To Update Help Lines, kindly fill out the form below..'), $msg_type='info', $img_source='/images/icons/info_small.png');exit;
		endswitch;
	
	
}//end function


function add_notice_board_content(){
	
	$count =  intval($this->uri->segment(3));
	
	#echo $count; exit;
	$flag_success = false;
	$error = array();
	$church_id = intval($this->input->post('church_id'));
		#echo $church_id; exit;
	for($i = 1; $i <= $count; $i++){
					
		$help_line = "notice_board_content".$i;
		#echo $help_line; exit;
		$help_line_x = $_POST[$help_line];
		

		$detail = array("church_id"=>$church_id,
						"notice_board_content"=>strip_tags($help_line_x),
						"status"=>1,
						"time_posted"=>misc::serverTime());
		#echo $detail['help_line']; exit;
		$error = validator_lib::validate_notice_board_content_input($detail);
		
		if(count($error) > 0):
			#util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
			$flag_success = false;
		endif;
		
		if(count($error) == 0):
			$return_flag  = post_lib::save_notice_board_content_inputted($detail);
	
			if($return_flag == 1){	
				$flag_success = true;
			}
		endif;

	}
	
	switch ($flag_success):
		
			case true:
				util_lib::display_message($error=array('Your notice board content has been successfully processed.'), $msg_type='success', $img_source='/images/icons/success_small.png');
			break;
			
			
			case false:
				util_lib::display_message($error=array('Kindly ensure all notice board content are entered in the field(s) provided.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
			break;
			
			default: 
				util_lib::display_message($error=array('To Update the notice board content, kindly fill out the form below.'), $msg_type='info', $img_source='/images/icons/info_small.png');exit;
		endswitch;
}//end function

function proc_egiving(){
	echo 'success| Isaac is the programmer of the year.';
	
	$error = array();
	$msg = "";
	$reg_fee=0;
	$detail =  array('church_id'=>$_POST['church_id'],
						'user_account'=>$_POST['user_account'],
						'service_year'=>$_POST['service_year'],
						'service_month'=>$_POST['service_month'],
						'service_day'=>$_POST['service_day'],
						'giving_cat'=>strip_tags($_POST['giving_cat']),
						'currency_type'=>strip_tags($_POST['currency_type']),
						'payment_method'=>strip_tags(trim($_POST['payment_methods'])),
						'issued_bank'=> strip_tags($_POST['issued_bank']),
						'receiving_bank'=> strip_tags($_POST['receiving_bank']),
						'issued_bank_account'=> strip_tags($_POST['issue_bank_account']),
						'receiving_bank_account'=> strip_tags($_POST['receiving_bank_accts']),
						'recipient_account_no'=> strip_tags($_POST['recipient_acct_no']),
						'recipient_bank'=> strip_tags($_POST['recipient_bank']),
						'bank_teller_no'=>strip_tags($_POST['bank_tellerno']),
						'amount'=>(float)($_POST['amount_paid']),
						'time_posted'=>misc::serverTime());
	
	
	#lets validate the inputs	
	$error = validator_lib::validate_egiving_input($detail);
	
	
}//end function


function generate_link(){
	
	global $page_res;
	sessiondata::general_page_resource();
	
	//$church_id = $_POST['church_id'];
	$church_id = $this->session->userdata('church_id');
	$year = $_POST['service_year'];
	$month = $_POST['service_month'];
	$day = $_POST['service_day'];
	
	$church_name = $_POST['church_name'];
	$church_name = misc::makeSeoTitle($church_name);
	
	$glink = CUSTOM_BASE_URL."/invite/member/".$church_id."/".$year."/".$month."/".$day."/".misc::makeSeoTitle($this->session->userdata('church_name'));
	
	echo "success|$glink";
	
}//end function


function proc_edited_notice_board_content(){
	
	$id = intval($_POST['content_id']);
	
	$ndcontent = strip_tags($_POST['notice_board_content']);
	
	if($ndcontent == ""){
	
		util_lib::display_message($error=array('Kindly enter the notice board content in the field provided.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
		
	}else{
		// run the update script
		mysql::update('tbl_churches_notice_board_contents', array('notice_board_content'=>$ndcontent), $where=array('id'=>$id));
		
		util_lib::display_message($error=array('The notice board content has been successfully updated.'), $msg_type='success', $img_source='/images/icons/success_small.png');exit;
	};
	
}//end function


function proc_edited_help_line_content(){
	
	$id = intval($_POST['content_id']);
	
	$ndcontent = strip_tags($_POST['notice_board_content']);
	
	if($ndcontent == ""){
	
		util_lib::display_message($error=array('Kindly enter the notice board content in the field provided.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
		
	}else{
		// run the update script
		mysql::update('help_lines', array('help_line'=>$ndcontent), $where=array('id'=>$id));
		
		util_lib::display_message($error=array('The help line has been successfully updated.'), $msg_type='success', $img_source='/images/icons/success_small.png');exit;
	};
	
	
}//end function


function post_comment(){

	
	$error = array();
	
	$detail = array('account_name'=>strip_tags($_POST['account_name']),
					'name'=>strip_tags($_POST['name']),
					'meeting_type'=>intval($_POST['meeting_type']),
					'email'=>validator_lib::cleanEmail($_POST['email']),
					'phone_no'=>strip_tags($_POST['phone']),
					'church_id'=>validator_lib::filter_integer_data($_POST['church_id']),
					'stream_url'=>strip_tags($_POST['stream_url']),
					'country'=>strip_tags($_POST['country']),
					'comment'=>strip_tags($_POST['comment']),
					'time_posted'=>misc::serverTime(),
					'approved'=>0);
	
	//validate to ensure there are input to the system
	$error = validator_lib::validate_post_comment_inputs($detail);
	
	if(count($error) > 0): #if there are errors
		$this->util_lib->display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		exit;
	endif;
	
	
	if(count($error) ==0):
			
			$return_flag  = post_lib::save_to_service_comment($detail);  #save the detail
			
			if($return_flag==1){
				
				$this->util_lib->display_message($error=array('Your comment has been successfully processed.'), $msg_type='success', $img_source='/images/icons/success_small.png');
				exit;
				
			}else{
				$this->util_lib->display_message($error=array('We are sorry for the incovenience, kindly refresh the page and try again.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
				exit;
			}
	
	endif;
	
}//end function


function deactivateAllUsers(){
	
	//capture required details
	$param = intval($this->uri->segment(3));
	//echo $param;
	$church_id = useraccount::getLastAttributeValue(array('id', 'user_name'), $tblname='tbl_churches', $where=array('user_name'=>$this->session->userdata('user_name')), $retval='id');
	$flag_updated = mysql::update('tbl_users',array('status'=>0), array('church_id'=>$church_id,'access_level_id'=>3));
	if($flag_updated){
		echo "success|The entire accounts has been deactivated successfully.";	
	}
	
}///end function


function activateAllUsers(){
	
	//capture required details
	$param = intval($this->uri->segment(3));
	//echo $param;
	$church_id = useraccount::getLastAttributeValue(array('id', 'user_name'), $tblname='tbl_churches', $where=array('user_name'=>$this->session->userdata('user_name')), $retval='id');
	$flag_updated = mysql::update('tbl_users',array('status'=>1), array('church_id'=>$church_id,'access_level_id'=>3));
	if($flag_updated){
		echo "success|The entire accounts has been activated successfully.";	
	}
	
}//end function


function update_user_profile(){
	
	//echo "success| I can do all things.";
	
	//get inputs
	
	$detail = array('first_name'=>misc::cleanUserName($_POST['first_name']),
					'last_name'=>misc::cleanUserName($_POST['last_name']),
					'email'=>validator_lib::cleanEmail($_POST['email']),
					'phone_no'=>strip_tags($_POST['phone_no']),
					'country'=>strip_tags($_POST['country']),
					'birth_day'=>strip_tags($_POST['lstbday']),
					'birth_month'=>strip_tags($_POST['lstbmonth']),
					'birth_year'=>strip_tags($_POST['lstbyear']),
					'access_level_id'=>3,
					'church_id'=>intval($_POST['church_id']),
					'date_modified'=>$this->misc->serverTime());
		#lets check for null inputs
	
		$user_id = intval($_POST['user_id']);
		
		$error = array();
		$msg = '';
	
		if( !misc::required($detail['first_name'])){
			$msg = 'Kindly enter the user first name in the field provided.';	
			$error[] = $msg;
		}
		

		if( !misc::required($detail['last_name'])){
			$msg = 'Kindly enter a valid last name in the field provided.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['email'])){
			$msg = 'Kindly enter a valid email address in the field provided.';	
			$error[] = $msg;
		}
		
		if( !misc::required($detail['phone_no'])){
			$msg = "Kindly enter a valid mobile no. in the field provided.";	
			$error[] = $msg;
		}

		
		if( !misc::required($detail['country'])){
			$msg = "Kindly select a country of residence for this church member/user.";	
			$error[] = $msg;
		}
		
		if(count($error) > 0):
			util_lib::display_message($error, $msg_type="failure", $img_source="/images/icons/success_small.png");
			exit;
		endif;
		
		if(count($error)==0):

				#save the user data and send a mail to the user	
				$flag_saved = $this->mysql->update('tbl_users',$detail , array('id'=>$user_id));
				
				if($flag_saved){
					
					echo "success| <img src=\"/images/icons/success_small.png\" />&nbsp;The record has been successfully updated.";
					exit;	
				}else{
					$msg = "Error!, Kindly refresh the page and try again. We apologize for the inconvenience.";
					$imgsrc = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />";
					$this->errormanager->_show_error($error='',$mgsrc, $msg);
					exit;
				}
		endif;

	
	
}//end function


function change_user_password(){
	
	$flag_ok = true;
	$prev_pwd = strip_tags($_POST['prev_pwd']);
	$new_pwd = strip_tags($_POST['new_pwd']);
	$c_pwd = strip_tags($_POST['confirm_pwd']);
	
	if($prev_pwd==''):
		$flag_ok = false;
		$this->util_lib->display_message($error=array('Kindly enter your Previous Password in the field provided.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
	endif;
	
	if($new_pwd==''):
		$flag_ok = false;
		$this->util_lib->display_message($error=array('Kindly enter your New Password in the field provided.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
	endif;	
	
	if($c_pwd==''):
		$flag_ok = false;
		$this->util_lib->display_message($error=array('Kindly confirm your New Password by entering it in the field provided.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
	endif;	
	
	if($c_pwd!=$new_pwd):
		$flag_ok = false;
		$this->util_lib->display_message($error=array('Kindly re-confirm your New Password.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');exit;
	endif;	
	
	if($flag_ok){
		
			$flag_updated = mysql::update($tblname='tbl_users', $setflds=array('user_pwd'=>$new_pwd), $where=array('id'=>$_POST['user_id']));
	
			if($flag_updated):
			
				util_lib::display_message(array('Your Password has been successfully updated.'), $msg_type='success', $img_source='/images/icons/success_small.png');exit;
				
			endif;

	}
	
}//end function


function proc_service_note(){
	
	global $page_res;
	$this->general_page_resource();
	
	$note = strip_tags($_POST['txtnote']);
	
	$church_id = intval($_POST['church_id']);
	
	$user_id = intval($_POST['user_id']);
	
	$vidstream = intval($_POST['stream_url']);
	
	$meeting_date = misc::serverTime();
	
	//echo $user_id;
	
	$flag_mail_sent = useraccount::send_church_meeting_note_mail($page_res, $note, $meeting_date);
	
	if($flag_mail_sent['status']==true)echo "success|Your note has been sent to your mail box";
	
	//save the detail

}//end function


function proc_cell_service_note(){
	
	global $page_res;
	$this->general_page_resource();
	
	$note = strip_tags($_POST['txtnote']);
	
	$church_id = intval($_POST['church_id']);
	
	$user_id = intval($_POST['user_id']);
	
	$vidstream = intval($_POST['stream_url']);
	
	$meeting_date = misc::serverTime();
	
	//echo $user_id;
	
	$flag_mail_sent = useraccount::send_cell_meeting_note_mail($page_res, $note, $meeting_date);
	
	if($flag_mail_sent['status']==true)echo "success|Your note has been sent to your mail box";
	

}//end function




function create_church_cell(){
	
	//retrieving and validating the user inputs
		$detail = array('cell_name'=>validator_lib::cleanUserName($_POST['cell_name']),
						'cell_desc'=>strip_tags($_POST['cell_desc']),
						'country'=>strip_tags($_POST['country']),
						'church_id'=>intval($_POST['church_id']),
						'status'=>1,
						'time_created'=>misc::serverTime(),
						'time_modified'=>misc::serverTime());
		
		//echo strip_tags($_POST['country']); exit;
		$error = validator_lib::validate_create_cell_inputs($detail);

		if(count($error) > 0):
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		endif;
		
		
		if(count($error)==0):
			
			$return_flag  = post_lib::save_to_church_cell($detail);
	
			if($return_flag == 1){	
				util_lib::display_message($error=array('The church cell has been successfully created.'), $msg_type='success', $img_source='/images/icons/success_small.png');	
			}
			
			
			if($return_flag == 2){
				util_lib::display_message($error=array('The church cell account previously exist.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
				
			if($return_flag == 0){
				util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}

		endif;	
						
	
}//end function


function update_church_cell(){
	
	//retrieving and validating the user inputs
		$detail = array('cell_name'=>validator_lib::cleanUserName($_POST['cell_name']),
						'cell_desc'=>strip_tags($_POST['cell_desc']),
						'country'=>strip_tags($_POST['country']),
						'church_id'=>intval($_POST['church_id']),
						'status'=>1,
						'time_created'=>misc::serverTime(),
						'time_modified'=>misc::serverTime());
		
		//echo strip_tags($_POST['country']); exit;
		$error = validator_lib::validate_updated_cell_inputs($detail);
		
		if(count($error) > 0):
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		endif;
		
		if(count($error)==0):
			$cell_id = intval($_POST['cell_id']);
		
			$flag_updated = mysql::update('tbl_cells', $detail, array('id'=>$cell_id));
			
			//echo $flag_updated; exit;
			
			if($flag_updated){
				
				util_lib::display_message(array('The record has been updated successfully.'), $msg_type='success', $img_source='/images/icons/success_small.png');
			}
		endif;
	
}//end function


function create_cell_leader(){
	
	global $page_res;
	sessiondata::general_page_resource();
	
		//retrieving and validating the user inputs
		$detail = array('cell_id'=>intval($_POST['cell_id']),
						'cell_leader_id'=>intval($_POST['cleader_name']),
						'country'=>strip_tags($_POST['country']),
						'church_id'=>intval($page_res['church_id']),
						'status'=>1,
						'email'=>'',
						'time_created'=>misc::serverTime(),
						'time_modified'=>misc::serverTime());
		
		//echo strip_tags($_POST['country']); exit;
		$error = validator_lib::validate_cleader_inputs($detail);

		if(count($error) > 0):  // if there are errors
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		endif;
		
		
		if(count($error)==0):  //if there are no errors in the captured inputs
			
			//check if this has already been appointed as a cell leader
			

			//$flag_appointed = useraccount::getAttributeValue(array('id','is_cell_leader'), $tblname='tbl_users', $where=array('id'=>intval($_POST['cleader_name'])), $retval = 'is_cell_leader');
			
			$flag_appointed = false;
			
			$cell_leader = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('church_id'=>$page_res['church_id'], 'cell_id'=>intval($_POST['cell_id'])),$arrAttribute=array('is_cell_leader', 'cell_id'),$num=1,$orderBy='');
			
			if($cell_leader['is_cell_leader'][0]==1):
			
				$flag_appointed = true;
			
			endif;

			if($flag_appointed==false){

				//$detail['cell_leader_id'] = $cleader_id;
				$return_flag  = $this->mysql->update('tbl_users', array('is_cell_leader'=>1,'cell_id'=>intval($_POST['cell_id']),'is_cell_member'=>1), array('id'=>intval($_POST['cleader_name'])));
				
				//echo $return_flag; exit;
				
				if($return_flag == 1){	
	
					$email = useraccount::getAttributeValue(array('id','email'), $tblname='tbl_users', $where=array('id'=>intval($_POST['cleader_name'])), $retval = 'email');
					
					$detail['email'] = $email;
					
					$flag_mail_sent = $this->useraccount->dispatch_cellleaders_appointed_mail($detail, 'tbl_users');
					
					if($flag_mail_sent['status']==true):

						util_lib::display_message(array('The cell leader has been successfullr created.'), $msg_type='success', $img_source='/images/icons/success_small.png');	
						exit;
					endif;	

				}

			}else{
				util_lib::display_message($error=array('A cell leader has already been appointed for the selected cell.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
				exit;
			}
			
			

		endif;	
						
}//end function

function update_cell_leader(){
	
	//retrieving and validating the user inputs
		$detail = array('cell_id'=>intval($_POST['cell_id']),
						'cell_leader_email'=>validator_lib::cleanEmail($_POST['cleader_email']),
						'cell_leader_name'=>strip_tags($_POST['cleader_name']),
						'country'=>strip_tags($_POST['country']),
						'church_id'=>intval($_POST['church_id']),
						'time_modified'=>misc::serverTime());
		
		//echo strip_tags($_POST['country']); exit;
		$error = validator_lib::validate_cleader_inputs($detail);

		if(count($error) > 0):
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		endif;
		
		if(count($error)==0):
			$cell_leader_id = intval($_POST['id']);
			
			//echo $cell_leader_id; exit;
			
		
			$flag_updated = mysql::update('tbl_cell_leaders', $detail, array('id'=>$cell_leader_id));
			
			//echo $flag_updated; exit;
			
			if($flag_updated){
				
				util_lib::display_message(array('The record has been updated successfully.'), $msg_type='success', $img_source='/images/icons/success_small.png');
			}
		endif;
	
}//end function

function set_church_service_timer(){
	
		$detail = array('group_id'=>null,
						'church_id'=>intval($_POST['church_id']),
						'year'=>strip_tags($_POST['year']),
						'month'=>strip_tags($_POST['month']),
						'day'=>strip_tags($_POST['day']),
						'hour'=>strip_tags($_POST['hour']),
						'minute'=>strip_tags($_POST['minute']),
						'time_zone'=>strip_tags($_POST['TimeZone']),
						'service_day'=>strip_tags($_POST['service_day']),
						'status'=>1,
						'time_posted'=>misc::serverTime());
		
		//echo strip_tags($_POST['country']); exit;
		$error = validator_lib::validate_service_timer_inputs($detail);

		if(count($error) > 0):
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		endif;
		
		if(count($error) == 0):
			$flag_inserted = mysql::insert($detail, 'tbl_online_timmer');
			util_lib::display_message(array('The timer has been set successfully.'), $msg_type='success', $img_source='/images/icons/success_small.png');
		endif;
	
}//end function




///////////////////////////////////////////////////
}//end class
