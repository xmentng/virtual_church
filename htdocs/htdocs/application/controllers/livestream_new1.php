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
 <noscript style="background:#FFC">PLEASE TURN ON JAVASCRIPT TO ENJOY FULL FEATURES</noscript>
 <script>
          $.noConflict();   
             
		jQuery(document).ready(function(){
		
	
         // alert ('ready to fire');
   /////////////
               jQuery('#celebs a').click(function(e) {
                         
                   var url = jQuery(this).attr('href');
//alert (url); 
                   jQuery('#biography').html('loading...').load(url);
                   
                   jQuery('#biography2').html(jQuery(this).attr('title'));   
                   e.preventDefault();
               })
  
           jQuery('#button').click(function () {
    jQuery('.the_menu').slideToggle('medium');
    });
    
    
    jQuery(".openbox").colorbox({transition:"fade", width:"60%", height:"65%", iframe:true});
            
            
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

.menu_class {
	border:1px solid #1c1c1c;
}

.the_menu {
	display:none;
	width:250px;
	left:-10px;
	position:relative;
	opacity:.6;
	font-size:12px;
	/*border: 1px solid #1c1c1c;*/
}

.the_menu li {
	background-color: #000;
	padding:5px 10px; 
}

.the_menu li a {
	color:#FFFFFF; 
	text-decoration:none; 
	padding:0px 10px; 
	display:block;
}

.the_menu li a:hover {
	font-weight:bold;
	color: #F00;
}

	</style>	
<style type="text/css">
<!--
.style2 {
	color: #666666;
	font-family: Calibri;
	font-size: 16px;
}
.style3 {
	font-family: Calibri;
	color: #CC0404;
}
.style4 {color: #000000}
.style5 {
	font-family: Calibri;
	font-weight: bold;
	color: #666666;
	font-size: 17px;
}
.style6 {
	color: #FFFFFF;
	font-family: Calibri;
}
.style7 {font-family: Calibri}
.style8 {color: #CC0404}
.style9 {
	font-family: Calibri;
	font-weight: bold;
	color: #FFFFFF;
}
.style10 {color: #FFFFFF; font-family: Calibri; font-size: 14px; }
.style11 {
	font-family: Calibri;
	font-size: 14px;
	font-weight: bold;
}
-->

.styled-select select {
  background:#999;
   padding: 5px;
   margin:0;
   padding:2px;
   font-size: 11px;
   border: 1px solid #ccc;
   
   height: 20px;
}
.styled-select {
    width: 210px;
   height: 20px;
   background: transparent;
  background:#000;
  color::#900;
}
</style>

<!--This is the colorbox script-->
	<script>
		jQuery(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			
		});
	</script>
</head>

<body>
<div class="mainbody">
    	<div class="Welc_boxV style3">
       	  <div id="Welc_text">Welcome to Internet Multimedia Live Streaming Online...</div>
            <div id="date_boxV">
              <div align="right" class="style4" id="timeval"></div>
            </div>
        </div>
        <div class="head_boxV">
       	  <div id="head_boxVA">
            	<div id="logo_boxVA"></div>
<div id="nowshow_boxVA"> 
                	<?php include ("include/nowshowing.php"); ?>
            </div>
          </div>
            	<div id="head_boxVB">
                	<div class="style7" id="head_boxVB1" style=" margin-top:10px;">
                	  <div align="right">
                      
<span style="width:auto; float:left;"><a class="openbox" href="testimony.html" style="text-decoration:none; color:#000">Share your Testimony </a></span>  
<span class="style8" style="width:auto; float:right;"><div class="selectRegion">
      <ul id="sddm">
    <li><a href="#" 
        onmouseover="mopen('m1')" 
        onmouseout="mclosetime()"> <strong style="color:#FFF; font-size:14px;">Other Links </strong></a>
        <div id="m1" 
            onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
        <a href="http://christembassy.org" target="_blank">CHRIST EMBASSY INTERNATIONAL</a>
        <a href="http://pastorchrisonline.org/" target="_blank">PASTOR CHRIS ONLINE </a>
        <a href="http://christembassyonlinestore.org/" target="_blank">ONLINE STORE</a>
        <a href="http://www.yookos.com" target="_blank">yookos</a>
       
     
        </div>
    </li></ul> 
    <div style="clear:both"></div> 
    </div></span></div>
                	</div>
                <!--  <div id="head_boxVB2"></div>-->
                    <div id="head_boxVB3">
                      <div align="right" class="style3"><strong>You are Logged-in as</strong></div>
                    </div>
                    <div id="head_boxVB4">
                      <div align="right" class="style7"><strong style="font-size:20px;"><?php echo Session::get('login'); ?></strong></div>
                    </div>
                    <div id="head_boxVB5">
                      <div align="right" class="style3"><a href="/logout" style="text-decoration:none">
                      
                      <div style=" padding:2px 10px; width:auto; background:#C00; float:right; color:#FFF; font-weight:bold; font-size:12px; margin-top:10px; ">Log Out</div></a>
                      
                      </div>
                    </div>
                </div>
        </div>
        <div class="body_boxV">
        	<div class="vidplay_boxV">
            <div id="biography">
        <div align="center">
<div id='preview' style="background:#000; padding:0px 10px;">If you are seeing this message, it means that you do not have JavaScript enabled in your browser therefore you would be unable
to view the stream. Please use a Javascript enabled browser such as Internet Explorer 7 or Mozilla Firefox</div>
  <script type='text/javascript'>
 function loadVideoPlayer() {


var ua = navigator.userAgent;
  
   if (ua.indexOf("BlackBerry") >= 0)
   {
      if (ua.indexOf("WebKit") >= 0)
      {
		//alert('here');
         $('preview').innerHTML = '<video src="rtsp://154.obj.netromedia.net/loveworld/loveworld" width="480" height="320" controls ></video>';
      }
   }
   

    if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
        
        
        $('screen').innerHTML = '<video src="http://entrega.flashwebtown.com:1935/lovewordplus/myStream.sdp/playlist.m3u8" width="480" height="320" controls="controls" autoplay="autoplay"></video>';
        //document.write();

    } else {
        
   var s2 = new SWFObject('/res/flash/player.swf','ply','500','360','9','#ffffff');
  	s2.addParam("allowfullscreen","true");
	s2.addParam("wmode","transparent");
	s2.addVariable("autostart","true");
	s2.addVariable("showimage","false");
	s2.addVariable("repeat","list");
	s2.addVariable('autoscroll','false'); 
	s2.addVariable('shuffle','false'); 
	s2.addParam('allowscriptaccess','always');
	s2.addVariable('bufferlength','1');
	s2.addVariable("enablejs","true");
	s2.addVariable('javascriptid','plyr');
	//s2.addVariable("streamer","rtmp://155.obj.netromedia.net/ipadhigh");
	//s2.addVariable('file','ipadhigh1');
	s2.addVariable("streamer","rtmp://entrega.flashwebtown.com:1935/lovewordplus");
	s2.addVariable('file','myStream.sdp');
	
	//s2.addVariable("displayheight","344");
	s2.addVariable("backcolor","0x000000");
	s2.addVariable("frontcolor","0xCCCCCC");
	s2.addVariable("lightcolor","0x557722");
	//s2.addVariable("width","430");
	//s2.addVariable("height","344");
	s2.addVariable("type","video");
	s2.addVariable('skin','/res/flash/stijl.swf'); 
	//s2.addVariable("stretching","exactfit"); 
  s2.write('preview');
	}
	}
</script>
</div>

</div>
            
            </div>
            <div class="vidsid_boxV">
            	<div id="vidsid_boxV1">
                	<div class="style11" id="noteBtitle_vidsid_boxV1">
                	  <div align="center">NOTICE BROAD</div>
                	</div>
                    <div id="noteBdetails_vidsid_boxV1"><div id="msg1Div" style="color:#fff; font-size:12px; padding:5px 5px; font-family:Arial, Helvetica, sans-serif"></div></div>
                </div>
                <div id="vidsid_boxV2">
                
                <diV Id="scrollbar1">
		<diV clAss="scrollbar"><dIV clAss=track><dIv CLaSS="thumb"><Div clASs=end></DIV></Div></Div></DiV>
		<Div clASS=viewport>
			 <diV CLass="overview">
<iframe src="http://www.coveritlive.com/index2.php/option=com_altcaster/task=viewaltcast/altcast_code=81f931ce86/height=400/width=339" scrolling="no" height="400px" width="339px" frameBorder ="0" allowTransparency="true"  ><a href="http://www.coveritlive.com/mobile.php/option=com_mobile/task=viewaltcast/altcast_code=81f931ce86" >August Communion Service</a></iframe>
<div style=" clear:both;"></div>
</diV></Div></diV>
</div>

                <div class="style6" id="vidsid_boxV3">HELP LINE:</div>
                
            </div>
                    
  </div>
        <div class="nav_boxV">
        	<div id="broadcast_nav_boxV">
           	  <div class="style9" id="nav_boxV1" style=" width: auto"><span class="style8">
                
                
                
                
<div class="styled-select">
<div id="container">
  <div id="button" style="font-size:12px;"><strong style=" color:#ccc"><span style=" color:#F00">Click</span> to Change Settings </strong>
    <ul class="the_menu" style="z-index:1000">
    <div id="celebs">
<li><a href="/flashlow.php" title='Flash Low'>Flash Low</a></li>
<li><a href="/flashmed.php" title='Flash Medium'>Flash Medium</a></li>
<li><a href="/winlow.php" title='Windows Low'>Windows Low</a></li>
<li><a href="/winmed.php" title='Windows Medium'>Windows Medium</a></li>
<li><a href="/audio.php" title='Audio'>Audio</a></li>
</div>
<li><a title='iPad and iPhones' href="http://entrega.flashwebtown.com:1935/imm2012/myStream.sdp1/playlist.m3u8" target="_blank">Mobile Stream (iPads, iPhones) </a></li>
<li><a title='BlackBery' href="rtsp://entrega.flashwebtown.com:1935/imm2012/myStream.sdp1" target="_blank">Blackberry (and other smart phones)</a></li>
<li><a title='Android' href="rtsp://entrega.flashwebtown.com:1935/imm2012/myStream.sdp1"target="_blank">Android Phones</a></li>
</ul>
</div>

</div>
</div>
 
 </span></div>
            	<div class="style9" id="nav_boxV2" style=" width:400px; font-size:14px"> <span style="float:left">Present Stream Format</span> <span class="style8" style="margin-left:10px; float:left" id="biography2">FLASH LOW</span> </div>
            </div>
            
            
            <div class="style10" id="helpnav_boxV">+1 901 279 2587, +1 972 489 9579, +1 504 388 0249</div>
        </div>
    <div class="copr_boxV">
      <div align="center" class="style2">Copyright 2010 - 2012. Internet Multimedia Streaming. All Rights Reserved.<br /> 
      Any Duplication, Transfer or Manipulation of the Content of this website is prohibited.</div>
  </div>
          
</div>
  <script>loadVideoPlayer();</script>
  <script type="text/javascript" src="/js/prototype.js"></script>    
  <script>
function updateMsgDiv(){
    //alert('fired');
    new Ajax.Updater('msgDiv', 'msg.htm?p='+Math.random(6747)); 
}
new Ajax.PeriodicalUpdater('msg2Div', '/msg2.htm?p='+Math.random(6747), {method: 'post', frequency: 20, decay: 2 });
//new PeriodicalExecuter(updateMsgDiv, 5);  
//new Ajax.Updater('msgDiv', 'msg.htm?p='+Math.random(6747));
function updateLoginTime(){
            var rand   = Math.random(9999);
            var url = '/ajx/misc.php'+'?rand='+rand+'&mode=<?php echo md5('updatelogintime'); ?>';
    
        
    var pars   =  'rand=' + rand+'&mode=<?php echo md5('updatelogintime'); ?>';
        var myAjax = new Ajax.Request( url, {method: 'post', parameters:pars, onComplete: function(){}} );
        }
        
        function checkLoginStatus(){
            var rand   = Math.random(9999);
            var url = '/ajx/misc.php';
    
        
    var pars   ='rand='+rand+'&mode=<?php echo md5('checkloginstatus'); ?>';
        var myAjax = new Ajax.Request( url, {method: 'post', parameters:pars, onComplete: processLoginStatus} );
        }
        new PeriodicalExecuter(updateLoginTime, 600);
        
        
        function processLoginStatus(originalReq){
            resp = originalReq.responseText.split('|');
            switch(resp[0]){
            
                case '0':
                    /////log user out
                    location.href = '/login?msg=<?php echo md5('forcedlogout'); ?>';
                    break;
                case '1':
                    ////
                    break;
            
            }
        }
        new PeriodicalExecuter(checkLoginStatus, 900); 
</script>
<script>
function updateMsg2Div(){
    //alert('fired');
    new Ajax.Updater('msg1Div', 'msg1.htm?p='+Math.random(6747)); 
}

new Ajax.PeriodicalUpdater('msg1Div', '/msg2.htm?p='+Math.random(6747), {method: 'post', frequency: 35, decay: 2 });
//new PeriodicalExecuter(updateMsgDiv, 5);  
//new Ajax.Updater('msgDiv', 'msg.htm?p='+Math.random(6747)); 
</script>
</body>
</html>
