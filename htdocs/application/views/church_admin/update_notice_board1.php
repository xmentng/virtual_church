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
          <strong><?php echo @$data['page_desc'];   ?></strong>
    </code>
    
    <form action="" method="post" name="frmpost"  id="this-form">
    <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
    <em style="font-size:11px; margin-bottom:10px;">*Required</em>
    <br>
    <br>
    <ul>
        <li class="field"><input class="text input" type="text" placeholder="Title" name="title" id="title" /><span style="font-size:10px; color:#F00">*</span></li>
        <li class="field"><textarea class=" textarea input" name="content_body" cols="" rows="6" placeholder="Type / Post your content Here"></textarea><span style="font-size:10px; color:#F00">*</span></li>
        
        <li class="field">
        	<input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="Update Notice Board" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"><input name="content_type_id" id="content_type_id" type="hidden" value="3"></li>
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
	
	$('#buttons').click(function(){
		
		$.post('/postmanager/update_notice_board_content/', $('#this-form').serialize(), function(e){
		alert(e);return false;
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
