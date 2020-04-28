<!-- Begin Page Content -->
<div id="komenmasukan">
    <div class="container-fluid">

        <style>
            hr.komen {
                border: 0;
                border-top: 1px solid #000 !important;
                align-content: center;
                clear: both;
                display: block;
                width: 95%;

                height: 1px;
            }

            p.komen {
                text-align: justify;
                margin-right: 10px;
                margin-left: 20px;
            }

            .user {
                margin-right: 10px;
                margin-left: 20px;
                display: block;
            }
        </style>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-4">
                        <form action="<?= base_url('Masukan/ajax') ?>" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Masukan kata kunci.." name="keyword" id="keywordcari" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Cari">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <h5>Pencarian untuk " <?= $keyword ?> "</h5>
                <h5>Total Data: <?= $total_rows ?></h5>
                <hr class="komen">
                <?php if ($masukan) :
                    foreach ($masukan as $m) :
                ?>
                        <!-- <div id="komenmasukan"> -->
                        <div class="row comment user">

                            <small><strong><?= $m['nama']; ?> (<?= $m['jenis_kel']; ?>)</strong>&nbsp;&nbsp;&nbsp;
                                <em class="float-right"><i class="fas fa-map-marked-alt"></i>&nbsp;<?= $m['alamat']; ?> &nbsp;&nbsp;<i class="fas fa-calendar-alt"></i> <?= ($m['waktu_diterima'])  ?></em>
                                <br><i class="fas fa-envelope"></i> : <?= $m['email']; ?>; <i class="fas fa-phone-alt"></i> : <?= $m['no_telp']; ?>
                            </small>
                        </div>

                        <p class="komen"><br>
                            <?= $m['pesan']; ?>
                        </p>
                        <hr class="komen">
                        <!-- </div> -->
                    <?php endforeach; ?>
                <?php else : ?>
                    <h2 style="text-align: center">Data kosong</h2>
                    <hr class="komen">
                <?php endif; ?>

                <?= $this->pagination->create_links() ?>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>