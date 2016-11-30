<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Controller {
	
function __construct(){
	parent::__construct();
	//$this->load->library('image_mgr');
	$this->load->library(array('thumbnailmanager'));
}


function index(){
	
	$this->dashboard();
	
}//end function

function dashboard(){
	
	global $page_res;
	$this->general_page_resource();
	
	
	$data['page_title'] = "Videos Dashboard";
	$data['css_cls'] = '';
	$page_res['page_name'] = '<span>Video dashboard</span>';
	
	$this->load->view('videos/dashboard', array('data'=>$data, 'page_res'=>$page_res));
	
}//end function

function addfile(){
	
	global $page_res;
	$this->general_page_resource();
	
	
	$data['page_title'] = "Add Video File";
	$data['css_cls'] = '';
	$page_res['page_name'] = '<span>Add Video File</span>';
	
	$this->load->view('videos/addvideos', array('data'=>$data, 'page_res'=>$page_res));
	
}//end function


function addvideothumbnail(){
	
	global $page_res;
	$this->general_page_resource();
	
	
	$data['page_title'] = "Add Video Thumbnail";
	$data['css_cls'] = '';
	$page_res['page_name'] = '<span>Add Video Thumbnail</span>';
	
	//get the videos for this church account limit 15
	
	$videos = useraccount::loadDetails($tableName='tbl_videos',$arrFilter=array('church_id'=>$page_res['church_id'], 'approved'=>1),$arrAttribute=array('id','video_code', 'church_id', 'video_title', 'video_desc', 'video_url', 'video_thumbnail_url', 'video_category', 'approved', 'time_posted'),$num=15,$orderBy='');
	
	$data['nvideos'] = count($videos['id']);

	$this->load->view('videos/addvideothumbnail', array('data'=>$data, 'page_res'=>$page_res, 'videoInfo'=>$videos));
	
}//end function

function uploadvideothumbnail(){
	
		global $page_res;
		
		$this->general_page_resource();
	
	 	$view = 'videos/addvideothumbnail';
		
        $seenform = $this->input->post('seenform');
		
		//echo json_encode(array('status'=>false,'error'=>$seenform)); exit;
		
        $userID = $page_res['user_id'];
		
		$church_id = $page_res['church_id'];
		
		
         if(empty($seenform)){
             $this->load->view($view);
             return;
         }
		 
		 
		 //echo json_encode(array('status'=>true, 'message'=>$_FILES['video']['name']));exit;
        //check validity of uploaded file
        if(empty($_FILES['picture']['name']) || !file_exists($_FILES['picture']['tmp_name'])){
			
            echo json_encode(array('status'=>false,'error'=>'&nbsp;Please select a picture file for upload'));
            exit;
            
        } 
        //if control gets here, a file was uploaded.. find out if its d file we are expecting
		
		$flag_valid = $this->misc->isValidPictureUpload($_FILES['picture']);

        if(!$flag_valid){
           echo json_encode(array('status'=>false,'error'=>'&nbsp;Invalid file format. Please note that only jpg, png, gif file formats are currently supported.'));
           exit; 
        }
        /// check the SIZE
        if(filesize($_FILES['picture']['tmp_name']) > CUSTOM_MAX_PICTURE_SIZE){
            //file is too large
            echo json_encode(array('status'=>false,'error'=>'&nbsp;File is too large. The maximum file size is 500KB'));
            exit;
        }
        //if control gets here.. we are good to add
        //generate the save path
        $pathInfo = pathinfo($_FILES['picture']['name']);
	
		$saveVideoThumbnailPath = CUSTOM_VIDEO_THUMBNAIL_PATH."/".$this->misc->genRand(mt_rand(5,10)).".".$pathInfo['extension'];
		
		//echo json_encode(array('status'=>true, 'message'=>$saveVideoThumbnailPath)); exit;
		
		//lets resize this image to diff sizes
		
		// generate thumbnail of 200px by 200px

		
							$thumb = new Thumbnailmanager();
							$thumb->__initialise("./".$saveVideoThumbnailPath);
							$thumb->size_width(200);
							$thumb->size_height(200);
							$thumb->process();
							$thumb->save("./".$saveVideoThumbnailPath);

		  if(move_uploaded_file($_FILES['picture']['tmp_name'],$saveVideoThumbnailPath)){
			  ///update the user's record
			
			  $vidcode = strip_tags($_POST['lstvideos']);

			  $this->mysql->update('tbl_videos', array('video_thumbnail_url'=>$saveVideoThumbnailPath), array('video_code'=>$vidcode));
			  
			  $this->session->set_userdata('video_thumbnail_url', '/'.$saveVideoThumbnailPath);
  
			  echo json_encode(array('status'=>true,'message'=>'&nbsp;Picture successfully uploaded.')); exit;
		  }
	
}//end function

function viewfiles(){
	
	global $page_res;
	$this->general_page_resource();
	
	
	$data['page_title'] = "Add Video File";
	$data['css_cls'] = '';
	$page_res['page_name'] = '<span>Add Video File</span>';
	
	$this->load->view('videos/viewvideos', array('data'=>$data, 'page_res'=>$page_res));
	
}//end function


function uploadfile(){
	
		global $page_res;
		$this->general_page_resource();
	
	 	$view = 'videos/addvideos';
		
        $seenform = $this->input->post('seenform');
		
		//echo json_encode(array('status'=>false,'error'=>$seenform)); exit;
		
        $userID = $page_res['user_id'];
		$church_id = $page_res['church_id'];
		
		
         if(empty($seenform)){
             $this->load->view($view);
             return;
         }
		 
		 
		 //echo json_encode(array('status'=>true, 'message'=>$_FILES['video']['name']));exit;
        //check validity of uploaded file
        if(empty($_FILES['video']['name']) || !file_exists($_FILES['video']['tmp_name'])){
			
            echo json_encode(array('status'=>false,'error'=>'&nbsp;Please select a video file for upload'));
            exit;
            
        } 
        //if control gets here, a file was uploaded.. find out if its d file we are expecting
		
		
		//echo json_encode(array('status'=>false,'error'=>$arrFormat[1]));exit; 
		$flag_valid = $this->misc->isValidVideoMime($_FILES['video']);
		
		//echo json_encode(array('status'=>false,'error'=>$flag_valid)); exit;
           //exit; 
        if(!$flag_valid){
           echo json_encode(array('status'=>false,'error'=>'&nbsp;Invalid file format. Please note that only mp4, avi, mpeg file formats are currently supported.'));
           exit; 
        }
        /// check the SIZE
        if(filesize($_FILES['video']['tmp_name']) > CUSTOM_MAX_VIDEO_SIZE){
            //file is too large
            echo json_encode(array('status'=>false,'error'=>'&nbsp;File is too large. The maximum file size is 1000KB'));
            exit;
        }
        //if control gets here.. we are good to add
        //generate the save path
        $pathInfo = pathinfo($_FILES['video']['name']);
		
		//echo json_encode(array('status'=>false,'error'=>$pathInfo['extension']));exit;
        //$savePath = CUSTOM_video_PATH.$this->misc->saveDirPrefix().'/'.$this->misc->genRand(mt_rand(5,10)).'.'.$pathInfo['extension'];
		
		//$savePath = "./user_res/celloutlines/".$_FILES['video']['name'];
		
		$saveVideoPath = CUSTOM_VIDEO_PATH.$this->misc->genRand(mt_rand(5,10)).".".$pathInfo['extension'];
		//$saveVideothumbnail = CUSTOM_VIDEO_THUMBNAIL_PATH.$this->misc->saveDirPrefix()."/".$this->misc->genRand(mt_rand(5,10)).".".$pathInfo['extension'];
		//echo json_encode(array('status'=>false,'error'=>$saveVideoPath));exit;
        //echo json_encode(array('status'=>false,'error'=> $saveVideoPath));exit;
		//copy the file
		//$arrp = explode(".", $savePath);
		
		
        if(move_uploaded_file($_FILES['video']['tmp_name'],$saveVideoPath)){
            ///update the user's record
            //$this->useraccount->updateUserAtrribute($userID,'userPicPath',$savePath) ;
			$vidtitle = strip_tags($_POST['video_title']);
			$vidcat = strip_tags($_POST['lstcategory']);
			$viddesc = strip_tags($_POST['video_desc']);
			$video_code = time();
			
			$this->mysql->insert(array('video_code'=>$video_code, 'church_id'=>$page_res['church_id'], 'video_title'=>$vidtitle,'video_desc'=>$viddesc, 'video_url'=>'/'.$saveVideoPath, 'video_thumbnail_url'=>'', 'video_category'=>$vidcat, 'time_posted'=>time()), 'tbl_videos');
			
            $this->session->set_userdata('video_url', '/'.$saveVideoPath);
			//$this->session->set_userdata('video_thumbnail_url', $savePath);
			
			
            echo json_encode(array('status'=>true,'message'=>'&nbsp;Video successfully uploaded.'));
			
            exit;
        }
	
}//end function
	
	


///////////////////////////////////////////////////////////////////////////////////////////
	
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
	
	




///////////////////////////////////////////////////
}//end class
