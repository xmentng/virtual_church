		<?php $this->load->view('layout/header2'); ?>
		<?php $this->load->view('layout/slide'); ?>
		<!-- main -->
		<main id="main" role="main" class="home">
			<!-- sermon -->
			<?php foreach($videos as $v) { ?>
			<section class="sermon wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.5s">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-9-col-sm-9">
							<h3>Sunday Service Highlights</h3>
							<div class="box">
								<img src="<?=base_url()."/asset";?>/images/img2.png" width="41" height="41" alt="image description" class="alignleft">
								<div class="text">
									<p><?=$v['video_title'];?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3-col-sm-3">
							<ul class="buttons">
								<li>
									<a href="#videoPopup" class="fancybox"><span class="fa fa-video-camera"></span></a>
									<div id="videoPopup" class="fancyPopup videoPopup">
										<h3><?=$v['video_title'];?></h3>
										<video width="640" height="360" src="<?=$v['video_url'];?>" id="player1" poster="<?=$v['video_thumbnail_url'];?>" controls preload="none"></video>
									</div>
								</li>
								<!--<li>
									<a href="#"><span class="fa fa-download"></span></a>
									<div class="dropdown">
										<ul>
											<li><a href="#">Download Video</a>
											</li>
										</ul>
									</div>
								</li>-->
							</ul>
						</div>
					</div>
				</div>
			</section>
			<?php } ?>
			<div class="container">
            <!-- posts -->

            <div class="posts container text-center">
				<div class="row">
					<?php if($this->session->flashdata('success')): ?>
			        <div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php elseif($this->session->flashdata('error')): ?>
			        <div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php endif; ?>
					<div class="col-sm-4 col-xs-12">
						<div class="box">
							<div class="img-holder">
								<img src="<?=base_url()."/asset";?>/images/img3.jpg" alt="image description">
								
								<strong class="title">
									<span>Join the Christ Embassy Family</span>
								</strong>
							</div>
							<p>Welcome To Christ Embassy Church Online—Taking the gospel to the ends of the earth and bringing men into their inheritance in Christ. Become a member today!</p>
							<div class="button">
								<a href="<?=base_url("cellsystem/landing");?>" class="btn btn-default">Join Us Now!</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="box even">
							<div class="img-holder">
								<img src="<?=base_url()."/asset";?>/images/img4.jpg" alt="image description">
								<strong class="title">
									<span>Connect to Live Services and Events</span>
								</strong>
							</div>
							<p>You can connect to our live global services and events anywhere from around the world, and experience the glory of God’s presence right where you are!</p>
							<div class="button">
                                <a href="<?=base_url("churchmember/church_service");?>" class="btn btn-default">Join Service</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="box">
							<div class="img-holder">
								<img src="<?=base_url()."/asset";?>/images/img5.jpg" alt="image description">
								<strong class="title">
									<span>Experience Spiritual Growth</span>
								</strong>
							</div>
							<p>Watch your life soar and take on a new meaning, as you grow in grace, and in the knowledge of our Lord and Saviour Jesus Christ!</p>
							<div class="button">
								<a href="<?=base_url("home/foundation_school");?>" class="btn btn-default">Learn More</a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

				<div class="row">
					<section class="col-xs-12 col-sm-6">
						<!-- banner -->
						<div class="banner" style="padding:3% 0px 0px 5% !important;">
							<div class="bg-stretch">
								<img src="<?=base_url()."/asset";?>/images/img23pcnob.jpg">
							</div>

						<div style="width:65% !important; float:right !important;">
							 <strong class="h4">MINISTRY EVENT REPORT</strong>
							<h2><time datetime="2016-02-06">PASTOR CHRIS' TEACHING AT THE NIGHT OF BLISS GHANA 2016</h2>
                            <p>The extraordinary teaching ministry of the man of God, Rev. (Dr.) Chris Oyakhilome, was at the LIVE disposal of the nation of Ghana at the Night of Bliss concluded just a few days ago.</p>
                            <a href="/home/ministry_events" class="btn btn-default">Read Report</a>
						</div>
					</section>

					<section class="col-xs-12 col-sm-6">
						<!-- team -->
						<div class="team">
							<img src="<?=base_url()."/asset";?>/images/img24.png" alt="image description" class="alignright hidden-xs">
							<div class="text">
								<h3><a href="#">Sound Code And The Spirit</a></h3>
								<strong class="designation">MESSAGE OF THE WEEK</strong>
								<p>You will discover the principle of sound code and how to use it to create things that have never existed before.</p>
								<!-- top social networks -->
								<div class="button">
								<a href="http://www.christembassyonlinestore.org" target="_blank" class="btn btn-default">Order Now!</a></div>
							</div>
						</div>
					</section>
				</div>
			</div>


			<!-- testimonials -->
			<div class="testimonials container-fluid text-center">

				<div class="row">
					<div class="col-xs-12 hidden-xs col-sm-12 post">
						<div class="row">
							<div class="parallax img-parallax2" data-velocity=".8" data-fit="90"></div>
							<div class="mask">
								<div class="slideset" style="height: 200px !important; width: 670px; overflow-y: hidden; overflow-x: hidden; align-content: center;">
									<?php if(count($testimonies) > 0){ ?>
										<?php foreach($testimonies as $t){ ?>
										<blockquote style="margin: auto; width: 685px; padding-right: 50px; height: 200px; overflow-y: scroll;">
											<div class="holder">
												<q><?=$this->misc->trunc($t['test_body'], 70);?></q>
												<cite><?=$t['full_name'];?></cite>
											</div>
										</blockquote>
										<?php } ?>
									<?php } else { ?>
									<blockquote>
										<div class="holder">
											<q>There are no testimonies at the moment.</q>
										</div>
									</blockquote>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--<div class="container widgets">
				<div class="row">
					<!-- blogs
					<div class="col-lg-5 col-lg-push-4 col-sm-12">
						<div class="blogs">
							<strong class="h3">Special Blogs</strong>

                            <article class="blog">
								<div class="box">
									<div class="video">
										<a href="#">
											<img src="<?/*=base_url()."/asset";*/?>/images/img19.jpg" alt="image description">
											<span class="arrow"></span>
										</a>
									</div>
									<div class="text">
										<time datetime="2015-04-12"><span class="fa fa-calendar-o"></span>Aug 26, 2015</time>
										<h3><a href="#">Now You're Born Again</a></h3>
										<ul class="meta">
											<li><a href="#" class="comments"><span class="fa fa-comment"></span>147 Comments</a>
											</li>
											<li><a href="#" class="likes"><span class="fa fa-heart"></span>36 Likes</a>
											</li>
										</ul>
									</div>
								</div>
							</article>

							<article class="blog">
								<div class="box">
									<div class="video">
										<a href="#">
											<img src="<?/*=base_url()."/asset";*/?>/images/img19.jpg" alt="image description">
											<span class="arrow"></span>
										</a>
									</div>
									<div class="text">
										<time datetime="2015-04-12"><span class="fa fa-calendar-o"></span>Aug 24, 2015</time>
										<h3><a href="">The victorious life</a></h3>
										<ul class="meta">
											<li><a href="#" class="comments"><span class="fa fa-comment"></span>54 Comments</a>
											</li>
											<li><a href="#" class="likes"><span class="fa fa-heart"></span>316 Likes</a>
											</li>
										</ul>
									</div>
								</div>
							</article>

							<article class="blog">
								<div class="box">
									<div class="video">
										<a href="#">
											<img src="<?/*=base_url()."/asset";*/?>/images/img19.jpg" alt="image description">
											<span class="arrow"></span>
										</a>
									</div>
									<div class="text">
										<time datetime="2015-04-12"><span class="fa fa-calendar-o"></span>August 22, 2015</time>
										<h3><a href="">The Holy Spirit, your comforter
										<ul class="meta">
											<li><a href="#" class="comments"><span class="fa fa-comment"></span>155 Comments</a>
											</li>
											<li><a href="#" class="likes"><span class="fa fa-heart"></span>366 Likes</a>
											</li>
										</ul>
									</div>
								</div>
							</article>

							<article class="blog">
								<div class="box">
									<div class="video">
										<a href="#">
											<img src="<?/*=base_url()."/asset";*/?>/images/img19.jpg" alt="image description">
											<span class="arrow"></span>
										</a>
									</div>
									<div class="text">
										<time datetime="2015-04-12"><span class="fa fa-calendar-o"></span>August 20, 2015</time>
										<h3><a href="">If these things be in you</a></h3>
										<ul class="meta">
											<li><a href="#" class="comments"><span class="fa fa-comment"></span>142 Comments</a>
											</li>
											<li><a href="#" class="likes"><span class="fa fa-heart"></span>361 Likes</a>
											</li>
										</ul>
									</div>
								</div>
							</article>
						</div>
					</div>
					<!-- videos
					<div class="col-lg-4 col-lg-pull-5 col-xs-12 col-sm-12 upcoming-events">
						<strong class="h3">Mnistry Event Reports</strong>

                        <article class="post">
							<time datetime="2015-01-28" class="time"><a>28 <span>August</span></a>
							</time>
							<div class="text">
								<h3><a href="">Event CountUp to Second Healing Service</a></h3>
								<time datetime="2014-08-17"><span class="fa fa-clock-o"></span>August 2015</time>
								<address><span class="fa fa-map-marker"></span>Niaragua, Nicaragua</address>
							</div>
						</article>

                        <article class="post">
							<time datetime="2015-01-28" class="time"><a>28 <span>August</span></a>
							</time>
							<div class="text">
								<h3><a href="">CE Togo Teens' Outreach</a></h3>
								<time datetime="2014-08-17"><span class="fa fa-clock-o"></span>June 30th</time>
								<address><span class="fa fa-map-marker"></span>Niaragua, Nicaragua</address>
							</div>
						</article>

                        <article class="post">
							<time datetime="2015-01-28" class="time"><a>28 <span>August</span></a>
							</time>
							<div class="text">
								<h3><a href="">TCIF's 'Health for All' in Falomo Police Barracks</a></h3>
								<time datetime="2014-08-17"><span class="fa fa-clock-o"></span>21st Aug to 27th Aug</time>
								<address><span class="fa fa-map-marker"></span>Niaragua, Nicaragua</address>
							</div>
						</article>

                        <article class="post">
							<time datetime="2015-01-28" class="time"><a>28 <span>August</span></a>
							</time>
							<div class="text">
								<h3><a href="">ReachOut Togo Celebration Concert</a></h3>
								<time datetime="2014-08-17"><span class="fa fa-clock-o"></span>June 30th</time>
								<address><span class="fa fa-map-marker"></span>Niaragua, Nicaragua</address>
							</div>
						</article>

					</div>
					<!-- upcoming events
					<div class="col-lg-3 col-sm-6 col-xs-12 upcoming-events">
						<strong class="h3">Upcoming Ministry Events</strong>
						<article class="post">
							<time datetime="2015-01-28" class="time"><a>28 <span>August</span></a>
							</time>
							<div class="text">
								<h3>THE FIRST REACHOUT CAMPAIGN IN NICARAGUA</h3>
								<time datetime="2014-08-17"><span class="fa fa-clock-o"></span>22nd August to 30th August</time>
								<address><span class="fa fa-map-marker"></span>Niaragua, Nicaragua</address>
							</div>
						</article>
						<article class="post">
							<time datetime="2015-01-28" class="time"><a>28 <span>August</span></a>
							</time>
							<div class="text">
								<h3>The LoveWorld Festival Of Music & Arts</h3>
								<time datetime="2014-08-17"><span class="fa fa-clock-o"></span>25th August to 30th August</time>
								<address><span class="fa fa-map-marker"></span>Johannesburg, South Africa</address>
							</div>
						</article>
						<article class="post">
							<time datetime="2015-01-28" class="time"><a>28 <span>August</span></a>
							</time>
							<div class="text">
								<h3>THE Healing school Summer Session In Canada</h3>
								<time datetime="2014-08-17"><span class="fa fa-clock-o"></span>May 2015</time>
								<address><span class="fa fa-map-marker"></span>Ontario, Canada</address>
							</div>
						</article>
						<article class="post">
							<time datetime="2015-01-28" class="time"><a>28 <span>August</span></a>
							</time>
							<div class="text">
								<h3>The Mission Trip To Panama</h3>
								<time datetime="2014-08-17"><span class="fa fa-clock-o"></span>May 1st to 10th May</time>
								<address><span class="fa fa-map-marker"></span>Panama, Panama</address>
							</div>
						</article>
					</div>
				</div>
			</div>-->

		</main>
		<!-- footer -->
		<?php $this->load->view('layout/footer'); ?>
