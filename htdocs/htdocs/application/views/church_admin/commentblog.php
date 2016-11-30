<?php
//include_once("../connection/connCEonlilne.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--<link href="css/trainning.css" type="text/css" media="all" rel="stylesheet">-->
</head>


<style>
table{
	background-color:#efefef;
	borultsstyle:solid;
	border-width:1px;
	border-color:#999999;
}
	</style>


<body>

 <?php
//include_once("/connection/connCEonlilne.php");
$delete=$_POST['delete'];
if($delete !=''){
foreach($_POST['delete'] as $value){
	$$sql = "UPDATE tbl_service_blog_comments SET approved = '1' WHERE id='$value'";
			$result = mysql_query($sql);
}
}
?>
<?php
$approved= $_GET['approved'];
		if($approved !=''){
			$sql3 = "UPDATE tbl_service_blog_comments SET approved = '1' WHERE id='$id'";
			$resultset = mysql_query($sql3); 
			if($resultset){
	echo "successfuly approved";
			} else {
				echo "there was an error";
}
			
			$id= $_GET['id'];
	
			$sql3 = "DELETE FROM tbl_service_blog_comments WHERE id='$delete'";
			$resid = mysql_query($sql3);
			if($resid){
		echo "successfully deleted";
		} else {
			echo "there was an error!..";
			
		}
		}
			$$sql = "SELECT * FROM tbl_service_blog_comments WHERE approved='0' ORDER by id DESC";
            $result=mysql_query($sql);
			
?>


<form>


<strong> <?php echo $num2= mysql_num_rows($proceed);?></strong>
<table width="100%"   rowspan="3" bgcolor="#fff" border="0"/>
<colgroup span="4" class="maincolumns"/>
<colgroup span="2" class="mainsubcolumns"/>
  <tr>
   <td width="36" style=" background:#DBDBDB;"><input name="check[]" type="checkbox" value="" class="check-all" /></td>
   <td width="484" style=" background:#DBDBDB;"><strong>S/N</strong></td>
      <td width="160" style=" background:#DBDBDB;"><strong>NAME</strong></td>
	  <td width="160" style=" background:#DBDBDB;"><strong>EMAIL</strong></td>
      <td width="484" style=" background:#DBDBDB;"><strong>COMMENT</strong></td>
      <td width="165"  style="background:#DBDBDB;"><strong>TIMEPOSTED</strong></td>
      <td width="140"  style=" background:#DBDBDB;"><strong>COUNTRY</strong></td>
	  <td width="135" style=" background:#DBDBDB;"><strong>APPROVED</strong></td>
      <td width="180" style=" background:#DBDBDB;"><strong>DELETE</strong></td>
      <td width="484" style=" background:#DBDBDB;"><strong>EDIT</strong></td>
       
       
  </tr>
 

<?php


include_once("/connection/connCEonlilne.php");
$counter =0;

$sql="SELECT * FROM tbl_service_blog_comments ORDER BY id DESC LIMIT 100";
   $process =mysql_query($sql);
  $num = mysql_num_rows($proceed);
while($row = mysql_fetch_array($process)){
	$name = $row['name'];
	$email = $row['email'];
	$comment=$row['comment'];
	$time_posted=$row['time_posted'];
	 $country = $row['country'];
	$approved = $row['approved'];
    $time_posted = date('Y-m-d h:j:s', $time_posted); 
		$counter = $counter + 1;
	
	

		

	?>
    
<thead>
<tfoot>
    
 <tr>
 <td width="36"><input name="delete[]" id="delete" type="checkbox" nowwrap="nowrap" value="<?php echo $id; ?>" /></td>
 <td width="150"> <?php echo $counter; ?></td>
 <td width= "160"><?php echo $name; ?></td>
  <td width= "160"><?php echo $email; ?></td>
 <td width= "165"><?php echo $comment; ?></td>
  <td width= "140"> <?php echo $country; ?></td>
 <td width= "135"><?php echo $time_posted; ?></td>
 <td width= "480"><a href="churchmember/commentblog/?approved= <?php echo $id ?> <?php echo $approved; ?>" onClick="return confirm('Are you sure you want to approved this item?')" style="background-color:#C00; color:#FFF; border:solid 1px #FFF; font-size:16px; padding:5px;">Approved</a></td>

 <td width = "460"><a href ="/churchmember/commentblog/?id= <?php echo $id; ?>" onClick="return confirm('Are you sure you want to edit this item?')"style="background-color:#FFF; font-size:16px; padding:5px;">EDIT</a></td>
 <td width="465"><a href ="/churchmember/commentblog/?delete=<?php echo $id; ?> " onClick="return confirm('Are you sure you want to delete this comment?')" style="background-color:#C00; color:#FFF; border:solid 1px #FFF; font-size:16px; padding:5px;">Delete</a></td>
 </tr>
 </thead>
 </tfoot>
 </form>
 

 <?php } ?>
</body>
</html>