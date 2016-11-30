<?php

class Util_lib{
	
	

function display_message($arrMessage, $msg_type, $img_source){
	if(is_array($arrMessage)){
		if($msg_type=='failure'):
			echo "$msg_type|<img src=".$img_source." align=\"absmiddle\" /> Error!  <br><br>";
			  while(list($fld, $val)=each($arrMessage)){
				  echo $val."<br>";
			  }
			echo "";
		endif;
		
		if($msg_type=='success'):
			echo "$msg_type|<img src=".$img_source." align=\"absmiddle\" /> Success!  <br><br>";
			  while(list($fld, $val)=each($arrMessage)){
				  echo $val."<br>";
			  }
			echo "";
		endif;
		
		
		if($msg_type=='info'):
			echo "$msg_type|<img src=".$img_source." align=\"absmiddle\" /> Info!  <br><br>";
			  while(list($fld, $val)=each($arrMessage)){
				  echo $val."<br>";
			  }
			echo "";
		endif;
		
		
	}
}//end if
	
function _show_error($error, $msg){
	if(is_array($error)){
		echo "failure|<img src=\"/images/icons/failure_small.png\" align=\"absmiddle\" />  Error!  <br><br>";
		  while(list($fld, $val)=each($error)){
			  echo "<span style=\"color:red;\">*</span>".$val."<br>";
		  }
		echo "";
	}else{
		echo "failure| <img src=\"/images/icons/failure_small.png\" align=\"absmiddle\" />&nbsp;$msg";
	}
}//end function



function _show_msg($msg){
	
		echo "success| <img src=\"/images/icons/success_small.png\" align=\"absmiddle\" /> &nbsp;$msg";
		echo "";
	
}//end function


/*function activation_code(){
		
		$this->load->model('contentmanager');
		
		$code = misc::random_string('numeric', 5);
		//lets check if this code already exist
		$flag_exist = $this->contentmanager->dialingCodeExist($code);
		
		if($flag_exist){
			$this->getNextCode();	
		}else{
			return $code;
		}
	}//end function
	
	function getNextCode(){
		$this->activation_code();
	}//end function


function generate_id($idlen, $idtype, $tblname, $fld){
	
	$this->load->model('contentmanager');
	$id_generated = misc::random_string('numeric',$idlen);
	#check if this id exist against this tabl schema
	$flag_id_exist = contentmanager::is_id_exist($tblname, $fld, $id_generated);

	if($flag_id_exist){
		$this->re_generate_idcode($idlen, $idtype, $tblname, $fld);	
	}else{
		return $id_generated;
	}
	
	
}//end function

function re_generate_idcode($idlen, $idtype, $tblname, $fld){
	$this->generate_id($idlen, $idtype, $tblname, $fld);
}//end function*/


function createID($type, $len, $tblname, $wherefld){

	$id = misc::random_string($type, $len);
	
	$sql = "SELECT * FROM $tblname WHERE $wherefld=\"$id\" LIMIT 1";
	$resid = querymanager::query($sql);
	
	if( querymanager::size($resid) > 0){
		repeatProcess();	
	}else{
		//$id = strtoupper($id);
		return $id;
	}
	
}//end function createID

function repeatProcess(){
	createID($type, $len, $tblname, $wherefld);	
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
	

}//end class



