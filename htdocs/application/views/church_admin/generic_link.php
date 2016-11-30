<?php $this->load->view('vw_header'); ?>

<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('church_admin/vw_headmast'); ?>

<!--NAVIGATION -->

<?php $this->load->view('vw_horizontal_nav'); ?>

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
	<?php $this->load->view('vw_welcome_user'); ?>
  <hr>

    <div class="messageWr"  style=" padding:5px 0; width:100%">

    
    <form action="" method="post" name="frmadd"  id="frmadd">
   <?php
   			
						
  	//if(@$data['flag_msg_status']=='info')echo '<code id="post_result_msg" class="info">'.@$data['info_msg'].'</code>';
  
   ?>
   

    <!--<em style="font-size:11px; margin-bottom:10px;">*Required</em>-->

    <ul>
    	
        <!--<li class="field">
        	<span style="font-size:0.75em;">Service Theme | Title:</span>
        	<input class="text input" type="text" placeholder="Service Theme" name="service_theme" id="service_theme" value="" />
        	<span style="font-size:10px; color:#F00">*</span>
        </li>-->
    
    	<li class="field">
        	<span style="font-size:0.75em;">Generated Invite Link:</span>
        	<input class="text input" type="text" placeholder="Generic Link" name="invite_link" id="invite_link" value="" readonly />
        	<span style="font-size:10px; color:#F00">*</span>
        </li>
        
        
       
        
        <li class="field">
        	
            <input name="church_id" id="church_id" type="hidden" value="<?php  echo @$data['church_id'];   ?>">
        	<input name="service_year" id="service_year" type="hidden" value="<?php  echo @$data['year'];   ?>">
            <input name="service_month" id="service_month" type="hidden" value="<?php  echo @$data['month'];   ?>">
            <input name="service_day" id="service_day" type="hidden" value="<?php  echo @$data['day'];   ?>">
            
            <input name="church_name" id="church_name" type="hidden" value="<?php  echo @$data['church_name'];   ?>">
            <input name="submit_btn" id="submit_btn" class="pretty medium primary btn" type="submit" value="&nbsp;Generate &nbsp;"  style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;">
        </li>
    </ul>
    </form>
    
    </div>

 
 <div class="clearfix"></div>
 
 </div>
 </div>
 </div>
 </div>
      <div class=" clearfix"></div>

<!--FOOTER-->
<div class="main_footer2">

<?php  $this->load->view('vw_footer');  ?>
</div>
<script type="text/javascript">

$(document).ready(function(){
						   
  //////////////////////////////////////////////////////////////
  
  $('#submit_btn').click(function(){
								//  alert(1);
	  $.ajax({
			 type: "POST",
				   url:	"/postmanager/generate_link/",
				   data: $('#frmadd').serialize(),
				   success:	function(e){
					  // alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								/*$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmadd')[0].reset();*/
								
								$('#invite_link').attr('value', sp[1]);
								
								
							}//end if
							
							
					  	
				   } //end function success

		});//end ajax
	  return false;								
  }); //end click event
	  
	  
  ////////////////////////////////////
  
  
  
  return false;

	
});

</script>    
    
<!--END OF CONTENT-->


  </body>
</html>
