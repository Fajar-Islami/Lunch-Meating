  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

      <div id="accordion">
          <div class="card shadow mb-2">
              <!-- Card Header - Accordion -->
              <div id="pendahuluan">
                  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                      <h6 class="m-0 font-weight-bold text-info">Pendahuluan</h6>
                  </a>
              </div>
              <!-- Card Content - Collapse -->
              <div class="collapse show" id="collapseCardExample" aria-labelledby="pendahuluan" data-parent="#accordion">
                  <div class="card-body">
                      <h1 class="col align-center text-primary text-center">Selamat Datang di Aplikasi Reservasi Restoran Lunch Meating</h1>
                      <div class="text-center">
                          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/img/undraw_welcome_cats_thqn.svg'); ?>" alt="img Selamat Datang">
                      </div>
                      <p>
                          Aplikasi ini adalah aplikasi yang dibuat untuk memudahkan proses reservasi pada restoran Lunch Meating. <br>
                          Aplikasi ini dibuat untuk memenuhi sebagian syarat penyelesaian mata kuliah Analisis dan Perancangan Sistem Informasi. <br>
                          Aplikasi ini dibuat oleh: <br>
                          <ol>
                              <li>Mayang Pusfitasari (1317095)</li>
                              <li> Ahmad Fajar Islami (1317099)</li>
                              <li>Adnan (1317109)</li>
                          </ol>
                      </p>
                  </div>
              </div>
          </div>

          <!-- Menu Admin -->
          <div class="card shadow mb-2">
              <!-- Card Header - Accordion -->
              <div id="menuAdmin">
                  <a href="#collapseCardExampleMenuAdmin" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExampleMenuAdmin">
                      <h6 class="m-0 font-weight-bold text-info">Menu Admin</h6>
                  </a>
              </div>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="collapseCardExampleMenuAdmin" aria-labelledby="menuAdmin" data-parent="#accordion">
                  <div class="card-body">
                      <div id="accordion1">
                          <!-- <div class="card shadow mb-1"> -->
                          <!-- Card Header - Accordion -->
                          <!-- <div id="penjelasan">
                                  <a href="#collapseCardExamplePenjelasanAdmin" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExamplePenjelasanAdmin">
                                      <h6 class="m-0 font-weight-bold text-primary">Penjelasan Menu Admin</h6>
                                  </a>
                              </div> -->
                          <!-- Card Content - Collapse -->
                          <!-- <div class="collapse show" id="collapseCardExamplePenjelasanAdmin" aria-labelledby="penjelasan" data-parent="#accordion1">
                                  <div class="card-body">
                                     Menu Admin terdiri sub
                                  </div>
                              </div> -->
                          <!-- </div> -->

                          <div class="card shadow mb-1">
                              <!-- Card Header - Accordion -->
                              <div id="profil">
                                  <a href="#collapseCardExampleProfil" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExampleProfil">
                                      <h6 class="m-0 font-weight-bold text-primary">Sub Menu Profil Saya</h6>
                                  </a>
                              </div>
                              <!-- Card Content - Collapse -->
                              <div class="collapse show" id="collapseCardExampleProfil" aria-labelledby="profil" data-parent="#accordion1">
                                  <div class="card-body">
                                      <img src="<?= base_url('assets/img/paduan/profil.png') ?>" alt="img Ubah Profil">
                                      <p> Sub menu ini menampilkan informasi admin yang sedang login. <br>
                                          Sub menu dapat juga digunakan untuk mengelola profil admin, seperti edit profil dan ubah kata sandi.
                                      </p>

                                      <p>
                                          Bagaimana Cara untuk <strong> <a href="<?= base_url('profile/edit'); ?>"> Edit Profil? </a></strong>
                                          <ol>
                                              <li>
                                                  Klik tombol edit profil<img src="<?= base_url('assets/img/paduan/profil-edit profil.png') ?>" alt="img edit Profil">
                                              </li>
                                              <li>Ubah data yang ingin diubah pada form. <br>
                                                  Foto hanya menerima format <strong>gif, jpg, jpeg dan png.</strong>
                                                  <!-- <br><img src="<?= base_url('assets/img/paduan/profil-edit profil-form.png') ?>" alt="edit Profil"> -->
                                              </li>
                                              <li>Jika sudah, tekan simpan.
                                              </li>
                                              <!-- <li>
                                                  Tekan Simpan pada form validasi untuk menyimpan perubahan.
                                                  <br><img src="<?= base_url('assets/img/paduan/profil-edit profil-validasi.png') ?>" alt="Foto edit Profil">
                                              </li> -->
                                          </ol>
                                      </p>

                                      <p>
                                          Bagaimana cara untuk <strong> <a href="<?= base_url('profile/ubahpassword'); ?>"> mengubah kata sandi ?</a></strong>
                                          <ol>
                                              <li>
                                                  Klik tombol ubah kata sandi<img src="<?= base_url('assets/img/paduan/profil-ubah pw.png') ?>" alt="img ubah pw">
                                              </li>
                                              <li>Masukan kata sandi lama dan kata sandi baru pada form ubah kata sandi. <br>
                                                  Ulangi kata sandi untuk memvalidasi kata sandi.
                                                  <!-- <br> <img src="<?= base_url('assets/img/paduan/profil-ubah pw-form.png') ?>" alt="ubah pw"> -->
                                              </li>
                                              <li>Jika sudah, tekan simpan.
                                              </li>
                                              <!-- <li>
                                                  Tekan Simpan pada form validasi untuk menyimpan perubahan.
                                                  <br> <img src="<?= base_url('assets/img/paduan/profil-ubah pw-validasi.png') ?>" alt="Foto ubah pw">
                                              </li> -->
                                          </ol>
                                      </p>
                                  </div>
                              </div>
                          </div>

                          <div class="card shadow mb-1">
                              <!-- Card Header - Accordion -->
                              <div id="dashboard">
                                  <a href="#collapseCardExampleDashboard" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExampleDashboard">
                                      <h6 class="m-0 font-weight-bold text-primary">Sub Menu Dashboard</h6>
                                  </a>
                              </div>
                              <!-- Card Content - Collapse -->
                              <div class="collapse" id="collapseCardExampleDashboard" aria-labelledby="dashboard" data-parent="#accordion1">
                                  <div class="card-body">
                                      <img src="<?= base_url('assets/img/paduan/dashboard.png') ?>" alt="img Dashboard">
                                      <p> Sub menu ini menampilkan pendapatan hari ini, total reservasi hari ini serta jumlah meja yang tersisa hari ini. <br>
                                          Sub menu ini juga menapilkan grafik pendapatan harian setiap minggu dan pendapatan dalam satu tahun.
                                      </p>
                                  </div>
                              </div>
                          </div>

                          <div class="card shadow mb-1">
                              <!-- Card Header - Accordion -->
                              <div id="kritik">
                                  <a href="#collapseCardExampleKritik" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExampleKritik">
                                      <h6 class="m-0 font-weight-bold text-primary">Sub Menu Masukan,Kritik dan Saran</h6>
                                  </a>
                              </div>
                              <!-- Card Content - Collapse -->
                              <div class="collapse" id="collapseCardExampleKritik" aria-labelledby="kritik" data-parent="#accordion1">
                                  <div class="card-body">
                                      <img src="<?= base_url('assets/img/paduan/kritik.png') ?>" alt="img Kritik">
                                      <p> Sub menu ini menampilkan masukan, kritik dan saran dari pelanggan yang dikirimm dari web Lunch Meating <br>
                                          Tanggapan pada sub menu ini dimulai dari tanggapan yang terbaru.
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Meja dan Waktu -->
          <div class="card shadow mb-2">
              <!-- Card Header - Accordion -->
              <a href="#collapseCardExampleMejaWaktu" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExampleMejaWaktu">
                  <h6 class="m-0 font-weight-bold text-info">Menu Meja dan Waktu</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="collapseCardExampleMejaWaktu">
                  <div class="card-body">
                      <!-- <div class="card shadow mb-1"> -->
                      <!-- Card Header - Accordion -->
                      <!-- <a href="#collapseCardExamplePenjelasanWaktu" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExamplePenjelasanWaktu">
                              <h6 class="m-0 font-weight-bold text-primary">Penjelasan Menu Meja dan Waktu</h6>
                          </a> -->
                      <!-- Card Content - Collapse -->
                      <!-- <div class="collapse show" id="collapseCardExamplePenjelasanWaktu">
                              <div class="card-body">
                                  This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click
                                      on the card header</strong> to see the card body collapse and expand!
                              </div>
                          </div> -->
                      <!-- </div> -->

                      <div class="card shadow mb-1">
                          <!-- Card Header - Accordion -->
                          <a href="#collapseCardExampleMejadanKursi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExampleMejadanKursi">
                              <h6 class="m-0 font-weight-bold text-primary">Sub Meja dan Kursi</h6>
                          </a>
                          <!-- Card Content - Collapse -->
                          <div class="collapse show" id="collapseCardExampleMejadanKursi">
                              <div class="card-body">
                                  <img src="<?= base_url('assets/img/paduan/meja.png') ?>" alt="img Meja dan Kursi">
                                  <p> Sub menu ini digunakan untuk mengelola meja reservasi seperti jumlah meja yang akan di reservasikan.<br>
                                      Pada sub menu ini, dapat melakukan tambah meja reservasi, edit dan hapus. <br> <br>
                                  </p>

                                  <p>
                                      Bagaimana cara melakukan <strong> <a href="<?= base_url('mejakursi/tambahmejakursi') ?>">tambah meja reservasi ?</a></strong>
                                      <ol>
                                          <li>
                                              Klik tombol tambah meja yang terletak di sebelah kanan atas.<img src="<?= base_url('assets/img/paduan/meja-tambah.png') ?>" alt="img tambah meja kursi">
                                          </li>
                                          <li>Silahkan isi form tambah meja.
                                          </li>
                                          <li>Jika sudah, tekan simpan.
                                          </li>
                                      </ol>
                                  </p>

                                  <p>
                                      Bagaimana cara melakukan <strong>edit meja reservasi ?</a></strong>
                                      <ol>
                                          <li>
                                              Klik tombol edit meja pada kolom aksi pada meja yang akan di edit.<img src="<?= base_url('assets/img/paduan/edit.png') ?>" alt="img edit meja kursi" title="Edit">
                                          </li>
                                          <li>Silahkan melakukan perubahan pada data meja.
                                          </li>
                                          <li>Jika sudah, tekan simpan.
                                          </li>
                                          *Meja reservasi tidak dapat diedit ketika ada status pembayaran reservasi yang belum selesai pada jadwal reservasi tersebut.
                                      </ol>
                                  </p>

                                  <p>
                                      Bagaimana cara melakukan <strong>hapus meja reservasi ?</a></strong>
                                      <ol>
                                          <li>
                                              Klik tombol hapus meja pada kolom aksi pada meja yang akan di hapus.<img src="<?= base_url('assets/img/paduan/hapus.png') ?>" alt="img hapus meja kursi" title="Hapus">
                                          </li>
                                          <li>Tekan hapus pada form validasi yang muncul.
                                          </li>
                                          *Meja reservasi tidak dapat dihapus ketika ada status pembayaran reservasi yang belum selesai pada jadwal reservasi tersebut.
                                      </ol>
                                  </p>
                              </div>
                          </div>
                      </div>

                      <div class="card shadow mb-1">
                          <!-- Card Header - Accordion -->
                          <a href="#collapseCardExampleWaktuMeja" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExampleWaktuMeja">
                              <h6 class="m-0 font-weight-bold text-primary">Sub Waktu Meja</h6>
                          </a>
                          <!-- Card Content - Collapse -->
                          <div class="collapse" id="collapseCardExampleWaktuMeja">
                              <div class="card-body">
                                  <img src="<?= base_url('assets/img/paduan/waktu.png') ?>" alt="img Waktu Meja">
                                  <p> Sub menu ini digunakan untuk mengelola waktu yang akan digunakan pada data meja reservasi.<br>
                                      Pada sub menu ini, dapat melakukan tambah waktu meja, edit dan hapus. <br> <br>
                                  </p>

                                  <p>
                                      Bagaimana cara melakukan <strong> <a href="<?= base_url('waktumeja/tambahwaktumeja') ?>">tambah waktu meja ?</a></strong>
                                      <ol>
                                          <li>
                                              Klik tombol tambah waktu meja yang terletak di sebelah kanan atas.<img src="<?= base_url('assets/img/paduan/meja-tambah.png') ?>" alt="img tambah waktu meja">
                                          </li>
                                          <li>Silahkan isi form tambah waktu meja.
                                          </li>
                                          <li>Jika sudah, tekan simpan.
                                          </li>
                                      </ol>
                                  </p>

                                  <p>
                                      Bagaimana cara melakukan <strong>edit waktu meja ?</a></strong>
                                      <ol>
                                          <li>
                                              Klik tombol edit waktu pada kolom aksi pada waktu yang akan di edit.<img src="<?= base_url('assets/img/paduan/edit.png') ?>" alt="img edit waktu meja" title="Edit">
                                          </li>
                                          <li>Silahkan melakukan perubahan pada data waktu.
                                          </li>
                                          <li>Jika sudah, tekan simpan.
                                          </li>
                                          *Waktu meja tidak dapat diedit ketika ada status pembayaran reservasi yang belum selesai pada jadwal reservasi tersebut.
                                      </ol>
                                  </p>

                                  <p>
                                      Bagaimana cara melakukan <strong>hapus waktu meja ?</a></strong>
                                      <ol>
                                          <li>
                                              Klik tombol hapus waktu pada kolom aksi pada waktu yang akan di hapus.<img src="<?= base_url('assets/img/paduan/hapus.png') ?>" alt="img hapus waktu meja" title="Hapus">
                                          </li>
                                          <li>Tekan hapus pada form validasi yang muncul.
                                          </li>
                                          *Waktu meja tidak dapat diedit ketika ada status pembayaran reservasi yang belum selesai pada jadwal reservasi tersebut.
                                      </ol>
                                  </p>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>

          <!-- Transaksi -->
          <div class="card shadow mb-2">
              <!-- Card Header - Accordion -->
              <a href="#collapseCardExampleMenuTransaksi" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExampleMenuTransaksi">
                  <h6 class="m-0 font-weight-bold text-info">Menu Transaksi</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="collapseCardExampleMenuTransaksi">
                  <div class="card-body">
                      <!-- <div class="card shadow mb-1"> -->
                      <!-- Card Header - Accordion -->
                      <!-- <a href="#collapseCardExamplePenjelasanTransaksi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExamplePenjelasanTransaksi">
                              <h6 class="m-0 font-weight-bold text-primary">Penjelasan Menu Transaksi</h6>
                          </a> -->
                      <!-- Card Content - Collapse -->
                      <!-- <div class="collapse show" id="collapseCardExamplePenjelasanTransaksi">
                              <div class="card-body">
                                  This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click
                                      on the card header</strong> to see the card body collapse and expand!
                              </div>
                          </div> -->
                      <!-- </div> -->

                      <div class="card shadow mb-1">
                          <!-- Card Header - Accordion -->
                          <a href="#collapseCardExampleDaftarReservasi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExampleDaftarReservasi">
                              <h6 class="m-0 font-weight-bold text-primary">Sub Daftar Reservasi</h6>
                          </a>
                          <!-- Card Content - Collapse -->
                          <div class="collapse show" id="collapseCardExampleDaftarReservasi">
                              <div class="card-body">
                                  <img src="<?= base_url('assets/img/paduan/daftar.png') ?>" alt="img Reservasi">
                                  <p> Sub menu ini digunakan untuk menampilkan daftar <i>history</i> / sejarah reservasi pelanggan yang berhasil.
                                  </p>
                              </div>
                          </div>
                      </div>

                      <div class="card shadow mb-1">
                          <!-- Card Header - Accordion -->
                          <a href="#collapseCardExampleReservasiTertunda" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExampleReservasiTertunda">
                              <h6 class="m-0 font-weight-bold text-primary">Sub Reservasi Tertunda</h6>
                          </a>
                          <!-- Card Content - Collapse -->
                          <div class="collapse" id="collapseCardExampleReservasiTertunda">
                              <div class="card-body">
                                  <img src="<?= base_url('assets/img/paduan/reservasi.png') ?>" alt="img Reservasi">
                                  <p> Sub menu ini digunakan untuk menampilkan daftar pesananan reservasi pelanggan yang belum disetujui atau membayar biaya reservasi.<br>
                                      Sub menu ini digunakan untuk mengaktifkan pesanan reservasi. <br> <br>
                                  </p>

                                  <p>
                                      Bagaimana cara melakukan <strong>>mengaktifkan pesanan reseervasi ?</strong>
                                      <ol>
                                          <li>
                                              Klik tombol aktifkan pesanan <img src="<?= base_url('assets/img/paduan/aktif.png') ?>" alt="img aktif" title="Aktifkan Pesanan"> pada pesanan yang yang ingin diaktfikan yang terletak pada kolom aksi.
                                          </li>
                                          <li>Klik Ya jika muncul form validasi
                                          </li>
                                      </ol>
                                  </p>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->