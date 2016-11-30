<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class centraladmin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		authmanager::redirect_user();
		$this->load->library(array('pagination'));
	}//end function
	
	public function index()
	{
		$this->dashboard();
	}//end function
	
	function dashboard(){
		global $page_res;
		$this->general_page_resource();
		$data['page_title'] = "Welcome to CE Church Live Streaming Portal";
		$this->load->view('central_admin/vw_dashboard', array('data'=>$data, 'page_res'=>$page_res));
	}//end function
	
	//////////////////////////////////////////////////////////////////////////////////
	
	
	
	function churchadmin(){
		global $page_res;
		$this->general_page_resource();
		$actn = misc::cleanUserName($this->uri->segment(3));
		
		switch ($actn):
			case 'create':
				$view = 'central_admin/create_church_account';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Create Church Account ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Admin Account, kindly fill out the form below.";
				$data['page_desc'] = "You are here : Central Admin => Church Admin Account => Create";
				
				//lets retrieve the churches and access levels
				$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
		
				
				$data['nof_items'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
				
				$user_name = $this->session->userdata('user_name');
				$_access_level = $this->useraccount->loadAccessLevels();
				
				$data['n_access_level'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_access_levels");
				#loading the view
			
				$this->load->view($view, array('data'=>$data,'churches'=>$_churches,'access_levels'=>$_access_level));
			break;
			#-------------------------------------
			case 'view':
				$view = 'central_admin/view_admin_users';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Create Church Account ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Admin Account, kindly fill out the form below.";
				$data['page_desc'] = "You are here : Central Admin => Church Admin Account => View";
				
				#set pagination parameters
				$offset = (is_numeric($this->uri->segment(4)))?(int)$this->uri->segment(4):0;
				$config['base_url'] = '/centraladmin/churchadmin/view/';
				$config['per_page'] = 20; 
				$config['uri_segment'] = 5;
				$config['use_page_numbers'] = FALSE;
				$limit = (int)$config['per_page'];
				$data['per_page'] = $config['per_page'];

				#lets fetch the church admin details
				$param = $this->useraccount->get_access_level_id($this->misc->cleanName($this->uri->segment(2)),$tblname='tbl_access_levels');
				//$_admin_users = $this->useraccount->loadDetailsAndPaginate($tableName="tbl_users",$arrFilter=array('access_level_id'=>$param),$arrAttribute=array('id','first_name','last_name','user_name','user_pwd','access_level_id','church_id','date_created','status'),$num="$offset, $limit",$orderBy='');
				$_admin_users = $this->useraccount->load_church_accounts();
				$data['nof_items'] = $this->useraccount->loadTotalRecord('id', $tblname='tbl_users');
				
				$totalrecord = array('size'=>$data['nof_items'],'per_page'=>$limit);
				$config['total_rows'] = $data['nof_items'];
				
				#lets initialize the pagination section
				$this->pagination->initialize($config);
				$data['paginate'] =  $this->pagination->create_links();
				
				#loading the view	
				$this->load->view($view, array('data'=>$data,'admin_user'=>$_admin_users,'totalrecord'=>$totalrecord));
				
			break;
			
			//////////////////////////
			
			case 'edit':
					$view = 'central_admin/edit_admin_user';
					$data['css_cls'] = "info";
					$data['page_title'] = ":: Christ Embassy Live Streaming - Edit Admin User Account ::";
					$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To EDIT an Admin User Account, kindly fill out the form below.";
					$data['page_desc'] = "You are here : Central Admin => Church Admin Account => Edit";
					#retrieve the admin ID
					$id = intval($this->uri->segment(4));
					#obtain the specific user detail
					
					//lets retrieve the churches and access levels
					$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
				
					$data['nof_items'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
				
				
				
				$_access_level = $this->useraccount->loadAccessLevels();
				
				$data['n_access_level'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_access_levels");
				$_admin_user = $this->useraccount->loadDetails($tableName="tbl_users",$arrFilter=array('id'=>$id),$arrAttribute=array('id','first_name','last_name','user_name','user_pwd','email','access_level_id','church_id','date_created'),$num=1,$orderBy='');
				#loading the view
				
					$this->load->view($view, array('data'=>$data,'churches'=>$_churches,'access_levels'=>$_access_level,'admin_user'=>$_admin_user));

			break;

			default:
			
				header("Location:/centraladmin/");
				
		
		
		endswitch;
	}//end function
	
	/////////////
	function report(){
		
		global $page_res;
		$this->general_page_resource();
		
		$type = misc::cleanUserName($this->uri->segment(3));
		
		switch ($type):
		
			case 'index':
			
				$view = 'central_admin/report_index';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Report Analysis ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Admin Account, kindly fill out the form below.";
				$page_res['page_name'] = "<span style='font-weight:bolder;'>Report System</span>";
				
				$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
			
			break;

			default:
				$view = 'central_admin/report_index';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Report Analysis ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Admin Account, kindly fill out the form below.";
				$page_res['page_name'] = "<span style='font-weight:bolder;'>Report System</span>";
				
				$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
		endswitch;
		
	}//end function
	
	
	function activate_user(){
		
		  $userID = intval($this->uri->segment(3));
		  if(empty($userID)){
            //$this->flashnotice->add('Error activating account.','error');
            header("Location:/centraladmin/manageaccount/");
            exit;
         }
        //validate
        $arrUserInfo = $this->useraccount->loadRefUser($userID,'tbl_churches');
     
        if(!is_array($arrUserInfo)){
            //userID does not exist
            //$this->flashnotice->add('Error activating account.','error');
            header("Location:/centraladmin/manageaccount/error/");
            exit;
            
        }

        if($arrUserInfo['status'][0] == '0'){
            $this->useraccount->activateAccount($userID,$tblname='tbl_churches');
            //$this->flashnotice->add('Your account was successfully activated.','success'); 
            header("Location:/centraladmin/manageaccount/success/");
            exit;  
        }
        if($arrUserInfo['status'][0] == '1'){
            //$this->useraccount->activateAccount($userID);
            //$this->flashnotice->add('Account already activated.','info');   
            header("Location:/centraladmin/manageaccount/error/");
            exit;
        }
      

	}//end function
	
	function deactivate_user(){
		 $userID = intval($this->uri->segment(3));
		  if(empty($userID)){
            //$this->flashnotice->add('Error activating account.','error');
            header("Location:/centraladmin/manageaccount/derror/");
            exit;
        }
        //validate
        $arrUserInfo = $this->useraccount->loadRefChurch($userID,'tbl_churches');
     
        if(!is_array($arrUserInfo)){
            //userID does not exist
            //$this->flashnotice->add('Error activating account.','error');
            header("Location:/centraladmin/manageaccount/derror/");
            exit;
            
        }

        if($arrUserInfo['status'][0] == '1'){
            $this->useraccount->DeactivateAccount($userID,$tblname='tbl_churches');
            //$this->flashnotice->add('Your account was successfully activated.','success'); 
            header("Location:/centraladmin/manageaccount/dsuccess/");
            exit;  
        }
        if($arrUserInfo['status'][0] == '1'){
            //$this->useraccount->activateAccount($userID);
            //$this->flashnotice->add('Account already activated.','info');   
            header("Location:/centraladmin/manageaccount/error/");
            exit;
        }
      
	}//end function
	
	function manageaccount(){
		
		global $page_res;
		$this->general_page_resource();
		
		
		$view = 'central_admin/manage_account';
				$data['css_cls'] = "";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Manage User Account ::";
				$data['info_msg'] = "";
				$data['page_desc'] = "";
				
				#lets initiate the pagination criteria
				$this->load->library('pagination');
				$offset = (is_numeric($this->uri->segment(3)))?(int)$this->uri->segment(3):0;
				$config['base_url'] = '/centraladmin/manageaccount/';
				$config['per_page'] = 25; 
				$config['uri_segment'] = 5;
				$config['use_page_numbers'] = FALSE;
				$limit = (int)$config['per_page'];
				$data['per_page'] = $config['per_page'];
			
			//$aid = $this->useraccount->not_this_id($tblname="tbl_users", $where=array('user_name'=>$this->session->userdata('user_name')), $detail=array('id','user_name','access_level_id'), $retval="access_level_id");
		
				
			$data['nof_rec'] = $this->useraccount->loadTotalRecord('id', $tblname='tbl_churches');
				
				$totalrecord = array('size'=>$data['nof_rec'],'per_page'=>$limit);
				$config['total_rows'] = $data['nof_rec'];
				
				#lets initialize the pagination section
				$this->pagination->initialize($config);
				$data['paginate'] =  $this->pagination->create_links();
				#get user access level
			
				$users = $this->useraccount->load_church_accounts($offset, $limit);
				
				#load the view
				$this->load->view($view, array('data'=>$data,'users'=>$users,'totalrecord'=>$totalrecord, 'page_res'=>$page_res));
		
	}//end function
	
	
	function notification(){
		
		global $page_res;
		$this->general_page_resource();
		
		
		$param = $this->misc->cleanUrlSegment($this->uri->segment(3));
		
		switch ($param):
			case'create':
			
			break;
		
		default:
			header("Location:/centraladmin/dashboard/");
		endswitch;
		
	}//end function
	
	
	function superusers(){
		$actn = misc::cleanUserName($this->uri->segment(3));
		
		switch ($actn):
			case 'create':
				$view = 'central_admin/create_superusers';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Create Church Account ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Central Admin Account, kindly fill out the form below.";
				$data['page_desc'] = "You are here : Central Admin => Super Users => Create";
				
				//lets retrieve the churches and access levels
				$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
		
				
				$data['nof_items'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
			
				$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
		
				
				$data['nof_items'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
				$_access_level = $this->useraccount->loadAccessLevels();
				#loading the view
			
				$this->load->view($view, array('data'=>$data,'churches'=>$_churches,'access_levels'=>$_access_level));
			break;
			
			#-------------------------------------
			case 'view':
				$view = 'central_admin/view_superusers';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - View Central Users ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Admin Account, kindly fill out the form below.";
				$data['page_desc'] = "";
				
				#set pagination parameters
				$offset = (is_numeric($this->uri->segment(4)))?(int)$this->uri->segment(4):0;
				$config['base_url'] = '/centraladmin/superusers/view/';
				$config['per_page'] = 20; 
				$config['uri_segment'] = 5;
				$config['use_page_numbers'] = FALSE;
				$limit = (int)$config['per_page'];
				$data['per_page'] = $config['per_page'];

				#lets fetch the church admin details
				//$param = $this->useraccount->get_access_level_id($this->misc->cleanName($this->uri->segment(2)),$tblname='tbl_access_levels');
				//echo $param;
				//exit;
				$_admin_users = $this->useraccount->loadDetailsAndPaginate($tableName="tbl_users",$arrFilter=array('access_level_id'=>1),$arrAttribute=array('id','first_name','last_name','user_name','user_pwd','access_level_id','church_id','date_created','status'),$num="$offset, $limit",$orderBy='');
				
				
				$data['nof_items'] = $this->useraccount->loadTotalRefRecord(array('access_level_id'=>1), 'id', $tblname='tbl_users');
				
				$totalrecord = array('size'=>$data['nof_items'],'per_page'=>$limit);
				$config['total_rows'] = $data['nof_items'];
				
				#lets initialize the pagination section
				$this->pagination->initialize($config);
				$data['paginate'] =  $this->pagination->create_links();
				
				#loading the view	
				$this->load->view($view, array('data'=>$data,'admin_user'=>$_admin_users,'totalrecord'=>$totalrecord));
				
			break;
			
			case 'activate_user':
			
						 $userID = intval($this->uri->segment(4));
						
						  if(empty($userID)){
						  //$this->flashnotice->add('Error activating account.','error');
						  header("Location:/centraladmin/superusers/view/error");
						  exit;
						  }
						  //validate
						  $arrUserInfo = $this->useraccount->loadRefUser($userID,'tbl_users');
						  
						  if(!is_array($arrUserInfo)){
						  //userID does not exist
						  //$this->flashnotice->add('Error activating account.','error');
						  header("Location:/centraladmin/superusers/view/error/");
						  exit;
						  
						  }
						  
						  if($arrUserInfo['status'][0] == '0'){
						  $this->useraccount->activateAccount($userID,$tblname='tbl_users');
						  //$this->flashnotice->add('Your account was successfully activated.','success'); 
						  header("Location:/centraladmin/superusers/view/success/");
						  exit;  
						  }
						  if($arrUserInfo['status'][0] == '1'){
						  //$this->useraccount->activateAccount($userID);
						  //$this->flashnotice->add('Account already activated.','info');   
						  header("Location:/centraladmin/superusers/view/error/");
						  exit;
						  }
			break;
			
			case 'deactivate_user':
							$userID = intval($this->uri->segment(4));
							  if(empty($userID)){
								//$this->flashnotice->add('Error activating account.','error');
								header("Location:/centraladmin/superusers/view/derror/");
								exit;
							  }
							  //validate
							  $arrUserInfo = $this->useraccount->loadRefUser($userID,'tbl_users');
							  
							  if(!is_array($arrUserInfo)){
								//userID does not exist
								//$this->flashnotice->add('Error activating account.','error');
								header("Location:/centraladmin/superusers/view/derror/");
								exit;
								
							  }
							  
							  if($arrUserInfo['status'][0] == '1'){
								$this->useraccount->DeactivateAccount($userID,$tblname='tbl_users');
								//$this->flashnotice->add('Your account was successfully activated.','success'); 
								header("Location:/centraladmin/superusers/view/dsuccess/");
								exit;  
							  }
							  if($arrUserInfo['status'][0] == '1'){
								//$this->useraccount->activateAccount($userID);
								//$this->flashnotice->add('Account already activated.','info');   
								header("Location:/centraladmin/superusers/view/error/");
								exit;
							  }
			
			
			break;
			//////////////////////////
			
			case 'edit':
					$view = 'central_admin/edit_superuser';
					$data['css_cls'] = "info";
					$data['page_title'] = ":: Christ Embassy Live Streaming - Edit Admin User Account ::";
					$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To EDIT a Central Admin User Account, kindly fill out the form below.";
					$data['page_desc'] = "You are here : Central Admin => Super Users => Edit";
					#retrieve the admin ID
					$id = intval($this->uri->segment(4));
					#obtain the specific user detail
					
					//lets retrieve the churches and access levels
					$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
				
					$data['nof_items'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
				
				$_churches = $this->useraccount->loadChurchDetail($tableName="tbl_churches");
				$data['nof_items'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_churches");
				$_admin_user = $this->useraccount->loadDetails($tableName="tbl_users",$arrFilter=array('id'=>$id),$arrAttribute=array('id','first_name','last_name','user_name','user_pwd','email','access_level_id','church_id','date_created'),$num=1,$orderBy='');
				#loading the view
				
				$_access_level = $this->useraccount->loadAccessLevels();
				
				$data['n_access_level'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_access_levels");
				#loading the view
				
					$this->load->view($view, array('data'=>$data,'churches'=>$_churches,'access_levels'=>$_access_level,'admin_user'=>$_admin_user));

			break;

			
			
			default:
			
		endswitch;	
		
	}//end function
	
	function churches(){
		
		global $page_res;
		$this->general_page_resource();
		
		
		$actn = misc::cleanUserName($this->uri->segment(3));
		
		switch ($actn):
			case 'create':
				$view = 'central_admin/create_church';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Create Church  ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Account, kindly fill out the form below.";
				$data['page_desc'] = "You are here : Central Admin => Churches => Create";
				
				$data['n_access_level'] = contentmanager::loadTotalRecord($fld='id', $tableName="tbl_access_levels");
				#loading the view
			
				$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res));
			break;
			#-------------------------------------
			case 'view':
				$view = 'central_admin/view_churches';
				$data['css_cls'] = "info";
				$data['page_title'] = ":: Christ Embassy Live Streaming - Create Church Account ::";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To add a new Church Admin Account, kindly fill out the form below.";
				$data['page_desc'] = "You are here : Central Admin => Church Account => View";
				
				#set pagination parameters
				$offset = (is_numeric($this->uri->segment(4)))?(int)$this->uri->segment(4):0;
				$config['base_url'] = '/centraladmin/churches/view/';
				$config['per_page'] = 20; 
				$config['uri_segment'] = 5;
				$config['use_page_numbers'] = FALSE;
				$limit = (int)$config['per_page'];
				$data['per_page'] = $config['per_page'];

				
				//$_admin_users = $this->useraccount->loadDetailsAndPaginate($tableName="tbl_users",$arrFilter=array('access_level_id'=>$param),$arrAttribute=array('id','first_name','last_name','user_name','user_pwd','access_level_id','church_id','date_created','status'),$num="$offset, $limit",$orderBy='');
				$_admin_users = $this->useraccount->load_church_accounts($offset, $limit);
				$data['nof_items'] = $this->useraccount->loadTotalRecord('id', $tblname='tbl_churches');
				
				$totalrecord = array('size'=>$data['nof_items'],'per_page'=>$limit);
				$config['total_rows'] = $data['nof_items'];
				
				#lets initialize the pagination section
				$this->pagination->initialize($config);
				$data['paginate'] =  $this->pagination->create_links();
				
				#loading the view	
				$this->load->view($view, array('data'=>$data,'admin_user'=>$_admin_users,'totalrecord'=>$totalrecord, 'page_res'=>$page_res));
				
			break;
			
			//////////////////////////
			
			case 'edit':
					$view = 'central_admin/edit_church_account';
					$data['css_cls'] = "info";
					$data['page_title'] = ":: Christ Embassy Live Streaming - Edit Admin User Account ::";
					$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; To EDIT a Church Account, kindly fill out the form below.";
					$data['page_desc'] = "You are here : Central Admin => Church Account => Edit";
					#retrieve the admin ID
					$id = intval($this->uri->segment(4));
					#obtain the specific user detail
			
					$_admin_user = $this->useraccount->loadDetails($tableName="tbl_churches",$arrFilter=array('id'=>$id),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','news','title','file_stream','user_name','password','email'),$num=1,$orderBy='');
					#loading the view
					
					$this->load->view($view, array('data'=>$data,'admin_user'=>$_admin_user, 'page_res'=>$page_res));

			break;
			
			case 'delete':
					$del_id = intval($this->uri->segment(4));
					mysql_query($sql="DELETE FROM tbl_churches WHERE id=\"$del_id\" ");
					mysql_query($sql="DELETE FROM tbl_users WHERE church_id=\"$del_id\" ");
					header('Location: /centraladmin/manageaccount/');
					
			break;
			
			case 'view_online_users':
					$this->load_online_users_detail();
			break;

			default:
			
				header("Location:/centraladmin/");
				
		
		
		endswitch;
	}//end function
	
	
	function load_online_users_detail(){
		
		global $page_res;
		$this->general_page_resource();
		
		// get the users that are online, but first lets get the churches that are online

		$online_users = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('status'=>1, 'is_online'=>1),$arrAttribute=array('id', 'first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id', 'church_id', 'created_by', 'is_online', 'status', 'date_modified'),$num=NULL,$orderBy='church_id');
		
		//get the number of online users based per church
		$data['nonline_users'] = useraccount::loadTotalRefRecord($where=array('status'=>1, 'is_online'=>1), $fld='id', $tblname='tbl_users');
		//echo $data['nonline_users']; exit;
		
		//$churches_online = useraccount::loadDetails($tableName='tbl_users',$arrFilter=array('status'=>1, 'is_online'=>1),$arrAttribute=array('id', 'first_name', 'last_name', 'user_name', 'user_pwd', 'email', 'access_level_id', 'church_id', 'created_by', 'is_online', 'status', 'date_modified'),$num=NULL,$orderBy='church_id');
		
		//$data['nchurches'] = '';
		
		$churches_online = useraccount::loadChurchesOnline();
		$data['n_online_churches'] = useraccount::count_active_records($sql="SELECT church_id, is_online FROM tbl_users WHERE is_online='1' AND status='1' GROUP BY church_id");
		//echo $data['n_online_churches']; exit;
		//var_dump($churches_online); exit;

		// loading the page
		$view = "central_admin/view_online_users";
		$data['css_cls'] = "info";
		$data['page_title'] = "Online Users | Christ Embassy Church Streaming Portal";
		$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" /> &nbsp; Below are list of churches and church members currently online.";
		$data['page_desc'] = "You are here : Central Admin => Church Account => Online Users";
		
		$this->load->view($view, array('page_res'=>$page_res, 'churches_online'=>$churches_online, 'online_users'=>$online_users, 'data'=>$data));
		
		
		
		
		
	}//end function
	
	
///////////////////////////////////////////////////////////////////////////////////////

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
///////////////////////////////////////////////////////////////////////////////////////
}//end class
