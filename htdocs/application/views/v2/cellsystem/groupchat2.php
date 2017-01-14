<?php include_once('layouts/page_head.php'); ?>
<?php include_once('layouts/more_scripts.php'); ?>
<link rel="stylesheet" href="<?php echo CUSTOM_BASE_URL  ?>/css/chat.css" type="text/css" />
<?php include_once('layouts/header.php'); ?>

<!-- #main-content -->
<section id="main-content" class="post">
	<!-- #blog -->
	<article id="blog" class="container" style="background-color:#fff; ">
		<div id="ajax-content" class="single-wrap">
			<div class="remove-if-ajax row">
				<div class="col-md-12 title-wrap">
					<h1 class="title-secondary">GROUP CHAT</h1>
					
				</div>
			</div>
			<div class="row">
    
			    <div class="col-md-12" style="margin-bottom:50px; font-size: 12px;">
				
				
					<div class="col-sm-3">
		                <section class="panel">
		                    <div class="panel-body" style="height:400px; overflow:scroll">
		                        <ul class="nav nav-pills nav-stacked labels-info " style="height:auto;">
		                            <li> <h4 style="font-weight:bolder;">CHAT MEMBERS</h4> </li>
		                            <?php  //$this->load->view('v2/cellsystem/grpchat-left-sidebar')  ?>
		                            
									<?php
										for($i=0; $i<count($onlinemembers['id']); $i++){
										
										$fname = $onlinemembers['first_name'][$i].' '.$onlinemembers['last_name'][$i];
										
										if($onlinemembers['is_online'][$i]==1){
									?>
									<li style="border-bottom:1px solid #eeeff0; height:auto;"> 
										<a href="" title="View detail"> 
											<i class="fa fa-comments-o text-success"></i>  
											<div style="margin-bottom:5px;padding:5px 5px; height:auto;">
												<img src="<?php echo $onlinemembers['profile_pic'][$i]  ?>" style="width:18%; float:left; clear:left;" align="absmiddle" />	
											<span style="padding:0px 10px; text-align:justify;"><?php echo $fname  ?></span>
										</div>
										</a>  
									</li>
									
									<?php
											}
										}
									?>
									
									
		                        </ul>
		                        
		                    </div>
		                </section>
            		</div>
            		
            		
            		<div class="col-sm-9">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case"> Chat Conversation:</h4>
                    </header>
                    <div class="panel-body ">

                        <div class="view-mail">
                           <div class=" form">
							
								<form class="cmxform form-horizontal " id="frmchat" method="post" action="">
									
									<div id="chg-profile-msg-div" class=""></div>
									
									
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3"></label>
                                        <div class="col-lg-6">
											<div class="refresh  text input" id="" style="width:98%;border:solid 1px #ddd; height:250px;  overflow:scroll"></div>
                                           
                                        </div>
                                    </div>
									
									<div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Message Here:</label>
                                        <div class="col-lg-6">											 
											 <input class="text input" type="text" placeholder="" name="chatmsg" id="chatmsg" style="width:98%; " />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-info" type="submit" id="cmd_post_chatmsg">Send Message</button>
                                        </div>
                                    </div>
                                </form>
						
                            </div>
                        </div>
                    </div>
                    
                    
        </div>
		
	        
				</div>
			</div>

			
		</div>
	</article>
	<!-- /#blog -->
</section>
<!-- /#main-content -->
<script src="<?php echo CUSTOM_BASE_URL  ?>/js/jquery-1.8.2.min.js"></script>
<script src="/v2_assets/v2_js/jquery.js"></script>
<script src="/v2_assets/v2_js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/v2_assets/v2_js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/v2_assets/v2_js/jquery.scrollTo.min.js"></script>
<script src="/v2_assets/v2_js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="/v2_assets/v2_js/jquery.nicescroll.js"></script>

<!--common script init for all pages-->
<script src="/v2_assets/v2_js/scripts.js"></script>
<script src="/v2_assets/v2_js/jquery-1.9.0.min.js"></script>


<script language="javascript" src="<?php echo CUSTOM_BASE_URL  ?>/js/jquery.timers-1.0.0.js"></script>

<script type="text/javascript">
/////////////////////////////////////////////////

function get_chat_messages(){
	
	alert(1); return false;
	
	//refresh the chat page
	$(".refresh").everyTime(400,function(i){
			$.ajax({
			  url: "<?php echo CUSTOM_BASE_URL  ?>/cellsystem/getchatmessages",
			  cache: false,
			  success: function(strdata){
			  	alert(strdata); return false;
				$(".refresh").html(strdata);
			  }
			});
	});
}//end function


function post_chat_messages(){

	//alert(1); return false;
	$.ajax({
			 type: "POST",
				   url:	"/cellsystem/postchatmessages",
				   data: $('#frmchat').serialize(),
				   success:	function(e){
						 
						 $('.refresh').css({color:"green"});
						 $('#chatmsg').attr('value', '');
					  	 
				   } //end function success

	});//end ajax
	
}//end function




$(document).ready(function(){

	//alert(1); return false;
	
	get_chat_messages();

	return false;
});  //end document ready

$('#cmd_start_chat').click(function(){
		
	start_chat_session();
	return false;
		
});  //end click event
	

$('#cmd_post_chatmsg').click(function(){
		
		post_chat_messages();
		return false;
		
});  //end click event

//////////////////////////////////////////////	
</script>


<script>
	
$(document).ready(function(){

	
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
<?php include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
