<?php $this->load->view('vw_header');  ?>

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
          
      <!--FORM-->
       </div>

 </div>

 </div><!--end row-->
 
 <div class="row">
 		<div class="twelve columns" style="font-size:0.875em;">
        		
                <div class="three columns">
                   <?php   $this->load->view('church_admin/cell_system_sidebar'); ?>
                </div>
                
                <div class="nine columns" style="font-size:11px;">
                    <p style="line-height:1.70em; text-align:justify;">
                    	
                        <form action="" method="post" name="frmcell_leader"  id="frmcell_leader">
                    <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg_cl">
                        <?php echo @$data['info_msg']; ?>
                    </code>
                	<em style="font-size:0.6875em; margin-bottom:10px; color:#F00;">*All fields are required.</em>
                
                    <br>
                    <ul>
                    
                            <li class="field">
                                
								
								<strong>Choose a Cell:</strong>
								<br>
                                <select name="cell_id"   class="text input" id="cell_id" required style="font-size:12px; width:75%;" placeholder="Cell Name" >
                                    <option selected="selected" value="">Cell Name</option>
                                    
                                    <?php
                                        if($data['n_cells'] > 0 ){
                                            for($i = 0; $i < $data['n_cells']; $i++){
                                    ?>
                                    <option value="<?php  echo @$cell['id'][$i];  ?>"><?php echo @$cell['cell_name'][$i]; ?></option>
                                    <?php
                                            }
                                        }
                                    
                                    ?>	
                                 </select>   
                            </li>
                            <!--<li class="field"><input class="text input" type="text" placeholder="Cell Leader E-Mail" name="cleader_email" id="cleader_email" required /></li>-->
                            <li class="field">
							<strong>Select Cell Leader:</strong>
							<br>
							<select name="cleader_name" size="100"  class="text input" id="cleader_name" required style="height:250px;font-size:12px;width:75%" >
                                    <option selected="selected" value=""></option>
                                    
                                    <?php
                                        if(count($memberInfo['id']) > 0 ){
                                            for($j = 0; $j < count($memberInfo['id']); $j++){
											
											$name = @$memberInfo['first_name'][$j].' '.@$memberInfo['last_name'][$j];
                                    ?>
                                    <option value="<?php  if($name)echo @$memberInfo['id'][$j];  ?>"><?php if($name)echo $name; ?></option>
                                    <?php
                                            }
                                        }
                                    
                                    ?>	
                            </select>   
							
							</li>
                            <li class="field">
                                <select id="country" name="country"  class="text input" required style="font-size:12px; width:75%;">
                                    <option selected="selected" value="">---country---</option>
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
                           
                            <li class="field"><input name="church_id" type="hidden" value="<?php echo @$page_res['church_id']; ?>"></li>
                           
                            <li class="field">
                                <input name="submit_btn" id="cmdcell_leader" class="pretty  primary btn" type="submit" value="&nbsp; Create Cell Leader &nbsp;" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"></li>
                        </ul>
                        </form>
                        
                    
                    </p>
                    
                    
                </div>
               
        
        </div>
        
       
	<div class="loader"></div>
   	<div id="backgroundPopup"></div>
 
 </div><!--end row-->
 


</div><!--end class container-->

<!--FOOTER-->
<div class="main_footer2">
<?php  $this->load->view('vw_footer');  ?>
</div>
<script type="text/javascript" src="/js/paginate.js"></script>

<script type="text/javascript">


/////////////////////////////////////////////////////
var selid;
$(document).ready(function(){


//////////////////////////////////////////////////

$('#cmdcell_leader').click(function(){
		
		$('#post_result_msg_cl').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$.ajax({
			   type: "POST",
			   		url:	"/postmanager/create_cell_leader",
					data:	$('#frmcell_leader').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							if(sp[0] == "failure"){
								
								$('#post_result_msg_cl').removeClass("success");
								$('#post_result_msg_cl').addClass("error");
								$('#post_result_msg_cl').html(sp[1]);
								
								//$('html, body').animate({scrollTop:0}, 'slow');
				
							}//end if
							
							if(sp[0] == "success"){
						
								$('#post_result_msg_cl').removeClass("error");
								$('#post_result_msg_cl').addClass("success");
								$('#post_result_msg_cl').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmcell_leader')[0].reset();
							}//end if
						
					}//end function success
		});//end ajax	
	
	
	return false;
	
});

///////////////////////////////////////////////////

	

return false;
}); //end ready
	

</script>





  </body>
</html>
