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
                    	
                        <span style="font-size:1.125em; font-weight:bolder;">Welcome to Our Virtual Cell System</span>
                        <br>
						<br>
 
                        This utility allows churches develop virtual cell system; providing the churches the opportunities to:
                        <br>
                        <br>
                        1. Engage in online cell meeting with cell members
                        <br>
                        2. Assign Cell Leaders to created church cells
                        <br>
						3. Perform weekly cell meetings
                        <br>
						4. View and Edit created cells and cell leaders.
                        <br>
                        5. You can also schedule online meetings with all your members or just a select group of your members. All you require is a properly installed webcam and a microphone connected to your computer.
                        <br>
						<br>
						To peruse this functionality, kindly use the menus on your left hand side of this page.
                        
                    
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
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(selid); // function show popup
			}, 500); // .5 second
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
