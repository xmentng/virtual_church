<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class churchmember extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('upload', 'thumbnailmanager', 'sessiondata'));
		$this->load->model('churchmanager');
		$this->load->model('commentsmanager');
		
		useraccount::redirectuser();
		
	}//end function
	
	public function index()
	{
		$this->my_profile();
		
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
		
		$is_active = useraccount::getAttributeValue($detail=array('id','status'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'status');
		
		//echo $is_active; exit;
		
		//echo $access_level; exit;
		
		$church_banner = useraccount::getAttributeValue(array('id','church_banner_url'), $tblname='tbl_churches', array('id'=>$church_id), $retval='church_banner_url');
		
		if(!$church_banner){
			$data['church_banner'] = "user_res/banners/banner2.png";	
		}else{
			$data['church_banner'] = $church_banner;
		}
		
		$data['church_id'] = $church_id;
		$data['logged_in_account'] = $logged_in_account;
		
		$comment = useraccount::loadDetails('tbl_service_blog_comments',$arrFilter=array('church_id'=>$church_id, 'approved'=>1, 'meeting_type'=>1),array('id', 'account_name', 'name', 'church_id', 'stream_url', 'country', 'comment', 'time_posted', 'approved', 'meeting_type'),$num=NULL,$orderBy='');
		
		$ncomments = useraccount::loadTotalRefRecord($where=array('church_id'=>$church_id, 'approved'=>1, 'meeting_type'=>1), $fld='id', $tblname='tbl_service_blog_comments');
		
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
		
		
		//echo $page_res['church_account_name']; exit;
		
		
	}//end function
	
	function my_profile(){

		global $page_res, $comment;
		sessiondata::general_page_resource();
		
		$data['flag_msg_status'] = 'info';
		$data['css_cls'] = 'info';
		$data['msg'] = 'Kindly fill out the detail on the below form.';
		
		$page_res['page_name'] = '<strong>My Profile</strong>.';
		
		$data['page_title'] = 'User Profile|Christ Embassy Virtual Church.';
		
		$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');
		
		//echo $user_detail['church_id'][0]; exit;

		#get notice board content
		$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
		
		$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
		
		//echo $notice_board['notice_board_content'][0]; exit;

		$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
		
		//echo $data['n_nboard_content']; exit;
		
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
		
		//get the testimonies under this church id
		$testimony = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('church_id'=>$page_res['church_id'],'status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_format', 'test_video_path', 'test_pic_path', 'test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$data['n_testimonies'] = useraccount::count_active_records($sql="SELECT * FROM tbl_testimonies WHERE church_id=\"$page_res[church_id]\" AND status='1' ");
		
		//get birthdays celebrants
		$bmonth = date("m");
		//echo $bmonth; exit;
		$celebrants = useraccount::loadDetails($tableName="tbl_users",$arrFilter=array('church_id'=>$page_res['church_id'], 'birth_month'=>$bmonth),$arrAttribute=array('id', 'church_id', 'first_name', 'last_name', 'country', 'profile_pic', 'birth_day', 'birth_month', 'birth_year', 'status', 'country'),$num=NULL,$orderBy='');
		
		$data['n_celebrants'] = useraccount::count_active_records($sql="SELECT * FROM tbl_users WHERE church_id=\"$page_res[church_id]\" AND birth_month=\"$bmonth\"  ");
		
		/*for($i=0; $i<$data['n_testimonies']; $i++):
		
			$arrTestifiers['first_name'][$i] = useraccount::getAttributeValue(array('user_name','first_name'), $tblname="tbl_users", $where=array('user_name'=>$testimony['user_name'][$i]), $retval="first_name");
			
			$arrTestifiers['last_name'][$i] = useraccount::getAttributeValue(array('user_name','last_name'), $tblname="tbl_users", $where=array('user_name'=>$testimony['user_name'][$i]), $retval="last_name");
			
			$arrTestifiers['profile_pic'][$i] = useraccount::getAttributeValue(array('user_name','profile_pic'), $tblname="tbl_users", $where=array('user_name'=>$testimony['user_name'][$i]), $retval="profile_pic");
			
			$arrTestifiers['country'][$i] = useraccount::getAttributeValue(array('user_name','country'), $tblname="tbl_users", $where=array('user_name'=>$testimony['user_name'][$i]), $retval="country");
		
		endfor;
		*/
		//echo $data['n_celebrants']; exit;
		
		#load the view
		$this->load->view('church_member/vw_index',array('payment_method'=>$payment_method, 'service_detail'=>$service_detail, 'giving'=>$giving, 'notice_board'=>$notice_board,'church_detail'=>$church_detail, 'support'=>$support, 'data'=>$data, 'user_detail'=>$user_detail, 'page_res'=>$page_res, 'comment'=>$comment, 'testimony'=>$testimony, 'celebrant'=>$celebrants));
	}//end function
	
	
function edit_profile(){
	
	global $page_res, $comment;
	$this->general_page_resource();
	
	#load the view
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To edit your profile, kindly fill out the detail on the form below.';
	$data['page_title'] = 'Edit Profile | Christ Embassy Virtual Church.';
	
	$page_res['page_name'] = '<strong>Edit Profile</strong>.';;
	
	// get the view content
	
	$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');
		
		//echo $user_detail['church_id'][0]; exit;

		#get notice board content
		$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
		
		$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
		
		//echo $notice_board['notice_board_content'][0]; exit;

		$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
		
		//echo $data['n_nboard_content']; exit;
		
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
		
		
		$this->load->view('church_member/edit_profile',array('payment_method'=>$payment_method, 'service_detail'=>$service_detail, 'giving'=>$giving, 'notice_board'=>$notice_board,'church_detail'=>$church_detail, 'support'=>$support, 'data'=>$data, 'user_detail'=>$user_detail, 'page_res'=>$page_res, 'comment'=>$comment));
	
	
}//end function

function uploadpicture(){
	
	global $page_res, $comment;
	$this->general_page_resource();
	
	$view = 'noskin/myaccount/uploadpicture';
        $seenform = $this->input->post('seenform');
        //$userID = $this->session->userdata('userID');  
		 $userID = $page_res['user_id'];
		 
         if(empty($seenform)){
             $data['flag_msg_status'] = 'info';
				$data['css_cls'] = 'info';
				$data['msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To update your profile picture, kindly fill out the detail on the form below.';
				
				$data['page_title'] = 'Upload Picture | Christ Embassy Virtual Church.';
				
				$page_res['page_name'] = '<strong>Update Profile Picture</strong>.';
				
				// get the view content
				
				$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');
				
				#get notice board content
				$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
				
				$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
				

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
				
				
				$this->load->view('church_member/edit_profile_picture',array('payment_method'=>$payment_method, 'service_detail'=>$service_detail, 'giving'=>$giving, 'notice_board'=>$notice_board,'church_detail'=>$church_detail, 'support'=>$support, 'data'=>$data, 'user_detail'=>$user_detail, 'page_res'=>$page_res, 'comment'=>$comment));
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
		$savePath1 = CUSTOM_PICTURE_PATH.$this->misc->saveDirPrefix().'/'.$this->misc->genRand(mt_rand(5,10)).'.'.$pathInfo['extension'];
        $savePath = "./".$savePath1;
        //copy the file
        if(move_uploaded_file($_FILES['picture']['tmp_name'],$savePath)){
            ///update the user's record
            //$this->useraccount->updateUserAtrribute($userID,'userPicPath',$savePath) ;
			$this->mysql->update($tbl="tbl_users", array('profile_pic'=>"/".$savePath1), array('id'=>$page_res['user_id']));
            $this->session->set_userdata('userPicPath', $savePath);
            echo json_encode(array('status'=>true,'message'=>'Picture successfully uploaded.'));
            exit;
        }
    }

}//end function


function edit_profile_picture(){
	
	global $page_res, $comment;
	$this->general_page_resource();
	
	
	if(isset($_POST['submit_btn'])){
		$this->perform_upload();
	}else{
	
	
	#load the view
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To update your profile picture, kindly fill out the detail on the form below.';
	
	$data['page_title'] = 'Upload Picture | Christ Embassy Virtual Church.';
	
	$page_res['page_name'] = '<strong>Update Profile Picture</strong>.';
	
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
	
	
	$this->load->view('church_member/edit_profile_picture',array('payment_method'=>$payment_method, 'service_detail'=>$service_detail, 'giving'=>$giving, 'notice_board'=>$notice_board,'church_detail'=>$church_detail, 'support'=>$support, 'data'=>$data, 'user_detail'=>$user_detail, 'page_res'=>$page_res, 'comment'=>$comment));
		
	}//end else
	
}//end function



function perform_upload(){

  
  global $page_res, $comment;
  $this->general_page_resource();
  
  //echo "Isaac Usifo is Health and Wealthy."; exit;
  
  $view = 'church_member/edit_profile_picture';
  
  $data['page_title'] = 'Upload Picture | Christ Embassy Virtual Church';
  
  $user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');
	  
	  //echo $user_detail['church_id'][0]; exit;

	#get notice board content
	$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
	
	$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
	
	//echo $notice_board['notice_board_content'][0]; exit;

	$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
	
	//echo $data['n_nboard_content']; exit;
	
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
		

	#lets set the upload parameters
	$config['upload_path'] = "./user_res/user_pics/";
	$config['allowed_types'] = 'png|jpg|gif';
	$config['max_size']	= '204800';
	$config['encrypt_name'] = TRUE;
	$config['remove_spaces'] = TRUE;
		
	$this->load->library("upload",$config);
	
	$this->upload->initialize($config);
	
	$is_uploaded = $this->upload->do_upload();
	

	
	if($is_uploaded):  //if uploaded
		
		#lets update the picture file of the user
		
		$arr_upload_detail = $this->upload->data();
		
		$file_name = $arr_upload_detail['file_name'];
		
		//echo $file_name; exit;

		mysql::update($tblname='tbl_users', $setflds=array('profile_pic'=>'/user_res/user_pics/'.$file_name), $where=array('id'=>$page_res['user_id']));
		
		$data['page_desc'] = "UPDATE PROFILE PICTURE";
		 
		$data['flag_msg_status'] = 'success';
		
		$data['page_title'] = 'Upload Picture | Christ Embassy Virtual Church.';
		
		$data['css_cls'] = 'success';
		
		$data['msg'] = "<img src='/images/icons/success_small.png' />&nbsp;Your picture has been uploaded successfully.";

	endif;
	
	if(!$is_uploaded):
	

		$data['page_desc'] = "UPDATE PROFILE PICTURE";
		 
		$data['flag_msg_status'] = 'error';
		
		$data['css_cls'] = 'error';
		
		$data['page_title'] = 'Upload Picture | Christ Embassy Virtual Church.';
		
		$error = array("desc"=>$this->upload->display_errors());
		
		$data['msg'] = "<img src='/images/icons/invalid_small.png' />&nbsp;Error! Improper file size, format or type.";
		
		
	endif;

	#load the page
	//$this->load->view($view, array('user_detail'=>$user_detail, 'data'=>$data));
			$this->load->view($view,array('payment_method'=>$payment_method, 'service_detail'=>$service_detail, 'giving'=>$giving, 'notice_board'=>$notice_board,'church_detail'=>$church_detail, 'support'=>$support, 'data'=>$data, 'user_detail'=>$user_detail, 'page_res'=>$page_res, 'comment'=>$comment));
}///end function


function change_password(){
	
	global $page_res, $comment;
	$this->general_page_resource();
	
	#load the view
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To change your passwword, kindly fill out the detail on the form below.';
	
	$data['page_title'] = 'Change Password | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Change Password</strong>.';
	
	// get the view content
	
		$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');
		
		//echo $user_detail['church_id'][0]; exit;

		#get notice board content
		$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
		
		$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
		
		//echo $notice_board['notice_board_content'][0]; exit;

		$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
		
		//echo $data['n_nboard_content']; exit;
		
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
		
		
		$this->load->view('church_member/change_password',array('payment_method'=>$payment_method, 'service_detail'=>$service_detail, 'giving'=>$giving, 'notice_board'=>$notice_board,'church_detail'=>$church_detail, 'support'=>$support, 'data'=>$data, 'user_detail'=>$user_detail, 'page_res'=>$page_res, 'comment'=>$comment));
}//end function



function church_service(){
	
	global $page_res, $comment;
	$this->general_page_resource();
	
	//
	$page_res['flag_timer_set']=false;
	
	#load the view
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	
	$data['frmnote_css_cls'] = 'info';
	//$data['frmnote_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To take note, kindly fill out the below form.';
	//$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To change your passwword, kindly fill out the detail on the form below.';
	
	$data['page_title'] = 'Church Service | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Church Service</strong>.';
	
	$data['blog_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Kindly fill the form below to post your comment.';
	$data['blog_css_cls'] = "info";
	
	
	$data['scall_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Send a Salvation Call to Friends and Families.';
	$data['scall_css_cls'] = "info";
	
	$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');
		
	//echo $user_detail['church_id'][0]; exit;

	#get notice board content
	$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
	
	$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
	
	//echo $notice_board['notice_board_content'][0]; exit;

	$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
	
	//echo $data['n_nboard_content']; exit;
	
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
	
	//get the current time
	$church_service = useraccount::loadDetails( $tblname='tbl_online_timmer',  array('church_id'=>$page_res['church_id'], 'status'=>1), array('id', 'church_id', 'year', 'month', 'day', 'hour', 'minute', 'time_zone', 'service_day','status','time_posted'), $num=NULL,$orderBy='id DESC');
	
	$data['ncservice'] = useraccount::count_active_records("select * from tbl_online_timmer where church_id=\"$page_res[church_id]\" and status='1'");
	
	//echo 	$data['ncservice']; exit;
	
	$data['nthval'] = $data['ncservice']-1;
	
	$page_res['url'] = $_SERVER['REQUEST_URI'];
	
	//echo $page_res['url']; exit;
	
	//echo $nthval; exit;
	//$church_service['time_posted'][$nthval]; exit;

$view = "church_member/church_service";

$this->load->view($view,array('payment_method'=>$payment_method, 'service_detail'=>$service_detail, 'giving'=>$giving, 'notice_board'=>$notice_board,'church_detail'=>$church_detail, 'support'=>$support, 'data'=>$data, 'user_detail'=>$user_detail, 'page_res'=>$page_res, 'comment'=>$comment, 'church_service'=>$church_service));
	
	
	
}//end function


function send_salvation_call(){
	
	global $page_res;
	$this->general_page_resource();
	
		//get the user inputs
		$detail = array('friend_name'=>strip_tags($_POST['sc_name']),
					'friend_email'=>validator_lib::cleanEmail($_POST['sc_email']),
					'friend_country'=>strip_tags($_POST['sc_country']),
					'friend_phone'=>strip_tags($_POST['sc_phone']),
					'church_id'=>intval($_POST['church_id']),
					'inviter_account'=>$page_res['user_id'],
					'time_posted'=>misc::serverTime(),
					'status'=>0);
		
		//echo strip_tags($_POST['country']); exit;
		$error = validator_lib::validate_salvation_call_inputs($detail);

		if(count($error) > 0):  // if there are errors
			util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		endif;
		
		
		if(count($error)==0):  //if there are no errors in the captured inputs

			$return_flag  = post_lib::save_to_salvation_call($detail);
	
			if($return_flag == 1){	
				
				$id = mysql_insert_id();
				
				//echo $id; exit;
				
				//lets send an email to the cell leader/sms
				$flag_mail_sent = useraccount::dispatch_salvation_call_mail($detail, 'tbl_users', $id);
				
				//echo 
				//echo $flag_mail_sent['status']; exit;
				//util_lib::display_message(array('A call to salvation has been sent to the recipient.'), $msg_type='success', $img_source='/images/icons/success_small.png');	
				
				if($flag_mail_sent['status']==true):
					util_lib::display_message(array('A call to salvation has been sent to the recipient.'), $msg_type='success', $img_source='/images/icons/success_small.png');	
				endif;
				
			}
			
				
			if($return_flag == 0){
				util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
			
		endif;	
	
}//end function

function internal_mail(){
	
	global $page_res;
	$this->general_page_resource();
	
}//end function

function cell_system(){
	
	global $page_res;
	sessiondata::general_page_resource();
	
	$this->load->model('meetingmanager');
	
	/////////////////////////////////////
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['frmnote_css_cls'] = 'info';
	
	$page_res['flag_timer_set']=false;
	
	#load the view
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	
	$data['frmnote_css_cls'] = 'info';
	//$data['frmnote_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To take note, kindly fill out the below form.';
	//$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To change your passwword, kindly fill out the detail on the form below.';
	
	
	$data['blog_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Kindly fill the form below to post your comment.';
	$data['blog_css_cls'] = "info";
	
	
	$data['scall_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Send a Salvation Call to Friends and Families.';
	$data['scall_css_cls'] = "info";

	
	$data['page_title'] = 'Cell System | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Cell System</strong>.';

	$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');

	#get notice board content
	$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
	
	$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
	

	$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
	
	//get comments
	$comment = useraccount::loadDetails('tbl_service_blog_comments',$arrFilter=array('church_id'=>$page_res['church_id'], 'approved'=>1, 'meeting_type'=>2),array('id', 'account_name', 'name', 'church_id', 'stream_url', 'country', 'comment', 'time_posted', 'approved', 'meeting_type'),$num=NULL,$orderBy='');
	
	#lets obtain the church detail for this member/guest
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$user_detail['church_id'][0]),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');

	//check if the church has created any cell system
	$flag_church_has_cellsystem = false;
	$flag_user_has_join_a_cell = false;
	
	$flag_is_cellsystem = churchmanager::hasChurchCell($page_res['church_id'], array('id', 'church_id', 'cell_name', 'cell_desc'));
	
	if($flag_is_cellsystem==1):
	
		//lets check if this user has already joined a cell
		$flag_has_joined_cell = churchmanager::isCellMember($page_res['user_id'], array('id','cell_member_id'));
		
		//echo $flag_has_joined_cell; exit;
		
		if($flag_has_joined_cell==1){
			
			$data['has_cell']=1;
		}else{
			$data['has_cell']=0;
		}
		
		$view = "church_member/cell_system_index";
	
	endif;
	
	if($flag_is_cellsystem==0):
		
		$data['has_cell']=0;
		
		$view = "church_member/church_has_no_cells";
	
	endif;
	

	//get the cell outline path:
	$celloutlines = $this->useraccount->loadDetails($tblname="tbl_cell_outlines",$arrFilter=array('church_id'=>intval($page_res['church_id'])),$arrAttribute=array('id','church_id','cell_outline_url'),$num=NULL,$orderBy='');
	
	//load the cell meetings that is ongoing
	$meetingInfo = $this->meetingmanager->loadLiveMeetingsByUser($page_res['church_id'],array('id', 'church_id', 'meeting_type', 'meeting_title','meeting_date','meeting_duration', 'publishing_point', 'time_posted', 'status')) ;
	
	//$comments = useraccount::loadDetails();

	
	$this->load->view($view,array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'celloutline'=>$celloutlines, 'user_detail'=>$user_detail, 'comment'=>$comment));
		
}//end function

function join_cell(){
	
	global $page_res;
	$this->general_page_resource();
	
	/////////////////////////////////////
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['info_msg'] = "<img src='/images/icons/info_small.png' align='absmiddle' />&nbsp;To join a cell, kindly fill the form below.";
	
	$data['page_title'] = 'Join Cell | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Join a Cell</strong>.';
	
	//load the view contents
	$user_detail = $this->useraccount->loadDetails($tblname="tbl_users",$arrFilter=array('user_name'=>$this->misc->cleanUserName($this->session->userdata('user_name'))),$arrAttribute=array('user_name','id','church_id', 'access_level_id', 'email', 'first_name', 'last_name', 'profile_pic', 'country'),$num=1,$orderBy='');

	#get notice board content
	$notice_board = $this->useraccount->loadDetails($tblname="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1),$arrAttribute=array('id','church_id','notice_board_content', 'status'),$num=1,$orderBy='id');
	
	$data['notice_board_content'] = useraccount::getLastAttributeValue(array('id','church_id','notice_board_content', 'status'), $tblname='tbl_churches_notice_board_contents', array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $retval='notice_board_content');
	

	$data['n_nboard_content'] = useraccount::loadTotalRefRecord($where=array('church_id'=>intval($user_detail['church_id'][0]),'status'=>1), $fld='id', $tblname='tbl_churches_notice_board_contents');
	

	#lets obtain the church detail for this member/guest
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$user_detail['church_id'][0]),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');
	
	//get the cell from this church
	$cells = array();
	
	//echo count($cells['id']); exit;
	
	//$data['n_cells'] = useraccount::count_active_records("SELECT * FROM tbl_cells WHERE church_id=\"$page_res[church_id]\" ");
	
	//check if the church has created any cell system
	$flag_church_has_cellsystem = false;
	$flag_user_has_join_a_cell = false;
	
	$flag_is_cellsystem = churchmanager::hasChurchCell($page_res['church_id'], array('id', 'church_id', 'cell_name', 'cell_desc'));
	
	if($flag_is_cellsystem==1):
	
		$cells = useraccount::loadDetails($tblname="tbl_cells",$arrFilter=array('church_id'=>intval($page_res['church_id'])),$arrAttribute=array('id','church_id','cell_name', 'cell_desc'),$num=NULL,$orderBy='id');
	
		//lets check if this user has already joined a cell
		$flag_has_joined_cell = churchmanager::isCellMember($page_res['user_id'], array('id','cell_member_id'));
		
		//echo $flag_has_joined_cell; exit;
		
		if($flag_has_joined_cell==1){
			
			$data['has_cell']=1;
		}else{
			$data['has_cell']=0;
		}
		
		$view = "church_member/join_cell";
	
	endif;
	
	if($flag_is_cellsystem==0):
		
		$data['has_cell']=0;
		
		$view = "church_member/church_has_no_cells";
	
	endif;
	

	//get the cell outline path:
	$celloutlines = $this->useraccount->loadDetails($tblname="tbl_cell_outlines",$arrFilter=array('church_id'=>intval($page_res['church_id'])),$arrAttribute=array('id','church_id','cell_outline_url'),$num=NULL,$orderBy='');
	
	$page_res['url'] = $_SERVER['REQUEST_URI'];
	
	$this->load->view($view,array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'cell'=>$cells, 'celloutline'=>$celloutlines));

	
}//end function


function proc_cell_joined(){
	
	global $page_res;
	//$this->general_page_resource();
	sessiondata::general_page_resource();
	
	//echo json_encode(array('status'=>false,'error'=>$page_res['user_id'])); exit;
	
	
	
	//get the user inputs
	$detail = array('cell_id'=>intval($_POST['lstcells']),
					'cell_member_id'=>intval($_POST['cell_member_id']),
					'church_id'=>intval($_POST['church_id']),
					'time_posted'=>misc::serverTime(),
					'status'=>1);
	
	$error = validator_lib::validate_cell_member_cell_inputs($detail);
	//echo json_encode(array('status'=>false,'error'=>$error)); exit;
	if(count($error) > 0):
		
		echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;Please select a cell from the list provided."));
                exit;
	endif;
	
	if(count($error) == 0):
		
		//check for duplicacy
	
		$return_flag = useraccount::record_exist($attributes=array('id', 'church_id','cell_member_id'), $tblname='tbl_cell_members_cell', $where = array('church_id'=>$detail['church_id'], 'cell_member_id'=>$detail['cell_member_id']));
		
			if($return_flag == 'no'){	
				
				mysql::update('tbl_users', array('is_cell_member'=>1, 'cell_id'=>$detail['cell_id']), array('id'=>$page_res['user_id']));
				mysql::insert($detail, 'tbl_cell_members_cell');
				
				$flag_mail_sent = $this->useraccount->dispatch_cell_membership_mail($detail, 'tbl_users');
				//echo json_encode(array('status'=>false,'error'=>$flag_mail_sent)); exit;
				if($flag_mail_sent['status']==true):
				
					$cell_name = useraccount::getAttributeValue(array('id', 'cell_name'), "tbl_cells", array('id'=>intval($_POST['lstcells'])), $retval="cell_name");
					
					//echo json_encode(array('status'=>false,'error'=>$cell_name)); exit;
					
																																							
					echo json_encode(array('status'=>true,'message'=>"&nbsp;You have successfully joined  $cell_name;  and a mail has been sent to the cell leader to acknowlege your membership."));
                    exit;
				
				endif;	
				
				
				if($flag_mail_sent['status']==false):
				
					$cell_name = useraccount::getAttributeValue(array('id', 'cell_name'), "tbl_cells", array('id'=>intval($_POST['lstcells'])), $retval="cell_name");
					
					//echo json_encode(array('status'=>false,'error'=>$cell_name)); exit;
					
																																							
					echo json_encode(array('status'=>true,'message'=>"&nbsp;You have successfully joined  $cell_name;  and a mail has been sent to the cell leader to acknowlege your membership."));
                    exit;
				
				endif;	
				
			}

			if($return_flag == 'yes'){
					//util_lib::display_message($error=array('You have joined a cell previously.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
					
					echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;You have joined a cell previously."));
                    exit;
			}
				
			/*if($return_flag == 0){
				//util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
				
				echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;We are sorry for the inconvenience. Kindly refresh the page and try again ."));
                    exit;
			}*/

		
		
	endif;
	
	
}//end function


function view_cell_leader(){
	
	global $page_res;
	$this->general_page_resource();
	
	//get the cell leaders in this church
	$cell_leaders= array();
	
	
	#lets obtain the church detail for this member/guest
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$page_res['church_id']),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');
	
	//check if the church has created any cell system
	$flag_church_has_cellsystem = false;
	$flag_user_has_join_a_cell = false;
	
	$flag_is_cellsystem = churchmanager::hasChurchCell($page_res['church_id'], array('id', 'church_id', 'cell_name', 'cell_desc'));
	
	if($flag_is_cellsystem==1):
	
		$cells = useraccount::loadDetails($tblname="tbl_cells",$arrFilter=array('church_id'=>intval($page_res['church_id'])),$arrAttribute=array('id','church_id','cell_name', 'cell_desc'),$num=NULL,$orderBy='id');
		
		//get the cell leader if any
		
	
		//lets check if this user has already joined a cell
		$flag_has_joined_cell = churchmanager::isCellMember($page_res['user_id'], array('id','cell_member_id'));
		
		//echo $flag_has_joined_cell; exit;
		
		if($flag_has_joined_cell==1){
			
			//get the cell leader
			$cell_leaders = useraccount::loadCellLeaders($page_res['church_id']);
			$data['n_cell_leaders'] = useraccount::count_active_records("SELECT tbl_cell_leaders.cell_id, cell_leader_id, cell_leader_email, tbl_cell_leaders.country, tbl_cell_leaders.church_id , first_name, last_name, profile_pic, tbl_cells.cell_name
		FROM tbl_cell_leaders, tbl_users, tbl_cells 
		WHERE tbl_cell_leaders.cell_leader_id=tbl_users.id
		AND tbl_cell_leaders.cell_id=tbl_cells.id AND tbl_cell_leaders.church_id = \"$page_res[church_id]\" ");
			
			$data['has_cell']=1;
			
			if($data['n_cell_leaders']<1):
				$view = "church_member/no_cell_leader";
			endif;
			
		}else{
			
			$data['has_cell']=0;
		}
		
		$view = "church_member/view_cell_leaders";
	
	endif;
	
	if($flag_is_cellsystem==0):
		
		$data['has_cell']=0;
		
		$view = "church_member/church_has_no_cells";
	
	endif;
	
	//load the view
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['info_msg'] = "<img src='/images/icons/info_small.png' align='absmiddle' />&nbsp;Below are list of cell leaders.";
	
	$data['page_title'] = 'Cell Leaders | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>View Cell Leader</strong>.';
	
	//get the cell outline path:
	$celloutlines = $this->useraccount->loadDetails($tblname="tbl_cell_outlines",$arrFilter=array('church_id'=>intval($page_res['church_id'])),$arrAttribute=array('id','church_id','cell_outline_url'),$num=NULL,$orderBy='');
	
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell_leader'=>$cell_leaders, 'church_detail'=>$church_detail, 'celloutline'=>$celloutlines));
	
	
	
	
}//end function


function download_cell_outline(){
	
	echo "Thank you! This page is still under construction.";
}//end function


function attend_cell_service(){
	
	global $page_res;
	$this->general_page_resource();
	
	$this->load->model('meetingmanager');
	

	 $meetingInfo = $this->meetingmanager->loadDetails($tableName="tbl_meetings",$arrFilter=array('church_id'=>$page_res['church_id'],'meeting_type'=>2, 'status'=>1),$arrAttribute=array('id','church_id', 'meeting_type', 'meeting_title', 'meeting_time','meeting_date', 'meeting_duration', 'time_posted', 'status','publishing_point'),$num=NULL,$orderBy='') ;
	 
	 //var_dump($meetingInfo); 
	 
	$cell_leader = useraccount::loadRefCellLeader($page_res['church_id'], $page_res['user_id']);
	
	//echo $cell_leader['cell_name'][0];
	
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$page_res['church_id']),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');
	
	//load the view
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['info_msg'] = "<img src='/images/icons/info_small.png' align='absmiddle' />&nbsp;Below are list of cell leaders.";
	
	
	$data['frmnote_css_cls'] = 'info';
	
	
	$data['page_title'] = 'Cell Meeting | Christ Embassy Virtual Church.';
	
	$data['blog_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Kindly fill the form below to post your comment.';
	$data['blog_css_cls'] = "info";
	
	
	$data['scall_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Send a Salvation Call to Friends and Families.';
	$data['scall_css_cls'] = "info";
	
	$page_res['page_name'] = '<strong>Attend Cell Meeting</strong>.';
	
	$view = "church_member/attend_cell_service";
	
	//lets check if this user has already joined a cell
	$flag_has_joined_cell = useraccount::checkforDuplicate($tblname="tbl_cell_members_cell", array('id', 'cell_id', 'cell_member_id'), array('cell_member_id'=>$page_res['user_id']));
	
	if($flag_has_joined_cell){
		
		$page_res['has_cell']=true;
	}else{
		$page_res['has_cell']=false;
	}
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'cell_leader'=>$cell_leader, 'church_detail'=>$church_detail, 'meeting'=>$meetingInfo));
	
}//end function


function testimony(){
	
	global $page_res;
	$this->general_page_resource();
	
	//get testimonies
	$testimonies = useraccount::loadDetails($tblname="tbl_testimonies",array('church_id'=>$page_res['church_id']),$arrAttribute=array('id','church_id','user_name','test_format','test_video_path','test_pic_path','test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
	
	$data['n_testimonies'] = useraccount::count_active_records("SELECT * FROM tbl_testimonies WHERE church_id=\"$page_res[church_id]\" ");
	
	//get the testifier detail
	$arrTestifiers = array();
	
	for($i=0; $i<$data['n_testimonies']; $i++):
	
		$arrTestifiers['first_name'][] = useraccount::getAttributeValue(array('user_name','first_name'), $tblname="tbl_users", $where=array('user_name'=>$testimonies['user_name'][$i]), $retval="first_name");
		
		$arrTestifiers['last_name'][] = useraccount::getAttributeValue(array('user_name','last_name'), $tblname="tbl_users", $where=array('user_name'=>$testimonies['user_name'][$i]), $retval="last_name");
		
		$arrTestifiers['profile_pic'][] = useraccount::getAttributeValue(array('user_name','profile_pic'), $tblname="tbl_users", $where=array('user_name'=>$testimonies['user_name'][$i]), $retval="profile_pic");
		
		$arrTestifiers['country'][] = useraccount::getAttributeValue(array('user_name','country'), $tblname="tbl_users", $where=array('user_name'=>$testimonies['user_name'][$i]), $retval="country");
		
	endfor;
	
	

	
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$page_res['church_id']),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');
	
	//load the view
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['info_msg'] = "<img src='/images/icons/info_small.png' align='absmiddle' />&nbsp;Kindly share your testimony.";
	
	$data['page_title'] = 'Testimonies | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Testimonies</strong>.';
	
	$view = "church_member/testimonies";
	
	$this->load->view($view, array('data'=>$data, 'page_res'=>$page_res, 'church_detail'=>$church_detail, 'testimony'=>$testimonies, 'arrTestifiers'=>$arrTestifiers));
	
	
}//END FUNCTION

function share_testimony(){
	
	global $page_res;
	$this->general_page_resource();
	
	//capture the user inputs
	$detail = array('church_id'=>intval($_POST['church_id']),
					'user_name'=>strip_tags($_POST['user_name']),
					'church_id'=>intval($_POST['church_id']),
					'test_body'=>strip_tags($_POST['watermark']),
					'time_posted'=>misc::serverTime(),
					'status'=>1);
	
	$error = validator_lib::validate_share_testimony_inputs($detail);

	if(count($error) > 0):
		util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
	endif;
	
	if(count($error) == 0):
		
		//check for duplicacy
		$return_flag  = post_lib::save_to_testimony_schema($detail);
	
			if($return_flag == 1){	
				util_lib::display_message($error=array("Your testimony has been processed successdully."), $msg_type="success", $img_source="/images/icons/success_small.png");	
			}

			if($return_flag == 2){
					util_lib::display_message($error=array('You have joined a cell previously.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
				
			if($return_flag == 0){
				util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}

		
		
	endif;
	
	
}//end function

function post_testimony_comment(){
	
	global $page_res;
	$this->general_page_resource();
	
	$tid = intval($this->uri->segment(3));
	
	//echo $tid; exit;
	
	//capture the user inputs
	$tcomment1 = "test_comment_".$tid;
	
	//echo $tcomment1; exit;
	
	$tcomment = strip_tags($_POST[$tcomment1]);
	
	//echo $tcomment; exit;

	$detail = array('test_id'=>$tid,
					'church_id'=>$page_res['church_id'],
					'user_name'=>strip_tags($_POST['user_name']),
					'test_comment_author'=>$page_res['name_of_user'],
					'test_comment_email'=>$page_res['email'],
					'test_comment_country'=>$page_res['country'],
					'test_comment'=>mysql_real_escape_string($tcomment),
					'test_approved'=>1,
					'time_posted'=>misc::serverTime(),
					'status'=>1);
	
	//echo $detail['test_comment']; exit;
	mysql::insert($detail, 'tbl_testimony_comments');
	
	echo "success|Comment successfully processed";
	

	
}//end function

function feedback(){
	
	global $page_res;
	$this->general_page_resource();
	
	/////////////////////////////////////
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	//$data['frmnote_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To take note, kindly fill out the below form.';
	$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Send us a feedback.';
	
	$data['page_title'] = 'Feedback | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Feedback</strong>.';

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

	//lets check if this user has already joined a cell
	$flag_has_joined_cell = useraccount::checkforDuplicate($tblname="tbl_cell_members_cell", array('id', 'cell_id', 'cell_member_id'), array('cell_member_id'=>$page_res['user_id']));
	
	if($flag_has_joined_cell){
		
		$page_res['has_cell']=true;
	}else{
		$page_res['has_cell']=false;
	}
	
	$page_res['url'] = $_SERVER['REQUEST_URI'];
	

	$view = "church_member/feedback";
	
	$this->load->view($view,array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'notice_board'=>$notice_board, 'support'=>$support));
	
	
	
}//end function


function send_feedback(){
	
	global $page_res;
	$this->general_page_resource();
	
	$msg = validator_lib::sanitize($_POST['message']);
	
	//echo $msg; exit;
	
	if($msg != " "):
		$flag_mail_sent = $this->useraccount->dispatch_feedback_mail($page_res, $msg);
		
		if($flag_mail_sent['status']==true){
			
			util_lib::display_message($error=array("Your feedback has been posted successfully."), $msg_type="success", $img_source="/images/icons/success_small.png");		
		
		}
		
	endif;
	if($msg == " "):
		
		util_lib::display_message($error=array("Kindly enter your message in the field provided."), $msg_type="failure", $img_source="/images/icons/invalid_small.png");	
	endif;
	
}//end function


function give_online(){
	
	global $page_res;
	$this->general_page_resource();
	
	/////////////////////////////////////
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	//$data['frmnote_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To take note, kindly fill out the below form.';
	$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To give online, kindly fill out the detail on the form below.';
	
	$data['page_title'] = 'Online Giving | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Online Giving</strong>.';

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

	//lets check if this user has already joined a cell
	$flag_has_joined_cell = useraccount::checkforDuplicate($tblname="tbl_cell_members_cell", array('id', 'cell_id', 'cell_member_id'), array('cell_member_id'=>$page_res['user_id']));
	
	if($flag_has_joined_cell){
		
		$page_res['has_cell']=true;
	}else{
		$page_res['has_cell']=false;
	}
	
	$page_res['url'] = $_SERVER['REQUEST_URI'];
	
	//get individual givings
	
	$data['total_tithe'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'tithe');
	$data['total_partnership'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'partnership');
	$data['total_ss'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'special_seed');
	$data['total_ff'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'first_fruit');
	$data['total_offer7'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'offer_7');
	$data['total_giving'] = useraccount::get_total_giving($page_res['logged_in_account']);
	$data['total_sprj'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'special_project');

	$view = "church_member/give_online";
	
	$this->load->view($view,array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'notice_board'=>$notice_board, 'support'=>$support));
	
}//end function


function save_to_users_on_chatsystem(){
	
	global $page_res;
	$this->general_page_resource();
	
	
	mysql::insert(array('user_account'=>$page_res['logged_in_account'], 'church_id'=>$page_res['church_id'], 'on_chat_queue'=>1, 'login_time'=>misc::serverTime(), 'on_chat_session'=>0, 'chat_time'=>misc::serverTime()), 'tbl_users_on_chatsystem');
	
}//end function

function online_giving(){

	$actn = $this->validator_lib->sanitize($this->uri->segment(3));
	
	$this->load_giving_record($actn);

}//end function

function load_giving_record($param){
	
	global $page_res;
	$this->general_page_resource();
	
	$view = "church_member/$param";
	
	#lets obtain the church detail for this member/guest
	$church_detail = useraccount::loadDetails($tblname="tbl_churches",array('id'=>$page_res['church_id']),$arrAttribute=array('id','church_name','stream_url','ipad','blackberry','android','status','file_stream'),$num=1,$orderBy='');
	
	$giving = useraccount::loadDetails($tblname="online_church_giving",$arrFilter=array('user_account'=>$page_res['logged_in_account'],'category_code'=>$param),$arrAttribute=array('id','amount','category_code', 'time_posted', 'user_account', 'TransactionRef', 'currency'),$num=NULL,$orderBy='');
	
	$data['ngiving'] = useraccount::count_active_records($sql="select * from online_church_giving where user_account=\"$page_res[logged_in_account]\" and category_code=\"$param\" ");
	
	$data['total_tithe'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'tithe');
	$data['total_partnership'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'partnership');
	$data['total_ss'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'special_seed');
	$data['total_ff'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'first_fruit');
	$data['total_offer7'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'offer_7');
	$data['total_sprj'] = useraccount::get_ref_giving($page_res['logged_in_account'], 'special_project');
	
	$data['total_giving'] = useraccount::get_total_giving($page_res['logged_in_account']);
	
	
	//load the view
	
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;List of total online giving.';
	
	$data['page_title'] = 'Online Giving | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Online Giving</strong>.';
	
	$this->load->view($view,array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'giving'=>$giving));
	
	
}//end function


function send_tract(){
	
	global $page_res;
	$this->general_page_resource();
	
	$view = "church_member/send_tract";
	
	/////////////////////////////////////
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	//$data['frmnote_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To take note, kindly fill out the below form.';
	$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Send a tract to your family and friends.';
	
	$data['page_title'] = 'Send Tract | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Send Tract</strong>.';

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
	
	$tract = useraccount::loadDetails($tblname="tbl_tracts",$arrFilter=array('church_id'=>intval($user_detail['church_id'][0])),$arrAttribute=array('id','church_id','tract_name', 'category_code', 'pic_path', 'status', 'time_posted'),$num=NULL,$orderBy='');
	
	$data['n_tract'] = useraccount::count_active_records("select * from tbl_tracts where church_id=\"$page_res[church_id]\" ");
		
		
	$this->load->view($view,array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'notice_board'=>$notice_board, 'support'=>$support, 'tract'=>$tract));
	
	
	
	
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
	sessiondata::general_page_resource();
	
	//echo $page_res['logged_in_account'];
	$chat_admin_account = strip_tags($this->uri->segment(3));
	$chat_admmin_name = useraccount::getAttributeValue($detail=array('church_name', 'user_name'), $tblname="tbl_churches", $where=array('user_name'=>$chat_admin_account), $retval="church_name");
	
	//$page_res['chat_user'] = $chat_user;
	$data['title'] = "Chat System - Virtual Church.";
	
	//lets get the admin account connected to this chat user
	//$page_res['chat_user_account'] = useraccount::getLastAttributeValue($detail=array('admin_account', 'user_account'), $tblname="tbl_admin_and_user_chat_cn", $where=array('admin_account'=>$page_res['logged_in_account']), $retval="user_account");
	
	$page_res['chat_user_id'] = $this->session->userdata('user_id');
	
	$chat_login_time = useraccount::getLastAttributeValue(array('time_connected', 'admin_account', 'user_account'), 'tbl_admin_and_user_chat_cn', array('admin_account'=>$page_res['logged_in_account'], 'admin_account'=>$chat_admin_account), $retval='time_connected');
	
	//echo $chat_login_time; exit;
	
	//$this->session->set_userdata(array('chat_login_time'=>$chat_login_time));
	
	//$chat_login_time = $this->session->userdata('chat_login_time');
	
	$data['chat_login_time']=$chat_login_time;
	
	$data['chat_admin_user'] = $chat_admmin_name;
	$data['chat_admin_account'] = $chat_admin_account;
	
	$this->load->view("church_member/chat", array("page_res"=>$page_res, 'data'=>$data));
}//end function


function savechatpost(){
	
	global $page_res;
	sessiondata::general_page_resource();
	
	//$receiver = strip_tags($this->uri->segment(3));
	//$page_res['receiver'] = $receiver;
	
	$receiver_account_id = strip_tags($_POST['receiver_account_id']);
	//$sender_account_name = intval($_POST['sender_account_name']);
	$chat_login_time = intval($_POST['chat_login_time']);
	
	
	$sender = intval($this->session->userdata('user_id'));
	
	//$chat_login_time = $this->session->userdata('chat_login_time');
	
	$ddd = strip_tags($_POST['message']);
	$ddd = $this->sanitize($ddd);
	//$query = "INSERT INTO message (message) VALUES ('$ddd')";
	
	//echo $ddd; exit;
	
	if(misc::required($ddd)){
	
		$isposted = mysql::insert(array("chat_session_id"=>$chat_login_time, "message"=>$ddd, "sender"=>$sender, "receiver"=>$receiver_account_id,"recd"=>1, 'time_posted'=>misc::serverTime(), 'church_id'=>$page_res['church_id']), "tbl_chat_messages");
		
		//echo $isposted; exit;
		
		//echo "message processed successfully.";
		
	}
	
	
}//end function


function refreshchatpost(){
	
	global $page_res;
	sessiondata::general_page_resource();
	
	$today = time();
	$sender_account="";
	$admin_account = strip_tags($this->uri->segment(3));
	$chat_user_id = $this->session->userdata('user_id');
	$chat_login_time = $this->session->userdata('chat_login_time');
	
	//echo $chat_login_time; exit;
	
	$result = mysql_query("SELECT * FROM tbl_chat_messages WHERE sender=\"$chat_user_id\" OR receiver=\"$chat_user_id\" ORDER BY id DESC LIMIT 10");

	//$result = mysql_query("SELECT * FROM tbl_chat_messages WHERE sender=\"$admin_account\" or receiver=\"$chat_user_id\"  ORDER BY id DESC LIMIT 10");
	
	//$result = mysql_query("SELECT * FROM tbl_chat_messages WHERE sender=\"$chat_user_id\" or chat_session_id=\"$chat_login_time\" ORDER BY id DESC LIMIT 10");

	while($row = mysql_fetch_array($result))
	  {
		  
		if($row['sender'] == $chat_user_id):
			$sender_account = $chat_user_id;
			$user_fname = useraccount::getAttributeValue(array('id', 'first_name'), 'tbl_users', array('id'=>$row['sender']), $retval='first_name');
			$user_lname = useraccount::getAttributeValue(array('id', 'last_name'), 'tbl_users', array('id'=>$row['sender']), $retval='last_name');
		  
			$full_name = $user_fname.' '.$user_lname;
			$sender_account = $full_name;
		endif;
		
		if($row['sender'] != $chat_user_id):
			$sender_account = $admin_account;
			$full_name = $this->session->userdata('church_name')." - Admin";
			$sender_account = $full_name;
		endif;
		

		
		
		
	  //echo '<p>'.'<span>'.$row['sender'].'</span>'. '&nbsp;&nbsp;' . $row['message'].'&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y g:i:s A",$row['time_posted']).'</p>';
	  
	  echo '<p>'.'<span>'.$sender_account.'</span>'. '&nbsp;&nbsp;' . $row['message'].'&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y g:i:s A",$row['time_posted']).'</p>';
	  }
	
	//mysql_close($con);
	
}//end function

function proc_my_offerings(){
	
	global $page_res;
	$this->general_page_resource();
	
	//capture the user inputs
	$detail = array('amount'=>intval($_POST['amount']),
					'category_code'=>strip_tags($_POST['category_code']),
					'time_posted'=>$this->misc->serverTime(),
					'user_account'=>$page_res['logged_in_account'],
					'TransactionRef'=>$this->util_lib->createID($type="numeric", $len=21, $tblname="online_church_giving", $wherefld="TransactionRef"),
					'currency'=>'USD'
					);
	
	//validate input to ensure data is inputted
	$error = $this->validator_lib->validate_online_giving($detail);
	
	if(count($error) > 0):
	
		util_lib::display_message($error, $msg_type='failure', $img_source='/images/icons/invalid_small.png');
		
	endif;
	
	if(count($error) == 0):
		
		$return_flag  = post_lib::save_to_online_giving($detail);
		
		if($return_flag == 1){	
				
			util_lib::display_message($error=array("Transaction successfully processed."), $msg_type="success", $img_source="/images/icons/success_small.png");		
			}

			if($return_flag == 2){
					util_lib::display_message($error=array('The record previously exist.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
				
			if($return_flag == 0){
				util_lib::display_message($error=array('We are sorry for the inconvenience. Kindly refresh the page and try again .'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			}
		
	endif;
	
	
	
}//end function


function suggestion_box(){
	
	global $page_res;
	$this->general_page_resource();
	
	/////////////////////////////////////
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	//$data['frmnote_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To take note, kindly fill out the below form.';
	$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Kindly enter your message in the below field.';
	
	$data['page_title'] = 'Suggestion | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Suggestion Box</strong>.';

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

	//lets check if this user has already joined a cell
	$flag_has_joined_cell = useraccount::checkforDuplicate($tblname="tbl_cell_members_cell", array('id', 'cell_id', 'cell_member_id'), array('cell_member_id'=>$page_res['user_id']));
	
	if($flag_has_joined_cell){
		
		$page_res['has_cell']=true;
	}else{
		$page_res['has_cell']=false;
	}
	
	$page_res['url'] = $_SERVER['REQUEST_URI'];
	
	$view = "church_member/suggestion";
	
	$this->load->view($view,array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'notice_board'=>$notice_board, 'support'=>$support));
	
	
	
}//end function


function send_suggestion(){
	
	global $page_res;
	$this->general_page_resource();
	
	$msg = validator_lib::sanitize($_POST['message']);

	if($msg != " "):
	
		$flag_mail_sent = $this->useraccount->dispatch_suggestion_mail($page_res, $msg);
		
		if($flag_mail_sent['status']==true){
			
			util_lib::display_message($error=array("Your suggestion has been posted successfully."), $msg_type="success", $img_source="/images/icons/success_small.png");		
		
		}
		
	endif;
	
	if($msg == " "):
	
		util_lib::display_message($error=array("Kindly enter your message in the box provided."), $msg_type="failure", $img_source="/images/icons/invalid_small.png");	
	endif;
	
}//end function


function send_this_card(){
	
	global $page_res;
	
	$this->general_page_resource();
	
	$tract_id =  intval($_POST['tract_id']);
	
	$email = validator_lib::cleanEmail($_POST['email']);

	$fname = validator_lib::sanitize($_POST['name']);
	
	$imgsrc = useraccount::getAttributeValue(array('id', 'pic_path'), $tblname="tbl_tracts", $where=array('id'=>$tract_id), $retval="pic_path");
	
	if(($email)|| ($fname)):
	
		$detail = array("recipient_name"=>$fname, "recipient_email"=>$email, "tract_id"=>$tract_id, "tract_src"=>$imgsrc);
		
		$flag_mail_sent = useraccount::send_tract_to_recipient($detail, $page_res);
		
		if($flag_mail_sent['status']==true){
			
			util_lib::display_message($error=array("The tract has been sent to the recipient."), $msg_type="success", $img_source="/images/icons/success_small.png");	
		}
	endif;
	
	if((!$email) || (!$fname)):
		
		util_lib::display_message($error=array("Kindly enter the recipient name and email in the field provided."), $msg_type="failure", $img_source="/images/icons/invalid_small.png");	
	endif;
	
}//end function


///VIDEO ON DEMAND SECTION

function videos(){
	
	global $page_res;
	$this->general_page_resource();
	
	$view = "church_member/videos/video_index";
	/////////////////////////////////////
	$data['flag_msg_status'] = 'info';
	$data['css_cls'] = 'info';
	//$data['frmnote_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To take note, kindly fill out the below form.';
	$data['info_msg'] = '<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Kindly enter your message in the below field.';
	
	$data['page_title'] = 'Videos on demand | Christ Embassy Virtual Church.';
	$page_res['page_name'] = '<strong>Videos on demand</strong>.';

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

	/////////////////////GET VIDEO CONTENT HERE//////////////////////////////////////////////////////////////////////////////////
	
	$allvideos = useraccount::loadDetails($tblname="tbl_videos",$arrFilter=array('church_id'=>intval($page_res['church_id']),'approved'=>1),$arrAttribute=array('id','video_code','church_id', 'video_title','video_desc' , 'video_url', 'video_thumbnail_url' , 'video_category', 'approved', 'time_posted'),$num=NULL,$orderBy='');
	
	 $defvideo = array();
	//check if a video is choosen
	$video_code = intval($this->uri->segment(4));
	
	if($video_code > 0){
		
		$defvideo = useraccount::loadDetails($tblname="tbl_videos",array('video_code'=>$video_code,'approved'=>1),array('id','video_code','church_id', 'video_title','video_desc' , 'video_url', 'video_thumbnail_url' , 'video_category', 'approved', 'time_posted'),$num=1,$orderBy='');
		
		if(!$defvideo['video_thumbnail_url'][0]):
		
			$data['def_thumb'] = CUSTOM_BASE_URL."/".CUSTOM_DEFAULT_VIDEO_THUMB;
			
		endif;
		
		if($defvideo['video_thumbnail_url'][0]):
		
			$data['def_thumb'] = CUSTOM_BASE_URL."/".$defvideo['video_thumbnail_url'][0];
			
		endif;
		
		
		//echo $data['def_thumb']; exit;
		
	}else{

		// get the default video
		$defvideo = useraccount::loadDetails($tblname="tbl_videos",$arrFilter=array('church_id'=>intval($page_res['church_id']),'approved'=>1, 'video_category'=>'default'),$arrAttribute=array('id','video_code','church_id', 'video_title','video_desc' , 'video_url', 'video_thumbnail_url' , 'video_category', 'approved', 'time_posted'),$num=1,$orderBy='');
		
		$data['def_thumb'] = $defvideo['video_thumbnail_url'][0];
		
		if($data['def_thumb']):
		
			$data['def_thumb'] = CUSTOM_BASE_URL."/".CUSTOM_DEFAULT_VIDEO_THUMB;
		
		endif;
		
		if(!$data['def_thumb']):
		
			$data['def_thumb'] = CUSTOM_BASE_URL."/".CUSTOM_DEFAULT_VIDEO_THUMB;
		
		endif;
		
		
		
		
		//echo $data['def_thumb']; exit;
		
	}
	
	//echo $data['def_thumb']; exit;
	/*$arrthumb = explode('/', $data['def_thumb']);
	//echo $arrthumb[2]; exit;
	
	//////////////////////////resize the thumbnail b4 passing it to the view;//////////////////////////////////////////////
	$pt = base64_encode("./".$data['def_thumb']);
	//echo $pt; exit;
	
	$dm = base64_encode("125X125");
	//echo $dim; exit;
	
	$pt2 =  base64_decode("$pt");
	$dm2 = base64_decode("$dm");
	
	//$src = "/thumbnail/display/".$pt."/".$dm;
	
	$dimensions = explode('X',$dm2);
          
	$this->load->library('thumbnailmanager');  
    $this->thumbnailmanager->__initialise($pt2);

	$this->thumbnailmanager->quality=100; 
	$this->thumbnailmanager->output_format='JPG';
	$this->thumbnailmanager->size_width((int)$dimensions[0]);                    // set width for thumbnail, or
               
	$this->thumbnailmanager->process();   

                //enable cache                        // generate image
                $offset = 60 * 60 * 24 * 1;
                $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
                header($ExpStr); 
               // $this->thumbnailmanager->show(); 
				
				$this->thumbnailmanager->save('./user_res/videosthumbs/'.$arrthumb[2]);	*/
                
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	//load the comments mapped to the defaultvideo
	$comments = commentsmanager::loadApprovedComments($defvideo['video_code'][0], array('id', 'video_post_id', 'comment_author_id', 'comment', 'time_posted', 'approved'), array('number'=>10));
	
	//var_dump($comments); exit;
	
	
	// load the view
	$this->load->view($view,array('church_detail'=>$church_detail, 'data'=>$data, 'page_res'=>$page_res, 'notice_board'=>$notice_board, 'support'=>$support, 'videos'=>$allvideos, 'defaultvideo'=>$defvideo, 'commentInfo'=>$comments));
	
	
}//end function



function cellsystem(){
	
	$mode = strip_tags($this->uri->segment(3));
	
	$user_id = intval($this->uri->segment(4));
	
	//echo $user_id; exit;
	
	switch($mode):
	
		case 'join_a_cell':
			
				$this->join_a_cell($user_id);
		
		break;
	
	
	
	endswitch;
	
}//end function

function join_a_cell($user_id){

	global $page_res;
	sessiondata::general_page_resource();
	
	

}//end function 


///////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////
	
}//end class
