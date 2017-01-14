<?php include_once('layouts/page_head.php'); ?>

<?php include_once('layouts/more_scripts.php'); ?>
<link rel="stylesheet" href="/css/chat.css" type="text/css" />
<?php include_once('layouts/header.php'); ?>

<!-- #main-content -->
<section id="main-content" class="post">
	<!-- #blog -->
	<article id="blog" class="container" style="background-color:#fff; ">
		<div id="ajax-content" class="single-wrap">
			<div class="remove-if-ajax row">
				<div class="col-md-12 title-wrap">
					<h1 class="title-secondary"> <?php  echo @$data['page_name'];  ?></h1>
					
				</div>
			</div>
			<div class="row">
    
			    <div class="col-md-12" style="margin-bottom:50px; font-size: 12.7px;">
				
					<div class="col-md-12" style="">
						
						<?php $this->load->view('v2/cell_leader/admin_sidebar') ?>
    
						
					</div>
					
					
	
				</div>
       
	    		<div class="col-md-12">
	    			
	    			<div class=" form">
							
					<form action="/cellleader/uploadCellOutline" method="post" enctype="multipart/form-data" name="frmupload" id="frmupload" class="upload" onSubmit="return AIM.submit(this, {'onStart' : startCallback, 'onComplete' : completeCallback})">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td colspan="2">
								<div id="divLoading" class="info">
									<?php if($data['post_status']=='success'){ ?>
									Cell Outline successfully uploaded.
									<?php
									}
									?>	
									
									
									<?php if($data['post_status']=='failure-file-too-large'){ ?>
									File is too large. The maximum file size is 500KB.
									<?php
									}
									?>	
									
									
									<?php if($data['post_status']=='failure-invalid-file-format'){ ?>
									Invalid file format. Please note that only PDF file formats are currently supported.
									<?php
									}
									?>	
									
									
									<?php if($data['post_status']=='failure-no-file-selected'){ ?>
									Please select a pdf file for upload.
									<?php
									}
									?>	
									
									<?php if(!$data['post_status']) { ?>
									Please note that only pdf file formats are currently supported.
									<?php } ?>
								</div>
							</td>
                          </tr>
                        
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Select pdf file to upload:</td>
                          <td>
                            <input name="picture" type="file" id="picture"  style="width:75%;" />
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><label>
                            <input type="submit" name="button" id="buttonUploadPicture" value="Submit" />
                           
                            <input name="seenform" type="hidden" id="seenform" value="uploadpicture" />
                          </label></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                    
                       
                    </form>
						
                            </div>
	    			
	    		</div>
		
	        
			</div>
		</div>


	</article>
	<!-- /#blog -->
</section>
<!-- /#main-content -->
<script src="<?php echo CUSTOM_BASE_URL  ?>/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/paginate.js"></script>
<script type="text/javascript">

			function startCallback() {
				// make something useful before submit (onStart)
			$('#divLoading').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
				return true;
			}
 
			function completeCallback(resp) {
				// make something useful after (onComplete)
				var response = $.parseJSON(resp);
				//alert(response);
				if(response.status){
						$('#divLoading').html(response.message);
						$('#divLoading').removeClass('error');
						$('#divLoading').addClass('success');
				}
				else{
						//alert($('#divLoading').html());
						$('#divLoading').html(response.error);
						$('#divLoading').removeClass('success');
						$('#divLoading').addClass('error');
								
				}			
							
			}
			

</script>
<script>
	
$(document).ready(function(){

	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state


 
</script>
<?php //include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
