<!--logo start-->
<?php

//retrieve data
		//rettrieve the total testimonies
		$testimonies = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$announcement = useraccount::loadDetails($tableName="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'status'=>1),$arrAttribute=array('id', 'church_id', 'notice_board_content', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$online_users = useraccount::loadDetails($tableName="tbl_users",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'is_online'=>1),$arrAttribute=array('id', 'church_id', 'first_name', 'last_name', 'is_online', 'profile_pic'),$num=NULL,$orderBy='');
		
		$flag_limit = 4;
		

?>
<div class="brand">

    <a href="index_home.html" class="logo" style="margin-top:-18px;">
        <img src="/v2_assets/v2_images/logo.png" alt="">
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Testimonies">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-warning"><?php echo count(@$testimonies['id']);  ?> </span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                
				
				<li>
                    <p class=""><?php echo count(@$testimonies['id']);  ?> New Testimonies</p>
                </li>
				<?php
					if(count(@$testimonies['id']) < $flag_limit)$flag_limit = count(@$testimonies['id']);
						for($i=0; $i<$flag_limit; $i++):
						//get the user full name
						$fname = useraccount::getAttributeValue($detail=array('user_name', 'first_name'), $tblname='tbl_users', $where=array('user_name'=>@$testimonies['user_name'][$i]), $retval='first_name');
						
						$lname = useraccount::getAttributeValue($detail=array('user_name', 'last_name'), $tblname='tbl_users', $where=array('user_name'=>@$testimonies['user_name'][$i]), $retval='last_name');
						
						$full_name = $fname." ".$lname;
						$tbody = @$testimonies['test_body'][$i];
				?>
                <li>
                    <a href="javascript:void(0)" OnClick="javascript:loadSelectedTestimony('<?php echo @$testimonies['id'][$i];  ?>', '<?php  echo misc::makeSeoTitle(misc::limitWordTo(@$tbody, 7, "..."));  ?>')">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5><?php echo @$full_name;  ?></h5>
                                <p><?php  echo misc::formatTextBlock(misc::limitWordTo(@$tbody, 7, "..."));  ?></p>
                            </div>
                                    
                    </div>
                    </a>
                </li>
				
				<?php endfor; ?>
				
				
                <!-- <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Bro Emeka</h5>
                                <p>The Lord revealed the thief that stole my iron</p>
                            </div>
                                    
                    </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Pst Stanley</h5>
                                <p>God punished those Chinese hackers!</p>
                            </div>
                                    
                    </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Bro Ewatijoor</h5>
                                <p>Prolonged worship service for me!</p>
                            </div>
                        </div>
                    </a>
                </li>-->
				
                <li class="external">
                    <a href="/churchmember/viewtestimonies">See All Testimonies</a>
                </li>
            </ul>
        </li>
        <!-- settings end -->
       
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Notifications">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-important"><?php echo count(@$announcement['id']);  ?></span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <?php
					
						for($j=0; $j<count(@$announcement['id']); $j++):
					
						$tbody = @$announcement['notice_board_content'][$j];
						
						if($tbody != " "){
				?>
                <li>
                    
                        <div class="alert alert-danger clearfix cls_notification">
                            <div class="noti-info">
                               
								<a href="javascript:void(0)" OnClick="javascript:loadSelectedNotification('<?php echo @$announcement['id'][$j];  ?>', '<?php  echo misc::makeSeoTitle(misc::limitWordTo(@$tbody, 12, ""));  ?>')">
									<?php  echo misc::formatTextBlock(misc::limitWordTo(@$tbody, 12, ""));  ?>
								</a>
								
                            </div>
                                    
						</div>

                </li>
				<?php
							}
						endfor;
				?>
                <!--<li>
                    <div class="alert alert-danger clearfix">
                        
                      <div class="noti-info">
                            <a href="#">Bro Nnamdi is now chairman of IPPC Committee</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-success clearfix">
                        
                      <div class="noti-info">
                            <a href="#">Bro Emeka and Sis Mercy is getting married on the 30th of Feb 2010</a>
                        </div>
                    </div>
                </li>-->

            </ul>
        </li>
        <!-- notification dropdown end -->
         <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Online Users">
                <i class="fa fa-user"></i>
            <span class="badge bg-success"><?php echo count(@$online_users['id']);  ?></span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red"><?php echo count(@$online_users['id']);  ?> People Online</p>
                </li>
				<?php
					//if(count(@$online_users['id']) < 5)$flag_limit = count(@$online_users['id']);
						for($k=0; $k<6; $k++):
						//get the user full name
					
							$fname1 = $online_users['first_name'][$k];
							$lname1 = $online_users['last_name'][$k];
							
							
							$full_name1 = $fname1." ".$lname1;
							$pix_src = $online_users['profile_pic'][$k];
							if(@$online_users['id'][$k] != $this->session->userdata('user_id')):
				?>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="<?php  echo CUSTOM_BASE_URL.$pix_src  ?>"></span>
                        <span class="from"><?php echo strtoupper($full_name1);  ?></span> 
					</a>
                </li>
				
				<?php
							endif;
						
						endfor;
				?>
                <!--<li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="/v2_assets/v2_images/avatar-mini-2.jpg"></span>
                                <span class="subject">
                                <span class="from">Jane Doe</span>
                                </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="/v2_assets/v2_images/avatar-mini-3.jpg"></span>
                                <span class="subject">
                                <span class="from">Tasi sam</span>
                               </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="/v2_assets/v2_images/avatar-mini.jpg"></span>
                                <span class="subject">
                                <span class="from">Mr. Perfect</span>
                                </span>
                    </a>
                </li>-->
               
            </ul>
            
        </li>
        <!-- inbox dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
			<?php
				$str_pic_src = '';
				if(!$this->session->userdata('profile_pic')){
				
					$str_pic_src = '/images/siloh.jpg';
				}else{
				
					$str_pic_src = $this->session->userdata('profile_pic');
				}
			?>
                <img alt="" src="<?php echo CUSTOM_BASE_URL.$str_pic_src;   ?>">
                <span class="username"><?php  echo $this->session->userdata('name_of_user');   ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="/churchmember/profile"><i class=" fa fa-suitcase"></i>Profile</a></li>
              <li><a href="/auth/logout"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
        <li>
            <div class="toggle-right-box">
                <div class="fa fa-bars"></div>
            </div>
        </li>
    </ul>
    <!--search & user info end-->
</div>

<script>
$(document).ready(function(){

	$('.cls_notification :even').addClass('alert-success');
	$('.cls_notification:even').removeClass('alert-danger');
	
	return false;
						   
});

function loadSelectedNotification(param, param2){
	document.location="/churchmember/selectednotification/" + param + "/" + param2;
}//end function

function loadSelectedTestimony(param, param2){
	document.location="/churchmember/featuredtestimony/" + param + "/" + param2;
}//end function

</script>