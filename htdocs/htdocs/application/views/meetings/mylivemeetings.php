<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>...::: WELCOME TO CHRIST EMBASSY ONLINE:: CURRENTLY LIVE MEETINGS:::...</title>
<link href="/css/style.css" rel="stylesheet" media="screen"  type="text/css" />

<link rel="stylesheet" href="/css/pers_style.css" type="text/css" media="all">
<link rel="stylesheet" href="/css/developer.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="/jkmegamenu/jkmegamenu.css" />
<link rel="stylesheet" href="/css/nyroModal.css" type="text/css" media="screen" />
<style>
.divWrap{ border:thin #CDCDCD; padding-bottom: 20px;
}
.timeDiv{font-size:12px;padding-left:5px; color:#999999}
.tweetDiv{font-size:13px; padding-left:5px}
</style>

<script type="text/javascript" src="/js/webtoolkit.aim.js"></script>
<script type="text/javascript" src="/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="/js/jquery.nyroModal.custom.js"></script>
<!--[if IE 6]>
	<script type="text/javascript" src="/js/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/startstop-slider.js"></script>



<script type="text/javascript">
$(document).ready(function(){
	
	$(".toggle_container").hide();

	$(".trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});

});
</script>


<style type="text/css">
body {
	background-image: url(/images/main_bg.jpg);
}
.post2{ width:auto; height:auto}
</style>
<style>
.nyroTitle{ background-color:#D7D7D7; font-weight:bold; padding:5px; font-family:tahoma; font-size:12px; text-transform:uppercase; letter-spacing:2px;}

.button_inside_border_grey {
    background-image: url("/images/fbmodal_cancel.png");
    border-top: 1px solid #FFFFFF;
    color: #333333;
    font-size: 12px;
    font-weight: bold;
    padding: 4px 6px;
    text-align: center;border-style: none solid solid;
}



</style>
</head>

<body>
<div id="wrap">
<?php
include_once('inc/masthead.php');
?>
<div id="content">
<div id="topnav">
 <?php
include_once('inc/nav.php');
?>
 </div>

  <div class="post2">
  
 <div class="main">

<table width="100%" border="0" >
  <tr>
<td width="182" align="left" valign="top" bgcolor="#FFFFFF">
<?php
$this->load->view('inc/leftsidenav');
?>

</td>
<td width="481" align="left" valign="top">
<div class="col1">
<div class="trigger">Scheduled Meetings</div> 
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="100%"><?php Flashnotice::display(); ?></td>
    </tr>
   
    
  </table> 
  <div class='container'>
  <div class="clear"></div>
  <br/>
  	<?php
  //  var_dump($cellmembers);
  if(is_array($meetingInfo)){
    
      $totalSize = count($meetingInfo['meetingID']);
      for($a=0;$a<$totalSize;$a++){
        
		 
		  echo "<div class='divWrap'>";
    		
    		echo "<div class='tweetDiv'>".$meetingInfo['meetingName'][$a]."</div>";
			echo "<div class='timeDiv' style='font-size:11px;'>Date: ".date("F j, Y, g:i a",$meetingInfo['meetingStartTime'][$a])."</div>";
			echo "<div class='timeDiv' style='font-size:12px;'><a href='/meetings/attend/".$meetingInfo['meetingID'][$a]."'>Attend Meeting</a></div>";
    		echo "</div>";
          
      }
      
  }
  else{
  		echo "<div class='info'>You have no currently live meetings.</div>";
  }
?>
    </div>
	

	
	
</form>
 <?php
//$this->load->view('inc/middlenav');
?>
  


</div>





</td>
<td width="303" align="left" valign="top" bgcolor="#FFFFFF">
<div class="col2">
  <div class="col2_inner">
  <div class="side_rem">
  
  <?php
$this->load->view('inc/rightnav');
?>
  
  
</div>
    <div class="clear"></div>
    <div class="clear"></div>
    <div class="clear"></div>
    <div class="clear"></div>
    <div class="clear"></div>
  </div>


</div>
</td>
</tr>
</table>

</div>
  
  
  
</div>
<div class="clear"></div>
</div>
<div id="footer">

 <?php
$this->load->view('inc/footer');
?>



</div>



</div>

</body>
</html>
