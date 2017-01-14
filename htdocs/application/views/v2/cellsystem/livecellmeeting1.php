<?php

		//rettrieve the total testimonies
		$testimonies = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('church_id'=>$this->session->userdata('church_id'), 'status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
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
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6">
				<header class="panel-heading">
					<?php  echo @$page_res['page_name'];  ?>
				</header>
				<script src="/js/swfobject.js"></script>  

				<script src="/js/html5media.min.js"></script>

                <div id="jp_container_1" class="jp-video jp-video-360p" style="height:480px; background-color:#000;"></div>
				
				<script type="text/javascript">

				function loadVideoPlayer() {

				 var ua = navigator.userAgent;
				   var Ok = false;
				   if (ua.indexOf("BlackBerry") >= 0)
				   {
					  if (ua.indexOf("WebKit") >= 0)
					  {
						  Ok= true;
						 //$('preview').innerHTML = '<video src="" width="480" height="320" controls ></video>';
					   //  $('#preview').html('<video src="" width="480" height="320" controls="controls"  autoplay="autoplay" preload></video>');
						
					  }
				   }
					//alert(ua);
					if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/iPad/i))) {
						
						
						$('#jp_container_1').html('<video src="<?php echo $this->session->userdata('ipad_stream');    ?>" width="500" height="450" controls="controls"  autoplay="autoplay" preload></video>');
						 Ok= true; 
						
						//document.write();

					} 
					
					if ((navigator.userAgent.match(/Android/i))) {
						
						
						$('#jp_container_1').html('<video src="<?php echo $this->session->userdata('android_stream');  ?>" width="660" height="450" controls="controls"  autoplay="autoplay" preload></video>');
						 Ok= true; 
						
						//document.write();

					} 
					
					
					
				   if(!Ok) {
					//
					var s2 = new SWFObject('/js/player.swf','ply','640','450','9','#ffffff');
					s2.addParam("allowfullscreen","true");
					s2.addParam("wmode","transparent");
					s2.addVariable("autostart","true");
					
					s2.addVariable("repeat","list");
					s2.addVariable('autoscroll','false'); 
					s2.addVariable('shuffle','false'); 
					s2.addParam('allowscriptaccess','always');
					s2.addVariable('bufferlength','5');
					s2.addVariable("enablejs","true");
					s2.addVariable('javascriptid','plyr');
					s2.addVariable('streamer','<?php echo $this->session->userdata('stream_url');    ?>');
					s2.addVariable('file','<?php echo $this->session->userdata('file_stream');    ?>');

						
					//s2.addVariable("displayheight","344");
					s2.addVariable("backcolor","0x000000");
					s2.addVariable("frontcolor","0xCCCCCC");
					s2.addVariable("lightcolor","0x557722");
					s2.addVariable('logo','/res/images/logo5.png');
					//s2.addVariable("width","430");
					//s2.addVariable("height","344");
					s2.addVariable("type","video");
					s2.addVariable('skin','/res/flash/overlay.swf'); 
					s2.addVariable("stretching","exactfit"); 
					s2.write('jp_container_1');


					}

				}

				</script>



<div> 
	<a id="android_device" href='javascript:void(0)'>Android Devices</a>  |   
    <a id="ipad_device" href='javascript:void(0)'>iPads/iPhones</a>    |        
    <a id="bb_device" href='javascript:void(0)'>BlackBerry Devices</a>   
</div>
            </div>
                
            <div class="col-md-6">
                <div class="col-md-12">
						<section class="panel" style="height:480px;">
							<header class="panel-heading">
									Read &amp; Post Comments<span class="tools pull-right">
								</span>
							</header>
							<div class="panel-body" style="padding:0px 7px;">
								  <!--<div class="chat-conversation">
									<ul class="conversation-list">
										<li class="clearfix">
											<div class="chat-avatar">
												<img src="images/chat-user-thumb.png" alt="male">
												<i>10:00</i>
											</div>
											<div class="conversation-text">
												<div class="ctext-wrap">
													<i>John Carry</i>
													<p>
														Hello!
													</p>
												</div>
											</div>
										</li>
										<li class="clearfix odd">
											<div class="chat-avatar">
												<img src="images/chat-user-thumb-f.png" alt="female">
												<i>10:00</i>
											</div>
											<div class="conversation-text">
												<div class="ctext-wrap">
													<i>Lisa Peterson</i>
													<p>
														Hi, How are you? What about our next meeting?
													</p>
												</div>
											</div>
										</li>
										<li class="clearfix">
											<div class="chat-avatar">
												<img src="images/chat-user-thumb.png" alt="male">
												<i>10:00</i>
											</div>
											<div class="conversation-text">
												<div class="ctext-wrap">
													<i>John Carry</i>
													<p>
														Yeah everything is fine
													</p>
												</div>
											</div>
										</li>
										<li class="clearfix odd">
											<div class="chat-avatar">
												<img src="images/chat-user-thumb-f.png" alt="female">
												<i>10:00</i>
											</div>
											<div class="conversation-text">
												<div class="ctext-wrap">
													<i>Lisa Peterson</i>
													<p>
														Wow that's great
													</p>
												</div>
											</div>
										</li>
									</ul>
									<div class="row">
										<div class="col-xs-9">
											<input type="text" class="form-control chat-input" placeholder="Enter your text">
										</div>
										<div class="col-xs-3 chat-send">
											<button type="submit" class="btn btn-default">Send</button>
										</div>
									</div>
								</div>-->
								
								 <iframe style="width:100%; height:auto; min-height:420px;" src='http://www.coveritlive.com/index2.php/option=com_altcaster/task=viewaltcast/altcast_code=8358f6f8cc/width=560/height=560/entryLoc=bottom/commentLoc=bottom/titlePage=off/replayContentOrder=chronological'scrolling='no'   frameBorder ='0' allowTransparency='true' ></iframe>
								
							</div>
					
					
					
					
				</section>
            </div>
            </div>
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

	function pay_pay_api(){
		hide_account_detail();
		hide_local_wired_transfer_detail();
		alert('Comming soon...');	
	}
	
	
	function play_on_android_device(){
		$('#jp_container_1').html('<video src="<?php echo $this->session->userdata('android_stream');    ?>" width="540" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	}//end function
	
	
	function play_on_ipad_device(){
		$('#jp_container_1').html('<video src="<?php echo $this->session->userdata('ipad_stream');    ?>" width="540" height="450" controls="controls"  autoplay="autoplay" preload></video>');
	}//end function
	
	
	
	function play_on_bb_device(){
		//alert(2);
		$('#jp_container_1').innerHTML = '<video src="<?php echo $this->session->userdata('blackberry_stream');    ?>" width="540" height="450" controls="controls" ></video>';
	}//end function
	


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

	//////////////////////////////////////////////////////////


	$('#android_device').click(function(){
		play_on_android_device();
		return false;
	});
	
	
	$('#ipad_device').click(function(){
		play_on_ipad_device();
		return false;
	});
	
	
	$('#bb_device').click(function(){
		play_on_bb_device();
		return false;
	});

	
	
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
