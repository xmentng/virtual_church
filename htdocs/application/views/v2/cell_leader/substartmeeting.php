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
	    			
	    			<div class=" form">
							
								<form class="cmxform form-horizontal " id="frmpost" method="post" action="">
									
									<div class="col-md-12" id="post_result_msg">
                       	   					<?php echo @$data['info_msg'];  ?>
                      				 </div>
									
									
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Meeting Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control"  name="meeting_title" id="meeting_title" minlength="2" type="text"  required />
                                        </div>
                                    </div>
									
									
                                    
                                    	
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-info" type="submit" name="cmdclick" id="cmdclick">Start Live Meeting</button>
                                            <button class="btn btn-info" type="submit" name="cmdclick2" id="cmdclick2">End Live Meeting</button>
                                        </div>
                                    </div>
                                </form>
						
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
		$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$('#post_result_msg').removeClass('error');
		$('#post_result_msg').removeClass('success');
		$.ajax({
			   type: "POST",
			   		url:	"/cellleader/startmeeting",
					data:	$('#frmpost').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass("success");
								$('#post_result_msg').addClass("error");
								$('#post_result_msg').html(sp[1]);
								
								$('html, body').animate({scrollTop:0}, 'slow');
				
							}//end if
							
							if(sp[0] == "success"){
						
								$('#post_result_msg').removeClass("error");
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').html(sp[1]);
								$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
								
								//$('#cmdclick').attr('disabled', 'disabled');
								$('#cmdclick').hide();
								$('#mtn-title').hide();
								$('#cmdclick2').show();
							}//end if
						
					}//end function success
		});//end ajax	
		
	
	return false;
	
});


///////////////////////////////////////////////////
$('#cmdclick2').click(function(e){
		
		
		e.preventDefault();
		$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$('#post_result_msg').removeClass('error');
		$('#post_result_msg').removeClass('success');
		$.ajax({
			   type: "POST",
			   		url:	"/cellleader/endmeeting",
					data:	$('#frmpost').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass("success");
								$('#post_result_msg').addClass("error");
								$('#post_result_msg').html(sp[1]);
								
								$('html, body').animate({scrollTop:0}, 'slow');
				
							}//end if
							
							if(sp[0] == "success"){
						
								$('#post_result_msg').removeClass("error");
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').html(sp[1]);
								$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
								
								//$('#cmdclick').attr('disabled', 'disabled');
								$('#cmdclick2').show();
								$('#mtn-title').show();
								$('#cmdclick').show();
								document.location="/cellleader/managecellsystem/2/start-meetings";
							}//end if
						
					}//end function success
		});//end ajax	
		
	
	return false;
	
});
	
	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state


 
</script>
<?php //include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
