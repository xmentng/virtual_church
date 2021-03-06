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
               <?php $this->load->view("church_member/page_name_welcome_user");   ?>
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#E8E8E8;margin-bottom:5%;">
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
                            
                            <?php if($page_res['has_cell']=false){ ?>
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/join_cell" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Join a Cell</span></a>
                            </li>
                            
                            <?php } ?>
                            
                            <!--<li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/view_cells" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; View | Edit Cell</span></a>
                            </li>-->
                            
                            
                             <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/view_cell_leader" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; View Cell Leaders</span></a>
                            </li>
                            
                            
                             <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/download_cell_outline" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Download Cell Outline</span></a>
                            </li>
                             <?php if($page_res['has_cell']=true){ ?>
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/attend_cell_service" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Attend Cell Meeting</span></a>
                            </li>
                            <?php } ?>

                    </div>
            	 </div><!--end class sidebar-->
     			
            	</div><!--end class 35perc_col_content-->
                
                
                <div class="65perc_col_content" style="width:65%; float:right;">
                	
                    <div class="cls_actual_content" style="width:100%; height:auto;  border:solid 1px #8C8C8C; ">
                    	
					
                        
                        <div class="cls_frm_section" style="text-align:justify; line-height:1.56em; padding:0px 7px;">
                        
                       		<div class="table-wrapper" style="width:100%">
        
                   			<div class="wrapper-panel">  
                            
                            <form method="post" id="frmpost" name="frmpost">
                            	<code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
                            	<table width="100%" border="0" cellspacing="0" cellpadding="2">
                                      <tr id="id_tbl_headers">
                                        <th width="9%" nowrap bgcolor="#FFDDCC">S/N</th>
                                        <th width="15%" nowrap bgcolor="#FFDDCC">CELL NAME</th>
                                        <th width="15%" nowrap bgcolor="#FFDDCC">NAME</th>
                                        <th width="25%" nowrap bgcolor="#FFDDCC">EMAIL</th>
                                        <th width="24%" nowrap bgcolor="#FFDDCC">COUNTRY</th>
                                        <th width="12%" nowrap bgcolor="#FFDDCC">PICTURE</th>
                                      </tr>
                                      
                                      <?php
									  
									  	$sn = 0;
									  	for($i =0; $i < $data['n_cell_leaders']; $i++){
									  		++$sn;
									  ?>
                                      
                                      <tr class="cls_tbl_contents">
                                        <td nowrap><?php echo $sn;  ?></td>
                                         <td nowrap><?php echo @$cell_leader['cell_name'][$i];    ?></td>
                                        <td nowrap><?php echo @$cell_leader['first_name'][$i]. " " .@$cell_leader['last_name'][$i];    ?></td>
                                        <td nowrap><?php echo @$cell_leader['cell_leader_email'][$i];    ?>;</td>
                                        <td nowrap><?php echo @$cell_leader['country'][$i];    ?></td>
                                       
                                        <td nowrap><img src="<?php echo @$cell_leader['profile_pic'][$i];    ?>" style="width:40%; height:auto;" /></td>
                                      </tr>
                                      
                                      <?php  } ?>
                                 </table>


                            </form>
                            
                             <?php  if(@$data['n_cell_leaders'] > 0 ){  ?>
                              <div class="wrapper-paging">
                                  <ul>
                                    <li><a class="paging-back">&lt;</a></li>
                                    <li><a class="paging-this"><strong>0</strong> of <span>x</span></a></li>
                                    <li><a class="paging-next">&gt;</a></li>
                                  </ul>
                              </div>
                               <?php } ?>
                        </div>
                        </div>
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

