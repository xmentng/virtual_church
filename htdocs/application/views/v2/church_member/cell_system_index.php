<?php $this->load->view('vw_header');  ?>
<link type="text/css" rel="stylesheet" media="all" href="/css/chat.css" />
<style type="text/css">

.background {
    border-style: none;
    width: 62px;
	margin-top:10px;
	overflow:hidden;
	position:relative;
	top:-10px;
    height: 38px;
}
.numbers {
    border-style: none;
    background-color: #292929;
    padding: 0px;
    margin: 0px;
    width: 62px;
    height: 42px;
	
    text-align: center; 
    font-family: Arial; 
    font-size: 34px;
    font-weight: normal;    /* options are normal, bold, bolder, lighter */
    color: #C00;     /* change color using the hexadecimal color codes for HTML */
}
.title {    /* the styles below will affect the title under the numbers, i.e., "Days", "Hours", etc. */
    border: none;    
    padding: 0px;
    margin: -5px 3px;
    width: 62px;
    text-align: center; 
    font-family: Arial; 
    font-size: 10px; 
    font-weight: normal;    /* options are normal, bold, bolder, lighter */
    color: #f5f5f5;    /* change color using the hexadecimal color codes for HTML */
    background-color:none;  
}
#form {    /* the styles below will affect the outer border of the countdown timer */
    width: 450px;
    height: 80px;
	text-shadow:none;
    border-style: ridge;  /* options are none, dotted, dashed, solid, double, groove, ridge, inset, outset */
    border-width:0;
    border-color: #666666;  /* change color using the hexadecimal color codes for HTML */ 
    background-image:transparent;
    padding: 5px;
	margin-top:15%;
    /*margin: 100px auto;*/
    position: absolute;   /* leave as "relative" to keep timer centered on your page, or change to "absolute" then change the values of the "top" and "left" properties to position the timer */
	left:16%;
	z-index:9000px;
   /* change to position the timer */
 /* change to position the timer; delete this property and it's value to keep timer centered on page */
}
.line {
    border-style: none;
    width: 62px; 
    height: 2px;
    z-index: 15;
	color: # 999
}
</style>

<link rel="stylesheet" href="/css/chat.css" type="text/css" />
<!--<script src="/js/chat.js" type="text/javascript"></script>
-->
<script type="text/javascript">

/*
Count down until any date script-
By JavaScript Kit (www.javascriptkit.com)
Over 200+ free scripts here!
Modified by Robert M. Kuhnhenn, D.O. 
on 5/30/2006 to count down to a specific date AND time,
and on 1/10/2010 to include time zone offset.
*/
/*  Change the items below to create your countdown target date and announcement once the target date and time are reached.  */
/*var card="http://www.google.com";  
*/

var current="<span style=''>NOW LIVE</span>!<br> <em  style='font-size:14px;'>Refresh page to watch now</em><br><br>";        //—>enter what you want the script to display when the target date and time are reached, limit to 20 characters
var year=<?php echo $church_service['year'][$data['nthval']];?>;        //—>Enter the count down target date YEAR
var month=<?php echo $church_service['month'][$data['nthval']];?>;          //—>Enter the count down target date MONTH
var day=<?php echo $church_service['day'][$data['nthval']];?>;           //—>Enter the count down target date DAY
var hour=<?php echo $church_service['hour'][$data['nthval']];?>;          //—>Enter the count down target date HOUR (24 hour clock)
var minute=<?php echo $church_service['minute'][$data['nthval']];?>;        //—>Enter the count down target date MINUTE
var tz=<?php echo $church_service['time_zone'][$data['nthval']];?>;             //—>Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)

//—>    DO NOT CHANGE THE CODE BELOW!    <—
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

function countdown(yr,m,d,hr,min){
    theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;
    var today=new Date();
	
    var todayy=today.getYear();
	
    if (todayy < 1000) {
    	todayy+=1900; 
	}
    var todaym=today.getMonth();
    var todayd=today.getDate();
    var todayh=today.getHours();
    var todaymin=today.getMinutes();
    var todaysec=today.getSeconds();
	
    var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
    var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);
	
    var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);
    var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));
	
    var dd=futurestring-todaystring;
	
    var dday=Math.floor(dd/(60*60*1000*24)*1);
    var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
    var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
    var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
    
	if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0){
		
		document.getElementById('video').style.display   = "none";
		//$('#videoWr').load('/player.php').fadeIn("slow");
		
		document.getElementById('video').style.visibility   = "hidden";
		document.getElementById('screen').style.background   = "#0000";
		
		document.getElementById('count2').innerHTML=current;

		document.getElementById('count2').style.display="inline";
		
        document.getElementById('count2').style.width="390px";
        document.getElementById('dday').style.display="none";
        document.getElementById('dhour').style.display="none";
        document.getElementById('dmin').style.display="none";
        document.getElementById('dsec').style.display="none";
        document.getElementById('days').style.display="none";
        document.getElementById('hours').style.display="none";
        document.getElementById('minutes').style.display="none";
        document.getElementById('seconds').style.display="none";

        return;
    }
    else {		
		document.getElementById('video').style.display   = "inline";
		//document.getElementById('screen').style.visibility   = "hidden";
        document.getElementById('count2').style.display="none";
        document.getElementById('dday').innerHTML=dday;
        document.getElementById('dhour').innerHTML=dhour;
        document.getElementById('dmin').innerHTML=dmin;
        document.getElementById('dsec').innerHTML=dsec;


        setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);
    }
}
</script>
<body class="whitebg" onLoad="countdown(year,month,day,hour,minute)">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
             <?php $this->load->view("church_member/page_name_welcome_user");   ?> 

          </div><!--end class greybar-->
      
      
   	  </div><!--end class nine columns-->
        
         <div class="row cls_landing_page" style="font-size:11px; height:60px; background: #FFF; width:100%;">
    
			<div class="row twelve columns" style="width:100%;background:#444;margin-bottom:0%;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            

            <div class="row cls_landing_page_content">
            
            		<!--<div class="cls_page_desc" style="width:100%; height:25px; line-height:25px;">
                    	<span style="font-weight:bolder; font-size:1.1875em;">Church Service</span>
                    </div>
                -->

				<div class="seven columns cls_lpage_left_col">
                    
                    <div id="video" style="background:#000;"  >
                   
                     <!-- <div id="form" style="background:#000; width:80%">
                        <div class="numbers" id="count2" style="position: absolute; top: 10px; height: 60px; padding: 15px 0 0 10px; background-color: #000000; z-index: 20;"></div>
                        <img src="/images/bkgdimage.gif" class="background" style="position: absolute; left: 69px; top: 12px;"/> <img src="/images/line.jpg" class="line" style="position: absolute; left: 69px; top: 40px;"/>
                        <div class="numbers" id="dday" style="position: absolute; left: 69px; top: 21px;" ></div>
                        <img src="/images/bkgdimage.gif" class="background" style="position: absolute; left: 141px; top: 12px;"/> <img src="/images/line.jpg" class="line" style="position: absolute; left: 141px; top: 40px;"/>
                        <div class="numbers" id="dhour" style="position: absolute; left: 141px; top: 21px;" ></div>
                        <img src="/images/bkgdimage.gif" class="background" style="position: absolute; left: 213px; top: 12px;"/> <img src="/images/line.jpg" class="line" style="position: absolute; left: 213px; top: 40px;"/>
                        <div class="numbers" id="dmin" style="position: absolute; left: 213px; top: 21px;" ></div>
                        <img src="/images/bkgdimage.gif" class="background" style="position: absolute; left: 285px; top: 12px;"/> <img src="/images/line.jpg" class="line" style="position: absolute; left: 285px; top: 40px;"/>
                        <div class="numbers" id="dsec" style="position: absolute; left: 285px; top: 21px;" ></div>
                        <div class="title" id="days" style="position: absolute; left: 66px; top: 73px;" >Days</div>
                        <div class="title" id="hours" style="position: absolute; left: 138px; top: 73px;" >Hours</div>
                        <div class="title" id="minutes" style="position: absolute; left: 210px; top: 73px;" >Minutes</div>
                        <div class="title" id="seconds" style="position: absolute; left: 282px; top: 73px;" >Seconds</div>
                      </div>-->
                    
                    </div><!--end video-->
                    
<script src="/js/swfobject.js"></script>  

<script src="/js/html5media.min.js"></script>


 <div id="screen" class="video_screen">
        
    
</div>

<script type="text/javascript">

function loadVideoPlayer() {

 var ua = navigator.userAgent;
   var Ok = false;
   if (ua.indexOf("BlackBerry") >= 0)
   {
      if (ua.indexOf("WebKit") >= 0)
      {
          Ok= true;
         //$('preview').innerHTML = '<video src="" width="480" height="320" controls ></video>';
       //  $('#preview').html('<video src="" width="480" height="320" controls="controls"  autoplay="autoplay" preload></video>');
        
      }
   }
    //alert(ua);
	if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/iPad/i))) {
		
		
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="500" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		 Ok= true; 
        
        //document.write();

	} 
    
    if ((navigator.userAgent.match(/Android/i))) {
        
        
        $('#screen').html('<video src="<?php echo @$church_detail['android'][0];?>" width="660" height="450" controls="controls"  autoplay="autoplay" preload></video>');
         Ok= true; 
        
        //document.write();

    } 
    
    
    
   if(!Ok) {
		//
		 var s2 = new SWFObject('/js/player.swf','ply','640','450','9','#ffffff');
      s2.addParam("allowfullscreen","true");
    s2.addParam("wmode","transparent");
    s2.addVariable("autostart","true");
    
    s2.addVariable("repeat","list");
    s2.addVariable('autoscroll','false'); 
    s2.addVariable('shuffle','false'); 
    s2.addParam('allowscriptaccess','always');
    s2.addVariable('bufferlength','5');
    s2.addVariable("enablejs","true");
    s2.addVariable('javascriptid','plyr');
	s2.addVariable('streamer','<?php echo @$church_detail['stream_url'][0];    ?>');
		s2.addVariable('file','<?php echo @$church_detail['file_stream'][0];    ?>');

        
    //s2.addVariable("displayheight","344");
    s2.addVariable("backcolor","0x000000");
    s2.addVariable("frontcolor","0xCCCCCC");
    s2.addVariable("lightcolor","0x557722");
    s2.addVariable('logo','/res/images/logo5.png');
    //s2.addVariable("width","430");
    //s2.addVariable("height","344");
    s2.addVariable("type","video");
    s2.addVariable('skin','/res/flash/overlay.swf'); 
    s2.addVariable("stretching","exactfit"); 
  s2.write('screen');
	//alert(navigator.userAgent);

	}

}

</script>



<div> 
	<a id="android_device" href='javascript:void(0)'>Android Devices</a>  |   
    <a id="ipad_device" href='javascript:void(0)'>iPads/iPhones</a>    |        
    <a id="bb_device" href='javascript:void(0)'>BlackBerry Devices</a>   
</div>






<script>loadVideoPlayer();</script>
                    
                   
                    
                    
                    <div style="float:left; width:100%; margin-top:5px;background:#000; padding-top:5px"> 
                       <!-- <a href="/churchmember/prayer_request" style="margin-right:2px; margin-left:2px;">
                            <img src="/images/prequest.jpg" style="width:32%; height:auto"  />
                        </a>
    
                        <a href="/churchmember/testimony/" style="margin-right:2px;">
                            <img src="/images/testimony2.jpg" style="width:32%; height:auto" />
                        </a>
    
                        <a href="/churchmember/giving" style="margin-right:2px;">
                            <img src="/images/giveonline.jpg" style="width:32%; height:auto" />
                        </a>-->
					</div>
                    
                    <div class="cls_chat_with_cell_leader">
        			<form id="frmusersonchat" name="frmusersonchat" method="post">
                      <a  href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $page_res['church_account_name'];?>','<?php echo $page_res['user_id'];?>'); return false;">
                          <span style="font-weight:bolder; font-size:1.0625em; color:green;"> Click to chat </span>
                      </a>
                    </form>  
                    
                      
                      
                    </div><!--end class cls_chat_with_cell_leader-->
                </div><!--end cls_lpage_left_col-->
                
                <div class="five columns cls_lpage_right_col">
                  	 
                     <iframe style="width:100%; height:auto; min-height:420px;" src='http://www.coveritlive.com/index2.php/option=com_altcaster/task=viewaltcast/altcast_code=8358f6f8cc/width=470/height=550/entryLoc=bottom/commentLoc=bottom/titlePage=off/replayContentOrder=chronological'scrolling='no'   frameBorder ='0' allowTransparency='true' ></iframe>

                </div><!--end cls_lpage_left_col-->
              <div style="clear:both"></div>
                  
           </div><!--end cls_landing_page_content-->
        
      </div><!--end class landing page-->
  </div><!--end class row-->

<div>
</div>
</div>

    <div class="main_footer2" style="bottom:0;">
        <?php  $this->load->view('vw_footer');  ?>
    </div>


<!--FOOTER-->

<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
  
 
    

<script type="text/javascript">

function chatWith(receiver,sender) {

	update_schema_users_on_chatsystem();
	window.open("/churchmember/startchat/"+ receiver,"_blank", "toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, directories=0, status=0, width=450, height=400");
	
	//return false;	
}//end function


function update_schema_users_on_chatsystem(){
	
	$.ajax({
			 type: "POST",
				   url:	"/churchmember/save_to_users_on_chatsystem",
				   data: $('#frmusersonchat').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						
				   } //end function success

		});//end ajax
	
}//end function



//////////////CHAT SYSTEM//////////////////////////////////

/*function chatWith(chatuser,chatname) {
	
	//alert(chatuser);
	createChatBox(chatuser,chatname);
	$("#chatbox_"+chatuser+" .chatboxtextarea").focus();
}

function createChatBox(chatboxtitle,chatname,minimizeChatBox) {
//alert(chatname);
	if ($("#chatbox_"+chatboxtitle).length > 0) {
	
		if ($("#chatbox_"+chatboxtitle).css('display') == 'none') {
			$("#chatbox_"+chatboxtitle).css('display','block');
			restructureChatBoxes();
		}
		$("#chatbox_"+chatboxtitle+" .chatboxtextarea").focus();
		return;
	}

	$(" <div />" ).attr("id","chatbox_"+chatboxtitle)
	.addClass("chatbox")
	.html('<div style="cursor:pointer" onclick="javascript:toggleChatBoxGrowth(\''+chatboxtitle+'\')"><div class="chatboxhead"><div class="chatboxtitle">'+chatname+'</div><div class="chatboxoptions">- <a href="javascript:void(0)" onclick="javascript:closeChatBox(\''+chatboxtitle+'\')"> X </a></div><br clear="all"/></div></div><div class="chatboxcontent"></div><div class="chatboxinput"><textarea class="chatboxtextarea" onkeydown="javascript:return checkChatBoxInputKey(event,this,\''+chatboxtitle+'\',\''+chatname+'\');"></textarea></div>')
	.appendTo($( "body" ));
	//		   alert('sw');
	$("#chatbox_"+chatboxtitle).css('bottom', '0px');
	
	chatBoxeslength = 0;

	for (x in chatBoxes) {
		if ($("#chatbox_"+chatBoxes[x]).css('display') != 'none') {
			chatBoxeslength++;
		}
	}

	if (chatBoxeslength == 0) {
		$("#chatbox_"+chatboxtitle).css('right', '20px');
	} else {
		width = (chatBoxeslength)*(225+7)+20;
		$("#chatbox_"+chatboxtitle).css('right', width+'px');
	}
	
	chatBoxes.push(chatboxtitle);

	if (minimizeChatBox == 1) {
		minimizedChatBoxes = new Array();

		if ($.cookie('chatbox_minimized')) {
			minimizedChatBoxes = $.cookie('chatbox_minimized').split(/\|/);
		}
		minimize = 0;
		for (j=0;j<minimizedChatBoxes.length;j++) {
			if (minimizedChatBoxes[j] == chatboxtitle) {
				minimize = 1;
			}
		}

		if (minimize == 1) {
			$('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','none');
			$('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','none');
		}
	}

	chatboxFocus[chatboxtitle] = false;

	$("#chatbox_"+chatboxtitle+" .chatboxtextarea").blur(function(){
		chatboxFocus[chatboxtitle] = false;
		$("#chatbox_"+chatboxtitle+" .chatboxtextarea").removeClass('chatboxtextareaselected');
	}).focus(function(){
		chatboxFocus[chatboxtitle] = true;
		newMessages[chatboxtitle] = false;
		$('#chatbox_'+chatboxtitle+' .chatboxhead').removeClass('chatboxblink');
		$("#chatbox_"+chatboxtitle+" .chatboxtextarea").addClass('chatboxtextareaselected');
	});

	$("#chatbox_"+chatboxtitle).click(function() {
		if ($('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display') != 'none') {
			$("#chatbox_"+chatboxtitle+" .chatboxtextarea").focus();
		}
	});

	$("#chatbox_"+chatboxtitle).show();
}


function chatHeartbeat(){

	var itemsfound = 0;
	
	if (windowFocus == false) {
 
		var blinkNumber = 0;
		var titleChanged = 0;
		for (x in newMessagesWin) {
			if (newMessagesWin[x] == true) {
				++blinkNumber;
				if (blinkNumber >= blinkOrder) {
					document.title = x+' says...';
					titleChanged = 1;
					break;	
				}
			}
		}
		
		if (titleChanged == 0) {
			document.title = originalTitle;
			blinkOrder = 0;
		} else {
			++blinkOrder;
		}

	} else {
		for (x in newMessagesWin) {
			newMessagesWin[x] = false;
		}
	}

	for (x in newMessages) {
		if (newMessages[x] == true) {
			if (chatboxFocus[x] == false) {s
				//FIXME: add toggle all or none policy, otherwise it looks funny
				$('#chatbox_'+x+' .chatboxhead').toggleClass('chatboxblink');
			}
		}
	}
	
	$.ajax({
	  url: "/chatsystem/?action=chatheartbeat",
	  cache: false,
	  dataType: "json",
	  success: function(data) {
//alert('sw');
		$.each(data.items, function(i,item){
			if (item)	{ // fix strange ie bug

				chatboxtitle = item.f;
				cuser=item.u;

				if ($("#chatbox_"+chatboxtitle).length <= 0) {
				//alert(item.u);
					createChatBox(chatboxtitle,cuser);
				}
				if ($("#chatbox_"+chatboxtitle).css('display') == 'none') {
				//alert('er');
					$("#chatbox_"+chatboxtitle).css('display','block');
					restructureChatBoxes();
				}
				
				if (item.s == 1) {
				//alert('ser');
					item.f = username;
				}

				if (item.s == 2) {
				//alert('user');
					$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxinfo">'+item.m+'</span></div>');
				} else {//alert('cuser');
					newMessages[chatboxtitle] = true;
					newMessagesWin[item.u] = true;
					$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+item.u+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+item.m+'</span></div>');
				}

				$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
				itemsfound += 1;
			}
		});

		chatHeartbeatCount++;

		if (itemsfound > 0) {
			chatHeartbeatTime = minChatHeartbeat;
			chatHeartbeatCount = 1;
		} else if (chatHeartbeatCount >= 10) {
			chatHeartbeatTime *= 2;
			chatHeartbeatCount = 1;
			if (chatHeartbeatTime > maxChatHeartbeat) {
				chatHeartbeatTime = maxChatHeartbeat;
			}
		}
		
		setTimeout('chatHeartbeat();',chatHeartbeatTime);
	}});
}

function closeChatBox(chatboxtitle) {
	$('#chatbox_'+chatboxtitle).css('display','none');
	restructureChatBoxes();

	$.post("/chatsystem/?action=closechat", { chatbox: chatboxtitle} , function(data){	
	});

}

function toggleChatBoxGrowth(chatboxtitle) {
	if ($('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display') == 'none') {  
		
		var minimizedChatBoxes = new Array();
		
		if ($.cookie('chatbox_minimized')) {
			minimizedChatBoxes = $.cookie('chatbox_minimized').split(/\|/);
		}

		var newCookie = '';

		for (i=0;i<minimizedChatBoxes.length;i++) {
			if (minimizedChatBoxes[i] != chatboxtitle) {
				newCookie += chatboxtitle+'|';
			}
		}

		newCookie = newCookie.slice(0, -1)


		$.cookie('chatbox_minimized', newCookie);
		$('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','block');
		$('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','block');
		$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
	} else {
		
		var newCookie = chatboxtitle;

		if ($.cookie('chatbox_minimized')) {
			newCookie += '|'+$.cookie('chatbox_minimized');
		}


		$.cookie('chatbox_minimized',newCookie);
		$('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','none');
		$('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','none');
	}
	
}

function checkChatBoxInputKey(event,chatboxtextarea,chatboxtitle,chatname) {
	 
	 //alert(event.keyCode); return false;
	if(event.keyCode == 13 && event.shiftKey == 0)  {
	
		message = $(chatboxtextarea).val();
		//alert(message);
		message = message.replace(/^\s+|\s+$/g,"");
		$(chatboxtextarea).val('');
		$(chatboxtextarea).focus();
		$(chatboxtextarea).css('height','44px');
		if (message != '') {
		$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+'<?php //echo $page_res['name_of_user'];    ?>'+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
			$.post("/chatsystem/?action=sendchat", {to: chatboxtitle, message: message} , function(data){
				//alert(data); return false;																				   
				message = message.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\"/g,"&quot;");
				//alert(data); return false;
				//$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+username+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
				//alert(message);
				$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
			});
		}
		chatHeartbeatTime = minChatHeartbeat;
		chatHeartbeatCount = 1;

		return false;
	}

	var adjustedHeight = chatboxtextarea.clientHeight;
	var maxHeight = 94;

	if (maxHeight > adjustedHeight) {
		adjustedHeight = Math.max(chatboxtextarea.scrollHeight, adjustedHeight);
		if (maxHeight)
			adjustedHeight = Math.min(maxHeight, adjustedHeight);
		if (adjustedHeight > chatboxtextarea.clientHeight)
			$(chatboxtextarea).css('height',adjustedHeight+8 +'px');
	} else {
		$(chatboxtextarea).css('overflow','auto');
	}
	 
}

function startChatSession(){ 

	$.ajax({
	  url: "/chatsystem/?action=startchatsession",
	  cache: false,
	  dataType: "json",
	  async: false,
	  success: function(data) {

		username = data.username;
//alert(username);
		$.each(data.items, function(i,item){
			if (item)	{ // fix strange ie bug
	chatusername='';
	
	$.ajax({
	  url: "/chatsystem/?action=chatname&usw="+item.f,
	  cache: false,
	  dataType: "json",
	  async: false,
	  success: function(data) {//alert(data.unm);
					chatusername=data.unm;
					//alert(chatusername);
					}
				});
				
				//alert(chatusername);
				chatboxtitle = item.f;
  chatname=item.u;
				if ($("#chatbox_"+chatboxtitle).length <= 0) {//alert(chatboxtitle+"__");
				
				createChatBox(chatboxtitle,chatusername,1);
				}
				if (item.s == 1) {//alert('w');
					chatname = item.u;
				}

				if (item.s == 2) {//alert('a');
					$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxinfo">'+item.m+'</span></div>');
				} else {//alert('s');
					$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+chatname+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+item.m+'</span></div>');
				}
			}
		});
		
		for (i=0;i<chatBoxes.length;i++) {
			chatboxtitle = chatBoxes[i];
			$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
			setTimeout('$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);', 100); // yet another strange ie bug
		}
	
	setTimeout('chatHeartbeat();',chatHeartbeatTime);
		
	}});
}


jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
*/

/////////////END CHAT SYSTEM//////////////////////////////


	function hide_account_detail(){
		$('#recipient_acct_no').hide();
		$('#recipient_bank').hide();
		$('#teller_no').hide();
		return false;
	}//end function
	
	
	function show_account_detail(){
		$('#recipient_acct_no').show();
		$('#recipient_bank').show();
		$('#teller_no').show();
		return false;
	}//end function
	
	
	function show_local_wired_transfer_detail(){
		$('#issued_bank').show();
		$('#receiving_bank').show();
		$('#issued_bank_account').show();
		$('#receiving_bank_account').show();
		return false;
	
	}
	
	function hide_local_wired_transfer_detail(){
		$('#issued_bank').hide();
		$('#receiving_bank').hide();
		$('#issued_bank_account').hide();
		$('#receiving_bank_account').hide();
		return false;
	
	}
	
	
	function pay_pay_api(){
		hide_account_detail();
		hide_local_wired_transfer_detail();
		alert('Comming soon...');	
	}
	
	
	function play_on_android_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['android'][0];    ?>" width="540" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	}//end function
	
	
	function play_on_ipad_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="540" height="450" controls="controls"  autoplay="autoplay" preload></video>');
	}//end function
	
	
	
	function play_on_bb_device(){
		//alert(2);
		$('#screen').innerHTML = '<video src="<?php echo @$church_detail['blackberry'][0];    ?>" width="540" height="450" controls="controls" ></video>';
	}//end function
	
	

$(document).ready(function(){
						   
//////////////////////////////////////////////////////////

$('#cmdnfriend').click(function(){
	
	//alert(1); return false;
	var nf = ('#txtnfriends').val();
	
	alert(nf); return false;								
});

//////////////////////////////////////////////////////////

var refreshId = setInterval(function() 
   {
	 $('#ben2').load('/online.php?randval='+ Math.random());
   }, 9000);
   //stop the clock when this button is clicked
//////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////


	$('#android_device').click(function(){
		play_on_android_device();
		return false;
	});
	
	
	$('#ipad_device').click(function(){
		play_on_ipad_device();
		return false;
	});
	
	
	$('#bb_device').click(function(){
		play_on_bb_device();
		return false;
	});

///////////////////////////////////////////////////////////
	$('#cmdscall').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/churchmember/send_salvation_call",
				   data: $('#frmscall').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#scall_post_result_msg').addClass("success");
								$('#scall_post_result_msg').removeClass("error");							
								$('#scall_post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmscall')[0].reset();
	
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#scall_post_result_msg').removeClass('success');
								$('#scall_post_result_msg').addClass('error');
								$('#scall_post_result_msg').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
	
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event


///////////////////////////////////////////////////////////
	$('#cmdclick').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/post_comment/",
				   data: $('#frmcomments').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmcomments')[0].reset();
								
								
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass('success');
								$('#post_result_msg').addClass('error');
								$('#post_result_msg').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								
								
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event

/////////////////////////////////////////////////////////
	
	$('#submit_note').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/proc_service_note/",
				   data: $('#frmnote').serialize(),
				   success:	function(e){
					   alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
	
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass('success');
								$('#post_result_msg').addClass('error');
								$('#post_result_msg').html(sp[1]);
	
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event
	


//////////////////////SECTION IS FOR CHAT WINDOW/////////////////////////////////

///////////////////////////////////////////////////////	
	return false;	
						   
});



//////////////////THIS SECTION IS FOR THE CHAT SESSIONS ///////////////////////////


////////////////////////////////////////////////////////////////////////////////////

</script>








<!--END OF CONTENT-->



  </body>
</html>

