		<?php $this->load->view('layout/header2');?>
		<!-- page info -->
		<section id="page-info" class="container-fluid">
			<div class="row">
				<div class="img-area">
					<div class="holder"><img data-velocity="-.5" src="<?=base_url()."asset";?>/images/img14.jpg" width="1600" height="196" alt="freebies" />
					</div>
				</div>
				<div class="textholder">
					<div class="container textblock">
						<div class="block">
							<!-- page title -->
							<div class="page-title">
								<div class="holder">
									<h1>Freebies</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- main -->
		<main id="main" role="main" class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-9 col-md-push-3 col-sm-push-4">
						<div id="content">
							<div class="event-list">
								<div class="tab-constent">
									<div class="articles-area active fade in">
										<?php if(count($freebies)>0){foreach($freebies as $f){ ?>
										<article class="event">
											<div class="event-holder">
												<div class="event-info">
													<div class="event-info-holder">
														<a href="#" class="btn btn-info">Download Now</a>
													</div>
												</div>
												<div class="meta">
													<div class="thumbnail">
														<img src="<?=base_url($f['thumbnail_path']);?>" alt="You some point during your  design career." class="img-responsive" />
													</div>
												</div>
												<div class="textbox">
													<h2><?=$f['title']." (".$f['media_type'].")";?></h2>
													<p><?=$f['description'];?></p>
												</div>
											</div>
										</article>
										<?php }}else{ ?>
										<article class="event">
											<div class="event-holder">
												<h2>There are no freebies available at the moment</h2>
											</div>
										</article>
										<?php } ?>
									</div>
									
									
								</div>
								<!--<ul class="pagination">
									<li><a href="#">« First</a>
									</li>
									<li><a href="#">«</a>
									</li>
									<li><a href="#">1</a>
									</li>
									<li><a href="#">2</a>
									</li>
									<li class="active">3</li>
									<li><a href="#">...</a>
									</li>
									<li><a href="#">8</a>
									</li>
									<li><a href="#">9</a>
									</li>
									<li><a href="#">»</a>
									</li>
									<li><a href="#">Last »</a>
									</li>
								</ul>-->
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8">
						<?php $this->load->view("layout/sidebar"); ?>
					</div>
				</div>
			</div>
		</main>
		<!-- footer -->
		<?php $this->load->view('layout/footer'); ?>