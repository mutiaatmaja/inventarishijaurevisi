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

		table,
		th,
		td {
			border: 1px solid black;
		}

		th,
		td {
			padding: 5px;
			text-align: left;
		}
	</style>

</head>

<body>
	@if ($jenisLaporan == 'barangmasuk')
		<h3>Laporan Barang Masuk</h3>
		<table class="table-striped table-bordered table">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Ukuran</th>
					<th>Foto</th>
					<th>Tanggal Masuk</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($barangmasuk as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->barang->nama }}</td>
						<td>{{ $data->jumlah_barang }}</td>
						<td>{{ $data->barang->ukuran }}</td>
						<td><img class="img-fluid" src="{{ public_path('/storage/fotobarang/' . $data->barang->foto) }}" alt="nama gambar"
								style="max-width: 100px"></td>
						<td>{{ $data->tanggal_masuk }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
	@if ($jenisLaporan == 'barangkeluar')
		<h3>Laporan Barang keluar</h3>
		<table class="table-striped table-bordered table">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Ukuran</th>
					<th>Foto</th>
					<th>Tanggal keluar</th>

				</tr>
			</thead>
			<tbody>
				@foreach ($barangkeluar as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->barang->nama }}</td>
						<td>{{ $data->jumlah_barang }}</td>
						<td>{{ $data->barang->ukuran }}</td>
						<td>
							<img class="img-fluid" src="{{ public_path('/storage/fotobarang/' . $data->barang->foto) }}" alt="nama gambar"
								style="max-width: 100px">
						</td>
						<td>{{ $data->tanggal_keluar }}</td>

					</tr>
				@endforeach

			</tbody>
		</table>
	@endif
	@if ($jenisLaporan == 'penjualan')
		<h3>Laporan Penjualan</h3>
		<table class="table-striped table-bordered table">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Ukuran</th>
					<th>Foto</th>
					<th>Tanggal</th>
					<th>Harga</th>

				</tr>
			</thead>
			<tbody>
				@foreach ($penjualan as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->barang->nama }}</td>
						<td>{{ $data->jumlah_barang }}</td>
						<td>{{ $data->barang->ukuran }}</td>
						<td>
							<img class="img-fluid" src="{{ public_path('/storage/fotobarang/' . $data->barang->foto) }}" alt="nama gambar"
								style="max-width: 100px">
						</td>
						<td>{{ $data->tanggal }}</td>
						<td>{{ $data->harga }}</td>

					</tr>
				@endforeach

			</tbody>
		</table>
	@endif
	@if ($jenisLaporan == 'pembelian')
		<h3>Laporan Pembelian</h3>
		<table class="table-striped table-bordered table">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Ukuran</th>
					<th>Foto</th>
					<th>Tanggal</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pembelian as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->barang->nama }}</td>
						<td>{{ $data->jumlah_barang }}</td>
						<td>{{ $data->barang->ukuran }}</td>
						<td>
							<img class="img-fluid" src="{{ public_path('/storage/fotobarang/' . $data->barang->foto) }}" alt="nama gambar"
								style="max-width: 100px">
						</td>
						<td>{{ $data->tanggal }}</td>
						<td>{{ $data->harga }}</td>

					</tr>
				@endforeach

			</tbody>
		</table>
	@endif
</body>

</html>
