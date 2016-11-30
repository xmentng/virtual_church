<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model('contentmanager');
	$this->load->library('util_lib');
	$this->load->library('sessiondata');
	global $page_res;
	sessiondata::general_page_resource();
	
}//end function


function general_page_resource(){
		
		global $page_res;

		#retrieve the users online.
		$logged_in_account = $this->session->userdata('user_name');
		
		$church_id = useraccount::getAttributeValue($detail=array('id','user_name'), $tblname='tbl_churches', $where=array('user_name'=>$logged_in_account), $retval = 'id');	
		$first_name = useraccount::getAttributeValue($detail=array('id','first_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'first_name');
		
		$last_name = useraccount::getAttributeValue($detail=array('id','last_name'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'last_name');
		
		$email = useraccount::getAttributeValue($detail=array('id','email'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'email');
		
		$access_level = useraccount::getAttributeValue($detail=array('id','access_level_id'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'access_level_id');
		
		$is_online = useraccount::getAttributeValue($detail=array('id','is_online'), $tblname='tbl_users', $where=array('user_name'=>$logged_in_account), $retval = 'is_online');
		
		//echo $access_level; exit;
		
		$church_banner = useraccount::getLastAttributeValue(array('id', 'church_id', 'church_banner'), $tblname='tbl_church_banners', array('church_id'=>$church_id), $retval='church_banner');
		
		if(!$church_banner){
			$data['church_banner'] = "/images/banner.png";	
		}else{
			$data['church_banner'] = $church_banner;
		}
		
		$data['church_id'] = $church_id;
		$data['logged_in_account'] = $logged_in_account;
		
		$page_res = array('church_banner'=>$data['church_banner'],
						  'logged_in_account'=>$logged_in_account,
						  'name_of_user'=>$first_name.' '.$last_name,
						  'access_level_id'=>$access_level,
						  'email'=>$email,
						  'is_online'=>$is_online, 
						  'church_id'=>$church_id,
						  'session_id'=>misc::random_string('alnum',30));
		
	}//end function
	
	

function stores_inspecific_school(){
	$param = (int)($this->uri->segment(3));

	
	$sql = "SELECT si.id AS store_id, si.name AS store_name, si.address AS store_add, si.contact_person AS store_contact_person, si.prod_sold AS prod_sold_in_store, si.largest_sold_prod AS store_largest_sold_prod, si.stock_source AS stock_source, si.purchase_freq AS stock_purchase_freq, ss.storeid, ss.schid, sch.id AS sch_id, sch.name AS sch_name FROM storeinfo AS si INNER JOIN schoolstores AS ss ON si.id=ss.storeid INNER JOIN schinfo AS sch ON ss.schid=sch.id WHERE sch.id=\"$param\"";
	global $header;
	global $data;
	$resid = mysql_query ( $sql ) or die ( "Sql error : " . mysql_error( ) );
	
	$fields = mysql_num_fields ( $resid );

	$header = '';
	for ( $i = 0; $i < $fields; $i++ )
	{
		$header .= mysql_field_name( $resid , $i ) . "\t";
	}

	$data = '';
	while( $row = mysql_fetch_row( $resid ) )
	{
		$line = '';
		
		foreach( $row as $value )
		{                                            
			if ( ( !isset( $value ) ) || ( $value == "" ) )
			{
				$value = "\t";
			}
			else
			{
				$value = str_replace( '"' , '""' , $value );
				$value = '"' . $value . '"' . "\t";
			}
			$line .= $value;
		}
		$data .= trim( $line ) . "\n";
		
	}
	$data = str_replace( "\r" , "" , $data );
	
	if ( $data == "" )
	{
		$data = "\n(0) Records Found!\n";                        
	}
	
	$fname = "exported_".$this->uri->segment(2).".xls";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$fname");
	header("Pragma: no-cache");
	header("Expires: 0");
	print "$header\n$data";

}//end function


function stores_in_branded_schools(){

	$sql = "SELECT si.id AS store_id, si.name AS store_name, si.address AS store_add, si.contact_person AS store_contact_person, si.prod_sold AS prod_sold_in_store, si.largest_sold_prod AS store_largest_sold_prod, si.stock_source AS stock_source, si.purchase_freq AS stock_purchase_freq,
ss.storeid, ss.schid, sch.id AS sch_id, sch.name AS sch_name, sch.brand_opp_for_peak FROM storeinfo AS si INNER JOIN schoolstores AS ss ON si.id=ss.storeid 
RIGHT JOIN schinfo AS sch ON ss.schid=sch.id WHERE sch.brand_opp_for_peak=\"yes\" ";
	global $header;
	global $data;
	$resid = mysql_query ( $sql ) or die ( "Sql error : " . mysql_error( ) );
	
	$fields = mysql_num_fields ( $resid );

	$header = '';
	for ( $i = 0; $i < $fields; $i++ )
	{
		$header .= mysql_field_name( $resid , $i ) . "\t";
	}

	$data = '';
	while( $row = mysql_fetch_row( $resid ) )
	{
		$line = '';
		
		foreach( $row as $value )
		{                                            
			if ( ( !isset( $value ) ) || ( $value == "" ) )
			{
				$value = "\t";
			}
			else
			{
				$value = str_replace( '"' , '""' , $value );
				$value = '"' . $value . '"' . "\t";
			}
			$line .= $value;
		}
		$data .= trim( $line ) . "\n";
		
	}
	$data = str_replace( "\r" , "" , $data );
	
	if ( $data == "" )
	{
		$data = "\n(0) Records Found!\n";                        
	}
	
	$fname = "exported_".$this->uri->segment(2).".xls";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$fname");
	header("Pragma: no-cache");
	header("Expires: 0");
	print "$header\n$data";

}//end function





function church_user_accounts(){

global $page_res;

$this-> general_page_resource();
	/*$sql = "SELECT si.id AS store_id, si.name AS store_name, si.address AS store_add, si.contact_person AS store_contact_person, si.prod_sold AS prod_sold_in_store, si.largest_sold_prod AS store_largest_sold_prod, si.stock_source AS stock_source, si.purchase_freq AS stock_purchase_freq,
ss.storeid, ss.schid, sch.id AS sch_id, sch.name AS sch_name, sch.brand_opp_for_peak FROM storeinfo AS si INNER JOIN schoolstores AS ss ON si.id=ss.storeid 
RIGHT JOIN schinfo AS sch ON ss.schid=sch.id WHERE sch.brand_opp_for_peak=\"yes\" ";*/


	global $header;
	global $data;
	
	$church_id = $page_res['church_id'];
	
	$sql = "SELECT * FROM tbl_users WHERE church_id=\"$church_id\" AND access_level_id='3' ";
	
	$resid = mysql_query ( $sql ) or die ( "Sql error : " . mysql_error( ) );
	
	$fields = mysql_num_fields ( $resid );

	$header = '';
	for ( $i = 0; $i < $fields; $i++ )
	{
		$header .= mysql_field_name( $resid , $i ) . "\t";
	}

	$data = '';
	while( $row = mysql_fetch_row( $resid ) )
	{
		$line = '';
		
		foreach( $row as $value )
		{                                            
			if ( ( !isset( $value ) ) || ( $value == "" ) )
			{
				$value = "\t";
			}
			else
			{
				$value = str_replace( '"' , '""' , $value );
				$value = '"' . $value . '"' . "\t";
			}
			$line .= $value;
		}
		$data .= trim( $line ) . "\n";
		
	}
	$data = str_replace( "\r" , "" , $data );
	
	if ( $data == "" )
	{
		$data = "\n(0) Records Found!\n";                        
	}
	
	$fname = "exported_".$this->uri->segment(2).".xls";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$fname");
	header("Pragma: no-cache");
	header("Expires: 0");
	print "$header\n$data";

}//end function

function summaryChurchAttendanceReport(){
	
	global $page_res;

$this-> general_page_resource();
	/*$sql = "SELECT si.id AS store_id, si.name AS store_name, si.address AS store_add, si.contact_person AS store_contact_person, si.prod_sold AS prod_sold_in_store, si.largest_sold_prod AS store_largest_sold_prod, si.stock_source AS stock_source, si.purchase_freq AS stock_purchase_freq,
ss.storeid, ss.schid, sch.id AS sch_id, sch.name AS sch_name, sch.brand_opp_for_peak FROM storeinfo AS si INNER JOIN schoolstores AS ss ON si.id=ss.storeid 
RIGHT JOIN schinfo AS sch ON ss.schid=sch.id WHERE sch.brand_opp_for_peak=\"yes\" ";*/


	global $header;
	global $data;
	
	$church_id = $page_res['church_id'];
	
	$param = intval($this->uri->segment(3));
	
	$sql = "SELECT tbc.id, tbc.church_name, COUNT(tbca.id) AS total_attendance, tbca.service_time, FROM_UNIXTIME(tbca.service_time, '%m /%d /%Y') AS service_date
FROM tbl_churches AS tbc INNER JOIN tbl_churchservice_attendance AS tbca ON tbc.id=tbca.church_id
WHERE service_time=\"$param\"
GROUP BY tbca.church_id";
	
	$resid = mysql_query ( $sql ) or die ( "Sql error : " . mysql_error( ) );
	
	$fields = mysql_num_fields ( $resid );

	$header = '';
	for ( $i = 0; $i < $fields; $i++ )
	{
		$header .= mysql_field_name( $resid , $i ) . "\t";
	}

	$data = '';
	while( $row = mysql_fetch_row( $resid ) )
	{
		$line = '';
		
		foreach( $row as $value )
		{                                            
			if ( ( !isset( $value ) ) || ( $value == "" ) )
			{
				$value = "\t";
			}
			else
			{
				$value = str_replace( '"' , '""' , $value );
				$value = '"' . $value . '"' . "\t";
			}
			$line .= $value;
		}
		$data .= trim( $line ) . "\n";
		
	}
	$data = str_replace( "\r" , "" , $data );
	
	if ( $data == "" )
	{
		$data = "\n(0) Records Found!\n";                        
	}
	
	$fname = "exported_".$this->uri->segment(2).".xls";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$fname");
	header("Pragma: no-cache");
	header("Expires: 0");
	print "$header\n$data";
	
}//end function


function detailChurchAttendanceReport(){
	
	global $page_res;
	$this-> general_page_resource();


	global $header;
	global $data;
	
	$church_id = intval($this->uri->segment(4));
	
	$param = intval($this->uri->segment(3));
	
	$sql = "SELECT tca.church_id, tca.user_id, FROM_UNIXTIME(tca.time_joined) AS time_joined, tca.service_time, FROM_UNIXTIME(tca.service_time) AS service_date, tc.church_name, tu.first_name, tu.last_name
FROM tbl_churchservice_attendance AS tca
INNER JOIN tbl_churches AS tc ON tca.church_id=tc.id
INNER JOIN tbl_users AS tu ON tca.user_id=tu.id
WHERE tca.service_time=\"$param\"
AND tca.church_id=\"$church_id\" ";
	
	$resid = mysql_query ( $sql ) or die ( "Sql error : " . mysql_error( ) );
	
	$fields = mysql_num_fields ( $resid );

	$header = '';
	for ( $i = 0; $i < $fields; $i++ )
	{
		$header .= mysql_field_name( $resid , $i ) . "\t";
	}

	$data = '';
	while( $row = mysql_fetch_row( $resid ) )
	{
		$line = '';
		
		foreach( $row as $value )
		{                                            
			if ( ( !isset( $value ) ) || ( $value == "" ) )
			{
				$value = "\t";
			}
			else
			{
				$value = str_replace( '"' , '""' , $value );
				$value = '"' . $value . '"' . "\t";
			}
			$line .= $value;
		}
		$data .= trim( $line ) . "\n";
		
	}
	$data = str_replace( "\r" , "" , $data );
	
	if ( $data == "" )
	{
		$data = "\n(0) Records Found!\n";                        
	}
	
	$fname = "exported_".$this->uri->segment(2).".xls";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$fname");
	header("Pragma: no-cache");
	header("Expires: 0");
	print "$header\n$data";
	
}//end function


function online_users(){

	$church_id = $this->session->userdata('church_id');
	
	//$param = intval($this->uri->segment(3));
	
	$sql = "SELECT first_name, last_name, email, country FROM tbl_users WHERE is_online='1' AND church_id=\"$church_id\"";
	
	$resid = mysql_query ( $sql ) or die ( "Sql error : " . mysql_error( ) );
	
	$fields = mysql_num_fields ( $resid );

	$header = '';
	for ( $i = 0; $i < $fields; $i++ )
	{
		$header .= mysql_field_name( $resid , $i ) . "\t";
	}

	$data = '';
	while( $row = mysql_fetch_row( $resid ) )
	{
		$line = '';
		
		foreach( $row as $value )
		{                                            
			if ( ( !isset( $value ) ) || ( $value == "" ) )
			{
				$value = "\t";
			}
			else
			{
				$value = str_replace( '"' , '""' , $value );
				$value = '"' . $value . '"' . "\t";
			}
			$line .= $value;
		}
		$data .= trim( $line ) . "\n";
		
	}
	$data = str_replace( "\r" , "" , $data );
	
	if ( $data == "" )
	{
		$data = "\n(0) Records Found!\n";                        
	}
	
	$fname = "exported_".$this->uri->segment(2).".xls";
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$fname");
	header("Pragma: no-cache");
	header("Expires: 0");
	print "$header\n$data";


}//end function

/////////////////////////////////////////////////////////////////////////////////////////
}//end class



