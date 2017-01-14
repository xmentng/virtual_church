 <?php
			$tab = (intval(@$this->uri->segment(3)) != 0) ? intval(@$this->uri->segment(3)) : 1;
			//echo $tab;														   
		?>
	        <ul class="nav  nav-tabs" id="nav-wrapper">
	              <li class="<?php if($tab==1)echo "active";   ?>">
	                <a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/1/".misc::makeSeoTitle('Add Cell Member');    ?>">
	                	<span style="font-weight:bolder;">Add Cell Member</span></a>
	              </li>
	              <li class="<?php if($tab==2)echo "active";   ?>"><a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/2/".misc::makeSeoTitle('Start Meetings');   ?>"><span style="font-weight:bolder;">Start Meetings</span></a></li>
	              <li class="<?php if($tab==3)echo "active";   ?>"><a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/3/".misc::makeSeoTitle('Upload Cell Outline') ;   ?>"><span style="font-weight:bolder;">Upload Cell Outlines</span></a></li>
	              <li class="<?php if($tab==4)echo "active";   ?>"><a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/4/".misc::makeSeoTitle('Upload Announcement');   ?>"><span style="font-weight:bolder;">Upload Announcement</span></a></li>
	              <li class="<?php if(($tab==9)||($tab==10))echo "active";   ?>"><a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/9/".misc::makeSeoTitle('View Cell Register');    ?>"><span style="font-weight:bolder;">Cell Register</span></a></li>
	              <li class="<?php if($tab==11)echo "active";   ?>"><a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem/11/".misc::makeSeoTitle('Group Chat ');    ?>"><span style="font-weight:bolder;"><span style="font-weight:bolder;">Group Chat</span></a></li>
	              
	             <!-- <li class="pull-right" style="background-color:#FF5706;"><a href="/doc/user-guide?tab=7" style="color:#FFF;">User Guide</a></li>-->
	
	        </ul>