
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
					<h1 class="title-secondary">No Scheduled Meetings</h1>
					
				</div>
			</div>
			<div class="row">
    
		    <div class="col-md-12" style="margin-bottom:50px; font-size: 12.7px;">
			
			
				<p><?php echo @$data['msg']  ?> </p>
    
	
        
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
