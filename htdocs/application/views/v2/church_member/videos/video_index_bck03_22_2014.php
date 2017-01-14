<?php $thumb = new Thumbnailmanager(); ?>
<?php $this->load->view('vw_header');  ?>

<script type="text/javascript"> 
			function startCallback() {
				// make something useful before submit (onStart)
				
				$('#post_result_msg').removeClass("success");
				$('#post_result_msg').removeClass("error");
				$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
				return true;
			}
 
			function completeCallback(resp) {
				// make something useful after (onComplete)
				var response = $.parseJSON(resp);
				if(response.status){
						$('#post_result_msg').html('<img src="/images/success_small.png" align="absmiddle" />' + response.message);
						$('#post_result_msg').removeClass('error');
						$('#post_result_msg').addClass('success');
						$('#frmcomments')[0].reset();
				}
				else{
						//alert($('#post_result_msg').html());
						$('#post_result_msg').html('<img src="/images/invalid_small.png" align="absmiddle" />' + response.error);
						$('#post_result_msg').removeClass('success');
						$('#post_result_msg').addClass('error');
								
				}			
							
			}
		</script> 

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

<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->

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


             	<div class="eight columns" id="default-video" style="background-color:#333">

                    
<script src="/js/swfobject.js"></script>  

<script src="/js/html5media.min.js"></script>


                    <div class="video" id="screen">
                           
                           
                       
                    </div>
                                    
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
		
		
		$('#screen').html('<video src="<?php echo @$defaulvideo['video_url'][0];    ?>" width="500" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		 Ok= true; 
        
        //document.write();

	} 
    
    if ((navigator.userAgent.match(/Android/i))) {
        
        
        $('#screen').html('<video src="<?php echo @$defaultvideo['video_url'][0];?>" width="660" height="450" controls="controls"  autoplay="autoplay" preload></video>');
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
	s2.addVariable('streamer','<?php echo @$defaultvideo['video_url'][0];    ?>');
	s2.addVariable('file','<?php echo @$defaultvideo['video_url'][0];    ?>');

        
    //s2.addVariable("displayheight","344");
    s2.addVariable("backcolor","0x000000");
    s2.addVariable("frontcolor","0xCCCCCC");
    s2.addVariable("lightcolor","0x557722");
    s2.addVariable('logo','<?php //echo "/".@$defaultvideo['video_thumbnail_url'][0];  ?>');
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




<script>loadVideoPlayer();</script>

               
         <div class="four columns" id="video-info" style="background-color:#333">
                   
                 <div style="margin-top:10px">
                   
                   <img src='<?php echo '/'.@$defaultvideo['video_thumbnail_url'][0];    ?>' style="float:left; clear:left; margin-right:2px; width:35%;" />
                   <p style="padding:0px 7px;">
                   		<?php echo "<strong>Video Title:</strong> <br>".@$defaultvideo['video_title'][0];  ?>
                     <br>
                     	<?php  echo "<strong>Description:</strong> <br>". @$defaultvideo['video_desc'][0]; ?>
                   </p>
                </div>   
          </div>
                
                


<div style="margin-left:15px;"> 
	<a id="android_device" href='javascript:void(0)'>&nbsp;&nbsp; &nbsp;Android Devices</a>  |   
    <a id="ipad_device" href='javascript:void(0)'>iPads/iPhones</a>    |        
    <a id="bb_device" href='javascript:void(0)'>BlackBerry Devices</a>   
</div>
          </div><!--end 12 cols-->
      
     </div><!--end row-->
     
     <?php        
	 
	 
	 ?>
     <div class="row">
     
     	<div class="twelve columns" id="related-videos-thumbnail"  style="height:auto; color:#B3B3B3;">

			<?php 
				for($i=0; $i<count($videos['id']); $i++){
			?>
        	<div class="two columns" style="text-align:center; height:auto; border:solid 7px #383838; margin-top:5px; height:160px; margin-bottom:5px;">
            	<a href="/churchmember/videos/index/<?php echo @$videos['video_code'][$i];   ?>/<?php echo date('d', @$videos['video_code'][$i])  ?>/<?php  echo date('m',@$videos['video_code'][$i]);  ?>/<?php echo date('Y', @$videos['video_code'][$i]);   ?>">
                   <!-- <div class="cls-img" style="height:70px; width:60%; clear:both;">-->
                   
                   		<?php
							
							//$thumb = new Thumbnailmanager();
							$thumb->__initialise('./'.@$videos['video_thumbnail_url'][$i]);
							$thumb->size_width(200);
							$thumb->size_height(200);
							$thumb->process();
							$thumb->save('./'.@$videos['video_thumbnail_url'][$i]);
						
						?>
               <img src="<?php echo "/".@$videos['video_thumbnail_url'][$i];   ?>"  style="width:70%; border:none; margin-top:10px;"  align="absmiddle"/>
        <!--</div>-->
                	<br>
					<!--<div class="cls-img-title" style="height:50px; width:100%;">-->
                    	<span><?php echo @$videos['video_title'][$i];  ?></span>
                    <!--</div>-->
                
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
                	<div class="twelve columns" style="border:solid 1px #1D66A6; margin-bottom:5px;">
                    		
                           <div class="latest-videos-mnu-header" style="height:30px; line-height:28px; background-color:#1D66A6; margin-bottom:5px; color:#FFF;">
                                <span style="padding:0px 10px; font-weight:bolder">Latest Videos</span>
                            </div>
                            <?php
								for($k=0; $k<count(@$videos['id']); $k++):
									if((@$videos['video_category'][$k] != "featured") and (time()-@$videos['video_code'][$k])<(60*60*24*4))	{
										
							?>
                            <div class="two columns" style="">

<?php
							
							
							$thumb->__initialise('./'.@$videos['video_thumbnail_url'][$k]);
							$thumb->size_width(200);
							$thumb->size_height(200);
							$thumb->process();
							$thumb->save('./'.@$videos['video_thumbnail_url'][$k]);
						
						?>
                                
                                <a href="/churchmember/videos/index/<?php echo @$videos['video_code'][$k];   ?>/<?php echo date('d', @$videos['video_code'][$k])  ?>/<?php  echo date('m',@$videos['video_code'][$k]);  ?>/<?php echo date('Y', @$videos['video_code'][$k]);   ?>">

                                	<img src='<?php echo "/".@$videos['video_thumbnail_url'][$k];   ?>' width='100' style="width:100px; clear:both;" align="absmiddle" />
                                	<br>
                                    <span style="padding:0px 7px;"><?php echo @$videos['video_title'][$k];  ?></span>
                                </a>
                            
                            </div>
                         	<?php
									}
								endfor;
							?>

                    </div><!--end 12 cols-->
            	</div><!--end row-->
                
                
                 <div class="row" id="video-comment-section">
     
                  <div class="twelve columns" id="video-comment-form">
                            <form action="/comments/add" method="post" name="frmcomments" id="frmcomments" class="upload" onSubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback})">
                            
                           <div class="info" id="post_result_msg" style="padding:5px 10px;">
                               Please post your comment
                           </div>
                                
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                   <tr>
                                     <td align="left" valign="top"><strong>Comment</strong>:
                                     <br><textarea name="comments" id="comments" style="width:100%;" placeholder="Your comment body here" required></textarea></td>
                                   </tr>
                                   <tr>
                                     <td align="left" valign="top"><input type="submit" name="buttonPostComment" id="buttonPostComment" value="Post Comment" />
                                     <input name="seenform" type="hidden" id="seenform" value="postcomment" />
                                     <input name="contentID" type="hidden" value="<?php echo @$defaultvideo['video_code'][0];   ?>">
                                     </td>
                                   </tr>
                                </table>
                           
                </form>
                    </div><!--end 12 cols-->
                 </div><!--end row-->
                 
                 <!--all comments posted based on selected video-->
                 
                 <div class="row video-comment-content">
                 	<div class="twelve columns">
                    	
                        <?php
						
							if(count(@$commentInfo['id']) <= 1){
								
								echo "Comment (".count(@$commentInfo['id']).")";
								
							}else{
							
								echo "Comments (".count(@$commentInfo['id']).")";
								
							}
							
							
						
						?>
                        <hr>
                    </div>
                    
                    <?php
					
						for($a = 0; $a<count(@$commentInfo['id']); $a++){  
						
						//get profile pix
						$profile_pic = useraccount::getAttributeValue($arrdetail=array('profile_pic','id'), 'tbl_users', $arrfilter=array('id'=>@$commentInfo['comment_author_id'][$a]), 'profile_pic');

						$fname = useraccount::getAttributeValue($arrdetail=array('first_name','id'), 'tbl_users', $arrfilter=array('id'=>@$commentInfo['comment_author_id'][$a]), 'first_name');		
						
						$lname = useraccount::getAttributeValue($arrdetail=array('last_name','id'), 'tbl_users', $arrfilter=array('id'=>@$commentInfo['comment_author_id'][$a]), 'last_name');	

						$author_name = @$fname.' '.@$lname;

						
						$country = useraccount::getAttributeValue($arrdetail=array('country','id'), 'tbl_users', $arrfilter=array('id'=>@$commentInfo['comment_author_id'][$a]), 'country');						
							
					
					?>
                    <div class="twelve columns" style="border:solid 1px #C4CFD2;">
                    	 <div class="one column cls_author_pix">
                        	
                            <img src="<?php  echo @$profile_pic;  ?>" align="absmiddle" style="width:100%;"/>
                        </div>
                        
                        <div class="three columns">
                            <?php  echo @$author_name;  ?>
                        </div>
                        
                         <div class="eight columns">
                            <?php  echo @$country;  ?>&nbsp; | &nbsp; <?php  echo date('F j, Y, g:i A', @$commentInfo['time_posted'][$a]);  ?>
                        </div>
			<br>

&nbsp;&nbsp;<p style="text-align:justify; line-height:1.65em; padding:0px 7px; margin-left:7px;">
                         
                         	<?php
								
								echo @$commentInfo['comment'][$a];
							
							?>
                         	
                         </p>	
                        
                        
                    </div>
                    
                    <div class="twelve columns comment-body">
                    	 &nbsp;
                    </div>
                    
                    <?php  }  ?>
                    
                 </div><!--end comment row-->
                 
                 <!------------------------------------------------>
            	
                
                
            </div><!--end 8 cols-->
            
            
            <div class="three columns" id="rhs-content" style="font-size:11px; border:solid 1px #D2DADF;">
            
            	<div class="featured-video-mnu-header" style="width:100%; height:30px; line-height:28px; background-color:#DC995C; margin-bottom:5px;">
                	<span style="padding:0px 7px; font-weight:bolder;">Featured Videos</span>
                </div>
                <?php
					for($j=0; $j<count(@$videos['id']); $j++):
						if(@$videos['video_category'][$j]=="featured"){
				?>
                <div class="featured-videos" style="width:100%; height:auto; border-bottom:solid 1px #D2DADF; padding:0px 4px; ">
                	<a href="/churchmember/videos/index/<?php echo @$videos['video_code'][$j];   ?>/<?php echo date('d', @$videos['video_code'][$j])  ?>/<?php  echo date('m',@$videos['video_code'][$j]);  ?>/<?php echo date('Y', @$videos['video_code'][$j]);   ?>">

                	<div class="f-video-thumbnail" style="width:48%; float:left; margin-right:2px; margin-top:5px;">
                    	<img src="<?php  echo "/".@$videos['video_thumbnail_url'][$j];  ?>" />
                    </div>
                    
                  <div class="f-video-thumbnail-desc" style="width:48%; float:right; margin-left:1px;">
                    	<span style="padding:0px 7px;"><?php echo @$videos['video_desc'][$j];  ?></span>
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

