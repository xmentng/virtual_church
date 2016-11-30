<?php $this->load->view('vw_header'); ?>

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
        <!--BTNS-->
        <a href="/churchadmin/useraccount/create/">
        <div class="adminbtns"><i class="icon-user-add" ></i><br>Create User Account</div>
        </a>
        
        
        <a href="/churchadmin/helplines/add/">
        	<div class="adminbtns"><i class="icon-doc-text" ></i><br>Add | Edit Help Lines</div>
        </a>
        
        <a href="/churchadmin/content/update_notice_board/">
        <div class="adminbtns"><i class="icon-info-circled" ></i><br>Update Notice Board</div>
        </a>
        
        <a href="/churchadmin/content/change_banner/">
        <div class="adminbtns"><i class="icon-flag" ></i><br>Edit Church Banner</div>
        </a>
        
        <a href="/churchadmin/uploadtract/">
        <div class="adminbtns"><i class="icon-upload" ></i><br>Upload Tracts</div>
        </a>
        
        <a href="/videos/dashboard" title="Video on demand">
        	<div class="adminbtns"><i class="icon-video" ></i><br>Manage Videos</div>
        </a>
        
        <a href="/churchadmin/useraccount/edit/">
        	<div class="adminbtns"><i class="icon-pencil" ></i><br>View | Edit User Accounts</div>
        </a>
        
        
         <a href="/churchadmin/invite_link/generate">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Invite Link</div>
        </a>
        
        <a href="/churchadmin/useraccount/view_invites/">
        <div class="adminbtns"><i class="icon-users" ></i><br>View Invites</div>
        </a>
        
        
        <a href="/churchadmin/useraccount/view_users_online/">
        <div class="adminbtns"><i class="icon-users" ></i><br>View Online Users</div>
        </a>
        
        <a href="/churchadmin/cell_system">
        	<div class="adminbtns"><i class="icon-book-open" ></i><br>Cell System</div>
        </a>
        
      <!--	<a href="/churchadmin/live_service">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Live Service</div>
        </a>-->
        
       <!-- <a href="/churchadmin/soul_win_tool">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Soul Winning Tool</div>
        </a>-->
     
         <a href="/churchadmin/chatsystem">
        	<div class="adminbtns"><i class="icon-chat" ></i><br>Chat with Users</div>
        </a>
        
        <a href="/churchadmin/streaming_link">
        	<div class="adminbtns"><i class="icon-users" ></i><br>View Streaming Links</div>
        </a>
        
        <!-- <a href="/churchadmin/comments/approve">
        	<div class="adminbtns"><i class="icon-comment" ></i><br>Approve Comments</div>
        </a>-->
        
       <!-- <a href="/churchadmin/search">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Search</div>
        </a>
        -->
       	<a href="/churchadmin/publicitylink/create">
        	<div class="adminbtns"><i class="icon-users" ></i><br>Create Social Publicity Link</div>
        </a>
        
        <a href="/churchadmin/report/index">
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
