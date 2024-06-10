<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Password</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">

                    <?= $this->session->flashdata('pesan'); ?>

                    <form action="<?= base_url('user/ubahPassword'); ?>" method="post">
                        <div class="form-gorup">
                            <label for="password_sekarang">Password Saat Ini</label>
                            <input type="password" class="form-control" id="password_sekarang" name="password_sekarang">
                            <?= form_error('password_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-gorup">
                            <label for="password_baru1">Password Baru</label>
                            <input type="password" class="form-control" id="password_baru1" name="password_baru1">
                            <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-gorup">
                            <label for="password_baru2">Ulangi Password</label>
                            <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                            <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-3">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->