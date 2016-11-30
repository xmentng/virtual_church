<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salvationcall extends CI_Controller {
	
function __construct(){
	parent::__construct();
	
	$this->load->library(array('thumbnailmanager'));
	
}


function index(){
	
	$inviteid = strip_tags($this->uri->segment(3));
	$acb = strip_tags($_GET['acb']);
	
	if($acb=='me'):
		
		$flag_updated = mysql::update('tbl_call_to_salvation', array('accept_call'=>1, 'status'=>1), array('invite_code'=>$inviteid));
		
		if($flag_updated){
			header('location: /salvationcall/thankyou');
		}//endif
		
		
	endif;
	
}//end function

function thankyou(){

	$data['page_name'] = "Thank You for Accepting Jesus Christ.";
	$this->load->view('thankyouforacceptingjesus',$data);
	
}//end function



function invitesinfo(){

	$this->load->library('sessiondata');
	global $page_res;
	sessiondata::general_page_resource();
	
	
	//echo $page_res['church_banner']; exit;
	
	$user_id =  $this->session->userdata('user_id');
	$data['info_msg'] = "The below are list of invitees you have sent a salvation call mail.";
	$data['css_cls'] = "info";
	$page_res['page_name'] = "Salvation Call -> Invites Detail";
	
	///////////////////////////////////////////////////////////////
	
	$data['page_title'] = 'Salvation Call Invites | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Invite Details</strong>.';

	$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');

	#get notice board content
	$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
	
	$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
	

	$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
	

	#lets obtain the church detail for this member/guest
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$user_detail['church_id'][0]),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');
	
	#get help lines based on this church id
		$support = $this->useraccount->loadDetails($tblname="help_lines",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','help_line', 'status'),$num=NULL,$orderBy='');
		
	#get elp Lines
		$data['n_help_lines'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='help_lines');	
		
	//get the total soul won
	//echo $this->session->userdata('user_id'); exit;
	$soulswon = $this->useraccount->loadDetails($tblname="tbl_call_to_salvation",$arrFilter=array('user_id'=>intval($this->session->userdata('user_id')),'accept_call'=>1),$arrAttribute=array('id','user_id','invite_name', 'invite_email', 'invite_country', 'accept_call', 'time_posted'),$num=NULL,$orderBy='');
	
	//var_dump($data['nsouls_won']); exit;
	
	//get the total call sent
	$invites = $this->useraccount->loadDetails($tblname="tbl_call_to_salvation",$arrFilter=array('user_id'=>intval($this->session->userdata('user_id'))),$arrAttribute=array('id','user_id','invite_name', 'invite_email', 'invite_country', 'accept_call', 'time_posted'),$num=NULL,$orderBy='');
	
	///////////////////////////////////////////////////////////////

	
	$this->load->view('church_member/salvationcall_invite_info',array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'notice_board'=>$notice_board, 'support'=>$support, 'soulswon'=>$soulswon, 'invites'=>$invites));

}//end function

function soulswoninfo(){

$this->load->library('sessiondata');
	global $page_res;
	sessiondata::general_page_resource();
	
	
	//echo $page_res['church_banner']; exit;
	
	$user_id =  $this->session->userdata('user_id');
	$data['info_msg'] = "The below are list of invites has accepted Christ Jesus as Lord and Saviour.";
	$data['css_cls'] = "info";
	$page_res['page_name'] = "Salvation Call -> Invites Detail";
	
	///////////////////////////////////////////////////////////////
	
	$data['page_title'] = 'Souls Saved | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Souls Won</strong>.';

	$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');

	#get notice board content
	$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
	
	$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
	

	$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
	

	#lets obtain the church detail for this member/guest
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$user_detail['church_id'][0]),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');
	
	#get help lines based on this church id
		$support = $this->useraccount->loadDetails($tblname="help_lines",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','help_line', 'status'),$num=NULL,$orderBy='');
		
	#get elp Lines
		$data['n_help_lines'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='help_lines');	
		
	//get the total soul won
	//echo $this->session->userdata('user_id'); exit;
	$soulswon = $this->useraccount->loadDetails($tblname="tbl_call_to_salvation",$arrFilter=array('user_id'=>intval($this->session->userdata('user_id')),'accept_call'=>1),$arrAttribute=array('id','user_id','invite_name', 'invite_email', 'invite_country', 'accept_call', 'time_posted'),$num=NULL,$orderBy='');
	
	//var_dump($data['nsouls_won']); exit;
	
	//get the total call sent
	$invites = $this->useraccount->loadDetails($tblname="tbl_call_to_salvation",$arrFilter=array('user_id'=>intval($this->session->userdata('user_id'))),$arrAttribute=array('id','user_id','invite_name', 'invite_email', 'invite_country', 'accept_call', 'time_posted'),$num=NULL,$orderBy='');
	
	///////////////////////////////////////////////////////////////

	
	$this->load->view('church_member/soulswons',array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'notice_board'=>$notice_board, 'support'=>$support, 'soulswon'=>$soulswon, 'invites'=>$invites));

}//end function



///////////////////////////////////////////////////
}//end class
