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
<?php $this->load->view('vw_headmast'); ?>
<!--NAVIGATION -->


  
  

<!--CONTENT-->
<div class="container content_wr">
<div class=" row rowbg">
<!--main content top-->
  <div class="twelve columns"> 
       <!--main Content-->
       <div class="Inner_content"> 
           <!--<h2>Profile on Pastor Chris</h2>-->
          <!-- <img src="images/innercity.jpg">-->
           <div class="greybar">
             <?php $this->load->view("church_member/page_name_welcome_user");   ?>
              
          </div><!--end class greybar-->
          
      <!--FORM-->
       </div>

 </div>

 </div><!--end row-->
 <div class="row">
 
 	<div class="row cls_landing_page" style="font-size:0.75em; height:60px; background: #FFF; width:100%;">
    
			<div class="row twelve columns" style="width:100%;background:#444;margin-bottom:0%;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
    
    </div>
 
 </div>
 <div class="row">
 		<div class="twelve columns" style="font-size:0.875em;">
        		
               <!-- <div class="three columns">
                   <div class="navbasr" style="border:solid 1px #70819C; font-size:11px; ">
                         <?php //$this->load->view("church_member/cell_system_sidebar"); ?>
                   </div>
                </div>-->
                
                <div class="twelve columns">
                    <div style="line-height:1.70em; text-align:justify; font-size:0.875em; border:solid 1px #5C7381; padding:0px 10px;">
                    	
                        <form method="post" id="frmpost" name="frmpost" >
                            	<code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
                            	<table width="100%" border="0" cellspacing="0" cellpadding="7">
                                  <tr>
                                    <td width="14%" valign="top"><span>Cell Name:</span></td>
                                    <td width="86%">
                                   	  <select name="lstcells" id="lstcell" style="width:80%;">
                                        	<option value=""></option>
											<?php 
												if(count($cell['id']) > 0){ 
													for($i = 0; $i <  count($cell['id']); $i++){
											?>
                                            <option value="<?php  echo @$cell['id'][$i];   ?>"><?php  echo @$cell['cell_name'][$i];   ?></option>
                                            
                                            <?php  } } ?>       	     
                                        </select>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td valign="top">&nbsp;</td>
                                    <td><input  name="cmdclick" id="cmdclick" type="Submit"  value="Join Cell" style="width:auto; height:30px;background:#333; color:#fff">
                        <input name="church_id" type="hidden" value="<?php echo @$page_res['church_id']; ?>">
                        <input name="cell_member_id" type="hidden" value="<?php echo @$page_res['user_id']; ?>"></td>
                                  </tr>
                                </table>

                            </form>
                        
                    
                    </div>
                    
                    
                </div>
               
        
        </div>
        
        

	
 </div><!--end row-->
 


</div><!--end class container-->

<!--FOOTER-->
<div class="main_footer2" style="bottom:0; position:fixed;">
<?php  $this->load->view('vw_footer');  ?>
</div>
<script type="text/javascript" src="/js/paginate.js"></script>

<script type="text/javascript">


/////////////////////////////////////////////////////
var selid;
$(document).ready(function(){



$('#cmdclick').click(function(){

		$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		$.ajax({
			   type: "POST",
			   		url:	"/churchmember/proc_cell_joined",
					data:	$('#frmpost').serialize(),
					success:	function(resp){
							//alert(resp); return false;
							var response = $.parseJSON(resp);
							
							if(response.status){
									$('#post_result_msg').html('<img src="/images/success_small.png" />' + response.message);
									$('#post_result_msg').removeClass('error');
									$('#post_result_msg').addClass('success');
									
									document.location="/churchmember/";
							}
							else{
									//alert($('#post_result_msg').html());
									$('#post_result_msg').html(response.error);
									$('#post_result_msg').removeClass('success');
									$('#post_result_msg').addClass('error');
											
							}
							
						
					}//end function success
		});//end ajax	
	
	
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
