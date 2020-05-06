	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<img src="<?= base_url('assets/') ?>images/about-img.jpg" alt="" class="img-fluid" style="height: auto; width:auto">
				</div>
				<div class="col-lg-6 col-md-6 text-center">
					<div class="inner-column">
						<h1>Selamat Datang di <span>Lunch Meating Restaurant</span></h1>
						<h4>Little Story</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
						<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= base_url('reservasi') ?>">Reservasi</a>
					</div>
				</div>
				<div class="col-md-12">
					<div class="inner-pt">
						<p>Sed tincidunt, neque at egestas imperdiet, nulla sapien blandit nunc, sit amet pulvinar orci nibh ut massa. Proin nec lectus sed nunc placerat semper. Duis hendrerit elit nec sapien porttitor, ut pretium ipsum feugiat. Aenean volutpat porta nisi in gravida. Curabitur pulvinar ligula sed facilisis bibendum. Nullam vitae nulla elit. </p>
						<p>Integer purus velit, eleifend eu magna volutpat, porttitor blandit lectus. Aenean risus odio, efficitur quis erat eget, mattis tristique arcu. Fusce in ante enim. Integer consectetur elit nec laoreet rutrum. Mauris porta turpis nec tellus accumsan pellentesque. Morbi non quam tempus, convallis urna in, cursus mauris. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							<button data-filter=".minuman">minuman</button>
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