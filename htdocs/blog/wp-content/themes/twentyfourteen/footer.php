				</div>
			</div>
		</main>
		<footer id="footer">
			<div class="container">
				<div class="row holder">
					<div class="col-lg-3 col-md-3">
							<div class="logo">
								<img src="/asset/images/logo2.png" alt="">
							</div>
						</div>
					<!-- footer navigation -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<h4>Quick Links</h4>
						<nav class="footer-nav">
							<ul>
								<li><a href="http://enterthehealingschool.org/" target="_blank">Healing school</a>
								</li>
								<li><a href="http://rhapsodyofrealities.org/index.php/en/" target="_blank">Rhapsody Of Realities</a>
								</li>
								<li><a href="http://christembassy-ism.org/new/" target="_blank">International School Of Ministry</a>
								</li>
								<li><a href="http://blwcampusministry.org/" target="_blank">BLW Campus Ministry</a>
								</li>
								<li><a href="http://www.theinnercitymission.org/v3/" target="_blank">Inner City Mission</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="clearfix hidden-lg"></div>
					<!-- social networks -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<h4>Follow us</h4>
						<ul class="social-networks">
							<!--<li><a href="#" target="_blank"><span class="fa fa-facebook"></span>Facebook</a>
							</li>
							<li><a href="#" target="_blank"><span class="fa fa-twitter"></span>Twitter</a>
							</li>-->
                            <li class="yookos_footer" target="_blank"><a href="#"><div class="yookos_text">Yookos</div></a>
							</li>
							</ul>
					</div>
					<!-- newsletter -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<h4>Weekly Newsletter</h4>
						<form id="subscribeForm" action="" class="newslatter">
							<p>Subscribe to Christ Embassy Online Church by Email</p>
							<div class="form-holder">
								<span><input type="submit"></span>
								<div class="text">
									<input type="email" name="subscriber_email" placeholder="Enter Email Address" class="form-control">
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
			<div class="infobar">
				<div class="container text-center has-feedback">
					<a href="#header" class="btn-top">btn-top</a>
					<p>&copy; Copyrights <?=date("Y");?> Christ Embassy Online church</p>
				</div>
			</div>
            
            <div class="modal fade" id="inquary-form" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h4>Write Us!</h4>
						</div>
						<div class="modal-body">

							<form action="/home/contactus" method="post">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" required>
								<label for="email">Email Address</label>
								<input type="email" name="email" id="email" class="form-control" required>
								<label for="tel">Phone Number</label>
								<input type="tel" name="tel" id="tel" class="form-control" required>
								<label for="message">Enter Your Message</label>
								<textarea name="message" id="message" cols="30" rows="10" class="form-control" required></textarea>
								<input type="submit" value="Submit" class="btn btn-primary">
							</form>
						</div>
					</div>
				</div>
			</div>
        </footer>
	</div>
	<script src="/asset/js/moment.min.js"></script>
	<script src="/asset/js/jquery.min.1.10.1.js"></script>
	<script src="/asset/js/bootstrap.min.js"></script>
	<script src="/asset/js/jquery.essentials.js"></script>
	<script src="/asset/js/jquery.mousewheel.js"></script>
	<script src="/asset/js/jquery.countdown.js"></script>
	<script src="/asset/js/jquery.owlcarousel.js"></script>
	<script src="/asset/js/jquery.salvottore.js"></script>
	<script src="/asset/js/jquery.scrolly.js"></script>
	<script src="/asset/js/jquery.fancybox.js"></script>
	<script src="/asset/js/jquery.fancybox-media.js"></script>
	<script src="/asset/js/jquery.jplayer.js"></script>
	<script src="/asset/js/jquery.ui.js"></script>
	<script src="/asset/js/jquery.main.js"></script>
	<script type="text/javascript">
	<?php
	$next = date("Y/m/d H:i", strtotime("next sunday 9:45 am"));
	if(date("D")=="Sun"&&(int)date("H")<14){
		$next = date("Y/m/d H:i", strtotime("today 9:45 am"));
	}
	?>
		$(document).ready(function() {
			$('#getting-started').countdown('<?=$next;?>', function(event) {
			var $this = $(this).html(event.strftime(''
				+ '<span>%d</span> Days, '
				+ '<span>%H</span> hrs, '
				+ '<span>%M</span> mins, '
				+ '<span>%S</span> sec '));
			});
			$('#subscribeForm').submit(function(e){
				
				$.post("/home/subscribe", $(this).serialize(), function(data){
					if(data=="success"){
						$('#subscribeForm').append("<div class=\"alert alert-success alert dismissable\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>Subscription successful!</div>");
					}else{
						$('#subscribeForm').append("<div class=\"alert alert-danger alert dismissable\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>" + data + "</div>");
					}
					
					$('#subscribeForm').trigger("reset");
				});
				return false;
			});
		});
	</script>
	</body>
</html>