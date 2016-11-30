<?php
class commentsmanager extends CI_Model {
	

function __construct(){

  parent::__construct();
  
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



///////////////////////////////////////////////////////////////////////////////////////

}// end class



