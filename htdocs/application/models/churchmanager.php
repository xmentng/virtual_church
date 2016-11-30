<?php
class churchmanager extends CI_Model {
	

function __construct(){

  parent::__construct();
  
  
}//end function


function loadChurchDetail($arrAttribute, $tblname, $arrFilter){

	 //// load church attributes based on other attributes
            // $arrFilter is an associative array tht would normally go in to the WHERE clause
            $cond = '';
            foreach ($arrFilter as $key => $value) {
                //$cond .= MySQL::SQLValue($value,'text').',';
                $cond .= "$key=".MySQL::SQLValue($value,'text').' AND ';   
            }
            //remove trailing " AND"
            $cond = rtrim($cond,' AND');
            $details = (is_array($arrAttribute))?implode(",",$arrAttribute):$arrAttribute;
            $sql = "SELECT $details FROM ".$tblname." WHERE $cond ";
            //echo $sql;
            $res = $this->mysql->query($sql);
            if($this->mysql->size($res)<1){
                return false;
            }
            else{
                if(is_array($arrAttribute)){
                    for($a=0;$a<$this->mysql->size($res);$a++){
                        $row = $this->mysql->fetch($res);
                        for($i=0;$i<count($arrAttribute);$i++){
                            $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                        }
                    }
                    return $arr;
                }
                $row = $this->mysql->fetch($res);
                return $row[$arrAttribute];
    
            }
	
}//end function

function hasChurchCell($param, $arrDetails){
	
	$details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
	$sql = "SELECT $details FROM tbl_cells WHERE church_id=\"$param\" ";
        $res = $this->mysql->query($sql);
        if(mysql_num_rows($res)<1){
                return 0;
        }
        else{
			return 1;
			
		}
	
}//end function


function isCellMember($param, $arrDetails){
	
	$details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
	$sql = "SELECT $details FROM tbl_cell_members_cell WHERE cell_member_id=\"$param\" ";
        $res = $this->mysql->query($sql);
        if(mysql_num_rows($res)<1){
                return 0;
        }
        else{
			return 1;
			
		}
		
}//end function


function isChurchLeader($churchLeaderID){
          //check if the ID supplied is a church Leader
          $resp = $this->loadChurchAttributesByAttribute(array('churchLeaderID'=>$churchLeaderID),array('churchID'));
          if(!empty($resp['churchID'][0])){
              return true;
          }
          return false;
      }
      
      
      function loadChurchInfo($userName,$arrDetails){
            /* load user details
            */
        
            if(is_array($userName)){
                foreach ($userName as $key => $value) {
                     $cond .= MySQL::SQLValue($value,'text').',';
                }
                //remove trailing comma
                $cond = rtrim($cond,',');

            }
            else{
                $cond = MySQL::SQLValue($userName,'text');
            }
            $details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
            $sql = "select $details from ".$this->_userTable." where email IN ($cond)";
       
            $res = $this->mysql->query($sql);  
            if($this->mysql->size($res)<1){
                return false;
            }
            else{
                if(is_array($arrDetails)){
                    for($a=0;$a<$this->mysql->size($res);$a++){
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
        
        function loadChurchAttributesByAttribute($arrFilter,$arrAttribute){
            //// load church attributes based on other attributes
            // $arrFilter is an associative array tht would normally go in to the WHERE clause
            $cond = '';
            foreach ($arrFilter as $key => $value) {
                //$cond .= MySQL::SQLValue($value,'text').',';
                $cond .= "$key=".MySQL::SQLValue($value,'text').' AND ';   
            }
            //remove trailing " AND"
            $cond = rtrim($cond,' AND');
            $details = (is_array($arrAttribute))?implode(",",$arrAttribute):$arrAttribute;
            $sql = "SELECT $details FROM ".$this->_churchTable." WHERE $cond ";
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
        
    function validateChurchLeader($userID,$churchID){
        ///check is userID is the leader of churchID
        $arr = $this->loadChurchAttributesByAttribute(array('churchID'=>$churchID),array('churchLeaderID'));
        if($arr['churchLeaderID'][0] == $userID){
            return true;
        }
        return false;
    }
    
    function loadChurchMembers($churchID){
        //load members of a church
        //load useraccount model
        $CI = &get_instance();
        $CI->load->model('useraccount');
        $arrChurch = $CI->useraccount->loadUserAttributesByAttribute(array('churchID'=>$churchID),array('userID'));
        //we need to filter out the church leader from the list
        $churchLeader = $this->loadChurchLeader($churchID);
        for($a=0;$a<count($arrChurch['userID']);$a++){
            if($arrChurch['userID'][$a] != $churchLeader){
                $arrChurch2[] =  $arrChurch['userID'][$a];
            }
            
        }
        return $arrChurch2;
    }
    function loadScheduledMeetingsByLeader($churchID){
            /* Load Meetings scheduled/upcoming meetings a cell leader
            * $chhurchID => The church ID
            */
            //load the cell ID of which this user is the leader
            
            //load the meeting manager model
            $CI =& get_instance();
            $CI->load->model('meetingmanager');
            $arrMeetingInfo = $CI->meetingmanager->loadMeetingAttributesByAttribute(array('meetingOwner'=>$churchID,'meetingType'=>2),array('meetingID','meetingName','meetingStartTime','totalAttendance','meetingDuration','meetingStatus','amountPayable'));
            
            //we also need to load the attendance for a meeting
            $totalSize = count($arrMeetingInfo['meetingID']);
            $time = Misc::serverTime();
           
            if(is_array($arrMeetingInfo['meetingID'])){
                $arrReturnMeetingInfo = array();
                //we then loop thru to find the ones that hvnt held.. not very effcient
                for($a=0;$a<$totalSize;$a++){
                    if($arrMeetingInfo['meetingStartTime'][$a] >= $time || ($arrMeetingInfo['meetingStartTime'][$a]<= $time && $time <= $arrMeetingInfo['meetingStartTime'][$a]+$arrMeetingInfo['meetingDuration'][$a])  ){
                        foreach ($arrMeetingInfo as $key => $value) {
                            $arrReturnMeetingInfo[$key][] = $arrMeetingInfo[$key][$a];
                        }

                        
                    }
                }
               //var_dump($arrReturnMeetingInfo);exit;     
                if(isset($arrReturnMeetingInfo['meetingID'])){
                    return array('status'=>true,'arrMeetings'=>$arrReturnMeetingInfo);
                }
                else{
                   return array('status'=>false,'error'=>'No meetings records were found.');  
                }
            }
            else{
                return array('status'=>false,'error'=>'No meetings records were found.');
            }
        }
        
        function loadChurchLeader($churchID){
            //load the leader of a church
            $arr = $this->loadChurchAttributesByAttribute(array('churchID'=>$churchID),array('churchLeaderID'));
            return $arr['churchLeaderID'][0];
        }
		
		
		function getSummaryChurchAttendanceReport($param, $churchID){
			
			$sql = "SELECT tbc.id, tbc.church_name, COUNT(tbca.id) AS total_attendance, tbca.service_time, FROM_UNIXTIME(tbca.service_time, '%m /%d /%Y') AS service_date
FROM tbl_churches AS tbc INNER JOIN tbl_churchservice_attendance AS tbca ON tbc.id=tbca.church_id
WHERE service_time=\"$param\" AND tbc.id=\"$churchID\"
GROUP BY tbca.church_id";


			$resid = mysql::query($sql);
			
			//echo  mysql::size($resid); exit;

			if( mysql::size($resid) > 0 ){
				$row = mysql_fetch_array($resid);
				do{
					extract($row);
					
					$arr['id'][] = intval($id);
					$arr['church_name'][] = $church_name;
					$arr['total_attendance'][] = $total_attendance;
					$arr['service_time'][] = $service_time;
					$arr['service_date'][]= $service_date;
					
					
				}while($row = mysql_fetch_array($resid));
				return $arr;
			}//ens if
			else{
				return false;
			}//end else
		

			
		}//end function
		
		
		
		
		function getDetailChurchAttendanceReport($param, $churchID){
			
			$sql = "SELECT tca.church_id, tca.user_id, FROM_UNIXTIME(tca.time_joined) AS time_joined, tca.service_time, FROM_UNIXTIME(tca.service_time) AS service_date, tc.church_name, tu.first_name, tu.last_name
FROM tbl_churchservice_attendance AS tca
INNER JOIN tbl_churches AS tc ON tca.church_id=tc.id
INNER JOIN tbl_users AS tu ON tca.user_id=tu.id
WHERE tca.service_time=\"$param\"
AND tca.church_id=\"$churchID\" ";


			$resid = mysql::query($sql);
			
			//echo  mysql::size($resid); exit;

			if( mysql::size($resid) > 0 ){
				$row = mysql_fetch_array($resid);
				do{
					extract($row);
					
					$arr['church_id'][] = intval($church_id);
					$arr['user_id'][] = $church_name;
					$arr['time_joined'][]= $time_joined;
					$arr['service_date'][]= $service_date;
					$arr['church_name'][] = $church_name;
					$arr['first_name'][] = $first_name;
					$arr['last_name'][] = $last_name;

				}while($row = mysql_fetch_array($resid));
				return $arr;
			}//ens if
			else{
				return false;
			}//end else
			
		}//end function

///////////////////////////////////////////////////////////////////////////////////////

}// end class



