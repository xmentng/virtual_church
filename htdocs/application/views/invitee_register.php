		<?php $this->load->view("layout/header2"); ?>
		<!-- page info -->
		<section id="page-info" class="container-fluid">
			<div class="row">
				<div class="img-area">
					<div class="holder"><img data-velocity="-.5" src="<?=base_url();?>asset/images/img48.jpg" width="1600" height="196" alt="Latest Blogs" />
					</div>
				</div>
				<div class="textholder">
					<div class="container textblock">
						<div class="block">
							<!-- page title -->
							<div class="page-title">
								<div class="holder">
									<h1>Register</h1>
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
							<div class="alert alert-info" role="alert">
                                Dear <?=$first_name." ".$last_name;?>!<br>Welcome to Christ Embassy Church Online<br>Kindly complete your profile to continue
                            </div>
							<form action="" method="post" enctype="multipart/form-data" role="form" class="form-widget">
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="email">Email</label>
									</div>
									<input type="email" name="email" id="email" class="form-control" value="<?=set_value("email", $email);?>">
									<?=form_error("email");?>
								</div>
								<!--<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="user_name">Username</label>
									</div>
									<input type="text" name="user_name" id="user_name" class="form-control" value="<?/*=set_value('user_name');*/?>">
									<?/*=form_error("user_name");*/?>
								</div>-->
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="password">Password</label>
									</div>
									<input type="password" name="password" id="password" class="form-control">
									<?=form_error("password");?>
								</div>
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="rpassword">Repeat Password</label>
									</div>
									<input type="password" name="rpassword" id="rpassword" class="form-control">
									<?=form_error("rpassword");?>
								</div>
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="first_name">First Name</label>
									</div>
									<input type="text" name="first_name" id="first_name" class="form-control" value="<?=set_value("first_name", $first_name);?>">
									<?=form_error("first_name");?>
								</div>
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="last_name">Last Name</label>
									</div>
									<input type="text" name="last_name" id="last_name" class="form-control" value="<?=set_value("last_name", $last_name);?>">
									<?=form_error("last_name");?>
								</div>
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="phone">Phone Number</label>
									</div>
									<input type="text" name="phone" id="phone" class="form-control" value="<?=set_value("phone", $phone);?>">
									<?=form_error("phone");?>
								</div>
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="country">Country</label>
									</div>
									<select name="country" id="country" class="form-control input-lg">
										<option value="">Select a country</option>
										<?php foreach(misc::$countries as $c) { ?>
											<option value="<?=$c;?>" <?=($c==$country)?set_select("country", $c, true):set_select("country", $c);?>><?=$c;?></option>
										<?php } ?>
									</select>
									<?=form_error("country");?>
								</div>
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="dob">Date Of Birth</label>
									</div>
									<input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" class="form-control" value="<?=set_value("dob");?>">
									<?=form_error("dob");?>
								</div>
								<div class="form-group">
									<div class="label-area">
										<span class="required">Required</span>
										<label for="profile_pic">Upload Profile Picture</label>
									</div>
									<input type="file" name="profile_pic" id="profile_pic" class="form-control">
									<?=form_error("profile_pic");?>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
							<p>Already have an account? <a href="<?php echo base_url("auth/login");echo (isset($from))?"?ref=".urlencode($from):"";?>">Log In</a></p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 aside-holder">
						<aside id="aside">
							<div class="about-info">
								<h3>About us</h3>
								<div class="brand">
									<img src="<?=base_url();?>asset/images/img-login_side.jpg" width="268" height="113" alt="contact" class="img-responsive">
									</div>
								<p>Welcome To Christ Embassy Online Church!</br>Become an eMember Today</p>
								<time class="time">Sunday 09:45AM to 01:30PM GMT+1</time>
							</div>
							
						</aside>
					</div>
				</div>
			</div>
		</main>
		<!-- footer -->
		<?php $this->load->view("layout/footer"); ?>
		<script src="<?=base_url();?>asset/js/bootstrap-datepicker.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$('#dob').datepicker({
				format: "dd/mm/yyyy",
			    autoclose: true
			});
		</script>