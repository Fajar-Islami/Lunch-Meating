<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-3 pt-lg-5">

            <div class="col-lg-10 ">

                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-7 ">
                                <div class="p-5 mb-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Ubah Password Anda</h1>
                                        <h5 class="mb-4"><?= $this->session->userdata('reset_email1') ?></h5>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="POST" action="<?= base_url('auth/pro_ubahPassword'); ?>">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukan Password baru...">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class=" form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password...">
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Ubah Password
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>