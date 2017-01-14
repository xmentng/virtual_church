<?php $this->load->view('vw_header');  ?>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
             <?php $this->load->view("church_member/page_name_welcome_user");   ?>
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="row cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="row twelve columns" style="width:100%;background:#444;margin-bottom:3%;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="row cls_landing_page_content">
            	
                <div class="three columns">
                	
                	<div class="cls_sidebar" style="width:100%; float:left; margin:2% auto; ">
                    <div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
                
                            <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                                <span style="padding:0px 10px; font-size:1.0625em; font-weight:bolder;">Statistics Menu</span>
                            </div>
                      			
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <span style="padding:0px 10px;">
                                   <?php
								   		if(count(@$invites['id'])>0){
											
											echo "Total Invites (".count(@$invites['id']).")";
											
										}else{
											
											echo "Total Invite (".count(@$invites['id']).")";
										}
								   
								   ?>
                                   </span>
                            </li>
							
							<li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <span style="padding:0px 10px;">
                                   <?php
								   		if(count(@$soulswon['id'])>0){
											
											echo "Total Souls Won (".count(@$soulswon['id']).")";
											
										}else{
											
											echo "Total Soul Won (".count(@$soulswon['id']).")";
										}
								   
								   ?>
                                   </span>
                            </li>
							
							<div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                                <span style="padding:0px 10px; font-size:1.0625em; font-weight:bolder;">Report</span>
                            </div>
							
							<li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="/salvationcall/invitesinfo">
								   <span style="padding:0px 10px;">
									 Invitees Information
                                   </span>
								   </a>
                            </li>
							
							<li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="/salvationcall/soulswoninfo">
								   <span style="padding:0px 10px;">
									 Souls won information
                                   </span>
								   </a>
                            </li>
                			
                            
                         
                    </div>
            	 </div><!--end class sidebar-->
     			
            	</div><!--end class 35perc_col_content-->
                
                
                <div class="nine columns">
                	
                    	<div class="cls_rsidebar" style="width:99%; float:left; margin:1% auto; padding:0px 6px; ">
                    	<div id="tabs-3" style=" border:solid 1px #CECECE;">
                            <div style="margin:0px 10px;">
                            <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg">
								<?php echo @$data['info_msg']; ?>
							</code>
                            <form id="frmpost" method="post" name="frmpost">
				 <div class="row">
                            	<div class="twelve columns" style="background-color:#6681A2; color:#FFF;">
                                	<div class="one column">
                                    	<span style="padding:0px 5px;">
                                        	S|No.
                                        </span>
                                    </div>
                                 
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">
											Name
                                        </span>
                                    </div>
                                    
                                    <div class="four columns">
                                    	<span style="padding:0px 5px;">
											E-mail
                                        </span>
                                    </div>
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">Country</span>
                                    
                                    </div>

				   <div class="two columns">
                                    	<span style="padding:0px 5px;">
                                        	Born Again
                                        </span>
                                    </div>
    
                                    
                                  
                                </div>
                            </div>	
							
                <?php   
					if(count($invites['id']) > 0){   
						$sn = 0;
						for($i=0; $i<count($soulswon['id']); $i++):
				?>
                	 <div class="row">
                            	<div class="twelve columns" style="border-bottom:dashed 1px #6681A2">
                                	<div class="one column">
                                    	<span style="padding:0px 5px;">
                                        	<?php  echo ++$sn;  ?>
                                        </span>
                                    </div>
                        
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px;">
                                        	<?php  echo @$soulswon['invite_name'][$i];  ?>
                                        </span>
                                    </div>
                                      
                                    <div class="four columns">
                                    	
                                    	<span style="padding:0px 5px;">
                                        	<?php  echo @$soulswon['invite_email'][$i];  ?>
                                        </span>
                                       
                                    </div>
                                    
                                    <div class="two columns">
                                    	<span style="padding:0px 5px">
                                        	<?php  echo @$soulswon['invite_country'][$i];  ?>
                                        </span>
                                    </div>

<div class="two columns">
                                    	
                                        <span style="padding:0px 5px;">
                                        	<?php  
												if(@$soulswon['accept_call'][$i]==1):
													echo "Yes";
												endif;
												if(@$soulswon['accept_call'][$i]==0):
													echo "No";
												endif;
											
											?>
                                        </span>
                                        
                                    </div>
         
                                    
                                  
         
         
                                </div>
                            </div>	
                    <?php  endfor; } ?>
                    </form>
                            </div>
                    	</div>
                        	
                
                </div><!--end class 65perc_col_content-->
                
                <div class=" clearfix"></div>
            	
           </div>
            <div class=" clearfix"></div>
    	 </div><!--end class landing page-->
    </div><!--end class row-->

    <div class=" clearfix"></div>
</div>
</div>

<!--FOOTER-->
<div class="main_footer2" style="bottom:0;">
<?php  $this->load->view('vw_footer');  ?>
</div>


<script type="text/javascript">


function sendSalvationMail(param){

//alert(param); return false;

$('#post_result_msg').removeClass("success");
$('#post_result_msg').removeClass("error");
$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');

$.ajax({
	
	type:	"POST",
	url:	"/emailsystem/resendSalvationcallMail/" + param,
	data:	$('#frmpost').serialize(),
	success:	function(e){
	
		var sp = e.split('|');
		if(sp[0]=="success"){
			
			$('#post_result_msg').addClass("success");
			$('#post_result_msg').removeClass("error");					
			$('#post_result_msg').html( sp[1]);

		}
	}//end function

}); //end ajax

}//end function



$(document).ready(function(){

//////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////
	$('#cmdclick').click(function(){
		//alert(1);return false;
		$('#post_result_msg').removeClass("success");
		$('#post_result_msg').removeClass("error");
		$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
								
		$.ajax({
			 type: "POST",
				   url:	"/churchmember/send_salvation_call",
				   data: $('#frmpost').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
								//document.location="/churchmember/edit_profile";
								
								
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass('success');
								$('#post_result_msg').addClass('error');
								$('#post_result_msg').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								
								
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event
	
///////////////////////////////////////////////////////	
	return false;	
						   
});

</script>



<!--END OF CONTENT-->



  </body>
</html>

