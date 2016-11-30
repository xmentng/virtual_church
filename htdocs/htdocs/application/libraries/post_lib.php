<?php

class Post_lib {

function __construct(){
	
}//end function
function save_to_vod_schema($detail){
	
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('video_name'), $tblname='tbl_videos', $where = array('video_name'=>$detail['video_name']));
	
	#echo $flag_exist; exit;

	if($flag_exist=='no'){
		
		$flag_inserted = mysql::insert($detail, 'tbl_videos');
		
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
		
	}
	
	if($flag_exist=='yes'){
		return 2;
	}

	
}//end function

function save_to_online_giving($detail){
	
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('user_account', 'TransactionRef'), $tblname='online_church_giving', $where = array('user_account'=>$detail['user_account'], 'TransactionRef'=>$detail['TransactionRef']));
	
	#echo $flag_exist; exit;

	if($flag_exist=='no'){
		
		$flag_inserted = mysql::insert($detail, 'online_church_giving');
		
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
		
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
	
	
}//end function
function save_to_testimony_schema($detail){
	
	$flag_inserted = mysql::insert($detail, 'tbl_testimonies');
		
	if($flag_inserted):
		return 1;
	endif;
	
	if(!$flag_inserted):
		return 0;
	endif;
	
}//end function

function save_to_cell_members_cell($detail){
	
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'church_id','cell_member_id'), $tblname='tbl_cell_members_cell', $where = array('church_id'=>$detail['church_id'], 'cell_member_id'=>$detail['cell_member_id']));
	//echo json_encode(array('status'=>false,'error'=>$flag_exist); exit;
	echo $flag_exist; exit;

	if($flag_exist=='no'){
		
		$flag_inserted = mysql::insert($detail, 'tbl_cell_members_cell');
		
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
		
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
	
}//end function

function save_to_salvation_call($detail){
	
	$flag_inserted = mysql::insert($detail, 'tbl_call_to_salvation');
		
	if($flag_inserted):
		return 1;
	endif;
	
	if(!$flag_inserted):
		return 0;
	endif;
	
}//end fnction

function save_to_cell_leaders($detail){
	
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'church_id','cell_leader_email', 'cell_leader_id'), $tblname='tbl_cell_leaders', $where = array('church_id'=>$detail['church_id'], 'cell_leader_email'=>$detail['cell_leader_email'], 'cell_leader_id'=>$detail['cell_leader_id']));
	
	#echo $flag_exist; exit;

	if($flag_exist=='no'){
		
		$flag_inserted = mysql::insert($detail, 'tbl_cell_leaders');
		
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
		
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
	
	
}//end function

function save_to_church_cell($detail){
	
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'church_id','cell_name'), $tblname='tbl_cells', $where = array('church_id'=>$detail['church_id'], 'cell_name'=>$detail['cell_name']));
	
	#echo $flag_exist; exit;

	if($flag_exist=='no'){
		
		$flag_inserted = mysql::insert($detail, 'tbl_cells');
		
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
		
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
	
	
}//end function

function save_to_service_comment($detail){
	
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	/*$flag_exist = useraccount::record_exist($attributes=array('id', 'service_theme','invite_email','invite_password'), $tblname='tbl_church_service_invites', $where = array('invite_email'=>$detail['invite_email'], 'service_theme'=>$detail['service_theme']));*/
	
	#echo $flag_exist; exit;

	/*if($flag_exist=='no'){
		
		
		
	}
	
	if($flag_exist=='yes'){
		return 2;
	}*/
	
	
	$flag_inserted = mysql::insert($detail, 'tbl_service_blog_comments');
		
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	
}//end function

function save_invite_inputs($detail){
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'service_theme','invite_email','invite_password'), $tblname='tbl_church_service_invites', $where = array('invite_email'=>$detail['invite_email']));
	
	#echo $flag_exist; exit;

	if($flag_exist=='no'){
		
		$flag_inserted = mysql::insert($detail, 'tbl_church_service_invites');
		
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
		
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
	
		
}//end function

function save_notice_board_content_inputted($detail){
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'church_id','status','notice_board_content'), $tblname='tbl_churches_notice_board_contents', $where = array('notice_board_content'=>$detail['notice_board_content'], 'church_id'=>$detail['church_id']));
	
	#echo $flag_exist; exit;

	if($flag_exist=='no'){
		
		$detail['status'] = 1;
		$flag_inserted = mysql::insert($detail, 'tbl_churches_notice_board_contents');
		
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
}//end function

function save_help_lines_inputted($detail){
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'church_id','status','help_line'), $tblname='help_lines', $where = array('help_line'=>$detail['help_line'], 'church_id'=>$detail['church_id']));
	
	#echo $flag_exist; exit;

	if($flag_exist=='no'){
		
		$detail['status'] = 1;
		$flag_inserted = mysql::insert($detail, 'help_lines');
		

		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
}//end function

function save_church_user_account($detail){
	$flag_exist = '';
	//$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'user_name','status','church_id'), $tblname='tbl_users', $where = array('user_name'=>$detail['user_name'], 'church_id'=>$detail['church_id']));

	if($flag_exist=='no'){
		
		$detail['status'] = 1;
		$flag_inserted = mysql::insert($detail, 'tbl_users');
		

		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
}//end function

function save_church_created_in_tblusers($detail){
	
	$flag_exist = '';
	$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'user_name','status','church_id'), $tblname='tbl_users', $where = array('user_name'=>$user_name, 'church_id'=>$detail['church_id']));

	if($flag_exist=='no'){
		
		$detail['status'] = 1;
		$flag_inserted = mysql::insert($detail, 'tbl_users');
		

		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
}//end function

function save_church_created($detail){
	
	$flag_exist = '';
	$user_name = $this->session->userdata('user_name');
	
	$flag_exist = useraccount::record_exist($attributes=array('id', 'church_name','status'), $tblname='tbl_churches', $where = array('church_name'=>$detail['church_name'], 'status'=>1));

	if($flag_exist=='no'){
		
		$detail['status'] = 1;
		$flag_inserted = mysql::insert($detail, 'tbl_churches');
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
}//end function
function save_qued_message($detail){
	
	$flag_exist = '';
	$flag_exist = useraccount::checkforDuplicate($attributes=array('account_id', 'message','active'), $tblname='sms_messages', $where = array('account_id'=>$detail['account_id'], 'message'=>$detail['message'],'active'=>1));

	if($flag_exist=='no'){
		
		$detail['active'] = 1;
		$flag_inserted = mysql::insert($detail, 'sms_messages');
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
	
}//end function



function save_dispatched_single_messaging($detail){
	$flag_exist = '';
	$flag_exist = useraccount::checkforDuplicate($attributes=array('account_id', 'message','active'), $tblname='sms_dispatches', $where = array('account_id'=>$detail['account_id'], 'message'=>$detail['message'],'active'=>1));

	if($flag_exist=='no'){
		
		$detail['active'] = 1;
		$flag_inserted = mysql::insert($detail, 'sms_dispatches');
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	}
	
	if($flag_exist=='yes'){
		#return 2;
		$flag_inserted = mysql::insert($detail, 'sms_dispatches');
		return 1;
	}
}//end function

function save_operator_to_gateway_info($detail){
	#lets check for duplicacy
	$flag_exist = '';
	$flag_exist = useraccount::checkforDuplicate($attributes=array('account_id', 'country_code','gsm_operator_name','gateway_provider_name'), $tblname='sms_gsm_operators_to_gateways', $where = array('account_id'=>$detail['account_id'], 'country_code'=>$detail['country_code'],'gsm_operator_name'=>$detail['gsm_operator_name']));

	if($flag_exist=='no'){
		
		$flag_inserted = mysql::insert($detail, 'sms_gsm_operators_to_gateways');
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	}
	
	if($flag_exist=='yes'){
		return 2;
	}
	
	
	
	
}#end function
////////////////////////////////////////////////////////////////////////////
function save_purchased_sms($detail){
	#lets check for duplicacy
	$flag_exist = '';
	$flag_exist = useraccount::checkforDuplicate($attributes=array('id', 'account_id', 'bank_teller_no','active'), $tblname='sms_purchases', $where = array('account_id'=>$_SESSION['account_id'], 'active'=>1,'bank_teller_no'=>$detail['bank_teller_no']));
	
	if($flag_exist=='no'):
		$detail['active'] = 1;
		#lets check if the account_no and account name entered are the same
		$flag_isvalid = useraccount::is_exist($attributes=array('id', 'bank_account_no', 'active'), $tblname='sms_bank_accounts', $where=array('bank_account_no'=>$detail['bank_account_no'], 'active'=>1));
		
		if($flag_isvalid){
			$flag_inserted = mysql::insert($detail, 'sms_purchases');
			if($flag_inserted):
				return 1;
			endif;
			
			if(!$flag_inserted):
				return 0;
			endif;
		}else{
			$flag_exist = 10;
			return $flag_exist;
		}

	endif;
	
	if($flag_exist=='yes'):
		return 2;
	endif;
	
	
}//end function

#-----------------------------------------------------------------------------------------------------------------
function save_data_into_client_transaction($detail){

		$flag_inserted = mysql::insert($detail, 'sms_client_transactions');
		if($flag_inserted):
			return 1;
		endif;
		
		if(!$flag_inserted):
			return 0;
		endif;
	/*}else{
		return 2;
	}*/
}//end function
#-----------------------------------------------------------------------------------------------------------------


function update_vehicle_category($detail, $data){
	$flag_updated = mysql::update($tblname='vehicle_categories', $detail, $where = array('id'=>$data['vid']) );
	
	if($flag_updated){
		return 1;
	}else{
		return 0;
	}
}//end function


//////////////////////////////////////////////////////////////////////////////////////////////////////////
	

}//end class



