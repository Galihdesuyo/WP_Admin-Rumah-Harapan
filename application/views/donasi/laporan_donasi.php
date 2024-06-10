<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Program Donasi</h1>
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
                    <?= $this->session->flashdata('pesan'); ?>
                    <a href="<?= base_url('laporan/cetak_laporan_donasi'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
                    <a href="<?= base_url('laporan/laporan_donasi_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
                    <a href="<?= base_url('laporan/export_excel_donasi'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($donasi as $d) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
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