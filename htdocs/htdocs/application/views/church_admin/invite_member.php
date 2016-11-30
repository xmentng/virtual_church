<?php $this->load->view('vw_header'); ?>

<body class="whitebg">

<!--HEADER-->
<div id="header">
<!--<div class="cls_banner">

</div>-->
<div class="container">
<div class="row">
<div class="twelve columns">


<div id="header_logo" class="cls_banner" style="height:auto;">
   
    <img src="/user_res/banners/banner2.png"  alt="logo" />


</div>
<!--<div class="cls_about_portal">
	<a href="">About this Portal</a>
</div>-->
<!--<div id="header_time">
	<?php  //echo date('l, j F, Y');   ?><br>
<br><br><br>
<a href="#">About us  </a> <a href="#">| </a> <a href="#"> Contact us</a>

</div>-->
</div></div>
</div></div>

<!--NAVIGATION -->

<?php //$this->load->view('vw_horizontal_nav'); ?>

<!--CONTENT-->
<div class="container content_wr">
  <div class=" row rowbg">
<!--main content top-->
  <div class="twelve columns"> 
   <!--main Content-->
   <div class="Inner_content"> 
   <div class="clearfix"></div>
            Welcome To Christ Embassy Virtual Church Portal.
    <hr>


    <div class=""   style="border:solid 1px #70819C;  padding:0px 15px;">
	<!--<code class="_id_page_description" style="font-size:16px; border:none; color:#480000">
          <strong><?php //echo @$data['page_desc'];   ?></strong>
    </code>-->
    <form action="" method="post" name="frmpost"  id="this-form">
    <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
    <em style="font-size:11px; margin-bottom:10px;">*Required</em>
    <br>
    <br>
    <ul>
		First Name
		<br>
        <li class="field"><input class="text input" type="text" placeholder="First Name" name="first_name" id="first_name" value="<?php echo @$invite['invite_first_name'][0]; ?>"  /></li>
		Last Name
		<br>
        <li class="field"><input class="text input" type="text" placeholder="Last Name" name="last_name" id="last_name" value="<?php echo @$invite['invite_last_name'][0]; ?>"  /></li>
		E-mail
		<br>
        <li class="field"><input class="text input" type="text" placeholder="User Email" name="email" id="email" value="<?php echo @$invite['invite_email'][0]; ?>"  /></li>
		<li class="field">
        	Country:
             <br>
<select id="country" name="country"  class="text input" required title="Country">
  <option selected="selected" value="<?php echo @$invite['country'][0]; ?>"><?php echo @$invite['country'][0]; ?></option>
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
		User Name
		<br>
        <li class="field"><input class="text input" type="text" placeholder="User Name" name="usn" id="usn" /></li>
		Password
        <li class="field"><input class="password input" type="password" placeholder="User Password" name="usr_pwd" id="usr_pwd" value="<?php echo @$invite['invite_password'][0]; ?>"  /></li>
        <li class="field"><input name="church_id" type="hidden" value="<?php echo @$data['church_id']; ?>"></li>
        <li class="field"><select name="access_level_id" id="access_level" class="text input">
                             <option value="<?php echo @$access_levels['id'][2];?>">
                                 <?php echo @$access_levels['access_desc'][2];?>
                             </option> 
                          </select></li>
        <li class="field">
        	<input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="&nbsp; Register &nbsp;" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"></li>
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
	
	$('#buttons').click(function(){
		
		$.post('/postmanager/create_church_user_account/', $('#this-form').serialize(), function(e){
		//alert(e);return false;
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
				$('#post_result_msg').html(sp[1] + "<br> Kindly click <a href='/' title='Login'>here</a> to login");
				$('html, body').animate({scrollTop:0}, 'slow');
				$('#this-form')[0].reset();
			}//end if
		
		});	
		
		return false;
	});
	
	return false;
});

</script>    
    
<!--END OF CONTENT-->


  </body>
</html>
