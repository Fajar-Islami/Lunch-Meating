<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $stitle ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Form Tambah Meja
                            </h4>

                        </div>
                        <div class="col-auto">
                            <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-secondary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    Kembali
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open('mejakursi/tambahmejakursi'); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="id_waktu_meja">Waktu meja</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="id_waktu_meja" id="id_waktu_meja" class="custom-select">
                                    <option value="" selected disabled>Pilih Waktu Meja</option>
                                    <?php foreach ($tbl_waktu_meja as $wm) : ?>
                                        <option <?= set_select('id_waktu_meja', $wm['id_waktu']) ?> value="<?= $wm['id_waktu']; ?>"><?= $wm['waktu'] . " (" . date('H:i', $wm['jam_mulai'] - 25200) . " - " . date('H:i', $wm['jam_selesai'] - 25200) . ")"; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('waktumeja/tambahwaktumeja'); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <?= form_error('id_waktu_meja', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-3" for="meja_4">Jumlah Meja 4 Kursi</label>
                        <div class="col-md-9 mt-2">
                            <input value="<?= set_value('meja_4'); ?>" name="meja_4" id="meja_4" type="text" class="form-control" placeholder="Masukan Jumlah Meja 4 Kursi..." onkeypress="return hanyaAngka(event)">
                            <?= form_error('meja_4', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group ">
                        <label class="col-md-3 text-md-right mt-2" for="default_meja_4">Jumlah Default<br>Meja 4 Kursi<i class="fa fa-fw fa-question-circle col-md-1 " title="Jumlah meja ketika hari berubah"></i></label>
                        <!-- <label class="col-md-3 text-md-right mt-2 " for="default_meja_4">Jumlah Default<br>Meja 4 Kursi<span class="ket" data-ket="username must consist of 29 symbols.">?</span></label> -->

                        <div class="col-md-9 mt-3">
                            <input value="<?= set_value('default_meja4'); ?>" name="default_meja4" id="default_meja4" type="text" class="form-control" placeholder="Masukan Jumlah Meja 4 Kursi..." onkeypress="return hanyaAngka(event)">
                            <?= form_error('default_meja4', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="harga_meja_4">Harga Meja 4 Kursi</label>
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input value="<?= set_value('harga_meja_4'); ?>" name="harga_meja_4" id="harga_meja_4" type="text" class="form-control" placeholder="Masukan Harga Meja 4 Kursi..." onkeypress="return hanyaAngka(event)">
                            </div>
                            <?= form_error('harga_meja_4', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="meja_2">Jumlah Meja 2 Kursi</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('meja_2'); ?>" name="meja_2" id="meja_2" type="text" class="form-control" placeholder="Masukan Jumlah Meja 2 Kursi..." onkeypress="return hanyaAngka(event)">
                            <?= form_error('meja_2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group ">
                        <label class="col-md-3 text-md-right mt-2" for="default_meja_2">Jumlah Default<br>Meja 2 Kursi<i class="fa fa-fw fa-question-circle col-md-1 " title="Jumlah meja ketika hari berubah"></i></label>
                        <div class="col-md-9 pt-3">
                            <input value="<?= set_value('default_meja2'); ?>" name="default_meja2" id="default_meja2" type="text" class="form-control" placeholder="Masukan Jumlah Meja 2 Kursi..." onkeypress="return hanyaAngka(event)">
                            <?= form_error('default_meja2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="harga_meja_2">Harga Meja 2 Kursi</label>
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input value="<?= set_value('harga_meja_2'); ?>" name="harga_meja_2" id="harga_meja_2" type="text" class="form-control" placeholder="Masukan Harga Meja 2 Kursi..." onkeypress="return hanyaAngka(event)">
                            </div>
                            <?= form_error('harga_meja_2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</bu>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->