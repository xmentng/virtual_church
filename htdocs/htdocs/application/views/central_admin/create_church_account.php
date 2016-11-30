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
        <li class="field"><input class="text input" type="text" placeholder="First Name" name="first_name" id="first_name" /></li>
        <li class="field"><input class="text input" type="text" placeholder="Last Name" name="last_name" id="first_name" /></li>
        <li class="field"><input class="text input" type="text" placeholder="User Email" name="email" id="email" /></li>
        <li class="field"><input class="text input" type="text" placeholder="User Name" name="usn" id="usn" /></li>
        <li class="field"><input class="password input" type="password" placeholder="User Password" name="usr_pwd" id="usr_pwd" /></li>
        <li class="field"><select name="church_id" id="church_id" class="text input">
        				<option value="">---Select---</option>
        			<?php  for($i=0; $i<$data['nof_items']; $i++){  ?>
                       <option value="<?php echo @$churches['id'][$i];?>">
                           <?php echo @$churches['church_name'][$i];?>
                       </option>
                     <?php  }  ?>   
                          </select></li>
        <li class="field"><select name="access_level_id" id="access_level" class="text input">
                             <option value="<?php echo @$access_levels['id'][1];?>">
                                 <?php echo @$access_levels['access_desc'][1];?>
                             </option> 
                          </select></li>
        <li class="field">
        	<input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="Create Account" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"></li>
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
				   url:	"/postmanager/create_church_admin/",
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
