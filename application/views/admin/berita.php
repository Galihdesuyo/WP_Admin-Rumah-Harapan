<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Berita Terkini</h1>
                </div>
            </div>
        </div>
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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#beritaBaruModal">
                        <i class="fas fa-file-alt"></i> Tambah Berita Baru
                    </a>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Berita</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Tanggal Posting</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($berita as $b) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $b['judul_berita']; ?></td>
                                            <td><?= $b['deskripsi']; ?></td>
                                            <td><?= $b['penulis']; ?></td>
                                            <td><?= $b['tgl_posting']; ?></td>
                                            <td>
                                                <picture>
                                                    <source srcset="" type="image/svg+xml">
                                                    <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="img-fluid img-thumbnail" alt="..." style="width:90px;height:100px;">
                                                </picture>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('berita/ubahberita/') . $b['id']; ?>" class="badge badge-info">
                                                    <i class="fas fa-edit"></i> Ubah
                                                </a>
                                                <a href="<?= base_url('berita/hapusberita/') . $b['id']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus <?= $judul . ' ' . $b['judul_berita']; ?> ?');" class="badge badge-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
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
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah Berita Baru-->
<div class="modal fade" id="beritaBaruModal" tabindex="-1" role="dialog" aria-labelledby="beritaBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="beritaBaruModalLabel">Tambah Berita Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('berita'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="judul_berita" id="judul_berita" placeholder="Masukan Judul Berita" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="penulis" id="penulis" placeholder="Masukan Nama Penulis" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tgl_posting" id="tgl_posting" placeholder="Pilih Tanggal Posting" class="form-control form-control-user datepicker">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
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
<!-- End of Modal Tambah Berita -->