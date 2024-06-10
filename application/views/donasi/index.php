<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Program Donasi</h1>
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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#donasiBaruModal"><i class="fas fa-file-alt"></i> Tambah Donasi Baru</a>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Donasi</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Dana Yang Dibutuhkan</th>
                                        <th scope="col">Dana Yang Terkumpul</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $a = 1;
                                    foreach ($donasi as $d) { ?>
                                        <tr>
                                            <th scope="row"><?= $a++; ?></th>
                                            <td><?= $d['id']; ?></td>
                                            <td><?= $d['judul_donasi']; ?></td>
                                            <td><?php
                                                foreach ($kategori as $k) {
                                                    if ($d['id_kategori'] == $k['id']) {
                                                        echo $k['kategori'];
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?= $d['alamat']; ?></td>
                                            <td><?= $d['deskripsi']; ?></td>
                                            <td><?= $d['dana_dibutuhkan']; ?></td>
                                            <td><?= $d['dana_terkumpul']; ?></td>
                                            <td><?= $d['status']; ?></td>
                                            <td>
                                                <picture>
                                                    <source srcset="" type="image/svg+xml">
                                                    <img src="<?= base_url('assets/img/upload/') . $d['image']; ?>" class="img-fluid img-thumbnail" alt="Gambar Donasi">
                                                </picture>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('donasi/ubahDonasi/') . $d['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                                <a href="<?= base_url('donasi/hapusDonasi/') . $d['id']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus <?= $d['judul_donasi']; ?>?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
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
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal Tambah Donasi Baru-->
<div class="modal fade" id="donasiBaruModal" tabindex="-1" role="dialog" aria-labelledby="donasiBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donasiBaruModalLabel">Tambah Donasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('donasi'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="judul_donasi" name="judul_donasi" placeholder="Masukkan Judul Donasi" required>
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="dana_dibutuhkan" name="dana_dibutuhkan" placeholder="Dana Yang Dibutuhkan" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="dana_terkumpul" name="dana_terkumpul" placeholder="Dana Yang Terkumpul">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-user" id="status" name="status" required>
                            <option value="" disabled selected>Pilih Status Saat Ini</option>
                            <option value="Belum">Belum</option>
                            <option value="Terkumpul">Terkumpul</option>
                        </select>
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
<!-- End of Modal Tambah Donasi Baru -->