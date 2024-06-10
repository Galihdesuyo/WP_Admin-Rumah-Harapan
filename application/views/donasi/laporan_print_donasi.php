<!DOCTYPE html>
<html>

<head>
    <title>Laporan Program Donasi</title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>Laporan Program Donasi Yayasan Rumah Harapan</center>
    </h3>
    <br />
    <table class="table-data">
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
            $genap = "#CCCCCC";
            $ganjil = "#FFFFFF";
            $no = 1;
            foreach ($donasi as $d) {
                if ($no % 2 == 0) {
                    $warna = $genap;
                } else {
                    $warna = $ganjil;
                }
                echo "<tr bgcolor = '$warna'>";
            ?>
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
                        <img src="<?= base_url('assets/img/upload/') . $d['image']; ?>" class="img-fluid img-thumbnail" alt="Gambar Donasi" style="width: 100px; height: 100px;">
                    </picture>
                </td>
                </tr>
            <?php } ?>
        </tbody>
        <?php
        $tglcetak = date('Y-m-d');
        echo "<br>";
        echo "<div align='right'> Tanggal Cetak : $tglcetak</div>";
        ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>