<?php $this->load->view('vw_header');  ?>
<body class="whitebg">
<style>

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
            	
                <div class="four columns  35perc_col_content">
                	
                	<div class="cls_sidebar" style="width:100%; float:left; margin:2% auto; ">
                    <div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
                
                            <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                                <span style="padding:0px 10px; font-size:1.0625em; font-weight:bolder; width:100%;">Offering</span>
                            </div>
                      			
                             <li class="cls_rsbar_menu_content  active" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="/churchmember/online_giving/tithe"><span style="padding:0px 10px;"> Tithe</span><span style="font-weight:bolder;">(<?php echo @$data['total_tithe'];  ?>&nbsp;USD)</span></a>
                                   
               </li>
                            
                             <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="/churchmember/online_giving/partnership"><span style="padding:0px 10px;">Partnership</span><span style="font-weight:bolder;">(<?php echo @$data['total_partnership'];  ?>&nbsp;USD)</span></a>
                                   
                </li>
                            
                            
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="/churchmember/online_giving/special_seed"><span style="padding:0px 10px;"> Special Seed</span><span style="font-weight:bolder;">(<?php echo @$data['total_ss'];  ?>&nbsp;USD)</span></a>
                                   
               </li>
                            
                             <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="/churchmember/online_giving/first_fruit"><span style="padding:0px 10px;"> First Fruit</span><span style="font-weight:bolder;">(<?php echo @$data['total_ff'];  ?>&nbsp;USD)</span></a>
                                   
                      </li>
                            
                             <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="/churchmember/online_giving/offer_7"><span style="padding:0px 10px;"> Offer 7</span><span style="font-weight:bolder;">(<?php echo @$data['total_offer7'];  ?>&nbsp;USD)</span></a>
                                   
                     </li>
                            
                             <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="/churchmember/online_giving/special_project"><span style="padding:0px 10px;"> Special Project</span><span style="font-weight:bolder;">(<?php echo @$data['total_sprj'];  ?>&nbsp;USD)</span></a>
                            </li>
                            
                            
                            <li class="cls_rsbar_menu_content  total_giving" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                   <a href="#"><span style="padding:0px 10px; font-weight:bolder;"> Total Giving:</span><span style="font-weight:bolder;">(<?php echo @$data['total_giving'];  ?>&nbsp;USD)</span></a>
                            </li>
                    </div>
            	 </div><!--end class sidebar-->
     			
            	</div><!--end class 35perc_col_content-->
                
                
                <div class="eight columns 65perc_col_content">
                	
                    	<div class="cls_rsidebar" style="width:99%; float:left; margin:1% auto; padding:0px 6px; ">
                    	<div id="tabs-3" style=" border:solid 1px #CECECE;">
                            <div style="margin:0px 10px;">
                            <code class="<?php echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['info_msg']; ?></code>
                            <form id="frmgive" name="frmgive" method="post">
                              <table width="100%"  border="0">
                                <tr>
                                  <td width="100%" align="left" valign="top" ><strong>Amount (Dollars):</strong><br>
<input type="text" name="amount" id="amount" style="width:55%;" placeholder="0.00">
                                    <select name="usd" id="usd" style="width:20%">
                                    	<option value="USD">USD</option>
                                    </select>                       			  </td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top"><strong>Category:</strong><br>
                                  <select name="category_code" id="category_code" style="width:55%;">
                                  		<option value="tithe">Tithe</option>
                                        <option value="partnership">Partnership</option>
                                        <option value="special_seed">Special Seed</option>
                                        <option value="first_fruit">First Fruit</option>
                                        <option value="offer_7">Offer 7</option>
                                        <option value="special_project">Special Project</option>
                                  </select>
                                  <br>
                         
								  <input type="submit" name="cmdclick" id="cmdclick" value="Submit" /></td>
                                </tr>
                                <tr>
                                  <td align="left">&nbsp;</td>
                                </tr>
                              </table>
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
</div>
</div>
<!--FOOTER-->
<div class="main_footer2">
<?php  $this->load->view('vw_footer');  ?>
</div>


<script type="text/javascript">


	
	
	function play_on_android_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['android'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	}//end function
	
	
	function play_on_ipad_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
	}//end function
	
	
	
	function play_on_bb_device(){
		//alert(2);
		$('#screen').innerHTML = '<video src="<?php echo @$church_detail['blackberry'][0];    ?>" width="770" height="450" controls ></video>';
	}//end function

$(document).ready(function(){

//////////////////////////////////////////////////////////

	$('#android_device').click(function(){
		play_on_android_device();
		return false;
	});
	
	
	$('#ipad_device').click(function(){
		play_on_ipad_device();
		return false;
	});
	
	
	$('#bb_device').click(function(){
		play_on_bb_device();
		return false;
	});

///////////////////////////////////////////////////////////
	$('#cmdclick').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/churchmember/proc_my_offerings",
				   data: $('#frmgive').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmgive')[0].reset();
								document.location="/churchmember/give_online";
								
								
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

