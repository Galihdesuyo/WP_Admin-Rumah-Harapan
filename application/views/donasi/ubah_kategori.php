<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Kategori</h1>
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
                            Nama Kategori Tidak Boleh Kosong
                        </div>
                    <?php } ?>
                    <?php foreach ($kategori as $k) { ?>
                        <form action="<?= base_url('donasi/ubahKategori'); ?>" method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?= $k['id']; ?>">
                                <input type="text" class="form-control form-control-user" id="kategori" name="kategori" placeholder="Masukkan Kategori Donasi" value="<?= $k['kategori']; ?>">
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