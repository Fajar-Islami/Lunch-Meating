<!-- Begin Page Content -->
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
            <hr class="komen">
            <?php if ($masukan) :
                foreach ($masukan as $m) :
            ?>
                    <div class="row comment user">

                        <small><strong><?= $m['nama']; ?> (<?= $m['jenis_kel']; ?>)</strong>&nbsp;&nbsp;&nbsp;
                            <em class="float-right"><i class="fas fa-map-marked-alt"></i><?= $m['alamat']; ?> &nbsp;&nbsp;<i class="fas fa-calendar-alt"></i> <?= date('d/m/Y H:i', $m['waktu_diterima']); ?></em>
                            <br><i class="fas fa-envelope"></i> : <?= $m['email']; ?>; <i class="fas fa-phone-alt"></i> : <?= $m['no_telp']; ?>
                        </small>
                    </div>

                    <p class="komen"><br>
                        <?= $m['pesan']; ?>
                    </p>
                    <hr class="komen">

                <?php endforeach; ?>
            <?php else : ?>
                <h2 style="text-align: center">Data kosong</h2>
                <hr class="komen">
            <?php endif; ?>
        </div>

    </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->