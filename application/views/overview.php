<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/v_head.php") ?>
    <script nonce="95ddc417-ab9d-4efa-9f33-81d06d771861">
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

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->


        <!-- Navbar -->
        <?php $this->load->view("_partials/v_navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("_partials/v_sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard - <?= implode($profile_role) ?></h1>
                        </div><!-- /.col -->
                        <?php $this->load->view("_partials/v_breadcrumb.php") ?>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <?php if ($this->session->userdata('role_id') == 1) { ?>
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h5>
                                            <b>
                                                <?php
                                                $query = $this->db->get('kendaraan');
                                                echo $query->num_rows();
                                                ?>
                                            </b>
                                        </h5>
                                        <p> <b>DATA <br> KENDARAAN</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-folder"></i>
                                    </div>
                                    <a href="<?= site_url('master/kendaraan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5> <b>TRANSAKSI</b> <br> </h5>

                                        <p> <b>TAMBAH <br> DATA</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer tambahTransaksi">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5>
                                            <b>
                                                <?php
                                                $query = $this->db->get('user');
                                                echo $query->num_rows();
                                                ?>
                                            </b>
                                        </h5>

                                        <p> <b> USER <br> (PENGGUNA)</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <a href="<?= site_url('pengaturan/user/list') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h5>
                                            <b>LAPORAN</b>
                                        </h5>
                                        <p> <b>CETAK DATA <br> LAPORAN </b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer cetakLaporan">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h5> <b>
                                                <?php
                                                $query = $this->db->get('barang');
                                                echo $query->num_rows();
                                                ?>
                                            </b> </h5>
                                        <p> <b> DATA <br> BARANG</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <a href="<?= site_url('master/barang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">

                                        <h5> <b><?php
                                                $query = $this->db->get('service');
                                                echo $query->num_rows();
                                                ?></b> </h5>
                                        <p> <b>DATA <br> PAKET SERVICE</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <a href="<?= site_url('master/service') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">

                                        <h5> <b><?php
                                                $query = $this->db->get('pemegang_kendaraan');
                                                echo $query->num_rows();
                                                ?></b> </h5>
                                        <p> <b>PEMEGANG <br> KENDARAAN</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <a href="<?= site_url('master/pemegang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h5><b><?php
                                                $query = $this->db->get('pelanggan');
                                                echo $query->num_rows();
                                                ?></b></h5>
                                        <p> <b>DATA <br> PELANGGAN</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <a href="<?= site_url('master/pelanggan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5><b><?php
                                                $query = $this->db->get('supplier');
                                                echo $query->num_rows();
                                                ?></b></h5>
                                        <p> <b>DATA <br> SUPPLIER</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <a href="<?= site_url('master/supplier') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                        <!-- Main row -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            <?php } else if ($this->session->userdata('role_id') == 2) { ?>
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h5>
                                            <b>
                                                <?php
                                                $query = $this->db->get('kendaraan');
                                                echo $query->num_rows();
                                                ?>
                                            </b>
                                        </h5>
                                        <p> <b>DATA <br> KENDARAAN</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-folder"></i>
                                    </div>
                                    <a href="<?= site_url('master/kendaraan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5> <b>TRANSAKSI</b> <br> </h5>

                                        <p> <b>TAMBAH <br> DATA</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer tambahTransaksi">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h5>
                                            <b>LAPORAN</b>
                                        </h5>
                                        <p> <b>CETAK DATA <br> LAPORAN </b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer cetakLaporan">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5> <b><b><?php
                                                    $query = $this->db->get('barang');
                                                    echo $query->num_rows();
                                                    ?></b></b> </h5>
                                        <p> <b> DATA <br> BARANG</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <a href="<?= site_url('master/barang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">

                                        <h5> <b><?php
                                                $query = $this->db->get('service');
                                                echo $query->num_rows();
                                                ?></b> </h5>
                                        <p> <b>DATA <br> PAKET SERVICE</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <a href="<?= site_url('master/service') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">

                                        <h5> <b><?php
                                                $query = $this->db->get('pemegang_kendaraan');
                                                echo $query->num_rows();
                                                ?></b> </h5>
                                        <p> <b>PEMEGANG <br> KENDARAAN</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <a href="<?= site_url('master/pemegang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h5><b><?php
                                                $query = $this->db->get('pelanggan');
                                                echo $query->num_rows();
                                                ?></b></h5>
                                        <p> <b>DATA <br> CUSTOMER</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <a href="<?= site_url('') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5><b><?php
                                                $query = $this->db->get('supplier');
                                                echo $query->num_rows();
                                                ?></b></h5>
                                        <p> <b>DATA <br> SUPPLIER</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <a href="<?= site_url('master/supplier') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                        <!-- Main row -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            <?php } else if ($this->session->userdata('role_id') == 3) { ?>
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5> <b>TRANSAKSI</b> <br> </h5>

                                        <p> <b>TAMBAH <br> DATA</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer tambahTransaksi">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <!-- small box -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h5>
                                            <b>LAPORAN</b>
                                        </h5>
                                        <p> <b>CETAK DATA <br> LAPORAN </b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer cetakLaporan">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h5> <b><?php
                                                $query = $this->db->get('barang');
                                                echo $query->num_rows();
                                                ?></b> </h5>
                                        <p> <b> DATA <br> BARANG</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <a href="<?= site_url('master/barang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5><b><?php
                                                $query = $this->db->get('supplier');
                                                echo $query->num_rows();
                                                ?></b></h5>
                                        <p> <b>DATA <br> SUPPLIER</b> </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <a href="<?= site_url('master/supplier') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                        <!-- Main row -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            <?php } ?>
            <section class="content">
                <?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) { ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number"><?= $jmlPenjualan ?></span>
                                        <span class="info-box-text">Transaksi Penjualan Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fa fa-location-arrow"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number">
                                            <?php if ($terjual['terjualHariIni'] == 0) { ?>
                                                0
                                            <?php } else { ?>
                                                <?= $terjual['terjualHariIni'] ?>
                                            <?php } ?>
                                        </span>
                                        <span class="info-box-text">Item Terjual Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="fa fa-list"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number"> 0 </span>
                                        <span class="info-box-text">Stok Barang Sedikit / Habis</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="fa fa-usd"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number">Rp. <?= number_format($jmlBayarPenjualan['totalbayar'], '0', '', '.') ?></span>
                                        <span class="info-box-text">Pendapatan Penjualan Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="fa fa-wrench"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number"><?= $jmlService ?></span>
                                        <span class="info-box-text">Transaksi Service Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fa fa-arrow-up"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number"><?php if ($serviceSelesai == 0) { ?>
                                                0
                                            <?php } else { ?>
                                                <a href="<?= site_url() ?>penjualan/transaksi/service_selesai"><?= $serviceSelesai ?></a>
                                            <?php } ?></span>
                                        <span class="info-box-text">Service Selesai Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="fa fa-clock-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number">
                                            <?php if ($servicePending == 0) { ?>
                                                0
                                            <?php } else { ?>
                                                <a href="<?= site_url() ?>penjualan/transaksi/service_pending"><?= $servicePending ?></a>
                                            <?php } ?>
                                        </span>
                                        <span class="info-box-text">Service Pending</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="fa fa-usd"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number">Rp. <?= number_format($jmlBayarService['totalbayar'], '0', '', '.') ?></span>
                                        <span class="info-box-text">Pendapatan Service Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fa fa-usd"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number">Rp. <?= number_format($jmlBayarPenjualan['totalbayar'] + $jmlBayarService['totalbayar'], '0', '', '.') ?></span>
                                        <span class="info-box-text">Total Pendapatan Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="fa fa-usd"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number">Rp. <?= number_format($jmlTagihan['totalpembelian'], '0', '', '.') ?></span>
                                        <span class="info-box-text">Total Pengeluaran Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                            <?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 3) { ?>
                                <section class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-chart-pie mr-1"></i>
                                                Sales
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <?php foreach ($rekapPenjualan as $data) {
                                                    $bulan[] = $data->nama_bulan;
                                                    $totalPenjualan[] =  (float) $data->totalpenjualan;
                                                    $totalService[] = (float) $data->totalt_service;
                                                }
                                                ?>

                                                <canvas hidden id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?php $this->load->view("_partials/v_footer.php") ?>
        <!-- /.footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <?php $this->load->view("_partials/v_js.php") ?>

    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                        label: 'Barang',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: <?php echo json_encode($totalPenjualan); ?>
                    },
                    {
                        label: 'Service',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: <?php echo json_encode($totalService); ?>
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });


            $(".tambahTransaksi").click(function() {
                Swal.fire({
                    title: 'Tambah Transaksi',
                    showCancelButton: true,
                    showDenyButton: true,
                    confirmButtonColor: '#3ea12f',
                    cancelButtonColor: '#d33',
                    denyButtonColor: '#2a6ad1',
                    confirmButtonText: 'Barang',
                    denyButtonText: 'Service'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "<?= site_url(); ?>penjualan/transaksi/barang";
                    } else if (result.isDenied) {
                        location.href = "<?= site_url(); ?>penjualan/transaksi/select_pemegang";
                    }
                })
            });
            $(".cetakLaporan").click(function() {
                Swal.fire({
                    title: 'Cetak Laporan Transaksi ',
                    showCancelButton: true,
                    showDenyButton: true,
                    confirmButtonColor: '#3ea12f',
                    cancelButtonColor: '#d33',
                    denyButtonColor: '#2a6ad1',
                    confirmButtonText: 'Barang',
                    denyButtonText: 'Service'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "<?= site_url(); ?>laporan/penjualan";
                    } else if (result.isDenied) {
                        location.href = "<?= site_url(); ?>laporan/service";
                    }
                })
            });
        });
    </script>
</body>

</html>