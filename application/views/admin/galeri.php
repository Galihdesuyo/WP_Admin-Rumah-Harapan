<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Galeri</h1>
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
                <div class="col-lg-12">
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#galeriBaruModal"><i class="fas fa-file-alt"></i> Tambah Galeri Baru</a>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Galeri</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Image1</th>
                                        <th scope="col">Image2</th>
                                        <th scope="col">Image3</th>
                                        <th scope="col">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($galeri as $g) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $g['judul_galeri']; ?></td>
                                            <td><?= $g['text_1'] . ' - ' . $g['text_2']; ?></td>
                                            <td>
                                                <img src="<?= base_url('assets/img/upload/') . $g['image_1']; ?>" class="img-fluid img-thumbnail" alt="Image" style="width:90px;height:100px;">
                                            </td>
                                            <td>
                                                <img src="<?= base_url('assets/img/upload/') . $g['image_2']; ?>" class="img-fluid img-thumbnail" alt="Image" style="width:90px;height:100px;">
                                            </td>
                                            <td>
                                                <img src="<?= base_url('assets/img/upload/') . $g['image_3']; ?>" class="img-fluid img-thumbnail" alt="Image" style="width:90px;height:100px;">
                                            </td>
                                            <td>
                                                <a href="<?= base_url('galeri/ubahgaleri/') . $g['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                                <a href="<?= base_url('galeri/hapusgaleri/') . $g['id']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus <?= $g['judul_galeri']; ?>?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah Galeri Baru-->
<div class="modal fade" id="galeriBaruModal" tabindex="-1" role="dialog" aria-labelledby="galeriBaruModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galeriBaruModalLabel">Tambah Galeri Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('galeri'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="judul_galeri" name="judul_galeri" placeholder="Masukkan Judul Galeri" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" required>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image_1" name="image_1">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image_2" name="image_2">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image_3" name="image_3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Galeri Baru -->