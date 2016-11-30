<?php
class querymanager extends CI_Model{

	public function insert($data,$tblname){
	
		$sql = "INSERT INTO $tblname(";
		
		foreach($data as $fld=>$val){
			$sql= $sql.$fld.",";
		}
		$sql= substr($sql,0,strlen($sql)-1);
		
		$sql= $sql.") VALUES (";
		
		foreach($data as $fld =>$value){
			$sql= $sql."\"$value\",";
		}
		
		$sql = substr($sql,0,strlen($sql)-1);
		
		$sql= $sql.")";
		
	
		
		return mysql_query($sql) or die(mysql_error());
		
	}#end of function insert

	public function update($tblname, $setflds, $where)
	{
	
		$sql = "UPDATE $tblname SET ";
		
		foreach($setflds as $fld=>$val)
		{
		 $sql= $sql."$fld='{$val}', ";
		}
		$sql = rtrim($sql, ", ");
		
		$sql= $sql." WHERE ";
		
		foreach($where as $fld=>$val){
			
			$sql= $sql."$fld='{$val}' AND ";
		}
		$sql= substr($sql,0,strlen($sql)-5);
		
		return mysql_query($sql);

	
	}#-----------------------------------------------------
	
	public function delete($tblname,$delflds,$fld)
	{
			$sql = "DELETE FROM $tblname
				    WHERE $fld =\"$delflds[$fld]\"";
			return mysql_query($sql);

	}#-----------------------------------------------------
	
	 function  query($sql) {
	
        if (!$queryResource=@mysql_query($sql))
            trigger_error ('Query failed: '.mysql_error().
                           ' SQL: '.$sql);
        return $queryResource;
    }//end function

	public function InsertRow($tableName, $valuesArray) {
		//querymanager::ResetError();
		
			// Execute the query
			$sql = querymanager::buildSQLInsert($tableName, $valuesArray);
			if (! querymanager::query($sql)) {
				return false;
			} else {
				//return querymanager::GetLastInsertID();
				return true;
			}

	}//end function

	/**
	 * Determines if a valid connection to the database exists
	 *
	 * @return boolean TRUE idf connectect or FALSE if not connected
	 */
	public function IsConnected() {
		if (gettype(querymanager::dbConn) == "resource") {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Starts a transaction
	 *
	 * @return boolean Returns TRUE on success or FALSE on error
	 */

 function fetch ($queryid) {
        if ( $row=mysql_fetch_array($queryid) ) {
            return $row;
        } else if ( querymanager::size($queryid) > 0 ) {
            mysql_data_seek($queryid,0);
            return false;
        } else {
            return false;
        }
    }//end function

    /**
    * Returns the number of rows selected
    * @return int
    * @access public
    */
    function size($queryid) {
        return @mysql_num_rows($queryid);
    }//end function

    /**
    * Returns the ID of the last row inserted
    * @return int
    * @access public
    */
    function insertID () {
        return mysql_insert_id();
    }//end function
    
    /**
    * Checks for MySQL errors
    * @return boolean
    * @access public
    */
    function isError () {
        return mysql_error();
    }//end function
    
    /**
    * @desc Return the number of affected rows in d last mysql query
    * @return integer
    * @access public
    */
    function affectedRows($resid){
        return mysql_affected_rows($resid);
    }//end function
	
	
	function selectAll($tblname, $arrflds)
	{
		
			
		if(is_array($arrflds)){
			
			$sql = "SELECT ";
			
			foreach($arrflds as $fld => $val):
				$sql .= $fld.", ";
			endforeach;
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql .=" FROM ".$tblname;

			$resid = querymanager::query($sql);
			
			if(querymanager::size($resid) > 0){
				
				return $resid;	
			}else{
				
				return false;	
			}
		}
	}//end function
	
	
	function freeResult($resid){
		
		return @mysql_free_result($resid);	
		
	}//end function
	
	
	public function getPreviousId($tblname, $id_param, $return_val){
		$sql = "SELECT * FROM $tblname WHERE id=\"$id_param\" ";
		
		
		$resid = querymanager::query($sql);

		if( querymanager::size($resid) > 0 ){
			$row = querymanager::fetch($resid);
			return strip_tags($row[$return_val]);
		}else{
			return false;
		}//end else
	}//end function
	
	
	
	
	

}// end class



