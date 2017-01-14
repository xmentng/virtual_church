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
                   <div class="navbasr" style="border:solid 1px #70819C; font-size:11.8px; height:400px; overflow:scroll">
                        <ul>
                        
                        	<!--Service Attendance Report-->
                            
                            <li class="id_mnu_header" style="background-color:#70819C; color:#FFF;">
                            	<span style="padding:0px 10px;">Group Chat Members</span>
                            </li>
                            
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
                
                <div class="nine columns" style="border:solid 1px #70819C;  padding:0px 15px;">
          
                    
                  <p style="line-height:1.8125em; text-align:justify; font-size:11.8px;">
                    	
                        
					  <code style="font-size:12px;" class="info" id="chat-info">Group Chat Conversation</code>
                        
  
                      <form action="" method="post" name="frmchat"  id="frmchat">
          
							
							
                            <div class="row">
                            	<div class="twelve columns" style="">
                                	
									<ul>
									<li class="field"><br>
								<!--<textarea class="text input"  placeholder="" name="acmentBody" id="acmentBody" style="width:90%; min-height:150px;" ></textarea></li>-->
								<div class="refresh  text input" id="" style="width:95%; height:250px; overflow:scroll"></div>
								
								<li class="field">Chat Messages:<br>
										<input class="text input" type="text" placeholder="" name="chatmsg" id="chatmsg" style="width:90%;" /></li>
										<input name="submit" type="submit" value="&nbsp;Start New Chat&nbsp;" id="cmd_start_chat" class="pretty medium primary btn" />
										<input name="submit" type="submit" value="&nbsp;Send Message&nbsp;" id="cmd_post_chatmsg" class="pretty medium primary btn" />
										<!--<input name="submit" type="submit" value="&nbsp;End Chat&nbsp;" id="cmd_end_chat" class="pretty medium primary btn" />-->
									</ul>
                                </div>
                            </div>	

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
<script language="javascript" src="/js/jquery.timers-1.0.0.js"></script> 
<script type="text/javascript" src="/js/paginate.js"></script>

<script type="text/javascript">

/////////////////////////////////////////////////////


function get_chat_messages(){
	
	
	//refresh the chat page
	$(".refresh").everyTime(400,function(i){
			$.ajax({
			  url: "/cellleader/getchatmessages",
			  cache: false,
			  success: function(strdata){
				$(".refresh").html(strdata);
			  }
			});
	});
}//end function


function post_chat_messages(){

	
	$.ajax({
			 type: "POST",
				   url:	"/cellleader/postchatmessages",
				   data: $('#frmchat').serialize(),
				   success:	function(e){
						 //alert(e);return false;
						 $('.refresh').css({color:"green"});
						 $('#chatmsg').attr('value', '');
					  	
						// get_chat_messages();
						 
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


//////////////////////////////////////////////////

</script>





  </body>
</html>
