<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class churchadmin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		authmanager::redirect_user();
		$this->load->model('contentmanager');
		$this->load->library('util_lib');
	}//end function
	
	public function index()
	{
		$this->dashboard();
	}//end function
	
	
	function general_page_resource(){
		
		global $page_res, $comment;

		#retrieve the users online.
		#retrieve the users online.
		$logged_in_account = $this->session->userdata('user_name');
		//echo $this->session->userdata('cellOutLinePath'); exit;
		
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
		
		$is_active = useraccount::getAttributeValue($detail=array('id','status'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'status');
		
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
						  'is_active'=>$is_active,
						  'session_id'=>misc::random_string('alnum',30));
		
	}//end function
	
	function dashboard(){
		
		global $page_res;
		$this->general_page_resource();
		
		$data['page_title'] = "Welcome to CE Church Live Streaming Portal";
		$page_res['page_name'] = "DASHBOARD";
		
		$this->load->view('church_admin/vw_dashboard', array('data'=>$data, 'page_res'=>$page_res));
	}//end function
	
	function useraccount(){
		
		global $page_res;
		$this->general_page_resource();
		
		
		$actn = validator_lib::cleanUserName($this->uri->segment(3));
	
		
		switch ($actn):
			case 'create':
				$view = 'church_admin/create_user_account';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Create Church Account ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new church member, kindly fill out the form below.";
				$data['page_desc'] = "You are here : Church Admin => Church User Account => Create";
				$page_res['page_name'] = "CREATE CHURCH MEMBER ACCOUNT";
				
				$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
				//$user_name = $this->session->userdata('user_name');
				$_access_level = $this->useraccount->loadAccessLevels();
				
				
				
				$data['n_access_level'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
				
				#lets retrieve the church user detail
				$user_detail = $this->useraccount->get_ref_adminuser_detail(array('user_name'=>$this->session->userdata('user_name')),$tblname="tbl_users");
				$this->load->view($view, array('data'=>$data,'adminUser'=>$user_detail,'access_levels'=>$_access_level, 'page_res'=>$page_res));
			break;
			/////////////////////////////////
			case 'manage':
			
				if(isset($_POST['cmdclick'])){
					
					$lstsearch = strip_tags($_POST['lstsearch']);
					
					if($lstsearch=="user_name"):
						$txtsearch = validator_lib::cleanUserName($_POST['txtsearch']);
						$this->get_detail_by_username($txtsearch);
						//echo $txtsearch; exit;
					endif;
					
					if($lstsearch=="user_full_name"):
						$txtsearch = strip_tags($_POST['txtsearch']);
						$this->get_detail_by_userfullname($txtsearch);
						//echo $txtsearch; exit;
					endif;
					
					
					if($lstsearch=="e-mail"):
						$txtsearch = validator_lib::cleanEmail($_POST['txtsearch']);
						$this->get_detail_by_email($txtsearch);
						//echo $txtsearch; exit;
					endif;
					
				}else{
					$view = 'church_admin/manage_users_account';
					$data['css_cls'] = "";
					$data['page_title'] = ":: Christ Embassy Live Streaming - Manage User Account ::";
					$data['info_msg'] = "";
					$page_res['page_name'] = "MANAGE CHURCH MEMBERS ACCOUNT";
					$data['page_desc'] = "";
					$users = array();
					
					#load users under this account
					$logged_in_account = $this->session->userdata('user_name');
					#get the account id
					$church_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval = 'id');
				

					
					$account_users = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('church_id'=>$church_id, 'access_level_id'=>3),$arrAttribute=array('id','first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id', 'is_online','church_id','created_by', 'status', 'country'),$num=NULL,$orderBy='');

					
					$sql = "SELECT * FROM tbl_users WHERE church_id=\"$church_id\" AND access_level_id='3' ";
					
					
					$data['nof_rec'] = useraccount::count_active_records($sql);
					
					$this->load->view($view, array('data'=>$data,'users'=>$account_users, 'page_res'=>$page_res));
				
				}
			break;
			
			case 'edit':
				$view = 'church_admin/edit_users_account';
				$data['css_cls'] = "";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Manage User Account ::";
				$data['info_msg'] = "";
				$data['page_desc'] = "You are here : Church Admin => Church Member/User Account => Manage Account";
				$page_res['page_name'] = "EDIT CHURCH MEMBER ACCOUNT";
				
				#load users under this account
				$logged_in_account = $this->session->userdata('user_name');
				//echo $logged_in_account; exit;
				#get the account id
				$church_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval = 'id');
				
				
				$account_users = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('church_id'=>$church_id, 'access_level_id'=>3),$arrAttribute=array('id','first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id', 'is_online','church_id','created_by', 'status', 'country'),$num=NULL,$orderBy='');
				

				
				$sql = "SELECT * FROM tbl_users WHERE church_id=\"$church_id\" AND access_level_id='3' ";
				
				
				$data['nof_rec'] = useraccount::count_active_records($sql);
				
				#load the view
				$this->load->view($view, array('data'=>$data,'users'=>$account_users, 'page_res'=>$page_res));

			break;
			
			case 'editaccount':
			
					$uid = intval($this->uri->segment(4));
					
					$data['uid'] = $uid;
				
					$view = 'church_admin/edit_user_account';
					$data['css_cls'] = "info";
					$data['page_title'] = ":: Christ Embassy Live Streaming - Edit User Account ::";
					$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To edit a User Account, kindly fill out the form below.";
					$data['page_desc'] = "Edit Account";
					$page_res['page_name'] = "Edit User Account";
					#lets retrieve the user details
					$users = $this->useraccount->loadDetails($tableName="tbl_users",$arrFilter=array('ID'=>$uid),$arrAttribute=array('id','first_name','last_name','user_name','user_pwd','email','date_created','status','access_level_id','church_id', 'country'),$num=1,$orderBy='');

					$data['access_level_desc'] = useraccount::getAttributeValue(array('access_desc', 'id'), $tblname='tbl_access_levels', $where=array('id'=>$users['access_level_id'][0]), $retval='access_desc');
					
					//echo $data['access_level_desc']; exit;
					
					$_access_level = $this->useraccount->loadAccessLevels();
				
					$data['n_access_level'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_access_levels");
					
					$this->load->view($view, array('data'=>$data,'user'=>$users,'access_levels'=>$_access_level, 'page_res'=>$page_res));
					
			break;
			
			case 'view_users_online':
			
				#retrieve the users online.
				$logged_in_account = $this->session->userdata('user_name');
				$church_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval = 'id');
			
				$online_users = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('church_id'=>$page_res['church_id'],'is_online'=>1),$arrAttribute=array('id','first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'is_online','church_id','created_by', 'status'),$num=NULL,$orderBy='');
				
				#sql...
				$sql = "SELECT id, first_name, last_name, user_name, user_pwd, email, church_id, is_online, created_by, status FROM tbl_users WHERE church_id=\"$page_res[church_id]\" AND is_online=\"1\" ";
	
				$data['n_online_users'] = useraccount::count_active_records($sql);
				
				
				$view = 'church_admin/view_online_users';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Edit User Account ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; Below are list of current online users.";
				$data['page_desc'] = "You are here : Church Admin => Church Member/User Account => Online Users";
				$page_res['page_name'] = "ONLINE USERS";
				
				
				$this->load->view($view, array('data'=>$data,'user'=>$online_users, 'page_res'=>$page_res));
				
			
			break;
			
			
			
			case 'view_invites':
			

				$invites = useraccount::loadDetails($tableName='tbl_church_service_invites',$arrFilter=array('church_id'=>$page_res['church_id']),$arrAttribute=array('id','church_id', 'invite_first_name', 'invite_last_name', 'invite_email', 'invite_password', 'invite_link','time_posted','invite_accepted'),$num=NULL,$orderBy='');
				
				#sql...
				$sql = "SELECT * FROM tbl_church_service_invites WHERE church_id=\"$page_res[church_id]\" ";
				$data['n_invites'] = useraccount::count_active_records($sql);
				
				
				$view = 'church_admin/view_invites';
				$data['css_cls'] = "info";
				$data['page_title'] = "Service Invites | Christ Embassy Virtual Church.";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; Below are list of invites.";
				$data['page_desc'] = "You are here : Church Admin => Church Member/User Account => Invites";
				$page_res['page_name'] = "VIEW CHURCH INVITEES";
				
				$this->load->view($view, array('data'=>$data,'invite'=>$invites, 'page_res'=>$page_res));
				
			
			break;
			
			default:
				header("Location:/auth/logout/");
		endswitch;
	}//end function
	
	
	function get_detail_by_username($param){
		
		global $page_res;
		$this->general_page_resource();
		
		$view = 'church_admin/manage_users_account';
				$data['css_cls'] = "";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Manage User Account ::";
				$data['info_msg'] = "";
				$page_res['page_name'] = "MANAGE CHURCH MEMBERS ACCOUNT";
				$data['page_desc'] = "";
				$users = array();
				
				#load users under this account
				$logged_in_account = $this->session->userdata('user_name');
				#get the account id
				$church_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval = 'id');//

				
				$account_users = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('church_id'=>$church_id, 'access_level_id'=>3,'user_name'=>$param),$arrAttribute=array('id','first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id', 'is_online','church_id','created_by', 'status', 'country'),$num=NULL,$orderBy='');

				
				$sql = "SELECT * FROM tbl_users WHERE church_id=\"$church_id\" AND access_level_id='3' AND user_name=\"$param\" ";
				
				
				$data['nof_rec'] = useraccount::count_active_records($sql);
				
				$this->load->view($view, array('data'=>$data,'users'=>$account_users, 'page_res'=>$page_res));
		
	}//end function
	
	
	
	function get_detail_by_userfullname($param){
		
		global $page_res;
		$this->general_page_resource();
		
		$view = 'church_admin/manage_users_account';
				$data['css_cls'] = "";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Manage User Account ::";
				$data['info_msg'] = "";
				$page_res['page_name'] = "MANAGE CHURCH MEMBERS ACCOUNT";
				$data['page_desc'] = "";
				$users = array();
				
				#load users under this account
				$logged_in_account = $this->session->userdata('user_name');
				#get the account id
				$church_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval = 'id');//

				
				$account_users = useraccount::loadDetailLikeName($sql="SELECT  * FROM tbl_users WHERE first_name LIKE '%$param%' OR last_name LIKE '%$param%'");

				
				$sql = "SELECT  * FROM tbl_users WHERE first_name LIKE '%$param%' OR last_name LIKE '%$param%' ";
				
				
				$data['nof_rec'] = useraccount::count_active_records($sql);
				
				$this->load->view($view, array('data'=>$data,'users'=>$account_users, 'page_res'=>$page_res));
		
	}//end function
	
	
	
	function get_detail_by_email($param){
		
		global $page_res;
		$this->general_page_resource();
		
		$view = 'church_admin/manage_users_account';
				$data['css_cls'] = "";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Manage User Account ::";
				$data['info_msg'] = "";
				$page_res['page_name'] = "MANAGE CHURCH MEMBERS ACCOUNT";
				$data['page_desc'] = "";
				$users = array();
				
				#load users under this account
				$logged_in_account = $this->session->userdata('user_name');
				#get the account id
				$church_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval = 'id');//

				
				$account_users = useraccount::loadDetailLikeName($sql="SELECT * FROM tbl_users WHERE email=\"$param\" ");

				
				$sql = "SELECT * FROM tbl_users WHERE email=\"$param\"";
				
				
				$data['nof_rec'] = useraccount::count_active_records($sql);
				
				$this->load->view($view, array('data'=>$data,'users'=>$account_users, 'page_res'=>$page_res));
		
	}//end function
	
	function content(){
		
		global $page_res;
		$this->general_page_resource();
		
		
		$actn = $this->misc->cleanUrlSegment($this->uri->segment(3));

		switch ($actn):
			case 'update_notice_board':
				$view = 'church_admin/update_notice_board';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Update Notice Board ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To Update the notice board content, kindly fill out the form below.";
				$data['page_desc'] = "You are here : Church Admin => Content => Update Notice Board";
				$page_res['page_name'] = "UPDATE NOTICE BOARD";
				
				#retrieve the church info
				$logged_in_account = $this->session->userdata('user_name');
				$data['church_id'] = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval='id');

				$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
			break;
			
			
			case 'change_banner':
				$view = 'church_admin/change_banner';
				$data['css_cls'] = "info";
				$data['flag'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Change Banner ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To change a banner, kindly fill out the form below.";
				$data['page_desc'] = "You are here : Church Admin => Content => Change Banner";
				$page_res['page_name'] = "UPLOAD BANNER";
				
				#retrieve the users online.
				$logged_in_account = $this->session->userdata('user_name');
				$church_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval = 'id');
				
				$church_banner = useraccount::getLastAttributeValue(array('id', 'church_id', 'church_banner'), $tblname='tbl_church_banners', array('church_id'=>$church_id), $retval='church_banner');
				
				if(!$church_banner){
					$data['church_banner'] = "/images/banner.png";	
				}else{
					$data['church_banner'] = $church_banner;
				}
				
				$data['church_id'] = $church_id;
				$data['logged_in_account'] = $logged_in_account;
				
				
				
				if(!isset($_POST['submit_btn'])):
					$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
				endif;
			
				if(isset($_POST['submit_btn'])):
					$this->upload_generalpage_banner($view,$data);
				endif;
	
			break;

			
			default:
				
				header("Location:/auth/logout/");
		endswitch;
		
	}//end function
	
	function upload_generalpage_banner($view, $data){
		
		global $page_res;
		$this->general_page_resource();
		
		
		$error = array();
		$msg = "";
	
		
		$detail = array('church_id'=>strip_tags($_POST['church_id']),
						'church_banner_desc'=>strip_tags($_POST['banner_desc']),
						'church_banner'=>NULL,
						'time_posted'=>$this->misc->serverTime(),
						'time_modified'=>$this->misc->serverTime(),
						'status'=>1);
		#lets check for null inputs

		#lets set the upload parameters
		$config['upload_path'] = "./user_res/banners/";
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= 80;
		//$config['encrypt_name'] = TRUE;
		$config['remove_spaces'] = TRUE;
			
		$this->load->library("upload",$config);
		$this->upload->initialize($config);
		
		//$field_name = "upload";
		$is_uploaded = $this->upload->do_upload();
	
		if(!$is_uploaded):
			$data['flag'] = "error";
			$data['info_msg'] = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />".$this->upload->display_errors();
			$page_res['page_name'] = "UPLOAD BANNER";
			$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
			
		endif;
		
		if($is_uploaded):
	
			$arrdata = $this->upload->data();
		
			$detail['church_banner'] = base_url()."user_res/banners/".$arrdata['file_name'];
			//$detail['pic_path'] = "/hikanotes/ce_event_pics/".$arrdata['file_name'];
		
			#lets insert
			$is_added = querymanager::insert($detail, 'tbl_church_banners');
			if($is_added){
				$data['flag'] = "success";
				$data['info_msg'] = "<img src=\"/images/icons/success_small.png\" align='absmiddle' />The record has been successfully submitted.";
				
				
				$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
			}
		
		endif;
	}//end function
	
	
	function activate_user(){
		
		  $userID = intval($this->uri->segment(3));
		  if(empty($userID)){
            //$this->flashnotice->add('Error activating account.','error');
            header("Location:/churchadmin/useraccount/manage/");
            exit;
        }
        //validate
        $arrUserInfo = $this->useraccount->loadRefUser($userID,'tbl_users');
     
        if(!is_array($arrUserInfo)){
            //userID does not exist
            //$this->flashnotice->add('Error activating account.','error');
            header("Location:/churchadmin/useraccount/manage/error/");
            exit;
            
        }

        if($arrUserInfo['status'][0] == '0'){
            $this->useraccount->activateAccount($userID,$tblname='tbl_users');
            //$this->flashnotice->add('Your account was successfully activated.','success');
            header("Location:/churchadmin/useraccount/manage/success/");
            exit;  
        }
        if($arrUserInfo['status'][0] == '1'){
            //$this->useraccount->activateAccount($userID);
            //$this->flashnotice->add('Account already activated.','info');
			
            header("Location:/churchadmin/useraccount/manage/error/");
            exit;
        }
      

	}//end function
	
	function deactivate_user(){
		 $userID = intval($this->uri->segment(3));
		  if(empty($userID)){
            //$this->flashnotice->add('Error activating account.','error');
	
            header("Location:/churchadmin/useraccount/manage/derror/");
            exit;
        }
        //validate
        $arrUserInfo = $this->useraccount->loadRefUser($userID,'tbl_users');
     
        if(!is_array($arrUserInfo)){
            //userID does not exist
            //$this->flashnotice->add('Error activating account.','error');
	
            header("Location:/churchadmin/useraccount/manage/derror/");
            exit;
            
        }

        if($arrUserInfo['status'][0] == '1'){
            $this->useraccount->DeactivateAccount($userID,$tblname='tbl_users');
            //$this->flashnotice->add('Your account was successfully activated.','success'); 
            header("Location:/churchadmin/useraccount/manage/dsuccess/");
            exit;  
        }
        if($arrUserInfo['status'][0] == '1'){
            //$this->useraccount->activateAccount($userID);
            //$this->flashnotice->add('Account already activated.','info');   
            header("Location:/churchadmin/useraccount/manage/derror/");
            exit;
        }
      
	}//end function
	
//////////////////////////////////////////////////////////////////////////////////////////////

function helplines(){
	
		global $page_res;
		$this->general_page_resource();
		
		
		$action = validator_lib::cleanUserName($this->uri->segment(3));
		
		switch ($action):
				case 'add':
						$view = 'church_admin/update_help_lines';
						$data['css_cls'] = "info";
						$data['page_title'] = ":: Christ Embassy Live Streaming - Update Help Lines ::";
						$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To Update Help Lines, kindly fill out the form below.";
						$data['page_desc'] = "You are here : Church Admin => Content => Update Help Lines";
						$page_res['page_name'] = "HELP LINES";
						
						#retrieve the church info
						$logged_in_account = $this->session->userdata('user_name');
						$data['church_id'] = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval='id');
		
						$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
				
				break;
				
				
				default:
					header('Location: /churchadmin/helplines/add/');
			
	
		endswitch;
}//end function


function register(){
	
	#get the church_id
	$church_id = intval($this->uri->segment(3));
	
}//end function


function invite_link(){
	
	global $page_res;
	$this->general_page_resource();
		
		
	$action = strip_tags($this->uri->segment(3));

	#switch case base on action
	switch ($action):
	
		case 'generate':
			//global $church_id, $invite_link, $sday, $smonth, $syear;
			#lets load the view 
			$data['nsuccess'] = 0;
			$view = 'church_admin/invite_link';
			$data['css_cls'] = "info";
			$data['page_title'] = ":: Christ Embassy Live Streaming - Invite Link Generation ::";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Kindly fill out the detail on the form below.";
			$data['page_desc'] = "You are here : Church Admin => Invite Link => Generate";
			$data['msg_flag_status'] = 'info';
			
			$page_res['page_name'] = "";

			#retrieve the church info
			$logged_in_account = $this->session->userdata('user_name');

			
			$data['church_id'] = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval='id');
						
			$church_id = $data['church_id'];
			
			$data['year'] = date('Y');
			$data['month'] = date('m');
			$data['day'] = date('d');
			
			#generate te link
			$invite_link = "http://streamingportal.internetmultimediaonline.org/invite/registration/".$data['church_id']."/".date('Y')."/".date('m')."/".date('d')."/invites";
			$data['invite_link'] = "http://streamingportal.internetmultimediaonline.org/invite/registration/".$data['church_id']."/".date('Y')."/".date('m')."/".date('d')."/invites";
			
			if(isset($_POST['submit_btn'])){
				
				$count =$_POST['counts'];
	
				if($count==0):
					$this->process_invite_uploaded_input($data, $view);
				endif;
				
				if($count>=1):
					$this->process_invite_input($count, $data, $view);
				endif;
				
			}else{
				
				$page_res['page_name'] = "INVITE MEMBERS";
				$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
			}
		break;
		
		
		case 'generic':
			$this->generic_link();
		break;
			
			
		
		default:
		
		
	
	endswitch;
	
}//end function


function generic_link(){
	
	#lets load the view 
			$data['nsuccess'] = 0;
			$view = 'church_admin/generic_link';
			$data['css_cls'] = "info";
			$data['page_title'] = ":: Christ Embassy Live Streaming - Generic Invite Link ::";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To generate an invite link, fill the detail on the below form and click on the Generate Button.";
			$data['flag_msg_status'] = 'info';

			#retrieve the church info
		
			$logged_in_account = $this->session->userdata('user_name');
			
			$data['church_id'] = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval='id');
			
			$church_detail = useraccount::loadDetails($tableName='tbl_churches',$arrFilter=array('id'=>$data['church_id']),$arrAttribute=array('id', 'church_name', 'stream_url', 'ipad', 'blackberry', 'android', 'status'),$num=1,$orderBy='');
					
			#generate te link
			$data['invite_link'] = "/churchadmin/register/".$data['church_id']."/".date('Y')."/".date('m')."/".date('d')."/invites";
			
			$data['year'] = date('Y');
			$data['month'] = date('m');
			$data['day'] = date('d');
			$data['church_name'] = $church_detail['church_name'][0];
			
			$this->load->view($view, array('data'=>$data, 'church_detail'=>$church_detail));
			

	
}//end function

function process_invite_uploaded_input($data, $view){
	
	global $page_res;
	$this->general_page_resource();
	
	
	#process uploaded file detail
	$config['upload_path'] = "./user_res/xcel_data/";
	$config['allowed_types'] = 'csv|xls';
	$config['max_size']	= '204800';
	//$config['encrypt_name'] = TRUE;
	$config['remove_spaces'] = TRUE;
		
	$this->load->library("upload",$config);
	$this->upload->initialize($config);
	
	$is_uploaded = $this->upload->do_upload();
	
	#var_dump($is_uploaded);exit;
	
	if($is_uploaded):
	
		#get the file path and process
		$uploaded_file_detail = $this->upload->data();
		//var_dump($uploaded_file_detail);exit;
		$page_res['page_name'] = "INVITE MEMEBERS";
		$this->process_imported_file_inputs($view, $uploaded_file_detail, $data);

	endif;
	
	if(!$is_uploaded):
		
		$error = array('desc'=>$this->upload->display_errors());
		$data['info_msg'] = 'Error!'.(string)$error['desc'];
		$data['css_cls'] = 'error';
		//$view = 'clients/bulk_messaging';
		
		$data['nsaved'] = 0;
		$data['nsuccess'] = 0;
		$data['count'] = 0;
		
		$data['page_title'] = 'Invite Member | Christ Embassy Live Streaming.';
		$data['page_desc'] = 'Church Admin - Invite Members';
		$page_res['page_name'] = "INVITE MEMEBERS";
		//$data['client_name'] = $this->useraccount->load_user_fullname(); #retreiving client full name
		//$data['info_msg'] = 'To import members list, kindly fill out the detail on the below form.';
		$data['css_cls'] = 'error';
		$data['flag_msg_status'] = 'file_not_uploaded';
		
		#generate te link
		$data['invite_link'] = "http://streamingportal.internetmultimediaonline.org/invite/registration/".$data['church_id']."/".date('Y')."/".date('m')."/".date('d')."/invites";

		#loading the view
		$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res)); 	
	
	endif;
	
}//end function


function process_imported_file_inputs($view, $file_detail, $data){
	
	global $page_res;
	$this->general_page_resource();
	
	//echo $file_detail['file_ext']; exit;
		
	switch( $file_detail['file_ext'] ):
		
			case '.xls':
					$this->process_uploaded_excel_file($view, $file_detail, $data);
			break;
			
			case '.csv':
					$this->process_uploaded_csv_file($view, $file_detail, $data);
			break;
			
			default:
					$this->import_group_members();
			break;
			
		
		endswitch;

}//end function


function process_uploaded_csv_file($view, $file_detail, $data){
	
	global $page_res;
		$this->general_page_resource();
		
	global $church_id, $invite_link;
					$import_error = array();
					$insertion_error = array();
					$success_array = array();
					$prev_exist_array = array();
					$error = array();
					
					$ndata = 0;
					$nsaved = 0;
					
					$church_id = intval($this->input->post('church_id'));

					$invite_link = $this->input->post('invite_link');
					$syear = intval($this->input->post('service_year'));
					$smonth = intval($this->input->post('service_month'));
					$sday = intval($this->input->post('service_day'));
					
					$data['count'] = 0;
					
					$n = 0;
					$nsuccess = 0;
					$nfailure = 0;
					$invalid = 0;
					$data['invalid'] = 0;
					
					$data['nsuccess'] = 0;
					$data['nfailure'] = 0;
					
					$nexist = 0;
					$data['nexist'] = 0;

					$fh = fopen($file_detail['full_path'],"r");
					$spss_row = 0;
	  				$isExist = false;
	 				$tblrow = 0;
					
					
						
					while (($filedata = fgetcsv($fh, 1000, ",")) !== FALSE):

						#var_dump($filedata);exit;			
						$spss_row +=1 ;  //skip the first row, for it is for the headings
						$tblrow +=1;
						
						
						if($spss_row > 1)
						{
							$ndata +=1;	
					
							
							$detail = array("church_id"=>$church_id,
											"invite_first_name"=>validator_lib::cleanName($filedata[0]),
											"invite_last_name"=>validator_lib::cleanName($filedata[1]),
											"invite_email"=>strip_tags($filedata[2]),
											"invite_password"=>util_lib::createID($type='alnum', $len=6, $tblname='tbl_church_service_invites', $wherefld='invite_password'),
											"invite_link"=>$invite_link,
											"service_author"=>'',
											"service_theme"=>strip_tags($_POST['service_theme']),
											"service_year"=>$data['year'],
											"service_month"=>$data['month'],
											"service_day"=>$data['day'],
											"time_posted"=>misc::serverTime(),
											"invite_accepted"=>0);
			
							#lets validate the inputs	
							$error = $this->validator_lib->validate_invite_inputs($detail);
							
							if(count($error) == 0):
						
								$return_flag  = post_lib::save_invite_inputs($detail);
								
								//echo $return_flag; exit;
								
								if($return_flag == 0){
									
									$insertion_error[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
									$data['css_cls'] = 'error';
									$data['flag_msg_status'] = 'error';
											 
								}
								
								if($return_flag == 1){
									$nsaved +=1;
									$data['invite_id'] = useraccount::getAttributeValue(array('id', 'invite_email'),$tblname='tbl_church_service_invites', array('invite_email'=>$detail['invite_email']), $retval='id');
				
									$inv_link = $data['invite_link']."/".$data['invite_id']."/".misc::makeSeoTitle(@$detail['service_theme']);
									$detail['invite_link'] = $inv_link;
									//update link on schema
									mysql::update($tblname='tbl_church_service_invites', array('invite_link'=>$inv_link), $where = array('invite_email'=>$detail['invite_email']) );
									$flag_mail_sent = useraccount::dispatch_registration_link_mail($detail,$arrMoreInfo=NULL, $tblname='tbl_church_service_invites');
												 
								}
								
								if($return_flag == 2){
									
									$prev_exist_array[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
									
									$data['css_cls'] = 'error';
									$data['flag_msg_status'] = 'error';
				 
								}
					
							endif;
							if(count($error) > 0):
									
									$import_error[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
									$data['css_cls'] = 'error';
									$data['flag_msg_status'] = 'error';
							endif;
			
				
						}
	
					 endwhile;

					  $data['nsaved']=$nsaved;
					  $data['ndata']=$ndata;
				  
					  #loading the view
					  $this->load->view($view, array('data'=>$data, 'import_error'=>$import_error, 'previously_exist'=>$prev_exist_array, 'insertion_error'=>$insertion_error, 'page_res'=>$page_res)); 	
	
}//end function


function process_uploaded_excel_file($view, $file_detail, $data){
	
	//global $church_id, $invite_link;
	global $page_res;
	$this->general_page_resource();
	
	include('./reader.php');
	$excel = new Spreadsheet_Excel_Reader();
	
	#declare variables
	$import_error = array();
	$insertion_error = array();
	$prev_exist_array = array();
	$error = array();
	$ndata = 0;
	$nsaved = 0;
	
	$detail = array();
	
	$church_id = intval($this->input->post('church_id'));

	$invite_link = $this->input->post('invite_link');
	$syear = intval($this->input->post('service_year'));
	$smonth = intval($this->input->post('service_month'));
	$sday = intval($this->input->post('service_day'));
	
	$data['count'] = 0;
	
	$n = 0;
	$nsuccess = 0;
	$nfailure = 0;
	$invalid = 0;
	$data['invalid'] = 0;
	
	$data['nsuccess'] = 0;
	$data['nfailure'] = 0;
	
	$nexist = 0;
	$data['nexist'] = 0;
	
	#lets read the excel file
	$excel->read($file_detail['full_path']);
	$rows =  $excel->sheets[0]['numRows'];
	$cols = $excel->sheets[0]['numCols'];	
	
	$x=2; #skip the excel headings
    while($x<=$rows) :
      $y=1;
	  $ndata +=1;
	  $detail['invite_first_name'] = isset($excel->sheets[0]['cells'][$x][$y]) ? misc::cleanName($excel->sheets[0]['cells'][$x][$y]) : ''; #pick the first cell value of the sheet
	  
	  if($y < $cols){
			$y = $y + 1;
			$detail['invite_last_name'] = isset($excel->sheets[0]['cells'][$x][$y]) ? misc::cleanName($excel->sheets[0]['cells'][$x][$y]):'';
			$y = $y + 1;
	  }
	  
	  if($y <= $cols){
			//$y = $y + 1;
			$detail['invite_email'] = isset($excel->sheets[0]['cells'][$x][$y]) ? strip_tags($excel->sheets[0]['cells'][$x][$y]) : '';
			$y = $y + 1;
	  }
	  
	  if($y > $cols){
			#var_dump($detail);
			#@ this point, lets save the data
			$detail['church_id'] = $church_id;
			$detail['invite_password'] = util_lib::createID($type='alnum', $len=6, $tblname='tbl_church_service_invites', $wherefld='invite_password');
			$detail['invite_link'] = $invite_link;
			$detail['time_posted'] = misc::serverTime();
			$detail['service_author'] = '';
			$detail['service_theme'] = strip_tags($_POST['service_theme']);
			$detail['service_year'] = $data['year'];
			$detail['service_month'] = $data['month'];
			$detail['service_day'] = $data['day'];
			$detail['invite_accepted'] = 0;
			
			#lets validate the inputs	
			$error = $this->validator_lib->validate_invite_inputs($detail);
			
			if(count($error) == 0):
		
				$return_flag  = post_lib::save_invite_inputs($detail);
				
				if($return_flag == 0){
					
					$insertion_error[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
					$data['css_cls'] = 'error';
					$data['flag_msg_status'] = 'error';
							 
				}
				
				if($return_flag == 1){
					$nsaved +=1;
					$data['invite_id'] = useraccount::getAttributeValue(array('id', 'invite_email'),$tblname='tbl_church_service_invites', array('invite_email'=>$detail['invite_email']), $retval='id');
				
					$inv_link = $data['invite_link']."/".$data['invite_id']."/".misc::makeSeoTitle(@$detail['service_theme']);
					$detail['invite_link'] = $inv_link;
					//update link on schema
					mysql::update($tblname='tbl_church_service_invites', array('invite_link'=>$inv_link), $where = array('invite_email'=>$detail['invite_email']) );
					$flag_mail_sent = useraccount::dispatch_registration_link_mail($detail,$arrMoreInfo=NULL, $tblname='tbl_church_service_invites');			 
				}
				
				if($return_flag == 2){
					
					$prev_exist_array[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
					
					$data['css_cls'] = 'error';
					$data['flag_msg_status'] = 'error';
					
									 
				}
	
			endif;
			if(count($error) > 0):
					
					$import_error[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
					$data['css_cls'] = 'error';
					$data['flag_msg_status'] = 'error';
			endif;
	
	  }//endif $y is greater than excel cols
      $x++;
    endwhile;//end while loop
	
	#lets load the page:

	$data['nsaved']=$nsaved;
	$data['ndata']=$ndata;
	
	#echo $ndata; exit;

	#loading the view
	$this->load->view($view, array('data'=>$data, 'import_error'=>$import_error, 'previously_exist'=>$prev_exist_array, 'insertion_error'=>$insertion_error, 'page_res'=>$page_res)); 
	
	
	
}//end function


function process_invite_input($count, $data, $view){
	
	global $page_res;
	$this->general_page_resource();
	
	$flag_success = false;
	
	#declare variables
	$import_error = array();
	$insertion_error = array();
	$prev_exist_array = array();
	$error = array();
	
	
	$invalid_detail = array();
	$existing_rec = array();
	$proc_success = array();
	$church_id = intval($this->input->post('church_id'));

	$invite_link = $this->input->post('invite_link');
	$syear = intval($this->input->post('service_year'));
	$smonth = intval($this->input->post('service_month'));
	$sday = intval($this->input->post('service_day'));
	
	$data['count'] = $count;
	
	$n = 0;
	$nsuccess = 0;
	$nfailure = 0;
	$invalid = 0;
	$data['invalid'] = 0;
	
	$data['nsuccess'] = 0;
	$data['nfailure'] = 0;
	
	$nexist = 0;
	$data['nexist'] = 0;
	
	$ndata = 0;
	$nsaved = 0;
	//echo $count; exit;
		
	for($i = 1; $i <= $count; $i++){
					
		$fname = "first_name".$i;
		$first_name = strip_tags($_POST[$fname]);
		
		//echo $first_name; exit;
		
		$lname = "last_name".$i;
		$last_name = strip_tags($_POST[$lname]);

		$email = "email".$i;
		$email2 = validator_lib::cleanEmail($_POST[$email]);

		$n = $i;
		$detail = array("church_id"=>$church_id,
						"invite_first_name"=>strip_tags($first_name),
						"invite_last_name"=>strip_tags($last_name),
						"invite_email"=>strip_tags($email2),
						"invite_password"=>util_lib::createID($type='alnum', $len=6, $tblname='tbl_church_service_invites', $wherefld='invite_password'),
						"invite_link"=>$invite_link,
						"service_author"=>'',
						"service_theme"=>strip_tags($_POST['service_theme']),
						"service_year"=>$syear,
						"service_month"=>$smonth,
						"service_day"=>$sday,
						"time_posted"=>misc::serverTime(),
						"invite_accepted"=>0);

		$error = validator_lib::validate_invite_inputs($detail);

		if(count($error) > 0):
				
				$import_error[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
				$data['css_cls'] = 'error';
				$data['flag_msg_status'] = 'input_error';
		endif;


		
		if(count($error) == 0):
			
			$return_flag  = post_lib::save_invite_inputs($detail);
	
			if($return_flag == 0){	  //existing record
				$flag_success = false;
				$insertion_error[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
				$data['css_cls'] = 'error';
				$data['flag_msg_status'] = 'error';
				
			}
			
			if($return_flag == 1){	

				$nsaved +=1;
				
				$data['invite_id'] = useraccount::getAttributeValue(array('id', 'invite_email'),$tblname='tbl_church_service_invites', array('invite_email'=>$detail['invite_email']), $retval='id');
				
				$inv_link = $data['invite_link']."/".$data['invite_id']."/".misc::makeSeoTitle(@$detail['service_theme']);
				$detail['invite_link'] = $inv_link;
				//update link on schema
				mysql::update($tblname='tbl_church_service_invites', array('invite_link'=>$inv_link), array('invite_email'=>$detail['invite_email']) );
				$flag_mail_sent = useraccount::dispatch_registration_link_mail($detail,$arrMoreInfo=NULL, $tblname='tbl_church_service_invites');
			}
			
			if($return_flag == 2){	  //existing record
				$flag_success = false;

				
				$prev_exist_array[$ndata-1] = $detail['invite_first_name'].' '.$detail['invite_last_name']. ' '. $detail['invite_email'];
					
				$data['css_cls'] = 'error';
				$data['flag_msg_status'] = 'error';
				
			}

		endif;  //endif there are no errors

	}//enf for loop
	
	#lets load the page:

	$data['nsaved']=$nsaved;
	$data['ndata']=$count;

	#loading the view
	$this->load->view($view, array('data'=>$data, 'import_error'=>$import_error, 'previously_exist'=>$prev_exist_array, 'insertion_error'=>$insertion_error, 'page_res'=>$page_res)); 
	
	
	
}//end function

function view_invite_csv_format(){
	#lets load the view 
			global $page_res;
			$this->general_page_resource();
		
			$view = 'church_admin/invite_csv_format';
			$data['css_cls'] = "info";
			$data['page_title'] = ":: Christ Embassy Live Streaming - Invite Excel Format ::";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Kindly find below the Excel Format for Uploading Invite Detail.";
			$data['page_desc'] = "You are here : Church Admin => Invite Detail => Excel Format";
			$page_res['page_name'] = "INVITE CSV FILE FORMAT";
			
			#retrieve the church info
			$logged_in_account = $this->session->userdata('user_name');
			
			$data['church_id'] = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval='id');
			
			#generate te link
			$data['invite_link'] = "/churchadmin/register/".$data['church_id']."/".date('Y')."/".date('m')."/".date('d')."/invites";
			
			$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
}//end function


function streaming_link(){
	global $page_res;
	$this->general_page_resource();
		
		
	$view = 'church_admin/view_streaming_link';
			$data['css_cls'] = "info";
			$data['page_title'] = ":: Christ Embassy Live Streaming - Streaming Links ::";
			$page_res['page_name'] = "STREAMING LINKS";
		
			#retrieve the church info
			$logged_in_account = $this->session->userdata('user_name');
			
			$data['church_id'] = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval='id');
			
			$church_detail = useraccount::loadDetails($tableName='tbl_churches',$arrFilter=array('id'=>$data['church_id']),$arrAttribute=array('id', 'church_name', 'stream_url', 'ipad', 'blackberry', 'android', 'status'),$num=1,$orderBy='');
			
			
			#generate te link
			$data['invite_link'] = "/churchadmin/register/".$data['church_id']."/".date('Y')."/".date('m')."/".date('d')."/invites";
			
			$this->load->view($view, array('data'=>$data, 'church_detail'=>$church_detail, 'page_res'=>$page_res));
}//end function



function notice_board_content(){
	

	$action  =  strip_tags($this->uri->segment(3));
	
	switch($action):
		
		case 'edit':
			
			$this->load_edit_notice_board_page();
			
		break;
		
		
		case 'update':
			
			$this->load_update_notice_board_page();
			
		break;
		

		default:
		
	endswitch;

	
				
}//end function

function load_update_notice_board_page(){
	
	
	global $page_res;
	$this->general_page_resource();
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Update Notice Board Content | Christ Embassy Church Streaming Portal";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To update the Notice Board Content, kindly fill out the detail on the below form.";
	$data['page_desc'] = "You are here : Church Admin => Notice Board => Update Content";
	$data['flag_msg_status'] = "info";
	$page_res['page_name'] = "UPDATE NOTICE BOARD CONTENT";

	#retrieve the church info
	$logged_in_account = $this->session->userdata('user_name');
	
	//get the notice board content id
	$id = intval($this->uri->segment(4));
	
	$data['id'] = $id;
	
	// get the user detail
	$user = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('user_name'=>$logged_in_account),$arrAttribute=array('id', 'first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id','church_id', 'status'),$num=1,$orderBy='');
	
	// get the notice board contents
	$nbcontents = useraccount::loadDetails($tableName='tbl_churches_notice_board_contents',$arrFilter=array('id'=>$id),$arrAttribute=array('id', 'notice_board_content', 'church_id'),$num=1,$orderBy='');
	

	// load the view
	$view = 'church_admin/update_notice_board_content';
	
	$this->load->view($view, array('data'=>$data, 'nbcontent'=>$nbcontents,'page_res'=>$page_res));
	
}//end function

function  load_edit_notice_board_page(){
	
	global $page_res;
	$this->general_page_resource();
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Edit Notice Board Content | Christ Embassy Church Streaming Portal";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Kindly find below the Excel Format for Uploading Invite Detail.";
	$data['page_desc'] = "You are here : Church Admin => Notice Board => Edit Content";
	$data['flag_msg_status'] = "info";
	$page_res['page_name'] = "EDIT NOTICE BOARD CONTENT";

	#retrieve the church info
	$logged_in_account = $this->session->userdata('user_name');
	
	// get the user detail
	$user = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('user_name'=>$logged_in_account),$arrAttribute=array('id', 'first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id','church_id', 'status'),$num=1,$orderBy='');
	
	// get the notice board contents
	$nbcontents = useraccount::loadDetails($tableName='tbl_churches_notice_board_contents',$arrFilter=array('church_id'=>$user['church_id'][0]),$arrAttribute=array('id', 'notice_board_content'),$num=NULL,$orderBy='');
	
	
	$data['nof_rec'] = useraccount::loadTotalRefRecord($where=array('church_id'=>$user['church_id'][0]), $fld = 'id', $tblname='tbl_churches_notice_board_contents');

	// load the view
	$view = 'church_admin/edit_notice_board_content';
	
	$this->load->view($view, array('data'=>$data, 'nbcontent'=>$nbcontents, 'user'=>$user, 'page_res'=>$page_res));
	
}//end function



function help_line_content(){
	
	$action  =  strip_tags($this->uri->segment(3));
	
	switch($action):
		
		case 'edit':
			
			$this->load_edit_help_line_page();
			
		break;
		
		
		case 'update':
			
			$this->load_update_help_line_page();
			
		break;
		

		default:
		
	endswitch;

	
}//end function


function  load_edit_help_line_page(){
	
	global $page_res;
	$this->general_page_resource();
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Edit Help Lines(s) | Christ Embassy Church Streaming Portal";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Kindly find below the Excel Format for Uploading Invite Detail.";
	$data['page_desc'] = "You are here : Church Admin => Help Lines => Edit";
	$data['flag_msg_status'] = "info";

	#retrieve the church info
	$logged_in_account = $this->session->userdata('user_name');
	
	// get the user detail
	$user = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('user_name'=>$logged_in_account),$arrAttribute=array('id', 'first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id','church_id', 'status'),$num=1,$orderBy='');
	
	// get the notice board contents
	$nbcontents = useraccount::loadDetails($tableName='help_lines',$arrFilter=array('church_id'=>$user['church_id'][0]),$arrAttribute=array('id', 'church_id', 'help_line'),$num=NULL,$orderBy='');
	
	
	$data['nof_rec'] = useraccount::loadTotalRefRecord($where=array('church_id'=>$user['church_id'][0]), $fld = 'id', $tblname='help_lines');

	// load the view
	$view = 'church_admin/edit_help_line_content';
	$page_res['page_name'] = "EDIT HELP LINES";
	
	$this->load->view($view, array('data'=>$data, 'nbcontent'=>$nbcontents, 'user'=>$user, 'page_res'=>$page_res));
	
}//end function

function load_update_help_line_page(){
	
	global $page_res;
	$this->general_page_resource();
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Update Help Line(s) | Christ Embassy Church Streaming Portal";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To update the Help Line, kindly fill out the detail on the below form.";
	$data['page_desc'] = "You are here : Church Admin => Help Lines => Update";
	$data['flag_msg_status'] = "info";
	$page_res['page_name'] = "UPDATE HELP LINE";

	#retrieve the church info
	$logged_in_account = $this->session->userdata('user_name');
	
	//get the notice board content id
	$id = intval($this->uri->segment(4));
	
	$data['id'] = $id;
	
	// get the user detail
	$user = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('user_name'=>$logged_in_account),$arrAttribute=array('id', 'first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id','church_id', 'status'),$num=1,$orderBy='');
	
	// get the notice board contents
	$nbcontents = useraccount::loadDetails($tableName='help_lines',$arrFilter=array('id'=>$id),$arrAttribute=array('id', 'help_line', 'church_id'),$num=1,$orderBy='');
	

	// load the view
	$view = 'church_admin/update_help_line_content';
	
	$this->load->view($view, array('data'=>$data, 'nbcontent'=>$nbcontents, 'page_res'=>$page_res));
	
}//end function

function approve_comment(){
	
	$comment_id = intval($this->uri->segment(3));
	// run the update query
	
	$flag_approved = mysql::update('tbl_service_blog_comments', array('approved'=>1), array('id'=>$comment_id));
	
	if($flag_approved) echo "success|The comment has been successfully approved.";
	
}//end function

function comments(){
	
	$actn = strip_tags($this->uri->segment(3));
	
	switch($actn){
	
		case 'approve':
			$this->load_approve_comment_page();
		break;
	
		default:
		
			header('Location: /churchadmin/dashboard');
		
	}
	
}//end function

function load_approve_comment_page(){
	
	global $page_res;
	$this->general_page_resource();
	
	//var_dump($page_res); exit;
	
	$comment = useraccount::loadDetails('tbl_service_blog_comments',$arrFilter=array('church_id'=>$page_res['church_id'], 'approved'=>0),array('id', 'account_name', 'name', 'church_id', 'stream_url', 'country', 'comment', 'time_posted', 'approved'),$num=NULL,$orderBy='');
	
	$data['ncomments'] = useraccount::loadTotalRefRecord($where=array('church_id'=>$page_res['church_id'], 'approved'=>0), $fld='id', $tblname='tbl_service_blog_comments');
	
	// load the view
	
	$view = "church_admin/approve_comments";
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Approve Comment(s) | Christ Embassy Virtual Church.";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To approve comment, kindly click on the approve icon in front of each comment.";
	$data['page_desc'] = "You are here : Church Admin => Comments => Approve.";
	$data['flag_msg_status'] = "info";
	$page_res['page_name'] = "APPROVE COMMENTS";
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'comment'=>$comment));
	
}//end function


function search(){
	
	global $page_res;
	$this->general_page_resource();
	
	// load the view
	
	$view = "church_admin/search";
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Search | Christ Embassy Virtual Church.";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To use the search functionality kindly use the features on the side menus on the display form.";
	$data['page_desc'] = "You are here : Church Admin => Search";
	$data['flag_msg_status'] = "info";
	$page_res['page_name'] = "SEARCH MENU";
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
	
}//end function


function live_service(){
	
	global $page_res;
	$this->general_page_resource();
	
	// load the view
	
	$view = "church_admin/live_service";
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Live Service | Christ Embassy Virtual Church.";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To use the search functionality kindly use the features on the side menus on the display form.";
	$data['page_desc'] = "You are here : Church Admin => Search";
	$data['flag_msg_status'] = "info";
	$page_res['page_name'] = "LIVE SERVICE";
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
	
	
}//end function


function cell_system(){

	global $page_res;
	$this->general_page_resource();
	
	//echo $page_res['user_id'];
	// load the view
	
	$view = "church_admin/cell_system";
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Cell System | Christ Embassy Virtual Church.";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To use the search functionality kindly use the features on the side menus on the display form.";
	$data['page_desc'] = "You are here : Church Admin => Search";
	$data['flag_msg_status'] = "info";
	$page_res['page_name'] = "CELL SYSTEM";
	
	//get the cells under this church
	$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
	
	$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" ");
	
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell'=>$cells));
	
}//end function

function cell(){

	//get user action
	$param = strip_tags($this->uri->segment(3));
	
	switch ($param):
	
		case 'create':
		
			$view = "church_admin/create_church_cell";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "Create Cell | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To create a church cell, kindly fill out the detail on the form below.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "CREATE CHURCH CELL";
			
			
			$this->create_new_cell($view, $data);
		break;
		
		
		case 'view':
			
			$view = "church_admin/view_church_cell";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "View Church Cells | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Below are list of present church cells.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "VIEW CHURCH CELLS";
	
			$this->view_church_cells($view, $data);
		
		break;
		
		
		case 'edit':
			
			$view = "church_admin/edit_church_cell";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "View Church Cells | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To edit a cell, kindly fill out the detail on the form below.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "EDIT CHURCH CELLS";
	
			$this->edit_church_cells($view, $data);
		
		break;
		
		default:
		
		
	
	endswitch;
	
	
	
}//end function

function create_new_cell($view, $data){
	
	global $page_res;
	$this->general_page_resource();
	

	$page_res['page_name'] = "CREATE CHURCH CELL";
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
	
}//end function

function view_church_cells($view, $data){
	
	global $page_res;
	$this->general_page_resource();
	
	
	$page_res['page_name'] = "VIEW | EDIT CHURCH CELL";
	
	//get the cells and no of cells
	$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id'], 'status'=>1),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
	
	$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" AND status=\"1\" ");
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell'=>$cells));
	
	
}//end function

function edit_church_cells($view, $data){
	
	global $page_res;
	$this->general_page_resource();
	
	
	$page_res['page_name'] = "EDIT CHURCH CELL";
	
	//get the cells and no of cells
	$cell_id = intval($this->uri->segment(4));
	$page_res['cell_id'] = $cell_id;
	
	//echo $page_res['cell_id']; exit;
	
	$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id'], 'id'=>$cell_id),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=1,$orderBy='');
	
	//$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" AND status=\"1\" ");
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell'=>$cells));
	
	
}//end function

function cell_leader(){
	
	//get user action
	$param = strip_tags($this->uri->segment(3));
	
	switch ($param):
	
		case 'create':
		
			$view = "church_admin/create_cell_leader";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "Create Cell Leader | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To create a cell leader, kindly fill out the detail on the form below.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell Leader";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "CREATE CELL LEADER";
			
			
			$this->create_cell_leader($view, $data);
		break;
		
		
		case 'view':
			
			$view = "church_admin/view_cell_leaders";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "View Church Cells | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Below are list of present church cells.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "VIEW CHURCH CELLS";
	
			$this->view_cell_leaders($view, $data);
		
		break;
		
		
		case 'edit':
			
			$view = "church_admin/edit_cell_leader";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "View Church Cells | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To edit a cell, kindly fill out the detail on the form below.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "EDIT CHURCH CELLS";
	
			$this->edit_cell_leader($view, $data);
		
		break;
		
		default:
		
		
	
	endswitch;
	
}//end function

function create_cell_leader($view, $data){
	
	global $page_res;
	$this->general_page_resource();
	
	$page_res['page_name'] = "CREATE CELL LEADER";
	
	//get the cells under this church
	$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
	
	$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" ");
	
	if($data['n_cells']==0){
		
	  $view = "church_admin/cell_not_created";
	  
	  $data['flag_msg_status'] = 'error';
	  $data['css_cls'] = 'error';
	  $data['info_msg'] = "<img src='/images/icons/invalid_small.png' align='absmiddle' />&nbsp;There are no current cells. Kindly click on the link <a href='/churchadmin/cell/create'>Create Cell</a> to create a new cell.";
	  
	  $data['page_title'] = 'Create Cell Leader | Christ Embassy Virtual Church.';
	  $data['page_desc'] = "CELL SYSTEM => Create Cell Leader";
	  
	  $this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell'=>$cells));
	  
	}else{
	
		$page_res['url'] = $_SERVER['REQUEST_URI'];
	
		$view = "church_admin/create_cell_leader";
		
		$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell'=>$cells));
	}
	
	
	//$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell'=>$cells));
	
}//end function


function view_cell_leaders($view, $data){
	
	global $page_res;
	$this->general_page_resource();
	
	$arrCell = array();
	
	$page_res['page_name'] = "VIEW CELL LEADERS";
	
	//get the cell leaders info
	
	$cell_leaders = useraccount::loadDetails('tbl_cell_leaders',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'cell_id', 'cell_leader_id', 'cell_leader_email', 'cell_leader_name',  'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
	
	//echo $page_res['church_id']; exit;
	
	$data['n_cell_leaders'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cell_leaders WHERE church_id=\"$page_res[church_id]\" ");
	
	//var_dump($cell_leaders); exit;
	
	//echo $data['n_cell_leaders']; exit;
	
	//get the cell name 
	for($i = 0; $i < $data['n_cell_leaders']; $i++){
		
		$arrCell['cell_name'][] = useraccount::getAttributeValue(array('id', 'church_id', 'cell_name'),'tbl_cells', array('id'=>$cell_leaders['cell_id'][$i]), $retval="cell_name");
		
	}
	
	
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell_leader'=>$cell_leaders, 'arrCell'=>$arrCell));
	
	
	
}//end function

function edit_cell_leader($view, $data){
	
	global $page_res;
	$this->general_page_resource();
	
	
	$page_res['page_name'] = "EDIT CELL LEADER DETAIL";
	
	//get the cells and no of cells
	$cell_leader_id = intval($this->uri->segment(4));
	$page_res['cell_leader_id'] = $cell_leader_id;
	
	//echo $page_res['cell_id']; exit;
	
	$cell_leader = useraccount::loadDetails('tbl_cell_leaders',$arrFilter=array('id'=>$cell_leader_id),array('id', 'church_id', 'cell_id', 'cell_leader_id', 'cell_leader_email', 'cell_leader_name', 'country', 'status', 'time_created', 'time_modified', 'cell_leader_pic'),$num=1,$orderBy='');
	
	//$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" AND status=\"1\" ");
	
	//get the cells under this church
	$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
	
	$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" ");
	
	//get this cell leader's cell name
	$page_res['cell_name'] = useraccount::getAttributeValue(array('id', 'church_id', 'cell_name'),'tbl_cells', array('id'=>$cell_leader['cell_id'][0]), $retval="cell_name");
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell_leader'=>$cell_leader, 'cell'=>$cells));
	
	
}//end function


function church_service(){
	
	//get user action
	$param = strip_tags($this->uri->segment(3));
	
	switch ($param):
	
		case 'set_timer':
		
			$view = "church_admin/set_service_timer";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "Set Service Timer | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To set a timer for a church service, kindly fill out the detail on the form below.";
			$data['page_desc'] = "You are here : Church Admin => Church Service=>Set Service Timer";
			$data['flag_msg_status'] = "info";
			
			
			
			$this->set_service_timer($view, $data);
		break;
		
		
		case 'view':
			
			$view = "church_admin/view_service_timer";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "View Church Cells | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Below are list of present church cells.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "VIEW SERVICE TIMER";
	
			$this->view_service_timer($view, $data);
		
		break;
		
		
		case 'edit':
			
			$view = "church_admin/edit_service_timer";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "View Church Cells | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To edit a cell, kindly fill out the detail on the form below.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "EDIT SERVICE TIMER";
	
			$this->edit_service_timer($view, $data);
		
		break;
		
		case 'cancel_timer':
			
			$view = "church_admin/cancel_timer";
	
			$data['css_cls'] = "info";
			$data['page_title'] = "View Church Cells | Christ Embassy Virtual Church.";
			$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To edit a cell, kindly fill out the detail on the form below.";
			$data['page_desc'] = "You are here : Church Admin => Create Cell";
			$data['flag_msg_status'] = "info";
			$page_res['page_name'] = "EDIT SERVICE TIMER";
	
			$this->cancel_service_timer($view, $data);
		
		break;
		
		
		default:
		
	endswitch;		
	
}//end function


function cancel_service_timer($view, $data){
	
	global $page_res;
	$this->general_page_resource();
	
	$page_res['page_name'] = "Cancel Service Timer";
	
	//get the cells under this church
	$timers = useraccount::loadDetails('tbl_online_timmer',$arrFilter=array('church_id'=>$page_res['church_id'], 'status'=>1),array('id', 'church_id', 'group_id', 'year', 'month', 'day', 'hour', 'minute', 'time_zone', 'service_day', 'status', 'time_posted'),$num=NULL,$orderBy='');
	
	$data['n_timer'] = useraccount::count_active_records($sql="SELECT * FROM tbl_online_timmer WHERE church_id=\"$page_res[church_id]\" AND status='1'");
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'timer'=>$timers));
	
}//end function


function set_service_timer($view, $data){
	
	global $page_res;
	$this->general_page_resource();
	
	$page_res['page_name'] = "SET SERVICE TIMER";
	
	//get the cells under this church
	$cells = useraccount::loadDetails('tbl_cells',$arrFilter=array('church_id'=>$page_res['church_id']),array('id', 'church_id', 'cell_name', 'cell_desc', 'cell_logo', 'country', 'status', 'time_created', 'time_modified'),$num=NULL,$orderBy='');
	
	$data['n_cells'] = useraccount::count_active_records($sql="SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" ");
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell'=>$cells));
	
	
}//end functin

function cell_system_report(){
	
	
	
}//end function

function chatsystem(){
	
	global $page_res;
	$this->general_page_resource();
	
	$page_res['page_name'] = "CHAT SYSTEM";
	
	$view = "church_admin/chatsystem";
	
	$data['css_cls'] = "info";
	$data['page_title'] = "Chat System | Christ Embassy Virtual Church.";
	$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Kindly find below list of users available for chat.";
	$data['flag_msg_status'] = "info";
	
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$page_res['church_id']),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream', 'user_name'),$num=1,$orderBy='');
	
	//get the chat users
	$online_users = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('church_id'=>$page_res['church_id'],'is_online'=>1),$arrAttribute=array('id','first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'is_online','church_id','created_by', 'status', 'profile_pic', 'church_id'),$num=NULL,$orderBy='');
				
	#sql...
	$sql = "SELECT id, first_name, last_name, user_name, user_pwd, email, church_id, is_online, created_by, status FROM tbl_users WHERE church_id=\"$page_res[church_id]\" AND is_online=\"1\" ";
	
	$data['n_online_users'] = useraccount::count_active_records($sql);
	
	//get chat admin users
	
	//$page_res['last_chat_user'] = useraccount::getLastAttributeValue(array(''), $tblname, $where, $retval);
	
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'church_detail'=>$church_detail, 'online_user'=>$online_users));
	
	
}//end function


function save_to_chat_admin_users(){
	
	global $page_res;
	$this->general_page_resource();
	
	$chatuser = strip_tags($this->uri->segment(3));
	
	mysql::insert(array('user_account'=>$chatuser, 'admin_account'=>$page_res['church_account_name'], 'time_connected'=>misc::serverTime()), 'tbl_admin_and_user_chat_cn');
	
	$page_res['last_user_id']  = mysql_insert_id();
	
	
	
	
	
	//echo $chatuser;
	
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
	$chat_user = intval($this->uri->segment(3));
	
	$page_res['chat_user'] = $chat_user;
	$data['title'] = "Chat System - Virtual Church.";
	
	//lets get the admin account connected to this chat user
	$page_res['chat_admin_user'] = useraccount::getLastAttributeValue($detail=array('admin_account', 'user_account'), $tblname="tbl_admin_and_user_chat_cn", $where=array('admin_account'=>$page_res['logged_in_account']), $retval="user_account");
	
	$data['chat_user_id'] = $chat_user;
	
	
	$chat_login_time = useraccount::getLastAttributeValue(array('time_connected', 'admin_account', 'user_account'), 'tbl_admin_and_user_chat_cn', array('admin_account'=>$page_res['logged_in_account'], 'user_account'=>$chat_user), $retval='time_connected');
	
	
	$this->session->set_userdata(array('chat_login_time'=>$chat_login_time));
	$data['chat_login_time']=$chat_login_time;
	
	//echo $chat_login_time; exit;
	
	$user_fname = useraccount::getAttributeValue(array('id', 'first_name'), 'tbl_users', array('id'=>$chat_user), $retval='first_name');
	$user_lname = useraccount::getAttributeValue(array('id', 'last_name'), 'tbl_users', array('id'=>$chat_user), $retval='last_name');
	
	$data['full_name'] = $user_fname.' '.$user_lname;
	
	$this->load->view("church_admin/chat", array("page_res"=>$page_res, 'data'=>$data));
}//end function


function savechatpost(){
	
	global $page_res;
	$this->general_page_resource();
	
	//$chat_user = strip_tags($this->uri->segment(3));
	$page_res['chat_admin_user'] = useraccount::getLastAttributeValue($detail=array('admin_account', 'user_account'), $tblname="tbl_admin_and_user_chat_cn", $where=array('admin_account'=>$page_res['logged_in_account']), $retval="user_account");
	
	
	
	$receiver_account_id = intval($_POST['receiver_account_id']);
	$sender_account_name = strip_tags($_POST['sender_account_name']);
	$chat_login_time = intval($_POST['chat_login_time']);
	
	//$admin_account_name = useraccount::getLastAttributeValue($detail=array('admin_account', 'user_account'), $tblname="tbl_admin_and_user_chat_cn", $where=array('admin_account'=>$page_res['logged_in_account']), $retval="user_account");
	
	$ddd = strip_tags($_POST['message']);
	$ddd = $this->sanitize($ddd);
	//$query = "INSERT INTO message (message) VALUES ('$ddd')";
	
	//echo $ddd; exit;
	
	if(misc::required($ddd)){
	
		$isposted = mysql::insert(array("chat_session_id"=>$chat_login_time, "message"=>$ddd, "sender"=>$sender_account_name, "receiver"=>$receiver_account_id,"recd"=>1, 'time_posted'=>misc::serverTime(), 'church_id'=>$page_res['church_id']), "tbl_chat_messages");
		
		//echo $isposted; exit;
		
		//echo "message processed successfully.";
		
	}
	
	
}//end function


function refreshchatpost(){
	
	global $page_res;
	$this->general_page_resource();
	
	$chat_user_id = intval($this->uri->segment(3));
	$chat_login_time = intval($_GET['mode']);
	
	
	$sender_account="";
	$page_res['chat_user'] = useraccount::getLastAttributeValue($detail=array('admin_account', 'user_account'), $tblname="tbl_admin_and_user_chat_cn", $where=array('admin_account'=>$page_res['logged_in_account']), $retval="user_account");
	
	$chat_user = $page_res['chat_user'];

	//echo $today(); exit(0);
	//$result = mysql_query("SELECT * FROM tbl_chat_messages WHERE sender=\"$chat_user_id\" OR receiver=\"$chat_user_id\" AND chat_session_id=\"$chat_login_time\" ORDER BY id DESC LIMIT 10");
	
	$result = mysql_query("SELECT * FROM tbl_chat_messages WHERE chat_session_id=\"$chat_login_time\" ORDER BY id DESC LIMIT 10");
	
	//$result = mysql_query("SELECT * FROM tbl_chat_messages WHERE receiver=\"$chat_user_id\" ORDER BY id DESC LIMIT 10");


	while($row = mysql_fetch_array($result))
	  {
		  
		
		if($row['sender'] == $page_res['church_account_name']):
			$sender_account = $page_res['church_account_name'];
		endif;
		
		if($row['sender'] == $chat_user_id):
		  //$sender_account = $page_res['church_account_name'];
		  $user_fname = useraccount::getAttributeValue(array('id', 'first_name'), 'tbl_users', array('id'=>$chat_user_id), $retval='first_name');
		  $user_lname = useraccount::getAttributeValue(array('id', 'last_name'), 'tbl_users', array('id'=>$chat_user_id), $retval='last_name');
		  
		  $full_name = $user_fname.' '.$user_lname;
		  $sender_account = $full_name;
		endif;
		
		
	  echo '<p>'.'<span>'.$sender_account.'</span>'. '&nbsp;&nbsp;' . $row['message'].'&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y g:i:s A",$row['time_posted']).'</p>';
	  
	 // echo '<p>'.'<span>'.$full_name.'</span>'. '&nbsp;&nbsp;' . $row['message'].'&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y h:i:s A",$row['time_posted']).'</p>';
	  
	  }
	
	//mysql_close($con);
	
}//end function


function soul_win_tool(){
	
	global $page_res;
	$this->general_page_resource();
	
	
	
	
}//end function


function uploadCellOutline(){
		
		global $page_res;
		$this->general_page_resource();
		
        $view = 'noskin/myaccount/uploadpicture';
        $seenform = $this->input->post('seenform');
        $userID = $page_res['user_id'];  
         if(empty($seenform)){
             $this->load->view($view);
             return;
         }
		 
		 
		 //echo json_encode(array('status'=>true, 'message'=>$_FILES['picture']['mime']));exit;
        //check validity of uploaded file
        if(empty($_FILES['picture']['name']) || !file_exists($_FILES['picture']['tmp_name'])){
            echo json_encode(array('status'=>false,'error'=>'Please select a pdf file for upload'));
            exit;
            
        } 
        //if control gets here, a file was uploaded.. find out if its d file we are expecting
		
		
		//echo json_encode(array('status'=>false,'error'=>$arrFormat[1]));exit; 
		$flag_valid = $this->misc->isValidMime($_FILES['picture']);
		
		//echo json_encode(array('status'=>false,'error'=>$flag_valid));
           //exit; 
        if(!$flag_valid){
           echo json_encode(array('status'=>false,'error'=>'Invalid file format. Please note that only PDF file formats are currently supported.'));
           exit; 
        }
        /// check the SIZE
        if(filesize($_FILES['picture']['tmp_name']) > 512000){
            //file is too large
            echo json_encode(array('status'=>false,'error'=>'File is too large. The maximum file size is 500KB'));
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
			$this->mysql->insert(array('church_id'=>$page_res['church_id'], 'cell_outline_url'=>$savePath,'time_posted'=>time(), 'status'=>1), 'tbl_cell_outlines');
			
            $this->session->set_userdata('cellOutLinePath', $savePath);
			
            echo json_encode(array('status'=>true,'message'=>'&nbsp;Cell Outline successfully uploaded.'));
			
            exit;
        }
    }//end function
	
	
	
	
	function schedulemeeting(){
		
		global $page_res;
		$this->general_page_resource();
		
		echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;I am intelligent.")); exit;
		
		$seenform = $this->input->post('seenform2');
        // first we need to load the cellID of the cell leader
        //$churchID = $this->session->userdata('churchID');
        //we need to load the church member as participants and pass it in to the view
        //$arrParticipants = $this->useraccount->loadUserInfo($this->churchmanager->loadChurchMembers($churchID),array('userID','firstName','lastName'));
        //var_dump($arrParticipants);exit;
        if($seenform != 'schedulecellmeeting'){
                 ///no form submitted.... load the form
                echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;Kindly ensure aall fields are correctly filled."));
                exit; 
                
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
			
			if($hr==0){
                echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;Please enter a valid time for the meeting"));
                exit;
            }
			
            if(!is_numeric($hr) || !is_numeric($min)){
                echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;Please enter a valid time for the meeting"));
                exit;
            }
            /*if(!isset($_POST['privacy'])){
                echo json_encode(array('status'=>false,'error'=>'Please accept the terms of use.'));
                exit;
            }*/
            ///chekc the validaity of the date entered
            if(!checkdate($month,$day,$year)){
                $errorMsg = "$day/$month/$year is an invalid date.";
                echo json_encode(array('status'=>false,'error'=>$errorMsg));
                exit;
            }
            //check for dates in the past
            $tStamp = mktime($hr,$min,0,$month,$day,$year);
           
            if($tStamp <= Misc::serverTime()){
                 echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;Meeting time and date are in the past. Please enter a date in the future."));
                exit;
                
            }
            //check the duration of the meeting
            //$dur = 1234567897;
            if($dur > (90*60)){
                //duration is longer the maximum allowed
                //convert maximum to hours
                $maxHr = ((90*60)/3600);
                echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;Meeting duration is too long. The Maximum duration is $maxHr hours"));
                exit;
                
                $err = true;
            }
           // $arrParticipants = $this->input->post('participants');
           /* if(count($arrParticipants) < 1){
                //no participant.. alert the user
                echo json_encode(array('status'=>false,'error'=>"Please select participants."));
                exit;
            }  */
            //var_dump($_POST['participants']);exit;
            if($err){
                ///we have errors
               
                $this->load->view('churchsystem/schedulecellmeeting');
                return;
            }
            else{ //No errors 
                //proceed to schedule the meeting
                $arrInsert = array();
				$arrInsert['church_id']  = $page_res['church_id'];
                $arrInsert['meeting_type'] = CELL_MEETING_TYPE;
				$arrInsert['meeting_title'] = $this->input->post('meetingTitle');
                $arrInsert['meeting_time'] =  mktime($hr,$min,0,$month,$day,$year);
                $arrInsert['meeting_date'] =  mktime($hr,$min,0,$month,$day,$year); //tht is d ID for cell meetings
				$arrInsert['meetingType'] = 2; //tht is d ID for cell meetings
                $pubPoint = 'pub'.mt_rand(1,9).$this->misc->genRand(mt_rand(15,20));
				$arrInsert['publishing_point'] = $pubPoint;
                $arrInsert['meeting_duration'] = $dur;
				$arrInsert['time_posted'] = time();
				$arrInsert['status'] = 1;
               // $arrInsert['amountPayable'] = $this->meetingmanager->calculatePayment(array('numOfParticipants'=>count($arrParticipants),'duration'=>$dur));
                
                
                //load the MeetingManager Model
                //$this->load->model('meetingmanager');
                //create the meeting
              
                $res = $this->mysql->insert($arrInsert, 'tbl_meetings');
                //$meetingID = $res['id'];
                //add privileges
               // $this->meetingmanager->grantPrivilege($arrParticipants,$meetingID);
                if($res){
                  // $this->flashnotice->add("Meeting was successfully scheduled.",'success');
                  $msg = "Meeting was successfully scheduled.";
                    echo json_encode(array('status'=>true,'message'=>"<img src='/images/icons/success_small.png' />&nbsp;Meeting was successfully scheduled."));
                    exit;
                   
                }
                else{
                    //$this->flashnotice->add($res['error'],'error');
                    echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;Kindly ensure all fields are correctly filled"));
                    exit; 
                   
                }
                
            }   
        }   
		
		
	}//end function

	
	function cellmeeting(){
		
		$mode = strip_tags($this->uri->segment(3));
		
		switch($mode):
		
			case 'view':
				$this->view_scheduled_cellmeeting();
			break;
			
			
			case 'edit':
				$this->edit_scheduled_cellmeeting();
			break;
			
			default:
				$this->view_scheduled_cellmeeting();
				
		endswitch;
		
	}//end function
	
	function view_scheduled_cellmeeting(){
		
		global $page_res;
		$this->general_page_resource();
		
		//load the scheduled meetings yet to be done
		
		$meeting_info = useraccount::loadDetails($tblname="tbl_meetings",array('church_id'=>$page_res['church_id'], 'status'=>1, 'meeting_type'=>CELL_MEETING_TYPE),$arrAttribute=array('id','church_id','meeting_type','meeting_title','meeting_time','meeting_date','meeting_duration','time_posted', 'status'),$num=NULL,$orderBy='');
		
		//var_dump($meeting_info);
		
		$page_res['page_name'] = "Scheduled Cell Meetings";
	
		$view = "church_admin/soul_win_tool";
		
		$data['css_cls'] = "info";
		$data['page_title'] = "Scheduled Cell Meetings | Christ Embassy Virtual Church.";
		$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; Kindly find below list of scheduled cell meetings.";
		$data['flag_msg_status'] = "info";
		
		//load the view
		$view = "church_admin/view_scheduledmeeting";
		$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'meeting_info'=>$meeting_info));
		
	}//end function
	
	
	function edit_sheduled_cellmeeting(){
		
		global $page_res;
		$this->general_page_resource();
		
	}//end function


function uploadtract(){
	
		global $page_res;
		$this->general_page_resource();
		

				
//////////////////////////////////////////////////////////////////////////////////////////////////////////

		$view = 'church_admin/uploadtract';
        $seenform = $this->input->post('seenform');
        //$userID = $this->session->userdata('userID');  
		 $userID = $page_res['user_id'];
		 
         if(empty($seenform)){
             $data['flag_msg_status'] = 'info';
				$data['css_cls'] = 'info';
				$data['msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To update your profile picture, kindly fill out the detail on the form below.';
				
				$data['css_cls'] = "info";
				$data['flag'] = "info";
				$data['page_title'] = ":: Upload Tract - Christ Embassy Virtual Church ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> &nbsp; To upload a tract, please fill out the form below.";
				//$data['page_desc'] = "You are here : Church Admin => Content => Change Banner";
				$page_res['page_name'] = "Upload Tract";
				
				#retrieve the users online.
				$logged_in_account = $this->session->userdata('user_name');
				$church_id = $page_res['church_id'];
				
				$church_banner = useraccount::getLastAttributeValue(array('id', 'church_id', 'church_banner'), $tblname='tbl_church_banners', array('church_id'=>$church_id), $retval='church_banner');
				
				if(!$church_banner){
					$data['church_banner'] = "/images/banner.png";	
				}else{
					$data['church_banner'] = $church_banner;
				}
				
				$data['church_id'] = $church_id;
				$data['logged_in_account'] = $logged_in_account;
				
				
				// get the view content
				
				$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');
			
				#get notice board content
				$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
				
				$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
				
				//echo $notice_board['notice_board_content'][0]; exit;
			  
				$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
			
				#lets obtain the church detail for this member/guest
				$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$user_detail['church_id'][0]),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');
			  
				#get help lines based on this church id
				$support = $this->useraccount->loadDetails($tblname="help_lines",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','help_line', 'status'),$num=NULL,$orderBy='');
				
				#get the category of givings
				$giving = $this->useraccount->loadDetails($tblname="tbl_giving_cats",$arrFilter=array('status'=>1),$arrAttribute=array('id','giving_cat', 'status'),$num=NULL,$orderBy='');
				$data['ngiving'] = useraccount::loadTotalRefRecord($where=array('status'=>1), $fld='id', $tblname='tbl_giving_cats');
				
				
				#get the payment methods
				$payment_method = $this->useraccount->loadDetails($tblname="tbl_payment_methods",$arrFilter=array('active'=>1),$arrAttribute=array('id','pay_name', 'active', 'api_url'),$num=NULL,$orderBy='');
				$data['npmethod'] = useraccount::loadTotalRefRecord($where=array('active'=>1), $fld='id', $tblname='tbl_payment_methods');
				
				#get the invite detail
				$service_detail = $this->useraccount->loadDetails($tblname="tbl_church_service_invites",$arrFilter=array('invite_email'=>$user_detail['email'][0]),$arrAttribute=array('id','church_id', 'invite_first_name', 'invite_last_name', 'invite_email', 'invite_password', 'service_year', 'service_month', 'service_day', 'time_posted'),$num=1,$orderBy='');
				
				
				
				#get elp Lines
				$data['n_help_lines'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='help_lines');
				
				
				$this->load->view($view,array('payment_method'=>$payment_method, 'service_detail'=>$service_detail, 'giving'=>$giving, 'notice_board'=>$notice_board,'church_detail'=>$church_detail, 'support'=>$support, 'data'=>$data, 'user_detail'=>$user_detail, 'page_res'=>$page_res));
				 return;
		
	}else{//end else
            
        
        //check validity of uploaded file
        if(empty($_FILES['picture']['name']) || !file_exists($_FILES['picture']['tmp_name'])){
            echo json_encode(array('status'=>false,'error'=>'Please select a file for upload'));
            exit;
            
        } 
        //if control gets here, a file was uploaded.. find out if its d file we are expecting
        if(!$this->misc->isValidPictureUpload($_FILES['picture'])){
           echo json_encode(array('status'=>false,'error'=>'Invalid file format. Please note that only JPG, GIF and PNG file formats are currently supported.'));
           exit; 
        }
        /// check the SIZE
        if(filesize($_FILES['picture']['tmp_name']) > CUSTOM_MAX_PICTURE_SIZE){
            //file is too large
            echo json_encode(array('status'=>false,'error'=>'File is too large. The maximum file size is 500KB'));
            exit;
        }
        //if control gets here.. we are good to add
        //generate the save path
        $pathInfo = pathinfo($_FILES['picture']['name']);
		$savePath1 = CUSTOM_TRACT_PATH.$this->misc->genRand(mt_rand(5,10)).'.'.$pathInfo['extension'];
        $savePath = "./".$savePath1;
        //copy the file
        if(move_uploaded_file($_FILES['picture']['tmp_name'],$savePath)){
            ///update the user's record
            //$this->useraccount->updateUserAtrribute($userID,'userPicPath',$savePath) ;
			$this->mysql->insert(array('church_id'=>$page_res['church_id'], 'tract_name'=>$_FILES['picture']['name'], 'pic_path'=>"/".$savePath1, 'status'=>1,'time_posted'=>misc::serverTime()), $tbl="tbl_tracts");
			
            $this->session->set_userdata('tract_path', $savePath);
			
            echo json_encode(array('status'=>true,'message'=>'The tract has been successfully uploaded.'));
            exit;
        }
    }
	
	
}//end function



///////////////////////////REPORT SECTION/////////////////////////////


function report(){
	
	global $page_res;
		$this->general_page_resource();
		
		$type = misc::cleanUserName($this->uri->segment(3));
		
		switch ($type):
		
			case 'index':
			
				$view = 'church_admin/report_index';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Report Analysis ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Admin Account, kindly fill out the form below.";
				$page_res['page_name'] = "<span style='font-weight:bolder;'>Report System</span>";
				
				$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
			
			break;

			default:
				$view = 'church_admin/report_index';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Report Analysis ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Admin Account, kindly fill out the form below.";
				$page_res['page_name'] = "<span style='font-weight:bolder;'>Report System</span>";
				
				$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
		endswitch;
		
	
}//end function


//////////////////////////////////////////////////////////////////////////////////////////////
	
}//end class churchadmin