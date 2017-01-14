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
							
						   <code class="info" id="post_result_msg_cell">
							   Please fill the form below.
						   </code>
								
						<ul>
							<li class="field">Title:<br>
								<input class="text input" type="text" placeholder="" name="acmentTitle" id="acmentTitle" style="width:75%;" /></li>
							<li class="field">Announcement Content:<br>
								<textarea class="text input"  placeholder="" name="acmentBody" id="acmentBody" style="width:75%; min-height:250px;" ></textarea></li>
							<li class="field">
        	<input name="cmdclick" id="cmdclick" class="pretty medium primary btn" type="submit" value="&nbsp;Submit &nbsp;"  style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"></li>
						
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



	//////////////////////////////////////////////////

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

///////////////////////

return false;

});

//////////////////////////////////////////////////

</script>





  </body>
</html>
