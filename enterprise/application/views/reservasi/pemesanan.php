<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- <?= $this->session->flashdata('message'); ?> -->
    <div class="card shadow-sm mb-4 border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Pemesanan Reservasi
                    </h4>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100  nowrap" id="testabel">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class=" text-center">ID Pesanan</th>
                            <th class=" text-center">Nama Pelanggan</th>
                            <th class=" text-center">Waktu Pemesanan</th>
                            <th class=" text-center">Jumlah Meja 2</th>
                            <th class=" text-center">Biaya Meja 2</th>
                            <th class=" text-center">Jumlah Meja 4</th>
                            <th class=" text-center">Biaya Meja 4</th>
                            <th class=" text-center">Total Biaya</th>
                            <th class=" text-center">Email</th>
                            <th class=" text-center">Nomor Telepon</th>
                            <th class=" text-center">Tanggal Pesan</th>
                            <th class=" text-center">Alamat</th>
                            <th class=" text-center">Aktivasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($tbl_tr) :
                            foreach ($tbl_tr as $tr) :
                        ?>
                                <tr>
                                    <!-- <td></td> -->
                                    <td><?= $no++; ?></td>
                                    <td><?= $tr['kode_transaksi']; ?></td>
                                    <td><?= $tr['nama_pelanggan']; ?></td>
                                    <td><?= $tr['waktu_reservasi']; ?></td>
                                    <!-- <td><?= $tr['waktu'] . " (" . date('H:i', $tr['jam_mulai'] - 25200) . " - " . date('H:i', $tr['jam_selesai'] - 25200) . ")"; ?></td> -->
                                    <td><?= $tr['jumlah_meja2']; ?></td>
                                    <td>Rp. <?= number_format($tr['biaya_meja2'], 2, ",", "."); ?></td>
                                    <td><?= $tr['jumlah_meja4']; ?></td>
                                    <td>Rp. <?= number_format($tr['biaya_meja4'], 2, ",", "."); ?></td>
                                    <td><?= $tr['total_biaya']; ?></td>
                                    <td><?= $tr['email']; ?></td>
                                    <td><?= $tr['no_telp']; ?></td>
                                    <td><?= date('d/M/Y', $tr['tanggal_pesan']); ?></td>
                                    <td><?= $tr['alamat']; ?></td>
                                    <td class=" text-center">
                                        <a href="<?= base_url('reservasi/update/') . $tr['kode_transaksi'] ?>" class="btn btn-circle btn-sm btn-success tombol-aktif" title="Aktifkan Pesanan" data-id="<?= $tr['kode_transaksi'] ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                    </td>
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