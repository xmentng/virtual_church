<?php $this->load->view('vw_header'); ?>

<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('central_admin/vw_headmast'); ?>

<!--NAVIGATION -->

<?php $this->load->view('central_admin/vw_horizontal_nav'); ?>

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
        <!--BTNS-->
        <a href="/centraladmin/churches/create/">
        <div class="adminbtns"><i class="icon-user" ></i><br>Create Church Account</div>
        </a>

        <a href="/centraladmin/churches/view/">
        <div class="adminbtns"><i class="icon-users" ></i><br>View Church Accounts</div>
        </a>
        
        
        <a href="/centraladmin/churches/view_online_users">
        <div class="adminbtns"><i class="icon-users" ></i><br>View Online Users</div>
        </a>
        
        <a href="/centraladmin/superusers/create/">
        <div class="adminbtns"><i class="icon-users" ></i><br>Create Central Admin</div>
        </a>
        
        
        <a href="/centraladmin/superusers/view/">
        <div class="adminbtns"><i class="icon-users" ></i><br>View Central Admin </div>
        </a>
       
   		<a href="/centraladmin/report/index">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Report</div>
        </a>
        
        <a href="/auth/logout/">
        <div class="adminbtns"><i class="icon-logout" ></i><br>Logout</div>
        </a>
        
      
        

 
  
   </div><!--end inner content-->
   
 </div><!--end class twelve columns-->
 </div><!--end class row rowbg-->
</div><!--end class container content_wr-->
<div class=" clearfix"></div>

<!--FOOTER-->
<div class="main_footer2">
    <?php  $this->load->view('vw_footer');  ?>
</div>

<!--END OF CONTENT-->
  </body>
</html>
