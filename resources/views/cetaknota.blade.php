<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cetak</title>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		.tablebarang table,
		.tablebarang th,
		.tablebarang td {
			border: 1px solid black;
		}

		.tablebarang th,
		.tablebarang td {
			padding: 5px;
			text-align: left;
		}
	</style>
	<style>
		.custom-table,
		.custom-table th,
		.custom-table td {
			border: 1px solid black;
		}
	</style>
	<style>
		.ttdtable {
			width: 100%;
			/* Tabel memenuhi lebar halaman */
			border-collapse: collapse;
			/* Hilangkan jarak antar sel */
			border-left: 0.01em solid #ccc;
			border-right: 0;
			border-top: 0.01em solid #ccc;
			border-bottom: 0;
			border-collapse: collapse;
		}

		.ttdtd {
			text-align: center;
			/* Teks di tengah setiap kolom */
			vertical-align: bottom;
			/* Teks di bagian bawah sel */
			padding: 20px;
			/* Jarak antara teks dan garis bawah */
		}

		.line {
			margin-top: 10px;
			border-top: 1px solid black;
			/* Garis bawah */
			width: 80%;
			/* Panjang garis (80% dari lebar kolom) */
			margin-left: auto;
			/* Pusatkan garis */
			margin-right: auto;
		}
	</style>

</head>

<body>

	<h3>Nota Barang - {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}</h3>
	<table class="tablebarang">
		<thead class="thead-light">
			<tr>
				<th>No.</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
				<th>Ukuran</th>
				<th>Foto</th>
				<th>Harga</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>1</td>
				<td>{{ $penjualan->barang->nama }}</td>
				<td>{{ $penjualan->jumlah_barang }}</td>
				<td>{{ $penjualan->barang->ukuran }}</td>
				<td><img class="img-fluid" src="{{ public_path('/storage/fotobarang/' . $penjualan->barang->foto) }}"
						alt="nama gambar" style="max-width: 100px"></td>
				<td>Rp {{ number_format($penjualan->harga, 0, ',', '.') }}</td>
			</tr>
			<tr>
				<td colspan="5" style="text-align: right;">Total Harga</td>
				<td><b>Rp {{ number_format($penjualan->harga, 0, ',', '.') }}</b></td>
			</tr>

		</tbody>
	</table>
	<br /><br /><br /><br />
	<table>
		<tr align="center">
			<td>
				<b>Tanda Terima</b>
				<br /><br /><br /><br /><br />
				<div class="line"></div>
			</td>
			<td>
				<b>Hormat Kami</b><br /><br /><br /><br /><br />
				<div class="line"></div>
			</td>
		</tr>
	</table>

</body>

</html>
