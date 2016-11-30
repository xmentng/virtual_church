<?php
class moodleManager extends CI_Model{

	 /**
    * MySQL server hostname
    * @access private
    * @var string
    */
    private $host;

    /**
    * MySQL username
    * @access private
    * @var string
    */
    private $dbUser;

    /**
    * MySQL user's password
    * @access private
    * @var string
    */
    private $dbPass;

    /**
    * Name of database to use
    * @access private
    * @var string
    */
    private $dbName;

    /**
    * MySQL Resource link identifier stored here
    * @access private
    * @var string
    */
    public $dbConn2;
	
	
	function __construct ($host='localhost',$dbUser='usr_loveworldnet',$dbPass='lvnet92',$dbName='db_foundationschool') {
        $this->host=$host;
        $this->dbUser=$dbUser;
        $this->dbPass=$dbPass;
        $this->dbName=$dbName;
        $this->connectToDb();
    } //end function

    /**
    * Establishes connection to MySQL and selects a database
    * @return void
    * @access private
    */
    function connectToDb () {
        // Make connection to MySQL server
        if (!$this->dbConn2 = @mysql_connect($this->host,
                                      $this->dbUser,
                                      $this->dbPass)) {
            trigger_error('Could not connect to server');
            $this->connectError=true;
        // Select database
        } else if ( !@mysql_select_db($this->dbName,$this->dbConn2) ) {
            trigger_error('Could not select database');
            $this->connectError=true;
        }
    }//end function connectToDb
	
	

	
	
	function insert($data,$tblname){
	
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

	function update($tblname, $setflds, $where)
	{
	
		$sql = "UPDATE $tblname SET ";
		
		foreach($setflds as $fld=>$val)
		{
		 $sql= $sql."$fld=\"$val\",";
		}
		
		$sql= substr($sql,0,strlen($sql)-1);
		
		$sql= $sql." WHERE ";
		
		foreach($where as $fld=>$val){
			
			$sql= $sql."$fld=\"$val\" AND ";
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
	

}// end class



