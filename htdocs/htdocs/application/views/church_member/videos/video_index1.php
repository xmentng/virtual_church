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

<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
<title>Line Break (Shift + Enter)</title>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container" style="font-size:11px;">

<div class="row">
<div class="twelve columns">

  	<div class="row">
  	  <div class="twelve columns" id="welcome-user-pagename">
            <div class="greybar">
                 <?php $this->load->view("church_member/page_name_welcome_user");   ?> 
            </div><!--end class greybar-->
   	  </div><!--end class 12 columns-->

  	</div><!--end class row-->
  
  
    <div class="row" id="maintab">
          <div class="twelve columns">
             <?php $this->load->view("maintab");   ?> 
          </div><!--end class greybar-->
      
     </div><!--end row-->
     
     
     <div class="row" id="page-contents">
        
        <div class="twelve columns latest_video_videoplayer" style="width:100%; background-color:#282828; height:auto; color:#B3B3B3; font-size:11px;">


             	<div class="eight columns" id="carousel" style="background-color:#333">
                    <div class="video" id="screen">
                           
                           Video Screen
                       
                    </div>
                                    
                </div>

                
                <div class="four columns" id="video-info" style="background-color:#333">
                   
                    	video info
                </div>

          </div><!--end 12 cols-->
      
     </div><!--end row-->
     
     
     <div class="row">
     
     	<div class="twelve columns" id="related-videos-thumbnail"  style="height:auto; color:#B3B3B3; margin-top:3px; background:url(/images/related_video_thumbs_bg.jpg) repeat-x">
        	<?php 
				for($i=0; $i<count($videos['id']); $i++){
			?>
        	<div class="two columns" style="text-align:center; height:120px;">
            	<a href="">
                    <div class="cls-img" style="height:70px; width:60%; clear:both;">
                        <img src="<?php echo "/".$videos['video_thumbnail_url'][$i];   ?>"  style="width:100%; border:none;"  align="absmiddle"/>
                    </div>
                	<br>
					<div class="cls-img-title" style="height:50px; width:100%;">
                    	<span><?php echo $videos['video_title'][$i];  ?></span>
                    </div>
                
            	</a>
            
          </div>
			<?php
				}
			
			?>
        </div>
     
     </div><!--end id related video-->
     
     
     <div class="row">
     
     	<div class="twelve columns" id="video-page-content">
        
        	<div class="nine columns" id="lhs-content" style="font-size:11px;">
            
            	<div class="row">
                	<div class="twelve columns">
                    		
                           <div class="latest-videos-mnu-header" style="height:30px; line-height:28px;">
                                <span style="padding:0px 7px; font-weight:bolder">Latest Videos</span>
                            </div>
                            <div class="four columns">
                                
                                <a href="">
                                <span style="padding:0px 7px;">Latest Title</span>
                                </a>
                            
                            </div>
                            
                            
                            <div class="four columns">
                                
                                <a href="">
                                <span style="padding:0px 7px;">Latest Title</span>
                                </a>
                            
                            </div>
                            
                            
                            <div class="three columns">
                                
                                <a href="">
                                <span style="padding:0px 7px;">Latest Title</span>
                                </a>
                            
                            </div>

                    </div><!--end 12 cols-->
            	</div><!--end row-->
                
                
                 <div class="row" id="video-comment-section">
     
                  <div class="twelve columns" id="video-comment-form">
                            <form action="/videos/uploadfile" method="post" name="frmvideo" id="frmvideo" enctype="multipart/form-data" class="upload" onSubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback})">
                            
                           <code class="info" id="post_result_msg">
                               Please post your comment
                           </code>
                                
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                   <tr>
                                     <td align="left" valign="top"><strong>Comment</strong>:
                                     <br><textarea name="comment" id="comment" style="width:100%;" placeholder="Your comment body here" required></textarea></td>
                                   </tr>
                                   <tr>
                                     <td align="left" valign="top"><input type="submit" name="buttonPostComment" id="buttonPostComment" value="Post Comment" />
                                     <input name="seenform" type="hidden" id="seenform" value="postcomment" /></td>
                                   </tr>
                                </table>
                           
                </form>
                    </div><!--end 12 cols-->
                 </div><!--end row-->
                 
                 <!--all comments posted based on selected video-->
                 
                 <div class="row video-comment-content">
                 	<div class="twelve columns">
                    	Comments
                        <hr>
                    </div>
                    
                    <div class="twelve columns">
                    	 <div class="three columns cls_author_pix">
                        
                            author-pix
                        </div>
                        
                        <div class="three columns">
                            author-name
                        </div>
                        
                         <div class="six columns">
                            comment detail
                        </div>
                    </div>
                    
                    <div class="twelve columns comment-body">
                    	 <p style="text-align:justify; line-height:1.65em; padding:0px 7px;">
                         
                         	sample comment here
                         	
                         </p>
                    </div>
                 </div><!--end comment row-->
                 
                 <!------------------------------------------------>
            	
                
                
            </div><!--end 8 cols-->
            
            
            <div class="three columns" id="rhs-content" style="font-size:11px;">
            
            	<div class="featured-video-mnu-header" style="width:100%; height:30px; line-height:28px; background-color:">
                	<span style="padding:0px 7px; font-weight:bolder;">Featured Videos</span>
                </div>
                <?php
					for($j=0; $j<count($videos['id']); $j++):
						if($videos['video_category'][$j]=="featured"){
				?>
                <div class="featured-videos" style="width:100%; height:auto;">
                	<a  href="">
                	<div class="f-video-thumbnail" style="width:48%; float:left; margin-right:2%;">
                    	<img src="<?php  echo "/".$videos['video_thumbnail_url'][$j];  ?>" />
                    </div>
                    
                    <div class="f-video-thumbnail-desc" style="width:48%; float:right; margin-left:2%;">
                    	<span style="padding:0px 7px;"><?php echo $videos['video_desc'][$j];  ?></span>
                    </div>
                    
                    <div class="clearfix"></div>
                    </a>
                </div>
                
                <?php
						}
					endfor;
				?>
          
            </div><!--end 4 cols-->
        
        </div>
     
     
     </div><!--video-page-content-->
     
     
    
     
     
     
</div><!--end 12 cols-->
</div><!--end row-->
<div class="main_footer2">
    <?php  $this->load->view('vw_footer');  ?>
</div>

</div>

<!--FOOTER-->
<script src="/js/swfobject.js"></script>  
<script src="/js/html5media.min.js"></script>
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

