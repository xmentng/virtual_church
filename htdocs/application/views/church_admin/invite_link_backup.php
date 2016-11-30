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

    <div class="twelve columns"  style=" padding:5px 0;">
	<code class="_id_page_description" style="font-size:16px; border:none; color:#480000">
          <strong><?php echo @$data['page_desc'];   ?></strong>
    </code>
    
    <form action="" method="post" name="frmpost"  id="this-form" enctype="multipart/form-data">
   <?php
   			
									
								
  if(@$data['flag_msg_status']=='info')echo '<code id="post_result_msg" class="info">'.@$data['info_msg'].'</code>';
  
  if((@$data['nsaved'] == @$data['ndata'])and(@$data['nsaved']!=0))echo '<code id="post_result_msg" class="success"><img src="/images/icons/success_small.png" align="absmiddle" /> &nbsp;The record has been successfully processed; and a mail sent to the recipient.</code>';
  
  if(@$data['flag_msg_status']=='file_not_uploaded')echo '<code id="post_result_msg" class="error"><img src="/images/icons/invalid_small.png" align="absmiddle" /> &nbsp;'.@$data['info_msg'].'</code>';
  
  if(@$data['flag_msg_status']=='input_error')echo '<code id="post_result_msg" class="error"><img src="/images/icons/invalid_small.png" align="absmiddle" /> &nbsp;'.@$data['info_msg'].'</code>';
  
  if((@$data['nsaved'] == 0)and(@$data['ndata']>0) and (@$data['flag_msg_status']=='error'))echo '<code id="post_result_msg" class="error"><img src="/images/icons/invalid_small.png" align="absmiddle" /> &nbsp;The details on the imported and uploaded file previously exist.</code>';
  
  
  
  if((@$data['nsaved'] < @$data['ndata'])and(@$data['ndata']!=0) and (@$data['nsaved'] != 0)){
	  
	  if(count(@$previously_exist) > 0):
		  echo '<code id="post_result_msg" class="success"><img src="/images/icons/info_small.png" align="absmiddle" /> &nbsp;Some record(s) where successfully processed; while the below record(s) previously exist.<br><br>';
			  for($i=0; $i <= count(@$previously_exist); $i++):
				  echo @$previously_exist[$i]. '<br><br>';
			   endfor;
		  echo "</code>";	 
	  endif;	 
	  
	  if(count(@$import_error) > 0):
		  echo '<code id="post_result_msg" class="error"><img src="/images/icons/info_small.png" align="absmiddle" /> &nbsp;Some record(s) where successfully processed; while the below record(s) could not be imported/uploaded.<br><br>';
			  for($j=0; $j <= count(@$import_error); $j++):
				  echo @$import_error[$j]. '<br><br>';
			   endfor;
		  echo "</code>";	 
	  endif;	 
	  
	  
	  if(count(@$insertion_error) > 0):
		  echo '<code id="post_result_msg" class="info"><img src="/images/icons/info_small.png" align="absmiddle" /> &nbsp;Some record(s) where successfully processed; while the below record(s) could not be saved.<br><br>';
			  for($k=0; $k <= count(@$insertion_error); $k++):
				  echo @$insertion_error[$k]. '<br><br>';
			   endfor;
		  echo "</code>";	 
	  endif;	 
	   
  }//endif;
							
   
   
   
   ?>
   

    <em style="font-size:11px; margin-bottom:10px;">*Required</em>
    <br>
    <br>
    <ul>
    	
        <li class="field">
        	<span style="font-size:0.75em;">Service Theme | Title:</span>
        	<input class="text input" type="text" placeholder="Service Theme" name="service_theme" id="service_theme" value="" />
        	<span style="font-size:10px; color:#F00">*</span>
        </li>
    
    	<li class="field">
        	<span style="font-size:0.75em;">Generated Invite Link:</span>
        	<input class="text input" type="text" placeholder="invite_link" name="invite_link" id="invite_link" value="<?php echo @$data['invite_link']; ?>" readonly />
        	<span style="font-size:10px; color:#F00">*</span>
        </li>
        
        
        <li class="field">
        	 <span style="font-size:0.75em;">Enter Invite Detail By:</span>
        	<select name="invite_detail_option" id="invite_detail_option" class="text input">
            	<option value="">---Select---</option>
                <option value="1">Upload from CSV</option>
                <option value="2">Manual Input</option>
            </select>  
<span style="font-size:10px; color:#F00">*</span>
        </li>
        
        
        <li class="field" id="upload_from_csv">
          <input name="userfile" id="userfile" type="file" class="text input">
          <span style="font-size:10px; color:#F00">*</span>
         <a href="/churchadmin/view_invite_csv_format" style="font-size:0.75em;">View Excel | CSV Format</a>
        </li>
        
        
        <li class="field" id="manual_input">
          <input class="fname  text input" type="text" placeholder="First Name" name="first_name" id="first_name" style="float:left; width:22%; margin-right:3px;" />
          <input class="lname  text input" type="text" placeholder="Last Name" name="last_name" id="last_name" style="float:left; width:22%; margin-right:3px;" />
          <input class="email  text input" type="text" placeholder="Email" name="email" id="email" style="float:left; width:22%;" />
          
        </li>
        
         <li class="field" id="container"> </li>
        
        <li class="field" id="add_more_input">
          <input class="pretty primary btn" name="add_more" id="add_more" type="submit" value="Add More..." style="margin-left:8px; width:100px;" />
          <input name="counts" id="counts" type="hidden" value=""></li>
        
        <li class="field">
        	
            <input name="church_id" id="church_id" type="hidden" value="<?php  echo @$data['church_id'];   ?>">
        	<input name="service_year" id="service_year" type="hidden" value="<?php  echo @$data['year'];   ?>">
            <input name="service_month" id="service_month" type="hidden" value="<?php  echo @$data['month'];   ?>">
            <input name="service_day" id="service_day" type="hidden" value="<?php  echo @$data['day'];   ?>">
            <input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="&nbsp;&nbsp;Send&nbsp;&nbsp;"  style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;">
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
	
		
		
		$('#upload_from_csv').hide();
		$('#manual_input').hide();
		$('#add_more_input').hide();
		$('#container').hide();
	//////////////////////////////////////////////////////////////
	
	$('#invite_detail_option').change(function(){
		var sval = $(this).val();
		
		if(sval == 1){
			$('#upload_from_csv').show();
			$('#manual_input').hide();
			$('#add_more_input').hide();
			$('#container').hide();
			var count = 0;
			
			//return false;
		}
		
		if(sval == 2){
			$('#manual_input').show();
			$('#add_more_input').show();
			$('#upload_from_csv').hide();
			$('#container').show();
			var count = 1;
			$('.fname').attr('name','first_name' + count + '');
			$('.lname').attr('name','last_name' + count + '');
			$('.email').attr('name','email' + count + '');
			$('#counts').attr('value',count);
			//alert(count);
			//return false;
		}

	});

	////////////////////////////////////
	//alert(count);
	var count = 1;
	$('.fname').attr('name','first_name' + count + '');
	$('.lname').attr('name','last_name' + count + '');
	$('.email').attr('name','email' + count + '');
	$('#add_more').click(function(){
			//alert(count);					  
			count += 1;					  
			//alert(count);

			$('#container').append('<input class="fname  text input" type="text" placeholder="First Name" name="first_name' + count + '" id="first_name' + count + '" style="float:left; width:22%; margin-right:3px; margin-top:3px;" /><input class="lname  text input" type="text" placeholder="Last Name" name="last_name' + count + '" id="last_name' + count + '" style="float:left; width:22%; margin-right:3px; margin-top:3px;" /><input class="email  text input" type="text" placeholder="Email" name="email' + count + '" id="email' + count + '" style="float:left; width:22%; margin-top:3px;" />');
			
			$('#counts').attr('value',count);
			return false;
	    });
	
	////////////////////////////////////
	
	
	
		return false;

	
});

</script>    
    
<!--END OF CONTENT-->


  </body>
</html>
