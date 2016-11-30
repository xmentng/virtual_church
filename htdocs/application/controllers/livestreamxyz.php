<?php

require_once('../vault/checkAuth.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Internet Multimedia Live Streaming</title>
<link href="css/videopage.css" rel="stylesheet" type="text/css" />
<link type="text/css" media="all" href="css/change_region.css" rel="stylesheet" />
<link href="css/colorbox.css" style type="text/css" media="all" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/scroll.css" rel="stylesheet" />
<link href="style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://live.internetmultimediaonline.org/res/js/swfobject.js"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script src="/js/change_region.js"></script>
<script src="/js/jquery-1.4.2.js"></script>
<script src="/js/jquery.colorbox.js"></script>


 <script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
 <style type="text/css">
<!--
.style12 {font-family: Arial, Helvetica, sans-serif}
.style13 {color: #FF0000}
-->
 </style>
<noscript style="background:#FFC">PLEASE TURN ON JAVASCRIPT TO ENJOY FULL FEATURES</noscript>
 <script>
          $.noConflict();   
             
		jQuery(document).ready(function(){
		           
	
         // alert ('ready to fire');
   /////////////
               jQuery('#celebs a').click(function(e) {
                      e.preventDefault();      
                   var url = jQuery(this).attr('href');
             //
                   //jQuery('#biography').load(url);
                    // iframe_live
                   // alert(jQuery('#iframe_live').attr('src'));
                     jQuery('#iframe_live').attr('src',url); 
                   jQuery('#biography2').html(jQuery(this).attr('title'));   
                      // e.preventDefault();     
                       //alert (url);   
                         //return false
               })
  
           jQuery('#button').hover(function () {
    jQuery('.the_menu').slideToggle('medium');
    });
    
    
    jQuery(".openbox").colorbox({transition:"fade", width:"60%", height:"85%", iframe:true});
            
            
            //Example of preserving a JavaScript event for inline calls.
            jQuery("#click").click(function(){ 
               jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                return false;
            });
  

		});
		

	</script>
 <script>
 $(document).ready(function () {
   
    
});

</script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#scrollbar1, #scrollbar2').tinyscrollbar();	
		});
	</script>
    
    <style>
embed,swobject,object,standby{ z-index:1; position:relative}	
#button {

	background:#000;
	padding:1px 10px ;
	font-family:Arial, Helvetica, sans-serif;
	font:12px;
	cursor:pointer;
	z-index:10000;
}

ul, li {
	margin:0; 
	padding:0; 
	list-style:none;
}

.