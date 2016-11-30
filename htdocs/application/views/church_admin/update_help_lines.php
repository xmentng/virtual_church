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
  
  
  <div class="four columns"  style=" padding:5px 0;">
    
    	<div class="cls_rsbar_content" style="margin-left:15px; margin-top:14px;  border:solid 1px #E0E0E0;">
        	
            <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color:#F9F9F9;">
            	<span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">Add Content</span>
            </div>
            
            <li class="cls_rsbar_menu_content" style="list-style:none;">
            	<a href="/churchadmin/helplines/add/" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Add Help Line(s)</span></a>
            </li>
            
            <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color:#F9F9F9;">
            	<span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">View Content</span>
            </div>
            
            <li class="cls_rsbar_menu_content" style="list-style:none;">
            	<a href="/churchadmin/help_line_content/edit" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Edit Help Line</span></a>
            </li>

        </div>
    	
    </div>


    <div class="seven columns"  style=" padding:5px 0;">
	<code class="_id_page_description" style="font-size:16px; border:none; color:#480000">
          <strong><?php echo @$data['page_desc'];   ?></strong>
    </code>
    
    <form action="" method="post" name="frmpost"  id="this-form">
    <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
    <em style="font-size:11px; margin-bottom:10px;">*Required</em>
    <br>
    <br>
    <ul>
        <li class="field"><input class="cls_help_line  text  input " type="text" placeholder="Help Line" name="help_line" id="help_line" />
        		<span style="font-size:10px; color:#F00">*</span>
                <input name="count" id="count" type="hidden" value="" />
        </li>
        
        
         <li class="field" id="container"> </li>
        
        
        
        <li class="field"><input class="pretty primary btn" name="add_more" id="add_more" type="submit" value="Add More..." style="margin-left:8px; width:100px;" /></li>
        
        <li class="field">
        	<input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="Submit&rarr;"  style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"><input name="church_id" id="church_id" type="hidden" value="<?php  echo @$data['church_id'];   ?>"></li>
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
	var count = 1;
	$('.cls_help_line').attr('name','help_line' + count + '');
	    $('#add_more').click(function(){
			count += 1;

			//$('#container').append('<br /> Location ' + count + '#</td><td><select name="location' + count + '" class="location"><option value=""></option><?php //if($info['nlocations'] > 0){for($i=0; $i<$info['nlocations']; $i++){?><option value="<?php //echo $location['locationID'][$i]  ?>"><?php //echo $location['location'][$i]  ?></option><?php //} } ?>');
			
			$('#container').append('<input style="margin-bottom:15px;" class="cls_help_line  text  input " type="text" placeholder="Help Line" name="help_line' + count + '" id="help_line' + count + '" /><span style="font-size:10px; color:#F00">*</span>');
			//alert(count); return false;
			return false;
	    });
	
	////////////////////////////////////
	
	$('#buttons').click(function(){
		//alert(count);return false;	
		$.ajax({
			   type: "POST",
			   		url:	"/postmanager/add_help_lines/" + count + "",
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
