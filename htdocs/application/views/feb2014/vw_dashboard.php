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
     <link rel="stylesheet" href="/feb2014/css/style.css">
      <link rel="stylesheet" href="/feb2014/css/main.css">


    <script src="/feb2014/js/libs/modernizr-2.0.6.min.js"></script>
    
</head>



<body class="bluebg">

<!--HEADER-->
<div id="header">
<!--<div class="cls_banner">

</div>-->
<div class="container">
<div class="row">
<div class="twelve columns">


<div id="header_logo" class="cls_banner"><img src="/feb2014/images/banner.png"  alt="logo"></div>
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
 <span style="font-size:14px; color:#fff;">The Christ Embassy virtual church is Church without walls; ministry without borders. It is an online Church that gives you the opportunity to enjoy the fellowship of believers anywhere in the world without limitations.</br></br>
It is a platform designed to take the gospel of our Lord Jesus Christ according to Believers LoveWorld to the ends of the earth and creates opportunities to expand our reach and ignite the fire of cyber evangelism throughout the world. 
Through the Christ Embassy virtual church we are also penetrating regions of the world where the light of the gospel is still dim and we are raising soldiers for Christ.
</span>     
      
      </div>
      
      <div class="five columns">
     <!--LOGIN FORM -->
     <div class=" righttxt">Already have an account?<br>
		<span style="font-size:11px;">Please enter your login details to continue.</span>
	</div>
    <div class="signin">
    	
        <form action="" method="post" name="frmlogin" style="padding:1px 7px;" id="this-form">
        	<code class="<?php echo @$data['css_class'];  ?>" id="post_result_msg"><?php  echo @$data['info_msg'];   ?>  </code>
                           
            <ul>
                <li class="field"><input class="text input" type="text" placeholder="User Name" name="usn" id="usn" /></li>
                <li class="field"><input class="password input" type="password" placeholder="Password" name="usr_pwd" id="usr_pwd" /></li>
                
                <li class="field"><input name="submit_btn" id="buttons" class="pretty medium warning btn" type="submit" value="Sign in" / style=" font-weight:bold"></li>
                
                 <li class="field">
                 	<a href="/auth/forgotpass" style="font-size:0.75em; text-decoration:underline;">Forgot Password?</a>
                 </li>
            </ul>
        </form>
    
    
    </div>
     </div>
      
      </div>
      
      
      <div class="row map" style="background:none;">
  	  <div class="seven columns">
      <!--BIG TEXT -->
  <div class="announcement_wrp" style="height:50px; width:100%;  margin-top:10px;">
  
  
  <div class="medium danger btn" style=" color:#fff; float:left; width:25%;font-size:14px;">Annoucements:</div>
  
<div style="float:left; width:72%"> <marquee scrolldelay="350" s style="font-size:12px; color:#002dac; background-color:#fff; height:38px; padding:0 10px;line-height:38px;">Welcome to our year of Greatness!.</marquee></div>

</div>
<div style="width:100%; padding-top:15px;"><div style="width:30%; height:100px; float:left; padding-right:15px;"><img src="/feb2014/images/bnnr.png"></div>
<div style="width:30%; height:100px; float:left;  padding-right:15px;"><img src="/feb2014/images/bnnr2.png"></div><div style="width:30%; height:100px; float:left; "><a href="#"><img src="/feb2014/images/bnnr3.png"></a></div>
</div>     

</div>
      
      <div class="five columns">
<div style="width:100%; padding-top:10px;">

<div style="width:100%;float:left; padding-bottom:7px;"><a href="#"><img src="/feb2014/images/imc.jpg"></a></div>
<div style="width:100%;float:left;"><a href="#"><img src="/feb2014/images/newyr.jpg"></a></div>
</div>


     </div>
      
      </div>
      
      
      
      
      </div>
      <div class=" clearfix"></div>

<!--FOOTER-->
<!--<div class="main_footer">
	<div class="container">
	<div class="row">
	<div class="twelve columns">Copyright © <?php  //echo date('Y');  ?> Internet Multimedia Ministry. All Rights Reserved. <br>
	</div></div></div>
</div>-->

<!--END OF CONTENT-->



  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
 <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
  <script>window.jQuery || document.write('<script src="js/jquery-1.8.2.min.js"><\/script>')</script>

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
  <script src="js/libs/gumby.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

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
		
		$.post('/auth/processlogindetails/', $('#this-form').serialize(), function(e){
		
			//alert(e);return false;s
			var sp = e.split('|');
			if(sp[0] == "failure"){
				
				$('#post_result_msg').removeClass("success");
				$('#post_result_msg').addClass("error");
				$('#post_result_msg').html(sp[1]);

			}//end if
			
			if(sp[0] == "success"){
				/*alert(sp[1]);
				return false;*/
				document.location = sp[1];
			}//end if
		
		});	
		
		return false;
	});
	
	return false;
});

</script>

  </body>
</html>
