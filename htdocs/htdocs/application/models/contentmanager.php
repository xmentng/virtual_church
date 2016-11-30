<?php
class Contentmanager extends CI_Model {

function __construct(){
	
  parent::__construct();
  
}//end function



function loadUsers(){
  $sql = "SELECT * FROM adminusers";
  $resid = querymanager::query($sql);
  
  if(querymanager::size($resid) > 0){
	
	   for($a=0;$a < querymanager::size($resid);$a++):
			  $row = querymanager::fetch($resid);
			  for($i=0; $i<mysql_num_fields($resid); $i++){
				  $arr[$i][$a] = $row[$i];			
			  }
			  $arr['id'][] = (int)$row['id'];
			  $arr['firstname'][]= $row['firstname'];
			  $arr['lastname'][]= $row['lastname'];
			  //$arr['gender'][]= $row['gender'];
			  $arr['email'][]= $row['email'];
			  $arr['username'][]= $row['username'];
			  $arr['pwd'][]= $row['pwd'];
			  $arr['admin'][]= $row['admin'];
			  $arr['rec_exist'][]= $row['rec_exist'];

	  endfor;
	  return $arr;
  
  }//end if	
}//end function


function loadTotalRecord($fld, $tblname){

	$sql = "SELECT count($fld) as total FROM ".$tblname;
	$resid = $this->querymanager->query($sql);
	if($this->querymanager->size($resid) > 0){
	
		$row = $this->querymanager->fetch($resid);
		return (int)$row['total'];
		
	}else{
		return 0;	
		
	}
}//end function

function loadTotalRefRecord($where, $fld, $tblname){
	if(is_array($where)){
	  $sql = "SELECT count($fld) as total FROM ".$tblname." WHERE ";
	  foreach( $where as $field => $value ):
		  $sql .= $field."=\"$value\" AND ";
	  endforeach;
	  $sql = rtrim($sql, " AND ");
	  
	  $resid = $this->querymanager->query($sql);
	  if($this->querymanager->size($resid) > 0){
	  
		  $row = $this->querymanager->fetch($resid);
		  return (int)$row['total'];
		  
	  }else{
		  return 0;	
		  
	  }
	}//end if the where parameter is an array
}//end function




function checkforDuplicate($tblname, $detail, $where){
			
			if(is_array($detail)){
			
			$sql = "SELECT ";
			
			foreach($detail as $fld => $val):
				$sql .= $fld.", ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .=" FROM ".$tblname." WHERE ";
			
			foreach($where as $fld2 => $val2):
				$sql .= $fld2."=\"$val2\" AND ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-5);

			$resid = querymanager::query($sql);
		
			if(querymanager::size($resid) > 0 ){
				
				return true;
				
			}else{
				
				return false;
			}
		}// end if
				
			
			
}//end function




function loadTotalRefUsers($where, $fldname, $tblname){
	$sql = "SELECT * FROM $tblname WHERE $fldname LIKE '%$where[$fldname]%'";
	$resid = querymanager::query($sql);


	if( querymanager::size($resid) > 0 ){
		return querymanager::size($resid);
	}else{
		return 0;	
	}
}//end function

function load_notice_board_content($tblname, $filter){
	$param =  intval($filter['content_type_id']);
	$sql = "SELECT id, content_title, content_type_id, content_body FROM $tblname WHERE content_type_id=\"$param\" ORDER BY id DESC LIMIT 1 ";
	
	$resid = querymanager::query($sql);
	
	if(querymanager::size($resid)>0){
		//$row = mysql_fetch_object($resid);
	   while($row = mysql_fetch_object($resid)):
			$arr['id'][] = intval($row->id);
			$arr['content_title'][] = strip_tags($row->content_title);
			$arr['content_type_id'][] = intval($row->content_type_id);
			$arr['content_body'][] = strip_tags($row->content_body);
			
		endwhile;
		
		return $arr;
	}

}//end function


 public function loadDetails($tableName,$arrFilter,$arrAttribute,$num=NULL,$orderBy=''){
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

////////////////////////////////////////////////////////////////////////////////////////
	

}// end class



