<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Meetings extends CI_Controller{
      
      
    function __construct() {
        parent::__construct();
        //load up the useraccount model
        $this->load->model('churchmanager');
        //load up meeting manager model
        $this->load->model('meetingmanager');
        //load up the Authenticator library
  /*      $this->load->library('authenticator');
        $this->authenticator->_checkAuth();
        $this->load->model('useraccount');    */       
        $userID = $this->session->userdata('userID');
		$this->load->library('sessiondata');
        
        
    }
	function general_page_resource(){
		
		global $page_res, $comment;
		
		sessiondata::general_page_resource();

		#retrieve the users online.
		/*$logged_in_account = $this->session->userdata('user_name');
		
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
		
		
		//echo $page_res['church_account_name']; exit;
		*/
		
	}//end function
	
	
    function index(){
        $userID = $this->session->userdata('userID');
        $churchID = $this->session->userdata('churchID'); 
        //$arrChurchMeetings = $this->churchmanager->loadScheduledMeetingsByLeader($churchID);
        $arrChurchMeetings = $this->meetingmanager->loadMeetingsForMe($userID,array('meetingID','meetingName','meetingStartTime','totalAttendance','meetingDuration','meetingStatus','amountPayable'));
        if(!$arrChurchMeetings['status']){
           $this->load->view('meetings/index',array('meetingInfo'=>false));  
        }
        else{
           $this->load->view('meetings/index',array('meetingInfo'=>$arrChurchMeetings['arrMeetings'])); 
        }
    }
	
	
	function schedulemeeting(){
		
		$meetingType = intval($this->uri->segment(3));

		$churchID = $this->session->userdata('church_id');
		
		$seenform = $this->input->post('seenform2');
        // first we need to load the cellID of the cell leader
        //$churchID = $this->session->userdata('churchID');
        //we need to load the church member as participants and pass it in to the view
        //$arrParticipants = $this->useraccount->loadUserInfo($this->churchmanager->loadChurchMembers($churchID),array('userID','firstName','lastName'));
        //var_dump($arrParticipants);exit;
        if($seenform != 'schedulecellmeeting'){
                 ///no form submitted.... load the form
                echo json_encode(array('status'=>false,'error'=>"<img src='/images/icons/invalid_small.png' />&nbsp;Kindly ensure all fields are correctly filled."));
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
				$arrInsert['church_id']  = $churchID;
                $arrInsert['meeting_type'] = $meetingType;
				$arrInsert['meeting_title'] = $this->input->post('meetingTitle');
                $arrInsert['meeting_time'] =  mktime($hr,$min,0,$month,$day,$year);
                $arrInsert['meeting_date'] =  mktime($hr,$min,0,$month,$day,$year); //tht is d ID for cell meetings
				
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
    
    function live(){
        //load live meetings for a user
        $churchID = $this->session->userdata('churchID');
        $meetingInfo = $this->meetingmanager->loadLiveMeetingsByUser($churchID,array('meetingName','meetingID','meetingStartTime')) ;
       //var_dump($meetingInfo);exit; 
        //load the view
        $this->load->view('meetings/mylivemeetings',array('meetingInfo'=>$meetingInfo));
    }
    
    function attend(){
        //
         /*
            A user wants to attend cell meeting
          */
		  
		  global $page_res;
		  sessiondata::general_page_resource();
		  
		  
          $this->load->model('commentsmanager');
          $meetingID = intval($this->uri->segment('3'));
          $userID = $page_res['user_id'];
          $churchID = $page_res['church_id'];  
          //see if meeting is live
          //load the meeting manager
		  
		  echo $churchID; exit;
         
          $arrMeetingStatus = $this->meetingmanager->isMeetingLive($meetingID);
		  
          if($arrMeetingStatus['status']){
              //looks like the meeting is live
              //check if this user is a member of this cell
              //first we need to load the meeting owner
              $arrMeetingInfo= $this->meetingmanager->loadMeetingInfo($meetingID,array('meeting_title','church_id','meeting_time','meeting_duration','publishing_point'));
              //var_dump($churchID);exit;
              if($churchID == $arrMeetingInfo['church_id'][0]){
                  /// user is a member of this cell
                  
                  //mark d attendance
                  $this->meetingmanager->markMeetingAttendance($userID,$meetingID);
                  $arrComments = $this->commentsmanager->loadComments($meetingID,array('id', 'meeting_id', 'user_id','comment','time_posted'),array('number'=>10));
                  //we have the userID of commenters.. attempt to load the thumbnail path
                  $arrUser2 = $this->useraccount->loadUserInfo($arrComments['user_id'],array('profile_pic','id'));
                  $arrPic = array();
                  for($a=0;$a<count($arrUser2['profile_pic']);$a++){
                    $arrPic[$arrUser2['id'][$a]] = $arrUser2['profile_pic'][$a];
                  }
                  //load up the cell meeting page 
                  $this->load->view('church_member/attend_cell_service',array('userID'=>$userID,'meetingID'=>$meetingID,'arrComments'=>$arrComments,'arrPic'=>$arrPic));
                  return; 
              }
              else{
                  //user is not a member of this cell
                  //load the error page
                  $this->load->view('accessdenied',array('heading'=>'Error','message'=>'Error connecting to live meeting.'));
                  return;
              }
          }
          else{
              //meeting is probably not live
              $this->load->view('accessdenied',array('heading'=>'Error','message'=>'The requested meeting is not live.'));
              return;
          }
        
    } 
	
	function loadmeetingreceiver(){
        /// this outputs the cell meeting publisher app if user id authenticated
        //authentication has been done in the constructor....
        //echo the appropriate headers
        header('Content-type: application/x-shockwave-flash');
        readfile('../flashapps/meetingreceiver.swf');

    }
    
    function authenticateattendee(){
          //authenticate a user tryin to attend a cell meeting
          // we require via POST userName, encrypted password and meeting ID
          
          // echo "status=0&error=Access denied. This meeting is only open to members of '".$arrCellInfo['cellName'][0]."' cell";
          // exit;
          
          
          
          $userID = $this->session->userdata('userID');
          $churchID = $this->session->userdata('churchID');
          $meetingID = $this->input->post('meetingID');
          //load the meeting manager model
          $this->load->model('meetingmanager');
          //load meeting info
          $arrMeetingInfo = $this->meetingmanager->loadMeetingInfo($meetingID,array('meetingOwner','meetingType','meetingPublishingPoint'));
          //$ar = var_export($arrMeetingInfo,true);
          //chekc the meetingType..if its a cell meeting then meetingTYpe should be 1
          if($arrMeetingInfo['meetingType'][0] != '2'){
            //meeting is not a valid cell meeting... we abort then
            //echo 'status=0&error=Error connecting to the meeting because the meeting is unknown. Please confirm that the meeting exists and is valid.';
            echo "status=0&error=$ar";
            exit;
          }
          if($churchID != $arrMeetingInfo['meetingOwner'][0]){
              
              echo 'status=0&error=Error connecting to the meeting. Access Denied';
            exit;
          }
          
           echo 'status=1&streamUrl=rtmp://fml.dca.1F21.edgecastcdn.net/201F21/virtualchurch&ppoint='.$arrMeetingInfo['meetingPublishingPoint'][0];
           exit;
          $arrCellInfo = $this->cellmanager->loadCellInfo($arrMeetingInfo['meetingOwner'],array('cellLeader','cellName'));
          
          //check if this user is a memebre of the cell
          $arrMembershipStatus = $this->cellmanager->isCellMember($userName,$arrMeetingInfo['meetingOwner'][0]);
          if($arrMembershipStatus['status']){
               //user is  a member of that cell
                //meeting attendee has been successfully authenticated
              //return the publishing point also
              
               echo 'status=1&ppoint='.$arrMeetingInfo['meetingPublishingPoint'][0];
               exit;
               
          }
          else{
              //user is not  a member 
             
              echo "status=0&error=Access denied. This meeting is only open to members of '".$arrCellInfo['cellName'][0]."' cell";
              exit;
          }
      }
       function loadcellmeetingreceiver(){
        /// this outputs the cell meeting publisher app if user id authenticated
        //authentication has been done in the constructor....
        //echo the appropriate headers
        header('Content-type: application/x-shockwave-flash');
        readfile('./flashapps/cellmeetingreceiver.swf');

    }
    function makepayment(){
         echo '
          <p>Please make payment using the following bank details. Upon payment, please send a mail
          stating your Christ Embassy Online username and the depositor\'s information to info@internetmultimediaonline.org
          <br>
              <br>
         <b>Nigeria</b><br>Bank: Oceanic Bank<br>Account Name: Christ Embassy LoveWorld Media/IMM Online<br>Account Number:2461203005138
         <br><br><br> <b>INTERNATIONAL</b><br>
        
      <div style="width:500px;padding:5px;">
<table width="100%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong><h2>US Dollars</h2></strong></td>
  </tr>
  <tr>
    <td width="50%" valign="top"><p>INTERMEDIARY BANK </p></td>
    <td width="50%"><p>DEUTSCHE BANK AG <br />
      6 BISHOPSGATE<br />
         LONDON</p></td>
  </tr>
  <tr>
    <td>SWIFT</td>
    <td>DEUTGB2L</td>
  </tr>
  <tr>
    <td valign="top">BENEFICIARY  BANK </td>
    <td><p>OCEANIC  BANK INTL PLC <br />
    DOMICILIARY ACCOUNT</p></td>
  </tr>
  <tr>
    <td>SWIFT</td>
    <td>OCBINGLA</td>
  </tr>
  <tr>
    <td>ACCOUNT  NO </td>
    <td>30588700</td>
  </tr>
  <tr>
    <td>IBAN</td>
    <td><p>GB04DEUT40508130588700</p></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><span class="style2"><h2>British Pounds</h2></span></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><p>INTERMEDIARY BANK</p></td>
    <td>DEUTSCHE BANK AG LONDON <br />
18TH FLOOR,<br />
6 BISHOPSGATE<br />
LONDON EC2N 4DA</td>
  </tr>
  <tr>
    <td>SWIFT:</td>
    <td>DEUTGB2L</td>
  </tr>
  <tr>
    <td><p>SORT  CODE:</p></td>
    <td>40-50-81</td>
  </tr>
  <tr>
    <td valign="top"><p>BENEFICIARY  BANK</p></td>
    <td>OCEANIC  BANK INTL (NIG) <br />
    LTD, DOMICILIARY ACCOUNT</td>
  </tr>
  <tr>
    <td><p>SWIFT</p></td>
    <td>OCBINGLA</td>
  </tr>
  <tr>
    <td><p>ACCOUNT NO<strong> </strong></p></td>
    <td>030588701</td>
  </tr>
  <tr>
    <td>IBAN</td>
    <td>GBP04DEUT40508130588701</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><h1>EURO</h1></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><p>INTERMEDIARY  BANK</p></td>
    <td> DEUTSCHE BANK AG<br />
FRANKFURT  AM MAIN<br />
GERMANY </td>
  </tr>
  <tr>
    <td valign="top"><p>ADDRESS</p></td>
    <td>POSTFACH 10 06 01<br />
      D-6000 FRANKFURT 1<br />
    GERMANY</td>
  </tr>
  <tr>
    <td><p>SWIFT</p></td>
    <td>DEUTDEFF</td>
  </tr>
  <tr>
    <td><p>BLZ NO</p></td>
    <td>50070010</td>
  </tr>
  <tr>
    <td valign="top"><p>BENEFICIARY BANK</p></td>
    <td> OCEANIC BANK INTL (NIG)<br />
    LTD,  DOMICILIARY ACCOUNT</td>
  </tr>
  <tr>
    <td valign="top"><p>SWIFT</p>      </td>
    <td valign="top">OCBINGLA</td>
  </tr>
  <tr>
    <td>ACCOUNT NO</td>
    <td>955700000</td>
  </tr>
  <tr>
    <td>IBAN</td>
    <td> DE19500700100955700000 </td>
  </tr>
</table>
</div>'
         ; exit;   
        //use is trying to make payment for a meeting
        $userID = $this->session->userdata('userID');
        $churchID = $this->session->userdata('churchID');
        $this->load->model('churchmanager');
        
        $meetingID = $this->uri->segment(3);
        ///load info about the meeting
        $arrMeeting = $this->meetingmanager->loadMeetingInfo($meetingID,array('meetingOwner','meetingType','meetingPublishingPoint','amountPayable','meetingStatus'));
        if(!$this->churchmanager->validateChurchLeader($userID,$arrMeeting['meetingOwner'][0])){
            $this->flashnotice->add('Error loading payment page.','error'); 
            header('Location:/churchsystem/scheduledmeetings');
            exit;
        }
        ///see if it has been paid for already
        if($arrMeeting['meetingStatus'][0] == '1'){
            $this->flashnotice->add('Meeting already activated.','info'); 
            header('Location:/churchsystem/scheduledmeetings');
            exit;
        }
        
    }
    
    function reminders(){
        echo "Reminders successfully sent.";
    }
    
 }
?>
