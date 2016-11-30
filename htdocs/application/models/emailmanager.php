<?php

class emailmanager extends CI_Model {
	
private $_userTable = "tbl_users";
function __construct(){

  parent::__construct();
  global $page_res;
  $this->load->library(array('sessiondata'));
  sessiondata::general_page_resource();
}//end function


function send_tract_to_recipient($detail, $page_res){
	
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

 
function resendSalvationcallMail(){

	
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



