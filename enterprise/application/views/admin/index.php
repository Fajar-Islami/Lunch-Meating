<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <!-- <?= date('d/m/Y H:i', $waktu = time()) ?><br>
    <?= date('d/m/Y H:i', $waktu = time() - ((time() % 86400))) ?><br>
    <?= date('d/m/Y H:i', $waktu = time() - ((time() % 86400) + 25200)) ?><br>
    <?= date('d/m/Y H:i', $waktu = time() - ((time() % 86400) + 25200) + 86400) ?><br>
    <?= $waktu = time() - ((time() % 86400) + 25200) ?><br>
    <?= $waktu = (time() - ((time() % 86400) + 25200)) + 86400 ?><br>
    <?= $z = (time() + 25200) % 86400 ?><br>
    <?= time() ?><br>
    <?= date('d/m/Y H:i', 1588032000) ?><br>
    <?= strtotime('2020/04/28 07:00') ?><br> -->

    <!-- Kartu -->
    <div class="row">
        <!-- Pendapatan Harian -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success h-auto shadow py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($harian, 0, ",", ".") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Reservasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info h-auto shadow  py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reservasi Selesai</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $reservasi ?>/<?= $totalReservasi ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= ($reservasi / $totalReservasi) * 100 . '%' ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-address-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Reservasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning h-auto shadow  py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Reservasi Tertunda</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $reservasiTunda ?>/<?= $totalReservasi ?></div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width:  <?= ($reservasiTunda / $totalReservasi) * 100 . '%' ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-address-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meja Tersedia -->
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Collapsable Card Example -->
            <div class="card border-left-primary h-auto shadow py-2">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3 collapsed mt-1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample" style="background-color:white; border-bottom:white;">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6> -->
                    <!-- <div class="card-body"> -->
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 mb-1">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sisa Meja Tersedia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sisaMeja ?> Meja </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <!-- </div> -->
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample">
                    <hr>
                    <div class="card-body" style="padding-bottom:0mm; padding-top:0mm">
                        <?php
                        if ($ketmeja) :
                            foreach ($ketmeja as $wm) : ?>
                                <table border="0">
                                    <col width="100">
                                    <col width="200">
                                    <tr>
                                        <td>
                                            <p><span class="text-color"><?= $wm['waktu'] ?></span></p>
                                        </td>

                                        <td>
                                            <p><span class="text-color"><?= date('H:i', $wm['jam_mulai'] - 25200) . " - " . date('H:i', $wm['jam_selesai'] - 25200) ?></span></p>
                                        </td>

                                        <td>
                                            <p><span class="text-color"><?= $wm['meja_4'] +  $wm['meja_2'] ?></span></p>
                                        </td>
                                    </tr>
                                </table>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <table border="1">
                                <tr width="300">
                                    <!-- <td colspan="12" class="text-center"> -->
                                    <p style="text-align: center;"><span class="text-color">Tidak ada jadwal untuk saat ini</span></p>
                                    <!-- </td> -->
                                </tr>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Kartu  -->

    <!-- Chart -->
    <div class="row">
        <!-- Mingguan Area Chart -->
        <div class="col-xl-8 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pendapatan Minggu Ini</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="mingguAreaChart"></canvas>
                    </div>
                    <hr>
                    Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
                </div>
            </div>
        </div>

        <!-- Bulanan Area Chart -->
        <div class="col-xl-8 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pendapat Bulan Ini</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="bulanAreaChart"></canvas>
                    </div>
                    <hr>
                    Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
                </div>
            </div>
        </div>

        <!-- Tahun Chart -->
        <div class="col-xl-8 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pendapat Tahun Ini</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="tahunAreaChart"></canvas>
                    </div>
                    <hr>
                    Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
                </div>
            </div>
        </div>

    </div>
    <!-- AkhirChart -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->