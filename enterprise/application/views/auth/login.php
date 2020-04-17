<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-3 pt-lg-5">

            <div class="col-lg-10 ">

                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-11 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6 ">
                                <div class="p-5">
                                    <div class="text-center mb-2">
                                        <h1 class="h4 text-gray-900">Lunch Meating Restaurant</h1>
                                        <span class="text-muted">Masuk Admin</span>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="POST" action="<?= base_url('auth/index'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan Username ..." value="<?= set_value('username'); ?>">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password ...">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <div class="text-center mt-2">
                                        <a class="small" href="<?= base_url('auth/lupaPassword'); ?>">Lupa Password?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>