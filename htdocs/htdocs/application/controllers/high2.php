<?php
//chdir('../');
require_once('checkAuth.php'); 
?>
<html><style type="text/css">
<!--
body {
	background-color: #000000;
}
-->
</style>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script type="text/javascript" src="js/swfobject.js"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<body>
<div id='preview' style="background:#000; padding:0px;">If you are seeing this message, it means that you do not have JavaScript enabled in your browser therefore you would be unable
to view the stream. Please use a Javascript enabled browser such as Internet Explorer 7 or Mozilla Firefox</div>
  <script type='text/javascript'>
   var s2 = new SWFObject('res/flash/player.swf','ply','520','330','9','#ffffff');
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
	s2.addVariable("streamer","rtmp://81.145.152.250/live/");
	s2.addVariable('file','dataflashHigh');
	
	//s2.addVariable("displayheight","344");
	s2.addVariable("backcolor","0x000000");
	s2.addVariable("frontcolor","0xCCCCCC");
	s2.addVariable("lightcolor","0x557722");
	//s2.addVariable("width","430");
	//s2.addVariable("height","344");
	s2.addVariable("type","video");
	s2.addVariable('skin','res/flash/stijl.swf'); 
	s2.addVariable("stretching","exactfit"); 
  s2.write('preview');
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8378729-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>