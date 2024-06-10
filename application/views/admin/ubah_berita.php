<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data Berita</h1>
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
                    <?php foreach ($berita as $b) { ?>
                        <form action="<?= base_url('berita/ubahberita'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?= $b['id']; ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="judul_berita" name="judul_berita" placeholder="Masukan Judul Berita" value="<?= $b['judul_berita']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" value="<?= $b['deskripsi']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="penulis" name="penulis" placeholder="Masukan Nama Penulis" value="<?= $b['penulis']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user datepicker" id="tgl_posting" name="tgl_posting" placeholder="Pilih Tanggal Posting" value="<?= $b['tgl_posting']; ?>">
                                </div>
                                <div class="form-group">
                                    <?php if (isset($b['image'])) { ?>
                                        <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['image']; ?>">
                                        <picture>
                                            <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="rounded mx-auto mb-3 d-block" alt="Gambar Berita" style="width:90px;height:100px;">
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