		<?php $this->load->view("layout/header2"); ?>
		<!-- page info -->
		<section id="page-info" class="container-fluid">
			<div class="row">
				<div class="img-area">
					<div class="holder"><img data-velocity="-.5" src="<?=base_url()."/asset";?>/images/img49.jpg" width="1600" height="196" alt="Latest Blogs" />
					</div>
				</div>
				<div class="textholder">
					<div class="container textblock">
						<div class="block">
							<div class="page-title">
								<div class="holder">
									<h1>Service Highlights</h1>
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
					<div class="col-xs-12 col-sm-8 col-sm-push-4 col-md-9 col-md-push-3 ">
							
						<div id="content">
							
							<div id="timeline" data-columns class="gallery">
								<?php $i=0; foreach($videos as $v){ ?>
								<div class="item">
									<div class="img-area">
										<img src="<?=base_url().$v['video_thumbnail_url'];?>" alt="" class="img-responsive">
										<div class="hover-block">
											<ul class="bar">
												<li>
													<a href=""><!--<span class="fa fa-heart-o"></span>--></a>
												</li>
												<li>
													<a href="#videoPopup<?=$i;?>" class="fancybox"><span class="fa fa-video-camera"></span></a>
													<div id="videoPopup<?=$i;?>" class="fancyPopup videoPopup">
														<h3><?=$v['video_title'];?></h3>
														<video width="640" height="360" src="<?=$v['video_url'];?>" id="player1" controls autoplay preload="none" poster="<?=base_url().$v['video_thumbnail_url'];?>"></video>
													</div>
												</li>
												<li>
													<a href=""><!--<span class="fa fa-share-alt"></span>--></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<?php $i++; } ?>
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
		<?php $this->load->view("layout/footer"); ?>
