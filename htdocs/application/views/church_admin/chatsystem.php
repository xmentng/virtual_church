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
          <!--<div class="three columns">
          	<div class="cls_sidebar" style="width:100%; float:left;">
              	<div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
        	
                    <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                        <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder;">Chat System Menu</span>
                    </div>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/chatsystem/index" style="color: #000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; View Online Users</span></a>
                    </li>
  
                    
                    
                    <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                        <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">Chat System Report</span>
                    </div>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="#" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Cell Service Attendance Report</span></a>
                    </li>
                    
                    
        		</div>
             </div> <!--end cls_sidebar-->

          </div><!--end class three columns-->
          <div class="twelve columns">
          	<div class="cls_landing_page" style="border:solid 1px #E8E8E8;">
                 <code class="<?php echo @$data['css_cls'];   ?> " id="post_result_msg" style="padding:0px 7px; width:93%; margin:3% auto;">
				 	<?php echo @$data['info_msg']; ?>
              
                 </code>
                <div class="cls_lpage_content" style="padding:0px 4px; width:93%; margin:3% auto; font-size:0.75em;">
                <form id="frmusersonchat" method="post" name="frmusersonchat">
                <?php   
					if($data['n_online_users'] > 0){   
						for($i=0; $i<$data['n_online_users']; $i++):
				?>
                	<div class="row">
                    	<div class="twelve colums">
                            <div class="two columns">
                                <div class="cls_img" style="width:40%" align="center">
                                	<img src="<?php  echo $online_user['profile_pic'][$i];  ?>" style="width:80%" />
                                </div>
                            </div>
                            
                            <div class="four columns">
                                <span style="font-weight:bolder; "><?php echo $online_user['first_name'][$i]."  ".$online_user['last_name'][$i];    ?></span>
                            </div>
                            
                            
                            
                            <div class="two columns">
                                <span style="">
								<?php if(@$online_user['is_online'][$i]==1)echo "online";    ?>
                                <?php if(@$online_user['is_online'][$i]==0)echo "offline";    ?>
                                </span>
                            </div>
                            
                            <div class="four columns">
                            	<?php if(@$online_user['is_online'][$i]==1){ ?>
                                <?php
									if($online_user['user_name'][$i]!=$page_res['logged_in_account']){
								?>
                                <a  id="<?php  echo $online_user['user_name'][$i];  ?>" href="javascript:void(0)" onClick="javascript:chatWith('<?php  echo $online_user['id'][$i];  ?>', '<?php echo $online_user['user_name'][$i];   ?>' )"><span style="color:green;">Chat with&nbsp;&nbsp;<?php echo $online_user['first_name'][$i]."  ".$online_user['last_name'][$i];    ?> </span></a>
                                <?php } }?>
                                
                                
                                <?php if(@$online_user['is_online'][$i]==0){ ?>
                                <span style="">Chat with&nbsp;&nbsp;<?php echo $online_user['first_name'][$i]."  ".$online_user['last_name'][$i];    ?> </span>
                                <?php } ?>
                            </div>
                        </div><!--end class twelve columns-->    
                    </div><!--end class rows-->
                    <?php  endfor; } ?>
                    </form>
                </div>

            </div>
          </div><!--end class nine columns-->
         
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

function chatWith(chatuser,chatname) {

	update_chat_admin_users(chatuser);
	window.open("/churchadmin/startchat/"+chatuser,"_blank", "toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, directories=0, status=0, width=450, height=400");
	
	//return false;	
}//end function

function update_chat_admin_users(chatuser){
	
	$.ajax({
			 type: "POST",
				   url:	"/churchadmin/save_to_chat_admin_users/"+chatuser,
				   data: $('#frmusersonchat').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						
				   } //end function success

		});//end ajax
	
	
	
}//end function

</script>

<!--END OF CONTENT-->


</body>
</html>
