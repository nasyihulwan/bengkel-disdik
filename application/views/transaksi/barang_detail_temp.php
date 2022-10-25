<?php $no = 0;
$totalPenjBarang = 0;
foreach ($barangTemp as $row) {
    $totalPenjBarang = $totalPenjBarang + $row->total_hargaBarang;
    $no++;
?>
    <tr>
        <td><?= $no ?></td>
        <input type="hidden" value="<?= $row->kode_barang ?>" name="kode_barang">
        <td><?= $row->kode_barang ?></td>
        <td><?= $row->nama_barang ?></td>
        <td><?= $row->tipe ?></td>
        <td><?= $row->jenis_kendaraan ?></td>
        <td align="right"><?= number_format($row->harga_jual, '0', '', '.')  ?></td>
        <td><?= $row->qty ?></td>
        <td align="right"><?= number_format($row->total_hargaBarang, '0', '', '.')  ?></td>
        <td>
            <a href="#" class="btn btn-danger btn-sm hapus" data-kodeBarang="<?= $row->kode_barang ?>" data-idUser="<?= $row->id_user ?>"> <i class="fa fa-trash"></i> Hapus</a>
        </td>
    </tr>

<?php }
?>
<tr>
    <th colspan="7">GRAND TOTAL</th>
    <th style="text-align: right;">
        <p id="grandTotal"><?= number_format($totalPenjBarang, '0', '', '.');  ?></p>
        <input type="hidden" id="valGrandTotal" value="<?= $totalPenjBarang ?>">
    </th>
    <th></th>
</tr>

<script>
    $(function() {
        function loadGrandTotal() {
            let barangGrandTotal = $("#grandTotal").text();
            $("#totalPenjualanBarang").text(barangGrandTotal);
        }
        loadGrandTotal();

        function loadDataTransaksi() {
            var idUser = $("#id_user").val();
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>penjualan/transaksi/getDataBarangTemp',
                data: {
                    id_user: idUser
                },
                cache: false,
                success: function(respond) {
                    $("#loadDataBarang").html(respond);
                }
            });
        };


        $(".hapus").click(function() {
            var kodeBarang = $(this).attr("data-kodeBarang");
            var idUser = $(this).attr("data-idUser");
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>penjualan/transaksi/hapusBarangTemp',
                data: {
                    kode_barang: kodeBarang,
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