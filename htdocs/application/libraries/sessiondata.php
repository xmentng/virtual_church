<?php
class Sessiondata{

function general_page_resource(){
		
		global $page_res, $comment;

		#retrieve the users online.
		#retrieve the users online.
		$logged_in_account = $this->session->userdata('user_name');
		//echo $this->session->userdata('cellOutLinePath'); exit;
		
		$cell_name = "";
		
		$user_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'id');
		
		$church_id = useraccount::getAttributeValue($detail=array('id','church_id'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'church_id');
		
		$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$church_id),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream', 'user_name'),$num=1,$orderBy='');
		
		
		$first_name = useraccount::getAttributeValue($detail=array('id','first_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'first_name');
		
		$last_name = useraccount::getAttributeValue($detail=array('id','last_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'last_name');
		
		$phone_no = useraccount::getAttributeValue($detail=array('id','phone_no'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'phone_no');
		
		$user_pic = useraccount::getAttributeValue($detail=array('id','profile_pic', 'user_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'profile_pic');
		
		$user_pwd = useraccount::getAttributeValue($detail=array('id','user_pwd', 'user_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'user_pwd');
		
		$country = useraccount::getAttributeValue($detail=array('id','country'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'country');
		
		$email = useraccount::getAttributeValue($detail=array('id','email'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'email');
		
		$access_level = useraccount::getAttributeValue($detail=array('id','access_level_id'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'access_level_id');
				
		$my_cell_id = useraccount::getAttributeValue($detail=array('id','my_cell_id'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'my_cell_id');
		
		$is_cell_leader = useraccount::getAttributeValue($detail=array('id','is_cell_leader'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'is_cell_leader');
		
		$cell_id = useraccount::getAttributeValue($detail=array('id','cell_id','user_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'cell_id');
		
		if($cell_id > 0 ):
		
			$cell_name = useraccount::getAttributeValue($detail=array('id','cell_name'), $tblname='tbl_cells', $where=array('id'=>$cell_id), $retval = 'cell_name');
		
		endif;
		
		$is_cell_member = useraccount::getAttributeValue($detail=array('id','is_cell_member'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'is_cell_member');
		
		$is_fsch_student = useraccount::getAttributeValue($detail=array('id','is_fsch_student'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'is_fsch_student');
		
		$completed_fsch = useraccount::getAttributeValue($detail=array('id','completed_fsch'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'completed_fsch');
		
		$current_fsch_class = useraccount::getAttributeValue($detail=array('id','current_fsch_class'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'current_fsch_class');
		
		$is_online = useraccount::getAttributeValue($detail=array('id','is_online'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'is_online');
		
		$is_active = useraccount::getAttributeValue($detail=array('id','status'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'status');
		
		$arr_soulswon = $this->useraccount->loadDetails($tblname="tbl_call_to_salvation",$arrFilter=array('user_id'=>intval($user_id),'accept_call'=>1),$arrAttribute=array('id','user_id','invite_name', 'invite_email', 'invite_country', 'accept_call', 'time_posted'),$num=NULL,$orderBy='');
		$int_soulswon = count($arr_soulswon['id']);
		
		$invites = $this->useraccount->loadDetails($tblname="tbl_call_to_salvation",$arrFilter=array('user_id'=>intval($user_id)),$arrAttribute=array('id','user_id','invite_name', 'invite_email', 'invite_country', 'accept_call', 'time_posted'),$num=NULL,$orderBy='');	
		$int_scall_invites = count($invites['id']);
		
		
		//echo $access_level; exit;
		
		$church_banner = useraccount::getAttributeValue(array('id', 'church_banner_url'), $tblname='tbl_churches', array('id'=>$church_id), $retval='church_banner_url');
		
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
						  'user_pwd'=>$user_pwd,
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
						  //'church_name'=>$church_detail['church_name'][0],
						  'church_name'=>'Christ Embassy Virtual Church',
						  'ncomments'=>$ncomments,
						  'profile_pic' =>$user_pic,
						  'ipad_stream' =>$church_detail['ipad'][0],
						  'android_stream' =>$church_detail['android'][0],
						  'blackberry_stream' =>$church_detail['blackberry'][0],
						  'stream_url' =>$church_detail['stream_url'][0],
						  'file_stream' =>$church_detail['file_stream'][0],
						  'is_active'=>$is_active,
						  'is_cell_leader'=>$is_cell_leader,
						  'is_fsch_student'=>$is_fsch_student,
						  'completed_fsch'=>$completed_fsch,
						  'current_fsch_class'=>$current_fsch_class,
						  'cell_id'=>$cell_id,
						  'my_cell_id'=>$my_cell_id,
						  'cell_name'=>$cell_name,
						  'is_cell_member'=>$is_cell_member,
						  'total_soulswon'=>$int_soulswon,
						  'total_scall_invites'=>$int_scall_invites,
						  'session_id'=>misc::random_string('alnum',30));
		
		$this->session->set_userdata($page_res);
		
	}//end function
}//end class