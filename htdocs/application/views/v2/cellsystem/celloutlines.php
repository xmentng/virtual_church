
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
					<h1 class="title-secondary">Cell Outlines</h1>
					
				</div>
			</div>
			<div class="row">
    
		    <div class="col-md-12" style="margin-bottom:50px; font-size: 12.7px;">
			
				<?php
									//for help lines
									//$int_nhelp_lines = count($help_line_info['id']);
									//if($int_nhelp_lines > 0){
									//	echo '<span style="font-weight:bolder; font-size:14px;">Help Lines:</span><br> ';
									//	for($j = 0; $j < $int_nhelp_lines; $j++):
								
								?>
								
										<span style="font-size:14px;"><?php // echo $help_line_info['help_line'][$j];   ?></span><br> 
								
								<?php
										//endfor;
										//}
								?>
								
								
									<div class="mail-sender">
										<div class="row" class="alert alert-danger">
											<p style="padding:0px 10px;">Below are list of cell outlines</p>
										</div>
										<div class="row" style="background-color:#32323A; color:#fff; font-weight:bolder; heighgt:25px; line-height:25px;">
											<div class="col-md-1">
												<p class="serialno"> S/NO</p>
											</div>
											<div class="col-md-6">
												<p class="celloutline"> 
													Cell Outline
												</p>
											</div>
											<div class="col-md-4">
												<p class="date" style="float:center;"> Date</p>
											</div>
										</div>
									<?php
										$int_nrecords = count($celloutlineInfo['id']);
										$sn = 0;
										for($i = 0; $i < $int_nrecords; $i++):
									?>
										<div class="row  cls_row_values" style="font-size: 11px; border-bottom: dooted 1px #d3d3d3; color: #000;">
											<div class="col-md-1">
												<p class="serialno"> <?php echo $sn +=1;   ?></p>
											</div>
											<div class="col-md-6">
												<p class="celloutline"> 
													<a title="View Cell Outline" href="<?php echo CUSTOM_BASE_URL."/".$celloutlineInfo['cell_outline_url'][$i];   ?>">
														Cell outline - <?php echo date('d/m/Y', $celloutlineInfo['time_posted'][$i]);   ?>
													</a>
												</p>
											</div>
											<div class="col-md-4">
												<p class="date"> <?php echo date('l, j F, Y', $celloutlineInfo['time_posted'][$i]);   ?></p>
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
<script src="<?php echo CUSTOM_BASE_URL  ?>/js/jquery-1.8.2.min.js"></script>
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
