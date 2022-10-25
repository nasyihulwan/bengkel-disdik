<!DOCTYPE html>
<html>

<head>
	<title>Bengkel Disdik - Form Order Barang</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="col-lg-6 col-lg-offset-3">
			<h4>Form Order Barang</h4>
			<div class="panel panel-success">
				<div class="panel-heading">
					Checkout Ke WhatsApp
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="name" class="form-control" placeholder="Nama" id="name">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" placeholder="Alamat" id="alamat">
					</div>
					<div class="form-group">
						<label>Nomor Kontak / WhatsApp</label>
						<input type="text" name="phone" class="form-control" placeholder="Nomor Kontak / WhatsApp" id="phone">
					</div>
					<div class="form-group">
						<label>Tulis Barang Yang Ingin Dibeli</label>
						<textarea name="product" id="product" cols="30" rows="10" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Catatan</label>
						<textarea name="description" class="form-control" rows="3" id="description"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-success btn-block send">Pesan via WhatsApp</button>
					</div>
					<div class="col-12">
						<a href="<?= site_url('landing') ?>" class="btn btn-primary btn-block">Kembali</a>
					</div>

					<div id="text-info"></div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).on('click', '.send', function() {
			/* Inputan Formulir */
			var input_name = $("#name").val(),
				input_email = $("#email").val(),
				input_phone = $("#phone").val(),
				input_product = $("#product").val(),
				input_description = $("#description").val();

			/* Pengaturan Whatsapp */
			var walink = 'https://web.whatsapp.com/send',
				phone = '6289604129300',
				text = 'Halo saya ingin memesan ',
				text_yes = 'Pesanan Anda berhasil terkirim.',
				text_no = 'Isilah formulir terlebih dahulu.';

			/* Smartphone Support */
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				var walink = 'whatsapp://send';
			}

			if (input_name != "" && input_phone != "" && input_product != "") {
				/* Whatsapp URL */
				var checkout_whatsapp = walink + '?phone=' + phone + '&text=' + text + '%0A%0A' +
					'*Nama* : ' + input_name + '%0A' +
					'*Alamat Email* : ' + input_email + '%0A' +
					'*Nomor Kontak / Whatsapp* : ' + input_phone + '%0A' +
					'*Produk* : ' + input_product + '%0A' +
					'*Catatan* : ' + input_description + '%0A';

				/* Whatsapp Window Open */
				window.open(checkout_whatsapp, '_blank');
				document.getElementById("text-info").innerHTML = '<div class="alert alert-success">' + text_yes + '</div>';
			} else {
				document.getElementById("text-info").innerHTML = '<div class="alert alert-danger">' + text_no + '</div>';
			}
		});
	</script>
</body>

</html>