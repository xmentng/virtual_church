<?php $this->load->view('vw_header');  ?>

<script src="/js/jquery-1.9.1.js"></script>
  <script src="/js/jquery-ui-1-10-4.js"></script>

<script type="text/javascript"> 

///////////////////////////////////////////////////


//////////////////////////////////////////////////
			function startCallback() {
				// make something useful before submit (onStart)
				$('#divLoading').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
				return true;
			}
 
			function completeCallback(resp) {
				// make something useful after (onComplete)
				var response = $.parseJSON(resp);
				if(response.status){
						$('#divLoading').html(response.message);
						$('#divLoading').removeClass('error');
						$('#divLoading').addClass('success');
				}
				else{
						//alert($('#divLoading').html());
						$('#divLoading').html(response.error);
						$('#divLoading').removeClass('success');
						$('#divLoading').addClass('error');
								
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

 </div><!--end row-->
 
 <div class="row">
 		<div class="twelve columns" style="font-size:11px;">
        		
                <div class="three columns">
                   <div class="navbasr" style="border:solid 1px #70819C; font-size:11.8px;">
                        <?php  $this->load->view('videos/vod_side_bar');  ?>
                   </div>
                </div>
                
                <div class="nine columns">
                	

                    
                    <p style="line-height:1.8125em; text-align:justify; font-size:11.8px;">
                    	
                        <code style="font-size:11px;" id="post_result_msg"><?php echo $data['info_msg'];  ?></code>
                        <hr style=" border-color:#F00;">
  
                      <form action="" method="post" name="frmcomment" id="frmcomment">
                      
     
                            <?php
								//var_dump($attendanceInfo);
								
								//if($data['posted']){
									
									if(count(@$comment['id']) > 0){
										$sn =0;
									
							?>
                            <div class="row">
                            	<div class="twelve columns">
                                    <div class="two columns">
					<?php

						$video_pix = useraccount::getAttributeValue($detail=array('video_thumbnail_url', 'video_code'), $tbl="tbl_videos", $where=array('video_code'=>$comment['video_post_id'][0]), $retval="video_thumbnail_url");

					?>
                    	<img src="<?php  if($video_pix){echo "/".$video_pix;}else{ echo "/".CUSTOM_DEFAULT_VIDEO_THUMB;  }  ?>" style="width:100%;" />
                                    
                                    </div>
                                    
                                    <div class="ten columns">
                                    	<strong>Title: </strong><span><?php  echo useraccount::getAttributeValue($detail=array('video_title', 'video_code'), $tbl="tbl_videos", $where=array('video_code'=>$comment['video_post_id'][0]), $retval="video_title");  ?></span>
<br>


<strong>Description: </strong>
<br>
<span><?php  echo useraccount::getAttributeValue($detail=array('video_desc', 'video_code'), $tbl="tbl_videos", $where=array('video_code'=>$comment['video_post_id'][0]), $retval="video_desc");  ?></span>
<br>


                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="twelve columns" style="background-color:#6681A2; color:#FFF;">
                                	<div class="one column">
                                    	<span style="padding:0px 5px;">
                                        	S|No.
                                        </span>
                                    </div>
                                 
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">
                                        Comment Author
                                        </span>
                                    </div>
                                    
                                    <div class="four columns">
                                    	<span style="padding:0px 5px;">
                                        Comment
                                        </span>
                                    </div>
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">Comment Date</span>
                                    
                                    </div>

				   <div class="one column">
                                    	<span style="padding:0px 5px;">
                                        	Status
                                        </span>
                                    </div>
    
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">
                                        	Action
                                        </span>
                                    </div>
    
                                </div>
                            </div>	
                            
                            <?php   
							
								for($i=0; $i<count($comment['id']); $i++):  
								//get comment author name:
								$fname = useraccount::getAttributeValue($detail=array('id', 'first_name'), $tbl="tbl_users", array('id'=>$comment['comment_author_id'][$i]), $retVal="first_name");
								$lname = useraccount::getAttributeValue($detail=array('id', 'last_name'), $tbl="tbl_users", array('id'=>$comment['comment_author_id'][$i]), $retVal="last_name");
								
								//$videotitle = useraccount::getAttributeValue($detail=array('video_title', 'video_code'), $tbl="tbl_videos", $where=array('video_code'=>$comment['video_post_id'][$i]), $retval="video_title");
							
							?>
                            	
                                 <div class="row">
                            	<div class="twelve columns" style="border-bottom:dashed 1px #6681A2">
                                	<div class="one column">
                                    	<span style="padding:0px 5px;">
                                        	<?php  echo ++$sn;  ?>
                                        </span>
                                    </div>
                        
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">
                                        	<?php  echo $fname.' '.$lname;  ?>
                                        </span>
                                    </div>
                                    
                                   
                                    
                                    <div class="four columns">
                                    	
                                    	<span style="padding:0px 5px;">
                                        	<?php  echo $comment['comment'][$i];  ?>
                                        </span>
                                       
                                    </div>
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px">
                                        	<?php echo date('d/m/Y g:i A', $comment['time_posted'][$i]); ?>
                                        </span>
                                    </div>

<div class="one column">
                                    	
                                        <span style="padding:0px 5px;">
                                        	<?php  echo $comment['approved'][$i];  ?>
                                        </span>
                                        
                                    </div>
         
                                    
                                    
                                    
                                    <div class="two columns">
                                    	<a href="javascript:void(0)" onClick="<?php if($comment['approved'][$i]==0){ ?>javascript:approveComment('<?php echo $comment['id'][$i];   ?>')<?php }else{  ?>javascript:disapproveComment('<?php echo $comment['id'][$i];   ?>')<?php  } ?>">
                                        <span style="padding:0px 5px;">
                                        	<?php
                                            	
												if($comment['approved'][$i]==1):
													echo "Disapprove";
												endif;
												
												if($comment['approved'][$i]==0){
													echo "Approve";	
												}
											
											?>
                                        </span>
                                        </a>
                                    </div>
         
         
                                </div>
                            </div>	
                            
                            <?php   endfor; ?>
                            
                          <!-- <div class="row" style="margin-top:5%;">
                            	<div class="three columns" style="">
                                	<a style="text-align:center" href="javascript:void(0)" onClick="javascript:exportToExcel('<?php //echo $this->session->userdata('service_time');   ?>', '<?php //echo $page_res['church_id'];  ?>')">
                                    <span style="text-align:center; padding:0px 5px;">Export to Excel</span></a>
                                </div>
                            </div>-->
                            
                            
                            <?php  }else{ ?>
                            
                            <div class="row">
                            	<div class="nine columns">
                                 No record found.
                                </div>
                            </div>  
                            
                            <?php   }?>  
                      
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

function approveComment(param){
	
	//alert(param); 
	$('#post_result_msg').addClass('info');
	$('#post_result_msg').removeClass('success');
	$('#post_result_msg').removeClass('error');
	$('#post_result_msg').html('<img src="/images/loading.gif" />&nbsp; Please wait...');
	$.ajax({
		   
		   type:	"POST",
		   		url:	"/comments/approve/" + param,
				data:	$('#frmcomment').serialize(),
				success:	function(resp){
					
					//alert(resp); return false;
					
					var response = $.parseJSON(resp);
					
					if(response.status){
						
						$('#post_result_msg').addClass('success');
						$('#post_result_msg').removeClass('error');
						$('#post_result_msg').html('<img src="/images/success_small.png" />' + response.message);
						
						document.location="/comments/view_selected_vod_comments/<?php echo $comment['video_post_id'][0];   ?>/<?php echo date('m', $comment['video_post_id'][0]);  ?>/<?php  echo date('d', $comment['video_post_id'][0]);  ?>/<?php  echo date('Y',$comment['video_post_id'][0]);   ?>";
					}//end if
					
				}//end function success
		   
		   
		   
	});  //end ajax
	
}//end function

function disapproveComment(param){
	
	
$('#post_result_msg').addClass('info');
	$('#post_result_msg').removeClass('success');
	$('#post_result_msg').removeClass('error');
	$('#post_result_msg').html('<img src="/images/loading.gif" />&nbsp; Please wait...');
	$.ajax({
		   
		   type:	"POST",
		   		url:	"/comments/disapprove/" + param,
				data:	$('#frmcomment').serialize(),
				success:	function(resp){
					
					//alert(resp); return false;
					
					var response = $.parseJSON(resp);
					
					if(response.status){
						
						$('#post_result_msg').addClass('success');
						$('#post_result_msg').removeClass('error');
						$('#post_result_msg').html('<img src="/images/success_small.png" />' + response.message);
						
						document.location="/comments/view_selected_vod_comments/<?php echo $comment['video_post_id'][0];   ?>/<?php echo date('m', $comment['video_post_id'][0]);  ?>/<?php  echo date('d', $comment['video_post_id'][0]);  ?>/<?php  echo date('Y',$comment['video_post_id'][0]);   ?>";
					}//end if
					
				}//end function success
		   
		   
		   
	});  //end ajax

	
}//end function


</script>




  </body>
</html>
