<?php $this->load->view('vw_header');  ?>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container">

  	<div class="row">
  	  <div class="twelve columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
              <div class="greybar_left">  
                    <div>
                       <?php  echo $page_res['page_name'];  ?>                   
                    </div>
              </div>
              
              <div class="greybar_right">
                    <strong><em><?php  echo "Welcome ". authmanager::load_user_fullname().' from '.$church_detail['church_name'][0];  ?>!</em></strong>
              </div>
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#444;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="cls_landing_page_content" style="width:100%; margin-top:3%; background-color:#FFF7F2">
            	
                <div class="35perc_col_content" style="width:35%; float:left;">
                	
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                      <tr id="id_profile_pic">
                        <td width="60%" align="center" class="cls_profile_pic">
						  <img src="<?php echo @$user_detail['profile_pic'][0];    ?>" align="absmiddle" border="0" style="margin-top:10px; margin:5px; width:80%;" />  
                        </td>
                        <td width="40%" rowspan="2" valign="top" class="cls_edit_profile_pic">
                        	<span style="padding:0px 10px; color: #004262;  font-weight:bolder; font-size:1.0625em; text-transform:uppercase;">
                            	<?php echo $page_res['name_of_user'] ;    ?>
                            </span>
                            <br>
					
							<span style="padding:0px 10px; color: #0082BF; font-weight:bolder;">
								<strong><?php if($page_res['country'])echo $page_res['country'] ;    ?></strong>
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
                
                
                <div class="65perc_col_content" style="width:65%; float:right; background-color:#fff">
                	
                    <div class="cls_actual_content" style="width:100%; background:#E8E8E8; height:auto;margin:5px 0px 5px 0px; ">
                    	
                        	<h5 style="padding:0px 10px;">Notification</h5>
                        	<p style="line-height:1.67em; text-align:justify; padding:4px 10px; font-size:0.875em;"> 
							<?php
			
								echo @$data['notice_board_content']; 
							?>
                        	</p>
                    </div>
                    
                    
                      <div class="cls_actual_content" style="width:100%; background:#E8E8E8; height:auto;margin:5px 0px 5px 0px; ">
                    	
                        	<h5 style="padding:0px 10px;">Help Lines</h5>
                        	<p style="line-height:1.67em; text-align:justify; padding:4px 10px; font-size:0.875em;">
							 <?php
								if($data['n_help_lines'] > 0 ){
									
									for ($i = 0; $i < $data['n_help_lines']; $i++):
										
										echo @$support['help_line'][$i]. "<br>";
									
									endfor;
									
								}else{
									echo 'No current Help Line Information.';	
								}
							
							?>
                        	</p>
                    </div>
                    
                    
                    
                    <div class="cls_actual_content" style="width:100%; background:#E8E8E8; margin:5px 0px 5px 0px;">
                     	<h5 style="padding:0px 10px;">Testimonies</h5>
                    	<div style="max-height:200px; overflow:scroll;">
                       
							<?php    
                                if($data['n_testimonies'] > 0 ){    
                                    for($j = 0; $j<$data['n_testimonies']; $j++){
                            ?>
                            <img src="<?php  echo $arrTestifiers['profile_pic'][$j]; ?>" style="width:10%; float:left; clear:left; margin:5px 7px; border:none;" />
                            <p style="margin-top:2px; line-height:1.67em; text-align:justify; padding:0px 7px; font-size:1.0625em;">
                                <?php  echo $testimony['test_body'][$j]; ?>
                            </p>
                           
                           <?php
                                    }
                                }else{
                            ?>
                            <p style="margin-top:2px; line-height:1.67em; text-align:justify; padding:0px 7px; font-size:1.0625em;">
                               There are no testimonies.
                            </p>
                            <?php
								}
							?>
                         
                         </div> 	
  
                    </div>
                               
                    <div class="cls_actual_content" style="width:100%; background:#E8E8E8; height:auto;margin:15px 0px 5px 0px; ">
                    	
                      <h5 style="padding:0px 10px;">Birthdays</h5>
                    	<div style="max-height:200px; overflow:scroll;">
                       
							<?php    
                                if(@$data['n_celebrants']> 0 ){    
                                    for($j = 0; $j<@$data['n_celebrants']; $j++){
                            ?>
                            <img src="<?php  echo @$celebrant['profile_pic'][$j]; ?>" style="width:10%; float:left; clear:left; margin:5px 7px; border:none;" />
                            <p style="margin-top:2px; line-height:1.67em; text-align:justify; padding:0px 7px; font-size:1.0625em;">
                                Name: <span style="font-weight:bolder;"><?php  echo $celebrant['first_name'][$j].'  '.$celebrant['last_name'][$j] ; ?></span>
                                <br>
								Country: <span style="font-weight:bolder;"><?php  echo $celebrant['country'][$j] ; ?>
                                <br>
								Birthday: <span style="font-weight:bolder;"><?php  echo $celebrant['birth_day'][$j].'-'.$celebrant['birth_month'][$j].'-'.$celebrant['birth_year'][$j] ; ?>
                            </p>
                            
                            <?php
                                    }
                                }else{
                            ?>
                            <p style="margin-top:2px; line-height:1.67em; text-align:justify; padding:0px 7px; font-size:1.0625em;">
                               There are no current celebrant(s).
                            </p>
                            <?php
								}
							?>
                         
                         </div> 	
                    </div>
   
                </div><!--end class 65perc_col_content-->
                
                <div class=" clearfix"></div>
            	
           </div>
            <div class=" clearfix"></div>
    	 </div><!--end class landing page-->
    </div><!--end class row-->

    <div class=" clearfix"></div>

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

