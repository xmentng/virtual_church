<?php

	$is_cell_member = $this->session->userdata('is_cell_member');
	$is_cell_leader = $this->session->userdata('is_cell_leader');
	
?>
<div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            <li class="active">
                <a href ="/churchmember/dashboard/" class="active">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-bullhorn"></i>
                    <span>My Account System</span>
                </a>
                <ul class="sub">
					
                	<li><a href="/churchmember/profile/">Manage my profile</a></li>
                   
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-plus"></i>
                    <span>My Church System</span>
                </a>
                <ul class="sub">
                	
					<li><a href="/churchsystem/announcement">Announcements</a></li>
					<!--<li><a href="/churchsystem/serviceinfo">Church Service Detail</a></li>-->
					<li><a href="/churchsystem/liveservice">Live Service</a></li>
					<li><a href="/churchsystem/servicehighlights/gallery">Service Highlights</a></li>
			
                </ul>
            </li>
			
			
			 <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Foundation School</span>
                </a>
				
				<ul class="sub">
                	
					<li><a href="<?php echo CUSTOM_BASE_URL."/foundation-school/registration";  ?>">Registration</a></li>

                </ul>
                
            </li>
			
			
		
			<li class="sub-menu">
                <a href="javascript:void(0)">
                    <i class="fa fa-group"></i>
                    <span>Cell System</span>
                </a>
                <ul class="sub">
                	<?php
						if(!$is_cell_member):
					?>
                    <li><a href="/cellsystem/joincell">Join a cell</a></li>
					<?php
						endif;
					?>
					<?php
						if(($is_cell_member==1)&&($is_cell_leader)==0):
					?>
					
					<li><a href="/cellsystem/attendmeeting">Attend Live Cell Meeting</a></li>
					<li><a href="/cellsystem/downloadoutline">Download Cell Outline</a></li>
					<li><a href="/cellsystem/viewmeetings">View Cell Meetings</a></li>
					<li><a href="/cellsystem/groupchat">Chat Room</a></li>
					
					<?php
						endif;
					?>
					
					
					<?php
						if(($is_cell_leader)==1):
					?>
					
					<li><a href="/cellsystem/attendmeeting">Attend Live Cell Meeting</a></li>
					<li><a href="/cellsystem/downloadoutline">Download Cell Outline</a></li>
					<li><a href="/cellsystem/viewmeetings">View Cell Meetings</a></li>
					<li><a href="/cellleader/groupchat">Chat Room</a></li>
					
					<?php
						endif;
					?>
					
					<?php
						if($is_cell_leader):
					?>
					<li><a href="/cellleader/dashboard">Cell Leader Admin</a></li>
					<?php
						endif;
					?>

                </ul>
            </li>
			
			
			<li class="sub-menu">
                <a href="javascript:void(0);">
                    <i class="fa fa-plus-circle"></i>
                    <span>Soul Winning</span>
                </a>
                <ul class="sub">
                	
                    <li><a href="/soulwinning/salvationcall">Send a Salvation Call Mail </a></li>
					<li><a href="/soulwinning/sendtract">Send Tract</a></li>
                </ul>
            </li>
			
		
			
			
			<li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-bullhorn"></i>
                    <span>Testimonies</span>
                </a>
                <ul class="sub">
                	
                    <li><a href="/testimony/featured">Featured Testimony</a></li>
					<li><a href="/testimony/latest">New Testimonies</a></li>
					<li><a href="/testimony/share">Share Testimony</a></li>
					<li><a href="/testimony/all">All Testimonies</a></li>
					

                </ul>
            </li>
            
        </ul></div>        
<!-- sidebar menu end-->