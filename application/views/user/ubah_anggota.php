<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="row">
                <div class="col-lg-6">
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger alert-message" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <form action="<?= base_url('user/ubahAnggota/' . $anggota['id']); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="<?= $anggota['id']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukan Nomor Induk Kependudukan" value="<?= $anggota['nik']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukan Nama User" value="<?= $anggota['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin" value="<?= $anggota['jenis_kelamin']; ?>">
                                    <option value="Laki-laki" <?= $anggota['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= $anggota['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukan Alamat Tempat Tinggal" value="<?= $anggota['alamat']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Alamat Email" value="<?= $anggota['email']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nohp" name="nohp" placeholder="Masukan Nomor Handphone" value="<?= $anggota['nohp']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="tanggal_input" name="tanggal_input" placeholder="Masukan Tanggal User" value="<?= date('d F Y', $anggota['tanggal_input']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <?php if (isset($anggota['image'])) { ?>
                                    <input type="hidden" name="old_pict" id="old_pict" value="<?= $anggota['image']; ?>">
                                    <picture>
                                        <img src="<?= base_url('assets/img/profile/') . $anggota['image']; ?>" class="rounded mx-auto mb-3 d-block" alt="Gambar Profil" style="width:140px;height:150px;">
                                    </picture>
                                <?php } ?>
                                <input type="file" class="form-control form-control-user" id="image" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                            <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->