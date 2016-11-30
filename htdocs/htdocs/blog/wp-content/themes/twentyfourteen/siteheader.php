<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 ">
	<title>Christ Embassy Online Church<?=(isset($page_title))?" - ".$page_title:"";?></title>
	<link type="text/css" rel="stylesheet" href="<?=base_url()."asset";?>/css/bootstrap.min.css" media="all">
	<link type="text/css" rel="stylesheet" href="<?=base_url()."asset";?>/css/all.css" media="all">
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<link media="all" rel="stylesheet" href="<?=base_url()."asset";?>/css/ie.css" />
    
    <link rel="shortcut icon" href="<?=base_url()."asset";?>/images/favicon.png"/>
    <link rel="stylesheet" href="<?=base_url();?>asset/css/bootstrap-datepicker.min.css" type="text/css" media="screen" charset="utf-8"/>
	
</head>
<body>
	<!-- wrapper -->
	<div id="wrapper">
		<!-- header -->
		<header id="header">
			<!-- topbar -->
			<div class="topbar">
				<!-- Donations 
				<div class="donation">
                <span class="shadow"></span>
							<a href="javascript:;" class="map-close" style="margin:10px !important;">Close</a>
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h2>Give Donation for a cause</h2>
								<div class="col-sm-12 amount-box">
									<ul>
										<li><a href="#"><sup>$</sup>10</a></li>
										<li><a href="#"><sup>$</sup>20</a></li>
										<li><a href="#"><sup>$</sup>50</a></li>
										<li><a href="#"><sup>$</sup>100</a></li>
									</ul>
									<form>
										<fieldset>
											<input type="text" placeholder="Other Amount">
											<input type="submit" value="Submit">
										</fieldset>
									</form>
								</div>
								<div class="col-md-8 col-md-offset-2 ">
									<p>Kindly pay your partnership and your special seeds and offerings here. Thank you and God bless you.
								</div>
							</div>
							
						</div>
					</div>
				</div>-->
				
				<div class="container has-feedback">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<!-- timing -->
							<div class="timing">
								<strong class="h3">Sunday Service</strong>
							  	<time>Sunday 09:45 am to 01:30pm</time>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 text-center">
							<!-- top navigation 
							<nav class="topnav">
								<ul>
									<li><a href="#" class="donation-opener map-close">Give Online</a></li>
									<li><a href="#">Online Store</a></li>
								</ul>
							</nav>-->
						</div>
						<div class="col-lg-4 col-md-4 text-right">
                        
                        <!-- shoping cart -->
							<div class="shoping-cart">
								<?php
								$sessfn = $this->session->userdata('user_name');
								if($sessfn!=""){
									$ufirstname = ucfirst($this->session->userdata('first_name'));
									$ulastname = ucfirst($this->session->userdata('last_name'));
								?>
								Welcome <?=$ufirstname." ".$ulastname;?>! | <a href="<?=base_url("auth/logout");?>">Log Out</a>
								<?php }else{ ?>
								Welcome Guest! | <a href="<?=base_url("auth/login");?>">Log In</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container has-feedback">
				<!-- logo -->
				<div class="logo">
					<a href="<?=base_url('home');?>"><img src="<?=base_url()."/asset";?>/images/logo.png" alt="CE Online Church" width="22" height="13">
					</a>
				</div>
				<div class="header-holder">
					<!-- top social networks -->
					<ul class="social-networks">
						<li><a href="#"><span class="fa fa-facebook"></span></a></li>
						<li><a href="#"><span class="fa fa-twitter"></span></a></li>
						<li><a href="#"><span class="fa fa-youtube"></span></a></li>
					</ul>
					<!-- events -->
					<div class="events hidden-xs">
						<strong class="h3">Next Service</strong>
						<div class="timer">
							<div class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s" id="getting-started"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<!-- main navigation -->
				<nav id="nav" class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<span class="title visible-xs">Menu</span>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="<?=base_url('home');?>">Home</a></li>
								<li>
									<a href="#" data-toggle="dropdown">Services</a>
									<!-- dropdown -->
									<ul class="dropdown-menu" role="menu">
										<li><a href="<?=base_url("churchmember/church_service");?>">Live Services</a></li>
										<li><a href="<?=base_url("churchmember/videos");?>">Service Highlights</a></li>
									</ul>
								</li>
								<li><a href="#">Foundation School</a></li>
								<li><a href="<?=base_url("cellsystem/cells");?>">Cells</a></li>
								
								<li><a href="#">Resources</a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="<?=base_url();?>blog/" target="_blank">Blog</a></li>
										
										<li><a href="<?=base_url('home/freebies');?>">Freebies</a></li>
										
                                        </ul>
								</li>
                                
                                <li><a href="<?=base_url('home/prayer');?>">Prayer Request</a></li>
                                
								<li><a data-target="#inquary-form" data-toggle="modal" href="#">Contact Us</a>
                                </li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</header>