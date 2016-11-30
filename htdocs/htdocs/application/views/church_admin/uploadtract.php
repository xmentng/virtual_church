<?php $this->load->view('vw_header'); ?>


<body class="whitebg">

<!--HEADER-->
<script type="text/javascript"> 
			function startCallback() {
				// make something useful before submit (onStart)
				$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
				$('#post_result_msg').removeClass('error');
				$('#post_result_msg').removeClass('success');
				$('#post_result_msg').addClass('info');
				return true;
			}
 
			function completeCallback(resp) {
				// make something useful after (onComplete)
				
				//alert(resp); return false;
				var response = $.parseJSON(resp);
				if(response.status){
						$('#post_result_msg').html(response.message);
						$('#post_result_msg').removeClass('error');
						$('#post_result_msg').addClass('success');
						$('#frmpost')[0].reset();
				}
				else{
						//alert($('#post_result_msg').html());
						$('#post_result_msg').html(response.error);
						$('#post_result_msg').removeClass('success');
						$('#post_result_msg').addClass('error');
								
				}			
							
			}
		</script> 
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

    <div class="twelve columns"  style=" padding:5px 0;">
	<!--<code class="_id_page_description" style="font-size:16px; border:none; color:#480000">
          <strong><?php //echo @$data['page_desc'];   ?></strong>
    </code>-->
    
    <form action="/churchadmin/uploadtract" method="post" name="frmpost" id="frmpost" enctype="multipart/form-data" onSubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback})">
   <code class="info" id="post_result_msg" style="width:90%; margin:0 auto"><?php  echo @$data['info_msg'];  ?></code>
	
    <em style="font-size:11px; margin-bottom:10px;">*Required</em>
    <br>
    <br>
    <ul>
        <li class="field"><input class="text input" type="text" placeholder="Description" name="banner_desc" id="banner_desc" /></li>
		<li class="field"><input type="file" name="picture" id="picture" style="width:75%;" class="text input" required>
        <span style="font-size:11px; color:#00324A"><br>
		  </span></li>
        
        <li class="field">
        	<input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="&nbsp;&nbsp;Submit&nbsp;&nbsp;" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;">
            <input name="content_type_id" id="content_type_id" type="hidden" value="1">
            <input name="church_id" id="church_id" type="hidden" value="<?php  echo @$data['church_id'];  ?>">
             <input name="seenform" type="hidden" id="seenform" value="uploadpicture" />
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
/*
$(document).ready(function(){
	
	$('#this-form').submit(function(e) {
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'/postmanager/update_general_banner/', 
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'html',
         data        : $('#this-form').serialize(),
         success  : function (data, status)
         {
            if(data.status != 'error')
            {
              alert(data.msg);
            }
            alert(data.msg);
         }
      });
      return false;
   });//end ajaxform upload
	
	return false;
});*/

</script>    
    
<!--END OF CONTENT-->


  </body>
</html>
