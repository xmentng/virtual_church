<?php $this->load->view('vw_header');  ?>
<body class="whitebg">
<style>

.cls_testifier_name_country   span{
	padding:4px 8px;
	text-transform:capitalize;
}

</style>
<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
               <?php $this->load->view("church_member/page_name_welcome_user");   ?>
              
          </div><!--end class greybar-->
      
      
   	  </div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#E8E8E8;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="cls_landing_page_content">
            	
                <div class="35perc_col_content" style="width:35%; float:left;">
                	
                	<div class="cls_sidebar" style="width:100%; float:left; margin:0 auto">
                        <div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
                
                            <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                                <span style="padding:0px 10px; font-size:1.0625em; font-weight:bolder;">Testimony Menu</span>
                          </div>
                            
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="#" style="color: #000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; My Testimonies</span></a>
                            </li>
                            
                          
                    </div>
            	 </div><!--end class sidebar-->
     			
            	</div><!--end class 35perc_col_content-->
                
                
                <div class="65perc_col_content" style="width:65%; float:right;">
                	
                    <div class="cls_actual_content" style="width:100%; height:auto;  border:solid 1px #8C8C8C; margin-top:4%; ">
                    	
					
                        
                        <div class="cls_frm_section" style="text-align:justify; line-height:1.56em; padding:0px 7px;">
                        
                       		
                            <form method="post" id="frmtestimony" name="frmtestimony">
                            	<code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
                            	
                                <div class="cls_share_testimony">
                                	<input type="text" name="watermark" id="watermark"  placeholder="Share Your Testimony" style="width:80%; min-height:60px; border:solid 1px #4F4F4F; padding:0px 5px;" />
                                    
                                    <input name="church_id" id="church_id" type="hidden" value="<?php echo $page_res['church_id'];   ?>">
                                    <input name="user_name" id="user_name" type="hidden" value="<?php echo $page_res['logged_in_account'];   ?>">
                                    <input name="cmdshare_test" id="cmdshare_test" type="submit" style="width:12%;" value="Share">
                                    
                                </div>
                                <?php
									
										for($i=0; $i<$data['n_testimonies']; $i++):
									
									?>
                               
                               <div class="cls_user_testimonies" style="margin-top:7px; background-color: #E0E0E0; ">
                                	
                                	<div class="cls_testifier_pic" style="width:10%; float:left; ">
                                    	<img src="<?php echo $arrTestifiers['profile_pic'][$i];   ?>" style="width:100%;" />
                                    </div>
                                    
                                    <div class="cls_testifier_name_country" style="width:90%; float:left; ">
                                    	
                                        <div class="cls_testifieer_name" style="width:40%; float:left;">
                                        	<span><?php  echo $arrTestifiers['first_name'][$i]." ".$arrTestifiers['last_name'][$i];   ?></span>
                                            <br>
											<span><?php  echo "Comments";   ?></span>&nbsp;&nbsp;
                                            <a id="<?php  echo $testimony['id'][$i];   ?>" class="cls_post_comment" href="javascript:void();"><span><em>Post Comment</em></span></a>
                                            <!--<br>
											<span><?php  //echo "Likes";   ?></span>&nbsp;&nbsp;<span><?php  //echo "Unikes";   ?></span>-->
                                        </div>
                                        
                                        <div class="cls_testifieer_country" style="width:30%; float:left;">
                                        	<span><?php   if($arrTestifiers['country'][$i])echo $arrTestifiers['country'][$i];  ?></span>
                                        </div>
                                        
                                        
                                        
                                        <div class="cls_testifieer_test_time" style="width:30%; float:left;">
                                        	<span><?php   echo date(" F j, Y ", @$testimony['time_posted'][$i]);  ?></span>
                                        </div>
                                        
                                        <div style="clear:both;"></div>
                                        
                                    </div><!--end class cls_testifier_name_country-->
                                    <div style="clear:both;"></div>
                                    <form id="frmpostcomment" name="frmpostcomment" method="post">
                                    <div class="cls_testifier_testimony">
                                    	<p style="text-align:justify; line-height:1.57em; padding:0px 7px;"><?php   echo $testimony['test_body'][$i];  ?></p>
                                        
                                        <div class="cls_testimony_comment" style="margin-left:120px;" id="id_testimony_comment_<?php echo $testimony['id'][$i];   ?>">
                                    		<div class="cls_posted_comments" style="width:100%; ">
                                            
                                            	position for posted comments
                                            </div>
                                            
                                            
                                            <div class="cls_testifier_pic_2" style="width:10%; float:left; margin-right:7px; ">
                                    			<img src="<?php echo $page_res['profile_pic'];   ?>" style="width:100%;" />
                               			    </div>
                                            <div class="cls_testifier_comment_2" style="width:90%; float:left; ">
                                    			<input type="text" name="test_comment_<?php echo $testimony['id'][$i];   ?>" id="test_comment"  style="width:70%; min-height:60px; border:solid 1px #4F4F4F; padding:0px 5px;" placeholder="Post Comment" />	
                                                <input name="church_id" id="church_id" type="hidden" value="<?php echo $page_res['church_id'];   ?>">
                                    			<input name="user_name" id="user_name" type="hidden" value="<?php echo $page_res['logged_in_account'];   ?>">
                                     
                                                <input name="cmdpostcomment" class="cls_cmdpostcomment" type="submit" value="Comment">
                                   			 </div>
                                             <div style="clear:both"></div>
                                    	</div><!--end cls_testimony_comment-->
                                                                       </form>
                                    
                                    <div style="clear:both;"></div>
                                  </div>
                                
                      			</div>
                           
                                
                                  <?php  
										endfor;
									?>

				 				 </div>
                            </form>
                            
                           
              </div>
                        	
           </div>
      </div><!--end class 65perc_col_content-->
                
                <div class=" clearfix"></div>
            	
  </div>
          
    	 <!--end class landing page--><!--end class row-->

<div class=" clearfix"></div>

<!--FOOTER-->
<div class="main_footer2">
<?php  $this->load->view('vw_footer');  ?>
</div>


<script type="text/javascript">



$(document).ready(function(){


/////////////////////////////////////////////////////////

$('.cls_testimony_comment').hide();

//////////////////////////////////////////////////////////
var id = 0;
$('.cls_post_comment').click(function(){							  
	id = $(this).attr('id');
	$('#id_testimony_comment_' + id ).show();
});

//////////////////////////////////////////////////////////
	$('.cls_cmdpostcomment').click(function(){
		
		//alert(1); return false;
		$.ajax({
			 type: "POST",
				   url:	"/churchmember/post_testimony_comment/" + id,
				   data: $('#frmpostcomment').serialize(),
				   success:	function(e){
					   alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmtestimony')[0].reset();
								document.location="/churchmember/testimony";
								
								
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
	});
///////////////////////////////////////////////////////////
	$('#cmdshare_test').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/churchmember/share_testimony",
				   data: $('#frmtestimony').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmtestimony')[0].reset();
								document.location="/churchmember/testimony";
								
								
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
	
///////////////////////////////////////////////////////	
	return false;	
						   
});

</script>



<!--END OF CONTENT-->



  </body>
</html>

