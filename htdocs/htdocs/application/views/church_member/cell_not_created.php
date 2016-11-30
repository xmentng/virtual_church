<?php $this->load->view('vw_header');  ?>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
              <div class="greybar_left">  
                    <div style="width:5%; height:auto;">
                      <img src="<?php  echo @$page_res['profile_pic'];   ?>" style="width:100%;" />       
                    </div>
              </div>
              
              <div class="greybar_right">
                    <strong><em><?php  echo "Welcome ". authmanager::load_user_fullname().' from '.$church_detail['church_name'][0];  ?>!</em></strong>
              </div>
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#E8E8E8;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="cls_landing_page_content">
            	
                <div class="35perc_col_content" style="width:35%; float:left;">
                	
                	<div class="cls_sidebar" style="width:100%; float:left; margin:0 auto">
                        <div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
                
                            <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                                <span style="padding:0px 10px; font-size:1.0625em; font-weight:bolder;">Cell System Menu</span>
                            </div>
                            
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/join_cell" style="color: #FF5300;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Join a Cell</span></a>
                            </li>
                            
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/view_cells" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; View | Edit Cell</span></a>
                            </li>
                            
                            
                             <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/view_cell_leader" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; View Cell Leaders</span></a>
                            </li>
                            
                            
                             <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/download_cell_outline" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Download Cell Outline</span></a>
                            </li>
                            
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/attend_cell_service" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Attend Cell Service</span></a>
                            </li>

                    </div>
            	 </div><!--end class sidebar-->
     			
            	</div><!--end class 35perc_col_content-->
                
                
                <div class="65perc_col_content" style="width:65%; float:right;">
                	
                    <div class="cls_actual_content" style="width:100%; height:auto;  border:solid 1px #8C8C8C; ">
                    	<h5 style="padding:0px 10px;"><strong><?php   echo $data['page_desc'];   ?></strong></h5>
                        
                        <div class="cls_frm_section" style="text-align:justify; line-height:1.56em; padding:0px 7px;">
                        
                       		<form method="post" id="frmpost" name="frmpost">
                            	<code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg">
									<?php echo @$data['info_msg']; ?>
                                </code>
                            	

                            </form>
                        </div>
                        	
                    </div>
                </div><!--end class 65perc_col_content-->
                
                <div class=" clearfix"></div>
            	
           </div>
            <div class=" clearfix"></div>
    	 </div><!--end class landing page-->
    </div><!--end class row-->

    <div class=" clearfix"></div>

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
				   url:	"/churchmember/proc_cell_joined",
				   data: $('#frmpost').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
								//document.location="/churchmember/edit_profile";
								
								
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
	return false;	
						   
});

</script>



<!--END OF CONTENT-->



  </body>
</html>

