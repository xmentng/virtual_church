<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chatsystem extends CI_Controller {
	
function __construct(){
	parent::__construct();
	$this->load->library(array('validator_lib'));
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
		
}//end function



function sanitize($text) {
	$text = htmlspecialchars($text, ENT_QUOTES);
	$text = str_replace("\n\r","\n",$text);
	$text = str_replace("\r\n","\n",$text);
	$text = str_replace("\n","<br>",$text);
	return $text;
}//end function


function startchat(){
	
	global $page_res;
	$this->general_page_resource();
	
	//echo $page_res['logged_in_account'];
	
	$data['title'] = "Chat System - Virtual Church.";
	
	//lets get the admin account connected to this chat user
	
	
	
	$this->load->view("chat", array("page_res"=>$page_res, 'data'=>$data));
}//end function


function savepost(){
	
	global $page_res;
	$this->general_page_resource();
	
	$receiver = strip_tags($this->uri->segment(3));
	$page_res['receiver'] = $receiver;
	
	$ddd=$_POST['message'];
	$ddd = $this->sanitize($ddd);
	//$query = "INSERT INTO message (message) VALUES ('$ddd')";
	
	//echo $ddd; exit;
	
	if(misc::required($ddd)){
	
		$isposted = mysql::insert(array("message"=>$ddd, "sender"=>$page_res['logged_in_account'], "receiver"=>$page_res['receiver'],"recd"=>1, 'time_posted'=>misc::serverTime()), "tbl_chat_messages");
		
		//echo $isposted; exit;
		
		echo "message processed successfully.";
		
	}
	
	
}//end function


function refreshpost(){
	
	global $page_res;
	$this->general_page_resource();
	
	$today = time();

	//echo $today(); exit(0);
	$result = mysql_query("SELECT * FROM tbl_chat_messages WHERE sender=\"$page_res[logged_in_account]\" AND receiver=\"$page_res[church_account_name]\" ORDER BY id DESC LIMIT 10");


	while($row = mysql_fetch_array($result))
	  {
	  echo '<p>'.'<span>'.$row['sender'].'</span>'. '&nbsp;&nbsp;' . $row['message'].'&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y h:i:s A",$row['time_posted']).'</p>';
	  }
	
	//mysql_close($con);
	
}//end function





///////////////////////////////////////////////////
}//end class
