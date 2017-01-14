<?php $this->load->view('vw_header');  ?>
<body class="whitebg">
<style>
#backgroundPopup {
    z-index:1;
    position: fixed;
    display:none;
    height:100%;
    width:100%;
    background:#000000;
    top:0px;
    left:0px;
}
#toPopup {
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    background: none repeat scroll 0 0 #FFFFFF;
    border: 10px solid #ccc;
    border-radius: 3px 3px 3px 3px;
    color: #333333;
    display: none;
    font-size: 14px;
    left: 50%;
    margin-left: -402px;
    position: fixed;
    top: 20%;
    width: 800px;
    z-index: 2;
	height:500px;
}
div.loader {
    background: url("/images/loading.gif") no-repeat scroll 0 0 transparent;
    height: 32px;
    width: 32px;
    display: none;
    z-index: 9999;
    top: 40%;
    left: 50%;
    position: absolute;
    margin-left: -10px;
}
div.close {
    background: url("/images/closebox.png") no-repeat scroll 0 0 transparent;
    cursor: pointer;
    height: 30px;
    position: absolute;
    right: -27px;
    top: -24px;
    width: 30px;
}
span.ecs_tooltip {
    background: none repeat scroll 0 0 #000000;
    border-radius: 2px 2px 2px 2px;
    color: #FFFFFF;
    display: none;
    font-size: 11px;
    height: 16px;
    opacity: 0.7;
    padding: 4px 3px 2px 5px;
    position: absolute;
    right: -62px;
    text-align: center;
    top: -51px;
    width: 93px;
}
span.arrow {
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 7px solid #000000;
    display: block;
    height: 1px;
    left: 40px;
    position: relative;
    top: 3px;
    width: 1px;
}
div#popup_content {
    margin: 4px 7px;
    /* remove this comment if you want scroll bar
    overflow-y:scroll;
    height:200px
    */
}

.cls_rsbar_content li a{
	color:#00496C;
	display:block;
	width:100%;
}

.cls_rsbar_content li a span{
	width:40%;
}

.cls_rsbar_content li a:hover{
	color:white;
	font-weight:bolder;
	background-color:#0077B0;
}


.cls_rsbar_content li a  .total_giving{
	color:green;
	font-size:1.3125em;
	font-weight:bolder;
}


.cls_rsbar_content li a  .active{
	color:red;
	font-size:1.3125em;
	font-weight:bolder;
}

.cls_rsbar_content li a  .active:hover{
	color:white;
	font-weight:bolder;
	background-color:#0077B0;
}



</style>
<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
             <?php $this->load->view("church_member/page_name_welcome_user");   ?>
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#E8E8E8;margin-bottom:5%;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="cls_landing_page_content">
            	
                <div class="row  35perc_col_content" style="width:25%; float:left;">
                	
                	<div class="four columns" style="width:100%; margin-top:5px;">
                    	<ul>
                        	<li style="height:35px; line-height:35px; background-color:#63677A; color:#FFF;">
                            	
                                <span style="padding:0px 10px; font-weight:bolder;width:100%">Announcement</span>
                                
                            </li>
                            
                        	<li>
                            	<a href="">
                                	<span style="padding:0px 10px;"> <?php   echo $notice_board['notice_board_content'][0];   ?></span>
                                </a>
                            </li>
                            
                           <li style="height:35px; line-height:35px; background-color:#63677A; color:#FFF;">
                            	
                                <span style="padding:0px 10px; font-weight:bolder; width:100%">Help Lines</span>
                                
                            </li>
                            <?php
								if($data['n_help_lines']>0){
									
									for($j=0; $j<$data['n_help_lines']; $j++){
							
							?>
                            
                        	<li>
                            	<a href="">
                                	<span style="padding:0px 10px;"> <?php   echo $support['help_line'][$j];   ?></span>
                                </a>
                            </li>
                            
                             <?php
									}
								}
							?>
                            
                            
                        </ul>
                    </div>
     			
            	</div><!--end class 35perc_col_content-->
                
                
                <div class="65perc_col_content" style="width:75%; float:right;">
                	
                    <?php
						if($data['n_tract'] > 0 ){
							$sn=0;
							
					?>
                    
                    <div class="row">
                    	<div class="twelve columns" style="padding:0px 7px; border:solid 1px #ACB5C4; margin-top:5px;">
                        	<?php for($i=0; $i<$data['n_tract']; $i++): ?>
                            
                            <div class="two columns" style="margin-top:5px; margin-bottom:5px;">
                            	<a href="#" id="<?php echo $tract['id'][$i];    ?>"  class="topopup">
                                	<img src="<?php echo "/picdisplay.php?dm=".base64_encode('150X150').'&pt='.base64_encode($tract['pic_path'][$i]); ?>" align="absmiddle" id="id_sel_img<?php echo $tract['id'][$i];    ?>" />
                                </a>
                            </div>
                            
                            <?php  endfor; ?>
                           
                        </div>
                    </div><!--end row-->
                    <?php
							
						}else{
							
					?>
                    
                    <div class="row">
                    	<div class="twelve columns" style="padding:0px 7px; border:solid 1px #ACB5C4; margin-top:5px;">
                        	
                           There are no current record.
                           
                        </div>
                    </div><!--end row-->
                    
                    <?php
					
						}
					?>
                    
                    <div id="toPopup">

                        <div class="close"></div>
                        <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
                        <div id="popup_content"> <!--your content start-->
                            <table width="100%" border="0" cellspacing="0" cellpadding="2">
  								<tr>
                                    <td style="padding:10px; text-align:center; background:#000">
                                        <img id="id_selected_image" src="" width="450" height="350" alt="card" / >
                                    </td>
  								</tr>
                                  <tr>
                                    <td>
                                    <h5>Send this card to someone special</h5>
    
                                           <form name="frmpost" id="frmpost" method="post" action="">
                                           <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg">
										   		<?php echo @$data['info_msg']; ?>
                                           </code> 
                                           
                                            
                                               <fieldset id="itemDetails">
                      
                                                Recipient Name: 
                                                <input  class="textfield" tabindex="1" recname="itemName"  type="text" id="itemName" name="name" />
                                                
                                                Recipient E-mail: 
                                                <input  class="textfield" tabindex="1" recname="itemName"  type="text" id="email" name="email" />
                                                
                                                <input name="tract_id" id="tract_id" type="hidden" value="<?php echo @$id;?>">                                                 
       											<br>
												<input class="btn" type="submit" name="cmdclick" id="cmdclick" value="Send Now">
                                                </fieldset>
                                  
                                    
                        					</form></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table>
                        </div> <!--your content end-->

    				</div> <!--toPopup end-->

	<div class="loader"></div>
   	<div id="backgroundPopup"></div>
                    
                    
                    
                    
                    	
                </div><!--end class 65perc_col_content-->
                
                <div class=" clearfix"></div>
            	
           </div>
            <div class=" clearfix"></div>
    	 </div><!--end class landing page-->
    </div><!--end class row-->

    <div class=" clearfix"></div>
</div>
</div>
<!--FOOTER-->
<div class="main_footer2">
<?php  $this->load->view('vw_footer');  ?>
</div>


<script type="text/javascript">



$(document).ready(function(){

//////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////
	$('#cmdclick').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/churchmember/send_this_card",
				   data: $('#frmpost').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
								//document.location="/churchmember/give_online";
								
								
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

	var selid;
	
	$("a.topopup").click(function() {
			selid = $(this).attr('id');
			var src = $('#id_sel_img'+selid).attr('src');
			
			$('#tract_id').attr('value',  selid);
			$('#frmpost')[0].reset();
			
			$('#post_result_msg').addClass("info");
			$('#post_result_msg').html('<img src="/images/icons/info_small.png" align="absmiddle" />&nbsp;Send a tract to your family and friends.');
			$('#post_result_msg').removeClass("error");
			$('#post_result_msg').removeClass("success");
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(src); // function show popup
			}, 500); // .5 second
		return false;
	});

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

	/*$('a.livebox').click(function() {
		alert('Hello World!');
	return false;
	});*/
	
///////////////////////////////////////////////////////	
	return false;	
						   
});


 /************** start: functions. **************/
	function loading() {
		$("div.loader").show();
	}
	function closeloading() {
		$("div.loader").fadeOut('normal');
	}

	var popupStatus = 0; // set value

	function loadPopup(src) {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup").fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$('#id_selected_image').attr("src", src);
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



</script>



<!--END OF CONTENT-->



  </body>
</html>

