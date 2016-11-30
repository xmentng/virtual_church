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
						$('#frmvideo')[0].reset();
				}
				else{
						//alert($('#post_result_msg').html());
						$('#post_result_msg').html('<img src="/images/invalid_small.png" align="absmiddle" />' + response.error);
						$('#post_result_msg').removeClass('success');
						$('#post_result_msg').addClass('error');
								
				}			
							
			}
		</script> 

<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
<title>Line Break (Shift + Enter)</title>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('church_admin/vw_headmast'); ?>

<!--NAVIGATION -->

<?php $this->load->view('vw_horizontal_nav'); ?>
  
  

<!--CONTENT-->
<div class="container content_wr">
<div class=" row rowbg">
<!--main content top-->
  <div class="twelve columns"> 
       <!--main Content-->
       <div class="Inner_content"> 
           <!--<h2>Profile on Pastor Chris</h2>-->
          <!-- <img src="images/innercity.jpg">-->
           <div class="clearfix"></div>
            <?php $this->load->view('vw_welcome_user'); ?>
           <hr>
          
      <!--FORM-->
       </div>

 </div>
  <!-- MENU-LOCATION=NONE -->
</div><!--end row-->
 
 <div class="row">
 		<div class="twelve columns" style="font-size:0.875em;">
        		
                <div class="three columns">
                   <div class="navbasr" style="border:solid 1px #70819C; font-size:11.8px;">
                        <?php  $this->load->view('videos/vod_side_bar');  ?>
                   </div>
                </div>
                
                <div class="nine columns" style="border:solid 1px #70819C;  padding:0px 15px;">
          
                    
                  <p style="line-height:1.8125em; text-align:justify; font-size:11.8px;">
                    	
                        
                  <form action="" method="post" name="frmvideo" id="frmvideo">
                       	
                   	   <code class="info" id="post_result_msg">
                       	   <?php  echo @$data['info_msg'];  ?>
                       </code>

			<div class="wrapper-panel">     
<table width="100%" cellpadding="3" cellspacing="0" id="contentTbl">

  <tr>
	<td>
  	
    <div class="row">
    	<div class="twelve columns">
        
        	<div class="row twelve columns table-headers" style="background-color:#8E9BB3; color:#FFF; margin-bottom:5px;">
            
                    <div class="one column sn" style="margin-right:2px;">
                        <span style="padding:0px 7px;">S/N</span>
                    </div>
           
        
                    <div class="three columns vod_name" style="margin-right:6px;">
                        <span style="padding:0px 7px;">Title</span>
                    </div>	 
        
                	<div class="one column vod_name" style="margin-right:6px;">
                        <span style="padding:0px 7px;">Picture</span>
                    </div>
                    
                    <div class="one column vod" style="margin-right:6px;">
                    	<span style="padding:0px 7px;">Status</span>
                    </div>
    
              		<div class="three columns vod_name" style="margin-right:6px;">
                        <span style="padding:0px 7px;">Approve</span>
                    </div>	
        
            		<div class="two columns vod_name" style="margin-right:6px; margin-left:4px;">
                        <span style="padding:0px 7px;">Disapprove</span>
                    </div>				
		</div><!--end table-header-->
        <br>

<?php
			if(count(@$videoInfo['id'])>0){
				$sno = 0;	
				for($i=0; $i<count(@$videoInfo['id']); $i++):
			
		?>
		<div class="row twelve columns table-column-values" style="margin-bottom:3px;">
            
                    <div class="one column sn" style="margin-right:2px;">
                        <span style="padding:0px 7px;"><?php  echo ++$sno;  ?></span>
                    </div>
        
        
                    <div class="three columns vod_name" style="margin-right:6px;">
                        <span style="padding:0px 7px;"><?php  echo @$videoInfo['video_title'][$i];  ?></span>
                    </div>	 
        
                	<div class="one column  vod_name" style="margin-right:6px;">
                        <span style="padding:0px 7px;"><img src="<?php  if(@$videoInfo['video_thumbnail_url'][$i]){echo "/".@$videoInfo['video_thumbnail_url'][$i];}else{ echo CUSTOM_BASE_URL."/".CUSTOM_DEFAULT_VIDEO_THUMB; }  ?>" style="width:100%;" /></span>
                    </div>
                    
                    <div class="one column vod" style="margin-right:6px;">
                    
                    	<span style="padding:0px 7px"><?php echo @$videoInfo['approved'][$i];  ?></span>
                    
                    </div>
        
          
        
              		<div class="three columns vod_name" style="margin-right:6px;">
                        <span style="padding:0px 7px;"><a onClick="javascript:approveVideo('<?php  echo @$videoInfo['id'][$i];  ?>')" class="pretty btn primary  cls_approve" id="<?php echo @$videoInfo['id'][$i];  ?>" href="javascript:void(0)" style="padding:0px 7px; color:#FFF;">&nbsp;&nbsp;Approve&nbsp;&nbsp;</a></span>
                    </div>	
        
            		<div class="two columns  vod_name" style="margin-right:6px; margin-left:4px;">
                        <a onClick="javascript:disapproveVideo('<?php  echo @$videoInfo['id'][$i];    ?>')" style="color:#FFF;" class="pretty btn primary  cls_disapprove" id="<?php echo @$videoInfo['id'][$i];   ?>" href="javascript:void(0)"><span style="padding:0px 7px;">&nbsp;Disapprove&nbsp;</span></a>
                    </div>				
		</div><!--end table-header-->
        
        <?php
				endfor;
			}else{
		
		?>
        <div class="row twelve columns table-column-values">
        
        	<p style="padding:0px 7px;">
            	You don't have any video to approve.
            </p>
        </div>
        
        <?php
			}
		?>

	       
        </div>
    
    
    </div>
  
  	</td>
    
   </tr> 
 

       
</table>

</div>
   <?php  if(count(@$videoInfo['id']) > 0 ){  ?>
   <?php   }  ?>
                  </form>
                    
                  </p>
                    
                    
                </div>
               
        
        </div>
        
        
 </div><!--end row-->
 


</div><!--end class container-->

<!--FOOTER-->
<div class="main_footer2">
<?php  $this->load->view('vw_footer');  ?>
</div>
<script type="text/javascript" src="/js/paginate.js"></script>

<script type="text/javascript">


function approveVideo(param){
	
	//alert(param); return false;
	$('#post_result_msg').removeClass('success');
	$('#post_result_msg').removeClass('error');
	$('#post_result_msg').html('<img src="/images/loading.gif" />&nbsp;Please wait...');
	
	$.ajax({
		   
		   type:"POST",
		     url:"/videos/approve_selected_video/" + param,
			 data:$('#frmvideo').serialize(),
			 success: function(resp){
				 	 //alert(resp); return false;
				 	 var response = $.parseJSON(resp);
					 
					 if(response.status){
						
						$('#post_result_msg').addClass('success');
						$('#post_result_msg').removeClass('error');
						$('#post_result_msg').html(response.message);
						
						document.location="/videos/approvevideos";
						 
					 }
			 }
		   
		   
	});//end ajax
	
}//end function


function disapproveVideo(param){
	
	//alert(param); return false;
	$('#post_result_msg').removeClass('success');
	$('#post_result_msg').removeClass('error');
	$('#post_result_msg').html('<img src="/images/loading.gif" />&nbsp;Please wait...');
	
	$.ajax({
		   
		   type:"POST",
		     url:"/videos/disapprove_selected_video/" + param,
			 data:$('#frmvideo').serialize(),
			 success: function(resp){
				 	 //alert(resp); return false;
				 	 var response = $.parseJSON(resp);
					 
					 if(response.status){
						
						$('#post_result_msg').addClass('success');
						$('#post_result_msg').removeClass('error');
						$('#post_result_msg').html(response.message);
						
						document.location="/videos/approvevideos";
						 
					 }
			 }
		   
		   
	});//end ajax
	
}//end function

/////////////////////////////////////////////////////
var selid;
$(document).ready(function(){

///////////////////////////////////////////////////


///////////////////////////////////////////////////
$('#cmdScheduleMeeting').click(function(e){
		
		
		e.preventDefault();
		$('#post_result_msg_cmeeting').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$('#post_result_msg_cmeeting').removeClass('error');
		$('#post_result_msg_cmeeting').removeClass('success');
		$.ajax({
   				type: "POST",
   				url: "/churchadmin/schedulemeeting/",
   				data: $('#frmmeeting').serialize(),
   				success: function(resp){
    					 	var response = $.parseJSON(resp);
							
							if(response.status){
								$('#post_result_msg_cmeeting').html(response.message);
								$('#post_result_msg_cmeeting').removeClass('error');
								$('#post_result_msg_cmeeting').addClass('success');
							}
							else{
								//alert($('#post_result_msg').html());
								$('#post_result_msg_cmeeting').html(response.error);
								$('#post_result_msg_cmeeting').removeClass('success');
								$('#post_result_msg_cmeeting').addClass('error');
								
							}
							$("#frmmeeting :input").attr("disabled", false);
   						}
 		});
		//disable all form fields
		$("#formChangePassword :input").attr("disabled", true);
	
	
	return false;
	
});

/////////////////////////////////////////////////////
	

return false;
}); //end ready
	
	
	

</script>





  </body>
</html>
