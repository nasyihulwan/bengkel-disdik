<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/v_head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('dist/img/ntrd1.png') ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

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
                            <h1 class="m-0"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <?php $this->load->view("_partials/v_breadcrumb.php") ?>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <div class="card ml-4" style="max-width: 720px;">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <?php foreach ($tampilCompany as $row) { ?>
                            <img src="<?= base_url('dist/img/') . $row->image ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body">
                            <h1><?= $row->nama ?> </h1>
                            <p class="card-text">
                                <br>
                                <b>Email :</b> <?= $row->email ?> <br>
                                <b>Nomor Contact :</b> <?= $row->no_telp ?> <br>
                                <b>Alamat :</b> <?= $row->alamat ?>
                            </p>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
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

    <?php $this->load->view("_partials/v_js.php") ?>
    <script>
        $("#dataTable").DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "order": [],
            "info": false,
            "language": {
                search: "<span style='margin-right: 26px'>Cari :</span>"
            },
            "lengthChange": false,
            "ajax": {
                "url": "<?= base_url("transaction/json_service"); ?>"
            }
        });

        $('#nav-services-tab').on("click", function() {
            jQuery("#dataTable").DataTable().ajax.url("<?= base_url("transaction/json_service"); ?>").load();
        });
        $('#nav-sparepart-tab').on("click", function() {
            jQuery("#dataTable").DataTable().ajax.url("<?= base_url("transaction/json_sparepart"); ?>").load();
        });

        var ServiceCart = [];
        var SparepartCart = [];
        var total = 0;
        var type = "";

        function addServiceCart(data) {
            var before = ServiceCart;
            var qty = 1;

            if (before[data.id]) {
                qty = before[data.id]["qty"] + 1;
            } else {
                before[data.id] = data;
            }

            before[data.id]["qty"] = qty;
            ServiceCart = before;

            refreshServiceCart(ServiceCart, SparepartCart);
        }

        function addSparepartCart(data) {
            var before = SparepartCart;
            var qty = 1;

            if (before[data.id]) {
                qty = before[data.id]["qty"] + 1;
            }

            if (qty <= data.stock) {
                if (!before[data.id]) {
                    before[data.id] = data;
                }
                before[data.id]["qty"] = qty;
            } else {
                Swal.fire(
                    'Gagal',
                    'Stok tidak cukup',
                    'error'
                )
            }

            SparepartCart = before;

            refreshServiceCart(ServiceCart, SparepartCart);
        }

        function refreshServiceCart(data1, data2) {
            var html1 = "";
            var html2 = "";
            var countTotal = 0;
            data1 = data1.filter(function(el) {
                return el != null;
            });
            data2 = data2.filter(function(el) {
                return el != null;
            });

            data1.forEach(function(item, index) {
                html1 += '<tr><td>' + item.name + '</td><td >Rp ' + item.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + '</td><td class="text-center"><button type="button" class="btn btn-sm btn-danger" onclick="deleteServiceCart(' + item.id + ')"><i class="fa fa-times"></i></button></td></tr>';

                countTotal = (countTotal + (item.price * item.qty));
            })
            data2.forEach(function(item, index) {
                html2 += '<tr><td>' + item.name + '</td><td >Rp ' + item.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + '</td><td class="text-center"><input type="number" style="width:52px" value="' + item.qty + '" class="change-qty" data-id="' + item.id + '" data-stock="' + item.stock + '"/></td></tr>';
                countTotal = (countTotal + (item.price * item.qty));
                console.log(item.stock);
            })

            total = countTotal;

            if (data1.length) {
                jQuery("#serviceCartContainer").attr("style", "display:block");
                jQuery("#customerContainer").attr("style", "display:block");
                type = "service";
            } else {
                jQuery("#serviceCartContainer").attr("style", "display:none");
                jQuery("#customerContainer").attr("style", "display:none");
                type = "sparepart";
            }
            if (data2.length) {
                jQuery("#sparepartCartContainer").attr("style", "display:block");
            } else {
                jQuery("#sparepartCartContainer").attr("style", "display:none");
            }

            jQuery("#serviceCart tbody").html(html1);
            jQuery("#sparepartCart tbody").html(html2);
            jQuery('.total').html("Rp " + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
        }

        function deleteServiceCart(id) {
            delete ServiceCart[id];

            refreshServiceCart(ServiceCart, SparepartCart);
        }

        $("body").on('change', '.change-qty', function() {
            var before = SparepartCart;
            var qty = jQuery(this).val();
            var id = jQuery(this).attr("data-id");
            var stock = parseInt(jQuery(this).attr("data-stock"));

            if (qty <= stock) {
                before[id]["qty"] = qty;
            } else {
                Swal.fire(
                    'Gagal',
                    'Stok tidak cukup',
                    'error'
                )
            }
            if (qty <= 0) {
                delete before[id];
            }
            SparepartCart = before;

            refreshServiceCart(ServiceCart, SparepartCart);
        })

        function reset() {
            jQuery("#customerContainer input").val("");
            ServiceCart = [];
            SparepartCart = [];

            jQuery("#dataTable").DataTable().ajax.reload(null, true);

            refreshServiceCart(ServiceCart, SparepartCart);
        }

        function saveModal() {
            if (!total) {
                Swal.fire(
                    'Gagal',
                    'Keranjang kosong',
                    'error'
                )
            } else {
                jQuery("#purchaseModal").modal("toggle");
            }
        }

        $("#money").on("keyup", function() {
            var value = jQuery(this);

            var change = parseInt(value.val()) - total;

            if (change < 0) {
                change = "Belum cukup";
                jQuery(".btn-save-confirm").prop("disabled", true);
            } else {
                jQuery(".btn-save-confirm").prop("disabled", false);
            }

            jQuery("#change").val(change.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
        })

        $(".btn-save-confirm").on("click", function() {

            if (type == "sparepart") {
                var url = "<?= base_url("transaction/insert/sparepart"); ?>";
            } else {
                var url = "<?= base_url("transaction/insert/service"); ?>";
            }

            var itemSparepart = SparepartCart.filter(function(el) {
                return el != null;
            });

            var form = {};
            form["total"] = total;
            form["sparepart"] = itemSparepart;

            if (type == "service") {
                form["customer"] = jQuery("input[name=customer]").val();
                form["plat"] = jQuery("input[name=plat]").val();
                form["service"] = ServiceCart.filter(function(el) {
                    return el != null;
                });
            }

            form = JSON.stringify(form);

            jQuery.ajax({
                url: url,
                method: "POST",
                data: form,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status) {
                        reset();
                        jQuery("#purchaseModal").modal("toggle");
                        jQuery("#change").val("");
                        jQuery("#money").val("");
                        if (data.type == "sparepart") {
                            Swal.fire(
                                "Berhasil",
                                data.msg,
                                "success"
                            );
                        } else {
                            Swal.fire({
                                title: 'Berhasil',
                                text: data.msg,
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                cancelButtonText: 'Lanjutkan',
                                confirmButtonText: 'Cetak Invoice'
                            }).then((result) => {
                                location.href = "<?= base_url("service_sales/print"); ?>/" + data.id;
                            })
                        }
                    }
                }
            });
        })
    </script>
</body>

</html>