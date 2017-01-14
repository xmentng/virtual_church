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
                   <div class="navbasr" style="border:solid 1px #70819C; font-size:11.8px;">
                        <?php  $this->load->view('v2/cell_leader/side_bar');  ?>
                   </div>
                </div>
                
                <div class="nine columns" style="border:solid 1px #70819C;  padding:0px 15px;">
          
                    
                  <p style="line-height:1.8125em; text-align:justify; font-size:11.8px;">
                    	
                        
                  <form action="" method="post" name="frmpost" id="frmpost">
                       	
                   	   <code class="info" id="post_result_msg">
                       	   <?php echo @$data['info_msg'];  ?>
                       </code>
                       <ul>
							<li id="mtn-title" class="field">Meeting Title:<br>
								<input class="text input" type="text" placeholder="Enter Title" name="meeting_title" id="meeting_title" style="width:75%;" />
							</li>
							
							<li class="field" id="start_meeting">
        	<input name="cmdclick" id="cmdclick" class="pretty medium primary btn" type="submit" value="&nbsp;Start Live Meeting &nbsp;"  style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;">
			
			<input name="cmdclick2" id="cmdclick2" class="pretty medium primary btn" type="submit" value="&nbsp;End Live Meeting &nbsp;"  style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;">		
			</li>
			
			<li class="field" id="end_meeting">
        	</li>
							
						</ul>			
                        
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
<script type="text/javascript" src="/js/paginate.js"></script>

<script type="text/javascript">


/////////////////////////////////////////////////////
var selid;
$(document).ready(function(){

	$(".cls_create_cell").hide();
	$(".cls_view_cell").hide();
	$(".cls_cell_ol").hide();
	$(".cls_cell_meeting").hide();
	//$('#cmdclick2').hide();

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

/////////////////////////////////////////////////////
	

return false;
}); //end ready
	
	
	

</script>





  </body>
</html>
