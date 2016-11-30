		<?php $this->load->view("layout/header2"); ?>
		<!-- page info -->
		<section id="page-info" class="container-fluid">
			<div class="row">
				<div class="img-area">
					<div class="holder"><img data-velocity="-.5" src="<?=base_url();?>asset/images/img47.jpg" width="1600" height="196" alt="Latest Blogs" />
					</div>
				</div>
				<div class="textholder">
					<div class="container textblock">
						<div class="block">
							<!-- page title -->
							<div class="page-title">
								<div class="holder">
									<h1>Login</h1>
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
							<h3>Login Now</h3>
							<form action="<?=base_url("auth/processlogindetails");?>" method="post" role="form" class="form-widget">
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="email">Email</label>
									</div>
									<input type="text" name="email" id="email" class="form-control">
								</div>
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="password">Password</label>
									</div>
									<input type="password" name="password" id="password" class="form-control">
								</div>
								<?php if(isset($from)): ?>
					            	<input type="hidden" name="_from" id="_from" value="<?php echo $from; ?>" />
					            <?php endif; ?>
								<button type="submit" class="btn btn-primary">Log In</button>
							</form>
							<p>Don't have an account yet? <a href="<?php echo base_url("auth/register");echo (isset($from))?"?ref=".urlencode($from):"";?>">Register Now</a></p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 aside-holder">
						<aside id="aside">
							<div class="about-info">
								<h3>Welcome</h3>
								<div class="brand">
									<img src="<?=base_url();?>asset/images/img-login_side.jpg" width="268" height="113" alt="contact" class="img-responsive">
									</div>
								<p>Welcome To Christ Embassy Church Online!</br>Become a Member Today</p>
								<time class="time">Sunday 09:45AM to 01:30PM GMT+1</time>
							</div>
							
						</aside>
					</div>
				</div>
			</div>
		</main>
		<!-- footer -->
		<?php $this->load->view("layout/footer"); ?>
