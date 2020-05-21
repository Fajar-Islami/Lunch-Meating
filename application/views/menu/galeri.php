<!-- Start Gallery -->
<div class="gallery-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>GALERI</h2>
                    <p>Makanan dan minuman disajikan oleh koki-koki profesional kami.</p>
                </div>
            </div>
        </div>
        <div class="tz-gallery">
            <div class="row">
                <?php
                foreach ($galeri as $glr) : ?>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <a class="lightbox" href="<?= base_url('assets/') . $glr['foto']; ?>">
                            <img class="img-fluid" src="<?= base_url('assets/') . $glr['foto']; ?>" alt="Gallery Images">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery -->