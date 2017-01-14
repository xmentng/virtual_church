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
					<div class="col-sm-12">
						<section class="panel">
							<header class="panel-heading wht-bg">
							   <h4 class="gen-case"> <?php  echo @$page_res['page_name'];  ?>:</h4>
							</header>
							<div class="panel-body ">
								<span style="font-weight:bolder; font-size:14px;">Church Name:</span> <?php  echo $this->session->userdata('church_name');  ?>
								<br>
								
								
								
								<?php
									//for help lines
									$int_nhelp_lines = count($help_line_info['id']);
									if($int_nhelp_lines > 0){
										echo '<span style="font-weight:bolder; font-size:14px;">Help Lines:</span><br> ';
										for($j = 0; $j < $int_nhelp_lines; $j++):
								
								?>
								
										<span style="font-size:14px;"><?php  echo $help_line_info['help_line'][$j];   ?></span><br> 
								
								<?php
										endfor;
										}
								?>
								
								
									<div class="mail-sender">
										<div class="row">
											<div class="col-md-8">
												<!--<img src="images/chat-avatar2.jpg" alt="">-->
												<!--<strong>Bro Tola Nana</strong><strong></strong>-->
												<i class="fa fa-bullhorn"></i>
											</div>
											<div class="col-md-4">
												<p class="date"> <?php //echo date('l, j F, Y', $announcementInfo['time_posted'][$i]);   ?></p>
											</div>
										</div>
									</div>
									<div class="view-mail">
										
						
										<p>You don't have any live meeting. </p>
										
										
									</div>
									
									
							</div>
	
				</div>
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
<script>
$('#form_channel').submit(function(){

	//alert(1); return false;
	
	$('#chg-pic-msg-div').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
	$('#chg-pic-msg-div').removeClass('alert alert-danger');
	$('#chg-pic-msg-div').removeClass('alert alert-success');
	$('#chg-pic-msg-div').addClass('info');
	
	 var formData = new FormData(document.getElementById("form_channel"));
	
	$.ajax({
		
		url:"<?php echo CUSTOM_BASE_URL ?>" + "/churchmember/uploadpicture2",	
		type:"POST",
		data: formData,
		processData: false,  // tell jQuery not to process the data
  		contentType: false,  // tell jQuery not to set contentType
		success: function(data){
			//alert(data); return false;
			//var result = $.parseJSON(data);
				/*
				if(result.id == 1){	
					$('#row').html(result.msg);
					$('#row').addClass('alert alert-success');
					$('#channel').modal('hide');
					$('#form_channel').reset();				
					window.location.replace("<?= base_url('admin/channel'); ?>");
										
				}
				if(result.id == 0){
					
					$('.error').html(result.msg);
					$('.error').addClass('alert alert-danger');
					$('#channel').modal('show');
					$('#form_channel').reset();
					return false;	
				} 
				*/
				
				
				var sp = data.split('|');
				
				if(sp[0] == 'success'){
				
					$('#chg-pic-msg-div').removeClass('info');
					$('#chg-pic-msg-div').removeClass('alert alert-danger');
					$('#chg-pic-msg-div').addClass('alert alert-success');
		
					$('#chg-pic-msg-div').html(sp[1]);
					document.location="/churchmember/profile";
				
				}//end if
			
			
				if(sp[0] == 'failure'){
				
					$('#chg-pic-msg-div').removeClass('info');
					$('#chg-pic-msg-div').removeClass('alert alert-success');
					$('#chg-pic-msg-div').addClass('alert alert-danger');
		
					$('#chg-pic-msg-div').html(sp[1]);
				
				
				}//end if
				
				
			}//end function success
		
	});	
	return false;	
		
});
 
 

</script>
<script type="text/javascript">
/////////////////////////////////////////////////



////////////////////////////////////////////////
function startCallback() {
	// make something useful before submit (onStart)
	$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
	$('#post_result_msg').removeClass('error');
	$('#post_result_msg').removeClass('success');
	$('#post_result_msg').addClass('info');
	return true;
}//end function
 
 
function completeCallback(resp)
{
				
	var response = $.parseJSON(resp);
	
	if(response.status){
		$('#post_result_msg').html(response.message);
		$('#post_result_msg').removeClass('error');
		$('#post_result_msg').addClass('success');
	}else{
		//alert($('#post_result_msg').html());
		$('#post_result_msg').html(response.error);
		$('#post_result_msg').removeClass('success');
		$('#post_result_msg').addClass('error');
								
	}
											
}//end function


function call_update_personalInfo(){
	
	//alert('running...');
	$('#chg-profile-msg-div').removeClass('alert alert-danger');
	$('#chg-profile-msg-div').removeClass('alert alert-success');
	$('#chg-profile-msg-div').addClass('info');
	
	$('#chg-profile-msg-div').html('<img src="/images/loading.gif" align="absmiddle" />&nbsp; Please wait...');
	
	$.ajax({
		type:	"POST",
		url:	"/postmanager/update_user_profile",
		data:	$('#frm-chg-profile').serialize(),
		success:	function(varCallBack){
			
			//alert(varCallBack); return false;
			var sp = varCallBack.split('|');
			
			if(sp[0] == 'success'){
				
				$('#chg-profile-msg-div').removeClass('info');
				$('#chg-profile-msg-div').removeClass('alert alert-danger');
				$('#chg-profile-msg-div').addClass('alert alert-success');
	
				$('#chg-profile-msg-div').html(sp[1]);
				document.location="/churchmember/profile";
				
			}//end if
			
			
			if(sp[0] == 'failure'){
				
				$('#chg-profile-msg-div').removeClass('info');
				$('#chg-profile-msg-div').removeClass('alert alert-success');
				$('#chg-profile-msg-div').addClass('alert alert-danger');
	
				$('#chg-profile-msg-div').html(sp[1]);
				
				
			}//end if
			
			
				
		
		}//end function success
	
	}); //end ajax function call
	
}//end function

function call_changePassword(){
	
	//alert('processing...');
	$('#chg-pwd-msg-div').removeClass('danger');
	$('#chg-pwd-msg-div').removeClass('success');
	$('#chg-pwd-msg-div').addClass('info');
	
	$('#chg-pwd-msg-div').html('<img src="/images/loading.gif" align="absmiddle" />&nbsp; Please wait...');
	
	$.ajax({
		type:	"POST",
		url:	"/postmanager/change_user_password",
		data:	$('#frm-chg-password').serialize(),
		success:	function(varCallBack){
			
			//alert(varCallBack); return false;
			var sp = varCallBack.split('|');
			
			if(sp[0] == 'success'){
				
				$('#chg-pwd-msg-div').removeClass('info');
				$('#chg-pwd-msg-div').removeClass('alert alert-danger');
				$('#chg-pwd-msg-div').addClass('alert alert-success');
	
				$('#chg-pwd-msg-div').html(sp[1]);
				document.location="/churchmember/profile";
				
			}//end if
			
			
			if(sp[0] == 'failure'){
				
				$('#chg-pwd-msg-div').removeClass('info');
				$('#chg-pwd-msg-div').removeClass('alert alert-success');
				$('#chg-pwd-msg-div').addClass('alert alert-danger');
	
				$('#chg-pwd-msg-div').html(sp[1]);
				
				
			}//end if
			
			
				
		
		}//end function success
	
	}); //end ajax function call
	
	
}//end function


function call_change_profilePic(){
	
	alert('running...');
}//end function

/////////////////////////////////////////////////
$(document).ready(function(){

	//////////// buttons click events ////////////
		//1.
		$('#btn-personal-info').click(function(e){
		
			e.preventDefault();
			call_update_personalInfo();
			return false;
		
		});
		
		
		//2.
		$('#btnchgpwd').click(function(e){
								 
			e.preventDefault();
			call_changePassword();
			return false;
		});
		
		
		
	
	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state

//////////////////////////////////////////////	
</script>
 


</body>
</html>
