<?php

//retrieve data
		//rettrieve the total testimonies
		$testimonies = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('church_id'=>$page_res['church_id'], 'status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
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
    <link rel="shortcut icon" href="/vchurch/v2_images/favicon.png">

    <title>Welcome! - Christ Embassy Virtual Church</title>
    
    <!-- Countdown CSS -->
    <link href="/vchurch/v2_css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800' rel='stylesheet' type='text/css'>
 
	<link href="/vchurch/v2_css/main.css" rel="stylesheet" media="all">


    <link href="/vchurch/v2_cssbootstrap.min.css" rel="stylesheet">
    <link href="/vchurch/v2_css/bootstrap-reset.css" rel="stylesheet">
    <link href="/vchurch/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/vchurch/v2_css/style.css" rel="stylesheet">
    <link href="/vchurch/v2_css/style-responsive.css" rel="stylesheet" />

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
<?php $this->load->view('vchurch/v1/church_member/headmast')  ?>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            
		<?php $this->load->view('vchurch/v1/church_member/left_sidebar')  ?>
    </div>
</aside>
<!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                       <div class="col-md-3">
                           <div class="profile-pic text-center">
                               <img src="<?php echo CUSTOM_BASE_URL.$this->session->userdata('profile_pic');   ?>" alt=""/>
                           </div>
                       </div>
                       <div class="col-md-9">
                           <div class="profile-desk" style="border:none;">
                               <h1>Sunday Service Highlights!</h1>
                               <span class=" text-primary">Pst Mary Owase</span>
                               <p>
                                   Words are sensible sounds of a language through which messages are communicated and can be identified by natives of the same; that is, natives of that language.
<p>
Words are important and should be valued just as money is valuable however some people don't have value for money so they are wasteful. The way to be rich is to have good value for money and the sense of wisdom to use it. In the same vein, it is important to learn the value of words and how to use them; if you do, you will live an extraordinary life of success.
                             </p>
                               <a href="highlights.html" class="btn btn-info">Read &amp; Make Comments</a>
                           </div>
                       </div>
                       
                    </div>
                    
                    <div class="col-md-8" style="background-color:#FFF; margin-top:15px;">
                                        <div class="recent-act">
                                            <h1>RECENT ACTIVITIES</h1>
                                            <div class="activity-icon terques">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="activity-desk">
                                              <h2>PUNCTUALITY!</h2>
                                                <p>Please service starts by 18:30 GMT, so login early and feed your spirit with The Word</p>
                                          </div>
                                          
                                          <div class="activity-desk" style="margin-top:15px;">
                                              <h2>PARTNERSHIP SuNDAY</h2>
                                                <p>Remember that this Sunday, 25th March is our PARTNERSHIP day! Come with your seeds and connect to Grace</p>
                                          </div>
                                          
                                          
                                            <div class="activity-icon red">
                                                <i class="fa fa-beer"></i>
                                            </div>
                                            <div class="activity-desk">
                                                <h2 class="red">Sis Gbemisola's testimony</h2>
                                                <p>5 years without a child and The lord has done it for me. Last month the Holy Spirit nudged me to duble my partnership, I spoke to my husband about it and...<a href="testimonies.html" class="blue">more</a></p>
                                            </div>
                                            
                                            <div class="activity-desk" style="margin-top:15px;">
                                                <h2 class="red">Bro Kingsley's testimony</h2>
                                                <p>For 3 years I've been without a job, taking on anything to do to get stipends that'll keep my head over the waters, at least for a day. it has been a fight to survive for a day series, until I started attending Christ Embassy...<a href="testimonies.html" class="blue">more</a></p>
                                            </div>
                                            
                                            <div class="activity-icon purple">
                                                <i class="fa fa-tags"></i>
                                            </div>
                                            <div class="activity-desk">
                                                <h2 class="purple">PHOTO SHOTS FROM WED, 24TH MARCH SERVICE</h2>
                                                <p>Pastor Dee on the Word, and you could feel the power surging through the Church!</p>
                                                <div class="photo-gl">
                                                    <a href="#">
                                                        <img src="<?php  echo CUSTOM_BASE_URL."/images/siloh.jpg";   ?>" alt=""/>
                                                    </a>
                                                    <a href="#">
                                                        <img src="<?php  echo CUSTOM_BASE_URL."/images/siloh.jpg";  ?>" alt=""/>
                                                    </a>
                                                    <a href="#">
                                                        <img src="<?php echo CUSTOM_BASE_URL."/images/siloh.jpg";  ?>" alt=""/>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="activity-icon green">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="activity-desk">
                                                <h2 class="green">Pastor Chris Live!</h2>
                                                <p>Learn the power and importance of the spoken Word ' the Word in your mouth, in today's rhapsody or visit<a href="www.rhapsodyofrealities.org" class="blue">www.rhapsodyofrealities.org.</a>For 15mins at 12noon and 10pm (Local/GMT), we'll pray for countries that are troubled with unrest, terrorism and war. Pray specially for Syria. Proclaim peace for and upon these nations. Pray fervidly in the spirit.
 
God bless you.</p>
                                            </div>

                                            <div class="activity-icon yellow">
                                                <i class="fa fa-user-md"></i>
                                            </div>
                                            <div class="activity-desk">
                                                <h2 class="yellow">Baby Gbemisola Akeju Morakinyo's Dedication</h2>
                                                <p>It's happening this Sunday, roll out the drums as we celebrateMr & Mrs Iweka </p>
                                            </div>

                                        </div>
                  </div>
                                    
                                    <div class="col-md-4" style="margin-top:15px;">
        <!--chat start-->
        <section class="panel" style="padding:1%; background-color:#0f5195; background-image:url(/vchurch/v2_images/countdown_bkgr.jpg);">
        
<ul id="countdown" style="font-size: 2em;
	font-weight: bold;
	color: #FFF;
	height:auto;
	line-height: 1.0;
	position: relative;
    margin-top:15px;
    padding-right:15px;
    text-align:center;">
    
        <h3 style="text-align:center; text-transform:uppercase; font-weight:bold; margin:1%;">Countdown To The Next church Service!</h3>
<li> <span class="days">00</span>
<p class="timeRefDays">days</p>
</li>
<li> <span class="hours">00</span>
<p class="timeRefHours">hours</p>
</li>
<li> <span class="minutes">00</span>
<p class="timeRefMinutes">minutes</p>
</li>
<li> <span class="seconds">00</span>
<p class="timeRefSeconds">seconds</p>
</li>
</ul>
        
        </section>
        <!--chat end-->
    </div>
    
    <div class="col-md-4" style="margin-top:15px;">
        <!--chat start-->
        <section class="panel">
            <header class="panel-heading">
                PASTOR CHRIS LIVE YOOKS<span class="tools pull-right">
            </span>
            </header>
            <div class="panel-body">
                <div class="chat-conversation">
                    <ul class="conversation-list">
                        
                      <li class="clearfix">
                            <div class="chat-avatar">
                                <img src="/vchurch/v2_images/avatar-pastor.jpg" alt="male">
                                <i>10:00</i>
                          </div>
                            <div class="conversation-text" style="width:80%;">
                                <div class="ctext-wrap" style="color:#333; text-align:justify;">
                                    <i>Pastor Chris Live</i>
                                    <p>
                                       We had a glorious healing service at the Healing School Autumn session in Johannesburg yesterday. Many from around the world were healed of diverse sicknesses and diseases, and from demonic oppressions. Visiting ministers from Russia, Ukraine, India, Egypt, Bahrain, Australia, Finland, Switzerland, Uzbekistan, Puerto Rico, Pakistan, Kuwait, and several other countries shared the wonderful and moving moments with us. We're thankful to the Lord for the mighty miracles wrought in the precious Name of our Lord Jesus Christ. (You can see some of the pictures of the service on our landing page).<p><br>
 
At 12noon and 10pm (local/GMT) we'll pray mostly in tongues for 15min, praying specially for the churches in your country, that their faith be strengthened in the Lord, that the Word of the Lord may be glorified in them.<p><br>
 
God bless you.

                                  </p>
                                </div>
                            </div>
                        </li>
                        </ul>
                </div>
            </div>
        </section>
        <!--chat end-->
    </div>
                    
                </section>
            </div>
            
            
            
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar start-->
<div class="right-sidebar">
<div class="right-stat-bar">
<ul class="right-side-accordion">
<li class="widget-collapsible">
    <a href="#" class="head widget-head red-bg active clearfix">
        <span class="pull-left">Schedule (5)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row side-mini-stat clearfix">
                <div class="side-graph-info">
                    <h4>Easter Service
                    <p>
                        21st April
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="target-sell">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>Healing School Autumn Session</h4>
                    <p>
                        March - April 2014
                    </p>
                </div>
                
            </div>
            
            <div class="prog-row side-mini-stat">
                <div class="side-graph-info">
                    <h4>ommunion Service</h4>
                    <p>
                        th April 2014
                    </p>
                </div>
                <div class="side-mini-graph">
                    <div class="d-pending">
                    </div>
                </div>
            </div>
            <div class="prog-row side-mini-stat">
                <div class="col-md-12">
                    <h4>International Cell Leaders' Conference 2014</h4>
                    <p>
                        April 12th - April 15th 2014
                    </p>
                    
                </div>
            </div>
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head terques-bg active clearfix">
        <span class="pull-left"> <?php  if(count(@$online_users['id'])>1){ echo "Online Members (".count(@$online_users['id']).")"; }else{ echo "Online Member (".count(@$online_users['id']).")"; }  ?></span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
        
        <?php
			if(count(@$online_users['id']) > 0){
				for($a=0; $a<5; $a++):
				
						$fname2 = $online_users['first_name'][$a];
						$lname2 = $online_users['last_name'][$a];
						
						
						$full_name2 = $fname2." ".$lname2;
						$pix_src2 = @$online_users['profile_pic'][$a];
						
						if(@$online_users['id'][$a] != $this->session->userdata('user_id')):
		?>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="<?php echo CUSTOM_BASE_URL.@$pix_src2;   ?>" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#"><?php echo $full_name2;  ?></a></h4>
                   
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            
            <?php	
						endif;
				endfor;
			}else{
			?>
            <div class="prog-row">
                <div>There are no online users</div>
            </div>
            
            <?php
			}
			?>
            
           <!-- <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="/vchurch/v2_images/avatar1.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Anjelina Joe</a></h4>
                   
                </div>
                <div class="user-status text-success">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="/vchurch/v2_images/chat-avatar2.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">John Doe</a></h4>
                   
                </div>
                <div class="user-status text-warning">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="/vchurch/v2_images/avatar1_small.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Mark Henry</a></h4>
                   
                </div>
                <div class="user-status text-info">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb">
                    <a href="#"><img src="/vchurch/v2_images/avatar1.jpg" alt=""></a>
                </div>
                <div class="user-details">
                    <h4><a href="#">Shila Jones</a></h4>
                  
                </div>
                <div class="user-status text-danger">
                    <i class="fa fa-comments-o"></i>
                </div>
            </div>-->
			
			
			
            
        </li>
    </ul>
</li>
<li class="widget-collapsible">
    <a href="#" class="head widget-head purple-bg active">
        <span class="pull-left"> Notifications (3)</span>
        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
    </a>
    <ul class="widget-container">
        <li>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        just now
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        2 min ago
                    </p>
                    <p>
                        <a href="#">Jane Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
            <div class="prog-row">
                <div class="user-thumb rsn-activity">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="rsn-details ">
                    <p class="text-muted">
                        1 day ago
                    </p>
                    <p>
                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                    </p>
                </div>
            </div>
        </li>
    </ul>
</li>

</ul>
</div>
</div>
<!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="/vchurch/v2_js/jquery.js"></script>
<script src="/vchurch/v2_js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/vchurch/v2_js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/vchurch/v2_js/jquery.scrollTo.min.js"></script>
<script src="/vchurch/v2_js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="/vchurch/v2_js/jquery.nicescroll.js"></script>

<!--common script init for all pages-->
<script src="/vchurch/v2_js/scripts.js"></script>

<script src="/vchurch/v2_js/jquery-1.9.0.min.js"></script>
 

 
 
<script type="text/javascript">
    //<![CDATA[
       
	   $(window).load(function() { // makes sure the whole site is loaded
            $("#preloader").fadeOut("slow"); // will fade out the white DIV that covers the website.
			$("body").removeClass("loading");
			
        })
		
		
		
    //]]>
</script>
 
 
<script src="/vchurch/v2_js/countdown.js"></script>
<script type="text/javascript">
	
		$(document).ready(function(){
			$("#countdown").countdown({
			date: "30 march 2014 08:00:00", /*Change your time here*/
			format: "on"
			},
			
			function() {
				// callback function
			});
		});
	
	</script>
 
<script type="text/javascript">  
	$(document).ready(function(){
		resizeDiv();
	});
	
	
	window.onresize = function(event) {
		resizeDiv();
	}
	
	function resizeDiv() {
		vpw = $(window).width();
		vph = $(window).height();
		$('.jumbotron').css({'height': vph + 'px'});
	}
</script>

</body>
</html>
