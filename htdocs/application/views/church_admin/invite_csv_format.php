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
        
           <table width="100%" border="0" cellspacing="0" cellpadding="1">
              <tr>
                <td><strong>First Name</strong></td>
                <td><strong>Last Name</strong></td>
                <td><strong>Email</strong></td>
              </tr>
              <tr>
                <td>Mike</td>
                <td>Ross</td>
                <td>mikeross@gmail.com</td>
              </tr>
              
              <tr>
                <td colspan="3"><a href="/churchadmin/invite_link/generate">Return to Previous Page</a></td>
               
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
		}
		
		if(sval == 2){
			$('#manual_input').show();
			$('#add_more_input').show();
			$('#upload_from_csv').hide();
			$('#container').show();
		}

	});
	
	////////////////////////////////////
	
	
	
	////////////////////////////////////
	var count = 1;
	$('.cls_notice_board').attr('name','notice_board_content' + count + '');
	    $('#add_more').click(function(){
			count += 1;
			
			$('#container').append('<textarea name="notice_board_content' + count + '" class="cls_notice_board  text  input " id="notice_board_content' + count + '" placeholder="Notice Board Content"></textarea><span style="font-size:10px; color:#F00">*</span>');
			//alert(count); return false;
			return false;
	    });
	
	////////////////////////////////////
	
	
	
	
	
	$('#buttons').click(function(){
		//alert(count);return false;	
		$.ajax({
			   type: "POST",
			   		url:	"/postmanager/add_notice_board_content/" + count + "",
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
