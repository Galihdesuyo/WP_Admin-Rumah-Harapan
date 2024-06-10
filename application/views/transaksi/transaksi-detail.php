<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Detail Transaksi Donasi</h1>
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
                            <?php foreach ($agt_transaksi as $at) { ?>
                                <tr>
                                    <td>Data User</td>
                                    <td>:</td>
                                    <th><?= $at['nama']; ?></th>
                                </tr>
                                <tr>
                                    <td>ID Transaksi</td>
                                    <td>:</td>
                                    <th><?= $at['id_transaksi']; ?></th>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="table-responsive full-width">
                                        <table class="table table-bordered table-striped table-hover" id="table-datatable">
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Donasi</th>
                                                <th>Judul Donasi</th>
                                                <th>Kategori</th>
                                                <th>Alamat</th>
                                                <th>Deskripsi</th>
                                                <th>Dana Yang Dibutuhkan</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            foreach ($detail as $d) {
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $d['id_donasi']; ?></td>
                                                    <td><?= $d['judul_donasi']; ?></td>
                                                    <td><?php
                                                        foreach ($kategori as $k) {
                                                            if ($d['id_kategori'] == $k['id']) {
                                                                echo $k['kategori'];
                                                            }
                                                        }
                                                        ?></td>
                                                    <td><?= $d['alamat']; ?></td>
                                                    <td><?= $d['deskripsi']; ?></td>
                                                    <td><?= $d['dana_dibutuhkan']; ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="3"><a href="#" onclick="window.history.go(-1)" class="btn btn-outline-dark"><i class="fas fa-fw fa-reply"></i> Kembali</a></td>
                            </tr>
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