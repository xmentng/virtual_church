        <?php $this->load->view('layout/header2'); ?>
		<!-- page info -->
		<section id="page-info" class="container-fluid">
			<div class="row">
				<div class="img-area">
					<div class="holder"><img data-velocity="-.5" src="<?=base_url();?>asset/images/img42.jpg" width="1600" height="196" alt="Group System" />
					</div>
				</div>
				<div class="textholder">
					<div class="container textblock">
						<div class="block">
							<!-- page title -->
							<div class="page-title">
								<div class="holder">
									<h1>Groups</h1>
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
										<article class="event">
											<div class="event-holder">
												
												<p>
													<h2>Welcome To The Group System!</h2></p>
													<p>The group system of Christ Embassy is an avenue for soul winning and soul development. The groups within the church are designed to encourage fellowship amongst members of the church, which is necessary for the nurturing of your faith.</p>
                                                    
<p>We’re committed to helping you manifest your rights in Christ, giving you an edge over all of life’s challenges. Through the group system, you’ll discover a great family in the house of God. And it’ll also afford you the privilege to access a wealth of resource-materials that’ll richly enhance your daily walk of faith.</p>
											</div>
                                            
                                           <div class="button">
								<a href="<?=base_url("cellsystem/groups");?>" class="btn btn-primary">Check Out Our Groups Directory</a>
							</div>
                                            
										</article>
										
									</div>
									
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8">
                        <?php $this->load->view('layout/sidebar'); ?>
					</div>
				</div>
			</div>
		</main>
		<!-- footer -->
        <?php $this->load->view('layout/footer'); ?>
