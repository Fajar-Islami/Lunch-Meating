<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- <?= $this->session->flashdata('message'); ?> -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-icon="<?= $this->session->flashdata('icon'); ?>" data-title="<?= $this->session->flashdata('title'); ?>" data-footer="<?= $this->session->flashdata('footer'); ?>"></div>
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Waktu Meja
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('waktumeja/tambahwaktumeja') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Waktu Meja
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100 dt-responsive nowrap" id="testabel">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Waktu Meja</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Kode Waktu</th>
                            <th>ID Admin</th>
                            <th class=" text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($twaktu_meja) :
                            foreach ($twaktu_meja as $twm) :
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>

                                    <td><?= $twm['waktu']; ?></td>
                                    <td><?= date('H:i:s', $twm['jam_mulai'] - 25200); ?></td>
                                    <td><?= date('H:i:s', $twm['jam_selesai'] - 25200); ?></td>
                                    <td><?= $twm['kode_waktu']; ?></td>
                                    <td><?= $twm['waktu_id_admin']; ?></td>
                                    <td class=" text-center">
                                        <a href="<?= base_url('waktumeja/editwaktumeja/') . $twm['id_waktu'] ?>" class="btn btn-warning btn-circle btn-sm" title="Edit data"><i class="fa fa-edit"></i></a>

                                        <a onclick="hapusdata('<?= base_url('waktumeja/hapuswaktumeja/' .  $twm['id_waktu']) ?>')" id="hapus" href="<?= base_url('waktumeja/hapuswaktumeja/' .  $twm['id_waktu']) ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus data" data-toggle="modal" data-target="#hapusModal" data-id="<?= $twm['id_waktu']; ?>" data-waktu="<?= $twm['waktu'] . " (" . date('H:i', $twm['jam_mulai'] - 25200) . " - " . date('H:i', $twm['jam_selesai'] - 25200) . ")"; ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->