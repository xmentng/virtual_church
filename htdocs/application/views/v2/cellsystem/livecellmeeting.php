
<?php include_once('layouts/page_head.php'); ?>
<?php include_once('layouts/more_scripts.php'); ?>
<link rel="stylesheet" href="/css/chat.css" type="text/css" />
<?php include_once('layouts/header.php'); ?>

<!-- #main-content -->
<section id="main-content" class="post">
	<!-- #blog -->
	<article id="blog" class="container" style="background-color:#fff; ">
		<div id="ajax-content" class="single-wrap">
			<div class="remove-if-ajax row">
				<div class="col-md-12 title-wrap">
					<h1 class="title-secondary">Live Cell Meeting</h1>
					
				</div>
			</div>
			<div class="row">
    
			    <div class="col-md-12" style="margin-bottom:50px; font-size: 12.7px;">
				
									
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
								 
								
								 <iframe style="width:100%; height:auto; min-height:420px;" src='http://www.coveritlive.com/index2.php/option=com_altcaster/task=viewaltcast/altcast_code=8358f6f8cc/width=560/height=560/entryLoc=bottom/commentLoc=bottom/titlePage=off/replayContentOrder=chronological'scrolling='no'   frameBorder ='0' allowTransparency='true' ></iframe>
								
							</div>
					
					
					
					
				</section>
            </div>
            </div>
        </div>
	    
		
	        
				</div>
			</div>

			
		</div>
	</article>
	<!-- /#blog -->
</section>
<!-- /#main-content -->
<script src="<?php echo CUSTOM_BASE_URL  ?>/js/jquery-1.8.2.min.js"></script>
<script>
	
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

	
	
	/////////////////////////////////////////////
	
	return false;
});//end document reasdy state




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
	
 
</script>
<?php //include_once('layouts/yookos_panel.php'); ?>
<?php include_once('layouts/footer.php'); ?>
