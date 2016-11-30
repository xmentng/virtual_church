<?php $this->load->view('vw_header');  ?>



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
 <div class="container content_wr">
  <div class=" row rowbg">
<!--main content top-->
  <div class="twelve columns"> 
   <!--main Content-->
   <div class="Inner_content"> 
   <!--<h2>Profile on Pastor Chris</h2>-->
  <!-- <img src="images/innercity.jpg">-->
  <div class="clearfix"></div>
  <div class="messageWr"  style=" padding:5px 0">
    <div class="table-wrapper" style="width:100%">
            
        <div class="wrapper-panel">
          <div class="cls_sidebar" style="width:30%; float:left;">
            <div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
              <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;"> <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">Cell System</span> </div>
              <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;"> <a href="/churchadmin/cell/create" style="color: #000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Create Cell</span></a> </li>
              <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;"> <a href="/churchadmin/cell/view" style="color: #F45000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; View | Edit Cell</span></a> </li>
              <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;"> <a href="/churchadmin/cell_leader/create" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Create Cell Leader</span></a> </li>
              <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;"> <a href="/churchadmin/cell_leader/view" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; View | Edit Cell Leader</span></a> </li>
              
              
             <!-- <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                        <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">Cell System Report</span>
                    </div>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="#" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Cell Service Attendance Report</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="#" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Cell Partnership & Giving Reports</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="#" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Report on Souls Won</span></a>
                    </li>-->
            </div>
          </div>
          <!--end cls_sidebar-->
             
             <div class="cls_landing_page" style="width:70%; float:left;">
               
               <div class="cls_lpage_content" style="padding:0px 0px; margin:0; padding:0px 10px;">
               	
                	<p style="line-height:1.70em; text-align:justify; font-size:0.875em; padding:0px 7px">
                    
                    	<form action="" method="post" name="frmpost"  id="this-form">
    <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
    <em style="font-size:0.6875em; margin-bottom:10px; color:#F00;">*All fields are required.</em>
    <br>
    <br>
    <ul>
        <li class="field"><input class="text input" type="text" placeholder="Cell Name" name="cell_name" id="cell_name" value="<?php echo @$cell['cell_name'][0];   ?>" required /></li>
        <li class="field">
          <textarea name="cell_desc" class="text input" id="cell_desc" placeholder="Cell Description"><?php echo @$cell['cell_desc'][0];   ?></textarea>
        </li>
        <li class="field">
        	<select id="country" name="country"  class="text input" required>
                <option selected="selected" value="<?php echo @$cell['country'][0];   ?>"><?php echo @$cell['country'][0];   ?></option>
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
       
        <li class="field"><input name="church_id" type="hidden" value="<?php echo @$page_res['church_id']; ?>">
        <input name="cell_id" type="hidden" value="<?php echo @$page_res['cell_id']; ?>"></li>
       
        <li class="field">
        	<input name="submit_btn" id="cmdclick" class="pretty  primary btn" type="submit" value="&nbsp; Update Cell &nbsp;" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;"></li>
    </ul>
    </form>
                    
                    </p>
               
               </div>
              	
             </div>
             
             <div style="clear:both;"></div>
        </div>

    </div>


</div>

 
 <div class="clearfix"></div> 
 </div>
 </div>
 </div>
 </div>
 

  
   </div>
   
 </div>
 
 
 
 
 
 </div>
 </div>
      <div class=" clearfix"></div>

<!--FOOTER-->
<div class="main_footer2">
<?php  $this->load->view('vw_footer');  ?>
</div>
<script type="text/javascript" src="/js/paginate.js"></script>

<script type="text/javascript">

function delete_record(param){
	$.ajax({
		   type: "POST",
		   url:		"/delete/remove_ref_nbcontent/" + param,
		   data: $('#this-form').serialize(),
		   success:	function(e){
			   alert(e);
			   document.location="/churchadmin/notice_board_content/edit";
		   }//end success execution
	});
}//end function

/////////////////////////////////////////////////////

$('.cls_delete').click(function(){
	
	var id = $(this).attr('id');
	
	if (confirm("Do you want to delete this record?")) {
        delete_record(id);
    }
    return false;
});

//////////////////////////////////////////////////

$('#cmdclick').click(function(){
		
		
		$.ajax({
			   type: "POST",
			   		url:	"/postmanager/update_church_cell",
					data:	$('#this-form').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass("success");
								$('#post_result_msg').addClass("error");
								$('#post_result_msg').html(sp[1]);
								
								
				
							}//end if
							
							if(sp[0] == "success"){
						
								$('#post_result_msg').removeClass("error");
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').html(sp[1]);
								$('html, body').animate({scrollTop:0}, 'slow');
								document.location = "/churchadmin/cell/edit/<?php  echo $page_res['cell_id'];   ?>";
							}//end if
						
					}//end function success
		});//end ajax	
	
	
	return false;
	
});

///////////////////////////////////////////////////
$('#checkall:checkbox').change(function () {
    if($(this).attr("checked")) $('input:checkbox').attr('checked','checked');
    else $('input:checkbox').removeAttr('checked');
});
////////////////////////////////////////
var nof_chkbox = 0;
var uid = 0;
var chkbox_id=0;
var uid1 = 0;
var uid2 = 0;
$("input[name='reason']").on('click',function(e) {
    var itemselected = $("input[name='reason']:checked");
    var nof_chkbox = itemselected.length;
	
	chkbox_id = $("input[name='reason']:checked").attr('id');
	$('#id_edit').attr('rel',chkbox_id);
	$('#id_activate').attr('rel',chkbox_id);
	$('#id_deactivate').attr('rel',chkbox_id);
	uid = $('#id_edit').attr('rel');
	uid1 = $('#id_activate').attr('rel');
	uid2 = $('#id_deactivate').attr('rel');
	//alert(uid);
	$('#id_edit').click(function(){
		document.location="/churchadmin/useraccount/editaccount/" + uid;							 
	});
	
	$('#id_activate').click(function(){
		document.location="/churchadmin/activate_user/" + uid;
		return false;
	});
	
	$('#id_deactivate').click(function(){
		document.location="/churchadmin/deactivate_user/" + uid2;	
		return false;
	});
	
	
    
});
/////////////////////////////////////////
$('.uicon-thumbs-up').click(function(e){
	var uid = $(this).attr('id');
	document.location="/churchadmin/activate_user/" + uid;

	return false;
});

$('.uicon-thumbs-down').click(function(e){
	var uid = $(this).attr('id');
	document.location="/churchadmin/deactivate_user/" + uid ;
	return false;
});

///////////////////////////////////////////////////

	$('#id_delete_nbc').click(function(){
		var id_msg = $(this).attr("id");
		
		//alert(id_msg); return false; 
		var response = prompt("Are you sure you want to delete this record?","ok");
		
		if(response=='ok'){
			delete_nbcontent(id_msg);
		}
		return false;
			
		
	});//end click event
//////////////////////////////////////////////////


function delete_nbcontent(id_msg){
	
	
}

</script>

<!--END OF CONTENT-->


  </body>
</html>
