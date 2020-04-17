<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Form Tambah Waktu
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
                    <?= form_open('waktumeja/tambahwaktumeja'); ?>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="jam_mulai">Jam Mulai</label>
                        <div class="col-md-4">
                            <input value="<?= set_value('jam_mulai'); ?>" id="jam_mulai" name="jam_mulai" class="form-control jammulai" readonly />
                            <?= form_error('jam_mulai', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="jam_selesai">Jam Selesai</label>
                        <div class="col-md-4">
                            <input value="<?= set_value('jam_selesai'); ?>" id="jam_selesai" name="jam_selesai" class="form-control jamselesai" readonly />
                            <?= form_error('jam_selesai', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="meja_2">Kode Waktu</label>
                        <div class="col-md-4">
                            <input value="<?= set_value('kode_waktu') ?>" name="kode_waktu" id="kode_waktu" type="text" class="form-control" placeholder="Masukan kode kode waktu">
                            <?= form_error('kode_waktu', '<small class="text-danger">', '</small>'); ?>
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