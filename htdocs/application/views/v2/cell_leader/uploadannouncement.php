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
									
									<div class="col-md-12" id="post_result_msg_cell">
                       	   					Please fill the form below.
                      				 </div>
									
									
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Meeting Title</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control"  name="acmentTitle" id="acmentTitle" minlength="2" type="text"  required />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Meeting Title</label>
                                        <div class="col-lg-6">
                                            <textarea class="text input"  placeholder="" name="acmentBody" id="acmentBody" style="width:75%; min-height:250px;" ></textarea>
                                        </div>
                                    </div>
									
									
                                    
                                    	
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-info" type="submit" name="cmdclick" id="cmdclick">Submit</button>
                                           
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
<script type="text/javascript" src="/js/paginate.js"></script>

<script>
	
$(document).ready(function(){


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

	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state


 
</script>
<?php //include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
