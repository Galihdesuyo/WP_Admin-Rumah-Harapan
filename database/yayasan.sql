-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2024 pada 13.04
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yayasan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `no_rekening` int(16) NOT NULL,
  `pemilik` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `bank`, `no_rekening`, `pemilik`, `image`) VALUES
(1, 'Bank BRI', 1944062801, 'Rumah Harapan', 'img1717256337.jpeg'),
(2, 'Bank BNI', 1942259231, 'Rumah Harapan', 'logo_BNI.jpeg'),
(3, 'Bank BCA', 2019476511, 'Rumah Harapan', 'logo_BCA.jpeg'),
(4, 'Bank Mandiri', 2106152477, 'Rumah Harapan', 'logo_MANDIRI.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(128) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `tgl_posting` date NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul_berita`, `deskripsi`, `penulis`, `tgl_posting`, `image`) VALUES
(5, 'Gaza Palestina', 'Hanya bisa mengirimkan Doa.', 'Semangka', '2024-06-01', 'img1717663568.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_transaksi` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_donasi` char(7) NOT NULL,
  `jumlah_donasi` varchar(128) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` char(7) NOT NULL,
  `judul_donasi` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `dana_dibutuhkan` int(11) NOT NULL,
  `dana_terkumpul` int(11) NOT NULL,
  `status` enum('Belum','Terkumpul') NOT NULL DEFAULT 'Belum',
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `judul_donasi`, `id_kategori`, `alamat`, `deskripsi`, `dana_dibutuhkan`, `dana_terkumpul`, `status`, `image`) VALUES
('AJH0809', 'Anwar Anak Yatim Juara Hafidz Quran Jawa Barat', 8, 'Desa Greged, Kecamatan Greged, Kabupaten Cirebon, Jawa Barat', 'Seorang Anak Yatim dari Kecamatan Greged Cirebon menjuarai Lomba Hafidz Quran tingkat Jawa Barat di Bandung.', 500000, 0, 'Belum', 'yatim_anwar.jpeg'),
('ASK0607', 'Pak Abdul Yang Mengalami Katarak', 6, 'Jl.Soekarno No.2, Kelurahan Ciasem, Kabupaten Subang, Jawa Barat', 'Bapak Abdul yang hidup seorang diri, harus berjuang hidup dengan kondisi matanya yang mengalami katarak sejak lahir.', 1000000, 0, 'Belum', 'sakit_katarak.jpeg'),
('AYC0708', 'Membangun Kamar Mandi di Asrama Yatim Ciomas', 7, 'Jl.Ciomas Permai Ciapus, Kecamatan Ciomas, Kabupaten Bogor, Jawa Barat', 'Salah satu asrama di Ciomas Bogor belum memiliki jumlah kamar mandi yang cukup sehingga penghuni asrama harus mengantri bila hendak ke kamar mandi.', 2000000, 0, 'Belum', 'asrama_ciomas.jpeg'),
('BSL0304', 'Berbagi Sembako Lansia Sekitar', 3, 'Jl. Singaperbangsa No.13 Karawang Kulon , Kabupaten Karawang, Jawa Barat', 'Bagi-bagi Sembako pada Lansia yang tinggal disekitaran Yayasan Rumah Harapan.', 500000, 0, 'Belum', 'lansia.jpg'),
('HBK0405', 'Bantu Bangun Sekolah TK Harapan Bunda Karawang', 4, 'Jl. Sadewa No.13, Kelurahan Sukaluyu, Kecamatan Telukjambe Timur, Kabupaten Karawang', 'Warga Sukaluyu membangun sekolah untuk anak usia dini agar memiliki sekolah yang dekat dari rumah mereka.', 2500000, 0, 'Belum', 'membangun_tk.jpg'),
('MAH0506', 'Pembangunan Masjid Al-Hidayyah', 5, 'Dusun Margamukti, Desa Rambatan, Kecamatan Ciniru, Kabupaten Kuningan, Jawa Barat', 'Warga Kampung di Desa Rambatan Kabupaten Kuningan sedang merenovasi masjid agar lebih luas karena banyaknya jamaah shalat hari raya yang tidak tertampung.', 3000000, 0, 'Belum', 'masjid_alhidayah.jpeg'),
('PBB0202', 'Peduli Banjir Bandang Bandung', 2, 'Waduk, Kabupaten Bandung Barat, Jawa Barat', 'Hujan deras yang mengguyur wilayah selatan Kabupaten Bandung Barat (KBB), Jawa Barat mengakibatkan banjir bandang di dua kecamatan pada Minggu (24/3/2024) malam. Banjir yang datang secara tiba-tiba itu menerjang dan merusak permukiman.', 4000000, 0, 'Belum', 'banjir_bandung.jpg'),
('PGS0201', 'Peduli Gempa Sukabumi', 2, 'Jl. Pemuda Gg. Hikmat 2 No.30, RT.2/RW.2, Citamiang, Kota Sukabumi, Jawa Barat', 'Gempa Bumi dangkal akibat aktivitas sesar aktif terjadi di sukabumi, mengakibatkan beberapa ruas jalan dan bangunan rumah warga menjadi ambruk.', 5000000, 0, 'Belum', 'gempa_sukabumi.jpg'),
('TLT0203', 'Tanah Longsor Toraja', 2, 'Palangka, Kelurahan Manggau, Kecamatan Makale, Kabupaten Tana Toraja, Sulawesi Selatan', 'Bencana Longsor yang berada di Tanah Toraja yang mengakibatkan 20 warga meninggal dunia.', 2000000, 0, 'Belum', 'longsor_toraja.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul_galeri` varchar(128) NOT NULL,
  `text_1` varchar(256) NOT NULL,
  `text_2` varchar(256) NOT NULL,
  `image_1` varchar(128) NOT NULL,
  `image_2` varchar(128) NOT NULL,
  `image_3` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `judul_galeri`, `text_1`, `text_2`, `image_1`, `image_2`, `image_3`) VALUES
(1, 'Kisah Mak Emin', 'Sahabat, apa masih ingat video Mak Emin 1 bulan yang lalu? Yup betul sekali, mak Emin seorang pedagang makanan yang pendapatannya hanya cukup untuk makan sehari bersama keluarganya itu, kini bisa mewujudkan impiannya.', 'Dalam Program Rumah Bahagia ini, Rumah Harapan memberikan total donasi sebesar Rp. 22.350.000,- berupa Renovasi Rumah (Ganti Atap Rumah, Septic Tank, MCK, Pompa Air Listrik, Plafon Baru, dsb), Perlengkapan Rumah, Perlengkapan Ibadah dan Bantuan Sembako.', 'galeri_makemin.jpg', 'galeri_makemin1.jpg', 'galeri_makemin2.jpg'),
(2, 'Kisah Pilu Warga Gaza', 'Warga Gaza Palestina yang sedang tidur tiba-tiba diserang rudal sebanyak 4 buah. Banyak korban meninggal dan luka serta banyak stok makanan mereka yang ludes.', 'Rumah Harapan memberikan sumbangan senilai 7 Juta Rupiah yang dibelikan berupa sembako dan telah dikirimkan oleh tim tadi pagi. Terimakasih Sobat Rumah Harapan.', 'galeri_palestina.jpg', '', ''),
(3, 'Kisah Arkha', 'Halo sahabat kali ini kita sangat prihatin dengan kondisi Arkha seorang anak berusia 9 bulan yang mengidap penyakit leukimia. Sampai saat ini Arkha masih harus di infus di Rumah Sakit Bayukarta.', 'Terimakasih sahabat harapan, Allhamdulilah dana yang terkumpul sebanyak 5 Juta Rupiah telah kita sumbangkan kepada Arkha... Cepat Sembuh Arkha.', 'galeri_anak.jpg', '', ''),
(4, 'Aku Bisa Sekolah', 'Seorang anak berusia 7 tahun bernama Rohmat harus berjuang demi membeli seragam sekolahnya untuk tahun ajaran baru. Ia banting tulang mengumpulkan botol bekas dan menjual nya pada pengepul barang bekas.', 'Tim Rumah Harapan telah memberikan sumbangan paket sekolah beserta uang tunai senilai 2 Juta Rupiah. Tetap Semangat Rohmat untuk mengejar cita-citanya!', 'galeri_seragam.jpg', '', ''),
(5, 'Pengecekan Kesehatan Warga', 'Rumah Harapan telah memberikan fasilitas pengecekan kesehatan gratis selama 5 hari untuk warga bandung yang tidak mampu untuk berobat ke puskesmas atau klinik.', 'Terimakasih kepada sobat harapan berkat kalian kami jadi sehat!', 'galeri_ceksehat.jpg', '', ''),
(6, 'Berbagi Sembako Korban Longsor', 'Allhamdulilah Sembako sudah dikirimkan kepada para korban longsor di Sukabumi, Jawa Barat. ', 'Terima Kasih Sobat Harapan!', 'galeri_sembako.jpg', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Zakat'),
(2, 'Peduli Bencana'),
(3, 'Bantuan Bahan Pangan'),
(4, 'Sarana dan Prasarana Pendidikan'),
(5, 'Sarana Ibadah'),
(6, 'Bisa Sembuh'),
(7, 'Sarana dan Prasarana Asrama Anak Yatim'),
(8, 'Peduli Anak Yatim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `komentar` varchar(256) NOT NULL,
  `tgl_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `email_user` varchar(128) DEFAULT NULL,
  `id_donasi` char(7) DEFAULT NULL,
  `judul_donasi` varchar(128) NOT NULL,
  `jumlah_donasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_donasi` char(7) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `jumlah_donasi` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `status` enum('Gagal','Berhasil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','Lainnya') NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `nama`, `email`, `alamat`, `jenis_kelamin`, `nohp`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(1, '-', 'Admin Hope', 'admin01@gmail.com', 'Karawang', 'Laki-Laki', '082119032854', 'hope.jpg', '$2y$10$80CFMcCIJpCLJ4Tr29EA0.6UMTqgAQ7YqtnBt2YZyqrYFSl1B4oJy', 1, 1, 1717419559),
(2, '3215010708010003', 'Galih Rakasiwi', 'galih.rksw93@gmail.com', 'Karawang', 'Laki-Laki', '082119032854', 'galih.png', '$2y$10$dyLJm2tSlE7tNlvptcnNWunpJXqmoUW.Up2F265.uvUR0Q31e1bhC', 2, 1, 1717757563),
(3, '-', 'Andini Salma', 'andini1523@gmail.com', 'Karawang', 'Perempuan', '-', 'kucing.jpg', '$2y$10$LWAWzpMtI8opn6MvP/XGie6KDz8OV6WSIHX6RPNRSWtB1cRRF7nA2', 2, 1, 1717419878),
(4, '-', 'Rifqi Fachrul Rozi', 'rifqifr.mm2@gmail.com', 'Kuningan', 'Laki-Laki', '-', 'domba.jpg', '$2y$10$JlLtGmVJAnzCxa5PVsEb0eQNxZhNZlIb/TE0oV55Iu81bm2q7B0li', 2, 1, 1717419968),
(5, '-', 'Ayu Permatasari', '1892ayupermatasari@gmail.com', 'Subang', 'Perempuan', '-', 'parrot.jpg', '$2y$10$zb7o4qZN2IhESc1mfXDlkOj50JvTqvYtL/wdnvrk3nBOhnJlM5dY6', 2, 1, 1717420155),
(6, '-', 'Ahmad Supriyanto', 'supriyantoahmad420@gmail.com', 'Karawang', 'Laki-Laki', '-', 'macan.jpg', '$2y$10$8iXifRt29zx1DI35nRGgReDB5hw4tZqsVdn3WpitqFmD6YS2jbsFi', 2, 1, 1717420309),
(7, '-', 'Kitsune', 'kitsune@gmail.com', 'Karawang', 'Laki-Laki', '-', 'rubah.jpg', '$2y$10$6COUBVRmlbS7tR0S8qJ75.NXHkxCnatt0VCVQDQgSnBITuAhfAeVW', 2, 1, 1717510625);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
