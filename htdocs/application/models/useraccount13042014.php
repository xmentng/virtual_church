<?php

class useraccount extends CI_Model {
	
private $_userTable = "tbl_users";
function __construct(){

  parent::__construct();
  $this->load->library(array('sessiondata'));
  
}//end function

function getUserLoginDetails($sql){

	$resid = mysql::query($sql);
  
  if(mysql::size($resid) > 0){
	
	   for($a=0;$a < mysql::size($resid);$a++):
			  $row = mysql::fetch($resid);
			  for($i=0; $i<mysql_num_fields($resid); $i++){
				  $arr[$i][$a] = $row[$i];			
			  }
			  $arr['id'][] = (int)$row['id'];
			  $arr['first_name'][]= @$row['first_name'];
			  $arr['last_name'][]= @$row['last_name'];
			  $arr['email'][]= @$row['email'];
			  $arr['user_name'][]= @$row['user_name'];
			  $arr['user_pwd'][]= @$row['user_pwd'];
			  $arr['access_level_id'][]= @$row['access_level_id'];
			  $arr['church_id'][]= @$row['church_id'];
			  $arr['date_created'][]= @$row['date_created'];
			  $arr['date_modified'][]= @$row['date_modified'];	  
			  $arr['status'][]= @$row['status'];

	  endfor;
	  return $arr;
  
  }//end if	
}//end function

 function loadUserInfo($userID,$arrDetails){
            /* load user details
            */
            $cond=''; 
            if(is_array($userID)){
                foreach ($userID as $key => $value) {
                     $cond .= MySQL::SQLValue($value,'text').',';
                }
                //remove trailing comma
                $cond = rtrim($cond,',');

            }
            else{
                $cond = MySQL::SQLValue($userID,'text');
            }
            $details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
            $sql = "select $details from ".$this->_userTable." where userID IN ($cond)";
       
            $res = $this->mysql->query($sql);  
            if($this->mysql->size($res)<1){
                return false;
            }
            else{
                if(is_array($arrDetails)){
                    for($a=0;$a<$this->mysql->size($res);$a++){
                        $row = $this->mysql->fetch($res);
                        for($i=0;$i<count($arrDetails);$i++){
                            $arr[$arrDetails[$i]][$a] = $row[$arrDetails[$i]];
                        }
                    }
                    return $arr;
                }
                $row = $this->mysql->fetch($res);
                return $row[$arrDetails];
    
            }
        
        
        } ///
		
 function 	redirect_non_cellleader(){
	 
	 $logged_in_account = $this->session->userdata('user_name');
			
	$sql = "SELECT * FROM tbl_users WHERE user_name=\"$logged_in_account\" AND is_cell_leader='1' LIMIT 1";
				
	$resid = $this->mysql->query($sql);
				
	if( $this->mysql->size($resid) > 0 ){
		return;
	}//ens if
	else{
		header('Location: /auth/logout');
	}//end else
	 
 }//end function
		
 function redirect_not_churchadmin(){

	$logged_in_account = $this->session->userdata('user_name');
			
	$sql = "SELECT * FROM tbl_churches WHERE user_name=\"$logged_in_account\" AND status='1' LIMIT 1";
				
	$resid = $this->mysql->query($sql);
				
	if( $this->mysql->size($resid) > 0 ){
		return;
	}//ens if
	else{
		header('Location: /auth/logout');
	}//end else

} //end function

function redirect_not_cell_leader(){
	
	global $page_res;
	sessiondata::general_page_resource();
	//echo $page_res['is_cell_leader']; exit;
	if($page_res['is_cell_leader']==0){
		header('Location: /auth/logout');
	}
}//end function
 function redirectuser(){
			
			#lets check if this user is an admin / super user
			
				$logged_in_account = $this->session->userdata('user_name');
			
				$sql = "SELECT * FROM tbl_users WHERE user_name=\"$logged_in_account\" AND status='1' LIMIT 1";
				
				$resid = $this->mysql->query($sql);
				
				if( $this->mysql->size($resid) > 0 ){
					return;
				}//ens if
				else{
					header('Location: /auth/logout');
				}//end else
			
			
			/*$flag_admin = useraccount::is_admin($param);
			
			
			if($flag_admin):  #if this account_name exist in the admin schema then
				return;
			endif;*/
			
			
			/*if(!$flag_admin):
			
			
			endif;	*/
	}//end function

function _isAccountConfigured($userName){
          ///check if an account has been configured...usually called after loggin in
          //assemble an SQL query
          $sql = "SELECT acctStatus FROM ".$this->_userTable." WHERE userName='$userName' LIMIT 1";
          //run the query
          $res = $this->mysql->query($sql);
          $row = $res->fetch();
          if($row['acctStatus'] == '1'){
              return true;
          }
          else{
              return false;
          }
  
}//end function

function _updateUserAttributes($whereAttr, $setAttr){
	$is_updated = querymanager::update($this->_userTable, $setAttr, $whereAttr);
	if($is_updated){
		return true;
	}else{
		return false;
	}
}//end function


function _configureAccount($userAttr){
     $is_configured = querymanager::insert($userAttr, $this->_userTable);  
	 if($is_configured){
		 return true;
	 }else{
		return false;	 
	 }
}//end function

function load_user_attributes(){
  $sql = "SELECT * FROM ".$this->_userTable;
  $resid = querymanager::query($sql);
  
  if(querymanager::size($resid) > 0){
	  $row = querymanager::fetch_object($resid);
	  return $arr;
  
  }//end if	
}//end function



function loadTotalRecord($fld, $tblname){

	$sql = "SELECT count($fld) as total FROM ".$tblname;
	$resid = $this->querymanager->query($sql);
	if($this->querymanager->size($resid) > 0){
	
		$row = $this->querymanager->fetch($resid);
		return (int)$row['total'];
		
	}else{
		return 0;	
		
	}
}//end function

function loadTotalRefRecord($where, $fld, $tblname){
	if(is_array($where)){
	  $sql = "SELECT count($fld) as total FROM ".$tblname." WHERE ";
	  foreach( $where as $field => $value ):
		  $sql .= $field."=\"$value\" AND ";
	  endforeach;
	  $sql = rtrim($sql, " AND ");
	  
	  $resid = $this->querymanager->query($sql);
	  if($this->querymanager->size($resid) > 0){
	  
		  $row = $this->querymanager->fetch($resid);
		  return (int)$row['total'];
		  
	  }else{
		  return 0;	
		  
	  }
	}//end if the where parameter is an array
}//end function


function get_total_tithe($p, $p1){
	
	$sql = "SELECT SUM(amount) AS total FROM online_church_giving WHERE user_account='$p' AND category_code='$p1'";
	
	$res_id = mysql::query($sql);
	
	if(mysql::size($res_id) > 0 ){
		$rs = mysql::fetch($res_id);
		return intval($rs['total']);
	}else{
		return 0;	
	}
	
}//end function

function get_ref_giving($p, $p1){
	
	$sql = "SELECT SUM(amount) AS total FROM online_church_giving WHERE user_account='$p' AND category_code='$p1'";
	
	$res_id = mysql::query($sql);
	
	if(mysql::size($res_id) > 0 ){
		$rs = mysql::fetch($res_id);
		return intval($rs['total']);
	}else{
		return 0;	
	}
	
}//end function


function get_total_giving($p){
	
	$sql = "SELECT SUM(amount) AS total FROM online_church_giving WHERE user_account='$p'";
	
	$res_id = mysql::query($sql);
	
	if(mysql::size($res_id) > 0 ){
		$rs = mysql::fetch($res_id);
		return intval($rs['total']);
	}else{
		return 0;	
	}
}//end function


function checkforDuplicate($tblname, $detail, $where){
			
			if(is_array($detail)){
			
			$sql = "SELECT ";
			
			foreach($detail as $fld):
				$sql .= $fld.", ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .=" FROM ".$tblname." WHERE ";
			
			foreach($where as $fld2 => $val2):
				$sql .= $fld2."=\"$val2\" AND ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-5);
	
			$resid = querymanager::query($sql);
		
			if(querymanager::size($resid) > 0 ){
				
				return true;
				
			}else{
				
				return false;
			}
		}// end if
				
			
			
}//end function


function loadChurchesOnline(){
	
	$sql = "SELECT church_id, is_online FROM tbl_users WHERE is_online='1' AND status='1' GROUP BY church_id ";
  	$resid = querymanager::query($sql);
	if(mysql::size($resid) > 0){
	
	   for($a=0;$a < mysql::size($resid);$a++):
			  $row = mysql::fetch($resid);
			  for($i=0; $i<mysql_num_fields($resid); $i++){
				  $arr[$i][$a] = $row[$i];			
			  }
			 // $arr['id'][] = (int)$row['id'];
			  /*$arr['first_name'][]= @$row['first_name'];
			  $arr['last_name'][]= @$row['last_name'];
			  $arr['email'][]= @$row['email'];
			  $arr['user_name'][]= @$row['user_name'];
			  $arr['user_pwd'][]= @$row['user_pwd'];
			  $arr['access_level_id'][]= @$row['access_level_id'];*/
			/*  $arr['church_id'][]= @$row['church_id'];
			  $arr['date_created'][]= @$row['date_created'];
			  $arr['date_modified'][]= @$row['date_modified'];*/
			  $arr['church_id'][]= @$row['church_id'];
			  $arr['is_online'][]= @$row['is_online'];	  
			 /* $arr['status'][]= @$row['status'];*/

	  endfor;
	  return $arr;
  
  }//end if	
	
	
	
	
	
}//end function
function getUsersWithUserName($param){

	$sql = "select * from tbl_users where user_name LIKE '%$param%' ";
	$resid = mysql::query($sql);
	
	//echo mysql::size($resid) ; exit;
	
	if( mysql::size($resid) > 0){
	
		for($a=0;$a < mysql::size($resid);$a++):
			  $row = mysql::fetch($resid);
			  for($i=0; $i<mysql_num_fields($resid); $i++){
				  $arr[$i][$a] = $row[$i];			
			  }
			  $arr['id'][] = (int)$row['id'];
			  $arr['first_name'][]= @$row['first_name'];
			  $arr['last_name'][]= @$row['last_name'];
			  $arr['email'][]= @$row['email'];
			  $arr['user_name'][]= @$row['user_name'];
			  $arr['user_pwd'][]= @$row['user_pwd'];
			  $arr['access_level_id'][]= @$row['access_level_id'];
			  $arr['church_id'][]= @$row['church_id'];
			  $arr['date_created'][]= @$row['date_created'];
			  $arr['date_modified'][]= @$row['date_modified'];	  
			  $arr['status'][]= @$row['status'];
			  $arr['profile_pic'][]= @$row['profile_pic'];

	  endfor;
	  return $arr;
		
	}else{
		return false;
		
		}

}//end function
function loadRefUser($id, $tblname){
	
  
  $sql = "SELECT * FROM $tblname WHERE id=\"$id\" LIMIT 1 ";
  $resid = querymanager::query($sql);
  
  if(querymanager::size($resid) > 0){
	
	   for($a=0;$a < querymanager::size($resid);$a++):
			  $row = querymanager::fetch($resid);
			  for($i=0; $i<mysql_num_fields($resid); $i++){
				  $arr[$i][$a] = $row[$i];			
			  }
			  $arr['id'][] = (int)$row['id'];
			  $arr['first_name'][]= @$row['first_name'];
			  $arr['last_name'][]= @$row['last_name'];
			  $arr['email'][]= @$row['email'];
			  $arr['user_name'][]= @$row['user_name'];
			  $arr['user_pwd'][]= @$row['user_pwd'];
			  $arr['access_level_id'][]= @$row['access_level_id'];
			  $arr['church_id'][]= @$row['church_id'];
			  $arr['date_created'][]= @$row['date_created'];
			  $arr['date_modified'][]= @$row['date_modified'];	  
			  $arr['status'][]= @$row['status'];

	  endfor;
	  return $arr;
  
  }//end if	
}//end function

function loadRefChurch($id, $tblname){
  $sql = "SELECT * FROM $tblname WHERE id=\"$id\" LIMIT 1 ";
  $resid = querymanager::query($sql);
  
  if($this->mysql->size($resid) > 0){
		 while($row = mysql_fetch_object($resid)){
			 $arr['id'][] = (int)$row->id;
			 $arr['church_name'][] = $row->church_name;
			 $arr['stream_url'][] = $row->stream_url;
			 $arr['ipad'][] = $row->ipad;
			 $arr['blackberry'][] = $row->blackberry;
			 $arr['android'][] = $row->android;
			 $arr['news'][] = strip_tags($row->news);
			 $arr['title'][] = strip_tags($row->title);
			 $arr['file_stream'][] = strip_tags($row->file_stream);
			 $arr['status'][] = $row->status;
			 $arr['created_by'][] = $row->created_by;
		 }
	
		 return $arr;
	 }//end if;
}//end function

function get_ref_adminuser_detail($filter, $tblname){
	if(is_array($filter)){
	  $sql = "SELECT * FROM ".$tblname." WHERE ";
	  foreach( $filter as $field => $value ):
		  $sql .= $field."=\"$value\" AND ";
	  endforeach;
	  $sql = rtrim($sql, " AND ");
	  
	  $resid = $this->mysql->query($sql);
	  if($this->mysql->size($resid) > 0){
	  
		  while($row = $this->mysql->fetch_object($resid)){
			  
			  $arr['id'][] = intval($row->id);
			  $arr['first_name'][]= $row->first_name;
			  $arr['last_name'][]= $row->last_name;
			  $arr['email'][]= $row->email;
			  $arr['user_name'][]= $row->user_name;
			  $arr['user_pwd'][]= $row->user_pwd;
			  $arr['access_level_id'][]= intval($row->access_level_id);
			  $arr['church_id'][]= intval($row->church_id);
			  $arr['date_created'][]= $row->date_created;
			  $arr['date_modified'][]= $row->date_modified;	  
			  $arr['status'][]= intval($row->status);

		  }//end while loop
			return $arr;
	  }else{
		  return false;	
		  
	  }
	}//end if the where parameter is an array
}//end function


function send_tract_to_recipient($detail, $page_res){
	
		global $page_res;
		sessiondata::general_page_resource();
		
		$this->load->library('email');  //load email library
		$config['mailtype'] = 'html';
					
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);
		
		$this->email->from($page_res['email'], 'Special Greetings');
					
		$this->email->to($detail['recipient_email']); 
		#$config['mailtype'] = 'html'; 
		$this->email->subject("Special Greetings");
		
		
		$body = $this->misc->parse(file_get_contents('./email_templates/send_tract_mail.php'),array('RECIPIENT_NAME'=>$detail['recipient_name'], 'TRACT_PATH'=>$detail['tract_src'], 'SENDER_NAME'=>$page_res['name_of_user']));
					
		//echo $body;
	
		$this->email->message($body);
		
		//finally send the mail
		$this->email->send();
		
		return array('status'=>true); 
	
}//end function

function send_church_meeting_note_mail($page_res, $note, $meeting_date){
	
		$this->load->library('email');  //load email library
		$config['mailtype'] = 'html';
					
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);
		
		$this->email->from($page_res['email'], 'Cell Meeting Note');
					
		$this->email->to($page_res['email']); 
		#$config['mailtype'] = 'html'; 
		$this->email->subject("Cell Meeting Note");
		
		
		$body = $this->misc->parse(file_get_contents('./email_templates/church_service_note_mail.php'),array('USER_ACCOUNT_NAME'=>$page_res['name_of_user'], 'CHURCH_SERVICE_DATE'=>date("Fj, Y  h:i:s A", $meeting_date), 'CHURCH_SERVICE_NOTE'=>$note));
					
		//echo $body; exit;
	
		$this->email->message($body);
		
		//finally send the mail
		$this->email->send();
		return array('status'=>true); 
	
}//end function

function send_cell_meeting_note_mail($page_res, $note, $meeting_date){
	
		$this->load->library('email');  //load email library
		$config['mailtype'] = 'html';
					
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);
		
		$this->email->from($page_res['email'], 'Cell Meeting Note');
					
		$this->email->to($page_res['email']); 
		#$config['mailtype'] = 'html'; 
		$this->email->subject("Cell Meeting Note");
		
		
		$body = $this->misc->parse(file_get_contents('./email_templates/cell_meeting_note_mail.php'),array('USER_ACCOUNT_NAME'=>$page_res['name_of_user'], 'CELL_MEETING_DATE'=>date("Fj, Y  h:i:s A", $meeting_date), 'CELL_MEETING_NOTE'=>$note));
					
		//echo $body; exit;
	
		$this->email->message($body);
		
		//finally send the mail
		$this->email->send();
		return array('status'=>true); 
	
	
}//end function

function dispatch_suggestion_mail($page_res, $msg){
	
		$cl_name = $page_res['name_of_user'];
		
		//echo $cl_name; exit;
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
					
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);
		
		$this->email->from($page_res['email'], 'Suggestion');
					
		$this->email->to("support@virtualchurch.org"); 
		#$config['mailtype'] = 'html'; 
		$this->email->subject("Suggestion");
		
		$body = $this->misc->parse(file_get_contents('./email_templates/suggestion_mail.php'),array('FEED_BACK'=>$msg, 'USER_NAME'=>$page_res['name_of_user'], 'CHURCH_NAME'=>$page_res['church_name']));
					
		//echo $body; exit;
	
		$this->email->message($body);
		
		//finally send the mail
		$this->email->send();
		return array('status'=>true); 
		
		
}//end function
function dispatch_feedback_mail($page_res, $msg){
	
		$cl_name = $page_res['name_of_user'];
		
		//echo $cl_name; exit;
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
					
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);
		
		$this->email->from($page_res['email'], 'Feedback');
					
		$this->email->to("support@virtualchurch.org"); 
		#$config['mailtype'] = 'html'; 
		$this->email->subject("Feedback");
		
		$body = $this->misc->parse(file_get_contents('./email_templates/feedback_mail.php'),array('FEED_BACK'=>$msg, 'USER_NAME'=>$page_res['name_of_user']));
					
		//echo $body; exit;
	
		$this->email->message($body);
		
		//finally send the mail
		$this->email->send();
		return array('status'=>true); 
		
	
}//end function

function dispatch_cell_membership_mail($detail, $tblname){
	
	$cell_id = $detail['cell_id'];
	$cell_member_id = $detail['cell_member_id'];
	
	$sql = "SELECT * FROM tbl_cell_leaders WHERE cell_id=\"$cell_id\" LIMIT 1 ";
    $resid = $this->mysql->query($sql);
	
	$sql2 = "SELECT * FROM $tblname WHERE id=\"$cell_member_id\" LIMIT 1 ";
	$resid2 = $this->mysql->query($sql2);
	
	$row2 = $this->mysql->fetch($resid2);
	
	$cm_name = $row2['first_name']." ".$row2['last_name'];
	$cm_email = $row2['email'];
	
	//echo $cm_name; exit;
	
	if($this->mysql->size($resid)<1){
        return array('status'=>false,'error'=>'Unknown user');
    }else{
		$row = $this->mysql->fetch($resid);
		
		$cl_name = $row['cell_leader_name'];
		
		//echo $cl_name; exit;
		
		$this->load->library('email');
		$config['mailtype'] = 'html';
					
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);
		
		$this->email->from($row2['email'], 'Cell Membership');
					
		$this->email->to($row['cell_leader_email']); 
		#$config['mailtype'] = 'html'; 
		$this->email->subject("New Membership.");
		
		$body = $this->misc->parse(file_get_contents('./email_templates/cell_membership_mail.php'),array('CELL_LEADER_NAME'=>$cl_name,'CELL_MEMBER_NAME'=>$cm_name));
					
		//echo $body; exit;
	
		$this->email->message($body);
		
		//finally send the mail
		$this->email->send();
		return array('status'=>true); 
		
		
	}//end else
	
}//end function

function dispatch_salvation_call_mail($detail, $tblname, $id){
	
				$userID = $detail['user_id'];
				$sql = "SELECT * FROM ".$tblname." WHERE id=\"$userID\" LIMIT 1";
            	$resid = $this->mysql->query($sql);
				
				if($this->mysql->size($resid)<1){
                	return array('status'=>false,'error'=>'Unknown user');
           		 }else{
					$row = $this->mysql->fetch($resid);
					
					//$config['mailtype'] = 'html';
					
					//$this->email->set_mailtype("html");
					
					$this->load->library('email');
					$config['mailtype'] = 'html';
					
					$email_setting  = array('mailtype'=>'html');
					$this->email->initialize($email_setting);
					
					
					$this->email->from($row['email'], 'Call To Salvation');
					
					$this->email->to($detail['invite_email']); 
					#$config['mailtype'] = 'html'; 
					$this->email->subject("Call to Salvation.");
		
					$body = $this->misc->parse(file_get_contents('./email_templates/salvation_call_mail.php'),array('NAME'=>$detail['invite_name'],'ACTIVATEURL'=>$detail['salvation_call_url'], 'USER_ID'=>$detail['user_id']));
					
					//echo $body; exit;
				
					$this->email->message($body);
					
					//finally send the mail
					$this->email->send();
					return array('status'=>true); 
					
				 }
	
}//end function

function dispatch_cellleaders_appointed_mail($detail, $tblname){
	
				$userID = $detail['cell_leader_id'];
				$sql = "SELECT * FROM ".$tblname." WHERE user_name=\"$userID\" LIMIT 1";
            	$resid = $this->mysql->query($sql);
				
				if($this->mysql->size($resid)<1){
                	return array('status'=>false,'error'=>'Unknown user');
           		 }else{
					$row = $this->mysql->fetch($resid);
					
					//$config['mailtype'] = 'html';
					
					//$this->email->set_mailtype("html");
					
					$this->load->library('email');
					$config['mailtype'] = 'html';
					
					$email_setting  = array('mailtype'=>'html');
					$this->email->initialize($email_setting);
					
					$this->email->from('noreply@christembassy.org', 'Christ Embassy Virtual Church');
					
					$this->email->to($row['email']); 
					#$config['mailtype'] = 'html'; 
					$this->email->subject("Your Virtual Church Cell Leader's Account Details.");
					//generate the activation link
					$activationUrl = "cellleaders.virtualchurch.org";
					
					$body = $this->misc->parse(file_get_contents('./email_templates/cell_leader_creation_mail.php'),array('NAME'=>$row['first_name'],'USER_NAME'=>$row['user_name'],'PASSWORD'=>$row['user_pwd'],'ACTIVATEURL'=>$activationUrl));
					
					
					//echo $body;
				
					$this->email->message($body);
					
					//finally send the mail
					$this->email->send();
					return array('status'=>true); 
					
				 }
	
}//end function
function dispatchActivationMail($detail, $tblname){
     
                 ///load the email library
				$userID = $detail['user_name'];
				$sql = "SELECT * FROM ".$tblname." WHERE user_name=\"$userID\" LIMIT 1";
            	$resid = $this->mysql->query($sql);
				
				if($this->mysql->size($resid)<1){
                	return array('status'=>false,'error'=>'Unknown user');
           		 }else{
					$row = $this->mysql->fetch($resid);
					
					
					
					//$this->email->set_mailtype("html");
					
					$this->load->library('email');
					$config['mailtype'] = 'html';
					
					$email_setting  = array('mailtype'=>'html');
					$this->email->initialize($email_setting);
					
					$this->email->from('noreply@christembassy.org', 'Christ Embassy Live Streaming');
					$this->email->to($row['email']); 
					#$config['mailtype'] = 'html'; 
					$this->email->subject('Your Christ Embassy Live Streaming Admin Account Details.');
					//generate the activation link
					#$activationUrl = base_url().'auth/activate/'.(int)$row['id'].'/?ref=notification';
					#$body = $this->misc->parse(file_get_contents('./email_templates/account.php'),array('NAME'=>$row['first_name'],'USER_NAME'=>$row['user_name'],'PASSWORD'=>$row['user_pwd'],'ACTIVATEURL'=>$activationUrl));
					
					$body = $this->misc->parse(file_get_contents('./email_templates/account.php'),array('NAME'=>$row['first_name'],'USER_NAME'=>$row['user_name'],'PASSWORD'=>$row['user_pwd']));
					
					
					
					//echo $body; exit;
				
					$this->email->message($body);
					
					//finally send the mail
					$this->email->send();
					return array('status'=>true); 
				 }

 }//end function
 
 function dispatch_registration_link_mail($detail,$arrMoreInfo=NULL, $tblname){
	 
			global $page_res;
			sessiondata::general_page_resource();
			
			
			$userID = $detail['invite_password']; 
			$sql = "SELECT * FROM ".$tblname." WHERE invite_password=\"$userID\"  LIMIT 1";
            $resid = $this->mysql->query($sql);
				
            if($this->mysql->size($resid)<1){
                return array('status'=>false,'error'=>'Unknown user');
            }
            else{
                $row = $this->mysql->fetch($resid);
                 ///load the email library
                $this->load->library('email');
				$config['mailtype'] = 'html';
				
				$email_setting  = array('mailtype'=>'html');
				$this->email->initialize($email_setting);
				
                $this->email->from($detail['msg_from'], $detail['msg_from']);
                $this->email->to($row['invite_email']); 
                // var_dump($arrMoreInfo['additionalEmailAddress']);exit;  
                if(is_array($arrMoreInfo['additionalEmailAddress'])){
                    
                   $this->email->cc($arrMoreInfo['additionalEmailAddress']);  
                }
				
				//$this->email->set_mailtype("html");
                
                $this->email->subject($detail['msg_title']);
                
                
                $body = $this->misc->parse(file_get_contents('./email_templates/invite_registration_mail.php'),array('LASTNAME'=>$row['invite_first_name'],'EMAIL'=>$row['invite_email'],'PASSWORD'=>$row['invite_password'], 'INVITE_LINK'=>$row['invite_link'], 'CHURCHNAME'=>$page_res['church_name']));
				
				//echo $body; exit;

                $this->email->message($body);    
                //finally send the mail
                $this->email->send();
                return array('status'=>true); 
            }
			
 }//end function
 
 
  function dispatch_password_recovery_mail($detail,$arrMoreInfo=NULL, $tblname){
	 
	 $userID = $detail['email']; 
			$sql = "SELECT * FROM ".$tblname." WHERE email=\"$userID\"  LIMIT 1";
            $resid = $this->mysql->query($sql);
				
            if($this->mysql->size($resid)<1){
                return array('status'=>false,'error'=>'Unknown user');
            }
            else{
                $row = $this->mysql->fetch($resid);
                 ///load the email library
                $this->load->library('email');
				$config['mailtype'] = 'html';
				
				$email_setting  = array('mailtype'=>'html');
				$this->email->initialize($email_setting);
				
                $this->email->from('noreply@christembassy.org', 'Christ Embassy Online');
                $this->email->to($row['email']); 
                // var_dump($arrMoreInfo['additionalEmailAddress']);exit;  
                if(is_array($arrMoreInfo['additionalEmailAddress'])){
                    
                   $this->email->cc($arrMoreInfo['additionalEmailAddress']);  
                }
				
				//$this->email->set_mailtype("html");
                
                $this->email->subject('Your Christ Embassy Live Streaming Registration Detail.');
                
                
                $body = $this->misc->parse(file_get_contents('./email_templates/password_recovery_mail.php'),array('NAME'=>$detail['name'],'EMAIL'=>$detail['email'],'PASSWORD'=>$detail['password']));
				
				//echo $body; exit;

                $this->email->message($body);    
                //finally send the mail
                $this->email->send();
                return array('status'=>true); 
            }
		
			
 }//end function
 
 
 function dispatchLoginDetails($detail,$arrMoreInfo=NULL, $tblname){
            $userID = $detail['username']; 
			$sql = "SELECT id, first_name, last_name, username, email, password FROM ".$tblname." WHERE username=\"$userID\"  LIMIT 1";
            $resid = $this->mysql->query($sql);
				
            if($this->mysql->size($resid)<1){
                return array('status'=>false,'error'=>'Unknown user');
            }
            else{
                $row = $this->mysql->fetch($resid);
                 ///load the email library
                $this->load->library('email');
				$config['mailtype'] = 'html';
				
				$email_setting  = array('mailtype'=>'html');
				$this->email->initialize($email_setting);
				
                $this->email->from('noreply@christembassy.org', 'Christ Embassy Online');
                $this->email->to($row['email']); 
                // var_dump($arrMoreInfo['additionalEmailAddress']);exit;  
                if(is_array($arrMoreInfo['additionalEmailAddress'])){
                    
                   $this->email->cc($arrMoreInfo['additionalEmailAddress']);  
                }
                
                $this->email->subject('Your Christ Embassy Live Streaming Portal Details.');
                
                
                $body = $this->misc->parse(file_get_contents('./email_templates/logindetails.php'),array('NAME'=>$row['first_name'],'EMAIL'=>$row['email'],'PASSWORD'=>$row['password']));
                
                $this->email->message($body);    
                //finally send the mail
                $this->email->send();
                return array('status'=>true); 
            }
 }//end function
 
 function loadDetailLikeName($sql){
	 
	 $resid = $this->mysql->query($sql);
	
	if($this->mysql->size($resid) > 0){
		for($a=0;$a < $this->mysql->size($resid);$a++):
			  $row = $this->mysql->fetch($resid);
			  for($i=0; $i<mysql_num_fields($resid); $i++){
				  $arr[$i][$a] = $row[$i];			
			  }
			  $arr['id'][] = intval($row['id']);
			  $arr['first_name'][]= $row['first_name'];
			  $arr['last_name'][]= $row['last_name'];
			  $arr['user_name'][]= $row['user_name'];
			  $arr['user_pwd'][]= $row['user_pwd'];
			  $arr['email'][]= $row['email'];
			  $arr['phone_no'][]= $row['phone_no'];
			  $arr['access_level_id'][]= $row['access_level_id'];
			  $arr['church_id'][]= $row['church_id'];
			  $arr['country'][]= $row['country'];
			  $arr['profile_pic'][]= $row['profile_pic'];
			  $arr['status'][]= $row['status'];
			  $arr['birth_day'][]= $row['birth_day'];
			  $arr['birth_month'][]= $row['birth_month'];
			  $arr['birth_year'][]= $row['birth_year'];
			  $arr['date_created'][]= $row['date_created'];
			 
	  endfor;

	  return $arr;
		
	}//endif
	 
 }//end function

 function loadDetails($tableName,$arrFilter,$arrAttribute,$num=NULL,$orderBy=''){
          //load a complete record  based on filter
          //$tableName => table name
          //$arrFilter => an asociative array of filters..usually in the WHERE clause
          $whereStr = ''; 
          $orderByStr ='';
          $limitStr='';
           if(is_array($arrFilter)){
               foreach($arrFilter as $key=>$value){
                   $whereStr .= "$key='$value' AND ";
               }
               //strip the trailing AND
               $whereStr = rtrim($whereStr,'AND ');
           }
           $attrib = (is_array($arrAttribute))?implode(",",$arrAttribute):$arrAttribute; 
           if($num){
               //add LIMIT portion
               $num = (int)$num;
               $limitStr = " LIMIT $num";
           }
           if(is_array($orderBy)){
                foreach($orderBy as $key=>$value){
                    $orderByStr = " ORDER BY $key $value ";
                }
           }
           $sql = "SELECT [FIELDS] FROM ".$tableName.' WHERE '.$whereStr.$orderByStr.$limitStr;
          // echo $sql;  
           $res = $this->mysql->iQuery($sql,array('FIELDS'=>$attrib));
           if($res->size() <1){
            return false;
        }
        else{
            if(is_array($arrAttribute)){
                for($a=0;$a<$res->size();$a++){
                    $row = $res->fetch();
                    for($i=0;$i<count($arrAttribute);$i++){
                        $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                    }
                }
                return $arr;
            }
            $row = $res->fetch();
            return $row[$arrAttribute];
    
        }
 }//end function
 
 
function loadDetailsAndPaginate($tableName,$arrFilter,$arrAttribute,$num,$orderBy=''){
          //load a complete record  based on filter
          //$tableName => table name
          //$arrFilter => an asociative array of filters..usually in the WHERE clause
          $whereStr = ''; 
          $orderByStr ='';
          $limitStr='';
		  $sql = "";
           
           $attrib = (is_array($arrAttribute))?implode(",",$arrAttribute):$arrAttribute; 
           if(is_numeric($num)){
               //add LIMIT portion
               $num = (int)$num;
               $limitStr = " LIMIT $num";
           }else{
			   $limitStr = " LIMIT $num";
		   }
           if(is_array($orderBy)){
                foreach($orderBy as $key=>$value){
                    $orderByStr = " ORDER BY $key $value ";
                }
           }
		   if(is_array($arrFilter)){
               foreach($arrFilter as $key=>$value){
                   $whereStr .= "$key='$value' AND ";
               }
               //strip the trailing AND
               $whereStr = rtrim($whereStr,'AND ');
			   $sql = "SELECT [FIELDS] FROM ".$tableName.' WHERE '.$whereStr.$orderByStr.$limitStr;
           }else{
			   $sql = "SELECT [FIELDS] FROM ".$tableName." ".$orderByStr.$limitStr;
		   }
           
          // echo $sql;  
           $res = $this->mysql->iQuery($sql,array('FIELDS'=>$attrib));
           if($res->size() <1){
            return false;
        }
        else{
            if(is_array($arrAttribute)){
                for($a=0;$a<$res->size();$a++){
                    $row = $res->fetch();
                    for($i=0;$i<count($arrAttribute);$i++){
                        $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                    }
                }
                return $arr;
            }
            $row = $res->fetch();
            return $row[$arrAttribute];
    
        }
 }//end function
 
 
 function load_church_accounts($offset, $limit){
	 
	 $sql = "SELECT * FROM tbl_churches LIMIT $offset, $limit";

	 $resid = $this->mysql->query($sql);
	 
	 if($this->mysql->size($resid) > 0){
		 while($row = mysql_fetch_object($resid)){
			 $arr['id'][] = (int)$row->id;
			 $arr['user_name'][] = $this->misc->cleanUserName($row->user_name);
			 $arr['password'][] = $row->password;
			 $arr['email'][] = $this->misc->cleanEmail($row->email);
			 $arr['church_name'][] = $row->church_name;
			 $arr['stream_url'][] = $row->stream_url;
			 $arr['ipad'][] = $row->ipad;
			 $arr['blackberry'][] = $row->blackberry;
			 $arr['android'][] = $row->android;
			 $arr['news'][] = strip_tags($row->news);
			 $arr['title'][] = strip_tags($row->title);
			 $arr['file_stream'][] = strip_tags($row->file_stream);
			 $arr['status'][] = $row->status;
			 $arr['created_by'][] = $row->created_by;
		 }
	
		 return $arr;
	 }//end if;
	 
 }//end function


function activateAccount($userID, $tblname){
	 //activate an account
	 $sql = "UPDATE ".$tblname." SET status='1' WHERE id=\"$userID\" LIMIT 1";
	 $this->mysql->query($sql);
}
function DeactivateAccount($userID,$tblname){
	$sql = "UPDATE ".$tblname." SET status=\"0\" WHERE id=\"$userID\" LIMIT 1";
	$this->mysql->query($sql);
}//end function

function get_churchadmin_users_byoffset($param, $offset, $limit){
	$sql = "SELECT * FROM ".$this->_userTable." WHERE access_level_id=\"$param\" ORDER BY id LIMIT $offset, $limit";
	$resid = querymanager::query($sql);

	if(querymanager::size($resid)>0){
		//$row = mysql_fetch_object($resid);
	   while($row = mysql_fetch_object($resid)):
			$arr['id'][] = (int)$row->id;
			$arr['first_name'][] = $row->first_name;
			$arr['last_name'][] = $row->last_name;
			$arr['user_name'][] = $row->user_name;
			$arr['user_pwd'][] = $row->user_pwd;
			$arr['email'][] = $row->email;
			$arr['access_level_id'][] = (int)$row->access_level_id;
			$arr['church_id'][] = intval($row->church_id);
			$arr['date_created'][] = $row->date_created;
			$arr['date_modified'][] = $row->date_modified;
			$arr['status'][] = $row->status;
			$arr['rec_exist'][] = $row->rec_exist;
			
		endwhile;
		
		return $arr;
	}
}//end function

function get_access_level_id($param, $tblname){
	$sql = "SELECT id, access_name FROM $tblname WHERE access_name=\"$param\" LIMIT 1";
	$resid = $this->mysql->query($sql);
	
	if( $this->mysql->size($resid) > 0 ){
		$row = $this->mysql->fetch($resid);
		return intval($row['id']);
	}else{
		return false;	
	}
}//end function


function loadChurchDetail($tblname){
	$sql = "SELECT id, church_name FROM $tblname";			
	$resid = $this->mysql->query($sql);
	
	if($this->mysql->size($resid) > 0){
		for($a=0;$a < $this->mysql->size($resid);$a++):
			  $row = $this->mysql->fetch($resid);
			  for($i=0; $i<mysql_num_fields($resid); $i++){
				  $arr[$i][$a] = $row[$i];			
			  }
			  $arr['id'][] = $row['id'];
			  $arr['church_name'][]= $row['church_name'];
			 

	  endfor;

	  return $arr;
		
	}//endif
}//


  function not_this_id($tblname, $where, $detail, $retval){
	  if(is_array($detail)){
			
			$sql = "SELECT ";
			
			foreach($detail as $fld):
				$sql .= $fld.", ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .=" FROM ".$tblname." WHERE ";
			
			foreach($where as $fld2 => $val2):
				$sql .= $fld2."=\"$val2\" AND ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-5);
			
			
			
			$resid = querymanager::query($sql);
			
			if(querymanager::size($resid) > 0 ){
				$row = querymanager::fetch($resid);
				$retval = $row[$retval];
				
				return $retval;

			}
	  
	  }
  }//end function
  
  
function get_users_detail($tableName,$arrFilter,$arrAttribute,$num,$orderBy=''){
          //load a complete record  based on filter
          //$tableName => table name
          //$arrFilter => an asociative array of filters..usually in the WHERE clause
          $whereStr = ''; 
          $orderByStr ='';
          $limitStr='';
		  $sql = "";
           
           $attrib = (is_array($arrAttribute))?implode(",",$arrAttribute):$arrAttribute; 
           if(is_numeric($num)){
               //add LIMIT portion
               $num = (int)$num;
               $limitStr = " LIMIT $num";
           }else{
			   $limitStr = " LIMIT $num";
		   }
           if(is_array($orderBy)){
                foreach($orderBy as $key=>$value){
                    $orderByStr = " ORDER BY $key $value ";
                }
           }
		   if(is_array($arrFilter)){
               foreach($arrFilter as $key=>$value){
                   $whereStr .= "$key='$value' AND ";
               }
               //strip the trailing AND
               $whereStr = rtrim($whereStr,'AND ');
			   $sql = "SELECT [FIELDS] FROM ".$tableName." WHERE ".$whereStr.$orderByStr.$limitStr;
           }else{
			   $sql = "SELECT [FIELDS] FROM ".$tableName." ".$orderByStr.$limitStr;
		   }
           
           //echo $sql;  
		   //exit;
           $res = $this->mysql->iQuery($sql,array('FIELDS'=>$attrib));
           if($res->size() <1){
            return false;
        }
        else{
            if(is_array($arrAttribute)){
                for($a=0;$a<$res->size();$a++){
                    $row = $res->fetch();
                    for($i=0;$i<count($arrAttribute);$i++){
                        $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                    }
                }
                return $arr;
            }
            $row = $res->fetch();
            return $row[$arrAttribute];
    
        }
 }//end function
 
 function loadAccessLevels(){
	 
	$sql = "SELECT * FROM tbl_access_levels";
	$resid = querymanager::query($sql);
  
	  if(querymanager::size($resid) > 0){
		
		   for($a=0;$a < querymanager::size($resid);$a++):
				  $row = querymanager::fetch($resid);
				  for($i=0; $i<mysql_num_fields($resid); $i++){
					  $arr[$i][$a] = $row[$i];			
				  }
				  $arr['id'][] = (int)$row['id'];
				  $arr['access_name'][]= $row['access_name'];
				  $arr['access_desc'][]= $row['access_desc'];
				 
				  $arr['env_path'][]= $row['env_path'];
				  
		  endfor;
		  return $arr;
	  
	  }//end if	
 }

////////////////////////////////////////////////////////////////////////////////////////

function getLastAttributeValue($detail, $tblname, $where, $retval){
	  if(is_array($detail)){
			
			$sql = "SELECT ";
			
			foreach($detail as $fld):
				$sql .= $fld.", ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .=" FROM ".$tblname." WHERE ";
			
			foreach($where as $fld2 => $val2):
				$sql .= $fld2."=\"$val2\" AND ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-5);
			$sql = $sql. " ORDER BY id DESC LIMIT 1";
			$resid = mysql::query($sql);

			if(mysql::size($resid) > 0 ){
				$row = mysql::fetch($resid);
				$retval = $row[$retval];
				
				return $retval;

			}
	  
	  }
  }//end function
  
//////////////////////////////////////////////////////////////////////////////////////
 function getAttributeValue($detail, $tblname, $where, $retval){
	  if(is_array($detail)){
			
			$sql = "SELECT ";
			
			foreach($detail as $fld):
				$sql .= $fld.", ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .=" FROM ".$tblname." WHERE ";
			
			foreach($where as $fld2 => $val2):
				$sql .= $fld2."=\"$val2\" AND ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-5);

			$resid = mysql::query($sql);

			if(mysql::size($resid) > 0 ){
				$row = mysql::fetch($resid);
				$retval = $row[$retval];
				
				return $retval;

			}
	  
	  }
  }//end function

//////////////////////////////////////////////////////////////////////////////////////

function getFirstAttributeValue($detail, $tblname, $where, $retval){
	  if(is_array($detail)){
			
			$sql = "SELECT ";
			
			foreach($detail as $fld):
				$sql .= $fld.", ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .=" FROM ".$tblname." WHERE ";
			
			foreach($where as $fld2 => $val2):
				$sql .= $fld2."=\"$val2\" AND ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-5);
			$sql = $sql. " ORDER BY id ASC LIMIT 1";
			$resid = mysql::query($sql);

			if(mysql::size($resid) > 0 ){
				$row = mysql::fetch($resid);
				$retval = $row[$retval];
				
				return $retval;

			}
	  
	  }
  }//end function
  
//////////////////////////////////////////////////////////////////////////////////////

function record_exist($attribute, $tblname, $where){

			
				$sql = "SELECT ";
				
				foreach($attribute as $fld):
					$sql .= $fld.", ";
				endforeach;
				
				$sql = substr($sql,0,strlen($sql)-2);
				$sql .=" FROM ".$tblname." WHERE ";
				
				foreach($where as $fld2 => $val2):
					$sql .= $fld2."=\"$val2\" AND ";
				endforeach;
				
				$sql = substr($sql,0,strlen($sql)-5);
			
				$resid = mysql::query($sql);
			
				if(mysql::size($resid) > 0 ){
					
					return 'yes';
					
				}else{
					
					return 'no';
				}
	
}//end function


 function count_active_records($sql){
 
 $resid = $this->mysql->query($sql);
  if($this->mysql->size($resid) > 0){
  
	  //$row = $this->mysql->fetch($resid);
	  return (int)$this->mysql->size($resid);
	  
  }else{
	  return 0;	
	  
  }
 }//end function
 
 function loadCellLeaders($param){
	 
	 $sql = "SELECT tbl_cell_leaders.cell_id, cell_leader_id, cell_leader_email, tbl_cell_leaders.country, tbl_cell_leaders.church_id , first_name, last_name, profile_pic, tbl_cells.cell_name
FROM tbl_cell_leaders, tbl_users, tbl_cells 
WHERE tbl_cell_leaders.cell_leader_id=tbl_users.id
AND tbl_cell_leaders.cell_id=tbl_cells.id AND tbl_cell_leaders.church_id = \"$param\"";


		$resid = mysql::query($sql);

		if( mysql::size($resid) > 0 ){
			$row = mysql_fetch_array($resid);
			do{
				extract($row);
				
				$arr['cell_id'][] = (int)$cell_id;
				$arr['cell_leader_id'][] = $cell_leader_id;
				$arr['cell_leader_email'][] = $cell_leader_email;
				$arr['country'][] = $country;
				$arr['church_id'][] = $church_id;
				$arr['first_name'][] = $first_name;
				$arr['last_name'][] = $last_name;
				$arr['profile_pic'][] = $profile_pic;
				$arr['cell_name'][] = $cell_name;
			}while($row = mysql_fetch_array($resid));
			return $arr;
		}//ens if
		else{
			return false;
		}//end else
		
		
 }//end function
 
 
 function loadRefCellLeader($param, $param1){
	 
	 $sql = "SELECT tbl_cell_leaders.cell_id, cell_leader_id, cell_leader_email, tbl_cell_leaders.country, tbl_cell_leaders.church_id , first_name, last_name, profile_pic, tbl_cells.cell_name
FROM tbl_cell_leaders, tbl_users, tbl_cells 
WHERE tbl_cell_leaders.cell_leader_id=tbl_users.id
AND tbl_cell_leaders.cell_id=tbl_cells.id AND tbl_cell_leaders.church_id = \"$param\"
AND tbl_users.id=\"$param1\" ";


		$resid = mysql::query($sql);

		if( mysql::size($resid) > 0 ){
			$row = mysql_fetch_array($resid);
			do{
				extract($row);
				
				$arr['cell_id'][] = (int)$cell_id;
				$arr['cell_leader_id'][] = $cell_leader_id;
				$arr['cell_leader_email'][] = $cell_leader_email;
				$arr['country'][] = $country;
				$arr['church_id'][] = $church_id;
				$arr['first_name'][] = $first_name;
				$arr['last_name'][] = $last_name;
				$arr['profile_pic'][] = $profile_pic;
				$arr['cell_name'][] = $cell_name;
			}while($row = mysql_fetch_array($resid));
			return $arr;
		}//ens if
		else{
			return false;
		}//end else
		
		
 }//end function
 
 function getTestifierDetail($param){
	 
	 $sql = "SELECT tbl_testimonies.id, tbl_testimonies.church_id, tbl_testimonies.user_name, time_posted,  last_name, first_name, profile_pic, test_body, country, tbl_testimonies.time_posted
FROM tbl_testimonies, tbl_users
WHERE tbl_testimonies.user_name=\"$param\"
GROUP BY tbl_testimonies.id";


	$resid = mysql::query($sql);

	if( mysql::size($resid) > 0 ){
		$row = mysql_fetch_array($resid);
		do{
			extract($row);
			
			$arr['id'][] = intval($id);
			$arr['church_id'][] = $church_id;
			$arr['user_name'][] = $user_name;
			$arr['first_name'][] = $first_name;
			$arr['last_name'][] = $last_name;
			$arr['profile_pic'][] = $profile_pic;
			$arr['country'][] = $country;
			$arr['test_body'][] = $test_body;
			$arr['time_posted'][] = intval($time_posted);
		}while($row = mysql_fetch_array($resid));
		return $arr;
	}//ens if
	else{
		return false;
	}//end else



 }//end function

///////////////////////////////////////////////////////////////////////////////////////

}// end class



