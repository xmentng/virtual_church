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
					<h1 class="title-secondary">Scheduled Meetings</h1>
					
				</div>
			</div>
			<div class="row">
    
		    <div class="col-md-12" style="margin-bottom:50px; font-size: 12px;">
			
			
				<div class="mail-sender">
										<div class="row" class="alert alert-danger">
											<p style="padding:0px 10px;">Below are lists of Scheduled Cell Meetings</p>
										</div>
										<div class="row" style="background-color:#32323A; color:#fff; font-weight:bolder; heighgt:30px; line-height:30px;">
											<div class="col-md-1">
												<p class="serialno"> S/NO</p>
											</div>
											<div class="col-md-3">
												<p class="meeting_title"> 
													Meeting Title	
												</p>
											</div>
											<div class="col-md-2">
												<p class="meeting_start_time"> 
													Start Time	
												</p>
											</div>
											
											<div class="col-md-3">
												<p class="meeting_end_time"> 
													End Time	
												</p>
											</div>
											
											<div class="col-md-2">
												<p class="meeting_status"> 
													Status	
												</p>
											</div>
											
											<div class="col-md-1">
												<p class="meeting_status"> 
													Action	
												</p>
											</div>
	
										</div>
									<?php
										$int_nrecords = count($meetingInfo['id']);
										$sn = 0;
										for($i = 0; $i < $int_nrecords; $i++):
										
										$int_start_time = $meetingInfo['meeting_time'][$i];
										$int_end_time = $meetingInfo['meeting_time'][$i] + $meetingInfo['meeting_duration'][$i];
										
									?>
										<div class="row   cls_row_values" style="font-size: 12px;">
											<div class="col-md-1">
												<p class="serialno"><?php echo $sn +=1;  ?></p>
											</div>
											<div class="col-md-3">
												<p class="meeting_title"> 
													<?php echo strip_tags($meetingInfo['meeting_title'][$i]);  ?>	
												</p>
											</div>
											<div class="col-md-2">
												<p class="meeting_start_time"> 
													<?php echo date('d/m/Y h:i:s A', $meetingInfo['meeting_time'][$i]);  ?>	
												</p>
											</div>
											
											<div class="col-md-3">
												<p class="meeting_end_time"> 
													<?php echo date('d/m/Y h:i:s A', $int_end_time);  ?>	
												</p>
											</div>
											
											<div class="col-md-2">
												<p class="meeting_status"> 
												<?php
													
													if($meetingInfo['is_live'][$i]==1){
														echo "Meeting is Live";
													}
													
													if($meetingInfo['is_live'][$i]==0){
														echo "Past Meeting";
													}
													
													if($meetingInfo['is_live'][$i]==3){
														echo "Suspended Mode";
													}

												?>		
												</p>
											</div>
											
											
											<div class="col-md-1">
												<p class="meeting_status"> 
												<?php
													
													if($meetingInfo['is_live'][$i]==1){
														echo "<a href='/cellsystem/attendmeeting'>Attend</a>";
													}
													
													

												?>		
												</p>
											</div>
											
										</div>
									<?php
										endfor;
												
									?>			
									</div>
    
	
        
			</div>
			</div>

			
		</div>
	</article>
	<!-- /#blog -->
</section>
<!-- /#main-content -->
<script src="<?php echo CUSTOM_BASE_URL  ?>js/jquery-1.8.2.min.js"></script>
<script>
	
	$(document).ready(function(){

	$('.cls_row_values').css('border-bottom', 'dotted 1px #d3d3d3');
	
	$('.cls_row_values:even').css('background-color', '#d3d3d3');
	
	$('.cls_row_values:even').addClass('alert  alert-success');
	
	//$('.cls_row_values:odd').addClass('alert  alert-danger');
	
	//////////// buttons click events ////////////
		//1.
		$('#btn-personal-info').click(function(e){
		
			e.preventDefault();
			call_update_personalInfo();
			return false;
		
		});
		
		
		//2.
		$('#btnchgpwd').click(function(e){
								 
			e.preventDefault();
			call_changePassword();
			return false;
		});
		
		
		
	
	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state


 
</script>
<?php //include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
