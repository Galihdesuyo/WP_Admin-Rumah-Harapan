<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin'); ?>" class="brand-link">
        <img src="<?= base_url('assets/'); ?>img/profile/logo.png" alt="..." class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Rumah Harapan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle elevation-3" alt="User Image" style="width: 30px; height: 30px;">
            </div>
            <div class="info nav-item">
                <a href="<?= base_url('user'); ?>" class="d-block"><?= $user['nama']; ?></a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <hr>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            File Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('donasi/kategori'); ?>" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p> Kategori Donasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('donasi'); ?>" class="nav-link">
                                <i class="fas fa-desktop"></i>
                                <p> Data Program Donasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('user/anggota'); ?>" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p> Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('user/bank'); ?>" class="nav-link">
                                <i class="fas fa-university"></i>
                                <p> Data Bank</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            File Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi/pembayaran'); ?>" class="nav-link">
                                <i class="fas fa-envelope"></i>
                                <p> Data Pembayaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('transaksi'); ?>" class="nav-link">
                                <i class="fas fa-check-circle"></i>
                                <p> Data Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            File Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('laporan/laporan_donasi'); ?>" class="nav-link">
                                <i class="fas fa-folder-open"></i>
                                <p> Laporan Program Donasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('laporan/laporan_anggota'); ?>" class="nav-link">
                                <i class="fas fa-folder-open"></i>
                                <p> Laporan Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('laporan/laporan_transaksi'); ?>" class="nav-link">
                                <i class="fas fa-folder-open"></i>
                                <p> Laporan Data Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('berita'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita Terkini
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('galeri'); ?>" class="nav-link">
                        <i class="nav-icon fa fa-image"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('kalender'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Kalender
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('autentifikasi/logout'); ?>" id="logoutBtn" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <script>
                    document.getElementById('logoutBtn').addEventListener('click', function(event) {
                        event.preventDefault(); // Mencegah navigasi ke link

                        if (confirm('Apakah Anda Yakin Ingin Logout ?')) {
                            window.location.href = '<?= base_url('autentifikasi/logout'); ?>'; // Lakukan logout jika dikonfirmasi
                        }
                    });
                </script>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>