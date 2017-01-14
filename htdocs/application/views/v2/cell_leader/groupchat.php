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
       
	    		<div class="col-md-12" style="font-size:0.875em;">
        		
                <div class="col-md-3">
                
                		<div class="id_mnu_header" style="background-color:#70819C; color:#FFF;">
                            	<span style="padding:0px 10px;">Chat Members</span>
                        </div>
               
                   <div class="navbasr" style="border:solid 1px #70819C; font-size:11.8px; height:400px; overflow:scroll">
                        <ul>
                        
                        	<!--Service Attendance Report-->
                            
                            
                            
							<?php
								for($i=0; $i<count($onlinemembers['id']); $i++){
								
								$fname = $onlinemembers['first_name'][$i].' '.$onlinemembers['last_name'][$i];
								
								if($onlinemembers['is_online'][$i]==1){
							?>
							
                            <li class="cls_mnu_content" >
                            	 <div style="margin-bottom:5px;padding:5px 5px;">
									<img src="<?php echo $onlinemembers['profile_pic'][$i]  ?>" style="width:20%; float:left; clear:left;" align="absmiddle" />	
									<span style="padding:0px 10px; text-align:justify;"><?php echo $fname  ?></span>
								</div>		
                            </li>
							<?php
									}
								}
							?>
							
				
                         
					</ul>
                  </div>
            </div>
                
                <div class="col-md-9" style="  padding:0px 15px;">
          
                    
                  <p style="line-height:1.8125em; text-align:justify; font-size:11.8px;">
                    	
                        
					  <div style="font-size:12px;" class="info" id="chat-info">Group Chat Conversation</div>
                        
  
                      <form action="" method="post" name="frmchat"  id="frmchat">
          
							
							
                            <div class="row">
                            	<div class="col-md-12" style="">
                                	
									
									<br>
								<!--<textarea class="text input"  placeholder="" name="acmentBody" id="acmentBody" style="width:90%; min-height:150px;" ></textarea></li>-->
								<div class="refresh  text input" id="" style="width:95%; height:250px; overflow:scroll; border:solid 1px #70819C; padding:2px 7px;"></div>
								
								Chat Messages:<br>
										<input class="text input" type="text" placeholder="" name="chatmsg" id="chatmsg" style="width:90%; margin-bottom: 10px;" />
										<br>
										<input name="submit" type="submit" value="&nbsp;Start Chat&nbsp;" id="cmd_start_chat" style="width:42%;" />
										<input name="submit" type="submit" value="&nbsp;Send Message&nbsp;" id="cmd_post_chatmsg" style="width:42%;" />
										
								
                                </div>
                            </div>	

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

<script language="javascript" src="<?php echo CUSTOM_BASE_URL  ?>/js/jquery.timers-1.0.0.js"></script>

<script type="text/javascript">
/////////////////////////////////////////////////

function get_chat_messages(){


			$.ajax({
				  url: "<?php echo CUSTOM_BASE_URL  ?>/cellleader/getchatmessages",
				  cache: false,
				  success: function(strdata){
				  	//alert(strdata); return false;
					$(".refresh").html(strdata);
				  },
				  beforeSend: function(){
				  	
				  	
				  },
				  error: function(){
				  	$(".refresh").html('Connection error!');
				  }
		
			});
}//end function


function post_chat_messages(){

	//alert(1); return false;
	$.ajax({
			 type: "POST",
				   url:	"/cellleader/postchatmessages",
				   data: $('#frmchat').serialize(),
				   
				   success:	function(e){
						 
						 $('.refresh').css({color:"green"});
						 $('#chatmsg').attr('value', '');
					  	 
				   } //end function success

	});//end ajax
	
}//end function

function start_chat_session(){

	$('#chat-info').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
	$('#chat-info').removeClass('error');
	$('#chat-info').removeClass('success');
		
	$.ajax({
		
		type: "POST",
			   		url:	"/cellleader/startchatsession",
					data:	$('#frmpost').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');

							if(sp[0] == "success"){
						
								$('#cmd_start_chat').hide();
								$('#chat-info').html(sp[1]);
								
							}//end if
						
					}//end function success
		
		
	
	});  //end ajax

}//end function


$(document).ready(function(){

	//alert(1); return false;
	
	setInterval('get_chat_messages()',600);

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





 
</script>


<
<?php //include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
