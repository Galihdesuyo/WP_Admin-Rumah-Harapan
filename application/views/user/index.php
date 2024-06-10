<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile Saya</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card mb-3" style="max-width: 540px;">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row no-gutters">
                    <div class="col-md-4 text-center">
                        <br><img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-profile rounded-circle" alt="Profile Image" style="width: 150px; height: 150px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama']; ?></h5>
                            <p class="card-text"><?= $user['email']; ?></p>
                            <p class="card-text"><small class="text-muted">Tanggal Mendaftar : <br><b><?= date('d F Y', $user['tanggal_input']); ?></b></small></p>
                        </div>
                        <div class="btn btn-info ml-3 my-3">
                            <a href="<?= base_url('user/ubahProfil'); ?>" class="text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div><!-- /.content-wrapper -->