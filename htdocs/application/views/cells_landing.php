		<?php $this->load->view('layout/header2'); ?>
		<!-- page info -->
		<section id="page-info" class="container-fluid">
			<div class="row">
				<div class="img-area">
					<div class="holder"><img data-velocity="-.5" src="<?=base_url();?>/asset/images/img50.jpg" width="1600" height="196" alt="Latest Blogs" />
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
						<div id="content">
							<div class="products">
								<?php foreach($cells as $c){ ?>
								<section class="col-xs-12 col-sm-6 col-md-3">
									<div class="row">
										<div class="product">
											<div class="img-area">
												<div class="holder">
													<img src="<?=base_url().$c['cell_logo'];?>" width="125" height="208" alt="product">
												</div>
											</div>
											<div class="textbox">
												<header class="head">
													<h3><a href="<?=base_url("cellsystem/cell_info/".urlencode($c['cell_name']));?>"><?=ucfirst($c['cell_name']);?></a></h3>
												</header>
												<div class="prices">
													<a href="#" style="color:gray !important; font-size:12px;"><span class="fa fa-users"></span> <?=$c['num_users'];?> member(s)</a>
												</div>
												<p><?=$c['cell_desc'];?></p>
	
											</div>
											<a href="<?=base_url("cellsystem/cell_info/".urlencode(urlencode($c['cell_name'])));?>" class="btn btn-primary">Join Now</a>
										</div>
									</div>
								</section>
								<?php } ?>
							</div>
							<!--
							<ul class="pagination">
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
					<div class="col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8">
						<?php $this->load->view("layout/sidebar"); ?>
					</div>
				</div>
			</div>
		</main>
		<!-- footer -->
		<?php $this->load->view('layout/footer'); ?>