<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Form Ubah Password
                    </h4>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open('profile/ubahpassword'); ?>
                    <div class="form-group row">
                        <label for="pwlama" class="col-sm-2 col-form-label">Password lama</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwlama" name="pwlama" placeholder="Masukkan password Lama...">
                            <?= form_error('pwlama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="pwbaru1" class="col-sm-2 col-form-label">Password baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwbaru1" name="pwbaru1" placeholder="Masukkan password baru...">
                            <?= form_error('pwbaru1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pwbaru2" class="col-sm-2 col-form-label">Ulangi Password baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control mt-2" id="pwbaru2" name="pwbaru2" placeholder="Ulangi Password baru...">
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