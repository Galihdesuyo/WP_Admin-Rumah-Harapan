<body class="hold-transition login-page bg-lime">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card o-hidden border-0 shadow-lg mx-auto">
            <div class="card-body login-card-body">
                <div class="text-center"><img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/logo.png" alt="..." style="width: 100px; height: 100px;"></div>
                <hr>
                <p class="login-box-msg">Kamu hanya selangkah lagi, Silahkan masukan password baru kamu !</p>

                <form class="user" action="<?= base_url('autentifikasi/passwordBaru'); ?>" method="post">
                    <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-user" id="password_baru1" name="password_baru1" placeholder="Password Baru">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-user" id="password_baru2" name="password_baru2" placeholder="Ulangi Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
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