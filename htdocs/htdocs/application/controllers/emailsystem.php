<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	

class Emailsystem extends CI_Controller {

function __construct(){
		parent::__construct();
		//authmanager::redirect_user();
		$this->load->model('contentmanager');
		$this->load->model('churchmanager');
		$this->load->library(array('util_lib','sessiondata', 'thumbnailmanager'));
}//end function


 
function resendSalvationcallMail(){

	global $page_res;
	sessiondata::general_page_resource();
	
	$invite_id = intval($this->uri->segment(3));
	
	$invite_name = useraccount::getAttributeValue($detail=array('id','invite_name'), $tblname='tbl_call_to_salvation', $where=array('id'=>$invite_id), $retval = 'invite_name');
	
	$invite_email = useraccount::getAttributeValue($detail=array('id','invite_email'), $tblname='tbl_call_to_salvation', $where=array('id'=>$invite_id), $retval = 'invite_email');
	
	$sc_url = useraccount::getAttributeValue($detail=array('id','salvation_call_url'), $tblname='tbl_call_to_salvation', $where=array('id'=>$invite_id), $retval = 'salvation_call_url');
	
	$user_email = $this->session->userdata('email');

	 ///load the email library
	$this->load->library('email');

	$email_setting  = array('mailtype'=>'html');
	$this->email->initialize($email_setting);
	
	$this->email->from($user_email, 'Christ Embassy Virtual Church');
	$this->email->to($invite_email); 

	$this->email->subject('Call to Salvation');

	$body = $this->misc->parse(file_get_contents('./email_templates/salvation_call_mail.php'),array('NAME'=>$invite_name,'EMAIL'=>$invite_email,'ACTIVATEURL'=>$sc_url));
	
	$this->email->message($body);    
	//finally send the mail
	if($this->email->send()){
		echo "success|A salvation call email has been sent to the specified recipient."; exit;
	}else{
	
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
 
 
 
///////////////////////////////////////////////////////////////////////////////////////

}// end class



