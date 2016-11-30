<?php $this->load->view('vw_header');  ?>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->
<script type="text/javascript"> 
			function startCallback() {
				// make something useful before submit (onStart)
				$('#divLoading').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
				return true;
			}
 
			function completeCallback(resp) {
				// make something useful after (onComplete)
				var response = $.parseJSON(resp);
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

<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
              <?php $this->load->view("church_member/page_name_welcome_user");   ?>  
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#E8E8E8;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="row  cls_landing_page_content" style="margin-top:3%;">
            	
                <div class="35perc_col_content" style="width:35%; float:left;">
                	
                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                      <tr id="id_profile_pic">
                        <td width="53%" align="center" class="cls_profile_pic">
						  <img src="<?php echo @$user_detail['profile_pic'][0];    ?>" align="absmiddle" border="0" style="margin-top:10px; margin:3px; width:80%;" />  
                        </td>
                        <td width="47%" rowspan="2" valign="top" class="cls_edit_profile_pic">
                        	<span style="padding:0px 10px; color: #004262;  font-weight:bolder; font-size:1.0625em; text-transform:uppercase;">
                            	<?php echo $page_res['name_of_user'] ;    ?>
                            </span>
                            <br>
					
							<span style="padding:0px 10px; color: #0082BF; font-weight:bolder;">
								<strong><?php if($user_detail['country'][0])echo $user_detail['country'][0] ;    ?></strong>
                            </span>    
                            <br>
						
                            <a href="/churchmember/edit_profile" style="height:30px; line-height:30px; display:block; background:#007EBB; width:50%; text-align:center; margin-top:10px;">
                            	<span style="padding:0px 10px; color:#FFF;">Edit Profile</span>
                            </a>
                            
                            <br>
						
                            <a href="/churchmember/change_password" style="height:30px; line-height:30px; display:block; background:#007EBB; width:90%; text-align:center; margin-top:10px;">
                            	<span style="padding:0px 10px; color:#FFF;">Change Password</span>
                            </a>
                            
                        </td>
                      </tr>
                      
                      
                      <tr id="id_profile_detail">
                        <td align="center">
                        <a href="/churchmember/edit_profile_picture" style="height:30px; line-height:30px; display:block; background:#007EBB; width:80%; text-align:center; margin-top:10px;">
                            	<span style="padding:0px 10px; color:#FFF;">Update Picture</span>
                            </a></td>
                      </tr>
                    </table>
     			
              </div><!--end class 35perc_col_content-->
                
                
                <div class="65perc_col_content" style="width:65%; float:right;">
                	
                    <div class="cls_actual_content" style="width:100%; background:#E8E8E8; height:auto;margin:5px 0px 5px 0px; ">
                    		<form action="/myaccount/uploadpicture" method="post" name="frmpost" id="frmpost" enctype="multipart/form-data">
                                <h5 style="padding:0px 10px;"><strong><?php   echo @$data['page_desc'];   ?></strong></h5>
                                <p style="line-height:1.67em; text-align:justify; padding:4px 10px; font-size:0.875em;"> 
                               
								<?php  
									
									
									if($data['flag_msg_status']=='info'):
									
										echo "<code class=".@$data['css_cls']." style='margin-left:10px;' id='post_result_msg'>".$data['msg']."</code>";
									
									endif;
									
									if($data['flag_msg_status']=='error'):
									
										echo "<code class=".@$data['css_cls']." style='margin-left:10px;' id='post_result_msg'>".$data['msg']."</code>";
									
									endif;
									
									if($data['flag_msg_status']=='success'):
									
										echo "<code class=".@$data['css_cls']." style='margin-left:10px;' id='post_result_msg'>".$data['msg']."</code>";
									
									endif;
								?>
                         
                                
                                
                                    
                                    
                                    <em style="font-size:11px; margin-bottom:10px; color:#F00;">*All fields are required</em>.
    <br>
    <ul>
        <li class="field" style="padding:0px 10px;"><input type="file" name="userfile" id="userfile"> </li>
        

        <li class="field">
        <input name="church_id" type="hidden" value="<?php echo @$page_res['church_id']; ?>">
         <input name="user_id" type="hidden" value="<?php echo @$page_res['user_id']; ?>">
        
        </li>
       
        <li class="field">
        	<input name="submit_btn" id="cmdclick" class="pretty medium primary btn" type="submit" value="&nbsp;Upload Picture &nbsp;" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"></li></ul>
                                    
                                    
                                    
                                </p>
                            </form>
                        	
                    </div>
                </div><!--end class 65perc_col_content-->
                
                <div class=" clearfix"></div>
            	
           </div>
            <div class=" clearfix"></div>
    	 </div><!--end class landing page-->
    </div><!--end class row-->

    <div class=" clearfix"></div>
</div>
</div>
<!--FOOTER-->
<div class="main_footer2">
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

	
///////////////////////////////////////////////////////	
	return false;	
						   
});

</script>



<!--END OF CONTENT-->



  </body>
</html>

