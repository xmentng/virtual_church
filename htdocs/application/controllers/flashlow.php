<?php
require_once('header.php'); 
require_once('mobilechecker.php');
?>


<div id="description33">FLASH LOW</div>
<div align="center">
<div id='preview' style="background:#000; padding:0px 10px;"></div>
  <script type='text/javascript'>
  function loadVideoPlayer() {


var ua = navigator.userAgent;
  
   if (ua.indexOf("BlackBerry") >= 0)
   {
      if (ua.indexOf("WebKit") >= 0)
      {
		//alert('here');
         $('preview').innerHTML = '<video src="rtmp://entrega.flashwebtown.com:1935/imm2012/myStream.sdp1" width="480" height="320" controls ></video>';
      }
   }
   

    if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
        
        
        $('screen').innerHTML = '<video src="rtmp://154.obj.netromedia.net/IMMPowered/IMMPowered/playlist.m3u8" width="480" height="320" controls="controls" autoplay="autoplay"></video>';
        //document.write();

    } else {
   var s2 = new SWFObject('/res/flash/player.swf','ply','500','330','9','#ffffff');
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
	s2.addVariable("streamer","rtmp://entrega.flashwebtown.com:1935/imm2012");
	s2.addVariable('file','myStream.sdp1');
	//s2.addVariable("streamer","rtmp://154.obj.netromedia.net/IMMPowered");
	//s2.addVariable('file','IMMPowered');
	
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

  <script>loadVideoPlayer();</script>

</div>