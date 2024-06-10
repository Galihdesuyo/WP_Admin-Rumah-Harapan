<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Transaksi Donasi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>ID User</th>
                                <th>ID Donasi</th>
                                <th>Jumlah Donasi</th>
                                <th>Bank</th>
                                <th>Status</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($transaksi as $t) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $t['no_transaksi']; ?></td>
                                    <td><?= $t['tgl_transaksi']; ?></td>
                                    <td><?= $t['id_user']; ?></td>
                                    <td><?= $t['id_donasi']; ?></td>
                                    <td><?= $t['jumlah_donasi']; ?></td>
                                    <td><?= $t['bank']; ?></td>
                                    <form action="<?= base_url('transaksi/ubahStatus/' . $t['id_donasi'] . '/' . $t['no_transaksi']); ?>" method="post">
                                        <td nowrap>
                                            <?php if ($t['status'] == "berhasil") { ?>
                                                <i class="btn btn-sm btn-outline-secondary"><i class="fas fa-fw fa-check"></i>Selesai</i>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-sm btn-outline-info"><i class="fas fa-fw fa-cart-plus"></i>Ubah</button>
                                            <?php } ?>
                                        </td>
                                    </form>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="container d-flex justify-content-center align-items-center">
                <form action="<?= base_url('transaksi/pembayaran'); ?>" method="post">
                    <button type="submit" class="btn btn-primary">Refresh Halaman</button>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->