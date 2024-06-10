<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data Bank</h1>
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
                    <?php if (is_array($bank) && count($bank) > 0) { ?>
                        <?php foreach ($bank as $b) { ?>
                            <form action="<?= base_url('user/ubahbank'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="<?= $b['id']; ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="bank" name="bank" placeholder="Masukan Nama Bank" value="<?= $b['bank']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="no_rekening" name="no_rekening" placeholder="Masukan Nomor Rekening" value="<?= $b['no_rekening']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="pemilik" name="pemilik" placeholder="Masukan Nama Pemilik" value="<?= $b['pemilik']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <?php if (isset($b['image'])) { ?>
                                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['image']; ?>">
                                            <picture>
                                                <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="rounded mx-auto mb-3 d-block" alt="Gambar Bank" style="width:70px;height:80px;">
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
                    <?php } else { ?>
                        <div class="alert alert-warning" role="alert">
                            Data Bank Tidak Ditemukan.
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->