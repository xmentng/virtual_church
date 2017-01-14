<?php

//retrieve data
		//rettrieve the total testimonies
		$church_id = $this->session->userdata('church_id');
		$testimonies = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('church_id'=>$church_id, 'status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$announcement = useraccount::loadDetails($tableName="tbl_churches_notice_board_contents",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'status'=>1),$arrAttribute=array('id', 'church_id', 'notice_board_content', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$online_users = useraccount::loadDetails($tableName="tbl_users",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'is_online'=>1),$arrAttribute=array('id', 'church_id', 'first_name', 'last_name', 'is_online', 'profile_pic'),$num=NULL,$orderBy='');
		
		$flag_limit = 4;
		

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="/v2_assets/v2_images/favicon.png">

    <title><?php  echo @$data['page_title'];   ?></title>
    
    <!-- Countdown CSS -->
    <link href="/v2_assets/v2_css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800' rel='stylesheet' type='text/css'>
 
	<link href="/v2_assets/v2_css/main.css" rel="stylesheet" media="all">


    <link href="/v2_assets/v2_cssbootstrap.min.css" rel="stylesheet">
    <link href="/v2_assets/v2_css/bootstrap-reset.css" rel="stylesheet">
    <link href="/v2_assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/v2_assets/v2_css/style.css" rel="stylesheet">
    <link href="/v2_assets/v2_css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<section id="container" >
<!--header start-->
<header class="header fixed-top clearfix">
<?php $this->load->view('v2/church_member/headmast')  ?>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            
		<?php $this->load->view('v2/church_member/left_sidebar')  ?>
    </div>
</aside>
<!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
      
					
		<!-- page start-->
        <div class="row">
		<header class="panel-heading wht-bg">
			<h4 class="gen-case"> <?php  echo @$page_res['page_name'];  ?>:</h4>
		</header>
            <div class="col-sm-3">
                <section class="panel">
                    <div class="panel-body" style="height:400px; overflow:scroll">
                        <ul class="nav nav-pills nav-stacked labels-info " style="height:auto;">
                            <li> <h4 style="font-weight:bolder;">CHAT MEMBERS</h4> </li>
                            <?php  //$this->load->view('v2/cellsystem/grpchat-left-sidebar')  ?>
                            
							<?php
								for($i=0; $i<count($onlinemembers['id']); $i++){
								
								$fname = $onlinemembers['first_name'][$i].' '.$onlinemembers['last_name'][$i];
								
								if($onlinemembers['is_online'][$i]==1){
							?>
							<li style="border-bottom:1px solid #eeeff0; height:auto;"> 
								<a href="" title="View detail"> 
									<i class="fa fa-comments-o text-success"></i>  
									<div style="margin-bottom:5px;padding:5px 5px; height:auto;">
										<img src="<?php echo $onlinemembers['profile_pic'][$i]  ?>" style="width:18%; float:left; clear:left;" align="absmiddle" />	
									<span style="padding:0px 10px; text-align:justify;"><?php echo $fname  ?></span>
								</div>
								</a>  
							</li>
							
							<?php
									}
								}
							?>
							
							
                        </ul>
                        
                    </div>
                </section>
            </div>
            <div class="col-sm-9">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case"> Chat Conversation:</h4>
                    </header>
                    <div class="panel-body ">

                        
                       
                        <div class="view-mail">
                           <div class=" form">
							
								<form class="cmxform form-horizontal " id="frmchat" method="post" action="">
									
									<div id="chg-profile-msg-div" class=""></div>
									
									
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3"></label>
                                        <div class="col-lg-6">
											<div class="refresh  text input" id="" style="width:98%;border:solid 1px #ddd; height:250px;  overflow:scroll"></div>
                                           
                                        </div>
                                    </div>
									
									<div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Message Here:</label>
                                        <div class="col-lg-6">
                                             											 
											 <input class="text input" type="text" placeholder="" name="chatmsg" id="chatmsg" style="width:98%; " />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-info" type="submit" id="cmd_post_chatmsg">Send Message</button>
                                        </div>
                                    </div>
                                </form>
						
                            </div>
                        </div>
                    </div>
                    
                    
        </div>

        <!-- page end-->		
					
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">
<div class="right-stat-bar">
<?php  $this->load->view('v2/church_member/right_side_bar_content');   ?>
</div>
</div>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="/js/jquery-1.8.2.min.js"></script>
<script src="/v2_assets/v2_js/jquery.js"></script>
<script src="/v2_assets/v2_js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/v2_assets/v2_js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/v2_assets/v2_js/jquery.scrollTo.min.js"></script>
<script src="/v2_assets/v2_js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="/v2_assets/v2_js/jquery.nicescroll.js"></script>

<!--common script init for all pages-->
<script src="/v2_assets/v2_js/scripts.js"></script>
<script src="/v2_assets/v2_js/jquery-1.9.0.min.js"></script>

<script src="/v2_assets/v2_js/countdown.js"></script>
<script language="javascript" src="/js/jquery.timers-1.0.0.js"></script>

<script type="text/javascript">
/////////////////////////////////////////////////

function get_chat_messages(){
	
	
	//refresh the chat page
	$(".refresh").everyTime(400,function(i){
			$.ajax({
			  url: "/cellsystem/getchatmessages",
			  cache: false,
			  success: function(strdata){
				$(".refresh").html(strdata);
			  }
			});
	});
}//end function


function post_chat_messages(){

	
	$.ajax({
			 type: "POST",
				   url:	"/cellsystem/postchatmessages",
				   data: $('#frmchat').serialize(),
				   success:	function(e){
						 
						 $('.refresh').css({color:"green"});
						 $('#chatmsg').attr('value', '');
					  	 
				   } //end function success

	});//end ajax
	
}//end function




$(document).ready(function(){

	get_chat_messages();

return false;
});  //end document ready

$('#cmd_start_chat').click(function(){
		
		start_chat_session();
		return false;
		
});  //end click event
	

$('#cmd_post_chatmsg').click(function(){
		
		post_chat_messages();
		return false;
		
});  //end click event

//////////////////////////////////////////////	
</script>
 


</body>
</html>
