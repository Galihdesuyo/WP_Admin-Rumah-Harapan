<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Program Donasi</h1>
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
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <?php foreach ($donasi as $d) { ?>
                        <form action="<?= base_url('donasi/ubahDonasi/' . $d['id']); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?= $d['id']; ?>">
                                <input type="text" class="form-control form-control-user" id="judul_donasi" name="judul_donasi" placeholder="Masukkan Judul Donasi" value="<?= $d['judul_donasi']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="id_kategori" class="form-control form-control-user">
                                    <?php foreach ($kategori as $k) { ?>
                                        <option value="<?= $k['id']; ?>" <?= ($d['id_kategori'] == $k['id']) ? 'selected' : ''; ?>>
                                            <?= $k['kategori']; ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $d['alamat']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" value="<?= $d['deskripsi']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="dana_dibutuhkan" name="dana_dibutuhkan" placeholder="Masukkan Dana Yang Dibutuhkan" value="<?= $d['dana_dibutuhkan']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="dana_terkumpul" name="dana_terkumpul" placeholder="Masukkan Dana Yang Terkumpul" value="<?= $d['dana_terkumpul']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="status" name="status" placeholder="Masukkan Status Saat Ini" value="<?= $d['status']; ?>">
                            </div>
                            <div class="form-group">
                                <?php if (isset($d['image'])) { ?>
                                    <input type="hidden" name="old_pict" id="old_pict" value="<?= $d['image']; ?>">
                                    <picture>
                                        <source srcset="" type="image/svg+xml">
                                        <img src="<?= base_url('assets/img/upload/') . $d['image']; ?>" class="rounded mx-auto mb-3 d-block" alt="...">
                                    </picture>
                                <?php } ?>
                                <input type="file" class="form-control form-control-user" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                                <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->