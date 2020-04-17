<!-- Start Stuff -->
<div class="stuff-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Staf</h2>
                    <p>Berikut adalah anggota kelompok 8 : </p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($staf as $glr) : ?>
                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <img src="<?= base_url('assets/') . $glr['foto']; ?>">
                        <div class="team-content">
                            <h3 class="title"><?= $glr['nama']; ?></h3>
                            <span class="post"><?= $glr['jabatan']; ?></span>
                            <ul class="social">
                                <li><a href="http://<?= $glr['facebook']; ?>"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="http://<?= $glr['instagram']; ?>"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="http://<?= $glr['gmail']; ?>"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End Stuff -->