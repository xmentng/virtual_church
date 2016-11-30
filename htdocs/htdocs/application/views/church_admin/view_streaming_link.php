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

    <div class="messageWr"  style=" padding:5px 0; width:650px">
	<code class="_id_page_description" style="font-size:16px; border:none; color:#480000">
          <strong>Kindly find below streaming links for various devices</strong>
    </code>
    <form action="" method="post" name="frmpost"  id="this-form">
   		
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><span style="font-size:1.0625em; font-weight:bolder;">Stream Url </span></td>
            <td><span style="font-size:1.0625em; font-weight:bolder;">IPAD </span></td>
            <td><span style="font-size:1.0625em; font-weight:bolder;">ANDROID </span></td>
            <td><span style="font-size:1.0625em; font-weight:bolder;">BLACKBERRY </span></td>
          </tr>
         
          <tr>
      		<td><span style="font-size:1.0625em;"><?php   echo $church_detail['stream_url'][0];  ?> </span></td>
            <td><span style="font-size:1.0625em;"><?php   echo $church_detail['ipad'][0];  ?> </span></td>
             <td><span style="font-size:1.0625em;"><?php   echo $church_detail['android'][0];  ?> </span></td>
              <td><span style="font-size:1.0625em;"><?php   echo $church_detail['blackberry'][0];  ?> </span></td>
  
          </tr>
        </table>

        
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
	
	$('#buttons').click(function(){
		
		$.post('/postmanager/create_church_user_account/', $('#this-form').serialize(), function(e){
		//alert(e);return false;
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
				$('#this-form')[0].reset();
			}//end if
		
		});	
		
		return false;
	});
	
	return false;
});

</script>    
    
<!--END OF CONTENT-->


  </body>
</html>
