<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invite extends CI_Controller {


function __construct(){
	parent::__construct();
	$this->load->library(array('sessiondata'));
	
}//end function

function registration(){

	global $page_res;
	sessiondata::general_page_resource();
	
	$view = 'church_admin/register_invite';
	$data['page_title'] = 'Register | '.$page_res['church_name'];
	$page_res['page_name'] = 'Invite Registration';
	
	$data['css_cls'] = "info";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Please fill the below form to be a member of ".$page_res['church_name'].".";
	
	//$data['page_desc'] = "You were here : Church Admin => Invite Link => Generate";
	$data['msg_flag_status'] = 'info';

	//retrieve the url details
	$data['church_id'] = intval($this->uri->segment(3));
	$data['year'] = strip_tags($this->uri->segment(4));
	$data['month'] = strip_tags($this->uri->segment(5));
	$data['day'] = strip_tags($this->uri->segment(6));
	$data['invite_id'] = intval($this->uri->segment(8));
	
	// get the invite name, email, password

	$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
	//$user_name = $this->session->userdata('user_name');
	$_access_level = $this->useraccount->loadAccessLevels();
	
	$data['n_access_level'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
	
	#lets retrieve the church user detail
	$user_detail = useraccount::loadDetails($tableName='tbl_church_service_invites',$arrFilter=array('id'=>$data['invite_id']),$arrAttribute=array('id', 'invite_first_name', 'invite_last_name', 'invite_email', 'invite_password', 'country'),$num=1,$orderBy='');
	
	$this->load->view($view, array('data'=>$data,'invite'=>$user_detail,'access_levels'=>$_access_level, 'page_res'=>$page_res));

	
	
}//end function


function member(){
	
	global $page_res;
	sessiondata::general_page_resource();
	
	$view = 'church_admin/invite_member';
	$data['page_title'] = 'Register | '.$this->session->userdata('church_name');
	$page_res['page_name'] = 'Invite Member';
	$data['css_cls'] = "info";
	//$data['page_desc'] = "You were here : Church Admin => Invite Link => Generate";
	$data['msg_flag_status'] = 'info';

	//retrieve the url details
	$data['church_id'] = intval($this->uri->segment(3));
	$data['year'] = strip_tags($this->uri->segment(4));
	$data['month'] = strip_tags($this->uri->segment(5));
	$data['day'] = strip_tags($this->uri->segment(6));
	$data['invite_id'] = intval($this->uri->segment(8));
	
	// get the invite name, email, password

	$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
	//$user_name = $this->session->userdata('user_name');
	$_access_level = $this->useraccount->loadAccessLevels();
	
	$data['n_access_level'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
	
	#lets retrieve the church user detail
	$user_detail = useraccount::loadDetails($tableName='tbl_church_service_invites',$arrFilter=array('id'=>$data['invite_id']),$arrAttribute=array('id', 'invite_first_name', 'invite_last_name', 'invite_email', 'invite_password'),$num=1,$orderBy='');
	
	$church_detail = useraccount::loadDetails($tableName='tbl_churches',$arrFilter=array('id'=>$data['church_id']),$arrAttribute=array('id', 'church_name', 'stream_url', 'ipad', 'blackberry', 'android', 'status'),$num=1,$orderBy='');
	
	$church_name = $church_detail['church_name'][0];
	
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Kindly fill the form below to be a member of $church_name.";
	
	$this->load->view($view, array('data'=>$data,'invite'=>$user_detail,'access_levels'=>$_access_level, 'page_res'=>$page_res));
	
	
}//end function

/////////////////////////////////////////////////////////////////////

}//end class



