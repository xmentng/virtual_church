<?php $this->load->view('vw_header');  ?>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns">
      <!--VIDEO -->
      <div class="greybar">
      <div class="greybar_left">  <div ><a href="/auth/logout/"  style=" padding:2px 5px; font-size:12px; height:auto;"><strong>Logout</strong></a></div></div>
      <div class="greybar_right"><strong><em><?php  echo "Welcome ". authmanager::load_user_fullname().' from '.$church_detail['church_name'][0];  ?>!</em></strong></div>

      </div>
    <article class="vimeo video" style=" width:100%; height: auto; padding:0; float:left">

<!-- START OF THE PLAYER EMBEDDING TO COPY-PASTE -->

 <div id="screen" class="video_screen">
        
        <embed id="ply" width="770" height="450" flashvars="autostart=true&showimage=false&repeat=list&autoscroll=false&shuffle=false&bufferlength=5&enablejs=true&javascriptid=plyr&streamer=<?php echo @$church_detail['stream_url'][0];    ?>&file=<?php echo @$church_detail['file_stream'][0];    ?>&backcolor=0x000000&frontcolor=0xCCCCCC&lightcolor=0x557722&logo=/res/images/logo5.png&type=video&skin=/res/flash/overlay.swf&stretching=exactfit" allowscriptaccess="always" wmode="opaque" allowfullscreen="true" quality="high" bgcolor="#ffffff" name="ply" style="undefined" src="/js/player.swf" type="application/x-shockwave-flash">

</div>

<script type="text/javascript">
function loadVideoPlayer() {
	var ua = navigator.userAgent;
	if (ua.indexOf("BlackBerry") >= 0)
	{
		if (ua.indexOf("WebKit") >= 0)
		{
		//alert('here');
			$('#screen').innerHTML = '<video src="<?php echo @$church_detail['blackberry'][0];    ?>" width="770" height="450" controls ></video>';
		}
	}//end if blackberry
	if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	} else if ((navigator.userAgent.match(/Android/g)){
		$('#screen').html('<video src="<?php echo @$church_detail['android'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');								  
	}else {
		var s2 = new SWFObject('/js/player.swf','ply','770','450','9','#ffffff');
		s2.addParam("allowfullscreen","true");
		s2.addParam("wmode","transparent");
		s2.addVariable("autostart","true");
		s2.addVariable("showimage","false");
		s2.addVariable("repeat","list");
		s2.addVariable('autoscroll','false');
		s2.addVariable('shuffle','false');
		s2.addParam('allowscriptaccess','always');
		s2.addVariable('bufferlength','5');
		s2.addVariable("enablejs","true");
		s2.addVariable('javascriptid','plyr');
		s2.addVariable('streamer','<?php echo @$church_detail['stream_url'][0];    ?>');
		s2.addVariable('file','<?php echo @$church_detail['file_stream'][0];    ?>');
		s2.addVariable("backcolor","0x000000");
		s2.addVariable("frontcolor","0xCCCCCC");
		s2.addVariable("lightcolor","0x557722");
		s2.addVariable('logo','/res/images/logo5.png');
		//s2.addVariable("width","430");
		//s2.addVariable("height","344");
		s2.addVariable("type","video");
		s2.addVariable('skin','/res/flash/overlay.swf');
		s2.addVariable("stretching","exactfit");
		s2.write('#screen');
	}//end if-else
}//end function




</script>

	<!-- END OF THE PLAYER EMBEDDING -->
			<div class="cls_mobile_devices" style="font-size:0.8125em;">
            	<a href="#" id="android_device" style="float:right; margin-left:20px; text-decoration:underline; ">Android Device</a>
                
                <a href="#" id="ipad_device" style="float:right; margin-left:20px; text-decoration:underline">IPad Device</a>
                
                <a href="#" id="bb_device" style="float:right; margin-left:20px; text-decoration:underline">Blackberry</a>
            </div>
            </article>
      
      		<article class="vimeo video" style=" width:100%; height: auto; padding:0; float:left">
      
            <div class="blog">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF">
                <a href="javascript:document.frmcomments.submit()"> Submit</a>
                	<form  id="frmcomments" name="frmcomments" method="post">
                    <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['msg']; ?></code>
  <table width="100%" border="0" cellspacing="0" cellpadding="3" style="color:#666666; font-size:12px;">
    <tr>
      <td width="12%" align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Name:</strong></td>
      <td width="88%" bgcolor="#FFFFFF"><input type="text" name="name" id="name" class="cls_txtflds" readonly value="<?php echo @$user_detail['first_name'][0].'  '. $user_detail['last_name'][0]; ?>" /></td>
      </tr>
    <tr>
      <td align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Email:</strong></td>
      <td bgcolor="#FFFFFF"><input type="text" name="email" id="email" class="cls_txtflds" readonly value="<?php echo @$user_detail['email'][0]; ?>" /></td>
      </tr>
    <tr>
      <td align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Phone:</strong></td>
      <td bgcolor="#FFFFFF"><input type="text" name="phone" id="phone" class="cls_txtflds" required /></td>
      </tr>
    <tr>
      <td align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Country:</strong></td>
      <td bgcolor="#FFFFFF"><select name="country" id="country" class="cls_txtflds" required>
        <option selected="selected" value="">Please Select</option>
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
        </select></td>
      </tr>
    <tr>
      <td align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Comment:</strong></td>
      <td bgcolor="#FFFFFF"><textarea name="comment" id="comment" style="min-height:80px; min-width:80%" required></textarea></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="cmdclick" id="cmdclick" value="Submit" />
        <input type="hidden" name="church_id" id="church_id" value="<?php echo @$user_detail['church_id'][0];   ?>" />
        <input type="hidden" name="stream_url" id="stream_url" value="<?php echo @$church_detail['stream_url'][0];    ?>" />
        <input type="hidden" name="account_name" id="account_name" value="<?php echo @$user_detail['user_name'][0];    ?>" />
        </td>
      </tr>
  </table>
  </form>
                </td>
              </tr>
            </table>

                
            
            </div>
        	<?php 
				if($page_res['ncomments'] > 0 ){
					
					
			?>
       		<div id="blogged" style="border:transparent; background-color:#FFFFFF; margin-top:10px;  color:#00293E; font-size:0.75em;">
            	
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                   <tr>
                    <td colspan="3"><span style="font-weight:bolder; padding:0px 7px;">Comment(s): <?php echo  $page_res['ncomments'];  ?> </span></td>
                  </tr>
                  
                  <tr  style="border:dotted 1px #007BB7;">
                    <td bgcolor="#FFECEC"><span style="font-weight:bolder; padding:0px 7px;">Name</span></td>
                    <td bgcolor="#FFECEC"><span style="font-weight:bolder; padding:0px 7px;">Comment</span></td>
                    <td bgcolor="#FFECEC"><span style="font-weight:bolder; padding:0px 7px;">Time </span></td>
                  </tr>
                  <?php for($k = 0; $k < $page_res['ncomments']; $k++): ?>
                  <tr  style="border:dotted 1px #007BB7;">
                    <td><span style="padding:0px 7px;"><?php  echo  $comment['name'][$k];   ?></span></td>
                    <td><p style="padding:0px 7px; text-align:left;"><?php  echo  $comment['comment'][$k];   ?></p></td>
                    <td><span style="padding:0px 7px;"><?php  echo date('l, j F, Y', $comment['time_posted'][$k]); ?></span></td>
                  </tr>
                  <?php  endfor;  ?>
                </table>

                
                
            </div>
            
            <?php
					
				}
			?>
      
      </article>
      
      </div>
      
      <div class="three columns">
     <!--LOGIN FORM -->
         <div class=" righttxt" style=" margin:0 0 10px 0; padding:0;background:#F5F5F5; height:auto">
            <div class="titlediv"><h6 style=" color:#fff; text-shadow:none; font-weight:bold">Announcement</h6></div>
            <div style=" padding:10px 5%; width:90%; color:#333; font-size:12px; text-shadow:1px 1px 1px #fff;">
              <?php  #echo @$notice_board['content_body'][0];   ?>
              <?php
					/*if($data['n_nboard_content'] > 0 ){
						
						for ($j = 0; $j < $data['n_nboard_content']; $j++):
							
							echo @$notice_board['notice_board_content'][$j]. "<br><br>";
						
						endfor;
						
					}else{
						echo 'No current information.';	
					}
				*/
				echo @$data['notice_board_content']; 
				?>
            </div>
        
        </div><!--end class righttxt-->
        
       <div class=" righttxt" style=" margin:0 0 10px 0; padding:0;background:#F5F5F5; height:auto">
            <div class="titlediv"><h6 style=" color:#fff; text-shadow:none; font-weight:bold">Help Lines</h6></div>
            <div style=" padding:10px 5%; width:90%; color:#333; font-size:12px; text-shadow:1px 1px 1px #fff;">
                <!--+2348024900375,<br>
				+2348024900379-->
                <?php
					if($data['n_help_lines'] > 0 ){
						
						for ($i = 0; $i < $data['n_help_lines']; $i++):
							
							echo @$support['help_line'][$i]. "<br>";
						
						endfor;
						
					}else{
						echo 'No current Help Line Information.';	
					}
				
				?>
                
            </div>
        
        </div><!--end class righttxt-->
        
       <!-- <div class=" righttxt" style=" margin:0 0 10px 0; padding:0;background:#F5F5F5; height:auto">
            <div class="titlediv"><h6 style=" color:#fff; text-shadow:none; font-weight:bold">Online Giving</h6></div>
            <div style=" padding:10px 5%; width:90%; color:#333; font-size:12px; text-shadow:1px 1px 1px #fff;">
              <form method="post" name="frmgive">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>
                        <code class="<?php //echo @$data['css_cls'];  ?>" id="post_result_msg"><img src="/images/icons/info_small.png" />&nbsp;
								<?php  
									/*if(@$data['flag_msg_status']=='info')echo @$data['msg'];  
									if(@$data['flag_msg_status']=='error')echo @$data['msg'];  
									if(@$data['flag_msg_status']=='success')echo @$data['msg']; */ 
								?>
                                </code>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <span style="font-size:0.875;">Giving Type:</span>
                        <br>
					  <select name="giving_cat" id="giving_cat" class="text input" style="width:90%;"> 
                            <option value="">---Select---</option>
                            <?php  //for($i=0; $i<@$data['ngiving']; $i++){   ?>
                            <option value="<?php// echo @$giving['giving_cat'][$i];     ?>"><?php //echo @$giving['giving_cat'][$i];     ?></option>
                           
                            <?php  //}  ?>
                        </select>
						<input type="hidden" name="church_id" id="church_id" value="<?php //echo @$user_detail['church_id'][0];     ?>"></td>
                      </tr>
                      <tr>
                        <td>
                       	<span style="font-size:0.875;">Currency Type:</span>
                        <br>
						<select name="currency_type" id="currency_type" class="text input" style="width:90%;">
                            <option value="">---Select---</option>
                            <option value="NGN">NGN</option>
                            <option value="USD">USD</option>
                        </select>  
                        <input type="hidden" name="user_account" id="user_account" value="<?php //echo @$user_detail['user_name'][0];     ?>">
                        </td>
                      </tr>
                      
                      <tr>
                        <td>
                        <span style="font-size:0.875;">Payment Method:</span>
                        <br>
						<select name="payment_methods" id="pmethd" class="text input" style="width:90%;">
                            <option value="">---Select---</option>
                            <?php  ///for($j=0; $j<@$data['npmethod']; $j++){   ?>
                            <option value="<?php ///echo @$payment_method['pay_name'][$j]; ?>"><?php ///echo @$payment_method['pay_name'][$j]; ?></option>
                            <?php  //}  ?>
                        </select> 
                        <input type="hidden" name="service_year" id="service_year" value="<?php ///echo @$service_detail['service_year'][0];     ?>">
                        <input type="hidden" name="service_month" id="service_month" value="<?php ///echo @$service_detail['service_month'][0];     ?>">
                        <input type="hidden" name="service_day" id="service_day" value="<?php ///echo @$service_detail['service_day'][0];     ?>"> 
                        </td>
                      </tr>
                      

                      <tr id="issued_bank">
                        <td>
                        <span style="font-size:0.875;">Issued Bank:</span>
                        <br>
						<input type="text" name="issued_bank" id="issued_bank" class="cls_txtflds" required>
                        </td>
                      </tr>
                      
                      
                      <tr id="receiving_bank">
                        <td>
                        <span style="font-size:0.875;">Receiving Bank:</span>
                        <br>
						<input type="text" name="receiving_bank" id="receiving_bank" class="cls_txtflds" required>
                        </td>
                      </tr>
                      
                      
                      <tr id="issued_bank_account">
                        <td>
                        <span style="font-size:0.875;">Issuing Bank Account No#:</span>
                        <br>
						<input type="text" name="issue_bank_account" id="issue_bank_account" class="text input" style="width:90%;" required>
                        </td>
                      </tr>
                      
                      <tr id="receiving_bank_account">
                        <td>
                        <span style="font-size:0.875;">Receiving Bank Account:</span>
                        <br>
						<input type="text" name="receiving_bank_acct" id="receiving_bank_acct" class="text input" style="width:90%;" required>
                        </td>
                      </tr>
                      
                      <tr id="recipient_acct_no">
                        <td>
                        <span style="font-size:0.875;">Recipient Account No#:</span>
                        <br>
						<input type="text" name="recipient_acct_no" id="recipient_acct_no" class="text input" style="width:90%;" required>
                        </td>
                      </tr>
                      
                      <tr id="recipient_bank">
                        <td>
                        <span style="font-size:0.875;">Recipient Bank:</span>
                        <br>
						<input type="text" name="recipient_bank" id="recipient_bank" class="text input" style="width:90%;" required>
                        </td>
                      </tr>
                      
                      <tr id="teller_no">
                        <td>
                        <span style="font-size:0.875;">Bank Teller No# :</span>
                        <br>
						<input type="text" name="bank_tellerno" id="bank_tellerno" class="text input" style="width:90%;" required>
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <td>
                        <span style="font-size:0.875;">Amount:</span>
                        <br>
						<input type="text" name="amount_paid" id="amount_paid" class="text input" style="width:90%;" required>
                        </td>
                      </tr>
                      
    
                      <tr>
                        <td><input name="cmdclick" id="cmdclick" type="submit" value="Submit &rarr;" class="" /></td>
                      </tr>
                    
                 </table>

              </form>
            </div>
        
        </div>--><!--end class righttxt-->

      </div>
      

      </div></div>
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

