		<?php $this->load->view('layout/header2');?>
		<!-- page info -->
		<section id="page-info" class="container-fluid">
			<div class="row">
				<div class="img-area">
					<div class="holder"><img data-velocity="-.5" src="<?=base_url()."asset";?>/images/img45.jpg" width="1600" height="196" alt="Prayer Wall" />
					</div>
				</div>
				<div class="textholder">
					<div class="container textblock">
						<div class="block">
							<!-- page title -->
							<div class="page-title">
								<div class="holder">
									<h1>Prayer Wall</h1>
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
							<div class="img-area">
								<img src="<?=base_url()."asset";?>/images/img46.jpg" width="838" height="381" class="img-responsive" alt="prayer wall" />
								<p>&nbsp;</p>
							</div>
							<?php foreach($prayers as $p){ ?>
							<article class="prayer-wall big">
								<div class="post-data">
									<header class="head">
										<time class="date" datetime="<?=date("Y-m-d", $p['timeposted']);?>"><span class="fa fa-calendar-o"></span><?=date("F d, Y", $p['timeposted']);?></time>
										<!--
										<div class="share-holder">
											<a href="#" class="btn-share"><span class="fa fa-share-alt"></span></a>
											<div class="social-area">
												<ul class="social">
													<li><a href="#"><span class="fa fa-facebook"></span></a>
													</li>
													<li><a href="#"><span class="fa fa-twitter"></span></a>
													</li>
													<li><a href="#"><span class="fa fa-youtube"></span></a>
													</li>
												</ul>
											</div>
										</div>-->
										
										<h2><a href=""><?=$p['title'];?></a></h2>
									</header>
									<p><?=$p['message'];?></p>
									<div class="prayer-footer">
										<div class="author-info">
											<a href="#" class="author">- <?=$p['name'];?></a>
											<span><?=$p['location'];?></span>
										</div>
										<div class="prayer-btns">
											<?php if(isset($p['iprayed'])){ ?>
											<form class="iPrayedForm" action="<?=base_url("home/iprayed");?>" method="post">
												<input type="hidden" name="action" value="not_prayed" />
												<input type="hidden" name="prayer_id" value="<?=$p['id'];?>" />
												<button type="submit" class="btn btn-area">NOT PRAYED</button>
											</form>
											<?php }else{ ?>
											<form class="iPrayedForm" action="<?=base_url("home/iprayed");?>" method="post">
												<input type="hidden" name="action" value="prayed" />
												<input type="hidden" name="prayer_id" value="<?=$p['id'];?>" />
												<button type="submit" class="btn btn-primary">I PRAYED</button>
											</form>	
											<?php } ?>
											<span class="prayer-count">
												<i class="fa fa-heart<?=(!isset($p['iprayed']))?"-o":"";?>"></i> <?=($p['count']==1)?$p['count']."</a> person":$p['count']."</a> people";?> prayed for this
											</span>
										</div>
									</div>
								</div>
							</article>
							<?php } ?>
							
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
							
							<section class="comment-form">
								<h3>Submit Your Prayer Request</h3>
								<form action="" method="post">
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<?php if($this->session->userdata('user_name')){ ?>
										<div class="area">
											<span class="label"><label for="c-name">Name</label></span>
											<input type="text" name="name" id="c-name" value="<?=$this->session->userdata('first_name')." ".$this->session->userdata('last_name');?>" class="form-control" required>
										</div>
										<div class="area">
											<span class="label"><label for="c-city">Location</label></span>
											<input type="text" name="city" id="c-city" value="<?=$this->session->userdata('country');?>" class="form-control" required>
										</div>
										<input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id');?>" id="user_id"/>
										<?php }else{ ?>
										<div class="area">
											<span class="label"><label for="c-name">Name</label></span>
											<input type="text" name="name" id="c-name" class="form-control" required>
										</div>
										<div class="area">
											<span class="label"><label for="c-city">Location</label></span>
											<input type="text" name="city" id="c-city" class="form-control" required>
										</div>
										<?php } ?>
										<div class="area">
											<span class="label"><label for="c-title">Prayer Request Title</label></span>
											<input type="text" name="title" id="c-title" class="form-control" required>
										</div>
									</div>
									<div class="col-xs-12 col-md-6">
										<div class="area">
											<span class="label">
												<label for="c-message">Prayer Request</label>
											</span>
											<textarea name="message" class="form-control" id="c-message" required></textarea>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">
									Submit Prayer Request
								</button>
								</form>
							</section>
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
	<script>
		$('.iPrayedForm').submit(function(e){
			e.preventDefault();
			var formData = $(this).serialize();
			//var actn = $(this).serializeArray()[0].value;
			//alert(actn);
			$.post("<?=base_url();?>home/ajax_iprayed", formData, function(data){
				//alert(data);
				if(data=="success"){
					window.location.reload();
				}
			});
			return false;
		});
	</script>