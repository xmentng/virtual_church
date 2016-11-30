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
  	  <div class="twelve columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
               <?php $this->load->view("church_member/page_name_welcome_user");   ?>
              
          </div><!--end class greybar-->
      
      
   	  </div><!--end class nine columns-->
    </div>   <!--end row--> 
    
    
    <div class="row cls_landing_page" style="font-size:0.75em; height:60px; background: #FFF; width:100%;">
    
			<div class="row twelve columns" style="width:100%;background:#444;margin-bottom:0%;">
     	<?php  $this->load->view('maintab');    ?>
   	  </div><!--end class nine columns-->
    </div>   <!--end row--> 

    <div class="row" style="">
  	  <div class="twelve columns" style="width:100%;">
      		
               <div class="three columns" id="id_side_bar">
               
                    <div class="cls_menu">
                        <div class="cls_mnu_header" style="height:35px; background-color:#6C647D; color:#FFF; line-height:35px;">
                            <span style="padding:0px 10px;">Testimony Menu</span>
                        </div>
                        <ul>
                            <li><a href="javascript:void(0)"><span style="padding:0px 10px;">Testimonies</span></a></li>
                        </ul>
                    
                    </div>
                
               </div><!--end 3 columns--> 
               
               
               <div class="nine columns" id="id_right column" style="border:solid 1px #959DAC;">
    					
                        <form method="post" id="frmtestimony" name="frmtestimony" style="padding:0px 10px;">
                            	<code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg">
									<?php echo @$data['info_msg']; ?>
                                </code>
                            	
                                <div class="cls_share_testimony">
                                	<input type="text" name="watermark" id="watermark"  placeholder="Share Your Testimony" style="width:80%; min-height:60px; border:solid 1px #4F4F4F; padding:0px 5px;" />
                                    
                                    <input name="church_id" id="church_id" type="hidden" value="<?php echo $page_res['church_id'];   ?>">
                                    <input name="user_name" id="user_name" type="hidden" value="<?php echo $page_res['logged_in_account'];   ?>">
                                    <input name="cmdshare_test" id="cmdshare_test" type="submit" style="" value="&nbsp;Share&nbsp;">
                                    
                                </div>
                                
                         </form>
                          <?php 
						  		
		for($i=0; $i<$data['n_testimonies']; $i++): 
									
									
		 $fname = useraccount::getAttributeValue(array('user_name','first_name'), $tblname="tbl_users", $where=array('user_name'=>$testimony['user_name'][$i]), $retval="first_name");
		
		$lname = useraccount::getAttributeValue(array('user_name','last_name'), $tblname="tbl_users", $where=array('user_name'=>$testimony['user_name'][$i]), $retval="last_name");
		
		$profile_pic = useraccount::getAttributeValue(array('user_name','profile_pic'), $tblname="tbl_users", $where=array('user_name'=>$testimony['user_name'][$i]), $retval="profile_pic");
		
		$country = useraccount::getAttributeValue(array('user_name','country'), $tblname="tbl_users", $where=array('user_name'=>$testimony['user_name'][$i]), $retval="country");
		
		$test_id = intval($testimony['id'][$i]);
		
		$ncomments = useraccount::count_active_records($sql="select * from tbl_testimony_comments where test_id=\"$test_id\" ");
		
		//retrieve the comments on this testimony
		
		$testcomment = useraccount::loadDetails($tableName="tbl_testimony_comments",$arrFilter=array('test_id'=>$test_id, 'test_approved'=>1),$arrAttribute=array('id', 'test_id', 'church_id', 'user_name', 'test_comment_author', 'test_comment_country', 'test_comment', 'time_posted', 'test_approved'),$num=NULL,$orderBy='');
		
		//$ntestcomments = useraccount::count_active_records($sql="select * from tbl_testimony_comments where test_id=\"$test_id\" ");
						   ?>
                         <div class="row" style="font-size:0.75em; padding:0px 10px;">
                         	<div class="twelve columns">
                            
                            	<div class="two columns">
                                	<img src="<?php  echo $profile_pic ?>" style="width:45%" align="absmiddle"  />
                                </div>
                                
                                
                                <div class="two columns">
                                	<?php  echo $fname." ".$lname ?>
                                </div>
                                
                                <div class="two columns">
                                	<?php  echo $country ?>
                                </div>
                                
                                <div class="four columns">
                                	<?php  echo date("d-m-Y g:i:s A", $testimony['time_posted'][$i]) ?>
                                </div>
                            	
                            </div><!--end 12 columns-->
                         
                         </div>  <!--end row-->
                         
                         <div class="row" style="font-size:0.75em; background:#CBCED8;">
                         	<div class="twelve columns" style="padding:0px 10px;">
                            		<p style="padding:0px 7px; text-align:justify; line-height:1.56em;">
										<?php  echo $testimony['test_body'][$i] ?>
                                    </p>    
                            </div>
                            
                            <div class="twelve columns">
                            		comment(<?php echo @$ncomments; ?>)&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                    <a id="<?php  echo $testimony['id'][$i];   ?>" href="javascript:void(0)" class="cls_post_comment">Post Comment</a>&nbsp;&nbsp;&nbsp;
                            </div>
                            
                            
                            <div class="twelve columns   cls_testimony_comment_form"  style="margin-left:10%;" id="id_testimony_comment_<?php echo $testimony['id'][$i];   ?>">
                            	<?php
									for($j=0; $j<$ncomments; $j++):
									
									$profile_pic_1 = useraccount::getAttributeValue(array('user_name','profile_pic'), $tblname1="tbl_users", $where1=array('user_name'=>$testcomment['user_name'][$j]), $retval="profile_pic");
									
									$fname1 = useraccount::getAttributeValue(array('user_name','first_name'), $tblname1="tbl_users", $where=array('user_name'=>$testcomment['user_name'][$j]), $retval="first_name");
		
		$lname1 = useraccount::getAttributeValue(array('user_name','last_name'), $tblname="tbl_users", $where1=array('user_name'=>$testcomment['user_name'][$j]), $retval="last_name");
		
		$country1 = useraccount::getAttributeValue(array('user_name','country'), $tblname="tbl_users", $where1=array('user_name'=>$testcomment['user_name'][$j]), $retval="country");
								?>
                              <div class="row" style="">  
                            	<div class="two columns">
                                	<img src="<?php  echo $profile_pic_1; ?>" style="width:45%" align="absmiddle"  />
                                </div>
                                
                                
                                <div class="two columns">
                                	<?php  echo $fname1. " " .$lname1 ?>
                                </div>
                                
                                <div class="two columns">
                                	<?php  echo $country1 ?>
                                </div>
                                
                                <div class="four columns">
                                	<?php  echo date("d-m-Y h:i:s A", $testcomment['time_posted'][$j]) ?>
                                </div>
                                
                              </div>  <!--end class row-->
                              
                              <div class="row" style="">
                              	
                                <div class="eight columns">
                            		<p style="padding:0px 7px; text-align:justify; line-height:1.56em;">
										<?php  echo $testcomment['test_comment'][$j]; ?>
                                    </p>    
                            	</div>
                              
                              </div> <!--end class row-->
                            
                            	<?php endfor; ?>
                            
                            
                            <form id="frmpostcomment_<?php echo $testimony['id'][$i];   ?>" name="frmpostcomment" method="post">
                                    	
                                <input type="text" name="test_comment_<?php echo $testimony['id'][$i];   ?>" id="test_comment_<?php echo $testimony['id'][$i];   ?>"  style="width:70%; min-height:60px; border:solid 1px #4F4F4F; padding:0px 5px;" placeholder="Post Comment" />	
                                <input name="church_id" id="church_id" type="hidden" value="<?php echo $page_res['church_id'];   ?>">
                                <input name="user_name" id="user_name" type="hidden" value="<?php echo $page_res['logged_in_account'];   ?>">
                                <input name="test_id_<?php echo $testimony['id'][$i];   ?>" id="test_id_<?php echo $testimony['id'][$i];   ?>" type="hidden" value="<?php echo $testimony['id'][$i];   ?>">
                                <input name="cmdpostcomment" id="cmdpostcomment" class="cls_cmdpostcomment" type="submit" value="Comment">
                                    
                           </form>
                           </div>
                            
                            
                         
                   </div>
                        <?php endfor; ?> 
                          
                           
                             
                            
               </div><!--end 9 columns--> 
            
         </div><!--end 12 columns-->  
         
        </div>  <!--end row-->
            
   
    </div>   <!--end row--><!--end container-->

<!--FOOTER-->

<div class="main_footer2" style="bottom:0; position:fixed">
<?php  $this->load->view('vw_footer');  ?>
</div>




<script type="text/javascript">



$(document).ready(function(){


/////////////////////////////////////////////////////////

$('.cls_testimony_comment_form').hide();

//////////////////////////////////////////////////////////
var id = 0;
$('.cls_post_comment').click(function(){							  
	id = $(this).attr('id');
	//alert(id);
	$('#id_testimony_comment_' + id ).show();
});

//////////////////////////////////////////////////////////
	$('.cls_cmdpostcomment').click(function(){
		
		//alert(1); return false;
		$.ajax({
			 type: "POST",
				   url:	"/churchmember/post_testimony_comment/" + id,
				   data: $('#frmpostcomment_' + id).serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpostcomment_' + id)[0].reset();
								//$('#frmpostcomment_' + id)[0].reset();
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

