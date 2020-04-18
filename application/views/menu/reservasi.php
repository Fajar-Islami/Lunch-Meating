<!-- Start Reservation -->
<div class="reservation-box">
    <div class="container">
        <div class="row form-group">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2><?= $judul ?></h2>
                    <p>Ini adalah halaman reservasi restoran</p>
                    <?= date('d/m/Y H:i', $waktu = time() - ((time() % 86400) + 25200)) ?><br>
                    <?= $waktu = time() - ((time() % 86400) + 25200) ?>
                    <?= $z = (time() + 25200) % 86400 ?><br>
                    <?= $ket ?><br>
                    <h2 class="text-danger"><?= $mejaAda; ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="contact-block">
                    <?= form_open('reservasi/pesan', 'id="formReservasi"'); ?>
                    <div class="row">
                        <!-- Data Reservasi -->
                        <div class="col-md-6">
                            <h3 class="row form-group">Data Reservasi</h3>
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <select class="custom-select d-block form-control" name="id_waktu_meja" id="id_waktu_meja" required data-error="Harap pilih waktu reservasi" onchange="enable();total()">
                                        <option disabled selected>Pilih Waktu Reservasi</option>
                                        <?php foreach ($wmeja as $wm) : ?>
                                            <option <?= set_select('id_waktu_meja', $wm['id_waktu']) ?> value="<?= $wm['id_meja']; ?>"><?= $wm['waktu'] . " (" . date('H:i', $wm['jam_mulai'] - 25200) . " - " . date('H:i', $wm['jam_selesai'] - 25200) . ")"; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <!-- label -->
                            <!-- <label class="col-md-2 text-md-center mt-2" for="blank"></label>
                            <label class="col-md-4 text-md-center mt-3" for="jumlah">
                                <h4>Jumlah</h4>
                            </label>
                            <label class="col-md-5 text-md-center mt-3" for="harga">
                                <h4>Harga</h4>
                            </label> -->

                            <!-- Meja 2 kursi -->
                            <div class="row form-group mt-2">
                                <!-- label -->
                                <label class=" col-md-3 text-md-center mt-3" for="meja_2">
                                    <h4> Meja 2 Kursi</h4>
                                </label>
                                <!-- jumlah -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="custom-select d-block form-control " name="jumlah_meja" id="jumlah_meja" required data-error="Harap masukan jumlah meja" disabled>
                                            <option value=0>0</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- harga -->
                                <div class="col-md-7 ">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input value="<?= set_value('biaya_meja_2'); ?>" name="biaya_meja_2" id="biaya_meja_2" type="text" class="form-control" placeholder="0.00" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Meja 4 kursi -->
                            <div class="row form-group">
                                <!-- label -->
                                <label class="col-md-3 text-md-center mt-3" for="meja_2">
                                    <h4> Meja 4 Kursi</h4>
                                </label>
                                <!-- jumlah -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="custom-select d-block form-control " name="jumlah_meja_4" id="jumlah_meja_4" required data-error="Harap masukan jumlah meja" disabled>
                                            <option value=0>0</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- harga -->
                                <div class="col-md-7 ">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input value="<?= set_value('biaya_meja_4'); ?>" name="biaya_meja_4" id="biaya_meja_4" type="text" class="form-control" placeholder="0.00" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- total -->
                            <div class="row form-group">
                                <!-- label -->
                                <label class="col-md-5 text-md-right mt-3" for="meja_2">
                                    <h1>Total Bayar </h1>
                                </label>

                                <!-- harga -->
                                <div class="col-md-7 ">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input value="<?= set_value('total_biaya'); ?>" name="total_biaya" id="total_biaya" type="text" class="form-control" placeholder="0.00" readonly>
                                        <?= form_error('total_biaya', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Reservasi -->

                        <!-- Data diri -->
                        <div class="col-md-6">
                            <h3 class="row form-group">Data Diri Anda</h3>

                            <!-- nama -->
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <input value="<?= set_value('nama'); ?>" type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required data-error="Harap Masukan Nama">
                                    <div class="help-block with-errors"></div>
                                    <!-- <?= form_error('nama', '<small class="text-danger">', '</small>'); ?> -->
                                </div>
                            </div>

                            <!-- email -->
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <input value="<?= set_value('email'); ?>" type="email" class="form-control" id="email" name="email" placeholder="Masukan alamat Email yang aktif " required data-error="Harap Masukan Alamat Email yang Valid">
                                    <div class="help-block with-errors"></div>
                                    <!-- <label id="error_email" style="color: red;"></label> -->
                                </div>
                            </div>

                            <!-- nomor telepon -->
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <input value="<?= set_value('notelp'); ?>" type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukan Nomor Telepon yang aktif" onkeypress="return hanyaAngka(event)" required data-error="Harap Masukan No Telepon">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <!-- alamaat -->
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <input value="<?= set_value('alamat'); ?>" type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required data-error="Harap Masukan Alamat">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Data diri -->

                        <div class="col-md-12">
                            <div class="submit-button text-center">
                                <button class="btn btn-common reservasi" type="submit">Pesan Meja</button>
                                <div id="msgSubmit" class="h1 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Reservation -->