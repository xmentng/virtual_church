<?php include_once('layouts/page_head.php'); ?>

<?php include_once('layouts/more_scripts.php'); ?>
<link rel="stylesheet" href="/css/chat.css" type="text/css" />
<?php include_once('layouts/header.php'); ?>

<!-- #main-content -->
<section id="main-content" class="post">
	<!-- #blog -->
	<article id="blog" class="container" style="background-color:#fff; ">
		<div id="ajax-content" class="single-wrap">
			<div class="remove-if-ajax row">
				<div class="col-md-12 title-wrap">
					<h1 class="title-secondary"> <?php  echo @$data['page_name'];  ?></h1>
					
				</div>
			</div>
			<div class="row">
    
			    <div class="col-md-12" style="margin-bottom:50px; font-size: 12.7px;">
				
					<div class="col-md-12" style="">
						
						<?php $this->load->view('v2/cell_leader/admin_sidebar') ?>
    
						
					</div>
					
					
	
				</div>
       
	    		<div class="col-md-12">
	    			
	    			<div class="col-md-3" style="margin-bottom: 5px;">
	    				
	    				<div class="header" style="list-style-type: none; width: 100%; padding: 0px 6px;">
	    					
	    					<li id="mnu-header" style="height: 30px; line-height: 30px; background-color: #EDEDF9; color: #333; list-style-type: none; ">
	    						Cell Register Menu
	    					</li>
	    					
	    					<li id="mnu-item" style="height: 27px; line-height: 27px; border-bottom: dotted 1px #EDEDF9;">
	    						<a href="/cellleader/managecellsystem/10/cell-register">
	    							
	    							<span>Cell Register</span>
	    						</a>
	    						
	    						
	    						
	    					</li>
	    					
	    					<li id="mnu-item" style="height: 27px; line-height: 27px;border-bottom: dotted 1px #EDEDF9;">
	    						<a href="/cellleader/managecellsystem/9/view-cell-register">
	    						<span>View Cell Meeting Attendances</span>
	    						</a>
	    					</li>

	    				</div>
	    				
	    			</div>
	    			
	    			
	    			<div class="col-md-9" style="margin-bottom: 5px;">
	    				
	    			<div style="font-size:12px;" class="info col-md-9"><?php  echo $data['info_msg'];  ?></div>
                        	
					 <p style="line-height:1.8125em; text-align:justify; font-size:11.8px;">
                    	
                        
					  
  
                      <form action="" method="post" name="frmreport">
          
                            <?php
								
							
							if(count(@$cellmemberInfo['id']) > 0){
									
									$sn =0;	
		
									
							?>
							
							
                            <div class="row">
                            	<div class="col-md-9" style="background-color:#6681A2; color:#fff; margin-bottom:5px;">
                                	<div class="col-md-1">
                                    	<span style="padding:0px 5px;">
                                        S|N
                                        </span>
                                 	</div>
                                    
                                    <div class="col-md-3">
                                    	<span style="padding:0px 5px;">
                                        Name
                                        </span>
                                    </div>
                                    
                                    <div class="col-md-4">
                                    	<span style="padding:0px 5px;">
                                        E-mail
                                        </span>
                                    </div>
                                    
                                    <div class="col-md-4">
                                    	<span style="padding:0px 5px;">
										Country
                                        </span>
                                    </div>

                                </div>
                            </div>	
                            
                            <?php   
	
									for($i=0; $i<count(@$cellmemberInfo['id']); $i++){ 
										
											$fname = useraccount::getAttributeValue(array('id', 'first_name', 'last_name'), 'tbl_users', array('id'=>$cellmemberInfo['cell_member_id'][$i]), $retval='first_name');
											
											$lname = useraccount::getAttributeValue(array('id', 'first_name', 'last_name'), 'tbl_users', array('id'=>$cellmemberInfo['cell_member_id'][$i]), $retval='last_name');
											
											$str_fullname = $fname.' '.$lname;
											
											$email = useraccount::getAttributeValue(array('id', 'email'), 'tbl_users', array('id'=>$cellmemberInfo['cell_member_id'][$i]), $retval='email');
											
											$country = useraccount::getAttributeValue(array('id', 'country'), 'tbl_users', array('id'=>$cellmemberInfo['cell_member_id'][$i]), $retval='country');
										
							?>
                            	
                              <div class="row">
                            	<div class="col-md-9" style="border-bottom: solid 1px #BBC6D0;">
                                	<div class="col-md-1">
                                    	<span style="padding:0px 5px;">
                                        <?php  echo ++$sn;  ?>
                                        </span>
                                 </div>
                                    
                                 
                                    
                                    <div class="col-md-3">
										
										<span style="padding:0px 5px; text-align:center;">
                                        <?php  echo $str_fullname;  ?>
                                        </span>
										
                                    </div>
                                    
                                    <div class="col-md-4" style="text-align:center;">
                                    	<span style="padding:0px 5px; text-align:center;">
                                        <?php  echo $email;  ?>
                                        </span>
                                    </div>
									
									
									<div class="col-md-4" style="text-align:center;">
                                    	<span style="padding:0px 5px; text-align:center;">
                                        <?php  echo $country ;  ?>
                                        </span>
                                    </div>
       
                                </div>
                            </div>	
                            
                            <?php 
										}
					
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
		
	        
			</div>
		</div>


	</article>
	<!-- /#blog -->
</section>
<!-- /#main-content -->
<script src="<?php echo CUSTOM_BASE_URL  ?>/js/jquery-1.8.2.min.js"></script>
<script>
	
	$(document).ready(function(){

		$(".cls_create_cell").hide();
		$(".cls_view_cell").hide();
		$(".cls_cell_ol").hide();
		$(".cls_cell_meeting").hide();
			
		
		
		
		
		///////////////////////////////////////////////////
$('#cmdclick').click(function(e){
		
		
		e.preventDefault();
		
		$.ajax({
			   type: "POST",
			   		url:	"/cellleader/createcellmember",
					data:	$('#frmpost').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass("alert alert-danger");
								$('#post_result_msg').addClass("alert alert-success");
								$('#post_result_msg').html(sp[1]);
								
								$('html, body').animate({scrollTop:0}, 'slow');
				
							}//end if
							
							if(sp[0] == "success"){
						
								$('#post_result_msg').removeClass("error");
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').html(sp[1]);
								$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
							}//end if
						
					},//end function success
					
					beforeSend:	function(){
						
						$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
						$('#post_result_msg').removeClass('alert alert-danger');
						$('#post_result_msg').removeClass('alert alert-success');
					}//end function
		});//end ajax	
		
	
	return false;
	
});
		
	
	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state


 
</script>
<?php //include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
