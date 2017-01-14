<?php $this->load->view('vw_header');  ?>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
              <?php $this->load->view("church_member/page_name_welcome_user");   ?>  
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
          <div class="row cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="row twelve columns" style="width:100%;background:#444;margin-bottom:0%;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="row cls_landing_page_content" style="margin-top:3%;">
            	
                <div class="four columns 35perc_col_content">
                	
                <table width="100%" border="0" cellspacing="4" cellpadding="4">
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
                
                
                <div class="eight columns  65perc_col_content">
                	
                    <div class="cls_actual_content" style="width:100%; background:#E8E8E8; height:auto;margin:5px 0px 5px 0px; ">
                    		<form action="" method="post" name="frmpost" id="frmpost">
                                <h5 style="padding:0px 10px;"><strong><?php   echo @$data['page_name'];   ?></strong></h5>
                                <p style="line-height:1.67em; text-align:justify; padding:4px 10px; font-size:0.875em;"> 
                                    <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
                                    
                                    
                                    <em style="font-size:11px; margin-bottom:10px; color:#F00;">*All fields are required</em>.
    <br>
    <ul>
        <li class="field"><input class="text input" type="text" placeholder="First Name" name="first_name" id="first_name" value="<?php echo @$page_res['first_name']; ?>" required /></li>
        <li class="field"><input class="text input" type="text" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo @$page_res['last_name']; ?>" required /></li>
        <li class="field"><input class="text input" type="text" placeholder="User Email" name="email" id="email" value="<?php echo @$page_res['email']; ?>" required /></li>
        <li class="field"><input class="text input" type="text" placeholder="Mobile No." name="phone_no" id="phone_no" value="<?php echo @$page_res['phone_no']; ?>" required /></li>
        
        <li class="field">
        	<select id="country" name="country"  class="text input" required>
                                                <option selected="selected" value="<?php echo $user_detail['country'][0];    ?>"><?php echo $user_detail['country'][0];    ?></option>
                                                <option value="Afghanistan|Middle East">Afghanistan </option>
                                                <option value="Albania|Europe">Albania </option>
                                                <option value="Algeria|Africa">Algeria </option>
                                                <option value="Andorra|Europe">Andorra </option>
                                                <option value="Angola|Africa">Angola </option>
                                                <option value="Anguilla">Anguilla </option>
                                                <option value="Antarctica">Antarctica </option>
                                                <option value="Argentina|SouthAmerica">Argentina </option>
                                                <option value="Armenia|Europe">Armenia </option>
                                                <option value="Aruba">Aruba </option>
                                                <option value="Australia|Oceania">Australia </option>
                                                <option value="Austria|Europe">Austria </option>
                                                <option value="Azerbaijan|Europe">Azerbaijan </option>
                                                <option value="Bahamas|Carribbeans">Bahamas</option>
                                                <option value="Bahrain|Middle East">Bahrain </option>
                                                <option value="Bangladesh|MiddleEast">Bangladesh </option>
                                                <option value="Barbados|Carribbeans">Barbados </option>
                                                <option value="Belarus|Europe">Belarus </option>
                                                <option value="Belgium|Europe">Belgium </option>
                                                <option value="Belize|Europe">Belize </option>
                                                <option value="Benin|Africa">Benin </option>
                                                <option value="Bermuda|Carribbeans">Bermuda </option>
                                                <option value="Bhutan|MiddleEast">Bhutan </option>
                                                <option value="Bolivia|SouthAmerica">Bolivia </option>
                                                <option value="Botswana|Africa">Botswana </option>
                                                <option value="Bouvet|Other">Bouvet Island </option>
                                                <option value="Brazil|SouthAmerica">Brazil </option>
                                                <option value="Brunei|MiddleEast">Brunei </option>
                                                <option value="Bulgaria|Europe">Bulgaria </option>
                                                <option value="Burkina Faso|Africa ">Burkina Faso </option>
                                                <option value="Burundi|Africa">Burundi </option>
                                                <option value="Cambodia|Asia">Cambodia </option>
                                                <option value="Cameroon|Africa">Cameroon </option>
                                                <option value="Canada|NorthAmerica">Canada </option>
                                                <option value="Cape Verde|Africa">Cape Verde </option>
                                                <option value="Cayman|Other">Cayman Islands </option>
                                                <option value="Chad|Africa">Chad </option>
                                                <option value="Chile|SouthAmerica">Chile </option>
                                                <option value="China|Asia">China </option>
                                                <option value="Colombia|SouthAmerica">Colombia </option>
                                                <option value="Comoros|Other">Comoros </option>
                                                <option value="Congo|Africa">Congo </option>
                                                <option value="Congo, DR|Africa">Congo, DR</option>
                                                <option value="Cook Islands|Other">Cook Islands </option>
                                                <option value="Costa Rica|Africa">Costa Rica </option>
                                                <option value="Cote Ivoire|Africa">Cote D\'Ivoire </option>
                                                <option value="Croatia|Africa">Croatia </option>
                                                <option value="Cuba|NorthAmerica">Cuba </option>
                                                <option value="Cyprus|Europe">Cyprus </option>
                                                <option value="Czech Republic|Europe">Czech Republic </option>
                                                <option value="Denmark|Europe">Denmark </option>
                                                <option value="Djibouti|Africa">Djibouti </option>
                                                <option value="Dominica|Other">Dominica </option>
                                                <option value="East Timor|Other">East Timor </option>
                                                <option value="Ecuador|SouthAmerica">Ecuador </option>
                                                <option value="Egypt|Africa">Egypt </option>
                                                <option value="El Salvador|Other">El Salvador </option>
                                                <option value="Equatorial Guinea|Africa">Equatorial Guinea </option>
                                                <option value="Eritrea|Africa">Eritrea </option>
                                                <option value="Estonia|Europe">Estonia </option>
                                                <option value="Ethiopia|Africa">Ethiopia </option>
                                                <option value="Finland|Europe">Finland </option>
                                                <option value="France|Europe">France </option>
                                                <option value="Gabon|Africa">Gabon </option>
                                                <option value="Gambia|Africa">Gambia</option>
                                                <option value="Georgia|Europe">Georgia </option>
                                                <option value="Germany|Europe">Germany </option>
                                                <option value="Ghana|Africa">Ghana </option>
                                                <option value="Gibraltar|Other">Gibraltar </option>
                                                <option value="Greece|Europe">Greece </option>
                                                <option value="Grenada|Other">Grenada </option>
                                                <option value="Guatemala|SouthAmerica">Guatemala </option>
                                                <option value="Guinea|Africa">Guinea </option>
                                                <option value="Guinea-Bissau|Africa">Guinea-Bissau </option>
                                                <option value="Guyana|Europe">Guyana </option>
                                                <option value="Haiti|Carribbeans">Haiti </option>
                                                <option value="Honduras|Carribbeans">Honduras </option>
                                                <option value="Hungary|Europe">Hungary </option>
                                                <option value="Iceland|Europe">Iceland </option>
                                                <option value="India|Asia">India </option>
                                                <option value="Indonesia|Asia">Indonesia </option>
                                                <option value="Iran|MiddleEast">Iran </option>
                                                <option value="Iraq|MiddleEast">Iraq </option>
                                                <option value="Ireland|Europe">Ireland </option>
                                                <option value="Israel|Europe">Israel </option>
                                                <option value="Italy|Europe">Italy </option>
                                                <option value="Jamaica|Carribbeans">Jamaica </option>
                                                <option value="Japan|Asia">Japan </option>
                                                <option value="Jordan|MiddleEast">Jordan </option>
                                                <option value="Kazakhstan|MiddleEast">Kazakhstan </option>
                                                <option value="Kenya|Africa">Kenya </option>
                                                <option value="Kiribati|Other">Kiribati </option>
                                                <option value="Korea South|Asia">Korea, South</option>
                                                <option value="Korea North|Asia">Korea, North </option>
                                                <option value="Kuwait|MiddleEast">Kuwait </option>
                                                <option value="Kyrgyzstan|Europe">Kyrgyzstan </option>
                                                <option value="Laos|Other">Laos </option>
                                                <option value="Latvia|Europe">Latvia </option>
                                                <option value="Lebanon|MiddleEast">Lebanon </option>
                                                <option value="Lesotho|Africa">Lesotho </option>
                                                <option value="Liberia|Africa">Liberia </option>
                                                <option value="Libya|Africa">Libya </option>
                                                <option value="Lithuania|Europe">Lithuania </option>
                                                <option value="Luxembourg|Europe">Luxembourg </option>
                                                <option value="Macedonia|Europe">Macedonia </option>
                                                <option value="Madagascar|Africa">Madagascar </option>
                                                <option value="Malawi|Africa">Malawi </option>
                                                <option value="Malaysia|Asia">Malaysia </option>
                                                <option value="Maldives|Oceania">Maldives </option>
                                                <option value="Mali|Africa">Mali </option>
                                                <option value="Malta|Europe">Malta </option>
                                                <option value="Mauritania|Africa">Mauritania </option>
                                                <option value="Mauritius|Africa">Mauritius </option>
                                                <option value="Mayotte|Other">Mayotte </option>
                                                <option value="Mexico|NorthAmerica">Mexico </option>
                                                <option value="Micronesia|Other">Micronesia </option>
                                                <option value="Moldova|Europe">Moldova </option>
                                                <option value="Mongolia|Asia">Mongolia </option>
                                                <option value="Montserrat|Other">Montserrat </option>
                                                <option value="Morocco|Africa">Morocco </option>
                                                <option value="Mozambique|Africa">Mozambique </option>
                                                <option value="Myanmar|Other">Myanmar </option>
                                                <option value="Namibia|Africa">Namibia </option>
                                                <option value="Nauru|Other">Nauru </option>
                                                <option value="Nepal|Africa">Nepal </option>
                                                <option value="Netherlands|Europe">Netherlands </option>
                                                <option value="New Caledoria|Other">New Caledonia </option>
                                                <option value="New Zealand|Oceania">New Zealand </option>
                                                <option value="Nicaragua|Other">Nicaragua </option>
                                                <option value="Niger|Africa">Niger </option>
                                                <option value="Nigeria|Africa">Nigeria </option>
                                                <option value="Niue|Other">Niue </option>
                                                <option value="Norway|Europe">Norway </option>
                                                <option value="Oman|MiddleEast">Oman </option>
                                                <option value="Pakistan|MiddleEast">Pakistan </option>
                                                <option value="Palau|Other">Palau </option>
                                                <option value="Panama|Carribbeans">Panama </option>
                                                <option value="Paraguay|SouthAmerica">Paraguay </option>
                                                <option value="Peru|SouthAmerica">Peru </option>
                                                <option value="Philippines|MiddleEast">Philippines </option>
                                                <option value="Poland|Europe">Poland </option>
                                                <option value="Portugal|Europe">Portugal </option>
                                                <option value="Puerto Rico|Carribbeans">Puerto Rico </option>
                                                <option value="Qatar|Asia">Qatar </option>
                                                <option value="Reunion|Africa">Reunion </option>
                                                <option value="Romania|Europe">Romania </option>
                                                <option value="Russia|Europe">Russia </option>
                                                <option value="Rwanda|Africa">Rwanda </option>
                                                <option value="Saudi Arabia|MiddleEast">Saudi Arabia </option>
                                                <option value="Senegal|Africa">Senegal </option>
                                                <option value="Sierra Leone|Africa">Sierra Leone </option>
                                                <option value="Singapore|Asia">Singapore </option>
                                                <option value="Slovakia|Europe">Slovakia </option>
                                                <option value="Slovenia|Europe">Slovenia </option>
                                                <option value="Somalia|Africa">Somalia </option>
                                                <option value="South Africa|Africa">South Africa </option>
                                                <option value="South Georgia|Europe">South Georgia </option>
                                                <option value="Spain|Europe">Spain </option>
                                                <option value="Sri Lanka|Asia">Sri Lanka </option>
                                                <option value="Sudan|Africa">Sudan </option>
                                                <option value="Swaziland|Africa">Swaziland </option>
                                                <option value="Sweden|Africa">Sweden </option>
                                                <option value="Switzerland|Europe">Switzerland </option>
                                                <option value="Syria|MiddleEast">Syria </option>
                                                <option value="Taiwan|Asia">Taiwan </option>
                                                <option value="Tajikistan|Other">Tajikistan </option>
                                                <option value="Tanzania|Africa">Tanzania </option>
                                                <option value="Thailand|Asia">Thailand </option>
                                                <option value="Togo|Africa">Togo </option>
                                                <option value="Tokelau|Other">Tokelau </option>
                                                <option value="Tonga|Oceania">Tonga </option>
                                                <option value="Trinidad and Tobago|Carribbeans">Trinidad and Tobago </option>
                                                <option value="Tunisia|Africa">Tunisia </option>
                                                <option value="Turkey|Europe">Turkey </option>
                                                <option value="Uganda|Africa">Uganda </option>
                                                <option value="Ukraine|Europe">Ukraine </option>
                                                <option value="UAE|MiddleEast">UAE</option>
                                                <option value="UK|Europe">UK </option>
                                                <option value="USA|NorthAmerica">USA</option>
                                                <option value="Uruguay|SouthAmerica">Uruguay </option>
                                                <option value="Uzbekistan|Asia">Uzbekistan </option>
                                                <option value="Vanuatu|Other">Vanuatu </option>
                                                <option value="Venezuela|SouthAmerica">Venezuela </option>
                                                <option value="Vietnam|Asia">Vietnam </option>
                                                <option value="Yemen|MIddleEast">Yemen </option>
                                                <option value="Yugoslavia|Europe">Yugoslavia </option>
                                                <option value="Zambia|Africa">Zambia </option>
                                                <option value="Zimbabwe|Africa">Zimbabwe </option>
                                              </select>
        </li>
        <li class="field">
        	<select name="lstbday" class="text input" style="width:25%; font-size:1.0625em;">
            	<option value="">Birth Day</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
               	<option value="28">28</option>
               	<option value="29">29</option>
               	<option value="30">30</option>
               	<option value="31">31</option>
                
            </select> &nbsp;&nbsp;
            
            <select name="lstbmonth" class="text input" style="width:25%;font-size:1.0625em;">
            	<option value="">Birth Month</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select> &nbsp;&nbsp;
            
            <select name="lstbyear" class="text input" style="width:25%;font-size:1.0625em;">
            	<option value="">Birth Year</option>
                
                <?php
					for($i = 1960; $i < date("Y"); $i++){
				?>
                <option value="<?php  echo $i;  ?>"><?php  echo $i;  ?></option>
                <?php
					}
					
				?>
            </select> &nbsp;&nbsp;
        </li>
        

        <li class="field">
        <input name="church_id" type="hidden" value="<?php echo @$page_res['church_id']; ?>">
         <input name="user_id" type="hidden" value="<?php echo @$page_res['user_id']; ?>">
        
        </li>
       
        <li class="field">
        	<input name="submit_btn" id="cmdclick" class="pretty medium primary btn" type="submit" value="&nbsp;Update Profile &nbsp;" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"></li>
                                    </ul>
                                    
                                    
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
		$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/update_user_profile/",
				   data: $('#frmpost').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								//$('#frmcomments')[0].reset();
								document.location="/churchmember/edit_profile";
								
								
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

