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
							
								<form  class="col-md-12  form-inline"  enctype="multipart/form-data" id="frmupload" name="frmupload" style="padding:3px 12px;" method="post">
								
											  <div class="col-lg-12" style="margin:5px 10px" align="center">
											  	
											  		<div id="chg-pic-msg-div"></div>
											 
													 <div class="input-prepend col-md-12">
														<label for="cpassword" class="control-label">Please Select PDF File:</label>
														<br>
														<span class="add-on"><i class="icon-upload"></i></span>  
														<input type="file" id="userfile" name="userfile">
														
													</div>
													
													 <div class="input-prepend col-md-12" style="margin:10px 10px">              
														<span class="col-md-8 form-span">
															 <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-primary">
													   </span>
													 </div>
											   </div>
											  
											 

								 <!-----ends row--!--->            
								
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
$('#frmupload').submit(function(){

	//alert(1); return false;
	
	$('#chg-pic-msg-div').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
	$('#chg-pic-msg-div').removeClass('alert alert-danger');
	$('#chg-pic-msg-div').removeClass('alert alert-success');
	$('#chg-pic-msg-div').addClass('info');
	
	 var formData = new FormData(document.getElementById("frmupload"));
	 
	$.ajax({
		
		url:"<?php echo CUSTOM_BASE_URL ?>" + "/cellleader/upload-cell-outline",	
		type:"POST",
		data: formData,
		processData: false,  // tell jQuery not to process the data
  		contentType: false,  // tell jQuery not to set contentType
		success: function(data){
				
				//alert(data); return false;
			
				var sp = data.split('|');
				
				if(sp[0] == 'success'){
				
					$('#chg-pic-msg-div').removeClass('info');
					$('#chg-pic-msg-div').removeClass('alert alert-danger');
					$('#chg-pic-msg-div').addClass('alert alert-success');
		
					$('#chg-pic-msg-div').html(sp[1]);
					document.location="/churchmember/profile";
				
				}//end if
			
			
				if(sp[0] == 'failure'){
				
					$('#chg-pic-msg-div').removeClass('info');
					$('#chg-pic-msg-div').removeClass('alert alert-success');
					$('#chg-pic-msg-div').addClass('alert alert-danger');
		
					$('#chg-pic-msg-div').html(sp[1]);
				
				
				}//end if
				
				
			}//end function success
		
	});	
	return false;	
		
});
 
 

</script>
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
