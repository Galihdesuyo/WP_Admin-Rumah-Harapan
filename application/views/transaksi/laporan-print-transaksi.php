<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Transaksi</title>
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
            padding: 10px;
        }

        .table-data th {
            background-color: grey;
        }

        h3 {
            font-family: Verdana;
            text-align: center;
        }
    </style>
</head>

<body>
    <h3>Laporan Data Transaksi Donasi Yayasan Rumah Harapan</h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Judul Donasi</th>
                <th>ID Transaksi</th>
                <th>Jumlah Donasi</th>
                <th>Tanggal Transaksi</th>
                <th>Bank</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $genap = "#CCCCCC";
            $ganjil = "#FFFFFF";
            $no = 1;
            foreach ($laporan as $l) {
                if ($no % 2 == 0) {
                    $warna = $genap;
                } else {
                    $warna = $ganjil;
                }
                echo "<tr bgcolor = '$warna'>";
            ?>
                <td scope="row"><?= $no++; ?></td>
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