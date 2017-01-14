<?php $this->load->view('vw_header'); ?>

<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--NAVIGATION -->

<?php $this->load->view('maintab'); ?>

<!--CONTENT-->
<div class="container content_wr">
  <div class=" row rowbg">
<!--main content top-->
  <div class="twelve columns"> 
   <!--main Content-->
   <div class="Inner_content" style="height:auto;"> 
        <!--<h2>Profile on Pastor Chris</h2>-->
        <!-- <img src="images/innercity.jpg">-->
        <div class="clearfix"></div>
		<?php $this->load->view('vw_welcome_user'); ?>
  		<hr>
        <!--BTNS-->
        <a href="/cellleader/cellmembers/index">
        <div class="adminbtns"><i class="icon-user-add" ></i><br>Manage Cell Members Account</div>
        </a>
        
        
        <a href="/cellleader/announcement/index">
        	<div class="adminbtns"><i class="icon-doc-text" ></i><br>Manage Annoucement</div>
        </a>
        

        <a href="/cellleader/cellmeetings/index">
        <div class="adminbtns"><i class="icon-upload" ></i><br>Manage Cell Meetings</div>
        </a>
        
       
        
         <a href="/cellleader/invites/index">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Manage Invites</div>
        </a>
        
       
        <a href="/cellleader/soulwinningtool/index">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Soul Winning Tool</div>
        </a>

         <a href="/cellleader/chatsystem/index">
        	<div class="adminbtns"><i class="icon-chat" ></i><br>Manage Chat System</div>
        </a>
        
       
        <a href="/churchadmin/comments/approve">
        	<div class="adminbtns"><i class="icon-comment" ></i><br>Manage Comments</div>
        </a>
        
 
       	<a href="/cellleader/publicitylink/create">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Create Social Publicity Invite Links</div>
        </a>
        
        <a href="/cellleader/report">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Report</div>
        </a>
		
		<a href="/churchadmin/">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Home</div>
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
<div class="main_footer2" style="bottom:0; position:fixed;">
    <?php  $this->load->view('vw_footer');  ?>
</div>

<!--END OF CONTENT-->
  </body>
</html>
