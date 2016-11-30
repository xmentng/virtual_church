<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class json {


private $_central_admin = "tbl_central_admin";
private $_church_admin= "church_admin";
private $_tbl_church= "church";
private $_access_level= "tbl_access_levels";
private $_tbl_users= "tbl_user";


function __construct(){
 // parent::__construct();		
}//end function


function get_central_admin_users(){
	header("Content-type: application/json");
	
	 $sql = "SELECT * FROM ".$this->_central_admin;

		$intres = querymanager::query($sql);
		$response = array();
		if( querymanager::size($intres) > 0 ){
			while($row = querymanager::fetch($intres)){
				$response[] = $row;	
			}//end while loop
			$pre_response = '{"channel":';	
			//file_put_contents('./app_resource/json/resourceCategory.json', '{"resource_category" :'.json_encode($response).'}');
			echo $pre_response.json_encode($response). '}';
		}//end if
		else{
			echo json_encode("");	
		}
}//end function


function get_church_admin_users(){
	header("Content-type: application/json");
	
	 $sql = "SELECT * FROM ".$this->_church_admin;

		$intres = querymanager::query($sql);
		$response = array();
		if( querymanager::size($intres) > 0 ){
			while($row = querymanager::fetch($intres)){
				$response[] = $row;	
			}//end while loop
			$pre_response = '{"channel":';	
			//file_put_contents('./app_resource/json/resourceCategory.json', '{"resource_category" :'.json_encode($response).'}');
			echo $pre_response.json_encode($response). '}';
		}//end if
		else{
			echo json_encode("");	
		}
}//end function


function get_access_levels(){
	header("Content-type: application/json");
	
	 $sql = "SELECT * FROM ".$this->_access_level;

		$intres = querymanager::query($sql);
		$response = array();
		if( querymanager::size($intres) > 0 ){
			while($row = querymanager::fetch($intres)){
				$response[] = $row;	
			}//end while loop
			$pre_response = '{"channel":';	
			//file_put_contents('./app_resource/json/resourceCategory.json', '{"resource_category" :'.json_encode($response).'}');
			echo $pre_response.json_encode($response). '}';
		}//end if
		else{
			echo json_encode("");	
		}
}//end function

function get_users(){
	header("Content-type: application/json");
	
	 $sql = "SELECT * FROM ".$this->_tbl_users;

		$intres = querymanager::query($sql);
		$response = array();
		if( querymanager::size($intres) > 0 ){
			while($row = querymanager::fetch($intres)){
				$response[] = $row;	
			}//end while loop
			$pre_response = '{"channel":';	
			//file_put_contents('./app_resource/json/resourceCategory.json', '{"resource_category" :'.json_encode($response).'}');
			echo $pre_response.json_encode($response). '}';
		}//end if
		else{
			echo json_encode("");	
		}
}//end function


function get_churches(){
	header("Content-type: application/json charset=utf-8");
	
	 $sql = "SELECT * FROM ".$this->_tbl_church;

		$intres = querymanager::query($sql);
		$response = array();
		if( querymanager::size($intres) > 0 ){
			while($row = querymanager::fetch($intres)){
				$response[] = $row;	
			}//end while loop
			$pre_response = '{"channel":';	
			//file_put_contents('./app_resource/json/resourceCategory.json', '{"resource_category" :'.json_encode($response).'}');
			echo json_encode($response);
		}//end if
		else{
			echo json_encode("");	
		}
}//end function


////////////////////////////////////////////////////////
}//end class

