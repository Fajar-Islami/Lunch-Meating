<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Reservasi
                    </h4>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100  nowrap" id="testabel">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th class=" text-center">ID Transaksi</th>
                            <th class=" text-center">Nama Pelanggan</th>
                            <th class=" text-center">Waktu Pemesanan</th>
                            <th class=" text-center">Jumlah Meja 2</th>
                            <th class=" text-center">Biaya Meja 2</th>
                            <th class=" text-center">Jumlah Meja 4</th>
                            <th class=" text-center">Biaya Meja 4</th>
                            <th class=" text-center">Total Biaya</th>
                            <th class=" text-center">Email</th>
                            <th class=" text-center">Nomor Telepon</th>
                            <th class=" text-center">Waktu Pesan</th>
                            <th class=" text-center">Alamat</th>
                            <th>ID Admin</th>
                            <th>Waktu Setuju</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($tbl_tr) :
                            foreach ($tbl_tr as $tr) :
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $tr['kode_transaksi']; ?></td>
                                    <td><?= $tr['nama_pelanggan']; ?></td>
                                    <td><?= $tr['waktu_reservasi']; ?></td>
                                    <!-- <td><?= $tr['waktu'] . " (" . date('H:i', $tr['jam_mulai'] - 25200) . " - " . date('H:i', $tr['jam_selesai'] - 25200) . ")"; ?></!-->
                                    <td><?= $tr['jumlah_meja2']; ?></td>
                                    <td>Rp. <?= number_format($tr['biaya_meja2'], 2, ",", "."); ?></td>
                                    <td><?= $tr['jumlah_meja4']; ?></td>
                                    <td>Rp. <?= number_format($tr['biaya_meja4'], 2, ",", "."); ?></td>
                                    <td>Rp. <?= number_format($tr['total_biaya'], 2, ",", "."); ?></td>
                                    <td><?= $tr['email']; ?></td>
                                    <td><?= $tr['no_telp']; ?></td>
                                    <td><?= date("d/m/Y H:i:s", strtotime($tr['tanggal_pesan'])) ?></td>
                                    <td><?= $tr['alamat']; ?></td>
                                    <td><?= $tr['setuju_id_admin']; ?></td>
                                    <td><?= date("d/m/Y H:i:s", strtotime($tr['waktu_setuju'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="20" class="text-center">
                                    Data Transaksi Kosong
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