<?php $no = 0;
$totalPenjService = 0;
foreach ($serviceTemp as $service) {
    $totalPenjService = $totalPenjService + $service->harga;
    $no++;
?>
    <tr>
        <td><?= $no ?></td>
        <td><?= $service->kode_service ?></td>
        <td><?= $service->nama_service ?></td>
        <td><?= $service->jenis_kendaraan ?></td>
        <td><?= $service->tipe_kendaraan ?></td>
        <td align="right"><?= number_format($service->harga, '0', '', '.')  ?></td>
        <td><?= $service->qty ?></td>
        <td align="right"><?= number_format($service->harga, '0', '', '.')  ?></td>
        <td>
            <a href="#" class="btn btn-danger btn-sm hapus" data-kodeService="<?= $service->kode_service ?>" data-idUser="<?= $service->id_user ?>"> <i class="fa fa-trash"></i> Hapus</a>
        </td>
    </tr>
<?php } ?>
<tr>
    <th colspan="7">GRAND TOTAL</th>
    <th style="text-align: right;">
        <p id="grandTotal"><?= number_format($totalPenjService, '0', '', '.');  ?></p>
        <input type="hidden" id="valGrandTotal" value="<?= $totalPenjService ?>">
    </th>
    <th></th>
</tr>

<script>
    $(function() {
        function loadGrandTotal() {
            let serviceGrandTotal = $("#grandTotal").text();
            $("#totalPenjualanService").text(serviceGrandTotal);
        }
        loadGrandTotal();

        function loadDataTransaksi() {
            var idUser = $("#id_user").val();
            loadGrandTotal();
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>penjualan/transaksi/getDataServiceTemp',
                data: {
                    id_user: idUser
                },
                cache: false,
                success: function(respond) {
                    $("#loadDataService").html(respond);
                }
            });
        };



        $(".hapus").click(function() {
            var kodeService = $(this).attr("data-kodeService");
            var idUser = $(this).attr("data-idUser");
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>penjualan/transaksi/hapusServiceTemp',
                data: {
                    kode_service: kodeService,
                    id_user: idUser
                },
                cache: false,
                success: function(respond) {
                    if (respond == 1) {
                        Swal.fire(
                            'Success!',
                            'Data berhasil dihapus!',
                            'success'
                        );
                        loadDataTransaksi();
                    }

                }
            });
        });
    });
</script>