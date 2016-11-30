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

    <title><?php echo @$data['page_title'];   ?></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="humans.txt">
    

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
    
    <?php  if(@$page_res['is_active']==1) echo '<meta http-equiv="refresh" content="60000000">';    ?>

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
    <link rel="stylesheet" href="/css/paginate.css">
	<link href="/css/maintabs.css" media="all" rel="stylesheet" />
    <link href="/css/chat.css" media="all" rel="stylesheet" />
    

    <link rel="stylesheet" href="/css/jquery.ui.all.css">	
    <link rel="stylesheet" href="/css/jquery-ui.css" media="all" />


	    <link rel="stylesheet" href="/css/nyroModal.css" type="text/css" media="screen" />

<script src="/js/libs/modernizr-2.0.6.min.js"></script>
<script type="text/javascript" src="/js/webtoolkit.aim.js"></script>
<script src="/js/jquery-1.8.2.min.js"></script>



<!--<script src="http://www.pastorchrisonline.org/js/swfobject.js"></script>-->


<!--<script src="../../jquery-1.8.2.js"></script>-->
<script src="/ui/jquery.ui.core.js"></script>
<script src="/ui/jquery.ui.widget.js"></script>
<script src="/ui/jquery.ui.tabs.js"></script>
<script src="/js/swfobject.js"></script>


<script type="text/javascript" src="/js/jquery.nyroModal.custom.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="/js/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/startstop-slider.js"></script>

<script type="text/javascript">
$(function() {
$('.nyroModal').nyroModal();
});
</script>
    <!--<script src="/js/chat.js"></script>-->
	<!--<link rel="stylesheet" href="../demos.css">-->
	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
    
    <style>
		.ui-draggable, .ui-droppable {
	background-position: top;
}
	</style>
   
   <style>
#backgroundPopup {
    z-index:1;
    position: fixed;
    display:none;
    height:auto;
    width:80%;
    background:#000000;
    top:0px;
    left:0px;
}
#toPopup {
    font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
    background: none repeat scroll 0 0 #FFFFFF;
    border: 10px solid #ccc;
    border-radius: 3px 3px 3px 3px;
    color: #333333;
    display: none;
    font-size: 14px;
    left: 50%;
    margin-left: -402px;
    position: fixed;
    top: 10%;
    width: 70%;
    z-index: 2;
	height:auto;
	  /*overflow:scroll;
*/}
div.loader {
    background: url("/images/loading.gif") no-repeat scroll 0 0 transparent;
    height: 32px;
    width: 32px;
    display: none;
    z-index: 9999;
    top: 40%;
    left: 50%;
    position: absolute;
    margin-left: -10px;
}
div.close {
    background: url("/images/closebox.png") no-repeat scroll 0 0 transparent;
    cursor: pointer;
    height: 30px;
    position: absolute;
    right: -27px;
    top: -24px;
    width: 30px;
}
span.ecs_tooltip {
    background: none repeat scroll 0 0 #000000;
    border-radius: 2px 2px 2px 2px;
    color: #FFFFFF;
    display: none;
    font-size: 11px;
    height: 16px;
    opacity: 0.7;
    padding: 4px 3px 2px 5px;
    position: absolute;
    right: -62px;
    text-align: center;
    top: -51px;
    width: 93px;
}
span.arrow {
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 7px solid #000000;
    display: block;
    height: 1px;
    left: 40px;
    position: relative;
    top: 3px;
    width: 1px;
}
div#popup_content {
    margin: 4px 7px;
    /* remove this comment if you want scroll bar
    overflow-y:scroll;
    height:200px
    */
}
</style>
</head>