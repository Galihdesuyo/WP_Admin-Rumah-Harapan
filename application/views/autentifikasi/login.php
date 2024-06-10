<body class="hold-transition login-page bg-lime">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="row justify-content-center card card-outline card-primary o-hidden border-0 shadow-lg mx-auto">
            <div class="card-header text-center">
                <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/logo.png" alt="..." style="width: 80px; height: 80px;"><br>
                <a href="<?= base_url('autentifikasi'); ?>" class="h2"><b>RUMAH HARAPAN</b></a>
            </div>
            <div class="card-body col-lg">
                <p class="login-box-msg">Halaman Login Admin!</p>
                <?= $this->session->flashdata('pesan'); ?>
                <form class="user" action="<?= base_url('autentifikasi'); ?>" method="post">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <button type="submit" class="btn btn-primary btn-user btn-block">Log In</button>
                    <!-- /.col -->
            </div>
            </form>
            <hr>
            <p class="mb-1 text-center">
                <a href="<?= base_url('autentifikasi/lupaPassword'); ?>">Lupa Password ?</a>
            </p>
            <p class="mb-0 text-center">
                <a href="<?= base_url('autentifikasi/registrasi'); ?>">Daftar Akun Baru !</a>
            </p>
            <br>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->