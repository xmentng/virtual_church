<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Churchsystem extends CI_Controller {
	
function __construct(){
	parent::__construct();
}//end function




function index(){
    }
    
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
	
	
	
	function markChurchAttendance(){
		
		//echo "i am healed."; exit;
		
		$userID = intval($this->uri->segment(3));
		$churchID = $this->session->userdata('church_id');

		$hour = date('h', time());
		$min = date('i', time());
		
		$day = date('d', time());
		$month = date('m', time());
		$year = date('Y', time());
		
		$service_time = mktime(0, 0, 0, $month, $day, $year);
		$attendanceTime = time();
	
		$this->session->set_userdata(array('churchservice_time'=>$service_time));

		$flag_exist = useraccount::record_exist($attributes=array('user_id', 'service_time', 'status'), $tblname='tbl_churchservice_attendance', $where = array('user_id'=>$userID, 'service_time'=>$service_time, 'status'=>1));
		
		if($flag_exist == 'no'){
			
			$flag_inserted = mysql::insert(array('church_id'=>$churchID, 'user_id'=>$userID, 'day'=>$day, 'month'=>$month, 'year'=>$year, 'time_joined'=>$attendanceTime, 'service_time'=>$service_time, 'status'=>1), "tbl_churchservice_attendance");
		
		
			echo json_encode(array("status"=>true, "message"=>"Attendance successfully processed.")); 
		}else{
			
			echo json_encode(array("status"=>false, "message"=>"Record previously exist.")); 
		}
		
		
		
	}//end function




///////////////////////////////////////////////////
}//end class
