<!-- Start Customer Reviews -->
<div class="customer-reviews-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>ULASAN PELANGGAN</h2>
					<p>Berikut ulasan para pelanggan yang diberikan dengan jujur dan tanpa paksaan setelah berkunjung ke <i>Lunch Meating Restaurant.</i></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 mr-auto ml-auto text-center">
				<div id="reviews" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner mt-4">
						<div class="carousel-item text-center active">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="<?= base_url('assets/') ?>images/profile-2.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Bill Gates</strong></h5>
							<h6 class="text-dark m-0">Karyawan Swasta</h6>
							<p class="m-0 pt-3">Sudah berkali-kali saya mengunjungi restoran ini. Cita rasa yang khas dan tidak pernah berubah menjadikan restoran ini sebagai salah satu restoran favorit saya dan keluarga.</p>
						</div>
						<div class="carousel-item text-center">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="<?= base_url('assets/') ?>images/profile-4.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Nicholas Saputra</strong></h5>
							<h6 class="text-dark m-0">Aktor</h6>
							<p class="m-0 pt-3">Jenis makanan yang dijual di restoran ini memang sudah dijual di banyak restoran lain, namun memiliki rahasia kenikmatan tersendiri yang tidak terkalahkan. Tidak heran kalau selalu ramai pengunjung.</p>
						</div>
						<div class="carousel-item text-center">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="<?= base_url('assets/') ?>images/profile-5.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Adam Levine</strong></h5>
							<h6 class="text-dark m-0">Atlet Bulutangkis</h6>
							<p class="m-0 pt-3">Aroma makanan yang sudah tercium dari jarak yang masih jauh dengan restoran membuat saya dan keluarga penasaran apakah rasanya setara dengan aromanya. Setelah mencicipi, saya tidak menyesal telah mampir.</p>
						</div>
						<div class="carousel-item text-center">
							<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="<?= base_url('assets/') ?>images/profile-6.jpg" alt="">
							</div>
							<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Raline Shah</strong></h5>
							<h6 class="text-dark m-0">Penulis</h6>
							<p class="m-0 pt-3">Pelayanan yang saya dapat di sini sangat baik. Dari segi tampilan makanannya memang <i>eye catching</i> dan banyak inovasi, sudah pasti soal rasa tidak perlu diragukan. Saya akan merekomendasikan restoran ini kepada teman-teman saya.</p>
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
			<div class="col-md-3">
				<i class="fa fa-volume-control-phone"></i>
				<div class="overflow-hidden">
					<h4>Nomor Telepon</h4>
					<p class="lead">
						(021) 888-28-71
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<i class="fa fa-envelope"></i>
				<div class="overflow-hidden">
					<h4>Email</h4>
					<p class="lead">
						info@lunchmeating.com
					</p>
				</div>
			</div>
			<div class="col-md-5">
				<i class="fa fa-map-marker"></i>
				<div class="overflow-hidden">
					<h4>Lokasi</h4>
					<p class="lead">
						Jl. Letjend Suprapto, Cempaka Putih.
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
			<div class="col-lg-3 col-md-6" style="text-align: justify;">
				<h3>Tentang Kami</h3>
				<p><i>Lunch Meating Restaurant</i> merupakan sebuah restoran yang menyediakan olahan daging panggang dengan teknik panggang yang benar sehingga menghasilkan daging yang lunak sempurna. Kami mengutamakan kualitas daging segar karena sangat berpengaruh terhadap rasa yang akan membuat pelanggan ketagihan sejak pertama mencicipi. </p>
			</div>
			<div class="col-lg-3 col-md-6" style="text-align: justify;">
				<h3>Jadwal Buka</h3>
				<p><span class="text-color">Setiap hari pada waktu sebagai berikut:</span></p>
				<?php
				if ($wmeja) :
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
				<?php else : ?>
					<table border="1">
						<tr width="300">
							<!-- <td colspan="12" class="text-center"> -->
							<p style="text-align: center;"><span class="text-color">Tidak ada jadwal untuk saat ini</span></p>
							<!-- </td> -->
						</tr>
					</table>
				<?php endif; ?>
				<!-- <p><span class="text-color">Monday: </span>Closed</p>
				<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
				<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
				<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p> -->
			</div>
			<div class="col-lg-3 col-md-6" style="text-align: justify;">
				<h3>Informasi Kontak</h3>
				<p>Jl. Letjend Suprapto No.26, RT.10/RW.5, Cempaka Putih Timur, Kec. Cempaka Putih, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta. 10510.</p>
				<p><a href="#">(021) 888-28-71</a></p>
				<p><a href="#"> info@lunchmeating.com</a></p>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3>Subscribe</h3>
				<div class="subscribe_form">
					<!-- <form class="subscribe_form"> -->
					<?= form_open('', 'id="subsEmail"'); ?>
					<input id="subsE" name="subsE" class="form_input" placeholder="emailanda@gmail.com" type="email" onkeyup="email()">

					<button type="submit" class="submit" id="submit">SUBSCRIBE</button>
					<div class="clearfix"></div>
					<?= form_close(); ?>
					<!-- </form> -->
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
					<p class="company-name">All Rights Reserved. &copy; <?= date('Y'); ?> <a href="#">Lunch Meating Restaurant</a> <a href="https://github.com/Fajar-Islami/Lunch-Meating"><i class="fa fa-github"></i></a> </p>
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
<script src="<?= base_url('assets/') ?>js/buat-sendiri.js"></script>
<script src="<?= base_url('assets/') ?>js/custom.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/sweetalert/js/sweetalert2.all.min.js"></script>
<script>
	var base_url = "<?php echo base_url(); ?>";
</script>

</body>

</html>