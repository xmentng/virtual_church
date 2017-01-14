<?php

//retrieve data
		//rettrieve the total testimonies
		$testimonies = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$announcement = useraccount::loadDetails($tableName="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'status'=>1),$arrAttribute=array('id', 'church_id', 'notice_board_content', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$online_users = useraccount::loadDetails($tableName="tbl_users",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'is_online'=>1),$arrAttribute=array('id', 'church_id', 'first_name', 'last_name', 'is_online', 'profile_pic'),$num=NULL,$orderBy='');
		
		$flag_limit = 4;
		

?>
<ul class="right-side-accordion">
<li class="widget-collapsible">
    <a href="#" class="head widget-head red-bg active clearfix">
        <span class="pull-left">Schedule (5)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row side-mini-stat clearfix">
                <div class="side-graph-info">
                    <h4>Easter Service
                    <p>
                        21st April
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="target-sell">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>Healing School Autumn Session</h4>
                    <p>
                        March - April 2014
                    </p>
                </div>
                
            </div>
            
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>ommunion Service</h4>
                    <p>
                        th April 2014
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="d-pending">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="col-md-12">
                    <h4>International Cell Leaders' Conference 2014</h4>
                    <p>
                        April 12th - April 15th 2014
                    </p>
                    
                </div>
            </div>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head terques-bg active clearfix">
        <span class="pull-left"> <?php  if(count(@$online_users['id'])>1){ echo "Online Members (".count(@$online_users['id']).")"; }else{ echo "Online Member (".count(@$online_users['id']).")"; }  ?></span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
        
        <?php
			if(count(@$online_users['id']) > 0){
				for($a=0; $a<count(@$online_users['id']); $a++):
				
						$fname2 = $online_users['first_name'][$a];
						$lname2 = $online_users['last_name'][$a];
						
						
						$full_name2 = $fname2." ".$lname2;
						$pix_src2 = @$online_users['profile_pic'][$a];
						
						if(@$online_users['id'][$a] != $this->session->userdata('user_id')):
		?>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="<?php echo CUSTOM_BASE_URL.@$pix_src2;   ?>" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#"><?php echo $full_name2;  ?></a></h4>
                   
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            
            <?php	
						endif;
				endfor;
			}else{
			?>
            <div class="prog-row">
                <span style="padding:2px 15px;">There are no online users</span>
            </div>
            
            <?php
			}
			?>
            
          
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head purple-bg active">
        <span class="pull-left"> Notifications (3)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        just now
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        2 min ago
                    </p>
                    <p>
                        <a href="#">Jane Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        1 day ago
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
        </li>
    </ul>
</li>

</ul>