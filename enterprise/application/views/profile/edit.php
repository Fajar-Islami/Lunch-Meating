<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-icon="<?= $this->session->flashdata('icon'); ?>" data-title="<?= $this->session->flashdata('title'); ?>"></div>
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Form Edit Profil
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('profile') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    Profil
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('profile/edit'); ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="foto">Foto</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?= base_url() ?>assets/img/profile/<?= $admin['foto']; ?>" alt="<?= $admin['nama']; ?>" class="img-thumbnail rounded mb-2">
                                </div>
                                <div class="col-9">
                                    <input type="file" name="foto" id="foto">
                                    <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="username">Username</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                </div>
                                <input value="<?= $admin['username']; ?>" name="username" id="username" type="text" class="form-control" readonly>
                            </div>
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="nama">Nama</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                </div>
                                <input value="<?= set_value('nama', $admin['nama']); ?>" name="nama" id="nama" type="text" class="form-control" placeholder="Nama Anda...">
                            </div>
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="email">Email</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                                </div>
                                <input value="<?= $admin['email']; ?>" name="email" id="email" type="text" class="form-control">
                            </div>
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right mt-2" for="no_telp">Nomor Telepon</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-phone"></i></span>
                                </div>
                                <input value="<?= set_value('no_telp', $admin['nomor_telp']); ?>" name="no_telp" id="no_telp" type="text" class="form-control" placeholder="Nomor Telepon..." onkeypress="return hanyaAngka(event)">
                            </div>
                            <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
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