<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("expires: 0");
?>

<h3>
    <center>Laporan Data User Yayasan Rumah Harapan</center>
</h3>
<br>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>No.HP</th>
            <th>Mendaftar Sejak</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $genap = "#CCCCCC";
        $ganjil = "#FFFFFF";
        $no = 1;
        foreach ($anggota as $a) {
            if ($no % 2 == 0) {
                $warna = $genap;
            } else {
                $warna = $ganjil;
            }
            echo "<tr bgcolor = '$warna'>";
        ?>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $a['nik']; ?></td>
            <td><?= $a['nama']; ?></td>
            <td><?= $a['jenis_kelamin']; ?></td>
            <td><?= $a['email']; ?></td>
            <td><?= $a['nohp']; ?></td>
            <td><?= date('d F Y', $a['tanggal_input']); ?></td>
            <td>
                <picture>
                    <source srcset="" type="image/svg+xml">
                    <img src="<?= base_url('assets/img/profile/') . $a['image']; ?>" class="img-fluid img-thumbnail" alt="..." style="width:40px;height:50px;">
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