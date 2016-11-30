<?php
class cellmanager extends CI_Model {
	
    public $_meetingTable = 'tbl_cell_meetings';
    public $_meetingTableType = 'tbl_meetings_types';
    public $_accessTable = 'tbl_cell_meeting_attendance';
    public $_meetingAccess = 'tbl_cell_meeting_access';
	
	
function __construct(){

  parent::__construct();
  //$this->load->library('mysql');
  
}//end function


function loadLiveMeetings($arrDetails, $tblname){
        /*
            Load live meetings by type eg live cell meetings, live PCU meetings etc
        */
        $details = (is_array($arrDetails))?implode(",",$arrDetails):$arrDetails;
        $time = Misc::serverTime();
        $sql = "SELECT $details FROM ".$tblname." WHERE $time >= meetingStartTime AND $time < meetingStartTime+meetingDuration AND meetingStatus='1'";
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
    }

function loadCellInfo($arrAttribute, $tblname, $arrFilter){

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


  
        function loadCellAttributesByAttribute($arrFilter,$arrAttribute){
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
            if($this->mysql->size($res)<1){
                return false;
            }
            else{
                if(is_array($arrAttribute)){
                    for($a=0;$a<$this->mysql->size($res);$a++){
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
        
    function validateCellLeader($userID,$cellID){
        ///check is userID is the leader of churchID
        $arr = $this->loadChurchAttributesByAttribute(array('cellID'=>$churchID),array('userID'));
        if($arr['cellLeaderID'][0] == $userID){
            return true;
        }
        return false;
    }
    
    function loadCellMembers($churchID){
        //load members of a church
        //load useraccount model
        $CI = &get_instance();
        $CI->load->model('useraccount');
        $arrCell = $CI->useraccount->loadUserAttributesByAttribute(array('cellID'=>$cellID),array('userID'));
        //we need to filter out the church leader from the list
        $cellLeader = $this->loadCellLeader($cellID);
        for($a=0;$a<count($arrCell['userID']);$a++){
            if($arrCell['userID'][$a] != $cellLeader){
                $arrCell2[] =  $arrCell['userID'][$a];
            }
            
        }
        return $arrCell2;
    }
    function loadScheduledMeetingsByLeader($cellID){
            /* Load Meetings scheduled/upcoming meetings a cell leader
            * $cellID => The cell ID
            */
            //load the cell ID of which this user is the leader
            
            //load the meeting manager model
            $CI =& get_instance();
            $CI->load->model('meetingmanager');
            $arrMeetingInfo = $CI->meetingmanager->loadMeetingAttributesByAttribute(array('meetingOwner'=>$cellD,'meetingType'=>2),array('meetingID','meetingName','meetingStartTime','totalAttendance','meetingDuration','meetingStatus','amountPayable'));
            
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
        
        function loadCellLeader($cellID){
            //load the leader of a church
            $arr = $this->loadChurchAttributesByAttribute(array('cellID'=>$churchID),array('userID'));
            return $arr['cellLeaderID'][0];
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
		
		function getAllCells(){
			$query = $this->mysql->query("SELECT * FROM `cells`");
			//die(var_dump($query));
			$result = array();
			while($row = mysql_fetch_assoc($query)){
				$result[] = $row;
			}
			return $result;
		}
		
		function getCellById($cell_id){
			$query = $this->mysql->query("SELECT * FROM `cells` WHERE `id`='".$cell_id."'");
			return mysql_fetch_assoc($query);
		}

///////////////////////////////////////////////////////////////////////////////////////

}// end class



