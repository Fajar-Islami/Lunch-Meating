	<!-- Start Contact -->
	<!-- <div class="map-full"></div> -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.48788439736!2d106.68942919233251!3d-6.229728025464653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1588608298314!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7037770985257!2d106.8656840142723!3d-6.170404295532731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5043973ff63%3A0xc125c1242e567fd1!2sPoliteknik%20STMI%20Jakarta!5e0!3m2!1sid!2sid!4v1588608255753!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
	</div>
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2><?= $judul ?></h2>
						<p>Anda dapat mengirim masukan, kritik atau saran kepada kami secara langsung dengan mengisi data-data dibawah </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- <form id="contactForm"> -->
					<?= form_open('kontak/pesan', 'id="contactForm"'); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input value="<?= set_value('nama'); ?>" type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required data-error="Harap Masukan Nama">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<select class="custom-select d-block form-control" id="jenis_kel" name="jenis_kel" required data-error="Harap pilih jenis kelamin">
									<option disabled selected>Harap pilih jenis kelamin</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input value="<?= set_value('email'); ?>" type="email" class="form-control" id="email" name="email" placeholder="Masukan alamat Email yang aktif " required data-error="Harap Masukan Alamat Email yang Valid">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input value="<?= set_value('notelp'); ?>" type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukan Nomor Telepon yang aktif" onkeypress="return hanyaAngka(event)" required data-error="Harap Masukan Nomor Telepon">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input value="<?= set_value('alamat'); ?>" type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required data-error="Harap Masukan Alamat">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" id="pesan" name="pesan" placeholder="Masukan tanggapan, kritik atau saran Anda disini..." rows="4" data-error="Harap Masukan Tanggapan Anda" required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="submit-button text-center">
								<button class="btn btn-common" id="submit" type="submit">Kirim Masukan </button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact -->