<?php $no = 0;
$totalTagihan = 0;
foreach ($pembelianTemp as $row) {
    $totalTagihan = $totalTagihan + $row->total_tagihan;
    $no++;
?>
    <tr>
        <td><?= $no ?></td>
        <td><?= $row->kode_barang_temp ?></td>
        <td><?= $row->nama_barang ?></td>
        <td><?= $row->jenis_barang ?></td>
        <td><?= $row->jenis_kendaraan ?></td>
        <td align="right"><?= number_format($row->harga, '0', '', '.')  ?></td>
        <td><?= $row->qty ?></td>
        <td align="right"><?= number_format($row->total_tagihan, '0', '', '.')  ?></td>
        <td>
            <a href="#" class="btn btn-danger btn-sm hapus" data-kodeBarang="<?= $row->kode_barang_temp ?>" data-idUser="<?= $row->id_user ?>"> <i class="fa fa-trash"></i> Hapus</a>
        </td>
    </tr>
<?php }
?>
<tr>
    <th colspan="7">GRAND TOTAL</th>
    <th style="text-align: right;">
        <p id="grandTotal"><?= number_format($totalTagihan, '0', '', '.');  ?></p>
        <input type="hidden" id="valGrandTotal" value="<?= $totalTagihan ?>">
    </th>
    <th></th>
</tr>

<script>
    $(function() {
        function loadGrandTotal() {
            let pembelianGrandTotal = $("#grandTotal").text();
            $("#totalTagihanPembelian").text(pembelianGrandTotal);
        }
        loadGrandTotal();

        function loadDataTransaksi() {
            var idUser = $("#id_user").val();
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>penjualan/transaksi/getDataPembelianTemp',
                data: {
                    id_user: idUser
                },
                cache: false,
                success: function(respond) {
                    $("#loadDataPembelian").html(respond);
                }
            });
        };

        $(".hapus").click(function() {
            var kodeBarang = $(this).attr("data-kodeBarang");
            var idUser = $(this).attr("data-idUser");
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>penjualan/transaksi/hapusPembelianTemp',
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