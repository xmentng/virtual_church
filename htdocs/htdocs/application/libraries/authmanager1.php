<?php

class authmanager {
	
	
	function __construct(){

		//$this->load->library('session');
	
	}//end function
	function authenticate_user($usr, $pwd){
		$sql = "SELECT * FROM tbl_users WHERE user_name=\"$usr\" AND user_pwd=\"$pwd\" AND status=\"1\" LIMIT 1";
		$resid = querymanager::query($sql);

		if( querymanager::size($resid) > 0 ){
			$row = mysql_fetch_object($resid);
			do{
				$arr['id'] = (int)$row->id;
				$arr['first_name'] = $row->first_name;
				$arr['last_name'] = $row->last_name;
				$arr['user_name'] = $row->user_name;
				$arr['email'] = $row->email;
				$arr['user_pwd'] = $row->user_pwd;
				$arr['access_level_id'] = $row->access_level_id;
				$arr['church_id'] =$row->church_id;
				$arr['date_created'] =$row->date_created;
				$arr['date_modified'] =$row->date_modified;
				$arr['status'] = (int)$row->status;
				$arr['rec_exist'] = (int)$row->rec_exist;
				$arr['is_online'] = $row->is_online;
				$arr['profile_pic'] = $row->profile_pic;
				$arr['country'] = $row->country;
				
			}while($row = mysql_fetch_object($resid));
			return $arr;
		}//ens if
		else{
			return false;
		}//end else
	}//end function
	
	
	function load_user_fullname(){

		$user_name  = $this->session->userdata('user_name');
		
		$sql = "SELECT DISTINCT id, first_name, last_name, user_name FROM tbl_users WHERE user_name=\"$user_name\" LIMIT 1";
		$resid = $this->querymanager->query($sql);
		
		if( $this->querymanager->size($resid) > 0 ){
			$row = querymanager::fetch($resid);
			$user_fullname = $row['first_name']. "  ".$row['last_name'];
			return strtoupper($user_fullname);
		}//ens if
		else{
			return;
		}//end else
		
	}//end function

	function redirect_user(){
	
			$user_name = $this->session->userdata('user_name');
		

			$sql = "SELECT DISTINCT  user_name FROM tbl_users WHERE user_name=\"$user_name\" LIMIT 1";
			$resid = $this->querymanager->query($sql);
			
			if( $this->querymanager->size($resid) > 0 ){
				return;
			}//ens if
			else{
				@header('Location:'.base_url());
			}//end else
	}//end function
	
	
	function get_user_access_level($param, $tblname){
			$sql = "SELECT DISTINCT  id, access_name, access_desc, env_path FROM $tblname WHERE id=\"$param\" LIMIT 1";
			$mysql_obj = new mysql();
			$resid = $mysql_obj->query($sql);
	
			if( $mysql_obj->size($resid) > 0 ){
				$row = $mysql_obj->fetch_object($resid);
				return $row->env_path;
			}//ens if
			else{
				return false;
			}//end else
	}//end function
	
	
	


////////////////////////////////////////////////////////////////////////////////////////
	

}// end class



