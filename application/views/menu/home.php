	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-center">
				<img src="<?= base_url('assets/') ?>images/header1.jfif" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Selamat Datang di<br> <i>LUNCH MEATING RESTAURANT</i> </strong></h1>
							<p class="m-b-40"><strong><br>Daging sehat, aroma nikmat, dan rasa yang tepat untuk menemani Anda rehat.</strong></p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= base_url('reservasi') ?>">Reservasi</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="<?= base_url('assets/') ?>images/header2.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Selamat Datang di<br> <i>LUNCH MEATING RESTAURANT</i></strong></h1>
							<p class="m-b-40"><strong><br>Daging sehat, aroma nikmat, dan rasa yang tepat untuk menemani Anda rehat.</strong></p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= base_url('reservasi') ?>">Reservasi</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="<?= base_url('assets/') ?>images/header3.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Selamat Datang di<br> <i>LUNCH MEATING RESTAURANT</i></strong></h1>
							<p class="m-b-40"><strong><br>Daging sehat, aroma nikmat, dan rasa yang tepat untuk menemani Anda rehat.</strong></p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= base_url('reservasi') ?>">Reservasi</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->

	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="<?= base_url('assets/') ?>images/about-img.jpg" alt="" class="img-fluid" style="height: auto; width:auto">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Selamat Datang di<br> <span><i>LUNCH MEATING RESTAURANT</i></span></h1><br>
						<h2><strong>Sejarah</strong></h2>
						<div style="text-align: justify;">
							<p><i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lunch Meating Restaurant</i> merupakan ide tiga anak muda yang memiliki <i>passion</i> dibidang memasak. Restoran ini didirikan pada 4 Februari 2001 dengan lokasi cabang pertamanya di Cempaka Putih, Jakarta Pusat. Restoran yang berorientasi pada daging sapi ini sangat memperhatikan kualitas daging dan bahan makanan yang diperlukan untuk menunjang cita rasa dan aroma, serta untuk menarik hati para penggemar daging sapi.</p>
						</div>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= base_url('reservasi') ?>">Reservasi</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-left">
					<p class="lead">
						" Memasak sekaligus merupakan salah satu seni yang paling sederhana dan paling memuaskan, namun untuk memasak dengan baik, seseorang harus mencintai dan menghargai makanan. "
					</p>
					<span class="lead">Craig Claiborne</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>MENU</h2>
						<p>Cita rasa yang dapat membuat suasana hati Anda senang sepanjang hari.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">Semua Menu</button>
							<button data-filter=".minuman">Minuman</button>
							<button data-filter=".sarapan">Sarapan</button>
							<button data-filter=".makan_siang">Makan Siang</button>
							<button data-filter=".makan_malam">Makan Malam</button>
						</div>
					</div>
				</div>
			</div>



			<div class="row special-list">
				<?php
				foreach ($minuman as $m) : ?>
					<div class="col-lg-4 col-md-6 special-grid minuman">
						<div class="gallery-single fix">
							<img src="<?= base_url('assets/') . $m['foto']; ?>" class="img-fluid" alt="Image">
							<div class="why-text">
								<h4><?= $m['nama']; ?></h4>
								<p><?= $m['keterangan']; ?></p>
								<h5>Rp. <?= number_format($m['harga'], 2, ",", "."); ?></h5>
							</div>
						</div>
					</div>
				<?php endforeach; ?>


				<?php
				foreach ($sarapan as $srp) : ?>
					<div class="col-lg-4 col-md-6 special-grid sarapan">
						<div class="gallery-single fix">
							<img src="<?= base_url('assets/') . $srp['foto']; ?>" class="img-fluid" alt="Image">
							<div class="why-text">
								<h4><?= $srp['nama']; ?></h4>
								<p><?= $srp['keterangan']; ?></p>
								<h5>Rp. <?= number_format($srp['harga'], 2, ",", "."); ?></h5>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

				<?php
				foreach ($makan_siang as $siang) : ?>
					<div class="col-lg-4 col-md-6 special-grid makan_siang">
						<div class="gallery-single fix">
							<img src="<?= base_url('assets/') . $siang['foto']; ?>" class="img-fluid" alt="Image">
							<div class="why-text">
								<h4><?= $siang['nama']; ?></h4>
								<p><?= $siang['keterangan']; ?></p>
								<h5>Rp. <?= number_format($siang['harga'], 2, ",", "."); ?></h5>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

				<?php
				foreach ($makan_malam as $malam) : ?>
					<div class="col-lg-4 col-md-6 special-grid makan_malam">
						<div class="gallery-single fix">
							<img src="<?= base_url('assets/') . $malam['foto']; ?>" class="img-fluid" alt="Image">
							<div class="why-text">
								<h4><?= $malam['nama']; ?></h4>
								<p><?= $malam['keterangan']; ?></p>
								<h5>Rp. <?= number_format($malam['harga'], 2, ",", "."); ?></h5>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- End Menu -->

	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>GALERI</h2>
						<p>Makanan dan minuman disajikan oleh koki-koki profesional kami.</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<?php
					foreach ($galeri as $glr) : ?>
						<div class="col-sm-12 col-md-4 col-lg-4">
							<a class="lightbox" href="<?= base_url('assets/') . $glr['foto']; ?>">
								<img class="img-fluid" src="<?= base_url('assets/') . $glr['foto']; ?>" alt="Gallery Images">
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->