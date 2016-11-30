<?php

require_once('../vault/checkAuth.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Live webcast, free video on demand and file-based video transport system</title>
<link href="/res/css/cducommon.css" rel="stylesheet" type="text/css" />
<link href="/res/css/cdutv.css" rel="stylesheet" type="text/css" />
<link href="/res/css/cdunavs.css" rel="stylesheet" type="text/css" />
	<link media="screen" rel="stylesheet" href="/colorbox.css" />
	<script src="/colorbox/jquery-1.4.2.js"></script>
	<script src="/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="/js/prototype.js"></script>
 <script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			$(".example6").colorbox({iframe:true, innerWidth:425, innerHeight:344});
			$(".example7").colorbox({width:"100%", height:"200%", iframe:true});
			$(".example8").colorbox({width:"50%", inline:true, href:"#inline_example1"});
			$(".example9").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});
			$(".example10").colorbox({width:"80%", height:"80%", iframe:true});
			$(".example11").colorbox({width:"35%", height:"47%", iframe:true});
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>
<script type="text/javascript">
//alert('Please be informed that the next session starts at 1500 hours GMT.');

<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
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
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>
<body onload=display_ct();>
<div id="blackbg">
	<div class="style1" id="centerDiv">Welcome to Internet Multimedia Streaming Online...redefining video delivery</div>
</div>
<div id="cduHolder">
	<!--header start-->
	<?php include ("include/header.php"); ?>
    <!--header end -->
    	<?php include ("include/nowshowing.php"); ?>
    <!--Main Body start -->
    <div id="cdutv-layout">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <div class="cdulinks-lft">
    	<?php include ("include/sidenav.php"); ?>
    </div>
    <div class="cdutv_hldr">
    	<div class="cdutvscreen">
        	<div class="cdutv"><iframe src="region/<?php echo Session::get('region').'/'; ?>settings.php" height="340" width="520" frameborder="0" name="live" id="iframe_live" style="background:#000;"></iframe></div>
        </div>
        <div class="selectspeed">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="68%">Change your broadcast settings</td>
              <td width="32%"><a href="/livestream">CLICK HERE</a></td>
            </tr>
          </table>
        </div>
    </div>
        <div class="cdulinks-rgt">
		<?php
		$arrRegion = array('afri_asia'=>'Africa/Asia','europe'=>'Europe','america'=>'America');
		?>
		<div class="logoutDet">Selected Region: <?php echo $arrRegion[Session::get('region')]; ?>  | <a href="/logout">Change</a></div>
          <div class="logoutDet">You are logged in as: <?php echo Session::get('login'); ?>  | <a href="/logout">Logout</a></div>
          <div class="loginDet">
          	<div class="noticehdr">NOTICE BOARD</div>
            <div class="noticebdy" id='msg2Div'></div>
          </div>
          <div class="liveblog"><a href="/techsup" target="_blank">LIVE TECHNICAL SUPPORT</a></div>
            <div class="loginDet">
				<div class="loginHldr">
						<div class="mydiv_top" id='divCookieAlert'></div>
                   <div class="comments">
                            <div align="center" style="font-weight:bold; font-size:9pt; color:#fff;">Help lines:<br />
<strong>+27 78 749 3165, <br />
+27 76 518 0947,<br />
 +27 76 407 1246</strong><strong></strong></div>
<div style="margin:0px; font-style:italic; font-size:9px; color:#CCCCCC">
                            
                     </div>
                   </div>
              </div>
          </div>
      </div>
     <!-- <iframe src="http://www.coveritlive.com/index2.php/option=com_altcaster/task=viewaltcast/altcast_code=66af6e0313/height=390/width=270" scrolling="no" height="390px" width="270px" frameBorder="0" allowTransparency="true" ><a href="http://www.coveritlive.com/mobile.php/option=com_mobile/task=viewaltcast/altcast_code=66af6e0313" >February Communion Service</a></iframe>
     --></td>
  </tr>
</table>

    </div>
    <!--Main Body end -->
    <!--More Div start -->
    <div id="cduMore-butt">
    	<?php include ("include/morelinks.php"); ?>
    </div>
    <!--More Div end -->
    <!--Footer start -->
    <?php include ("include/footer.php"); ?>>
    <!--Footer end -->  
</div>
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

new Ajax.PeriodicalUpdater('msg1Div', '/msg1.htm?p='+Math.random(6747), {method: 'post', frequency: 35, decay: 2 });
//new PeriodicalExecuter(updateMsgDiv, 5);  
//new Ajax.Updater('msgDiv', 'msg.htm?p='+Math.random(6747)); 
</script>
</body>
</html>
