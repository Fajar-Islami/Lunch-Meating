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
                        Data Meja
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('mejakursi/tambahmejakursi') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Meja
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100 nowrap" id="testabel">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Kode Waktu Meja</th>
                            <th>Waktu Meja</th>
                            <th>Jumlah Meja 4</th>
                            <th>Jumlah Default Meja 4</th>
                            <th>Harga Meja 4</th>
                            <th>Jumlah Meja 2</th>
                            <th>Jumlah Default Meja 2</th>
                            <th>Harga Meja 2</th>
                            <th>ID Admin</th>
                            <th class=" text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($meja) :
                            foreach ($meja as $m) :
                        ?>
                                <td><?= $no++; ?></td>
                                <td><?= $m['kode_waktu']; ?></td>
                                <td><?= $m['waktu'] . " (" . date('H:i', $m['jam_mulai'] - 25200) . " - " . date('H:i', $m['jam_selesai'] - 25200) . ")"; ?></td>
                                <td><?= $m['meja_4']; ?></td>
                                <td><?= $m['default_meja4']; ?></td>
                                <td>Rp. <?= number_format($m['harga_meja_2'], 2, ",", "."); ?></td>
                                <td><?= $m['meja_2']; ?></td>
                                <td><?= $m['default_meja2']; ?></td>
                                <td>Rp. <?= number_format($m['harga_meja_2'], 2, ",", "."); ?></td>
                                <td><?= $m['meja_id_admin']; ?></td>
                                <td class=" text-center">
                                    <a href="<?= base_url('mejakursi/editmejakursi/') . $m['id_meja'] ?>" class="btn btn-warning btn-circle btn-sm" title="Edit data"><i class="fa fa-edit"></i></a>

                                    <a onclick="hapusdata('<?= base_url('mejakursi/hapusmejakursi/' .  $m['id_meja']) ?>')" id="hapus" href="<?= base_url('mejakursi/hapusmejakursi/' .  $m['id_meja']) ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus data" data-toggle="modal" data-target="#hapusModal" data-id="<?= $m['id_meja']; ?>" data-waktu="<?= $m['waktu'] . " (" . date('H:i', $m['jam_mulai'] - 25200) . " - " . date('H:i', $m['jam_selesai'] - 25200) . ")"; ?>"><i class="fa fa-fw fa-trash"></i></a>

                                </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="12" class="text-center">
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