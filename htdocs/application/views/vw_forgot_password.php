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
     <link rel="stylesheet" href="/css/style.css">
      <link rel="stylesheet" href="/css/main.css">


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


<div id="header_logo" class="cls_banner"><img src="/images/banner.png"  alt="logo"></div>
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
      <div class="bigtxt">
      Virtual  <br>
<span>Church</span>
        <br>   
&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  
Portal
      </div>
      
      
      </div>
      
      <div class="five columns">
     <!--LOGIN FORM -->
     <div class=" righttxt">&nbsp;<br>
		<span style="font-size:11px;">&nbsp;</span>
	</div>
    <div class="signin">
    	
        <form action="" method="post" name="frmlogin" style="padding:1px 7px;" id="frmlogin">
        	<code class="<?php echo @$data['css_class'];  ?>" id="post_result_msg"><?php  echo @$data['info_msg'];   ?>  </code>
                           
            <ul>
                <li class="field"><input class="text input" type="text" placeholder="Email Address" name="email" id="email" /></li>

                <li class="field">
                	<input name="submit_btn" id="buttons" class="pretty medium warning btn" type="submit" value="Recover"  style=" font-weight:bold">
                </li>
                
                <li class="field">
                 	<a href="<?php echo CUSTOM_BASE_URL;   ?>" style="font-size:0.75em; text-decoration:underline;">Sign in</a>
                 </li>
                
                 
            </ul>
        </form>
    
    
    </div>
     </div>
      
      </div></div>
      <div class=" clearfix"></div>

<!--FOOTER-->
<div class="main_footer">
<div class="container">
<div class="row">
<div class="twelve columns">Copyright © <?php  echo date('Y');  ?> Internet Multimedia Ministry. All Rights Reserved. <br>
<!--  <a href="#">Terms of Use </a>|  <a href="#">Copyright</a> |   <a href="#">Privacy & Policy</a></div>
--></div></div></div>

<!--END OF CONTENT-->



  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
  <script>window.jQuery || document.write('<script src="/js/jquery-1.8.2.min.js"><\/script>')</script>

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
	
	$('#buttons').click(function(){
		
		$.post('/auth/recover_password', $('#frmlogin').serialize(), function(e){
		
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
	
	return false;
});

</script>

  </body>
</html>
