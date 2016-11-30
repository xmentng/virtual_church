<?php
class CommentsManager extends CI_Model{
       // public $_commentsTable = 'tbl_vod_comments';
        
        
        function add($arrInfo){
            /* add a comment
                $arrInfo is an associative array containing the comments properties
     
            */
            
            if(!is_array($arrInfo)){
                return false;
            }
            foreach ($arrInfo as $key => $value) {
                //echo "Key: $key; Value: $value<br />";
                $arrValues[$key] = $value;
                $arrInsert[$key] = MySQL::SQLValue($value,'text');
            }
            //generate
            
            if($this->mysql->InsertRow($this->_commentsTable,$arrInsert)){
                return array('status'=>true);   
            }
            else{
                return array('status'=>false);   
            } 
       }
       function approveComments($commentID){
            /// approve a comment... usually called by the admin
            //load the authenticator library
            
            //$this->load->library('Authenticator');
            //$this->authenticator->isAdminAuth();
            
            
            $IDString = '';
            if(is_array($commentID)){
                foreach ($commentID as $value) {
                    $IDString .= "'$value',";
                }
                // remove the trailing comma
                $IDString = rtrim($IDString,',');
            }
            else{
                $IDString = "'$commentID'";
            }
         
             $this->mysql->query("UPDATE tbl_vod_comments SET approved='1' WHERE ID IN ($IDString)");
             return true;
         
         
         }
         
         function disapproveComments($commentID){
            /// disapprove a comment... usually called by the admin
            //load the authenticator library
            
            //$this->load->library('Authenticator');
            //$this->authenticator->isAdminAuth();
        
            $IDString = '';
            if(is_array($commentID)){
                foreach ($commentID as $value) {
                    $IDString .= "'$value',";
                }
                // remove the trailing comma
                $IDString = rtrim($IDString,',');
            }
            else{
                $IDString = "'$commentID'";
            }
         
             $this->mysql->query("UPDATE tbl_vod_comments SET approved='0' WHERE ID IN ($IDString)");
             return true;
         }
		 
	function loadBatchedComments($param){
		
		$sql="SELECT tbl_vod_comments.id, video_post_id, video_title, COUNT(tbl_vod_comments.id) AS total_comments, tbl_vod_comments.approved, video_thumbnail_url
FROM tbl_vod_comments, tbl_videos
WHERE tbl_vod_comments.video_post_id=tbl_videos.video_code
AND tbl_videos.church_id='$param'
GROUP BY video_post_id

";

$resid = mysql::query($sql);

		if( mysql::size($resid) > 0 ){
			$row = mysql_fetch_array($resid);
			do{
				extract($row);
				
				$arr['id'][] = (int)$id;
				$arr['video_post_id'][] = intval($video_post_id);
				$arr['video_title'][] = strip_tags($video_title);
				$arr['total_comments'][] = intval($total_comments);
				$arr['approved'][] = (int)$approved;
				$arr['video_thumbnail_url'][] = $video_thumbnail_url;
	
			}while($row = mysql_fetch_array($resid));
			return $arr;
		}//ens if
		else{
			return false;
		}//end else
		
		
	}//end function
         
         
   function loadComments($videoID,$arrAttribute,$arrMoreInfo){ 
     if(is_array($arrAttribute)){ 
        $attrib = implode(",",$arrAttribute); 
     }
     else{
         $attrib = $arrAttribute;
     }
     // echo $attrib;
     $offset = '';
     $limitString = (isset($arrMoreInfo['number']))?' LIMIT '.$arrMoreInfo['number']:'';
     if(!empty($limitString)){
         // no offset without LIMIT...preposterous of SQL
        $offset = (isset($arrMoreInfo['offset']))?' OFFSET '.$arrMoreInfo['offset']:''; 
     }
     
     $res = mysql::query("SELECT $attrib from tbl_vod_comments WHERE video_post_id='$videoID' ORDER BY time_posted DESC $limitString $offset");
       
        if(mysql::size($res) <1){
            return false;
        }
        else{
            if(is_array($arrAttribute)){
                for($a=0;$a<mysql::size($res);$a++){
                    $row = mysql::fetch($res);
                   
                    for($i=0;$i<count($arrAttribute);$i++){
                        //echo 
                        $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                    }
                }
                return $arr;
            }
            $row = mysql::fetch($res);
            return $row[$arrAttribute];
    
        }
    }       

/////////////////////////////////////////////////////////////////////////////////////

function loadApprovedComments($videoID,$arrAttribute,$arrMoreInfo){ 
     if(is_array($arrAttribute)){ 
        $attrib = implode(",",$arrAttribute); 
     }
     else{
         $attrib = $arrAttribute;
     }
     // echo $attrib;
     $offset = '';
     $limitString = (isset($arrMoreInfo['number']))?' LIMIT '.$arrMoreInfo['number']:'';
     if(!empty($limitString)){
         // no offset without LIMIT...preposterous of SQL
        $offset = (isset($arrMoreInfo['offset']))?' OFFSET '.$arrMoreInfo['offset']:''; 
     }
     
     $res = mysql::query("SELECT $attrib from tbl_vod_comments WHERE video_post_id='$videoID' AND approved='1' ORDER BY time_posted DESC $limitString $offset");
       
        if(mysql::size($res) <1){
            return false;
        }
        else{
            if(is_array($arrAttribute)){
                for($a=0;$a<mysql::size($res);$a++){
                    $row = mysql::fetch($res);
                   
                    for($i=0;$i<count($arrAttribute);$i++){
                        //echo 
                        $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                    }
                }
                return $arr;
            }
            $row = mysql::fetch($res);
            return $row[$arrAttribute];
    
        }
    }       
//////////////////////////////////////////////////////////////////////////////////////   
   function loadUnApprovedComments($arrAttribute,$arrMoreInfo){ 
     if(is_array($arrAttribute)){ 
        $attrib = implode(",",$arrAttribute); 
     }
     else{
         $attrib = $arrAttribute;
     }
     // echo $attrib;
     $offset = '';
     $limitString = (isset($arrMoreInfo['number']))?' LIMIT '.$arrMoreInfo['number']:'';
     if(!empty($limitString)){
         // no offset without LIMIT...preposterous of SQL
        $offset = (isset($arrMoreInfo['offset']))?' OFFSET '.$arrMoreInfo['offset']:''; 
     }
     
     $res = $this->mysql->query("SELECT $attrib from tbl_vod_comments WHERE approved='0' ORDER BY date DESC $limitString $offset");
       
        if($res->size() <1){
            return false;
        }
        else{
            if(is_array($arrAttribute)){
                for($a=0;$a<$res->size();$a++){
                    $row = $res->fetch();
                   
                    for($i=0;$i<count($arrAttribute);$i++){
                        //echo 
                        $arr[$arrAttribute[$i]][$a] = $row[$arrAttribute[$i]];
                    }
                }
                return $arr;
            }
            $row = $res->fetch();
            return $row[$arrAttribute];
    
        }
    }       
   
   
   
   
   function loadNumOfComments($contentID){
       $sql = "SELECT COUNT(contentID) AS total FROM tbl_vod_comments WHERE contentID='$contentID' AND approved='1'";
       $res = $this->mysql->query($sql);
       $row = $res->fetch();
       return $row['total'];
   }
   
   function deleteComments($commentsID){
      /* delete comments
      */
     
      $IDString = '';
      if(is_array($commentsID)){
          foreach ($commentsID as $value) {
            $IDString .= "'$value',";
          }
          // remove the trailing comma
          $IDString = rtrim($IDString,',');
      }
      else{
          $IDString = "'$commentsID'";
      }
      
      //// run query
      $this->mysql->query("delete from tbl_vod_comments where ID IN ($IDString)");
      return true;
      
  }
   
}

