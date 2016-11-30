<?php

class errormanager extends CI_Controller {

function __construct(){
	
	
}//end function


function error(){
	$errid = (int)$this->uri->segment(3);

	
	switch ($errid):
		case 109:
			$this->eula();
			break;
		
		default:
			
	
	endswitch;
}//end function

function eula(){
$this->load->view('errors/eula');	
}

function _show_error($error, $img, $msg){
	if(is_array($error)){
		echo "failure| <img src=\"/images/icons/invalid_small.png\" align='absmiddle' />&nbsp;Error! <br><br>";
		  while(list($fld, $val)=each($error)){
			  echo "<span style=\"color:red;\">*</span>".$val."<br>";
		  }
		echo "";
	}else{
		echo "failure| $img&nbsp;$msg";
	}
}//end function


//////////////////////////////////////////////////////////////////////////////////////////////////////////
	

}//end class



