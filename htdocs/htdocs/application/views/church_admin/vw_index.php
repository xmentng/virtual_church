<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en" itemscope itemtype="http://schema.org/Product"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> 
<html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]--><head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php  echo @$data['page_title'];    ?></title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="humans.txt">
  
  <link rel="shortcut icon" href="" type="image/x-icon" />
  
  <!--Facebook Metadata /-->
  <meta property="fb:page_id" content="" />
	<meta property="og:image" content="" />
	<meta property="og:description" content=""/>
	<meta property="og:title" content=""/>
  
  <!--Google+ Metadata /-->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  <!-- <link rel="stylesheet" href="css/minified.css"> -->
  
  <!-- CSS imports non-minified for staging, minify before moving to production-->
  <link rel="stylesheet" href="">
 
  <!-- end CSS-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
background-color: #fff;
margin: 40px;
font: 13px/20px normal Helvetica, Arial, sans-serif;
color: #4F5155;
}

a {
color: #003399;
background-color: transparent;
font-weight: normal;
}

h1 {
color: #444;
background-color: transparent;
border-bottom: 1px solid #D0D0D0;
font-size: 19px;
font-weight: normal;
margin: 0 0 14px 0;
padding: 14px 15px 10px 15px;
}

code {
font-family: Consolas, Monaco, Courier New, Courier, monospace;
font-size: 12px;
background-color: #f9f9f9;
border: 1px solid #D0D0D0;
color: #002166;
display: block;
margin: 14px 0 14px 0;
padding: 12px 10px 12px 10px;
}

#body{
margin: 0 15px 0 15px;
}

p.footer{
text-align: right;
font-size: 11px;
border-top: 1px solid #D0D0D0;
line-height: 32px;
padding: 0 10px 0 10px;
margin: 20px 0 0 0;
}

#container{
margin: 10px;
border: 1px solid #D0D0D0;
-webkit-box-shadow: 0 0 8px #D0D0D0;
}


.info{
	border:solid 1px #006F6F;	
	
}

.success{
/*	border:solid 1px  #005680;	*/	
    border:solid  2px #001B35;
	background: #E8F3FF;
	color:#000D28;
	min-height:14px;
	
}
.error{
	border:solid 2px  #F00;
	background:#FFEAEA;
	color:#000D28;
}



/** the form elements **/
#this-form { box-sizing: border-box; }

#this-form .txtinput { 
display: block;
font-family: "Helvetica Neue", Arial, sans-serif;
border-style: solid;
border-width: 1px;
border-color: #dedede;
margin-bottom: 20px;
font-size: 1.55em;
padding: 11px 25px;
padding-left: 55px;
width: 65%;
color: #777;
box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;
-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset; 
transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-webkit-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-moz-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-o-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
}

#this-form .txtinput:focus { 
color: #333;
border-color: rgba(41, 92, 161, 0.4);
box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(41, 92, 161, 0.6);
-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(41, 92, 161, 0.6);
-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(41, 92, 161, 0.6);
outline: 0 none; 
}

#this-form input#name {
background: #fff url('/images/icons/user.png') 5px 4px no-repeat;
}

#this-form input#usr_pwd {
background: #fff url('/images/icons/user.png') 5px 4px no-repeat;
}


#this-form input#email {
background: #fff url('/images/icons/email.png') 5px 4px no-repeat;
}
#this-form input#website {
background: #fff url('/images/icons/website.png') 5px 4px no-repeat;
}
#this-form input#phone {
background: #fff url('/images/icons/phone.png') 5px 4px no-repeat;
}

#this-form textarea {
display: block;
font-family: "Helvetica Neue", Arial, sans-serif;
border-style: solid;
border-width: 1px;
border-color: #dedede;
margin-bottom: 15px;
font-size: 1.5em;
padding: 11px 25px;
padding-left: 55px;
width: 90%;
height: 180px;
color: #777;
box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;
-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset; 
transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-webkit-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-moz-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-o-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
}
#this-form textarea:focus {
color: #333;
border-color: rgba(41, 92, 161, 0.4);
box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(40, 90, 160, 0.6);
-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(40, 90, 160, 0.6);
-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset, 0 0 8px rgba(40, 90, 160, 0.6);
outline: 0 none; 
}
#this-form textarea.txtblock {
background: #fff url('/images/icons/speech.png') 5px 4px no-repeat;
}

#this-form #slider { width: 60%; }

#this-form #aligned { 
box-sizing: border-box; 
float: left; 
width: 450px; 
margin-right: 50px; 
}
#this-form #aside {
	float: left;
	width: 250px;
	padding: 0;
	box-sizing: border-box;
}

#wrapping { width: 100%; box-sizing: border-box; }

span.radiobadge { display: block; margin-bottom: 8px; }
span.radiobadge label { font-size: 1.2em; padding-bottom: 4px; }




select.selmenu {
	display: block;
font-family: "Helvetica Neue", Arial, sans-serif;
border-style: solid;
border-width: 1px;
border-color: #dedede;
margin-bottom: 20px;
font-size: 1.55em;
padding: 11px 25px;
padding-left: 55px;
width: 90%;
color: #777;
box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;
-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;
-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset; 
transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-webkit-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-moz-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
-o-transition: border 0.15s linear 0s, box-shadow 0.15s linear 0s, color 0.15s linear 0s;
}
select.selmenu2 {
font-size: 17px;
color: #676767;
padding: 9px !important;
border: 1px solid #aaa;
width: 200px;
}

/** custom buttons **/

#buttons { display: block; height:30px; line-height:25px; cursor:pointer; background:url(/images/backgrounds/btns_bg.png) repeat-x; }
#buttons #resetbtn {
display: block;
float: left;
color: #515151;
text-shadow: -1px 1px 0px #fff;
margin-right: 20px;
height: 3em;
padding: 0 1em;
outline: 0;
font-weight: bold;
font-size: 1.3em;
white-space: nowrap;
word-wrap: normal;
vertical-align: middle;
cursor: pointer;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
background-color: #fff;
background-image: -moz-linear-gradient(top,  rgb(255,255,255) 2%, rgb(240,240,240) 2%, rgb(222,222,222) 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(2%,rgb(255,255,255)), color-stop(2%,rgb(240,240,240)), color-stop(100%,rgb(222,222,222)));
background-image: -webkit-linear-gradient(top,  rgb(255,255,255) 2%,rgb(240,240,240) 2%,rgb(222,222,222) 100%);
background-image: -o-linear-gradient(top,  rgb(255,255,255) 2%,rgb(240,240,240) 2%,rgb(222,222,222) 100%);    background-image: -ms-linear-gradient(top,  rgb(255,255,255) 2%,rgb(240,240,240) 2%,rgb(222,222,222) 100%);
background-image: linear-gradient(top,  rgb(255,255,255) 2%,rgb(240,240,240) 2%,rgb(222,222,222) 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#dedede',GradientType=0 );
border: 1px solid #969696;
box-shadow: 0 1px 2px rgba(144, 144, 144, 0.4);
-moz-box-shadow: 0 1px 2px rgba(144, 144, 144, 0.4);
-webkit-box-shadow: 0 1px 2px rgba(144, 144, 144, 0.4);
text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
}

#buttons #resetbtn:hover {
text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);	
color: #818181;
background-color: #fff;
background-image: -moz-linear-gradient(top,  rgb(255,255,255) 2%, rgb(244,244,244) 2%, rgb(229,229,229) 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(2%,rgb(255,255,255)), color-stop(2%,rgb(244,244,244)), color-stop(100%,rgb(229,229,229)));
background-image: -webkit-linear-gradient(top,  rgb(255,255,255) 2%,rgb(244,244,244) 2%,rgb(229,229,229) 100%);background-image: -o-linear-gradient(top,  rgb(255,255,255) 2%,rgb(244,244,244) 2%,rgb(229,229,229) 100%); background-image: -ms-linear-gradient(top,  rgb(255,255,255) 2%,rgb(244,244,244) 2%,rgb(229,229,229) 100%); background-image: linear-gradient(top,  rgb(255,255,255) 2%,rgb(244,244,244) 2%,rgb(229,229,229) 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 );
border-color: #aeaeae;
box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
}

#buttons #submit_btn {
display: block;
float: left;
height: 3em;
padding: 0 1em;
border: 1px solid;
outline: 0;
font-weight: bold;
font-size: 1.3em;
color:  #fff;
text-shadow: 0px 1px 0px #222;
white-space: nowrap;
word-wrap: normal;
vertical-align: middle;
cursor: pointer;
-moz-border-radius: 2px;
-webkit-border-radius: 2px;
border-radius: 2px;
border-color: #5e890a #5e890a #000;
-moz-box-shadow: inset 0 1px 0 rgba(256,256,256, .35);
-ms-box-shadow: inset 0 1px 0 rgba(256,256,256, .35);
-webkit-box-shadow: inset 0 1px 0 rgba(256,256,256, .35);
box-shadow: inset 0 1px 0 rgba(256,256,256, .35);
background-color: rgb(226,238,175);
background-image: -moz-linear-gradient(top, rgb(226,238,175) 3%, rgb(188,216,77) 3%, rgb(144,176,38) 100%);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(3%,rgb(226,238,175)), color-stop(3%,rgb(188,216,77)), color-stop(100%,rgb(144,176,38))); 
background-image: -webkit-linear-gradient(top, rgb(226,238,175) 3%,rgb(188,216,77) 3%,rgb(144,176,38) 100%);
background-image: -o-linear-gradient(top, rgb(226,238,175) 3%,rgb(188,216,77) 3%,rgb(144,176,38) 100%);
background-image: -ms-linear-gradient(top, rgb(226,238,175) 3%,rgb(188,216,77) 3%,rgb(144,176,38) 100%);
background-image: linear-gradient(top, rgb(226,238,175) 3%,rgb(188,216,77) 3%,rgb(144,176,38) 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2eeaf', endColorstr='#90b026',GradientType=0 );
}
#buttons #submit_btn:hover, #buttons #submit_btn:active {
border-color: #7c9826 #7c9826 #000;
color: #fff;
-moz-box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
-ms-box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
-webkit-box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
box-shadow: inset 0 1px 0 rgba(256,256,256,0.4),0 1px 3px rgba(0,0,0,0.5);
background: rgb(228,237,189);
background: -moz-linear-gradient(top, rgb(228,237,189) 2%, rgb(207,219,120) 3%, rgb(149,175,54) 100%); 
background: -webkit-gradient(linear, left top, left bottom, color-stop(2%,rgb(228,237,189)), color-stop(3%,rgb(207,219,120)), color-stop(100%,rgb(149,175,54))); 
background: -webkit-linear-gradient(top, rgb(228,237,189) 2%,rgb(207,219,120) 3%,rgb(149,175,54) 100%); 
background: -o-linear-gradient(top, rgb(228,237,189) 2%,rgb(207,219,120) 3%,rgb(149,175,54) 100%); background: -ms-linear-gradient(top, rgb(228,237,189) 2%,rgb(207,219,120) 3%,rgb(149,175,54) 100%); background: linear-gradient(top, rgb(228,237,189) 2%,rgb(207,219,120) 3%,rgb(149,175,54) 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e4edbd', endColorstr='#95af36',GradientType=0 );
}

/** @group clearfix **/
.clearfix:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; }
.clearfix { display: inline-block; }
 
html[xmlns] .clearfix { display: block; }
* html .clearfix { height: 1%; }
</style>

<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>     
<script src="/js/libs/modernizr-2.6.2.min.js"></script>
 
  

</head>



<body>
	
</body>
</html>