<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faktur Penjualan</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/dist/css/adminlte.min.css?v=3.2.0') ?>">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">

    <style>
        body {
            padding: 25px;
        }

        @page {
            size: A4;
            padding: 5px;
        }
    </style>
    <script nonce="f3e00c98-a1ab-48b5-bb83-0792b7e155ee">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {};
                a.zarazData.executed = [];
                a.zaraz = {
                    deferred: [],
                    listeners: []
                };
                a.zaraz.q = [];
                a.zaraz._f = function(e) {
                    return function() {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: t
                        })
                    }
                };
                for (const e of ["track", "set", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.zaraz.init = () => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);
                    a.zarazData.x = Math.random();
                    a.zarazData.w = a.screen.width;
                    a.zarazData.h = a.screen.height;
                    a.zarazData.j = a.innerHeight;
                    a.zarazData.e = a.innerWidth;
                    a.zarazData.l = a.location.href;
                    a.zarazData.r = e.referrer;
                    a.zarazData.k = a.screen.colorDepth;
                    a.zarazData.n = e.characterSet;
                    a.zarazData.o = (new Date).getTimezoneOffset();
                    a.zarazData.q = [];
                    for (; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0;
                    for (const e of [localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a.startsWith("_zaraz_"))).forEach((t => {
                        try {
                            a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                        } catch {
                            a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                        }
                    }));
                    z.referrerPolicy = "origin";
                    z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));
                    t.parentNode.insertBefore(z, t)
                };
                ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, 0, "script");
        })(window, document);
    </script>
</head>

<body>
    <div class="wrapper">
        <section class="invoice">

            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fa fa-wrench"></i> Bengkel Disdik.
                        <small class="float-right"> <b>FAKTUR PENJUALAN</b> </small>
                    </h2>
                </div>

            </div>

            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Bengkel Disdik.</strong><br>
                        Jl. Ahmad Yani No.239, Pasir Kaliki, Kec. Cicendo, <br>
                        Kota Bandung, Jawa Barat 40171.<br>
                        Phone: 022-7106568<br>
                        Email: disdik@bandung.go.id</a>
                    </address>
                </div>

                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?= $penjualan['kode_pelanggan'] . '/' . $penjualan['nama_pelanggan'] ?></strong><br>
                        <?= $penjualan['alamat_pelanggan'] ?><br>
                        Phone: <?= $penjualan['notelp_pelanggan'] ?>
                    </address>
                </div>

                <div class="col-sm-4 invoice-col">
                    <b>Detail Faktur</b><br>
                    <br>
                    <b>Nomor Faktur:</b> <?= $penjualan['no_faktur'] ?><br>
                    <b>Tanggal Transaksi:</b> <?= $penjualan['tgl_transaksi'] ?><br>
                    <b>Kasir:</b> <?= $penjualan['id_user'] . '/' . $penjualan['kasir'] ?>
                </div>

            </div>


            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>TIPE BARANG</th>
                                <th>MERK</th>
                                <th>HARGA</th>
                                <th>QTY</th>
                                <th>SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($detail as $row) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no ?> </td>
                                    <td><?= $row->kode_barang ?> </td>
                                    <td><?= $row->nama_barang ?> </td>
                                    <td><?= $row->tipe_barang ?> </td>
                                    <td><?= $row->merk ?> </td>
                                    <td><?= $row->harga ?> </td>
                                    <td><?= $row->qty ?> </td>
                                    <td><?= $row->subtotal ?> </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="row">

                <div class="col-6">
                    <br><br><br><br>
                    <table class="ml-3">
                        <thead>
                            <tr>
                                <th style="width: 60%;"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="ml-3">Hormat Kami <br> <br> <br> <br> <br> ____________</p>
                                </td>
                                <td>
                                    <p class=""> Customer <br> <br> <br> <br> <br> _________________</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-6">
                    <p class="lead">Jumlah Yang Harus Dibayar </p>
                    <div class="table-responsive ">
                        <table class="table">
                            <tr>
                                <th style="width:50%">HARGA JUAL :</th>
                                <td><?= number_format($row->totalpenjualan, '0', '', '.',) ?></td>
                            </tr>
                            <tr>
                                <th>TOTAL :</th>
                                <td><?= number_format($row->totalpenjualan, '0', '', '.') ?></td>
                            </tr>
                            <tr>
                                <th>TUNAI :</th>
                                <td><?= number_format($penjualan['tunai'], '0', '', '.') ?></td>
                            </tr>
                            <tr>
                                <th>KEMBALI :</th>
                                <td><?= number_format($row->kembali, '0', '', '.') ?></td>
                            </tr>
                            <tr>
                                <!-- <th></th> -->
                                <td><button type="button" class="btn btn-primary print"> <i class="fa fa-print"></i> Print</button></td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>

        </section>

    </div>


    <?php $this->load->view("_partials/v_js.php") ?>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        $(function() {
            $(".print").click(function() {
                $(".print").hide();
                window.print();
                $(".print").show();
            });
        });
        // window.addEventListener("load", window.print());
    </script>
</body>

</html>