<?php

/**
* @package SPLIB
* @version $Id: MySQL.php,v 1.1 2003/12/12 08:06:07 kevin Exp $
*/
/**
* MySQL Database Connection Class
* @access public
* @package SPLIB
*/
class MySQL {
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
    public $dbConn;

    /**
    * Stores error messages for connection errors
    * @access private
    * @var string
    */
    private $connectError;
    const SQLVALUE_BIT      = "bit";
    const SQLVALUE_BOOLEAN  = "boolean";
    const SQLVALUE_DATE     = "date";
    const SQLVALUE_DATETIME = "datetime";
    const SQLVALUE_NUMBER   = "number";
    const SQLVALUE_T_F      = "t-f";
    const SQLVALUE_TEXT     = "text";
    const SQLVALUE_TIME     = "time";
    const SQLVALUE_Y_N      = "y-n";
    
    private $in_transaction = false;    // used for transactions
    /**
    * MySQL constructor
    * @param string host (MySQL server hostname)
    * @param string dbUser (MySQL User Name)
    * @param string dbPass (MySQL User Password)
    * @param string dbName (Database to select)
    * @access public
    */
    function __construct ($host='localhost',$dbUser='usr_loveworldnet',$dbPass='lvnet92',$dbName='db_vchurch') {
        $this->host=$host;
        $this->dbUser=$dbUser;
        $this->dbPass=$dbPass;
        $this->dbName=$dbName;
        $this->connectToDb();
    }

    /**
    * Establishes connection to MySQL and selects a database
    * @return void
    * @access private
    */
    function connectToDb () {
        // Make connection to MySQL server
        if (!$this->dbConn = @mysql_connect($this->host,
                                      $this->dbUser,
                                      $this->dbPass)) {
            trigger_error('Could not connect to server');
            $this->connectError=true;
        // Select database
        } else if ( !@mysql_select_db($this->dbName,$this->dbConn) ) {
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
	
  function  query($sql) {
	
        if (!$queryResource=@mysql_query($sql))
            trigger_error ('Query failed: '.mysql_error().
                           ' SQL: '.$sql);
        return $queryResource;
    }//end function

  function InsertRow($tableName, $valuesArray) {
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
	function IsConnected() {
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
	
	
	
	
	 /**
    * Improved Query method....better input handling/filtering...Returns an instance of MySQLResult to fetch rows with
    * @param $sql string the database query to run..shld include placeholders to be replaced via sprintf
    * @param $arrValues array a sequential array containing the place holder values in order
    * @return MySQLResult
    * @access public
    */
    function iQuery($sql,$arrValues) {
        foreach ($arrValues as $key => &$value) {
            $value = mysql_real_escape_string($value,$this->dbConn);
            $sql = str_ireplace("[$key]",$value,$sql);
        }
        //var_dump($arrValues);
        if (!$queryResource=mysql_query($sql,$this->dbConn))
            trigger_error ('Query failed: '.mysql_error($this->dbConn).
                           ' SQL: '.$sql);
        return new MySQLResult($this,$queryResource);
    }
	/**
	 * [STATIC] Converts any value of any datatype into boolean (true or false)
	 *
	 * @param mixed $value Value to analyze for TRUE or FALSE
	 * @return boolean Returns TRUE or FALSE
	 */
	static public function GetBooleanValue($value) {
		if (gettype($value) == "boolean") {
			if ($value == true) {
				return true;
			} else {
				return false;
			}
		} elseif (is_numeric($value)) {
			if ($value > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			$cleaned = strtoupper(trim($value));

			if ($cleaned == "ON") {
				return true;
			} elseif ($cleaned == "SELECTED" || $cleaned == "CHECKED") {
				return true;
			} elseif ($cleaned == "YES" || $cleaned == "Y") {
				return true;
			} elseif ($cleaned == "TRUE" || $cleaned == "T") {
				return true;
			} else {
				return false;
			}
		}
	}

	/**
     * [STATIC] Restores values in SQL state to non-SQL stats
     *
     * @param mixed $value Value to return to non-SQL state
     * @return boolean Returns TRUE or FALSE
     */
    static public function restoreSQLValue(&$value) {
        
        $value = trim($value,"'"); 


    }

	/**
	 * [STATIC] Formats any value into a string suitable for SQL statements
	 * (NOTE: Also supports data types returned from the gettype function)
	 *
	 * @param mixed $value Any value of any type to be formatted to SQL
	 * @param string $datatype Use SQLVALUE constants or the strings:
	 *                          string, text, varchar, char, boolean, bool,
	 *                          Y-N, T-F, bit, date, datetime, time, integer,
	 *                          int, number, double, float
	 * @return string
	 */
	static public function SQLValue($value, $datatype = self::SQLVALUE_TEXT) {
		$return_value = "";

		switch (strtolower(trim($datatype))) {
			case "text":
			case "string":
			case "varchar":
			case "char":
				if (strlen($value) == 0) {
					$return_value = "NULL";
				} else {
					$return_value = "'" . str_replace("'", "''", $value) . "'";
				}
				break;
			case "number":
			case "integer":
			case "int":
			case "double":
			case "float":
				if (is_numeric($value)) {
					$return_value = $value;
				} else {
					$return_value = "NULL";
				}
				break;
			case "boolean":  //boolean to use this with a bit field
			case "bool":
			case "bit":
				if (self::GetBooleanValue($value)) {
				   $return_value = "1";
				} else {
				   $return_value = "0";
				}
				break;
			case "y-n":  //boolean to use this with a char(1) field
				if (self::GetBooleanValue($value)) {
					$return_value = "'Y'";
				} else {
					$return_value = "'N'";
				}
				break;
			case "t-f":  //boolean to use this with a char(1) field
				if (self::GetBooleanValue($value)) {
					$return_value = "'T'";
				} else {
					$return_value = "'F'";
				}
				break;
			case "date":
				if (self::IsDate($value)) {
					$return_value = "'" . date('Y-m-d', strtotime($value)) . "'";
				} else {
					$return_value = "NULL";
				}
				break;
			case "datetime":
				if (self::IsDate($value)) {
					$return_value = "'" . date('Y-m-d H:i:s', strtotime($value)) . "'";
				} else {
					$return_value = "NULL";
				}
				break;
			case "time":
				if (self::IsDate($value)) {
					$return_value = "'" . date('H:i:s', strtotime($value)) . "'";
				} else {
					$return_value = "NULL";
				}
				break;
			default:
				exit("ERROR: Invalid data type specified in SQLValue method");
		}
		return $return_value;
	}
	/**
	 * [STATIC] Determines if a value of any data type is a date PHP can convert
	 *
	 * @param date/string $value
	 * @return boolean Returns TRUE if value is date or FALSE if not date
	 */
	static public function IsDate($value) {
		$date = date('Y', strtotime($value));
		if ($date == "1969" || $date == '') {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * [STATIC] Builds a comma delimited list of columns for use with SQL
	 *
	 * @param array $valuesArray An array containing the column names.
	 * @param boolean $addQuotes (Optional) TRUE to add quotes
	 * @param boolean $showAlias (Optional) TRUE to show column alias
	 * @return string Returns the SQL column list
	 */
	static private function buildSQLColumns($columns, $addQuotes = true, $showAlias = true) {
		if ($addQuotes) {
			$quote = "'";
		} else {
			$quote = "";
		}
		switch (gettype($columns)) {
			case "array":
				$sql = "";
				foreach ($columns as $key => $value) {
					// Build the columns
					if (strlen($sql) == 0) {
						$sql = $quote . $value . $quote;
					} else {
						$sql .= ", " . $quote . $value . $quote;
					}
					if ($showAlias && is_string($key) && (! empty($key))) {
						$sql .= ' AS "' . $key . '"';
					}
				}
				return $sql;
				break;
			case "string":
				return $quote . $columns . $quote;
				break;
			default:
				return false;
				break;
		}
	}

	
	/**
	 * [STATIC] Builds a SQL INSERT statement
	 *
	 * @param string $tableName The name of the table
	 * @param array $valuesArray An associative array containing the column
	 *                            names as keys and values as data. The values
	 *                            must be SQL ready (i.e. quotes around
	 *                            strings, formatted dates, ect)
	 * @return string Returns a SQL INSERT statement
	 */
	static public function buildSQLInsert($tableName, $valuesArray) {
		$columns = self::buildSQLColumns(array_keys($valuesArray),false);
		$values  = self::buildSQLColumns($valuesArray, false, false);
		$sql = "INSERT IGNORE INTO " . $tableName .
			   " (" . $columns . ") VALUES (" . $values . ")";
		return $sql;
	}
    
    
    /**
     * [STATIC] Builds a SQL UPDATE statement
     *
     * @param string $tableName The name of the table
     * @param array $valuesArray An associative array containing the column
     *                            names as keys and values as data. The values
     *                            must be SQL ready (i.e. quotes around
     *                            strings, formatted dates, ect)
     * @param array $whereArray (Optional) An associative array containing the
     *                           column names as keys and values as data. The
     *                           values must be SQL ready (i.e. quotes around
     *                           strings, formatted dates, ect). If not specified
     *                           then all values in the table are updated.
     * @return string Returns a SQL UPDATE statement
     */
    static public function BuildSQLUpdate($tableName, $valuesArray, $whereArray = null) {
        $sql = "";
        foreach ($valuesArray as $key => $value) {
            if (strlen($sql) == 0) {
                $sql = "" . $key . " = " . $value;
            } else {
                $sql .= ", " . $key . " = " . $value;
            }
        }
        $sql = "UPDATE " . $tableName . " SET " . $sql;
        if (is_array($whereArray)) {
            $sql .= self::BuildSQLWhereClause($whereArray);
        }
        return $sql;
    }
    
    /**
     * [STATIC] Builds a SQL WHERE clause from an array.
     * If a key is specified, the key is used at the field name and the value
     * as a comparison. If a key is not used, the value is used as the clause.
     *
     * @param array $whereArray An associative array containing the column
     *                           names as keys and values as data. The values
     *                           must be SQL ready (i.e. quotes around
     *                           strings, formatted dates, ect)
     * @return string Returns a string containing the SQL WHERE clause
     */
    static public function BuildSQLWhereClause($whereArray) {
        $where = "";
        foreach ($whereArray as $key => $value) {
            if (strlen($where) == 0) {
                if (is_string($key)) {
                    $where = " WHERE " . $key . " = " . $value;
                } else {
                    $where = " WHERE " . $value;
                }
            } else {
                if (is_string($key)) {
                    $where .= " AND " . $key . " = " . $value;
                } else {
                    $where .= " AND " . $value;
                }
            }
        }
        //echo $where;exit;
        return $where;
    }
	
	function fetch_object($resid){
		return @mysql_fetch_object($resid);
	}//end function

  
}//end class


/**
* MySQLResult Data Fetching Class
* @access public
* @package SPLIB
*/
class MySQLResult {
    /**
    * Instance of MySQL providing database connection
    * @access private
    * @var MySQL
    */
    var $mysql;

    /**
    * Query resource
    * @access private
    * @var resource
    */
    var $query;

    /**
    * MySQLResult constructor
    * @param object mysql   (instance of MySQL class)
    * @param resource query (MySQL query resource)
    * @access public
    */
    function MySQLResult(& $mysql,$query) {
        $this->mysql=& $mysql;
        $this->query=$query;
    }

    /**
    * Fetches a row from the result
    * @return array
    * @access public
    */
    function fetch () {
        if ( $row=mysql_fetch_array($this->query,MYSQL_ASSOC) ) {
            return $row;
        } else if ( $this->size() > 0 ) {
            mysql_data_seek($this->query,0);
            return false;
        } else {
            return false;
        }
    }

    /**
    * Returns the number of rows selected
    * @return int
    * @access public
    */
    function size () {
        return mysql_num_rows($this->query);
    }

    /**
    * Returns the ID of the last row inserted
    * @return int
    * @access public
    */
    function insertID () {
        return mysql_insert_id($this->mysql->dbConn);
    }
    
    /**
    * Checks for MySQL errors
    * @return boolean
    * @access public
    */
    function isError () {
        return $this->mysql->isError();
    }
    
    /**
    * @desc Return the number of affected rows in d last mysql query
    * @return integer
    * @access public
    */
    function affectedRows(){
        return mysql_affected_rows();
    }
}


?>