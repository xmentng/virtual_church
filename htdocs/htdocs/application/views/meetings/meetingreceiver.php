<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>...::: WELCOME TO CHRIST EMBASSY ONLINE:: IMPACT REPORTS:::...</title>
<link href="/css/style.css" rel="stylesheet" media="screen"  type="text/css" />

<link rel="stylesheet" href="/css/pers_style.css" type="text/css" media="all">
<link rel="stylesheet" href="/css/developer.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="/jkmegamenu/jkmegamenu.css" />
<link rel="stylesheet" href="/css/nyroModal.css" type="text/css" media="screen" />
<style>
.divWrap{ border:thin #CDCDCD; padding-bottom: 20px; padding: 5px;
}
.timeDiv{font-size:12px;padding-left:5px; color:#999999}
.tweetDiv{font-size:13px; padding-left:5px; padding-bottom: 20px;}
.tweetBody{width: 100%; font-size: 12px; line-height: 200%;}
.tweetBody p{line-height: 200%;}
.commentTable{ font-size:12px;}
</style>

<script type="text/javascript" src="/js/webtoolkit.aim.js"></script>
<script type="text/javascript" src="/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="/js/jquery.nyroModal.custom.js"></script>
<!--[if IE 6]>
	<script type="text/javascript" src="/js/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/startstop-slider.js"></script>
<script type="text/javascript" src="/js/swfobject.js"></script>


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
<div class="trigger">Attend Meeting</div> 

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="100%"><?php Flashnotice::display(); ?></td>
    </tr>
   
    
  </table> 
  <div class='container'>
  <div id='preview' style="background:#000; padding:10px 20px 0px 20px;"></div>
  <script type='text/javascript'>
  var s2 = new SWFObject('/meetings/loadmeetingreceiver/?ref=swfobj','ply','450','350','9','#ffffff');
      s2.addParam("allowfullscreen","true");
    s2.addParam("wmode","transparent");
    s2.addVariable("userName","<?php echo base64_encode($userID); ?>");
    s2.addVariable("skin","/swf/SteelOverAll.swf");
    s2.addVariable("meetingID","<?php echo $meetingID; ?>");
  s2.write('preview');
</script>
  </div>
<form id="formPostComment" name="form1" method="post" action="">	
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
  <?php
   $picSrc = "/thumbnail/display/".base64_encode($this->session->userdata('userPicPath'))."/".base64_encode('40X40');
  ?>
    <td width="10%" valign="top">&nbsp;</td>
    <td width="90%" valign="top"><label><span class="container"><strong> Post your comments </strong></span></label></td>
  </tr>
  <tr>
    <td width="10%" valign="top"><img src="<?php echo $picSrc; ?>" width="40" alt="" /></td>
    <td valign="top"><textarea name="comments" id="comments" cols="70" rows="3" style="font-size:12px;"></textarea></td>
  </tr>
  <tr>
    <td width="10%" valign="top">&nbsp;</td>
    <td valign="top"><br/><label>
      <input type="button" name="button" id="buttonPostComment" value="Send" />
      <input name="contentID" type="hidden" id="contentID" value="<?php echo $meetingID; ;?>" />
       <input name="userID" type="hidden" id="userID" value="<?php echo $this->session->userdata('userID') ;?>" />
    </label></td>
  </tr>
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	
	
</form>

<script>
$('#buttonPostComment').click(function(e) {
		e.preventDefault();
		$('#divLoading').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait... Attempting to send message.');
		$('#divLoading').removeClass('error');
		$('#divLoading').removeClass('success');
		$.ajax({
   				type: "POST",
   				url: "/comments/add/ajax",
   				data: $('#formPostComment').serialize(),
   				success: function(resp){
    					 	var response = jQuery.parseJSON(resp);
							
							if(response.status){
								$('#divLoading').html(response.message);
								$('#divLoading').removeClass('error');
								$('#divLoading').addClass('success');
							}
							else{
								//alert($('#divLoading').html());
								$('#divLoading').html(response.error);
								$('#divLoading').removeClass('success');
								$('#divLoading').addClass('error');
								
							}
							$("#formPostComment :input").attr("disabled", false);
   						}
 		});
		//disable all form fields
		$("#formPostComment :input").attr("disabled", true);
});
		


</script> 



 <?php
//$this->load->view('inc/middlenav');

if(is_array($arrComments)){
	for($a=0;$a<count($arrComments['ID']);$a++){
		$picSrc = "/thumbnail/display/".base64_encode($arrPic[$arrComments['userName'][$a]])."/".base64_encode('40X40');
		echo  "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"5\" class='commentTable'>
  <tr>
    <td width=\"8%\" rowspan=\"2\" valign=\"top\"><img name=\"\" src=\"".$picSrc."\" width=\"40px\" /></td>
    <td width=\"92%\" valign=\"top\">Niyi</td>
  </tr>
  <tr>
    <td valign=\"top\">".$arrComments['comment'][$a]."</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";
	}
}

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
