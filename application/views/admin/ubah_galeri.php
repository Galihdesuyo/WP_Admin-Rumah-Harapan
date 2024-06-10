<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data Galeri</h1>
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
                    <?php foreach ($galeri as $g) { ?>
                        <form action="<?= base_url('galeri/ubahgaleri'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?= $g['id']; ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="judul_galeri" name="judul_galeri" placeholder="Masukan Judul Galeri" value="<?= $g['judul_galeri']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" value="<?= $g['text_1']; ?>">
                                </div>
                                <div class="form-group">
                                    <?php if (isset($g['image_1'])) { ?>
                                        <input type="hidden" name="old_pict" id="old_pict" value="<?= $g['image_1']; ?>">
                                        <picture>
                                            <img src="<?= base_url('assets/img/upload/') . $g['image_1']; ?>" class="rounded mx-auto mb-3 d-block" alt="Gambar Galeri" style="width:90px;height:100px;">
                                        </picture>
                                    <?php } ?>
                                    <input type="file" class="form-control form-control-user" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <?php if (isset($g['image_2'])) { ?>
                                        <input type="hidden" name="old_pict" id="old_pict" value="<?= $g['image_2']; ?>">
                                        <picture>
                                            <img src="<?= base_url('assets/img/upload/') . $g['image_2']; ?>" class="rounded mx-auto mb-3 d-block" alt="Gambar Galeri" style="width:90px;height:100px;">
                                        </picture>
                                    <?php } ?>
                                    <input type="file" class="form-control form-control-user" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <?php if (isset($g['image_3'])) { ?>
                                        <input type="hidden" name="old_pict" id="old_pict" value="<?= $g['image_3']; ?>">
                                        <picture>
                                            <img src="<?= base_url('assets/img/upload/') . $g['image_3']; ?>" class="rounded mx-auto mb-3 d-block" alt="Gambar Galeri" style="width:90px;height:100px;">
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->