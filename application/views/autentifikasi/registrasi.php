<body class="hold-transition register-page bg-lime">
    <div class="register-box">

        <div class="card o-hidden border-0 shadow-lg mx-auto">
            <div class="card-body register-card-body">
                <div class="text-center"><img class="rounded-circle" src="<?= base_url('assets/'); ?>img/profile/logo.png" alt="..." style="width: 100px; height: 100px;"></div>
                <hr>
                <p class="login-box-msg"><b>Perjalanan kebaikanmu dimulai di sini</b></p>

                <form class="user" action="<?= base_url('autentifikasi/registrasi'); ?>" method="post">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                    <!-- /.col -->
            </div>
            </form>
            <hr>
            <p class="mb-0 text-center">
                Sudah Punya Akun? <a href="<?= base_url('autentifikasi'); ?>">Log In!</a>
            </p>
            <br>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->