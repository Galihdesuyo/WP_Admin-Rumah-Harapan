<body class="hold-transition login-page bg-lime">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card o-hidden border-0 shadow-lg mx-auto">
            <div class="card-body login-card-body">
                <div class="text-center"><img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/logo.png" alt="..." style="width: 100px; height: 100px;"></div>
                <hr>
                <p class="login-box-msg"><b>Kamu Lupa Password?</b><br>Di sini kamu dapat dengan mudah mengambil password baru.</p>

                <form class="user" action="<?= base_url('autentifikasi/lupaPassword'); ?>" method="post">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-user btn-block">Minta Reset Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <hr>
                <p class="mt-3 mb-1 text-center">
                    <a href="<?= base_url('autentifikasi/registrasi'); ?>">Daftar Akun Baru !</a>
                </p>
                <p class="mb-0 text-center">
                    Sudah Punya Akun? <a href="<?= base_url('autentifikasi'); ?>">Log In!</a>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->