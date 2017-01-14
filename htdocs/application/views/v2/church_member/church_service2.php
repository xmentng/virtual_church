<?php $this->load->view('vw_header');  ?>

<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
              <div class="greybar_left">  
                    <div>
                       <!-- <a href="/auth/logout/"  style=" padding:2px 5px; font-size:12px; height:auto;"><strong>Logout</strong></a> -->                    
                    </div>
              </div>
              
              <div class="greybar_right">
                    <strong><em><?php  echo "Welcome ". authmanager::load_user_fullname().' from '.$church_detail['church_name'][0];  ?>!</em></strong>
              </div>
              
              <div style="clear:both"></div>
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#E8E8E8;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="cls_landing_page_content">
				<div class="cls_lpage_left_col" style="width:52%; float:left;">
                    <!-- <div id="video">
          				
                        
                    </div><!--end video-->
                    <div id="videoWr" style="width:100%; text-align:center; background:#000; height:360px;">
                    	<embed id="ply" height="360" flashvars="autostart=true&showimage=false&repeat=list&autoscroll=false&shuffle=false&bufferlength=5&enablejs=true&javascriptid=plyr&streamer=<?php echo @$church_detail['stream_url'][0];    ?>&file=<?php echo @$church_detail['file_stream'][0];    ?>&backcolor=0x000000&frontcolor=0xCCCCCC&lightcolor=0x557722&logo=/res/images/logo5.png&type=video&skin=/res/flash/overlay.swf&stretching=exactfit" allowscriptaccess="always" wmode="opaque" allowfullscreen="true" quality="high" bgcolor="#ffffff" name="ply" style="undefined" src="/js/player.swf" type="application/x-shockwave-flash">

                    
                    </div>
                    
                    <div style="float:left; width:100%; margin-top:5px;background:#000; padding-top:5px"> 
                        <a href="/churchmember/prayer_request" style="margin-right:2px; margin-left:2px;">
                            <img src="/images/prequest.jpg" style="width:32%; height:auto"  />
                        </a>
    
                        <a href="/cgurchmember/testimony/" style="margin-right:2px;">
                            <img src="/images/testimony2.jpg" style="width:32%; height:auto" />
                        </a>
    
                        <a href="/churchmember/giving" style="margin-right:2px;">
                            <img src="/images/giveonline.jpg" style="width:32%; height:auto" />
                        </a>
					</div>
                </div><!--end cls_lpage_left_col-->
                
                <div class="cls_lpage_right_col" style="width:48%; float:right;">
                  	 
                    <div class="container1" style="padding:5px 10px;">
                        <ul id="tabs1" class="usifotabs">
                            <li><a href="#view1">Live Chat</a></li>
                            <li><a href="#view2">Bible</a></li>
                            <li><a href="#view3">Note</a></li>
                            <li><a href="#view4">Salvation Call</a></li>
                        </ul>
                        <div class="panel-container">
                            <div id="view1">
                             
                             <div id="login_for_chat">
                                <form action="" method="post" name="frmchat" id="frmchat">
									Enter Your Name: <br>
									<input name="txtname" id="txtname" type="text" style="border:solid 1px #333; width:60%;">
                                    <br>

                                	Enter Your Email: <br>
									<input name="txtemail" id="txtemail" type="text" style="border:solid 1px #333; width:60%;">
                                    <br>

                                    
                                    <input name="church_id" id="church_id" type="hidden" value="<?php  echo @$page_res['church_id'];  ?>" >
                                    <input name="church_id" id="user_id" type="hidden" value="<?php  echo @$page_res['user_id'];  ?>" >
                                    <input name="stream_url" id="stream_url" type="hidden" value="<?php  echo @$church_detail['stream_url'][0];  ?>" >
                                    
                                    <input name="cmd_start_chat" id="cmd_start_chat" type="submit" value="Start Chat">
                                </form>
                              </div>  
                              
                              
                              <div id="chat_session">
                              	
                                <div id="menu">
                                    <p class="welcome">Welcome, <b><?php echo @$_SESSION['name']; ?></b></p>
                                    <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                                    <div style="clear:both"></div>
                                </div>
    
                                <form action="" method="post" name="frmpostchat" id="frmpostchat">
                                    <textarea name="usermsg" id="usermsg" style="max-width:100%; min-height:160px; min-width:100%;"></textarea>
		
                                    
                                    <input name="church_id" id="church_id" type="hidden" value="<?php  echo @$page_res['church_id'];  ?>" >
                                    <input name="user_id" id="user_id" type="hidden" value="<?php  echo @$page_res['user_id'];  ?>" >
                                    <input name="stream_url" id="stream_url" type="hidden" value="<?php  echo @$church_detail['stream_url'][0];  ?>" >
                                    
                                    <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />

                                </form>
                              </div>  
                            </div><!--end view1-->
                            
                            <div id="view2">
                                <h3>The Bible</h3>
                                <iframe height="360px" frameborder="0"  src="http://m.youversion.com/bible/kjv/gen/1/1" style="width:100%"></iframe>
                            
                            </div><!--end view3-->
                            <div id="view3">
                                <h3>Take Note</h3>
                                <form action="" method="post" name="frmnote" id="frmnote">

                                	<textarea name="txtnote" id="txtnote" cols="" rows="" style="max-width:100%; min-height:160px; min-width:100%;"> </textarea>
                                    <input name="church_id" id="church_id" type="hidden" value="<?php  echo @$page_res['church_id'];  ?>" >
                                    <input name="user_id" id="user_id" type="hidden" value="<?php  echo @$page_res['user_id'];  ?>" >
                                    <input name="stream_url" id="stream_url" type="hidden" value="<?php  echo @$church_detail['stream_url'][0];  ?>" >
                                    
                                    <input name="submit_note" id="submit_note" type="submit" value="Submit">
                                </form>
                            </div><!--end view3-->
                            
                          <div id="view4">
                            <h3>Call To Salvation</h3>
                             
						  </div><!--end view4-->
                            
                            
                        </div>
            
        			</div><!--end container1-->


                </div><!--end cls_lpage_left_col-->
              <div style="clear:both"></div>
                  
           </div><!--end cls_landing_page_content-->
        
    	   </div><!--end class landing page-->
         </div><!--end class row-->


    <div class="main_footer2">
        <?php  $this->load->view('vw_footer');  ?>
    </div>
</div>

<!--FOOTER-->
    

<script type="text/javascript">

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
		$('#screen').html('<video src="<?php echo @$church_detail['android'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	}//end function
	
	
	function play_on_ipad_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
	}//end function
	
	
	
	function play_on_bb_device(){
		//alert(2);
		$('#screen').innerHTML = '<video src="<?php echo @$church_detail['blackberry'][0];    ?>" width="770" height="450" controls ></video>';
	}//end function

$(document).ready(function(){

//////////////////////////////////////////////////////////

var refreshId = setInterval(function() 
   {
	 $('#ben2').load('/online.php?randval='+ Math.random());
   }, 9000);
   //stop the clock when this button is clicked
//////////////////////////////////////////////////////////


$(".btn2").click(function() {

var name = $("#name").val();
var email = $("#email").val();
var comment = $("#comment").val();
var Country = $("#Country").val();
var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment + '&Country=' + Country;
	
	if(name=='' || email=='' || comment=='')
     {
    alert('Please Give Valide Details');
     }
	else
	{
	$("#flash222").show();
	$("#flash222").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
		type: "POST",
  url: "/response.php",
   data: dataString,
  cache: false,
  success: function(html){
 
  $("ol#update").append(html);
  $("ol#update li:last").fadeIn("slow");
  document.getElementById('email').value='';
   document.getElementById('name').value='';
    document.getElementById('comment').value='';
	$("#name").focus();
 
  $("#flash222").hide();
	
  }
 });
}
return false;
	});







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
	$('#cmdclick').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/change_user_password/",
				   data: $('#frmpost').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
								//document.location="/churchmember/edit_profile";
								
								
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
	


///////////////////////////////////////////////////////
$('#login_for_chat').show();
$('#chat_session').hide();
$('#cmd_start_chat').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/start_chat/",
				   data: $('#frmchat').serialize(),
				   success:	function(e){
					   alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								
								$('#login_for_chat').hide();
								$('#chat_session').show();
								//alert(e);return false;
								/*$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();*/
	
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
	
	
	
	
///////////////////////////////////////////////////////	
	return false;	
						   
});

</script>





<!--END OF CONTENT-->

<style type="text/css">

#wrapper, #loginform {
	margin:0 auto;
	padding-bottom:25px;
	background:#EBF4FB;
	width:504px;
	border:1px solid #ACD8F0; }
 
#frmchat { padding-top:18px; }
 
	#frmchat p { margin: 5px; }
 
#chatbox {
	text-align:left;
	margin:0 auto;
	margin-bottom:25px;
	padding:10px;
	background:#fff;
	height:270px;
	width:430px;
	border:1px solid #ACD8F0;
	overflow:auto; }
 
#usermsg {
	width:395px;
	border:1px solid #ACD8F0; }
 
#submit { width: 60px; }
 
.error { color: #ff0000; }
 
#menu { padding:12.5px 25px 12.5px 25px; }
 
.welcome { float:left; }
 
.logout { float:right; }
 
.msgln { margin:0 0 2px 0; }
@charset "utf-8";

</style>

  </body>
</html>

