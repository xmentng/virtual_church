<?php $this->load->view('vw_header');  ?>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER-->


<div class="container">

  	<div class="row">
  	  <div class="twelve columns" style="width:100%;">
      <!--VIDEO -->
	  
          <div class="greybar">
            <?php @$this->load->view("church_member/page_name_welcome_user");   ?>
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="row cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%; height:auto;">
    
			<div class="row twelve columns" style="width:100%;background:#444;margin-bottom:3%;">
		
                <?php  $this->load->view('v2/cell_leader/maintab');    ?>
				
            </div><!--end cls_maintab-->

            <div class="row cls_landing_page_content" style="width:100%; margin-top:3%;">
            	
			<!--BTNS FOR MANAGE CELL SYSTEMS-->
			<a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/1/".misc::makeSeoTitle('Add Cell Member'); ;   ?>">
				<div class="adminbtns"><i class="icon-user-add icon-left" ></i><br>Add Cell Member</div>
			</a>
			
			
			<a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/2/".misc::makeSeoTitle('Start Meetings');   ?>">
				<div class="adminbtns"><i class="icon-list-add" ></i><br>Start Meetings</div>
			</a>
			
			
			<a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/3/".misc::makeSeoTitle('Upload Cell Outline') ;   ?>">
				<div class="adminbtns"><i class="icon-upload" ></i><br>Upload Cell Outline</div>
			</a>
			
			<a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/4/".misc::makeSeoTitle('Upload Announcement');   ?>">
				<div class="adminbtns"><i class="icon-up-circled" ></i><br>Upload Announcements</div>
			</a>
			
			<!--
			<a href="<?php //echo CUSTOM_BASE_URL."/cellleader/managecellsystem/5/".misc::makeSeoTitle('Generate Social Publicity Link');   ?>">
				<div class="adminbtns"><i class="icon-network" ></i><br>Generate Social Publicity Link</div>
			</a>-->

			<!--BTNS FOR MANAGE CELL SYSTEMS-->
			<!--<a href="<?php// echo CUSTOM_BASE_URL."/cellleader/managecellsystem/6/".misc::makeSeoTitle('View cell members');   ?>">
				<div class="adminbtns"><i class="icon-doc-text" ></i><br>View Cell Members</div>
			</a>
			
			
			<a href="<?php //echo CUSTOM_BASE_URL."/cellleader/managecellsystem/7/".misc::makeSeoTitle('View cell meetings');   ?>">
				<div class="adminbtns"><i class="icon-folder" ></i><br>View Meetings</div>
			</a>
			
			
			<a href="<?php //echo CUSTOM_BASE_URL."/cellleader/managecellsystem/8/".misc::makeSeoTitle('View announcement');   ?>">
				<div class="adminbtns"><i class="icon-suitcase" ></i><br>View Announcements</div>
			</a>-->
			
			<a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/9/".misc::makeSeoTitle('View Cell Register');    ?>">
				<div class="adminbtns"><i class="icon-book-open" ></i><br>View Cell Register</div>
			</a>
			
			
			
			<a href="/cellleader/groupchat">
				<div class="adminbtns"><i class="icon-chat" ></i><br>Group Chat</div>
			</a>

            	
           </div>
        
    	 </div><!--end class landing page-->
    </div><!--end class row-->

    <div class=" clearfix"></div>
</div>
</div>
<!--FOOTER-->
<div class="main_footer2" style="bottom:0;">
	<?php  $this->load->view('vw_footer');  ?>
</div>


<script type="text/javascript">

	function hide_account_detail(){
		$('#recipient_acct_no').hide();
		$('#recipient_bank').hide();
		$('#teller_no').hide();
		return false;
	}//end function
	
	
	function show_account_detail(){
		$('#recipient_acct_no').show();
		$('#recipient_bank').show();
		$('#teller_no').show();
		return false;
	}//end function
	
	
	function show_local_wired_transfer_detail(){
		$('#issued_bank').show();
		$('#receiving_bank').show();
		$('#issued_bank_account').show();
		$('#receiving_bank_account').show();
		return false;
	
	}
	
	function hide_local_wired_transfer_detail(){
		$('#issued_bank').hide();
		$('#receiving_bank').hide();
		$('#issued_bank_account').hide();
		$('#receiving_bank_account').hide();
		return false;
	
	}
	
	
	function pay_pay_api(){
		hide_account_detail();
		hide_local_wired_transfer_detail();
		alert('Comming soon...');	
	}
	
	
	function play_on_android_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['android'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	}//end function
	
	
	function play_on_ipad_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
	}//end function
	
	
	
	function play_on_bb_device(){
		//alert(2);
		$('#screen').innerHTML = '<video src="<?php echo @$church_detail['blackberry'][0];    ?>" width="770" height="450" controls ></video>';
	}//end function

$(document).ready(function(){

//////////////////////////////////////////////////////////

	$('#android_device').click(function(){
		play_on_android_device();
		return false;
	});
	
	
	$('#ipad_device').click(function(){
		play_on_ipad_device();
		return false;
	});
	
	
	$('#bb_device').click(function(){
		play_on_bb_device();
		return false;
	});

///////////////////////////////////////////////////////////
	$('#cmdclick').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/post_comment/",
				   data: $('#frmcomments').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmcomments')[0].reset();
								
								
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass('success');
								$('#post_result_msg').addClass('error');
								$('#post_result_msg').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								
								
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event
	
///////////////////////////////////////////////////////	
	return false;	
						   
});

</script>



<!--END OF CONTENT-->



  </body>
</html>

