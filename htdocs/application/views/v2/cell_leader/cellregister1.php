<?php $this->load->view('vw_header');  ?>


<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
<body class="whitebg">

<!--HEADER-->
<?php //$this->load->view('church_admin/vw_headmast'); ?>

<!--NAVIGATION -->
<?php $this->load->view('vw_headmast'); ?>

<?php //$this->load->view('vw_horizontal_nav'); ?>
  
  

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
            <div class="greybar"><?php $this->load->view('church_member/page_name_welcome_user'); ?></div>
           <hr>
          
      <!--FORM-->

       </div>
	
 </div>

 </div><!--end row-->
 
 <div class="row">
 
	<div class="twelve columns">
	
			<div class="row twelve columns" style="width:100%;background:#444;margin-bottom:3%;">
		
            <?php  $this->load->view('v2/cell_leader/maintab');    ?>
				
        </div><!--end cls_maintab-->
	</div>
 
 </div>
 
 <div class="row">
 		<div class="twelve columns" style="font-size:0.875em;">
        		
                <div class="three columns">
                   <div class="navbasr" style="border:solid 1px #70819C; font-size:11.8px;">
                        <?php  $this->load->view('v2/cell_leader/side_bar');  ?>
                   </div>
                </div>
                
                <div class="nine columns" style="border:solid 1px #70819C;  padding:0px 15px;">
          
                    
                  <p style="line-height:1.8125em; text-align:justify; font-size:11.8px;">
                    	
                        
					  <code style="font-size:12px;" class="info"><?php  echo $data['info_msg'];  ?></code>
                        
  
                      <form action="" method="post" name="frmreport">
          
                            <?php
								
							//print_r($meetingInfo); exit;
							if(count(@$meetingInfo['id']) > 0){
									
									
								for($i=0; $i<count(@$meetingInfo['id']); $i++){ 
											
									$mtnid = $meetingInfo['id'][$i];
									
									//print_r($mtnid); exit;
									
									$arr_attendees = useraccount::loadDetails($tableName='tbl_meeting_attendance',array('meeting_id'=>$mtnid),array('id', 'user_id', 'day', 'month', 'year', 'time_joined', 'cell_id', 'meeting_id'),$num=NULL,$orderBy='');

									//print_r($arr_attendees); exit;
									
									if($arr_attendees['id'] > 0){
									
										$sn =0;
									
							?>
							<div class="row">
                            	<div class="twelve columns" style="background-color:#ddd; color:#000; margin-bottom:5px;">
                                	<div class="">
                                    	<span style="padding:0px 5px;">
											Meeting Title:   <?php echo $meetingInfo['meeting_title'][$i];  ?>
                                        </span>
										<br>
							
										<span style="padding:0px 5px;">
											Name of Cell Leader:  <?php echo $this->session->userdata('name_of_user');  ?>
                                        </span>
                                    </div>
                                    
                                   
                                </div>
                            </div>	
							
                            <div class="row">
                            	<div class="twelve columns" style="background-color:#6681A2; color:#FFF; margin-bottom:5px;">
                                	<div class="one column">
                                    	<span style="padding:0px 5px;">
                                        S|No.
                                        </span>
                                    </div>
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">
                                        Date
                                        </span>
                                    </div>
                                    
                                    <div class="four columns">
                                    	<span style="padding:0px 5px;">
                                        Time Joined
                                        </span>
                                    </div>
                                    
                                    <div class="five columns">
                                    	<span style="padding:0px 5px;">
										Name of Attendee
                                        </span>
                                    </div>

                                </div>
                            </div>	
                            
                            <?php   
	
										for($j =0; $j < count($arr_attendees['id']); $j++){
										
											$fname = useraccount::getAttributeValue(array('id', 'first_name', 'last_name'), 'tbl_users', array('id'=>$arr_attendees['user_id'][$j]), $retval='first_name');
											
											$lname = useraccount::getAttributeValue(array('id', 'first_name', 'last_name'), 'tbl_users', array('id'=>$arr_attendees['user_id'][$j]), $retval='last_name');
											
											$str_fullname = $fname.' '.$lname;
											
											$str_date = $arr_attendees['day'][$j].'-'.$arr_attendees['day'][$j].'-'.$arr_attendees['year'][$j];
											$time_joined = $arr_attendees['time_joined'][$j];
										
							?>
                            	
                              <div class="row">
                            	<div class="twelve columns" style="border-bottom: solid 1px #BBC6D0;">
                                	<div class="one column">
                                    	<span style="padding:0px 5px;">
                                        <?php  echo ++$sn;  ?>
                                        </span>
                                    </div>
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">
                                        <?php  echo $str_date ;  ?>
                                        </span>
                                    </div>
                                    
                                    <div class="4 columns">
										
										<span style="padding:0px 5px; text-align:center;">
                                        <?php  echo date('d-m-Y g:1 A', $time_joined);  ?>
                                        </span>
										
                                    </div>
                                    
                                    <div class="five columns" style="text-align:center;">
                                    	<span style="padding:0px 5px; text-align:center;">
                                        <?php  echo $str_fullname;  ?>
                                        </span>
                                    </div>
       
                                </div>
                            </div>	
                            
                            <?php 
										}
									}

								}

								//}
								
							?>
                            
                          
                            
                            <?php  }else{ ?>
                            
                            <div class="row">
                            	<div class="nine columns">
                                 You don't have any meeting scheduled.
                                </div>
                            </div>  
                            
                            <?php  } ?>  
                      
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


/////////////////////////////////////////////////////
var selid;
$(document).ready(function(){

	$(".cls_create_cell").hide();
	$(".cls_view_cell").hide();
	$(".cls_cell_ol").hide();
	$(".cls_cell_meeting").hide();



	//////////////////////////////////////////////////

$('#cmdclick').click(function(){
		//alert(1); return false;
		
		$('#post_result_msg_cell').removeClass('error');
		$('#post_result_msg_cell').removeClass('success');
		$('#post_result_msg_cell').addClass('info');
		$('#post_result_msg_cell').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$.ajax({
			   type: "POST",
			   		url:	"/cellleader/submitannouncement",
					data:	$('#frmpost').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							
							if(sp[0] == "success"){
						
								$('#post_result_msg_cell').removeClass("error");
								$('#post_result_msg_cell').addClass("success");
								$('#post_result_msg_cell').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
							}//end if
							
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg_cell').removeClass("success");
								$('#post_result_msg_cell').addClass("error");
								$('#post_result_msg_cell').html(sp[1]);
								
								//$('html, body').animate({scrollTop:0}, 'slow');
				
							}//end if
							
							
						
					}//end function success
		});//end ajax	
	
	
	return false;
	
});

///////////////////////

return false;

});

//////////////////////////////////////////////////

</script>





  </body>
</html>
