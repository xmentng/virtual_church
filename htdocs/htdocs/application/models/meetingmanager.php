<?php
class MeetingManager extends CI_Model{
    public $_meetingTable = 'tbl_meetings';
    public $_meetingTableType = 'tbl_meetings_types';
    public $_accessTable = 'tbl_meeting_attendance';
    public $_meetingAccess = 'tbl_meeting_access';
	
	
	function loadDetails($tableName,$arrFilter,$arrAttribute,$num=NULL,$orderBy=''){
          //load a complete record  based on filter
          //$tableName => table name
          //$arrFilter => an asociative array of filters..usually in the WHERE clause
          $whereStr = ''; 
          $orderByStr ='';
          $limitStr='';
           if(is_array($arrFilter)){
               foreach($arrFilter as $key=>$value){
                   $whereStr .= "$key='$value' AND ";
               }
               //strip the trailing AND
               $whereStr = rtrim($whereStr,'AND ');
           }
           $attrib = (is_array($arrAttribute))?implode(",",$arrAttribute):$arrAttribute; 
           if($num){
               //add LIMIT portion
               $num = (int)$num;
               $limitStr = " LIMIT $num";
           }
           if(is_array($orderBy)){
                foreach($orderBy as $key=>$value){
                    $orderByStr = " ORDER BY $key $value ";
                }
           }
           $sql = "SELECT [FIELDS] FROM ".$tableName.' WHERE '.$whereStr.$orderByStr.$limitStr;
          // echo $sql;  
           $res = $this->mysql->iQuery($sql,array('FIELDS'=>$attrib));
           if($res->size() <1){
            return false;
        }
        else{
            if(is_array($arrAttribute)){
                for($a=0;$a<$res->size();$a++){
                    $row = $res->fetch();
                    for($i=0;$i<count($arrAttribute);$i++){
                        $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                    }
                }
                return $arr;
            }
            $row = $res->fetch();
            return $row[$arrAttribute];
    
        }
 }//end function
    
    function addMeeting($arrInfo){
        // create a meeting
        $arrInsert = array();
        foreach($arrInfo as $key => $value){
            $arrInsert[$key] = $this->mysql->SQLValue($value,'string');   
        }
        //generate the meeting ID
        $mtnID = 'mtn'.mt_rand(1,9).$this->misc->genRand(mt_rand(3,6));
        $arrInsert['meetingID'] = $this->mysql->SQLValue($mtnID,'string');
        //generate a publishing point for the meeting
        $pubPoint = 'pub'.mt_rand(1,9).$this->misc->genRand(mt_rand(15,20));
        $arrInsert['meetingPublishingPoint'] = $this->mysql->SQLValue($pubPoint,'string');  
        if($this->mysql->InsertRow($this->_meetingTable,$arrInsert)){
              //return the meeting ID
              return array('meetingID'=>$mtnID,'status'=>true);
        }
        else{
            return array('error'=>'Error scheduling. Meeting may already exist.','status'=>false);    
        }
        
    }
    function loadLiveMeetingsByType($meetingTypeID,$arrDetails){
        /*
            Load live meetings by type eg live cell meetings, live PCU meetings etc
        */
        $details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
        $time = Misc::serverTime();
        $sql = "SELECT $details FROM ".$this->_meetingTable." WHERE $time >= meetingStartTime AND $time < meetingStartTime+meetingDuration AND meetingStatus='1'";
        $res = $this->mysql->query($sql);
        if($res->size()<1){
                return false;
        }
        else{
           if(is_array($arrDetails)){
              for($a=0;$a<$res->size();$a++){
                    $row = $res->fetch();
                    for($i=0;$i<count($arrDetails);$i++){
                            $arr[$arrDetails[$i]][$a] = $row[$arrDetails[$i]];
                    }
              }
              return $arr;
           }
                $row = $res->fetch();
                return $row[$arrDetails];
    
       }
    }
    function loadMeetingInfo($meetingID,$arrDetails){
            /* load meeting details
            */
        
            if(is_array($meetingID)){
                foreach ($meetingID as $key => $value) {
                     $cond .= MySQL::SQLValue($value,'text').',';
                }
                //remove trailing comma
                $cond = rtrim($cond,',');

            }
            else{
                $cond = MySQL::SQLValue($meetingID,'text');
            }
            $details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
            $sql = "select $details from ".$this->_meetingTable." where meetingID IN ($cond)";
       
            $res = $this->mysql->query($sql);  
            if($res->size()<1){
                return false;
            }
            else{
                if(is_array($arrDetails)){
                    for($a=0;$a<$res->size();$a++){
                        $row = $res->fetch();
                        for($i=0;$i<count($arrDetails);$i++){
                            $arr[$arrDetails[$i]][$a] = $row[$arrDetails[$i]];
                        }
                    }
                    return $arr;
                }
                $row = $res->fetch();
                return $row[$arrDetails];
    
            }
        
        
        } ///
        
        function isMeetingLive($meetingID){
            /* Checks if a meeting is now on and its not in suspend mode
				implemented when the user wants to attend a meeting
                $meetingID => ID of the meeting
            */
            $sql = "SELECT meeting_title,meeting_duration,status FROM ".$this->_meetingTable." WHERE id='$meetingID' LIMIT 1";
            $res = $this->mysql->query($sql);
            if($this->mysql->size($res) != 1){
                return array('status'=>false,'error'=>'Unknown meeting');
            }
            $row = $this->mysql->fetch($res);
            $currTime = Misc::serverTime();
            if($row['status'] != '1'){
                //meeting is in suspend mode
                return array('status'=>false,'error'=>'Meeting is in suspend mode.'); 
            }
            if($currTime >= $row['meeting_time'] && $currTime <= ($row['meeting_time']+$row['meeting_duration']) && $row['status']=='1'){
                ///meeting seems to be live and not in suspend mode
                return array('status'=>true);
            }
            else{
                /// meeting is not live then
                return array('status'=>false,'error'=>'Meeting is not live now');
            }
        }
        function markMeetingAttendance($userName,$meetingID){
            /* Mark the meeting attendance
            * $userName
            */
			//$arrInsert['meeting_type'] = MySQL::SQLValue($meetingType,'int');
			
            $arrInsert['user_id'] = MySQL::SQLValue($userName,'string');
            $arrInsert['meeting_id']  = MySQL::SQLValue($meetingID,'string');
            $arrInsert['time_joined'] = MySQL::SQLValue(Misc::serverTime(),'int');
            //proceed to insetrtr
            $this->mysql->InsertRow($this->_meetingAttendanceTable,$arrInsert);
            
        }
        function loadMeetingAttributesByAttribute($arrFilter,$arrAttribute){
            //// load meeting attributes based on other attributes
            // $arrFilter is an associative array tht would normally go in to the WHERE clause
            $cond = '';
            foreach ($arrFilter as $key => $value) {
                //$cond .= MySQL::SQLValue($value,'text').',';
                $cond .= "$key=".MySQL::SQLValue($value,'text').' AND ';   
            }
            //remove trailing " AND"
            $cond = rtrim($cond,' AND');
            $details = (is_array($arrAttribute))?implode(",",$arrAttribute):$arrAttribute;
            $sql = "SELECT $details FROM ".$this->_meetingTable." WHERE $cond ORDER BY meetingStartTime DESC ";
            //echo $sql;
            $res = $this->mysql->query($sql);
            if($res->size()<1){
                return false;
            }
            else{
                if(is_array($arrAttribute)){
                    for($a=0;$a<$res->size();$a++){
                        $row = $res->fetch();
                        for($i=0;$i<count($arrAttribute);$i++){
                            $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                        }
                    }
                    return $arr;
                }
                $row = $res->fetch();
                return $row[$arrAttribute];
    
            }
        }
        
        function deleteMeeting($userID,$meetingID){
            /* Delete a meeting
            * $userName => user trying to delete the meting.. must be the meetingOwner b4 operation succeds
            * $meetingID => ID of the meeting
            */
            //load meeting Info
            $arrMeetingInfo = $this->loadMeetingInfo($meetingID,array('meetingOwner','meetingStartTime','meetingDuration'));
            //check if meeting is in d future.. user can delete previous meetings
            if(Misc::serverTime() >= $arrMeetingInfo['meetingStartTime'][0]){
                ///meeting is in d past..disallow deletion
                 return array('status'=>false,'error'=>'Unable to delete meeting. Meeting has already held.'); 
            }
            if($arrMeetingInfo['meetingOwner'][0] != $userID){
                ///access denied.. user is not the meeting owner
                return array('status'=>false,'error'=>'Unable to delete meeting. Access denied.'); 
            }
            else{
                //assemble SQL for delete
                $sql = 'DELETE FROM '.$this->_meetingTable." WHERE meetingID='$meetingID' AND meetingOwner='$userID' LIMIT 1";
                $res = $this->mysql->query($sql);
                if($res->affectedRows()){
                    return array('status'=>true);
                }
                else{
                    return array('status'=>false,'error'=>'Error deleting meeting');
                }
                
            }
        
            
        }
        function loadUpcomingMeetingsByType($meetingType,$arrAttribute,$arrMoreInfo){
            /* Load upcoming meetings by type i.e upcoming cell meetings, pcu meetings etc
            */
            $details = (is_array($arrAttribute))?implode(",",$arrAttribute):$arrAttribute; 
            $time = Misc::serverTime();
             $limitString = (isset($arrMoreInfo['number']))?' LIMIT '.$arrMoreInfo['number']:'';
              //var_dump($limitString); 
             if(!empty($limitString)){
                // no offset without LIMIT...preposterous of SQL
                $offset = (isset($arrMoreInfo['offset']))?' OFFSET '.$arrMoreInfo['offset']:''; 
             }
            
            $sql = "SELECT $details FROM ".$this->_meetingTable." WHERE meetingStartTime <= $time AND meetingType='$meetingType' ORDER BY meetingStartTime $limitString $offset";
            $res = $this->mysql->query($sql);
            if($res->size()<1){
                return false;
            }
            else{
                if(is_array($arrAttribute)){
                    for($a=0;$a<$res->size();$a++){
                        $row = $res->fetch();
                        for($i=0;$i<count($arrAttribute);$i++){
                            $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                        }
                    }
                    return $arr;
                }
                $row = $res->fetch();
                return $row[$arrAttribute];
    
            }
            
        }
        
        function loadLiveMeetingsByUser($meetingOwner,$arrDetails){
        /*
            Load live meetings by type eg live cell meetings, live PCU meetings etc
        */
       
        $details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
		//var_dump($details);
        $time = time();
        // $time = time();
        //echo $time;    
        
        $sql = "SELECT $details FROM tbl_meetings WHERE  meeting_time <= $time AND meeting_time+meeting_duration > $time AND status='1' AND church_id='$meetingOwner' AND meeting_type='2' ORDER BY id DESC";
        $resid = mysql::query($sql);
		//echo mysql_num_rows($resid); exit;
        if(mysql_num_rows($resid)==0){
                return false;
        }
        else{
           if(is_array($arrDetails)){
              for($a=0;$a<mysql_num_rows($resid);$a++){
                    $row = mysql_fetch_assoc($resid);
                    for($i=0;$i<count($arrDetails);$i++){
                            $arr[$arrDetails[$i]][$a] = $row[$arrDetails[$i]];
                    }
              }
              return $arr;
           }
                $row = mysql::fetch();
                return $row[$arrDetails];
    
       }
    }
    
    function calculatePayment($arrInfo){
        ///calculate amount payable for a meeting based on some parameters
        //$arrInfo['numOfParticipants'] => Number of participants
        //$arrInfo['duration'] => Duration of meeting
        
        $num = $arrInfo['numOfParticipants'] = 200;
        $duration = $arrInfo['duration'];
        $usrDataTrxn = (19200*$duration)*$num;
         //return  $usrDataTrxn;
        //19200 bytes is the amount of data transfered by one user in one sec at about 150kb/s
        $unitCharge = 4; //meaning we are charging $unitCharge dollars for 1GB
        return round(($usrDataTrxn/1000000000)*$unitCharge);
        
    }
    
     public function grantPrivilege($userID,$meetingID){
          /*
            Grant access to a user or group of users to an event
            */
            $num=0; 
          if(is_array($userID)){
              
              //looks like we were given an array of usernames to add
              foreach($userID as $value){
                  $arrInsert = array();
                  $arrInsert['meetingID'] = MySQL::SQLValue($meetingID,'string');
                  $arrInsert['userID'] = MySQL::SQLValue($value,'string');
                  //proceed to finally insert
                  if($this->mysql->InsertRow($this->_meetingAccess,$arrInsert)){
                      $num++;
                  }
              }
          }
          else{
              /// if userNAme is not an array, type cast it to a string
              settype($userID, "string");  
              $arrInsert['meetingID'] = MySQL::SQLValue($meetingID,'string');
              $arrInsert['userID'] = MySQL::SQLValue($userID,'string');
              //proceed to finally insert
              if($this->mysql->InsertRow($this->_meetingAccess,$arrInsert)){
                    $num++;
              }
          }
          return array('status'=>true,'number'=>$num); 
      }
      
      public function denyPrivilege($userID,$meetingID){
          /*
            Deny access to a user or group of users to an event
            */
            $num=0; 
          if(is_array($userID)){
                    
              //looks like we were given an array of usernames to deny
              
              foreach($userID as &$value){
                  $value = "'".$value."'";
              }
              $userNameList = implode(',',$userID);
              echo $userNameList;
              $sql = "DELETE FROM ".$this->_accessTable." WHERE userID IN($userNameList) AND eventID='$meetingID'";
              //run the query
              $this->_db->query($sql);
              //echo $sql;
             // exit;
          }
          else{
              /// if userNAme is not an array, type cast it to a string
              settype($userID, "string");  
              $sql = "DELETE FROM ".$this->_accessTable." WHERE userID='[USERNAME]' AND meetingID='$meetingID'";
              //run the query
              $this->_db->iQuery($sql,array('USERNAME'=>$userID));
          }
          return array('status'=>true,'number'=>$num); 
      }
        
      function loadMeetingsForMe($userID,$arrDetails){
          //load meetings for the user
          $details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
          $time = Misc::serverTime();
          $sql = "SELECT $details FROM ".$this->_meetingTable." WHERE meetingStartTime >= '$time' AND meetingStatus='1' AND meetingID IN(SELECT meetingID FROM ".$this->_meetingAccess." WHERE userID='$userID')";
         // echo $sql;exit;
          $res = $this->mysql->query($sql);
          if($res->size()<1){
                return array('status'=>false,'error'=>'No meetings records were found.'); 
                
          }
          else{
                if(is_array($arrDetails)){
                    for($a=0;$a<$res->size();$a++){
                        $row = $res->fetch();
                        for($i=0;$i<count($arrDetails);$i++){
                            $arr[$arrDetails[$i]][$a] = $row[$arrDetails[$i]];
                        }
                    }
                    return array('status'=>true,'arrMeetings'=>$arr);  
                    //return $arr;
                }
                $row = $res->fetch();
                return array('status'=>true,'arrMeetings'=>$row[$arrDetails]); 
                //return $row[$arrDetails];
    
        }
          
      }  
}
  
/////End of Meeting Manager /////
