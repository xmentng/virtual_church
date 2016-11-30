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
                
                <div class="nine columns">
                    <p style="line-height:1.70em; text-align:justify; font-size:0.875em;">
                    	
                        <form action="" method="post" name="frmmeeting" id="frmmeeting">
                                	<table width="100%" border="0" cellspacing="0" cellpadding="2">
                                      <tr>
                                        <td colspan="2">
                                        	<code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg_cmeeting">
                        						<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;
                                                To schedule a cell meeting, kindly fill out the detail on the below form.
                    						</code>
                                            <br>
                							<em style="font-size:0.6875em; margin-bottom:10px; color:#F00;">
                                            *Required.
                                            </em>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="16%" align="right">Meeting Title (<span class="style2">optional</span>):</td>
                                        <td width="84%" align="left"><input name="meetingTitle" type="text" id="meetingTitle"  style="width:75%;" /></td>
                                      </tr>
                                      <tr>
                                        <td align="right">Time of Meeting:</td>
                                        <td align="left">Hour:
                                          <select name="hour" id="hour">
                                            <?php
			for($a=0;$a<24;$a++){
				echo "<option value='$a'>$a</option>";
			}
		?>
                                          </select>
Minute:
<select name="minute" id="minute">
  <?php
			for($a=0;$a<60;$a++){
				echo "<option value='$a'>$a</option>";
			}
		?>
</select>
(GMT)</td>
                                      </tr>
                                      <tr>
                                        <td align="right">Date of Meeting:</td>
                                        <td align="left">Day:
                                          <select name="day" id="day">
                                            <?php
			for($a=1;$a<32;$a++){
				echo "<option value='$a'>$a</option>";
			}
		?>
                                          </select>
Month:
<select name="month" id="month">
  <?php
	  	$arrMonths = Misc::loadMonthsAsArray();
		foreach($arrMonths as $key=>$value){
			echo "<option value='$value'>".ucwords($key)."</option>";
		}
	  ?>
</select>
Year:
<select name="year" id="year">
  <?php
	  	//Allow the user set current year and max of a year into the future
		$yr = date('Y',Misc::serverTime());
		$yr1 = $yr +1;
		echo "<option value='$yr'>$yr</option><option value='$yr1'>$yr1</option>";
	  ?>
</select></td>
                                      </tr>
                                      <tr>
                                        <td align="right">Duration of Meeting:</td>
                                        <td align="left"><select name="duration" id="duration">
                                          <option value="<?php echo (30*60); ?>">30 Minutes</option>
                                          <option value="<?php echo (60*60); ?>">60 Minutes</option>
                                          <option value="<?php echo (90*60); ?>">90 Minutes</option>
                                        </select></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td align="left"><input type="submit" name="cmdScheduleMeeting" id="cmdScheduleMeeting" value="Schedule" />
                                        <input name="seenform2" type="hidden" id="seenform2" value="schedulecellmeeting" /></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>

                                
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

	$(".cls_create_cell").hide();
	$(".cls_view_cell").hide();
	$(".cls_cell_ol").hide();
	$(".cls_cell_meeting").hide();


$("a.topopup").click(function() {
								  //alert(1)
			selid = $(this).attr('id');
	
			
			$('#post_result_msg_cell').addClass("info");
			$('#post_result_msg_cell').html('<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Kindly fill out the detail on the below form.');
			$('#post_result_msg_cell').removeClass("error");
			$('#post_result_msg_cell').removeClass("success");
			$('#frmcell')[0].reset();
			/////////////////////////////////////////////////////////////////
			$('#post_result_msg_cl').addClass("info");
			$('#post_result_msg_cl').html('<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Kindly fill out the detail on the below form.');
			$('#post_result_msg_cl').removeClass("error");
			$('#post_result_msg_cl').removeClass("success");
			$('#frmcell_leader')[0].reset();
			////////////////////////////////////////////////////////////////
			
			$('#divLoading').addClass("info");
			$('#divLoading').html('&nbsp;<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To upload your cell outline, kindly fill out the detail on the below form.');
			$('#divLoading').removeClass("error");
			$('#divLoading').removeClass("success");
			$('#frmupload')[0].reset();
			
			////////////////////////////////////////////////////////////////
			
			/////////////////////////////////////////////////////////////////
			$('#post_result_msg_cmeeting').addClass("info");
			$('#post_result_msg_cmeeting').html('<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;To schedule a cell meeting, kindly fill out the detail on the below form.');
			$('#post_result_msg_cmeeting').removeClass("error");
			$('#post_result_msg_cmeeting').removeClass("success");
			$('#frmmeeting')[0].reset();
			////////////////////////////////////////////////////////////////
			
			loading(); // loading
			/*setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(selid); // function show popup
			}, 500)*/
		return false;
	});//end click

	/* event for close the popup */
	$("div.close").hover(
		function() {
			$('span.ecs_tooltip').show();
		},
		function () {
			$('span.ecs_tooltip').hide();
		}
	);

	$("div.close").click(function() {
		//popupStatus = 1;						  
		disablePopup();  // function close pop up
	});

	$(this).keyup(function(event) {
		if (event.which == 27) { // 27 is 'Ecs' in the keyboard
			disablePopup();  // function close pop up
		}
	});

        $("div#backgroundPopup").click(function() {
		disablePopup();  // function close pop up
	});

/////////////////////////////////////////////////////

	//////////////////////////////////////////////////

$('#cmdcell').click(function(){
		
		$('#post_result_msg_cell').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$.ajax({
			   type: "POST",
			   		url:	"/postmanager/create_church_cell",
					data:	$('#frmcell').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							
							if(sp[0] == "success"){
						
								$('#post_result_msg_cell').removeClass("error");
								$('#post_result_msg_cell').addClass("success");
								$('#post_result_msg_cell').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmcell')[0].reset();
							}//end if
							
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg_cell').removeClass("success");
								$('#post_result_msg_cell').addClass("error");
								$('#post_result_msg_cell').html(sp[1]);
								
								//$('html, body').animate({scrollTop:0}, 'slow');
				
							}//end if
							
							
						
					}//end function success
		});//end ajax	
	
	
	return false;
	
});

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
$('#cmdScheduleMeeting').click(function(e){
		
		
		e.preventDefault();
		$('#post_result_msg_cmeeting').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$('#post_result_msg_cmeeting').removeClass('error');
		$('#post_result_msg_cmeeting').removeClass('success');
		$.ajax({
   				type: "POST",
   				url: "/meetings/schedulemeeting/<?php echo CELL_MEETING_TYPE;  ?>",
   				data: $('#frmmeeting').serialize(),
   				success: function(resp){
					
							//alert(resp); return false;
    					 	var response = $.parseJSON(resp);
							
							if(response.status){
								$('#post_result_msg_cmeeting').html(response.message);
								$('#post_result_msg_cmeeting').removeClass('error');
								$('#post_result_msg_cmeeting').addClass('success');
							}
							else{
								//alert($('#divLoading').html());
								$('#post_result_msg_cmeeting').html(response.error);
								$('#post_result_msg_cmeeting').removeClass('success');
								$('#post_result_msg_cmeeting').addClass('error');
								
							}
							$("#frmmeeting :input").attr("disabled", false);
   						}
 		});
		//disable all form fields
		$("#formChangePassword :input").attr("disabled", true);
	
	
	return false;
	
});

/////////////////////////////////////////////////////
	

return false;
}); //end ready
	
	
	

//////////////////////////////////////////////////
/************** start: functions. **************/

	var popupStatus = 0; // set value

	function loading() {
		$("div.loader").show();
	}
	function closeloading() {
		$("div.loader").fadeOut('normal');
	}

	

	function loadPopup(src) {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			//param=1;
			$("#toPopup").fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			if(src=="id_create_cell"){
				$(".cls_create_cell").show();
				$(".cls_create_cl").hide();
				$(".cls_cell_ol").hide();
				$(".cls_cell_meeting").hide();
			}
			
			/*if(src=="id_view_cell"){
				$(".cls_view_cell").show();
				$(".cls_create_cl").hide();
			}*/
			
			if(src=="id_create_cell_leader"){
				$(".cls_create_cl").show();
				$(".cls_create_cell").hide();
				$(".cls_cell_ol").hide();
				$(".cls_cell_meeting").hide();
			}
			
			if(src=="id_cell_outline"){
				
				$(".cls_cell_ol").show();
				$(".cls_create_cl").hide();
				$(".cls_create_cell").hide();
				
				$(".cls_cell_meeting").hide();
			}
			
			if(src=="id_cell_meeting"){
				
				$(".cls_cell_meeting").show();
				$(".cls_cell_ol").hide();
				$(".cls_create_cl").hide();
				$(".cls_create_cell").hide();
				
				
			}
			
			//$('#id_selected_image').attr("src", src);
			$("#backgroundPopup").fadeIn(0001);
			popupStatus = 1; // and set value to 1
		}
	}

	function disablePopup() {
		if(popupStatus == 1) { // if value is 1, close popup
			$("#toPopup").fadeOut("normal");
			$("#backgroundPopup").fadeOut("normal");
			popupStatus = 0;  // and set value to 0
		}
	}
	/************** end: functions. **************/


function delete_nbcontent(id_msg){
	
	
}

</script>





  </body>
</html>
