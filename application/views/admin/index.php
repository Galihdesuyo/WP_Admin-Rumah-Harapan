<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner font-weight-bold text-white">
                            <h4>Jumlah User</h4>
                            <h1><b><?= $this->ModelUser->getUserWhere(['role_id' => 2])->num_rows(); ?></b></h1>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <a href="<?= base_url('user/anggota'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner font-weight-bold text-white">
                            <h4>Program Donasi</h4>
                            <h1><b><?= $this->ModelDonasi->getDonasi()->num_rows(); ?></b></h1>
                        </div>
                        <div class="icon">
                            <i class="fas fa-desktop text-white"></i>
                        </div>
                        <a href="<?= base_url('donasi'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner font-weight-bold text-white">
                            <h4>Donasi Masuk</h4>
                            <h1><b>10</b></h1>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <a href="<?= base_url('transaksi/pembayaran'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner font-weight-bold text-white">
                            <h4>Donasi Berhasil</h4>
                            <h1><b>10</b></h1>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                        <a href="<?= base_url('transaksi'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <hr>
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg connectedSortable">
                    <div class="col-md-0 mx-auto">
                        <!-- USERS LIST -->
                        <div class="card col-lg">
                            <div class="card-header">
                                <h2 class="card-title"><b>Daftar User</b></h2>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table id="table-datatable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aktif</th>
                                            <th>Mendaftar Sejak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($anggota as $a) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $a['nama']; ?></td>
                                                <td><?= $a['email']; ?></td>
                                                <td><?php
                                                    foreach ($role as $r) {
                                                        if ($a['role_id'] == $r['id']) {
                                                            echo $r['role'];
                                                        }
                                                    }
                                                    ?></td>
                                                <td><?= $a['is_active']; ?></td>
                                                <td><?= date('d-m-Y', $a['tanggal_input']); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="<?= base_url('user/anggota'); ?>">See All User</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </section>
                <!-- /.col -->
                <!-- Right col -->
                <section class="col-lg connectedSortable">
                    <div class="col-md-0 mx-auto">
                        <!-- DIRECT CHAT -->
                        <div class="card col-lg">
                            <div class="card-header">
                                <h2 class="card-title"><b>Live Chat</b></h2>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" title="Live In Home" data-widget="chat-pane-toggle">
                                        <a href="<?= base_url('#'); ?>"><i class="fas fa-comments"></i></a>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Rifqi Fachrul Rozi</span>
                                            <span class="direct-chat-timestamp float-right">10 Jun 2:00 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="<?= base_url('assets/'); ?>img/profile/domba.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Halo! Saya adalah pengguna baru, Salam kenal!
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Andini Salma</span>
                                            <span class="direct-chat-timestamp float-left">10 Jun 2:05 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="<?= base_url('assets/'); ?>img/profile/parrot.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Halo kak! Salam kenal juga!
                                        </div>
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Ketikan Pesan ..." class="form-control">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-warning">Kirim</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </section>
                <hr>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->