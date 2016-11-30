        <?php $this->load->view("layout/header2"); ?>
		<section id="page-info" class="container-fluid">
			<div class="row">
				<div class="img-area">
					<div class="holder"><img data-velocity="-.5" src="<?=base_url("asset");?>/images/img48.jpg" width="1600" height="196" alt="Latest Blogs" />
					</div>
				</div>
				<div class="textholder">
					<div class="container textblock">
						<div class="block">
							<!-- page title -->
							<div class="page-title">
								<div class="holder">
									<h1>Online Giving</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- main -->
		<main id="main" role="main" class="container-fluid" style="background-color:white !important;">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-9 col-md-push-3 col-sm-push-4">
						<div class="col-sm-8 col-xs-12">
								<h3>Please Fill In The Form</h3>
								<form role="form" class="form-widget">
									<div class="form-group">
										<div class="label-area">
											<span class="required">Required</span>
											<label for="name">Name</label>
										</div>
										<input type="text" class="form-control">
									</div>
                                    
                                    <div class="form-group">
										<div class="label-area">
											<span class="required">Required</span>
											<label for="surname">Surname</label>
										</div>
										<input type="text" class="form-control">
									</div>
                                    
                                    <div class="form-group">
										<div class="label-area">
											<span class="required">Required</span>
											<label for="email">Email</label>
										</div>
										<input type="text" class="form-control">
									</div>
                                    
                                    <div class="form-group">
										<div class="label-area">
											<span class="required">Required</span>
											<label for="number">Phone Number</label>
										</div>
										<input type="number" class="form-control" style="height:auto !important;">
									</div>
                                    
									<div class="form-group">
										<div class="label-area">
											<span class="required">Required</span>
											<label for="password">Password</label>
										</div>
										<input type="password" class="form-control">
									</div>
									
									<button type="submit" class="btn btn-primary">Enter</button>
								</form>
							</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 aside-holder">
						<aside id="aside">
							<div class="about-info">
								<h3>Partner With Us</h3>
								<div class="brand">
									<img src="<?=base_url("asset");?>/images/img40.jpg" width="268" height="113" alt="contact" class="img-responsive">
									</div>
								<p>Our network of partners consists of thousands of men and women who have become stakeholders in the vision and have joined forces with the man of God, Pastor Chris Oyakhilome, in taking God’s divine presence to nations across the globe.</p>

<p style="font-style:italic;">“How beautiful upon the mountains are the feet of him who brings good tidings, who publishes peace, who brings good tidings of good, who publishes salvation…”<br/> Isaiah 52:7 (Amplified Version).</p>

<p>As a partner, you are a herald of the glorious gospel - the good news of peace and salvation in Christ Jesus. You are the light of the world, bringing hope and announcing the grace and love of God to all men.</p>

God bless you!
							</div>
							
						</aside>
					</div>
				</div>
			</div>
		</main>
		<!-- footer -->
        <?php $this->load->view("layout/footer"); ?>