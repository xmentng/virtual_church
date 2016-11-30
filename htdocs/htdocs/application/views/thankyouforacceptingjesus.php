<?php $this->load->view('vw_header');  ?>




<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
<title>Table</title>
<body class="whitebg">

<!--HEADER-->


<div id="header">
<!--<div class="cls_banner">

</div>-->
<div class="container">
<div class="row">
<div class="twelve columns">


<div id="header_logo" class="cls_banner" style="height:auto;">
     <img src="<?php echo CUSTOM_BASE_URL."/user_res/banners/banner2.png";   ?>"  alt="logo"  style=";" />
</div>

</div></div>
</div></div>
<!--NAVIGATION -->

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
            <h4>Christ Embassy Virtual Church Portal.</h4>
          <hr>
          
      <!--FORM-->
       </div>

 </div>

 </div><!--end row-->
 
 <div class="row">
 		<div class="twelve columns" style="font-size:0.875em;">
<br>
<br>
 

 
                <img src="/images/success_small.png"  />&nbsp;<?php echo @$page_name; ?>
               
        
        </div>
        
        
 </div><!--end row-->
 


</div><!--end class container-->

<!--FOOTER-->
<div class="main_footer2" style="bottom:0; position:fixed;">
<?php  $this->load->view('vw_footer');  ?>
</div>
<script type="text/javascript" src="/js/paginate.js"></script>




<script type="text/javascript"> 
			function startCallback() {
				// make something useful before submit (onStart)
				
				$('#post_result_msg').removeClass("success");
				$('#post_result_msg').removeClass("error");
				$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
				return true;
			}
 
			function completeCallback(resp) {
				// make something useful after (onComplete)
				var response = $.parseJSON(resp);
				if(response.status){
						$('#post_result_msg').html('<img src="/images/success_small.png" align="absmiddle" />' + response.message);
						$('#post_result_msg').removeClass('error');
						$('#post_result_msg').addClass('success');
						$('#frmvideo')[0].reset();
				}
				else{
						//alert($('#post_result_msg').html());
						$('#post_result_msg').html('<img src="/images/invalid_small.png" align="absmiddle" />' + response.error);
						$('#post_result_msg').removeClass('success');
						$('#post_result_msg').addClass('error');
								
				}			
							
			}


$(document).ready(function(){
						   
	$('#buttons').click(function(e){
								 
		e.preventDefault();
		$('#post_result_msg').removeClass("success");
		$('#post_result_msg').removeClass("error");
		$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$.ajax({
			   
			type:	"POST",
			url:	"/registration/process",
			data:	$('#frmpost').serialize(),
			success:	function(resp){
				
				//alert(resp); return false;
				
				var response = $.parseJSON(resp);
				if(response.status){
						$('#post_result_msg').html('<img src="/images/success_small.png" align="absmiddle" />' + response.message);
						$('#post_result_msg').removeClass('error');
						$('#post_result_msg').addClass('success');
						$('#frmpost')[0].reset();
				}
				else{
						//alert($('#post_result_msg').html());
						$('#post_result_msg').html('<img src="/images/invalid_small.png" align="absmiddle" />' + response.message);
						$('#post_result_msg').removeClass('success');
						$('#post_result_msg').addClass('error');
								
				}		
				
			}//end success
			   
			   
		});
								 
								 
								 
	});//end click event					   
						   
						   
	return false;					   
						   
});  	


</script> 


  </body>
</html>
