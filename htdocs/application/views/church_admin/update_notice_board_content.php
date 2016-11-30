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
	<?php //$this->load->view('vw_welcome_user'); ?>
    <h4  style=""> 
 <i class="icon-doc-text-inv" ></i> <span>Update Notice Board Content</span> 
 </h4>
  <hr>

  
  

    <div class="messageWr"  style=" padding:5px 0; width:65%; float:left;">
	<code class="_id_page_description" style="font-size:16px; border:none; color:#480000">
          <strong><?php echo @$data['page_desc'];   ?></strong>
    </code>
    
    <form action="" method="post" name="frmpost"  id="this-form">
    <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
    <em style="font-size:11px; margin-bottom:10px;">*Required</em>
    <br>
    <br>
    <ul>
        <li class="field">
          <textarea name="notice_board_content" class="cls_notice_board  text  input " id="notice_board_content" placeholder="Notice Board Content">
          	<?php echo @$nbcontent['notice_board_content'][0];   ?>
          </textarea>
          <span style="font-size:10px; color:#F00">*</span>
          <input name="content_id" id="content_id" type="hidden" value="<?php echo @$nbcontent['id'][0];   ?>" />
        </li>
        

       
        <li class="field">
        	<input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="Submit"  style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"><input name="church_id" id="church_id" type="hidden" value="<?php  echo @$data['church_id'];   ?>"></li>
    </ul>
    </form>
    
    </div>
    <div class="rsbar"  style=" padding:5px 0; width:35%; float:right">
    
    	<div class="cls_rsbar_content" style="margin-left:15px; margin-top:14px;  border:solid 1px #E0E0E0;">
        	
            <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color:#F9F9F9;">
            	<span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">Add Content</span>
            </div>
            
            <li class="cls_rsbar_menu_content" style="list-style:none;">
            	<a href="/churchadmin/content/update_notice_board" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Add Notice Board Contents</span></a>
            </li>
            
            <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color:#F9F9F9;">
            	<span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">View Content</span>
            </div>
            
            <li class="cls_rsbar_menu_content" style="list-style:none;">
            	<a href="/churchadmin/notice_board_content/edit" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Edit Notice Board Contents</span></a>
            </li>
            
            
           <!-- <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color:#F9F9F9;">
            	<span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">Delete Content</span>
            </div>
            
            <li class="cls_rsbar_menu_content" style="list-style:none;">
            	<a href="/churchadmin/notice_board_content/delete" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Delete Notice Board Contents</span></a>
            </li>-->

        </div>
    	
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
						   
	
	////////////////////////////////////
	
	$('#buttons').click(function(){
		//alert(count);return false;	
		$.ajax({
			   type: "POST",
			   		url:	"/postmanager/proc_edited_notice_board_content",
					data:	$('#this-form').serialize(),
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
								$('#this-form')[0].reset();
							}//end if
						
					}//end function success
		});//end ajax	
					
		
		return false;
	});
	
	////////////////////////////////////
	
		return false;

	
});

</script>    
    
<!--END OF CONTENT-->


  </body>
</html>
