<?php $this->load->view('vw_header'); ?>

<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('central_admin/vw_headmast'); ?>

<!--NAVIGATION -->

<?php $this->load->view('central_admin/vw_horizontal_nav'); ?>

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
    <li class="field"><input class="text input" type="text" placeholder="User Name" name="usn" id="usn" value="<?php echo @$admin_user['user_name'][0];  ?>" /></li>
        <li class="field"><input class="text input" type="password" placeholder="Password" name="pwd" id="pwd" value="<?php echo @$admin_user['password'][0];  ?>" /></li>
        <li class="field"><input class="text input" type="text" placeholder="Cotact Email" name="email" id="email" value="<?php echo @$admin_user['email'][0];  ?>" /></li>

        <li class="field"><input class="text input" type="text" placeholder="Church Name" name="church_name" id="church_name" value="<?php echo @$admin_user['church_name'][0];  ?>" /></li>
        <li class="field"><input class="text input" type="text" placeholder="Stream Url" name="stream_url" id="stream_url" value="<?php echo @$admin_user['stream_url'][0];  ?>" /></li>
        <li class="field"><input class="text input" type="text" placeholder="iPad Stream" name="ipad_stream" id="ipad_stream" value="<?php echo @$admin_user['ipad'][0];  ?>" /></li>
        <li class="field"><input class="text input" type="text" placeholder="Blackberry Stream" name="bb_stream" id="bb_stream"  value="<?php echo @$admin_user['blackberry'][0];  ?>" /></li>
        <li class="field"><input class="text input" type="text" placeholder="Android Stream" name="droid_stream" id="droid_stream" value="<?php echo @$admin_user['android'][0];  ?>" /></li>
         <!--<li class="field">
           <textarea name="news" class="textarea input" id="news" placeholder="News"><?php #echo @$admin_user['news'][0];  ?></textarea>
         </li>
          <li class="field"><input class="text input" type="text" placeholder="Title" name="title" id="title" value="<?php #echo @$admin_user['title'][0];  ?>" /></li>-->
        <li class="field"><input class="text input" type="text" placeholder="File Stream" name="file_stream" id="file_stream" value="<?php echo @$admin_user['file_stream'][0];  ?>" /></li>
        
        <li class="field">
        <input name="id" id="id" type="hidden" value="<?php echo @$admin_user['id'][0];  ?>">
        	<input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="Update Account" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"></li>
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
		
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/update_church/",
				   data: $('#this-form').serialize(),
				   success:	function(e){
					   
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
								$('#this-from')[0].reset();
								//loadCurrentRecord();
							}//end if
					  	
				   } //end function success


		});//end ajax
	
		return false;
	});//end click  event
	
	return false;
});

</script>    
    
<!--END OF CONTENT-->


  </body>
</html>
