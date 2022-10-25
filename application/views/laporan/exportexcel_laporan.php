<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Laporan Penjualan periode '$dari' - '$sampai'.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>

    <style>
        @media all {
            body {
                font-family: Tahoma !important;
            }

            hr {
                height: 5px;
                color: black !important;
                background-color: black !important;
            }

            table,
            th,
            td {
                border-collapse: collapse;
                border: 2px solid black;
                padding: 5px;
            }
        }
    </style>
</head>

<body>
    <div>
        <small class="profile">
            <b>BENGKEL DISDIK.</b>
            <br>
            Jl. Ahmad Yani No.239, Pasir Kaliki, Kec. Cicendo, <br>
            Kota Bandung, Jawa Barat 40171. <br>
            Phone: 022-7106568
            Email: disdik@bandung.go.id
        </small>
    </div>
    <hr>
    <h4 align="center">Laporan Penjualan
        <br>
        <small> PERIODE <?= $dari ?> s/d <?= $sampai ?></small>
    </h4>


    <table border="1" width="100%">
        <tr>
            <th>No.</th>
            <th>No. Faktur</th>
            <th>Tgl. Transaksi</th>
            <th>Kode Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Transaksi</th>
            <th>Kasir</th>
            <th>Total Penjualan</th>
        </tr>
        <?php
        $totalpenjualan = 0;
        $no = 0;
        foreach ($laporanPenjualan as $row) {
            $no++;
            $totalpenjualan += $row->totalpenjualan;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row->no_faktur ?></td>
                <td><?= $row->tgl_transaksi ?></td>
                <td><?= $row->kode_pelanggan ?></td>
                <td><?= $row->nama_pelanggan ?></td>
                <td><?= $row->jenis_transaksi ?></td>
                <td><?= $row->nama ?></td>
                <td align="right">Rp. <?= number_format($row->totalpenjualan, '0', '', '.') ?></td>

            </tr>
        <?php } ?>
        <tr>
            <th colspan="7">TOTAL</th>
            <th align="right">Rp. <?= number_format($totalpenjualan, '0', '', '.') ?></th>

        </tr>
        <tr>
            <td colspan="8" align="right">
                <i>
                    <b><?= ucwords(terbilang($totalpenjualan)) . ' Rupiah'  ?></b>

                </i>
            </td>
        </tr>
    </table>
</body>

</html>