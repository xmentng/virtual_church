<?php include_once('layouts/page_head.php'); ?>

<?php include_once('layouts/more_scripts.php'); ?>
<link rel="stylesheet" href="/css/chat.css" type="text/css" />
<?php include_once('layouts/header.php'); ?>

<!-- #main-content -->
<section id="main-content" class="post">
	<!-- #blog -->
	<article id="blog" class="container" style="background-color:#fff; ">
		<div id="ajax-content" class="single-wrap">
			<div class="remove-if-ajax row">
				<div class="col-md-12 title-wrap">
					<h1 class="title-secondary"> <?php  echo @$data['page_name'];  ?></h1>
					
				</div>
			</div>
			<div class="row">
    
			    <div class="col-md-12" style="margin-bottom:50px; font-size: 12.7px;">
				
					<div class="col-md-12" style="">
						
						<?php $this->load->view('v2/cell_leader/admin_sidebar') ?>
    
						
					</div>
					
					
	
				</div>
       
	    		<div class="col-md-12">
	    			
	    			<div class=" form">
							
								<form class="cmxform form-horizontal " id="frmpost" method="post" action="">
									
									<div class="col-md-12" id="post_result_msg">
                       	   					<?php echo @$data['info_msg'];  ?>
                      				 </div>
									
									
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">First Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="first_name" id="first_name" minlength="2" type="text"  required />
                                        </div>
                                    </div>
									
									<div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Last Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="last_name" id="first_name" minlength="2" type="text"  required />
                                        </div>
                                    </div>
									
									
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">E-Mail</label>
                                        <div class="col-lg-6">
                                            <input class="form-control "  type="email" name="email" id="email" required  />
                                        </div>
                                    </div>
                                    
									
									
                                    <div class="form-group">
										<label class="control-label col-lg-3">Country</label>
										<div class="col-lg-6">
											<select class="form-control" style="width: 80%" id="country" name="country" required>
												<option selected="selected" value="">--Select--</option>
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
											</select>
											
											
         
										</div>
										</div>
										
									<div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">User Name:</label>
                                        <div class="col-lg-6">
                                            <input class="form-control "  type="" name="usn" id="usn" required />
                                        </div>
                                    </div>
                                    
                                    	
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-info" type="submit" name="cmdclick" id="cmdclick">Submit</button>
                                        </div>
                                    </div>
                                </form>
						
                            </div>
	    			
	    		</div>
		
	        
			</div>
		</div>


	</article>
	<!-- /#blog -->
</section>
<!-- /#main-content -->
<script src="<?php echo CUSTOM_BASE_URL  ?>/js/jquery-1.8.2.min.js"></script>
<script>
	
	$(document).ready(function(){

		$(".cls_create_cell").hide();
		$(".cls_view_cell").hide();
		$(".cls_cell_ol").hide();
		$(".cls_cell_meeting").hide();
			
		
		
		
		
		///////////////////////////////////////////////////
$('#cmdclick').click(function(e){
		
		
		e.preventDefault();
		
		$.ajax({
			   type: "POST",
			   		url:	"/cellleader/createcellmember",
					data:	$('#frmpost').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass("alert alert-danger");
								$('#post_result_msg').addClass("alert alert-success");
								$('#post_result_msg').html(sp[1]);
								
								$('html, body').animate({scrollTop:0}, 'slow');
				
							}//end if
							
							if(sp[0] == "success"){
						
								$('#post_result_msg').removeClass("error");
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').html(sp[1]);
								$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
							}//end if
						
					},//end function success
					
					beforeSend:	function(){
						
						$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
						$('#post_result_msg').removeClass('alert alert-danger');
						$('#post_result_msg').removeClass('alert alert-success');
					}//end function
		});//end ajax	
		
	
	return false;
	
});
		
	
	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state


 
</script>
<?php //include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
