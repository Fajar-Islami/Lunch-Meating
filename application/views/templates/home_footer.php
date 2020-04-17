<!-- Start Customer Reviews -->
<div class="customer-reviews-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Customer Reviews</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 mr-auto ml-auto text-center">
				<div id="reviews" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner mt-4">
						<div class="carousel-item text-center active">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="<?= base_url('assets/') ?>images/profile-1.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
							<h6 class="text-dark m-0">Web Developer</h6>
							<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
						</div>
						<div class="carousel-item text-center">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="<?= base_url('assets/') ?>images/profile-3.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
							<h6 class="text-dark m-0">Web Designer</h6>
							<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
						</div>
						<div class="carousel-item text-center">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="<?= base_url('assets/') ?>images/profile-7.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
							<h6 class="text-dark m-0">Seo Analyst</h6>
							<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
						</div>
					</div>
					<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Customer Reviews -->
<!-- Start Contact info -->
<div class="contact-imfo-box">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<i class="fa fa-volume-control-phone"></i>
				<div class="overflow-hidden">
					<h4>Nomor Telepon</h4>
					<p class="lead">
						+01 123-456-7890
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<i class="fa fa-envelope"></i>
				<div class="overflow-hidden">
					<h4>Email</h4>
					<p class="lead">
						emailKITA@gmail.com
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<i class="fa fa-map-marker"></i>
				<div class="overflow-hidden">
					<h4>Lokasi</h4>
					<p class="lead">
						Jalan Sukarno Hatta
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Contact info -->

<!-- Start Footer -->
<footer class="footer-area bg-f">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<h3>About Us</h3>
				<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui, at ornare turpis ultrices sit amet. Nulla cursus lorem ut nisi porta, ac eleifend arcu ultrices.</p>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3>Waktu Buka</h3>
				<p><span class="text-color">Setiap hari pada waktu berikut :</span></p>
				<?php
				foreach ($wmeja as $wm) : ?>
					<table border="0">
						<col width="100">
						<col width="200">
						<tr>
							<td>
								<p><span class="text-color"><?= $wm['waktu'] ?></span></p>
							</td>

							<td>
								<p><span class="text-color"><?= date('H:i', $wm['jam_mulai'] - 25200) . " - " . date('H:i', $wm['jam_selesai'] - 25200) ?></span></p>
							</td>
						</tr>
					</table>
				<?php endforeach; ?>
				<!-- <p><span class="text-color">Monday: </span>Closed</p>
				<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
				<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
				<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p> -->
			</div>
			<div class="col-lg-3 col-md-6">
				<h3>Contact information</h3>
				<p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
				<p class="lead"><a href="#">+01 2000 800 9999</a></p>
				<p><a href="#"> info@admin.com</a></p>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3>Subscribe</h3>
				<div class="subscribe_form">
					<form class="subscribe_form">
						<input name="EMAIL" id="subs-email" class="form_input" placeholder="Masukan email kamu ..." type="email">
						<button type="submit" class="submit">SUBSCRIBE</button>
						<div class="clearfix"></div>
					</form>
				</div>
				<ul class="list-inline f-social">
					<li class="list-inline-item"><a href="https://facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="https://linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="https://google.com/"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="https://instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="company-name">All Rights Reserved. &copy; <?= date('Y'); ?> <a href="#">Lunch Meating Restaurant</a> </p>
					<!-- Design By :
						<a href="https://html.design/">html design</a></p> -->
				</div>
			</div>
		</div>
	</div>

</footer>
<!-- End Footer -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="<?= base_url('assets/') ?>js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery-3.3.1.js"></script>
<script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="<?= base_url('assets/') ?>js/jquery.superslides.min.js"></script>
<script src="<?= base_url('assets/') ?>js/images-loded.min.js"></script>
<script src="<?= base_url('assets/') ?>js/isotope.min.js"></script>
<script src="<?= base_url('assets/') ?>js/baguetteBox.min.js"></script>
<script src="<?= base_url('assets/') ?>js/form-validator.min.js"></script>
<script src="<?= base_url('assets/') ?>js/contact-form-script.js"></script>
<script src="<?= base_url('assets/') ?>js/custom.js"></script>
<script src="<?= base_url('assets/') ?>js/buat-sendiri.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/sweetalert/js/sweetalert2.all.min.js"></script>
<script>
	var base_url = "<?php echo base_url(); ?>";
</script>

</body>

</html>