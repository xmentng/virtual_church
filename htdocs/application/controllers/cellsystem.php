<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cellsystem extends CI_Controller {

	 public $_meetingTable = 'tbl_meetings';
	 public $_meetingTableType = 'tbl_meetings_types';
	
	function __construct(){
		parent::__construct();
		/*if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			header('Location: /auth/login?ref='.urlencode($here));
			exit;
		}
		useraccount::redirectuser();*/
		$this->load->library(array('sessiondata'));
		$this->load->model(array('meetingmanager', 'churchmanager', 'cellmanager'));
		
		global $page_res;
		//sessiondata::general_page_resource();
		
	}//end function


	function index(){
		$this->landing();
	}

	function landing(){
        if($this->session->userdata('is_cell_member')==1){
            $cell_joined = useraccount::loadDetails("tbl_cells", array('id'=>$this->session->userdata('cell_id')), array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'time_created'), 1);
            if(!empty($cell_joined)){
                redirect("cellsystem/cell_info/".urldecode(urldecode($cell_joined[0]['cell_name'])));
            }
        }
		$this->load->view("cells_pre_landing");
    }
	
	function groups(){
		if($this->session->userdata('is_cell_member')==1){
			$cell_joined = useraccount::loadDetails("tbl_cells", array('id'=>$this->session->userdata('cell_id')), array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'time_created'), 1);
			if(!empty($cell_joined)){
				redirect("cellsystem/cell_info/".urldecode(urldecode($cell_joined[0]['cell_name'])));
			}
		}
		$data['cells'] = useraccount::loadDetails($tblName='tbl_cells', $arrFilter=array('status'=>1), $arrAttributes=array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country'));
		if($data['cells']==false)
			$data['cells'] = array();
		foreach($data['cells'] as &$c){
			$c['num_users'] = useraccount::count_active_records("SELECT id FROM tbl_users WHERE cell_id='".$c['id']."'");
		}
		$data['page_title'] = "Select A Cell";
		$this->load->view('cells_landing', $data);
	}
	
	function cell_info($urlencodedcellname){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			$this->session->set_flashdata('error', 'Log in to continue');
			redirect(base_url().'auth/login?ref='.$here);
			exit;
		}
		$cell_name = urldecode(urldecode($urlencodedcellname));
		$data['page_title'] = $cell_name;
		$data['cell'] = useraccount::loadDetails("tbl_cells", array('cell_name'=>$cell_name), array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'time_created'), 1);
		$data['cell'] = $data['cell'][0];
		$data['cell']['joined'] = ($this->session->userdata('cell_id')==$data['cell']['id'])?true:false;
		$data['cell']['num_users'] = useraccount::count_active_records("SELECT id FROM tbl_users WHERE cell_id='".$data['cell']['id']."'");
		$this->load->view('cell_details', $data);
	}
	
	function joinacell($urlencoded){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			$this->session->set_flashdata('error', 'Log in to continue');
			redirect(base_url().'auth/login?ref='.$here);
			exit;
		}
		$cell_name = urldecode(urldecode($urlencoded));
		$data['cell'] = useraccount::loadDetails("tbl_cells", array('cell_name'=>$cell_name), array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'time_created'), 1);
		$data['cell'] = $data['cell'][0];
		if(useraccount::_updateUserAttributes(array('id'=>$this->session->userdata('id')), array('cell_id'=>$data['cell']['id'], 'is_cell_member'=>1))){
			$this->session->set_userdata('cell_id', $data['cell']['id']);
			$this->session->set_userdata('is_cell_member', 1);
			$this->session->set_flashdata('success','You have successfully joined '.ucfirst($cell_name));
			redirect(base_url()."cellsystem/cell_info/".$urlencoded);
		}else{
			$this->session->set_flashdata('error','Error! Unable to add you to '.$cell_name.' at the moment. Please try again later.');
			redirect(base_url()."cellsystem/groups");
		}
	}
	
	function cell_activity($urlencoded){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			$this->session->set_flashdata('error', 'Log in to continue');
			redirect(base_url().'auth/login?ref='.$here);
			exit;
		}
		$cell_name = urldecode(urldecode($urlencoded));
		$data['page_title'] = $cell_name;
		$data['cell'] = useraccount::loadDetails("tbl_cells", array('cell_name'=>$cell_name), array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'time_created'), 1);
		$data['cell'] = $data['cell'][0];
		$data['cell_forums'] = useraccount::loadDetails("tbl_cell_forums", array('cell_id'=>$data['cell']['id'], 'approved'=>1), array('id', 'cell_id', 'user_id', 'title', 'slug', 'content', 'updated_at'), NULL, array('updated_at'=>'DESC'));
		
		if($data['cell_forums']!=false){
			foreach($data['cell_forums'] as &$cf){
				$cf['user'] = useraccount::loadDetails("tbl_users", array('id'=>$cf['user_id']), array('id', 'first_name', 'last_name', 'profile_pic'), 1);
				$cf['user'] = $cf['user'][0];
				$cf['num_comments'] = useraccount::count_active_records("SELECT id FROM tbl_cell_forum_comments WHERE post_id='".$cf['id']."'");
			}
		}
		$swQuery = mysql_query("SELECT `invited_by`, COUNT(*) FROM `tbl_users` GROUP BY `invited_by` ORDER BY COUNT(*) DESC");
		while($row=mysql_fetch_assoc($swQuery)){
			if($row['invited_by']!=NULL){
				$swID = $row;
				break;
			}

		}
		$data['soul_winner'] = useraccount::loadDetails('tbl_users', array('id'=>$swID['invited_by']), array('first_name', 'last_name'), 1)[0];
		//echo "<pre>";die(var_dump($data['cell_forums']));
		$data['cell_schedule'] = useraccount::loadDetails("tbl_cell_schedule", array('cell_id'=>$data['cell']['id']), array('id', 'cell_id', 'meeting_name', 'meeting_week_day', 'start_time', 'end_time', 'recurrent'));
		$data['announcements'] = useraccount::loadDetails("tbl_cell_announcements", array('cell_id'=>$data['cell']['id'], 'active'=>1), array('id', 'cell_id', 'announcement', 'active'));
		$data['num_users'] = useraccount::count_active_records("SELECT id FROM tbl_users WHERE cell_id='".$data['cell']['id']."'");
		//$data['users_online'] = useraccount::loadDetails("tbl_users", array('cell_id'=>$data['cell']['id'], 'is_logged_in'=>1), array('id', 'first_name', 'last_name', 'invited_by'), null, array('id'=>'DESC'));

		$onl = $this->db->query("SELECT id, first_name, last_name, invited_by FROM tbl_users WHERE id IN (SELECT user_id FROM tbl_users_online) AND cell_id=".$data['cell']['id']);
		$data['users_online'] = $onl->result_array();

		if($data['users_online']==false){
			$data['users_online'] = array();
		}
		foreach($data['users_online'] as &$user){
			if($user['invited_by']!=NULL){
				$user['invited_by'] = useraccount::loadDetails('tbl_users', array('id'=>$user['invited_by']), array('first_name', 'last_name'), 1)[0];
			}
		}
		//die(var_dump($data['users_online']));

		$this->load->view('cell_activity', $data);
	}
	
	function cell_forum($slug) {
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			$this->session->set_flashdata('error', 'Log in to continue');
			redirect(base_url().'auth/login?ref='.$here);
			exit;
		}
		if($this->input->post()){
			$ins['user_id'] = $this->session->userdata('user_id');
			$ins['post_id'] = $this->input->post('post_id');
			$ins['comment'] = mysql_real_escape_string($this->input->post('c-message'));
			$ins['posted_at'] = date("Y-m-d H:i:s");
			
			$this->db->insert('tbl_cell_forum_comments', $ins);
			redirect(base_url("cellsystem/cell_forum/".$slug));
		}
		
		$data['article'] = useraccount::loadDetails("tbl_cell_forums", array('slug'=>$slug, 'approved'=>1), array('id', 'cell_id', 'user_id', 'title', 'slug', 'content', 'updated_at'), 1);
		$data['article'] = $data['article'][0];
		$data['article']['user'] = useraccount::loadDetails("tbl_users", array('id'=>$data['article']['user_id']), array('id', 'first_name', 'last_name', 'profile_pic'), 1);
		$data['article']['user'] = $data['article']['user'][0];
		$data['article']['user']['full_name'] = ucfirst($data['article']['user']['first_name'])." ".ucfirst($data['article']['user']['last_name']);
		
		$data['comments'] = useraccount::loadDetails("tbl_cell_forum_comments", array('post_id'=>$data['article']['id'], 'approved'=>1), array('id', 'post_id', 'user_id', 'comment', 'posted_at'), NULL, array('id'=>'DESC'));
		if($data['comments']!=false){
			foreach($data['comments'] as &$c){
				$c['user'] = useraccount::loadDetails("tbl_users", array('id'=>$c['user_id']), array('id', 'first_name', 'last_name', 'profile_pic'), 1);
				$c['user'] = $c['user'][0];
				$c['user']['full_name'] = ucfirst($c['user']['first_name'])." ".ucfirst($c['user']['last_name']);
			}
		}
		
		$this->load->view("cell_forum_details", $data);
	}
	
	function leave_cell($urlencoded){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			$this->session->set_flashdata('error', 'Log in to continue');
			redirect(base_url().'auth/login?ref='.$here);
			exit;
		}
		$cell_name = urldecode(urldecode($urlencoded));
		
		$data['cell_id'] = NULL;
		$data['is_cell_member'] = 0;
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('tbl_users', $data);
		$this->session->set_userdata('cell_id', NULL);
		$this->session->set_userdata('is_cell_member', 0);
		$this->session->set_flashdata('success', 'You have left '.$cell_name);
		redirect(base_url("cellsystem/groups"));
	}
	
	function groupchat(){
	
		global $page_res;
		$churchID =  $userID = $this->session->userdata('userID');
		
		$cell_id = $this->session->userdata('cell_id');
			
		//retrieve all online cell members
		$arr_online_cellmembers = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('cell_id'=>$cell_id, 'is_cell_member'=>1,'is_online'=>1),$arrAttribute=array('id','first_name', 'last_name', 'country','profile_pic', 'is_online', 'is_cell_member'),$num=NULL,$orderBy='');
			
		$_defaultPage = 'v2/cellsystem/groupchat';
		$data['info_msg'] = '';
		$data['page_title'] = "Group Chat- ".CUSTOM_PAGE_TITLE;
		$page_res['page_name'] = "Group Chat Room";
		$this->load->view($_defaultPage, array('data'=>$data, 'page_res'=>$page_res, 'onlinemembers'=>$arr_online_cellmembers));
			
	}//end function
	
	function getchatmessages(){
		
	
	$chat_user_id = $this->session->userdata('user_id');
	$cell_id = $this->session->userdata('cell_id');
	
	$chat_session_id = useraccount::getLastAttributeValue($arrAtt=array('chat_session_id', 'cell_id'), $tblname='tbl_cellsystem_chatsessions', $arrwhere=array('cell_id'=>$cell_id), $retval='chat_session_id');
	
	//echo $chat_session_id; exit;
	
	$this->session->set_userdata('chat_session_id',$chat_session_id);
	
	//echo $cell_id; exit;
	
	//fetch the chat message based on the chat session id
	$result = mysql_query("SELECT * FROM tbl_cellsystem_chatmessages WHERE chat_session_id=\"$chat_session_id\" ORDER BY id DESC LIMIT 10");
	
	//echo $result; exit;

	while($row = mysql_fetch_array($result))
	  {
		
		
		if($row['sender_id'] == $chat_user_id){
		  
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
	  
	  }
		
	}//end function
	
	
	function postchatmessages(){
	
	$cell_id = $this->session->userdata('cell_id');
	$chat_session_id = useraccount::getLastAttributeValue($arrAtt=array('chat_session_id', 'cell_id'), $tblname='tbl_cellsystem_chatsessions', $arrwhere=array('cell_id'=>$cell_id), $retval='chat_session_id');
	
	//echo "success|".$_POST['chatmsg']; exit;
	
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
	
	
	
	
	
	function createchurchcell(){
		
		global $page_res, $comment;
		
		sessiondata::general_page_resource();
		
		if($this->session->userdata('is_church_admin')==0) {
			header('Location: '.CUSTOM_BASE_URL.'/churchmember/');
		}
		
		$churchID =  $this->session->userdata('church_id');
		
		
		$view = 'church_admin/create_cell';
				$data['css_cls'] = "info";
				$data['page_title'] = "Church Cell Creation | Christ Embassy Virtual Church.";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; Please fill out the detail on the below form.";
				$data['page_desc'] = "You are here : Church Admin => Church Member/User Account => Invites";
				$page_res['page_name'] = "Create Church Cell";
				
		
		$this->load->view($view, array('data'=>$data,'page_res'=>$page_res));
		
	}//end function
	
	
	function createcellleader(){
		
		global $page_res, $comment;
		
		sessiondata::general_page_resource();
		
		$churchID = $this->session->userdata('church_id');
		
		//get the cells under this church
		$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
		
		//retreive all users 
		
		$memberInfo = useraccount::loadDetails('tbl_users',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'first_name', 'last_name', 'user_name'),$num=NULL,$orderBy='');
		
		//var_dump($memberInfo); exit;
		
		$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" ");

		$view = 'church_admin/create_cellleader';
				$data['css_cls'] = "info";
				$data['page_title'] = "Church Cell Leader | Christ Embassy Virtual Church.";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; Please fill out the detail on the below form.";
				$data['page_desc'] = "You are here : Church Admin => Church Member/User Account => Invites";
				$page_res['page_name'] = "Appoint Cell Leader";
				
		
		$this->load->view($view, array('data'=>$data,'page_res'=>$page_res, 'cell'=>$cells,'memberInfo'=>$memberInfo));
		
	}//end function
	
	
	function upload_cell_outline(){
		
		global $page_res, $comment;
		
		sessiondata::general_page_resource();
		
		$churchID =  $userID = $this->session->userdata('userID');
		
		//get the cells under this church
		$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
	
		$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" ");
	
	
		$view = 'church_admin/upload_cell_outline';
				$data['css_cls'] = "info";
				$data['page_title'] = "Cell Outline | Christ Embassy Virtual Church.";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; Please fill out the detail on the below form to uploa a cell outline.";
				$data['page_desc'] = "You are here : Church Admin => Church Member/User Account => Invites";
				$page_res['page_name'] = "Upload Cell Outline";
				
		
		$this->load->view($view, array('data'=>$data,'page_res'=>$page_res, 'cell'=>$cells));
		
	}//end function
	
	
	function join_cell(){
		if($this->session->userdata('my_cell_id')){
			redirect("/cellsystem/mycell");
		}
		if(isset($_POST['submit']) && !empty($_POST['cell'])){
			$cell = $this->input->post('cell', TRUE);
			$sql = "UPDATE tbl_users SET my_cell_id='".$cell."' WHERE id='".$this->session->userdata('user_id')."'";
			$this->session->set_userdata('my_cell_id', $cell);
			$query = $this->mysql->query($sql);
			if(!$query){
				$this->session->set_flashdata('msg','An error occured. Please try again later.');
			}else{
				///$this->session->set_flashdata('msg','Successfully joined cell');
				redirect("/cellsystem/mycell");
			}
		}
		//echo "<pre>";
		//die(var_dump($this->session->all_userdata()));
		$data['title'] = "Join A Cell";
		$data['cells'] = $this->cellmanager->getAllCells();
		
		$this->load->view('may2014/joincell', $data);
		
	}//end function
	
	function mycell(){
		if($this->session->userdata('my_cell_id')!=NULL){
			$cell_id = $this->session->userdata('my_cell_id');
			
			$cell = $this->cellmanager->getCellById($cell_id);
			
			$data['title'] = $cell['cell_name']." cell";
			$data['cell'] = $cell;
			
			$this->load->view('may2014/mycell', $data);
		}else{
			redirect("/cellsystem/join_cell");
		}
	}
	
	
	function schedule_cell_meeting(){
		
		global $page_res, $comment;
		
		sessiondata::general_page_resource();
		
		$churchID =  $userID = $this->session->userdata('userID');
		
		//get the cells under this church
		$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
	
		$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" ");
	
	
		$view = 'church_admin/schedule_cell_meeting';
				$data['css_cls'] = "info";
				$data['page_title'] = "Cell Meetings | Christ Embassy Virtual Church.";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; Please fill out the detail on the below form to uploa a cell outline.";
				$data['page_desc'] = "You are here : Church Admin => Church Member/User Account => Invites";
				$page_res['page_name'] = "Schedule Cell Meetings";
				
		
		$this->load->view($view, array('data'=>$data,'page_res'=>$page_res, 'cell'=>$cells));
		
	}//end function
    
    function createaccount(){
           $this->load->model('useraccount');           
           $userID = $this->session->userdata('userID');
          
          ///create a user account
          $seenform = $this->input->post('seenform');
          if(empty($seenform)){
              //reload the reistration form
               $this->load->view('churchsystem/createaccount');  
          }
          else{
              //form has been submited
              //do some validation
              $ok = true;
              $arr['firstName'] =  $this->input->post('firstName');
              $arr['lastName'] =  $this->input->post('lastName');       
              $arr['emailAddress']  = $this->input->post('emailAddress');
              $arr['country'] = $this->input->post('country');
              
              if(!$this->misc->checkEmail($arr['emailAddress'])){
                  //email address is invalid
                  $this->flashnotice->add('Please enter a valid email address.','error');
                  $ok = false;
              }
              else{
                  //email was supplied... chekc for uniqueness
                  if(!$this->useraccount->isEmailUnique($arr['emailAddress'])){
                      //email address is not unique
                      $this->flashnotice->add('The email address exists. Please enter another email address.','error');
                      $ok = false;
                  }
              }
              
              //check name and other compulsory fields
              if(empty($arr['country']) ){
                  $this->flashnotice->add('Please fill in all compulsory fields. Fields marked * are compulsory.','error');
                  $ok = false;
              }
              
              if(!$ok){
                  //not ok.. reload the form
                  $this->load->view('churchsystem/createaccount');           
              }
              else{
                  //..generate a registration ID
                  $arr['userID'] = 'usr'.mt_rand(0,9).$this->misc->genRand(mt_rand(5,10));
                  //create a random password
                  $arr['password'] = $this->misc->genRand(mt_rand(3,4));
                  $arr['dateCreated'] = time();
                  //we need the churchID but we only have the church leader ID
                  $arrChurchInfo = $this->churchmanager->loadChurchAttributesByAttribute(array('churchLeaderID'=>$userID),array('churchID'));
                  $arr['churchID'] = $arrChurchInfo['churchID'][0];
                  //ok..register then
                  foreach($arr as $key=>$value){
                        $arrInsert[$key] = $this->mysql->SQLValue($value,'string');  
                  }
                  //proceed to insert
                  $this->mysql->InsertRow('tbl_user',$arrInsert);
                  ///dispatch login details.....
                  $this->useraccount->dispatchActivationMail($arr['userID']);
                  $this->flashnotice->add('Account was successfully created. An activation email has been sent to '.$arr['emailAddress'],'success'); 
                  header('Location:'.$_SERVER['REQUEST_URI']);
                  exit;  
              }
          }
      }
    
    
    function viewaccount(){
        
        $mode = $this->input->get('mode');
        if($mode == 'ajax'){
            //we have an ajax request
            switch($this->uri->segment(3)){
                case 'sendactivationmail':
                    //request to resend activation mail
                    $usr = $this->inputfilter->process($this->input->get('_usr'));
                    if(empty($usr)){
                        echo "<div class='error'>Error sending activation mail</div>";exit;
                    }
                    //proceed to dispatch
                    $this->useraccount->dispatchActivationMail($usr);
                    echo "<div class='success'>Activation mail successfully sent</div>";
                    exit;
                    
            }
        }
        ///load the accounts registered/members of a church
        $churchID = $this->session->userdata('churchID');
        $arrUser = $this->useraccount->loadUserAttributesByAttribute(array('churchID'=>$churchID),array('firstName','lastName','emailAddress','activated','userID'));
        $this->load->view('churchsystem/viewaccount',array('arrUser'=>$arrUser));
    }
    
    
     function approveaccount(){
         
         $mode = $this->input->get('mode');
        if($mode == 'ajax'){
            //we have an ajax request
            switch($this->uri->segment(3)){
                case 'approve':
                    //request to resend activation mail
                    $usr = $this->inputfilter->process($this->input->get('_usr'));
                    if(empty($usr)){
                        echo "<div class='error'>Error approving account</div>";exit;
                    }
                    //proceed to approve
                    $this->useraccount->updateUserAccount($usr,array('enabled'=>'1')) ;
                    echo "<div class='success'>Account successfully approved.</div>";
                    exit;
                    
            }
        }
        
        ///load the accounts unapproved registered/members of a church
        $churchID = $this->session->userdata('churchID');
        $arrUser = $this->useraccount->loadUserAttributesByAttribute(array('churchID'=>$churchID,'enabled'=>'0'),array('firstName','lastName','emailAddress','activated','userID'));
        $this->load->view('churchsystem/approveaccount',array('arrUser'=>$arrUser));
    }
    
    function schedulemeeting(){
        /*
            
        */
		global $page_res, $comment;
		
		sessiondata::general_page_resource();
        $this->load->model('useraccount');
        $this->load->model('meetingmanager'); 
        $seenform = $this->input->post('seenform');
        // first we need to load the cellID of the cell leader
        $churchID = $this->session->userdata('churchID');
        //we need to load the church member as participants and pass it in to the view
        $arrParticipants = $this->useraccount->loadUserInfo($this->churchmanager->loadChurchMembers($churchID),array('userID','firstName','lastName'));
        //var_dump($arrParticipants);exit;
        if($seenform != 'schedulecellmeeting'){
                 ///no form submitted.... load the form
                 
                 $data['churchID'] = $churchID;
                 $data['arrParticipants'] = $arrParticipants;
                 $this->load->view('ajax/schedulemeeting',$data);
                 return;
        }
        else{
            //form has been submitted...
            //Some data validation
            $err = false;
            $hr = $this->input->post('hour');
            $min = $this->input->post('minute');
            $day = $this->input->post('day'); 
            $month = $this->input->post('month'); 
            $year = $this->input->post('year'); 
            $dur = $this->input->post('duration');
            if(!is_numeric($hr) || !is_numeric($min)){
                echo json_encode(array('status'=>false,'error'=>'Please enter a valid time for the meeting'));
                exit;
            }
            if(!isset($_POST['privacy'])){
                echo json_encode(array('status'=>false,'error'=>'Please accept the terms of use.'));
                exit;
            }
            ///chekc the validaity of the date entered
            if(!checkdate($month,$day,$year)){
                $errorMsg = "$day/$month/$year is an invalid date.";
                echo json_encode(array('status'=>false,'error'=>$errorMsg));
                exit;
            }
            //check for dates in the past
            $tStamp = mktime($hr,$min,0,$month,$day,$year);
           
            if($tStamp <= Misc::serverTime()){
                 echo json_encode(array('status'=>false,'error'=>'Meeting time and date are in the past. Please enter a date in the future.'));
                exit;
                
            }
            //check the duration of the meeting
            //$dur = 1234567897;
            if($dur > MAXCELLMEETINGDURATION){
                //duration is longer the maximum allowed
                //convert maximum to hours
                $maxHr = (MAXCELLMEETINGDURATION/3600);
                echo json_encode(array('status'=>false,'error'=>"Meeting duration is too long. The Maximum duration is $maxHr hours"));
                exit;
                
                $err = true;
            }
            $arrParticipants = $this->input->post('participants');
            if(count($arrParticipants) < 1){
                //no participant.. alert the user
                echo json_encode(array('status'=>false,'error'=>"Please select participants."));
                exit;
            }  
            //var_dump($_POST['participants']);exit;
            if($err){
                ///we have errors
               
                $this->load->view('churchsystem/schedulecellmeeting');
                return;
            }
            else{ //No errors 
                //proceed to schedule the meeting
                $arrInsert = array();
                $arrInsert['meetingName'] = $this->input->post('meetingTitle');
                $arrInsert['meetingOwner']  = $churchID;
                $arrInsert['meetingType'] = '2'; //tht is d ID for cell meetings
                $arrInsert['meetingStartTime'] = mktime($hr,$min,0,$month,$day,$year);
                $arrInsert['meetingDuration'] = $dur;
                $arrInsert['amountPayable'] = $this->meetingmanager->calculatePayment(array('numOfParticipants'=>count($arrParticipants),'duration'=>$dur));
                
                //load the MeetingManager Model
                $this->load->model('meetingmanager');
                //create the meeting
              
                $res = $this->meetingmanager->addMeeting($arrInsert);
                $meetingID = $res['meetingID'];
                //add privileges
                $this->meetingmanager->grantPrivilege($arrParticipants,$meetingID);
                if($res['status']){
                  // $this->flashnotice->add("Meeting was successfully scheduled.",'success');
                  $msg = "Meeting was successfully scheduled.";
                    echo json_encode(array('status'=>true,'message'=>"Meeting was successfully scheduled."));
                    exit;
                   
                }
                else{
                    $this->flashnotice->add($res['error'],'error');
                    echo json_encode(array('status'=>false,'error'=>$res['error']));
                    exit; 
                   
                }
                
            }   
        }   
        
    }
    
    function scheduledmeetings(){
        /* Load scheduled mmetings for this user that hasnt held
        */
		global $page_res, $comment;
		sessiondata::general_page_resource();
        
        $userID = $this->session->userdata('userID');
        $churchID = $this->session->userdata('churchID'); 
        $arrChurchMeetings = $this->churchmanager->loadScheduledMeetingsByLeader($churchID);
        
        if(!$arrChurchMeetings['status']){
           $this->load->view('churchsystem/scheduledmeetingsbyme',array('meetingInfo'=>false));  
        }
        else{
           $this->load->view('churchsystem/scheduledmeetingsbyme',array('meetingInfo'=>$arrChurchMeetings['arrMeetings'])); 
        }
    }
    
    function deletemeeting(){
		global $page_res, $comment;
		sessiondata::general_page_resource();
		
        $userID = $this->session->userdata('userID');
        $churchID = $this->session->userdata('churchID');
        $meetingID = $this->inputfilter->process($this->uri->segment(3));
        $this->load->model('meetingmanager'); 
        if(!$this->churchmanager->validateChurchLeader($userID,$churchID)){
            echo "<div  class='error'>Unable to delete meeting. Access deniedw.</div>";
            exit;
        }
        $arrResp = $this->meetingmanager->deleteMeeting($churchID,$meetingID)  ;
        if($arrResp['status']){
             echo "<script>location.reload();</script>";exit;  
        }
        else{
            echo "<div class='error'>".$arrResp['error']."</div>";
            exit;
        }
        
    }
    
    function conductmeeting(){
	
	global $page_res, $comment;
		sessiondata::general_page_resource();
          $this->load->model('commentsmanager');
           $this->load->model('meetingmanager'); 
        /// a cell leader wants to hold his cell meeting..lets help him then
        $meetingID = $this->uri->segment('3'); 
         $arrMeetingInfo = $this->meetingmanager->loadMeetingInfo($meetingID,array('meetingName'));
        //attempt to laod comments
        //attempt to load comments
        $arrComments = $this->commentsmanager->loadComments($meetingID,array('userName','comment','date','ID'),array('number'=>10));
        //we have the userID of commenters.. attempt to load the thumbnail path
        $arrUser2 = $this->useraccount->loadUserInfo($arrComments['userName'],array('userPicPath','userID'));
        $arrPic = array();
        for($a=0;$a<count($arrUser2['userPicPath']);$a++){
            $arrPic[$arrUser2['userID'][$a]] = $arrUser2['userPicPath'][$a];
        }
        $data['userID'] = base64_encode($this->session->userdata('userID'));
        $data['p1'] = $this->session->userdata('encPass');
        $data['meetingID'] = $this->uri->segment('3');
        $data['meetingName'] = $this->uri->segment('3'); 
        $data['arrComments'] = $arrComments;
        $data['arrPic'] = $arrPic;
        $data['arrMeetingInfo'] = $arrMeetingInfo;
        ///load the view
        $this->load->view('churchsystem/conductmeeting',$data);
    }
    
    function loadMeetingPublisher(){
		
		global $page_res, $comment;
		sessiondata::general_page_resource();
		
        /// this out puts the cell meeting publisher app if user id authenticated
        //authentication has been done in the constructor....
        //echo the appropriate headers
        header('Content-type: application/x-shockwave-flash');
        readfile('../flashapps/meetingpublisher.swf');

    }
    
     function authenticatepublisher(){
        /* checks if user attempting to publish/broadcast actually owns the meeting
        *  we would need the userName, encrypted password and the meetingID
        * would be called by the flash movie publisher
        */
		global $page_res, $comment;
		sessiondata::general_page_resource();
         $churchID = $this->session->userdata('churchID');
        $userName = base64_decode($this->input->post('userName'));
        $password = $this->input->post('password');
        $meetingID = $this->input->post('meetingID');
        //we need to check if meeting is now live...aborted.. publishers dnt hv to wait till meeting time
        //to start publishing
        
        //load the meeting manager model
        $this->load->model('meetingmanager');
        //load meeting info
        $arrMeetingInfo = $this->meetingmanager->loadMeetingInfo($meetingID,array('meetingOwner','meetingType','meetingPublishingPoint'));
        $ar= var_export($_POST,true);
        //chekc the meetingType..if its a cell meeting then meetingTYpe should be 1
         
        if($arrMeetingInfo['meetingType'][0] != '2'){
            //meeting is not a valid cell meeting... we abort then
            echo "status=0&error=here";
            exit;
        }
       
        //$arrChurchInfo = $this->churchmanager->loadChurchAttributesByAttribute(array('churchID'=>$churchID),array('userID'));
        ///do the comparison then
        if($this->churchmanager->validateChurchLeader($userName,$arrMeetingInfo['meetingOwner'][0])){
            //publisher has been successfully authenticated
            //return the publishing point also
            echo 'status=1&streamUrl=rtmp://flo.dca.1F21.edgecastcdn.net/201F21/virtualchurch&ppoint='.$arrMeetingInfo['meetingPublishingPoint'][0];
            exit;
        }
        else{
            ///authentication failed
            echo 'status=0&error=Authentication failed';
            exit;
        }
        
    }
	

	function attendmeeting(){
	
		//redirect users that are not member of this cell
		useraccount::redirectuser();
		if($this->session->userdata('is_cell_member')==0) {
			header('Location: '.CUSTOM_BASE_URL.'/meetings/cantattend');
		}
		
		//lets retrieve the last meeting scheduled by this cell
		
		$int_cell_id = $this->session->userdata('cell_id');
		//print_r($int_cell_id); exit;
		
		$arr_meetingInfo = $this->meetingmanager->loadLiveCellMeetingsByUser($int_cell_id,$arrDetails=array('id','church_id', 'cell_id', 'meeting_type', 'meeting_title', 'meeting_time', 'meeting_duration','publishing_point', 'time_posted', 'status', 'is_live'));
		
		//print_r($arr_meetingInfo); exit;

		if(count($arr_meetingInfo['id']) == 0):
		
			//$this->showNoScheduledMeetings();
			$this->showMeetingIsNotLive();
			
		endif;
		
		if(count($arr_meetingInfo['id']) > 0):
			
			//$flag_is_meeting_live = $this->meetingmanager->isMeetingLive($arr_meetingInfo['id'][0]);
			$flag_is_meeting_live = $arr_meetingInfo['is_live'][0];
			//echo $flag_is_meeting_live['status']; exit;
			
			//print_r($flag_is_meeting_live); exit;
			
			if($flag_is_meeting_live==1){
			
				$this->meetingmanager->markAttendance(CELL_MEETING_TYPE);
				$this->showLiveMeeting();
			
			}else{
			
				$this->showMeetingIsNotLive();
			}
		
		endif;

	}//end function
	
	function showNoScheduledMeetings(){

		
		//get the help lines
		$arr_help_lines = $this->churchmanager->loadChurchDetail($arrDetails=array('id','church_id','help_line'), $tblname='help_lines', $arrfilter=array('church_id'=>$this->session->userdata('church_id'),'status'=>1));
		
		
		//view
		$view = "v2/cellsystem/noscheduledmeetings";
		$data['page_title'] = 'No Scheduled Meetings - '.CUSTOM_PAGE_TITLE;
		$page_res['page_name'] = 'No Scheduled Meetings';
		
		
		$this->load->view($view, array('page_res'=>$page_res,'data'=>$data,'help_line_info'=>$arr_help_lines ));
		
	}//end function
	function showMeetingIsNotLive(){

		
		//get the help lines
		$arr_help_lines = $this->churchmanager->loadChurchDetail($arrDetails=array('id','church_id','help_line'), $tblname='help_lines', $arrfilter=array('church_id'=>$this->session->userdata('church_id'),'status'=>1));
		
		
		//view
		$view = "v2/cellsystem/meetingisnotlive";
		$data['page_title'] = 'Meeting is not live - '.CUSTOM_PAGE_TITLE;
		$page_res['page_name'] = 'Meeting is not live';
		
		
		$this->load->view($view, array('page_res'=>$page_res,'data'=>$data,'help_line_info'=>$arr_help_lines ));
	
	}//end function
	
	function showLiveMeeting(){
	
		$arr_service_info = $this->churchmanager->loadChurchDetail($arrDetails=array('id','church_id','id', 'event_facilitator','event_title','event_desc','event_date','status'), $tblname='tbl_church_events', $arrfilter=array('church_id'=>$this->session->userdata('church_id'),'status'=>1));
	
	
		//get the help lines
		$arr_help_lines = $this->churchmanager->loadChurchDetail($arrDetails=array('id','church_id','help_line'), $tblname='help_lines', $arrfilter=array('church_id'=>$this->session->userdata('church_id'),'status'=>1));

		//view
		$view = "v2/cellsystem/livecellmeeting";
		$data['page_title'] = 'Live Cell Meeting - '.CUSTOM_PAGE_TITLE;
		$page_res['page_name'] = 'Live Cell Meeting';
		$this->load->view($view, array('page_res'=>$page_res, 'serviceInfo'=>$arr_service_info, 'data'=>$data,'help_line_info'=>$arr_help_lines));
		
	}//end function
	
	
	function downloadoutline(){
		
		//$is_cellmember = cellmanager::isCellMember($this->session->userdata('user_id'), array('cell_member_id','cell_id'));
		
		//print_r($is_cellmember); exit;
		
		//echo $this->session->userdata('is_cell_member'); exit;
		
		if(($this->session->userdata('is_cell_member')==0)&&($this->session->userdata('is_cell_member')==0)){
		
			header('Location: '.CUSTOM_BASE_URL.'/cellsystem/joincell');
			
		}
		
		/*
		if($this->session->userdata('is_cell_member')==0) {
			header('Location: '.CUSTOM_BASE_URL.'/cellsystem/joincell');
			//$this->joincell();
		}
		*/
		
		//get the help lines
		$arr_help_lines = $this->churchmanager->loadChurchDetail($arrDetails=array('id','church_id','help_line'), $tblname='help_lines', $arrfilter=array('church_id'=>$this->session->userdata('church_id'),'status'=>1));
		
		//retrieve all cell outline uploaded by this cell 
		$arr_celloutlines = $this->cellmanager->loadCellInfo($arrAttribute=array('id', 'church_id','cell_id', 'cell_leader_id', 'cell_outline_url', 'time_posted'), $tblname='tbl_cell_outlines', $arrFilter=array('cell_id'=>$this->session->userdata('cell_id'), 'status'=>1));
		
		if(count($arr_celloutlines['id']) == 0):
				$view = 'v2/cellsystem/nocelloutlines';
				$data['page_title'] = 'Cell Outlines Not Found - '.CUSTOM_PAGE_TITLE;
				$page_res['page_name'] = 'Cell Outlines Not Found';
				$data['msg'] = 'No cell outline records were found.';
		endif;
		
		if(count($arr_celloutlines['id']) > 0):
				$view = 'v2/cellsystem/celloutlines';
				$data['page_title'] = 'Cell Outlines - '.CUSTOM_PAGE_TITLE;
				$page_res['page_name'] = 'Cell Outlines';
				
				
		endif;
		
		$this->load->view($view, array('page_res'=>$page_res,'data'=>$data,'help_line_info'=>$arr_help_lines, 'celloutlineInfo'=>$arr_celloutlines));
		
	
	}//end function
	
	
	
	function viewmeetings(){
	
		if($this->session->userdata('is_cell_member')==0) {
			//$this->joincell();
			header('Location: '.CUSTOM_BASE_URL.'/cellsystem/joincell');
		}
		
		//
		$cell_id = $this->session->userdata('cell_id');
		
		//get the help lines
		$arr_help_lines = $this->churchmanager->loadChurchDetail($arrDetails=array('id','church_id','help_line'), $tblname='help_lines', $arrfilter=array('church_id'=>$this->session->userdata('church_id'),'status'=>1));
		
		//retrieve all cell outline uploaded by this cell 
		$arr_meetings = $this->meetingmanager->loadMeetingAttributesByAttribute($arrFilter=array('cell_id'=>$cell_id),$arrAttribute=array('id', 'church_id', 'cell_id', 'meeting_title','meeting_time', 'meeting_duration', 'time_posted','status','is_live'));

		if(count($arr_meetings['id']) == 0):
				$view = 'v2/cellsystem/noscheduledmeeting';
				$data['page_title'] = 'No Scheduled Meetings - '.CUSTOM_PAGE_TITLE;
				$page_res['page_name'] = 'No Scheduled Meetings';
				$data['msg'] = 'No meetings records were found.';
		endif;
		
		if(count($arr_meetings['id']) > 0):
				$view = 'v2/cellsystem/scheduledmeetings';
				$data['page_title'] = 'Scheduled Meetings - '.CUSTOM_PAGE_TITLE;
				$page_res['page_name'] = 'Scheduled Meetings';
				
				
		endif;
		
		$this->load->view($view, array('page_res'=>$page_res,'data'=>$data,'help_line_info'=>$arr_help_lines, 'meetingInfo'=>$arr_meetings));
		
		
		
	}//end function
	
	
	function joincell(){
	
		
		if($this->session->userdata('is_cell_member')==0) {
			$view = 'v2/cellsystem/joincell';
			
			//get the cell under this church
			$int_church_id = $this->session->userdata('church_id');
			
			$arr_cell_info = useraccount::loadDetails('tbl_cells',array('church_id'=>$int_church_id),array('id', 'church_id', 'cell_name'),$num=NULL,$orderBy='');
			
			//view
			$view = "v2/cellsystem/joincell";
			$data['page_title'] = 'Join a Cell - '.CUSTOM_PAGE_TITLE;
			$page_res['page_name'] = 'Join a Cell';
			$this->load->view($view, array('data'=>$data, 'cellInfo'=>$arr_cell_info, 'page_res'=>$page_res));
		}
	
	}//end function
	
	
	function proccelljoined(){

	//get the user inputs
	$detail = array('cell_id'=>intval($_POST['cell_name']),
					'cell_member_id'=>intval($this->session->userdata('user_id')),
					'church_id'=>intval($this->session->userdata('church_id')),
					'time_posted'=>misc::serverTime(),
					'status'=>1);
					
	//echo 'success|'.$detail['cell_member_id'];			exit;	
	
	$error = validator_lib::validate_cell_member_cell_inputs($detail);
	//echo json_encode(array('status'=>false,'error'=>$error)); exit;
	if(count($error) > 0):
		
		util_lib::display_message($error, $msg_type='failure', $img_source='/images/invalid_small.png');
	endif;
	
	if(count($error) == 0):
		
		//check for duplicacy
	
		$return_flag = useraccount::record_exist($attributes=array('id', 'church_id','cell_member_id'), $tblname='tbl_cell_members_cell', $where = array('cell_member_id'=>$detail['cell_member_id']));
		
		//echo 'success|'.$return_flag;
		
			if($return_flag == 'no'){	
				
				mysql::insert($detail, 'tbl_cell_members_cell');
				
				mysql::update('tbl_users', array('is_cell_member'=>1, 'cell_id'=>$detail['cell_id']), array('id'=>$this->session->userdata('user_id')));
				
				
				$flag_mail_sent = $this->useraccount->dispatch_cell_membership_mail($detail, 'tbl_users');
				
				if($flag_mail_sent['status']==true):
				
					$cell_name = useraccount::getAttributeValue(array('id', 'cell_name'), "tbl_cells", array('id'=>intval($_POST['cell_name'])), $retval="cell_name");
					
					//echo "success|$cell_name"; exit;
					
					sessiondata::general_page_resource();

					util_lib::display_message(array("You have successfully joined  $cell_name cell;  and a mail has been sent to the cell leader to acknowlege your membership."), $msg_type='success', $img_source='/images/success_small.png');
					
					
					
                    exit;
				
				endif;	
				
				
				if($flag_mail_sent['status']==false):
				
					$cell_name = useraccount::getAttributeValue(array('id', 'cell_name'), "tbl_cells", array('id'=>intval($_POST['cell_name'])), $retval="cell_name");
					
					sessiondata::general_page_resource();
					
					util_lib::display_message(array("You have successfully joined  $cell_name cell;  and a mail has been sent to the cell leader to acknowlege your membership."), $msg_type='success', $img_source='/images/success_small.png');
					
					
                    exit;
				
				endif;	
				
			}

			if($return_flag == 'yes'){
					
					util_lib::display_message(array('You have joined a cell previously.'), $msg_type='failure', $img_source='/images/invalid_small.png');
                    exit;
			}

		endif;
	}//end function
	
	public function download_cell_outline() {
		$this->load->helper('download');
		force_download('Jan 2015 CELL OUTLINE.doc', file_get_contents('user_res/celloutlines/Jan2015CELLOUTLINE.doc'));
		exit;
	}




///////////////////////////////////////////////////
}//end class
