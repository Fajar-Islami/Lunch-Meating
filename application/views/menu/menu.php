	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>MENU KAMI</h2>
						<p>Cita rasa yang akan selalu dirindukan.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">SEMUA MENU</button>
							<button data-filter=".minuman">MINUMAN</button>
							<button data-filter=".sarapan">SARAPAN</button>
							<button data-filter=".makan_siang">MAKAN SIANG</button>
							<button data-filter=".makan_malam">MAKAN MALAM</button>
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

	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-9 ml-auto mr-auto text-left">
					<p class="lead ">
						" Memasak membutuhkan dugaan dan improvisasi yang meyakinkan — eksperimen dan substitusi, menghadapi kegagalan dan ketidakpastian secara kreatif. "
					</p>
					<span class="lead">Paul Theroux</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->