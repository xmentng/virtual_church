<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]--><head>
    <meta charset="utf-8">

    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php  echo @$data['page_title'];    ?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="humans.txt">

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

    <!-- Facebook Metadata /-->
    <meta property="fb:page_id" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content=""/>
    <meta property="og:title" content=""/>

    <!-- Google+ Metadata /-->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <!-- We highly recommend you use SASS and write your custom styles in sass/_custom.scss.
       However, there is a blank style.css in the css directory should you prefer -->
     <link rel="stylesheet" href="/css/login/style.css">
      <link rel="stylesheet" href="/css/login/main.css">


    <script src="/js/libs/modernizr-2.0.6.min.js"></script>
    
</head>



<body class="bluebg">

<!--HEADER-->
<div id="header">
<!--<div class="cls_banner">

</div>-->
<div class="container">
<div class="row">
<div class="twelve columns">


<div id="header_logo" class="cls_banner"><img src="/user_res/banners/banner2.png"  alt="logo"></div>
<!--<div class="cls_about_portal">
	<a href="">About this Portal</a>
</div>-->
<!--<div id="header_time">
	<?php  //echo date('l, j F, Y');   ?><br>
<br><br><br>
<a href="#">About us  </a> <a href="#">| </a> <a href="#"> Contact us</a>

</div>-->
</div></div>
</div></div>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row map">
  	  <div class="seven columns">
      <!--BIG TEXT -->
      <div class="biggietxt" style="margin-bottom:20px;">
      Welcome to the Christ Embassy VIRTUAL CHURCH Portal.
      </div>
 <span style="font-size:14px; color: #000;">The Christ Embassy virtual church is Church without walls; ministry without borders. It is an online Church that gives you the opportunity to enjoy the fellowship of believers anywhere in the world without limitations.</br></br>
It is a platform designed to take the gospel of our Lord Jesus Christ according to Believers LoveWorld to the ends of the earth and creates opportunities to expand our reach and ignite the fire of cyber evangelism throughout the world. 
</span>     
      
      </div>
      
      <div class="five columns">
     <!--LOGIN FORM -->
     <div class=" righttxt" style="font-weight:bolder;">Retrieve Password<br>
		
	</div>
    <div class="signin">
    	
        <form action="" method="post" name="frmlogin" style="padding:1px 7px;" id="this-form">
		
        	<code class="<?php echo @$data['css_class'];  ?>" id="post_result_msg"><?php  echo @$data['info_msg'];   ?>  </code>
                           
            <ul>
                <li class="field"><input class="text input" type="text" placeholder="Username or E-mail" name="usn" id="usn" /></li>
             
                
                <li class="field" style="text-align:center;">
					<input name="btngetpwd" id="btngetpwd" class="" type="submit" value="Retrieve Password" style="background-color:#419efd; color:#fff; font-weight:bold; padding-top:8px; padding-bottom:8px;">
				</li>
				
				<li class="field" style="text-align:center;">
					Already a User? 
					<a href="<?php echo CUSTOM_BASE_URL;   ?>">
						<span>Sign in</span>
					</a>
				</li>
				
				<li class="field" style="text-align:center;">
					New User? 
					<a href="<?php echo CUSTOM_BASE_URL."/registration";   ?>">
						<span>Register</span>
					</a>
				</li>
				
            </ul>
        </form>
    
    
    </div>
     </div>
      
      </div>
      
      
      <div class="row map" style="background:none;">
  	  <div class="seven columns">
      <!--BIG TEXT -->
  <div class="announcement_wrp" style="height:50px; width:100%;  margin-top:-75px;">
  
  
  <div class="medium danger btn" style=" color:#fff; float:left; width:25%;font-size:14px;">Announcements:</div>
  
<div style="float:left; width:72%"> <marquee style="font-size:12px; color:#002dac; background-color:#fff; height:38px; padding:0 10px;line-height:38px;">Please enter your login details to continue. Please enter your login details to continue Please enter your login details to continue.</marquee></div>

</div>
</div>
      
      </div>
      
      
      
      
      </div>
      <div class=" clearfix"></div>

<!--FOOTER-->
<div class="main_footer" style="bottom:0;">
<div class="container">
<div class="row">
<div class="twelve columns">Copyright © <?php echo date('Y');  ?> Internet Multimedia Ministry. All Rights Reserved. <br>
<!--  <a href="#">Terms of Use </a>|  <a href="#">Copyright</a> |   <a href="#">Privacy & Policy</a></div>
--></div></div></div>

<!--END OF CONTENT-->



  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
 

  <!--
  Include gumby.js followed by UI modules.
  Or concatenate and minify into a single file
  <script src="js/libs/gumby.js"></script>
  <script src="js/libs/ui/gumby.retina.js"></script>
  <script src="js/libs/ui/gumby.fixed.js"></script>
  <script src="js/libs/ui/gumby.skiplink.js"></script>
  <script src="js/libs/ui/gumby.toggleswitch.js"></script>
  <script src="js/libs/ui/gumby.checkbox.js"></script>
  <script src="js/libs/ui/gumby.radiobtn.js"></script>
  <script src="js/libs/ui/gumby.tabs.js"></script>
  <script src="js/libs/ui/jquery.validation.js"></script>
  -->
  <script src="/js/jquery-1.8.2.min.js"></script>
  <script src="/js/libs/gumby.min.js"></script>
  <script src="/js/plugins.js"></script>
  <script src="/js/main.js"></script>

  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
  <script type="text/javascript">

$(document).ready(function(){
	//alert(1); return false;
	////////////////////////////////////////////////////////////////////////////////////////////

	
	/////////////////////////////////////////////////////////////////////////////////////////////
	
	$('#btngetpwd').click(function(){
		
		$('#post_result_msg').removeClass("success");
		$('#post_result_msg').removeClass("error");
		$('#post_result_msg').addClass("info");
		$('#post_result_msg').html('<img src="/images/loading.gif" />&nbsp;Please wait...');
		
		$.post('/password/getUserLoginInfo', $('#this-form').serialize(), function(e){
		
			//alert(e);return false;
			var sp = e.split('|');
			if(sp[0] == "failure"){
				
				$('#post_result_msg').removeClass("success");
				$('#post_result_msg').addClass("error");
				$('#post_result_msg').html(sp[1]);

			}//end if
			
			if(sp[0] == "success"){
				$('#post_result_msg').removeClass("error");
				$('#post_result_msg').addClass("success");
				$('#post_result_msg').html(sp[1]);
			}//end if
		
		});	
		
		return false;
	});
	
	///////////////////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////////////////////
	
	return false;
});

</script>

  </body>
</html>
