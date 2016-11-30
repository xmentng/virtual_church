<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cellleader extends CI_Controller {

//public $_defaultPage = 'v2/cell_leader/managecellsystem';
public $_defaultPage_index = 'v2/cell_leader/managecellsystem_ndx';
//public $_commentsTable = 'tbl_vod_comments';
	
function __construct(){
	parent::__construct();
	$this->load->library(array('sessiondata'));
	$this->load->model(array('emailmanager', 'meetingmanager'));
	if($this->session->userdata('user_name')==""){
		$here = $_SERVER['REQUEST_URI'];
		header('Location: /auth/login?ref='.urlencode($here));
		exit;
	}
	useraccount::redirect_non_cellleader();
	
	global $page_res;
	sessiondata::general_page_resource();
	
}//end function


function index(){
    $this->dashboard();	
}//end function


function dashboard(){
		
		global $page_res;
		$data['page_title'] = "Add Cell Member - ".CUSTOM_PAGE_TITLE;
		$data['page_name'] = "Cell Leader Dashboard";
		
		$this->load->view('v2/cell_leader/vw_dashboard', array('data'=>$data, 'page_res'=>$page_res));
	
}//end function

function managecellsystem(){

	global $page_res;
	
	$tab = intval($this->uri->segment(3));
	
	switch (@$tab):
	
		case 1:
			
			$_defaultPage = 'v2/cell_leader/addcellmember';
			$page_res['seltab'] = $tab;
			$data['page_title'] = "Add Cell Member - ".CUSTOM_PAGE_TITLE;
			$data['page_name'] = "Add Cell Member";
			$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp; To add a new cell member detail; kindly fill out the detail on the form below. ';
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res));
		
		break;
		
		case 2:
			$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp; Please enter the title of the meeting. ';
			$_defaultPage = 'v2/cell_leader/substartmeeting';
			$page_res['seltab'] = $tab;
			$data['page_title'] = "Start Cell Meeting - ".CUSTOM_PAGE_TITLE;
			$data['page_name'] = "Start Cell Meeting.";
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res));
		
		break;
		
		case 3:
		
			$data['post_status']=$this->uri->segment(5);
			$_defaultPage = 'v2/cell_leader/uploadcelloutline';
			$page_res['seltab'] = $tab;
			$page_res['page_title'] = "Upload Cell Outline - ".CUSTOM_PAGE_TITLE;
			$data['page_name'] = "Upload Cell Outline";
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res));
			
		break;
		
		case 4:
		
			$_defaultPage = 'v2/cell_leader/uploadannouncement';
			$page_res['seltab'] = $tab;
			$data['page_title'] = "Upload Announcement - ".CUSTOM_PAGE_TITLE;
			$data['page_name'] = "Upload Announcement";
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res));
			
		break;
		
		case 5:
		
			$_defaultPage = 'v2/cell_leader/generatepublicitylink';
			$page_res['seltab'] = $tab;
			$data['page_title'] = "Generate Publicity Link - ".CUSTOM_PAGE_TITLE;
			$page_res['page_name'] = "Social Publicity Link";
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res));
			
		break;
		
		case 6:
			
			$_defaultPage = 'v2/cell_leader/viewcellmembers';
			$page_res['seltab'] = $tab;
			$data['page_title'] = "Cell Members Details - ".CUSTOM_PAGE_TITLE;
			$page_res['page_name'] = "Cell Members Details";
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res));
		
		break;
		
		case 7:
			
			$_defaultPage = 'v2/cell_leader/viewmeetings';
			$page_res['seltab'] = $tab;
			$data['page_title'] = "Cell Meetings - ".CUSTOM_PAGE_TITLE;
			$page_res['page_name'] = "Cell Meetings";
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res));
		
		break;
		case 8:
			
			$_defaultPage = 'v2/cell_leader/viewannouncements';
			$page_res['seltab'] = $tab;
			$data['page_title'] = "Announcements - ".CUSTOM_PAGE_TITLE;
			$page_res['page_name'] = "Announcements";
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res));
		
		break;
		
		case 9:
			
			self::loadcellregister();
			
		break;
		
		case 10:
			
			self::loadcellregister_2();
		
		break;
		
		case 11:
			self::loadGroupChatRoom($tab);
		break;	
		
		default:
			
			/*
			$data['page_title'] = "Control Panel Index - ".CUSTOM_PAGE_TITLE;
			$page_res['page_name'] = "Control Panel Index";
			$this->load->view($this->_defaultPage_index, array('data'=>$data, 'page_res'=>$page_res));
			 * */
			 header('Location: /cellleader/managecellsystem/1/add-cell-member');

	endswitch;

}//end function


function loadGroupChatRoom($tab){
	
	$this->groupchat($tab);
	
}//end function

function loadcellregister(){

	global $page_res;
	
	$tab = intval($this->uri->segment(3));
	
	
	//retrieve all meetings performed
	$arr_meetings = meetingmanager::loadMeetingInfo($this->session->userdata('cell_id'),array('id', 'meeting_code', 'church_id', 'meeting_type', 'meeting_title', 'meeting_duration'));
	
	//print_r($arr_meetings); exit;
	
	$_defaultPage = 'v2/cell_leader/cellregister';
	$page_res['seltab'] = $tab;
	$data['page_title'] = "Cell Meeting Attendance - ".CUSTOM_PAGE_TITLE;
	$data['page_name'] = "Cell Meeting Attendance";
	$data['info_msg'] = " Below are list of cell meetings attendance.<br>";
	$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res, 'meetingInfo'=>$arr_meetings));
		

}//end function

function loadcellregister_2(){

	global $page_res;
	
	$tab = intval($this->uri->segment(3));
	
	
	//retrieve all meetings performed
	$arr_cell_members = useraccount::loadDetails($tableName='tbl_cell_members_cell',array('cell_id'=>$this->session->userdata('cell_id')),array('id', 'cell_id', 'cell_member_id'),$num=NULL,$orderBy='');
	
	//print_r($arr_cell_members); exit;
	
	$_defaultPage = 'v2/cell_leader/cellregister_2';
	$page_res['seltab'] = 9;
	$data['page_title'] = "Cell Register - ".CUSTOM_PAGE_TITLE;
	$page_res['page_name'] = "Cell Register";
	$data['info_msg'] = "List of cell registered members.";
	$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res, 'cellmemberInfo'=>$arr_cell_members));
		

}//end function

function createcellmember(){

	$detail = array('first_name'=>validator_lib::cleanUserName($_POST['first_name']),
						'last_name'=>validator_lib::cleanUserName($_POST['last_name']),
						'user_name'=>validator_lib::cleanUserName($_POST['usn']),
						'user_pwd'=>'pwd'.mt_rand(1,9).$this->misc->genRand(mt_rand(3,6)),
						'email'=>validator_lib::cleanEmail($_POST['email']),
						'country'=>strip_tags($_POST['country']),
						'access_level_id'=>3,
						'church_id'=>$this->session->userdata('church_id'),
						'status'=>1,
						'is_online'=>0,
						'enabled'=>1,
						'is_cell_member'=>1,
						'cell_id'=>$this->session->userdata('cell_id'),
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
				
					$id = mysql_insert_id();
					
					//add this user to tbl_cell_members_cell schema
					
					mysql::insert(array('cell_id'=>$this->session->userdata('cell_id'), 'cell_member_id'=>$id, 'church_id'=>$this->session->userdata('church_id'), 'time_posted'=>time(), 'status'=>1), $tbl='tbl_cell_members_cell');
					
					$flag_mail_sent = $this->emailmanager->dispatch_cellmember_creation_mail($detail, $tblname='tbl_users');
					if($flag_mail_sent['status']==true):
						util_lib::display_message($error=array('The cell member\'s account has been successfully created; and a mail sent to the recipient.'), $msg_type='success', $img_source='/images/icons/success_small.png');
					endif;
			}

			if($return_flag == 2){
					util_lib::display_message($error=array('The account previously exist.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
				
			if($return_flag == 0){
				util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}

		endif;	

}//end function

function startMeeting(){

	global $page_res;
	
	$tab = intval($this->uri->segment(3));
	//generate the meeting details
	$meeting_start_time = time();
	$day = date('d');
	$month = date('m');
	$year = date('Y');
	
	$cell_id = $this->session->userdata('cell_id');
	$mtn_type = CELL_MEETING_TYPE;
	$church_id = $this->session->userdata('church_id');
	$meeting_time = time(); //gmt+1
	$meeting_date = time(); //gmt+1
	$time_posted = time();
	
	
	$str_mtn_id = 'mtn'.mt_rand(1,9).$this->misc->genRand(mt_rand(3,9));
	
	$int_status=1;
	
	$flag_saved = mysql::insert(array('church_id'=>$church_id, 'cell_id'=>$cell_id, 'meeting_type'=>$mtn_type, 'meeting_time'=>$meeting_time, 'meeting_date'=>$meeting_date, 'time_posted'=>$time_posted, 'status'=>1, 'is_live'=>1, 'meeting_title'=>strip_tags($_POST['meeting_title']), 'meeting_code'=>$str_mtn_id), $tbl='tbl_meetings');
	
	if($flag_saved){
	
			
			$this->session->set_userdata('live_mtn_id', $str_mtn_id);
			
			util_lib::display_message($error=array('The meeting has been successfully started.'), $msg_type='success', $img_source='/images/icons/success_small.png');
			
	}
	

}//end function


function endmeeting(){

	$mtncode = $this->session->userdata('live_mtn_id');
	$str_end_time = time();
	
	//load meeting info
	$arr_live_mtninfo = useraccount::loadDetails($tableName='tbl_meetings',$arrFilter=array('meeting_code'=>$mtncode),$arrAttribute=array('id', 'meeting_code', 'church_id', 'cell_id', 'meeting_type', 'meeting_title', 'meeting_time', 'meeting_date', 'is_live', 'time_posted'),$num=1,$orderBy='');
	
	$str_duration = intval($str_end_time - $arr_live_mtninfo['meeting_time'][0]);
	mysql::update('tbl_meetings', array('is_live'=>0, 'meeting_duration'=>$str_duration), array('meeting_code'=>$mtncode));
	
	util_lib::display_message($error=array('Meeting successfully ended.'), $msg_type='success', $img_source='/images/icons/success_small.png');
	
}//end function

function uploadCellOutline(){

		global $page_res;
		//$this->general_page_resource();
		
        $view = 'v2/cell_leader/uploadcelloutline';
        $seenform = $this->input->post('seenform');
        $userID = $page_res['user_id'];  
         if(empty($seenform)){
             $this->load->view($view);
             return;
         }
		 
		 
		 //echo json_encode(array('status'=>true, 'message'=>$_FILES['picture']['mime']));exit;
        //check validity of uploaded file
        if(empty($_FILES['picture']['name']) || !file_exists($_FILES['picture']['tmp_name'])){
            //echo json_encode(array('status'=>false,'error'=>'Please select a pdf file for upload'));
			
			redirect(CUSTOM_BASE_URL.'/cellleader/managecellsystem/3/upload-cell-outline/failure-no-file-selected/');
            exit;
            
        } 
        //if control gets here, a file was uploaded.. find out if its d file we are expecting
		
		
		//echo json_encode(array('status'=>false,'error'=>$arrFormat[1]));exit; 
		$flag_valid = $this->misc->isValidMime($_FILES['picture']);
		
		//echo json_encode(array('status'=>false,'error'=>$flag_valid));
           //exit; 
        if(!$flag_valid){
           //echo json_encode(array('status'=>false,'error'=>'Invalid file format. Please note that only PDF file formats are currently supported.'));
           
           redirect(CUSTOM_BASE_URL.'/cellleader/managecellsystem/3/upload-cell-outline/failure-invalid-file-format/');
           exit; 
        }
        /// check the SIZE
        if(filesize($_FILES['picture']['tmp_name']) > 512000){
            //file is too large
            //echo json_encode(array('status'=>false,'error'=>'File is too large. The maximum file size is 500KB'));
			redirect(CUSTOM_BASE_URL.'/cellleader/managecellsystem/3/upload-cell-outline/failure-file-too-large/');
            exit;
        }
        //if control gets here.. we are good to add
        //generate the save path
        $pathInfo = pathinfo($_FILES['picture']['name']);
		
		//echo json_encode(array('status'=>false,'error'=>$pathInfo['extension']));exit;
        //$savePath = CUSTOM_PICTURE_PATH.$this->misc->saveDirPrefix().'/'.$this->misc->genRand(mt_rand(5,10)).'.'.$pathInfo['extension'];
		
		//$savePath = "./user_res/celloutlines/".$_FILES['picture']['name'];
		$savePath = CUSTOM_CELLOUTLINE_PATH.$this->misc->saveDirPrefix()."/".$this->misc->genRand(mt_rand(5,10)).".".$pathInfo['extension'];
		//echo json_encode(array('status'=>false,'error'=>$savePath));exit;
        //echo json_encode(array('status'=>false,'error'=> $savePath));exit;
		//copy the file
		$arrp = explode(".", $savePath);
        if(move_uploaded_file($_FILES['picture']['tmp_name'],$savePath)){
            ///update the user's record
            //$this->useraccount->updateUserAtrribute($userID,'userPicPath',$savePath) ;
			$this->mysql->insert(array('church_id'=>$this->session->userdata('church_id'), 'cell_outline_url'=>$savePath,'time_posted'=>time(), 'status'=>1,'cell_id'=>$this->session->userdata('cell_id'), 'cell_leader_id'=>$this->session->userdata('user_id')), 'tbl_cell_outlines');
			
            $this->session->set_userdata('cellOutLinePath', $savePath);
			
            //echo json_encode(array('status'=>true,'message'=>'&nbsp;Cell Outline successfully uploaded.'));
            redirect(CUSTOM_BASE_URL.'/cellleader/managecellsystem/3/upload-cell-outline/success/');
			
            exit;
        }
	
}//end function 


function upload_cell_outline(){
	
				global $page_res;
				sessiondata::general_page_resource();
	


				$userfile = @$_FILES['userfile']['name'];
		
					//set upload parameter	
				if(!empty($_FILES['userfile']['name']) || !file_exists($_FILES['userfile']['name'])){
				
					$pathInfo = pathinfo($_FILES['userfile']['name']);
					
			
					$savePath = CUSTOM_CELLOUTLINE_PATH.$this->misc->saveDirPrefix()."/".$this->misc->genRand(mt_rand(5,10)).".".@$pathInfo['extension'];
					
					//echo $savePath; exit;
		
					$saveRelPath = "./".$savePath;
					
					//print_r($saveRelPath); exit;
					
					#lets set the upload parameters
					$config['upload_path'] = $saveRelPath;
					$config['allowed_types'] = 'pdf';
					$config['max_size']	= '512000';
					$config['encrypt_name'] = FALSE;
					$config['remove_spaces'] = TRUE;
							
					
					
					$this->load->library("upload",$config);
						
					$this->upload->initialize($config);
	
					$is_uploaded = $this->upload->do_upload();
					
					//print_r($is_uploaded); exit;
					
						   
					if(!$is_uploaded){
					
			
							util_lib::display_message(array('Please select a pdf file for upload.'), $msg_type='failure', $img_source='/images/invalid_small.png'); exit;
							
					}else{
							
							//$dim = '250x250';
							$details = array();
							$details = $this->upload->data();
							
							$str_arr_new_filename = explode('/', $details['full_path']);
							
							$str_new_filename =  $str_arr_new_filename[6];
							
							print_r($str_new_filename); exit;
		
							/*
							$str_updated = $this->mysql->update($table, array('profile_pic'=>"/".$savePath.$str_new_filename), array('id'=>$this->session->userdata('user_id')));
							
							if($str_updated){
								util_lib::display_message($arrMessage=array('Picture successfully uploaded.'), $msg_type='success', $img_source=CUSTOM_BASE_URL.'/images/icons/success_small.png'); exit;
							}else{
								util_lib::display_message($arrMessage=array('Please refresh the page and try again.'), $msg_type='failure', $img_source='/images/invalid_small.png'); exit;	
							}
							 * */
							 
							 $this->mysql->insert(array('church_id'=>$this->session->userdata('church_id'), 'cell_outline_url'=>$savePath,'time_posted'=>time(), 'status'=>1,'cell_id'=>$this->session->userdata('cell_id'), 'cell_leader_id'=>$this->session->userdata('user_id')), 'tbl_cell_outlines');
			
            				$this->session->set_userdata('cellOutLinePath', $savePath);
			
					}
					
				}else{
					util_lib::display_message($arrMessage=array('Please upload a picture.'), $msg_type='failure', $img_source='/v2/images/invalid_small.png'); exit;	
				}	
			//}
			

}//end function

function submitannouncement(){

	$detail = array('acmentTitle'=>strip_tags($_POST['acmentTitle']),
						'acmentBody'=>strip_tags($_POST['acmentBody']),
						'churchID'=>$this->session->userdata('church_id'),
						'cellID'=>$this->session->userdata('cell_id'),
						'dateCreated'=>time()
						);
		#lets check for null inputs
		
		$error = inputchecker::check_announcement_inputs($detail);
		
		//print_r($error); exit;

		if(count($error) > 0):
		
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			
		endif;
		
		if(count($error) == 0):
		
			$return_flag  = mysql::insert($detail, 'tbl_announcement');
	
			if($return_flag){	
				
				util_lib::display_message($error=array('Announcement successfully submitted.'), $msg_type='success', $img_source='/images/icons/success_small.png');
					
			}
		endif;

}//end function


function groupchat($tab){
			
			global $page_res;
			
			$cell_id = $this->session->userdata('cell_id');
			
			//retrieve all online cell members
			$arr_online_cellmembers = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('cell_id'=>$cell_id, 'is_cell_member'=>1,'is_online'=>1),$arrAttribute=array('id','first_name', 'last_name', 'country','profile_pic', 'is_online', 'is_cell_member'),$num=NULL,$orderBy='');
			
			//print_r($arr_online_cellmembers );exit;
			$page_res['seltab'] = @$tab;
			$_defaultPage = 'v2/cell_leader/groupchat';
			$data['info_msg'] = '';
			$data['page_title'] = "Group Chat- ".CUSTOM_PAGE_TITLE;
			$data['page_name'] = "Group Chat Room";
			$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res, 'onlinemembers'=>$arr_online_cellmembers));
			
}//end function

function startchatsession(){

	
	//check if session has already setup
	if($this->session->userdata('chat_session_id') ){
	
		$chat_session_id = $this->session->userdata('chat_session_id');
		echo "success|Chat session successfully stareted.";
		exit;
	}else{
	
		//create a session id for this new chat conversation
		$var_chat_session_id = $this->util_lib->createID('numeric', $len=15, $tblname='tbl_cellsystem_chatsessions', $wherefld='chat_session_id');
		//get the cell id and user id
		$cell_id = $this->session->userdata('cell_id');
		$user_id = $this->session->userdata('user_id');
		
		//time created
		$var_time_created = time();
		
		//save this schema
		mysql::insert(array('chat_session_id'=>$var_chat_session_id, 'cell_id'=>$cell_id, 'user_id'=>$user_id, 'time_created'=>$var_time_created, 'status'=>1), $tblname='tbl_cellsystem_chatsessions');
		
		$this->session->set_userdata('chat_session_id', $var_chat_session_id);
		
		echo "success|Chat session successfully stareted.";
	
	}
	
}//end function

function getchatmessages(){

	//$chat_session_id = $this->session->userdata('chat_session_id');
	//echo $chat_session_id; exit;
	
	
	$chat_user_id = $this->session->userdata('user_id');
	$cell_id = $this->session->userdata('cell_id');
	
	$chat_session_id = useraccount::getLastAttributeValue($arrAtt=array('chat_session_id', 'cell_id'), $tblname='tbl_cellsystem_chatsessions', $arrwhere=array('cell_id'=>$cell_id), $retval='chat_session_id');
	
	//echo $chat_session_id; exit;
	
	//fetch the chat message based on the chat session id
	$result = mysql_query("SELECT * FROM tbl_cellsystem_chatmessages WHERE chat_session_id=\"$chat_session_id\" ORDER BY id DESC LIMIT 10");
	
	//echo $result; exit;

	while($row = mysql_fetch_array($result))
	  {
		
		
		if($row['sender_id'] == $chat_user_id){
		  //$sender_account = $page_res['church_account_name'];
		  $user_fname = useraccount::getAttributeValue(array('id', 'first_name'), 'tbl_users', array('id'=>$chat_user_id), $retval='first_name');
		  $user_lname = useraccount::getAttributeValue(array('id', 'last_name'), 'tbl_users', array('id'=>$chat_user_id), $retval='last_name');
		  
		  $full_name = $user_fname.' '.$user_lname;
		  $sender_account = $full_name;
		}else{
		
			$chat_user_id = $row['sender_id'];
		  // echo $chat_user_id; exit;
		  //$sender_account = $page_res['church_account_name'];
		  $user_fname = useraccount::getAttributeValue(array('id', 'first_name'), 'tbl_users', array('id'=>$chat_user_id), $retval='first_name');
		  $user_lname = useraccount::getAttributeValue(array('id', 'last_name'), 'tbl_users', array('id'=>$chat_user_id), $retval='last_name');
		  
		  $full_name = $user_fname.' '.$user_lname;
		  $sender_account = $full_name;
		
		
		}
		
		
	  echo '<p style="font-size:11.9px;">'.'<span>'.$sender_account.'</span>'. '&nbsp;&nbsp;' . $row['message'].'&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y g:i:s A",$row['time_posted']).'</p>';
	  
	 // echo '<p>'.'<span>'.$full_name.'</span>'. '&nbsp;&nbsp;' . $row['message'].'&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y h:i:s A",$row['time_posted']).'</p>';
	  
	  }
	
}//end function



function postchatmessages(){

	$cell_id = $this->session->userdata('cell_id');
	$chat_session_id = useraccount::getLastAttributeValue($arrAtt=array('chat_session_id', 'cell_id'), $tblname='tbl_cellsystem_chatsessions', $arrwhere=array('cell_id'=>$cell_id), $retval='chat_session_id');
	
	//echo "success|$chat_session_id"; exit;
	
	$this->session->set_userdata('chat_session_id',$chat_session_id);
	
	$arr_detail = array('chat_session_id'=>$chat_session_id,
						'message'=>strip_tags($_POST['chatmsg']),
						'sender_id'=>$this->session->userdata('user_id'),
						'recd'=>1,
						'cell_id'=>$this->session->userdata('cell_id'),
						'time_posted'=>time()
						);
						
	$this->mysql->insert($arr_detail, 'tbl_cellsystem_chatmessages');	
	echo "success|Ok.";	

}//end function









function createpublicitylink(){

	/*
	$user_id = $this->session->userdata('user_name');
			
	$church_id = $this->session->userdata('church_id');
	$cell_id = $this->session->userdata('cell_id');
	$cell_name = $this->session->userdata('cell_name');
								
	#generate te link
	$data['invite_link'] = "/churchadmin/register/".$data['church_id']."/".date('Y')."/".date('m')."/".date('d')."/invites";
	(
	*/
}//end function 




///////////////////////////////////////////////////
}//end class
