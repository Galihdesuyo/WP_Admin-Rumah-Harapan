<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Data Transaksi</h1>
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
                    <a href="<?= base_url('laporan/cetak_laporan_transaksi'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
                    <a href="<?= base_url('laporan/laporan_transaksi_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
                    <a href="<?= base_url('laporan/export_excel_transaksi'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Judul Donasi</th>
                                        <th scope="col">ID Transaksi</th>
                                        <th scope="col">Jumlah Donasi</th>
                                        <th scope="col">Tanggal Transaksi</th>
                                        <th scope="col">Bank</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($laporan as $l) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $l['nama']; ?></td>
                                            <td><?= $l['judul_donasi']; ?></td>
                                            <td><?= $l['no_transaksi']; ?></td>
                                            <td><?= $l['jumlah_donasi']; ?></td>
                                            <td><?= $l['tgl_transaksi']; ?></td>
                                            <td><?= $l['bank']; ?></td>
                                            <td><?= $l['status']; ?></td>
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