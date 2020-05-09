<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card p-2 shadow-sm border-bottom-primary">
        <div class="card-header bg-white">
            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                <?= $admin['nama']; ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-auto col-md-2 mb-4 mb-md-0">
                    <img src="<?= base_url() ?>assets/img/profile/<?= $admin['foto']; ?>" alt="Foto Profil" class="img-thumbnail rounded mb-2">
                    <a href="<?= base_url('profile/edit'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-fw fa-edit"></i> Edit Profil</a>
                    <a href="<?= base_url('profile/ubahpassword'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-fw fa-lock"></i> Ubah Kata Sandi</a>
                </div>
                <div class="col-md-10">
                    <table class="table">
                        <tr>
                            <th width="200">Username</th>
                            <th width="1">:</th>
                            <td><?= $admin['username']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td><?= $admin['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <th>:</th>
                            <td><?= $admin['nomor_telp']; ?></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <th>:</th>
                            <td class="text-capitalize"><?= $admin['role']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->