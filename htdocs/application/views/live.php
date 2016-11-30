<?php $this -> load -> view("layout/header2"); ?>
<!--<link type="text/css" rel="stylesheet" href="<?/*=base_url()."/asset";*/?>/css/all_edited.css" media="all">-->
<section id="page-info" class="container-fluid">
	<div class="row">
		<div class="img-area">
			<div class="holder"><img data-velocity="-.5" src="<?= base_url(); ?>/asset/images/img47.jpg" width="1600" height="196" alt="Latest Blogs" />
			</div>
		</div>
		<div class="textholder">
			<div class="container textblock">
				<div class="block">
					<!-- page title -->
					<div class="page-title">
						<div class="holder">
							<h1>Live Meetings</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<main id="main" role="main" class="container-fluid">
	<div class="container">
		<div class="row">
			<?php if($this->session->flashdata('success')): ?>
	        <div class="alert alert-success dismissable" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  <?php echo $this->session->flashdata('success'); ?>
			</div>
			<?php elseif($this->session->flashdata('error')): ?>
	        <div class="alert alert-danger dismissable" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  <?php echo $this->session->flashdata('error'); ?>
			</div>
			<?php endif; ?>
			<div class="col-md-6">
				<div class="col-xs-12">
					<div id="video" style="background:#000;"  >
	                                   
	                </div><!--end video-->
	                    
					<script src="<?= base_url(); ?>/asset/js/swfobject.js"></script>  

					<script src="<?= base_url(); ?>/asset/js/html5media.min.js"></script>


					<div id="screen" class="video_screen">
					        
					    
					</div>

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
					       	//$('#preview').html('<video src="" width="480" height="320" controls="controls"  autoplay="autoplay" preload></video>');
					        
					      }
					   }
					    //alert(ua);
						if ((navigator.userAgent.match(/Safari/i)) || (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/iPad/i))) {
							
							
							$('#screen').html('<video src="<?php echo "http://154.obj.netromedia.net/LagosLCC1/vc2/playlist.m3u8";?>" width="100%" height="450" controls="controls" autoplay="autoplay" preload></video>');
							 Ok= true; 
					        
					        //document.write();

						} 
					    
					    if ((navigator.userAgent.match(/Android/i))) {
					        
					        
					        $('#screen').html('<video src="<?php echo "rtsp://154.obj.netromedia.net/LagosLCC1/vc2";?>" width="660" height="450" controls="controls"  autoplay="autoplay" preload></video>');
					         Ok= true; 
					        
					        //document.write();

					    } 
					    
					    
					    
					   if(!Ok) {
							//
							 var s2 = new SWFObject('<?= base_url(); ?>/asset/js/player.swf','ply','550','450','9','#ffffff');
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
						//s2.addVariable('streamer','<?php //echo @$church['stream_url'];    ?>');
						s2.addVariable('streamer','rtmp://154.obj.netromedia.net/LagosLCC1');
							//s2.addVariable('file','<?php //echo @$church['file_stream'];    ?>');
							s2.addVariable('file','vc2');

					        
					    //s2.addVariable("displayheight","344");
					    s2.addVariable("backcolor","0x000000");
					    s2.addVariable("frontcolor","0xCCCCCC");
					    s2.addVariable("lightcolor","0x557722");
					    s2.addVariable('logo','/asset/images/logo5.png');
					    //s2.addVariable("width","430");
					    //s2.addVariable("height","344");
					    s2.addVariable("type","video");
					    s2.addVariable('skin','/asset/images/overlay.swf'); 
					    s2.addVariable("stretching","exactfit"); 
					    s2.write('screen');
						//alert(navigator.userAgent);

						}

					}
					</script>

					<div> 
						<a id="android_device" href='rtsp://154.obj.netromedia.net/LagosLCC1/vc2'>Android Devices</a>  |
					    <a id="ipad_device" href='http://154.obj.netromedia.net/LagosLCC1/vc2/playlist.m3u8'>iPads/iPhones</a>    |
					    <a id="bb_device" href='rtsp://154.obj.netromedia.net/LagosLCC1/vc2'>BlackBerry Devices</a>
					</div>

					<script>loadVideoPlayer();</script>
					
                    </div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="col-xs-12" id="Tabs">
						<div class="tabs-main">
							<ul class="nav nav-tabs" role="tablist">
								<li class="active">
									<a href="#pInfo" role="tab" data-toggle="tab">Chatroom</a>
								</li>
								<li>
									<a href="#pAbout" role="tab" data-toggle="tab">Bible</a>
								</li>
								<li>
									<a href="#pDetails" role="tab" data-toggle="tab">Notes</a>
								</li>
								<li>
									<a href="#pNew" role="tab" data-toggle="tab">Salvation</a>
								</li>
							</ul>
							<div class="tab-content">
                                <div class="tab-pane active" id="pInfo">
                                    <div style='display:none;'>Live Blog Christ Embassy Church Online</div><div id='cil-root-stream-36d375d0b9' class='cil-root'><span class='cil-config-data' title='{"altcastCode":"36d375d0b9","server":"www.coveritlive.com","geometry":{"width":"fit","height":700},"configuration":{"newEntryLocation":"top","commentLocation":"top","replayContentOrder":"chronological","pinsGrowSize":"on","titlePage":"off","embedType":"stream","titleImage":"/templates/coveritlive/images/buildPage/DefaultImage.jpg"}}'>&nbsp;</span></div><script type='text/javascript'>window.cilAsyncInit = function() {cilEmbedManager.init()};(function() {if (window.cilVwRand === undefined) { window.cilVwRand = Math.floor(Math.random()*10000000); }var e = document.createElement('script');e.async = true;var domain = (document.location.protocol == 'http:' || document.location.protocol == 'file:') ? 'http://cdnsl.coveritlive.com' : 'https://cdnslssl.coveritlive.com';e.src = domain + '/vw.js?v=' + window.cilVwRand;e.id = 'cilScript-36d375d0b9';document.getElementById('cil-root-stream-36d375d0b9').appendChild(e);}());</script>
                                </div>
								<div class="tab-pane" id="pAbout">

									<iframe height="435px" frameborder="0" src="http://m.youversion.com/bible/kjv/gen/1/1" style="width:100%"></iframe>
								</div>
								<div class="tab-pane" id="pDetails">

									<div class="form" style="margin-top:-20px;">
										<form action="#" class="form-horizontal">
											<div class="form-group">

												<div class="col-sm-10" style="width:100%;">
													<textarea class="form-control" name="editor1" rows="20"></textarea>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="tab-pane" id="pNew">
									<strong class="title">Give Your Life To Jesus Now.</strong>
									<div class=" form">
										<form class="cmxform form-horizontal" id="salvationForm" method="post" action="">
											<div class="form-group ">
												<label for="cname" class="control-label col-lg-3">Your Name</label>
												<div class="col-lg-6">
													<input class=" form-control" id="cname" name="name" value="<?=$this->session->userdata('first_name')." ".$this->session->userdata('last_name');?>" minlength="2" type="text" required />
												</div>
											</div>
											<div class="form-group ">
												<label for="cemail" class="control-label col-lg-3">Your Email</label>
												<div class="col-lg-6">
													<input class="form-control " id="cemail" type="email" name="email" value="<?=$this->session->userdata('email');?>" required />
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-lg-3" for="phone">Phone Number</label>
												<div class="col-lg-6">
													<input type="text" placeholder="" id="phone" name="phone" data-mask="(999) 999-9999" value="<?=$this->session->userdata('phone_no');?>" class="form-control">

												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-lg-3" for="country">Country</label>
												<div class="col-lg-6">
													<select class="form-control" style="width: 300px" id="country" name="country" required >
                                                        <option value="">Select country</option>
                                                        <?php foreach(misc::$countries as $c) { ?>
                                                            <option value="<?=$c;?>" <?=($c==$this->session->userdata('country'))?"selected":"";?>><?=$c;?></option>
                                                        <?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-offset-3 col-lg-6">
													<button class="btn btn-primary" type="submit" id="submitBtn">
														Submit
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</main>
<!-- footer -->
<?php $this -> load -> view("layout/footer"); ?>
<script src="<?=base_url();?>asset/js/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(document).ready(function () {
        $('#salvationForm').submit(function (e) {
            e.preventDefault();
            $('#submitBtn').html('<i class="fa fa-spinner fa-spin fa-pulse"></i> Sending...');
            var email = this.email.value;
            var phone = this.phone.value;
            var country = this.country.value;

            $.post('/home/save_saved', {fname: '<?=$this->session->userdata("first_name");?>', lname: '<?=$this->session->userdata("last_name");?>', email: email, phone: phone, country: country}, function(data){
                if(data=="success"){
                    $('#salvationForm').prepend('<div class="alert alert dismissable alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Congratulations on receiving your salvation.</div>');
                }else{
                    $('#salvationForm').prepend('<div class="alert alert dismissable alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>A system error occured. Please report this issue and try again later.</div>');
                }
                $('#submitBtn').html('Submit');
            });
        });
    });
</script>