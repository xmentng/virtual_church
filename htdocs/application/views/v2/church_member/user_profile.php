<?php

//retrieve data
		//rettrieve the total testimonies
		$testimonies = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('church_id'=>$page_res['church_id'], 'status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$announcement = useraccount::loadDetails($tableName="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'status'=>1),$arrAttribute=array('id', 'church_id', 'notice_board_content', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$online_users = useraccount::loadDetails($tableName="tbl_users",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'is_online'=>1),$arrAttribute=array('id', 'church_id', 'first_name', 'last_name', 'is_online', 'profile_pic'),$num=NULL,$orderBy='');
		
		$flag_limit = 4;
		

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="/v2_assets/v2_images/favicon.png">

    <title><?php  echo @$data['page_title'];   ?></title>
    
    <!-- Countdown CSS -->
    <link href="/v2_assets/v2_css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800' rel='stylesheet' type='text/css'>
 
	<link href="/v2_assets/v2_css/main.css" rel="stylesheet" media="all">


    <link href="/v2_assets/v2_cssbootstrap.min.css" rel="stylesheet">
    <link href="/v2_assets/v2_css/bootstrap-reset.css" rel="stylesheet">
    <link href="/v2_assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/v2_assets/v2_css/style.css" rel="stylesheet">
    <link href="/v2_assets/v2_css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<?php $this->load->view('v2/church_member/headmast')  ?>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            
		<?php $this->load->view('v2/church_member/left_sidebar')  ?>
    </div>
</aside>
<!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                       <div class="col-md-3">
                           <div class="profile-pic text-center">
                               <img src="<?php echo CUSTOM_BASE_URL.$this->session->userdata('profile_pic');   ?>" alt=""/>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="profile-desk" style="width:100%; border:none; padding-right:0%;">
                               <h1><?php  echo $this->session->userdata('name_of_user');  ?></h1>
                               <!--<span class="text-muted">Product Manager</span>-->
                               <p>
                                   <br>
								   <span>E-Mail</span>: <?php echo $this->session->userdata('email');   ?>
								   <br>
								   <span>Country</span>: <?php if($this->session->userdata('country')){echo $this->session->userdata('country'); } else { echo " Nil";  }   ?>
								   <br>
								   <span>Church</span>: <?php echo $this->session->userdata('church_name');   ?>
								   <br>
								   <span>Cell Name</span>: <?php if ($this->session->userdata('cell_name')){echo $this->session->userdata('cell_name');} else { echo " Nil";  }   ?>
                               </p>
                               
                           </div>
                       </div>
                       
                    </div>
                </section>
            </div>
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#personal-info">
                                    Edit Personal Detail
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#change-pwd">
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#uploadpix" class="contact-map">
                                    Update Picture
                                </a>
                            </li>
                            
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="personal-info" class="tab-pane active">
                                <div class="row">
                                    <div class="panel-body">
                            <div class=" form">
							
								<form class="cmxform form-horizontal " id="frm-chg-profile" method="post" action="">
									
									<div id="chg-profile-msg-div" class=""></div>
									
									
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">First Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="first_name" name="first_name" minlength="2" type="text" value="<?php  echo $this->session->userdata('first_name');  ?>" required />
                                        </div>
                                    </div>
									
									<div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Last Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="last_name" name="last_name" minlength="2" type="text" value="<?php  echo $this->session->userdata('last_name');  ?>" required />
                                        </div>
                                    </div>
									
									
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">E-Mail</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="email" type="email" name="email" required value="<?php  echo $this->session->userdata('email');  ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
										<label class="control-label col-lg-3">Phone Number</label>
										<div class="col-lg-6">
											<input type="text" placeholder="" data-mask="(999) 999-9999" class="form-control" value="<?php  echo $this->session->userdata('phone_no');  ?>" name="phone_no" id="phone_no">
											<span class="help-inline"></span>
										</div>
									</div>
									
									<div class="form-group">
										
										<label for="cemail" class="control-label col-lg-3">Bith Date:</label>
										<div class="col-lg-2">
										Day:
										<select class="form-control" style="width: 80%" id="bday"  name="lstbday">
											<option value=""></option>
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
											
										</select>
										</div>
										<div class="col-lg-2">
										Month:
										<select class="form-control" style="width: 80%" id="bmonth"  name="lstbmonth">
											<option value=""></option>
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
										</select> 
										</div>
										<div class="col-lg-2">
										Year:
										<select class="form-control" style="width: 80%" id="byear"  name="lstbyear">
											<option value=""></option>
											
											<?php
												for($i = 1960; $i < date("Y"); $i++){
											?>
											<option value="<?php  echo $i;  ?>"><?php  echo $i;  ?></option>
											<?php
												}
												
											?>
										</select>
									</div>
                                    </div>
                                    <div class="form-group">
										<label class="control-label col-lg-3">Country</label>
										<div class="col-lg-6">
											<select class="form-control" style="width: 80%" id="source" required name="country">
												<option selected="selected" value="<?php echo $this->session->userdata('country');    ?>"><?php echo $this->session->userdata('country');     ?></option>
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
											
											<input name="church_id" type="hidden" value="<?php echo $this->session->userdata('church_id'); ?>">
         <input name="user_id" type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>">
										</div>
										</div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-info" type="submit" id="btn-personal-info">Submit</button>
                                        </div>
                                    </div>
                                </form>
						
                            </div>

                        </div>
                      </div>
                            </div>
                            <div id="change-pwd" class="tab-pane ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="frm-chg-password" method="post" action="">
                                    <div id="chg-pwd-msg-div" class="cls_info col-md-12"></div>
									 
                                    <div class="form-group ">
                                        <label for="cpassword" class="control-label col-lg-3">Old Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="prev_pwd" type="password" name="prev_pwd" required />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="cpassword" class="control-label col-lg-3">New Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="new_pwd" type="password" name="new_pwd" required />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="cpassword" class="control-label col-lg-3">Confirm New Password</label>
                                        <div class="col-lg-6">
                                            <input  class="form-control " id="confirm_pwd" type="password" name="confirm_pwd" required />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-info" type="submit" id="btnchgpwd">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="uploadpix" class="tab-pane">
                                <div class="form-group last">
										<label class="control-label col-md-3"></label>
										<div class="col-lg-9">
											<div id="chg-pic-msg-div"></div>
													 
											<form  class="form-inline"  enctype="multipart/form-data" id="form_channel" name="forminfo" style="padding:3px 12px;" method="post">
								
											  <div class="row" style="margin:5px 10px">
											 
													 <div class="input-prepend span4 form-span">
														<label for="cpassword" class="control-label">Please Select Picture:</label>
														<br>
														<span class="add-on"><i class="icon-upload"></i></span>  
														<input type="file" id="userfile" name="userfile">
														
													</div>
											   </div>
											  
											  <div class="row" style="margin:10px 10px">              
												<span class="span3 form-span">
													 <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-primary">
											   </span>
											 </div>

								 <!-----ends row--!--->            
								
											</form>      
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
            </div>
        </section>
        <!--chat end-->
    </div>
                    
                </section>
            </div>
            
            
            
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">
<div class="right-stat-bar">
<?php  $this->load->view('v2/church_member/right_side_bar_content');   ?>
</div>
</div>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="/js/jquery-1.8.2.min.js"></script>
<script src="/v2_assets/v2_js/jquery.js"></script>
<script src="/v2_assets/v2_js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/v2_assets/v2_js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/v2_assets/v2_js/jquery.scrollTo.min.js"></script>
<script src="/v2_assets/v2_js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="/v2_assets/v2_js/jquery.nicescroll.js"></script>

<!--common script init for all pages-->
<script src="/v2_assets/v2_js/scripts.js"></script>
<script src="/v2_assets/v2_js/jquery-1.9.0.min.js"></script>

<script src="/v2_assets/v2_js/countdown.js"></script>
<script>
$('#form_channel').submit(function(){

	//alert(1); return false;
	
	$('#chg-pic-msg-div').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
	$('#chg-pic-msg-div').removeClass('alert alert-danger');
	$('#chg-pic-msg-div').removeClass('alert alert-success');
	$('#chg-pic-msg-div').addClass('info');
	
	 var formData = new FormData(document.getElementById("form_channel"));
	
	$.ajax({
		
		url:"<?php echo CUSTOM_BASE_URL ?>" + "/churchmember/uploadpicture2",	
		type:"POST",
		data: formData,
		processData: false,  // tell jQuery not to process the data
  		contentType: false,  // tell jQuery not to set contentType
		success: function(data){
			//alert(data); return false;
			//var result = $.parseJSON(data);
				/*
				if(result.id == 1){	
					$('#row').html(result.msg);
					$('#row').addClass('alert alert-success');
					$('#channel').modal('hide');
					$('#form_channel').reset();				
					window.location.replace("<?= base_url('admin/channel'); ?>");
										
				}
				if(result.id == 0){
					
					$('.error').html(result.msg);
					$('.error').addClass('alert alert-danger');
					$('#channel').modal('show');
					$('#form_channel').reset();
					return false;	
				} 
				*/
				
				
				var sp = data.split('|');
				
				if(sp[0] == 'success'){
				
					$('#chg-pic-msg-div').removeClass('info');
					$('#chg-pic-msg-div').removeClass('alert alert-danger');
					$('#chg-pic-msg-div').addClass('alert alert-success');
		
					$('#chg-pic-msg-div').html(sp[1]);
					document.location="/churchmember/profile";
				
				}//end if
			
			
				if(sp[0] == 'failure'){
				
					$('#chg-pic-msg-div').removeClass('info');
					$('#chg-pic-msg-div').removeClass('alert alert-success');
					$('#chg-pic-msg-div').addClass('alert alert-danger');
		
					$('#chg-pic-msg-div').html(sp[1]);
				
				
				}//end if
				
				
			}//end function success
		
	});	
	return false;	
		
});
 
 

</script>
<script type="text/javascript">
/////////////////////////////////////////////////



////////////////////////////////////////////////
function startCallback() {
	// make something useful before submit (onStart)
	$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
	$('#post_result_msg').removeClass('error');
	$('#post_result_msg').removeClass('success');
	$('#post_result_msg').addClass('info');
	return true;
}//end function
 
 
function completeCallback(resp)
{
				
	var response = $.parseJSON(resp);
	
	if(response.status){
		$('#post_result_msg').html(response.message);
		$('#post_result_msg').removeClass('error');
		$('#post_result_msg').addClass('success');
	}else{
		//alert($('#post_result_msg').html());
		$('#post_result_msg').html(response.error);
		$('#post_result_msg').removeClass('success');
		$('#post_result_msg').addClass('error');
								
	}
											
}//end function


function call_update_personalInfo(){
	
	//alert('running...');
	$('#chg-profile-msg-div').removeClass('alert alert-danger');
	$('#chg-profile-msg-div').removeClass('alert alert-success');
	$('#chg-profile-msg-div').addClass('info');
	
	$('#chg-profile-msg-div').html('<img src="/images/loading.gif" align="absmiddle" />&nbsp; Please wait...');
	
	$.ajax({
		type:	"POST",
		url:	"/postmanager/update_user_profile",
		data:	$('#frm-chg-profile').serialize(),
		success:	function(varCallBack){
			
			//alert(varCallBack); return false;
			var sp = varCallBack.split('|');
			
			if(sp[0] == 'success'){
				
				$('#chg-profile-msg-div').removeClass('info');
				$('#chg-profile-msg-div').removeClass('alert alert-danger');
				$('#chg-profile-msg-div').addClass('alert alert-success');
	
				$('#chg-profile-msg-div').html(sp[1]);
				document.location="/churchmember/profile";
				
			}//end if
			
			
			if(sp[0] == 'failure'){
				
				$('#chg-profile-msg-div').removeClass('info');
				$('#chg-profile-msg-div').removeClass('alert alert-success');
				$('#chg-profile-msg-div').addClass('alert alert-danger');
	
				$('#chg-profile-msg-div').html(sp[1]);
				
				
			}//end if
			
			
				
		
		}//end function success
	
	}); //end ajax function call
	
}//end function

function call_changePassword(){
	
	//alert('processing...');
	$('#chg-pwd-msg-div').removeClass('danger');
	$('#chg-pwd-msg-div').removeClass('success');
	$('#chg-pwd-msg-div').addClass('info');
	
	$('#chg-pwd-msg-div').html('<img src="/images/loading.gif" align="absmiddle" />&nbsp; Please wait...');
	
	$.ajax({
		type:	"POST",
		url:	"/postmanager/change_user_password",
		data:	$('#frm-chg-password').serialize(),
		success:	function(varCallBack){
			
			//alert(varCallBack); return false;
			var sp = varCallBack.split('|');
			
			if(sp[0] == 'success'){
				
				$('#chg-pwd-msg-div').removeClass('info');
				$('#chg-pwd-msg-div').removeClass('alert alert-danger');
				$('#chg-pwd-msg-div').addClass('alert alert-success');
	
				$('#chg-pwd-msg-div').html(sp[1]);
				document.location="/churchmember/profile";
				
			}//end if
			
			
			if(sp[0] == 'failure'){
				
				$('#chg-pwd-msg-div').removeClass('info');
				$('#chg-pwd-msg-div').removeClass('alert alert-success');
				$('#chg-pwd-msg-div').addClass('alert alert-danger');
	
				$('#chg-pwd-msg-div').html(sp[1]);
				
				
			}//end if
			
			
				
		
		}//end function success
	
	}); //end ajax function call
	
	
}//end function


function call_change_profilePic(){
	
	alert('running...');
}//end function

/////////////////////////////////////////////////
$(document).ready(function(){

	//////////// buttons click events ////////////
		//1.
		$('#btn-personal-info').click(function(e){
		
			e.preventDefault();
			call_update_personalInfo();
			return false;
		
		});
		
		
		//2.
		$('#btnchgpwd').click(function(e){
								 
			e.preventDefault();
			call_changePassword();
			return false;
		});
		
		
		
	
	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state

//////////////////////////////////////////////	
</script>
 


</body>
</html>
