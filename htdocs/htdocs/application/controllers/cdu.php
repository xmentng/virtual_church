<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Live webcast, free video on demand and file-based video transport system</title>
<link href="res/css/cducommon.css" rel="stylesheet" type="text/css" />
<link href="res/css/cdufooter.css" rel="stylesheet" type="text/css" />
<link href="res/css/cdunavs.css" rel="stylesheet" type="text/css" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
var x = new Date('<?php print date("F d, Y H:i:s", time())?>')
function display_c(){
x.setSeconds(x.getSeconds() + 1);
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}
function padzero(num,count) {
var num = num + '';
while(num.length < count) {
num = "0" + num;
}
return num;
}
function display_ct() {
var weekday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var y;
y = monthname[x.getMonth()] + " "
y = y + padzero(x.getDate(), 2)
y = y + ", "
y = y + x.getFullYear()
y = y + " "
y = y + padzero(x.getHours(), 2)
y = y + ":"
y = y + padzero(x.getMinutes(), 2)
y = y + ":"
y = y + padzero(x.getSeconds(), 2)
y = y + " GMT"
document.getElementById('ct').innerHTML = y
tt=display_c();
}
</script>
</head>
<body onload=display_ct();>
<div id="blackbg">
	<div id="centerDiv">Welcome to Internet Multimedia Streaming Online...redefining video delivery</div>
</div>
<div id="cduHolder">
	<!--header start-->
	<div id="cduHeader">
    	<div class="immlogo"></div>
        <div id="cdunav">
        	<div class="datetime">
        	  <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	    <tr>
        	      <td width="50%">&nbsp;</td>
        	      <td width="32%"><span id='ct'; style="font-weight:bold; color:#999; font-size:8pt;" ></span></td>
        	      <td width="18%"><img src="res/img/feedback.jpg" width="109" height="26" /></td>
      	      </tr>
      	    </table>
        	</div>
        	<div class="navlink"><img src="res/img/nav.jpg" width="617" height="26" /></div>
        </div>
    </div>
    <!--header end -->
    <div id="nowshowing"><span style="color:#F00;">Now Showing:</span> Zone 2 Higher Life Conference with Pastor Chris</div>
    <!--Main Body start -->
    <div id="cduMain-layout">
    	<div class="cduflash-lft"> 
    	  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="709" height="360">
    	    <param name="movie" value="res/flash/movie.swf" />
    	    <param name="quality" value="high" />
    	    <param name="wmode" value="opaque" />
    	    <param name="swfversion" value="6.0.65.0" />
    	    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    	    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    	    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    	    <!--[if !IE]>-->
    	    <object type="application/x-shockwave-flash" data="res/flash/movie.swf" width="709" height="360">
    	      <!--<![endif]-->
    	      <param name="quality" value="high" />
    	      <param name="wmode" value="opaque" />
    	      <param name="swfversion" value="6.0.65.0" />
    	      <param name="expressinstall" value="Scripts/expressInstall.swf" />
    	      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
    	      <div>
    	        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
    	        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
  	        </div>
    	      <!--[if !IE]>-->
  	      </object>
    	    <!--<![endif]-->
  	    </object>
    	</div>
        <div class="cdulogin-rgt">
       	  <div class="loginhdr">LIVE TV</div>
            <div class="loginDet">
              <div class="loginform">
              	<table width="100%" border="0" cellpadding="1" cellspacing="0" class="divLoginbox divSideboxEntry">
                <tbody>
                <tr>
                <td height="20"><div align="left" style="border-bottom:1px dotted #666; padding-bottom:4px; color:#F60; font-size:9pt;">
                  <span class="style3">
                    <script>
                new Tip('moreinfo', "You are logged in on another location or another user is currently using your login details. Please log out from the other system to enable you log in from this system. If you are still unable to login, kindly call the help lines at the bottom of this page.", {title:"Login Details currently in use.",closeButton: true,showOn: 'click',hideOn: { element: 'closeButton', event: 'click'},stem: 'bottomMiddle',hook: { target: 'topMiddle', tip: 'bottomMiddle' },offset: { x: 0, y: -2 },width: '350'});del_cookie('PHPSESSID');del_cookie('sID');
                </script>
                    <script>
                 new Tip('moreinfo', "You were logged out. If this was done in error, please call the help lines at the bottom of this page.", {title:"Forced Log out.",closeButton: true,showOn: 'click',hideOn: { element: 'closeButton', event: 'click'},stem: 'bottomMiddle',hook: { target: 'topMiddle', tip: 'bottomMiddle' },offset: { x: 0, y: -2 },width: '350'});del_cookie('PHPSESSID');del_cookie('sID');
                </script>
                    <script>
                 new Tip('moreinfo', "This account has been disabled. Please call the helplines.", {title:"Account Disabled.",closeButton: true,showOn: 'click',hideOn: { element: 'closeButton', event: 'click'},stem: 'bottomMiddle',hook: { target: 'topMiddle', tip: 'bottomMiddle' },offset: { x: 0, y: -2 },width: '350'});
                </script>
                    </span>Please enter your login   details to continue.</div>
                </td>
                </tr>
                  <tr>
                <td>Username</span>:&nbsp;</td>
                </tr>
                  <tr>
                    <td><input name="login" class="fomrfield" value="" size="35" tablindex="1" /></td>
                  </tr>
                <tr>
                <td>Password</span>:&nbsp;</td>
                </tr>
                <tr>
                  <td><input name="password" type="password" class="fomrfield" id="password"  size="35" /></td>
                  </tr>
                <tr>
                <td>Select Event</span>:&nbsp;</td>
                </tr>
                <tr>
                  <td><select name="eventID" class="fomrfield" id="event">
                    <option>Zone 2 Higher Life Conference</option>
                  </select></td>
                  </tr>
                <tr>
                <td><div class="buttonimg"><img src="res/img/login.png" width="126" height="32" /></div></td> 
                </tr>
            
                </tbody>
                </table>
              </div>
          </div>
            <div class="loginDet1">
				 <div class="loginHldr">
						<div class="mydiv_top" id='divCookieAlert'></div>
                   <div class="comments">
                            <div align="center" style="font-weight:bold; font-size:9pt; color:#fff;">Help lines:<strong>+234-8135732057, +234-7038959462, +234-8071605470</strong><strong></strong></div>
<div style="margin:0px; font-style:italic; font-size:9px; color:#CCCCCC">
                            
                     </div>
                   </div>
              </div>
          </div>
      </div>
    </div>
    <!--Main Body end -->
    <!--More Div start -->
    <div id="cduMore-butt">
    	<div class="morelinks">
        	<div class="txtlinks">Internet Multimedia Partnership</div>
            <div class="txtlinks">LoveWorld Connect</div>
            <div class="txtlinks">Send Your FeedBack</div>
        </div>
    	<div class="iconsDiv">
       	  <div class="iconshlder"><img src="res/img/blognew.jpg" width="227" height="75" /></div>
            <div class="iconshlder"><img src="res/img/faqnew.jpg" width="227" height="75" /></div>
            <div class="iconshlder"><img src="res/img/supportnew.jpg" width="227" height="75" /></div>
        </div>
    </div>
    <!--More Div end -->
    <!--Footer start -->
    <div id="cduFooter-hlder">
    	Copyright 2011. LoveWorld Media Streaming. All Rights Reserved. Any duplication, transfer or manipulation of the content of this website is prohibited.
    </div>
    <!--Footer end -->  
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>
