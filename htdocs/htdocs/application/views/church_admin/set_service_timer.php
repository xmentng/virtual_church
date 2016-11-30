<?php $this->load->view('vw_header');  ?>

<style>

.cls_landing_page table tr td label{
	font-size:1.0625em;	
}

.cls_landing_page table tr td input[type=text]{
	border:solid 1px  #707070;	
}

</style>

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
             <div class="three columns cls_sidebar">
              	<div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
        	
                    <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                        <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder;">Live Service Menus</span>
                    </div>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/church_service/set_timer" style="color: #F45000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Set Service Timer</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/church_service/cancel_timer" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Cancel Timer</span></a>
                    </li>
                    
                    
                    
                   
        		</div>
             </div> <!--end cls_sidebar-->
             
             <div class="nine columns cls_landing_page" style="font-size:0.8125em; padding:0px 7px; border:solid 1px #A0A0A0;">
<!--             <div class="cls_frmpost" style="font-size:0.8125em; padding:0px 7px;">
-->
              <form action=""  name="frmtimer" id="frmtimer" style="font-size:0.8125em;">
                  <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>

              <table width="100%" border="0" cellspacing="0" cellpadding="7" style="font-size:0.0.6875em;">
                  <tr style="font-size:0.6875em;">
                    <td width="18%"><label>Year:</label>
                      <input  name="year" type="text" style="width:20%"></td>
                    <td width="9%"><label>Month:</label>
                      <input  name="month" type="text" style="width:20%"></td>
                    <td width="17%"><label>Day:</label>
                      <input  name="day" type="text" style="width:20%"></td>
                    <td width="16%"><label>Hour:</label>
                      <input  name="hour" type="text" style="width:20%"></td>
                    <td width="14%"><label>Minute:</label>
                      <input  name="minute" type="text" style="width:20%" id="minute"></td>
                    <td width="26%" valign="top"><label>Time Zone:</label>
                      <select  name="TimeZone" type="text" style="width:20%; height:30px">
                        <option value="-1">-1</option>
                        <option value="-2">-2</option>
                        <option value="-3">-3</option>
                        <option value="-4">-4</option>
                        <option value="-5">-5</option>
                        <option value="-6">-6</option>
                        <option value="+1">+1</option>
                        <option value="+2">+2</option>
                        <option value="+3">+3</option>
                        <option value="+4">+4</option>
                        <option value="+5">+5</option>
                        <option value="+6">+6</option>
                      </select></td>
                  </tr>
                  <tr>
                    <td><label>Service Days</label>
                      <select  name="service_day" id="service_day" type="text" style="width:60%; height:30px">
                        <option value="sunday">Sunday</option>
                        <option value="wednesday">Wednesday</option>
                       
                      </select></td>
                    <td colspan="5">
                    	<input  name="cmdclick" id="cmdclick" type="Submit"  value="Set Timer" style="width:auto; height:30px;background:#333; color:#fff">
                        <input name="church_id" type="hidden" value="<?php echo @$page_res['church_id']; ?>">
                    </td>
                    </tr>
                </table>
				</form>
                

              <!--</div>--><!--end cls_frmpost-->

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
			   		url:	"/postmanager/set_church_service_timer",
					data:	$('#frmtimer').serialize(),
					success:	function(e){
							
							//alert(e); return false;
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
								$('#post_result_msg').html(sp[1]);
								$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmtimer')[0].reset();
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
