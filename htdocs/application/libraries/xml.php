<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class xml{

/*function get_admin_users_limit($offset, $limit){
$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><rss version=\"2.0\">";
$output .= "<channel>";
	
$sql="SELECT * FROM tbl_users ORDER BY id ASC LIMIT $offset, $limit";

	$sqlresid = mysql_query($sql) or die(mysql_error());
	
	if(mysql_num_rows($sqlresid) > 0)
	{		
		$row = mysql_fetch_assoc($sqlresid);
		
		do{
			//$row['author'] = str_replace(':','.',$row['author']);
			 $output .="<item>
						  <id>".(int)$row['id']."</id>
						  <first_name>".$row['first_name']."</first_name>
						  <last_name>".$row['last_name']."</last_name>
						  <user_name>".$row['user_name']."</user_name>
						  <user_pwd>".$row['user_pwd']."</user_pwd>
						  <email>".$row['email']."</email>
						  <access_level_id>".(int)$row['access_level_id']."</access_level_id>
						  <church_id>".(int)$row['church_id']."</church_id>
						  <date_created>".$row['date_created']."</date_created>
						  <date_modified>".$row['date_modified']."</date_modified>
						  <status>".$row['status']."</status>
						  <rec_exist>".$row['rec_exist']."</rec_exist>			  
		    			</item>";
			
		}while($row = mysql_fetch_assoc($sqlresid));
		
		mysql_free_result($sqlresid);
		$output .="</channel></rss>";
		$dir ="/user_res/xml_data";
	
		file_put_contents("$dir/admin_users.xml",$output);
	}
}//end function*/

/*function get_admin_users(){

$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><rss version=\"2.0\">";
$output .= "<channel>";
	
$sql="SELECT * FROM tbl_users";

	$sqlresid = mysql_query($sql) or die(mysql_error());
	
	if(mysql_num_rows($sqlresid) > 0)
	{		
		$row = mysql_fetch_assoc($sqlresid);
		
		do{
			//$row['author'] = str_replace(':','.',$row['author']);
			 $output .="<item>
						  <id>".(int)$row['id']."</id>
						  <first_name>".$row['first_name']."</first_name>
						  <last_name>".$row['last_name']."</last_name>
						  <user_email>".$row['user_email']."</user_email>
						  <user_pwd>".$row['user_pwd']."</user_pwd>
						  <date_created>".$row['date_created']."</date_created>
						  <date_modified>".$row['date_modified']."</date_modified>
						  <status>".$row['status']."</status>
						  <rec_exist>".$row['rec_exist']."</rec_exist>			  
		    			</item>";
			
		}while($row = mysql_fetch_assoc($sqlresid));
		
		mysql_free_result($sqlresid);
		$output .="</channel></rss>";
		$dir ="/user_res/xml_data";
	
		file_put_contents("$dir/admin_users.xml",$output);
	}
}//end function
*/

/*function _get_church_users(){
	$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><rss version=\"2.0\">";
$output .= "<channel>";
	
$sql="SELECT * FROM ".$this->_tbl_central_admin;

	$sqlresid = mysql_query($sql) or die(mysql_error());
	
	if(mysql_num_rows($sqlresid) > 0)
	{		
		$row = mysql_fetch_assoc($sqlresid);
		
		do{
			//$row['author'] = str_replace(':','.',$row['author']);
			 $output .="<item>
						 
						  <name>".$row['name']."</name>
						  <email>".$row['email']."</email>
						  <username>".$row['username']."</username>
						  <password>".$row['password']."</password>
						  <phone_no>".$row['phone_no']."</phone_no>
						  <church>".$row['church']."</church>
						  <church_id>".$row['church_id']."</church_id>
						  <login>".$row['login']."</login>
			
		    			</item>";
			
		}while($row = mysql_fetch_assoc($sqlresid));
		
		mysql_free_result($sqlresid);
		$output .="</channel></rss>";
		
		$dir ="/user_res/xml_data";
	
		file_put_contents("$dir/admin_users.xml",$output);
	}

}//end function*/


function _get_access_levels(){
$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><rss version=\"2.0\">";
$output .= "<channel>";
	
$sql="SELECT * FROM tbl_access_levels";

	$sqlresid = mysql_query($sql) or die(mysql_error());
	
	if(mysql_num_rows($sqlresid) > 0)
	{		
		$row = mysql_fetch_assoc($sqlresid);
		
		do{
			//$row['author'] = str_replace(':','.',$row['author']);
			 $output .="<item>
						  <id>".(int)$row['id']."</id>
						  <access_name>".$row['access_name']."</access_name>
						  <access_desc>".$row['access_desc']."</access_desc>
						  <env_path>".$row['env_path']."</env_path>
		    			</item>";
			
		}while($row = mysql_fetch_assoc($sqlresid));
		
		mysql_free_result($sqlresid);
		$output .="</channel></rss>";
		
		$res_cats = "";
		//echo $output;
		
		file_put_contents("/user_res/xml_data/users_access_levels.xml",$output);
	}
}//end function


////////////////////

function get_churches(){
$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><rss version=\"2.0\">";
$output .= "<channel>";
	
$sql="SELECT * FROM tbl_churches";

	$sqlresid = mysql_query($sql) or die(mysql_error());
	
	if(mysql_num_rows($sqlresid) > 0)
	{		
		$row = mysql_fetch_assoc($sqlresid);
		
		do{
			//$row['author'] = str_replace(':','.',$row['author']);
			 $output .="<item>
						  <id>".(int)$row['id']."</id>
						  <church_name>".$row['church_name']."</church_name>
						  <stream_url>".$row['stream_url']."</stream_url>
						  <ipad>".$row['ipad']."</ipad>
						  <blackberry>".$row['blackberry']."</blackberry>
						  <android>".$row['android']."</android>
						  <news>".$row['news']."</news>
						  <news><![CDATA[".$row['news']."]]></news>
						  <title><![CDATA[".$row['title']."]]></title>
						  <file_stream>".$row['file_stream']."</file_stream>
						  <created_by>".$row['created_by']."</created_by>
		    			</item>";
			
		}while($row = @mysql_fetch_assoc($sqlresid));
		
		@mysql_free_result($sqlresid);
		$output .="</channel></rss>";
		
		$res_cats = "";
		//echo $output;
		
		@file_put_contents("/user_res/xml_data/churches.xml",$output);
	}
}//end function


////////////////////////////////////////////////////////
}//end class

