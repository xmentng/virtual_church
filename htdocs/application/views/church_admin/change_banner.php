<?php $this->load->view('vw_header'); ?>

<body class="whitebg">
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
</script> 
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

    <div class="eleven columns"  style=" padding:0px 0;">
		
    <form action="/churchadmin/uploadbanner" method="post" name="frmvideo" id="frmvideo" enctype="multipart/form-data" class="upload" onSubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback})">
                       	
                   	   <code class="info" id="post_result_msg">
                       	   Please fill the form below. Kindly note that only jpg, png, gif file formats are currently supported. File size:950px by 150px.
                       </code>
                            
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
                                  
                               <tr>
                                 <td colspan="2" align="left" valign="top">&nbsp;</td>
                               </tr>
                               <tr>
                                 <td width="22%" align="left" valign="top">Select the file to upload:</td>
                                 <td width="78%" align="left" valign="top">
                                   <input name="picture" type="file" id="picture"  style="width:75%;"  required />
                                 </td>
                               </tr>
                               
                               <tr>
                                 <td align="left" valign="top">&nbsp;</td>
                                 <td align="left" valign="top">&nbsp;</td>
                               </tr>
                               <tr>
                                 <td align="left" valign="top">&nbsp;</td>
                                 <td align="left" valign="top"><input type="submit" name="button" id="buttonUploadPicture" value="Submit" />
                                 <input name="seenform" type="hidden" id="seenform" value="uploadpicture" /></td>
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
