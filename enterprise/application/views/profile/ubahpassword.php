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
                                Form Ubah Kata Sandi
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
                    <?= form_open('profile/ubahpassword'); ?>
                    <div class="form-group row">
                        <label for="pwlama" class="col-sm-2 col-form-label">Kata Sandi lama</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwlama" name="pwlama" placeholder="Masukkan kata sandi Lama..." autocomplete="off">
                            <?= form_error('pwlama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="pwbaru1" class="col-sm-2 col-form-label">Kata Sandi baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwbaru1" name="pwbaru1" placeholder="Masukkan kata sandi baru..." autocomplete="off">
                            <?= form_error('pwbaru1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pwbaru2" class="col-sm-2 col-form-label">Ulangi Kata Sandi baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control mt-2" id="pwbaru2" name="pwbaru2" placeholder="Ulangi Kata Sandi baru..." autocomplete="off">
                            <?= form_error('pwbaru2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
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