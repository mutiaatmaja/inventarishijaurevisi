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

	<h3>Laporan Stok Barang</h3>
	<table class="table-striped table-bordered table">
		<thead class="thead-light">
			<tr>
				<th>No.</th>
				<th>Nama Barang</th>
				<th>Stok</th>
				<th>Ukuran</th>
				<th>Foto</th>
				<th>Dipebarui Tanggal</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($barang as $data)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $data->nama }}</td>
					<td>{{ $data->stok }}</td>
					<td>{{ $data->ukuran }}</td>
					<td>
						@if ($data->foto == null)
							<img class="img-fluid" style="width: 100px" src="{{ public_path('nofoto.png') }}" alt="nama gambar" />
						@else
							<img class="img-fluid" src="{{ public_path('/storage/fotobarang/' . $data->foto) }}" alt="nama gambar"
								style="max-width: 100px">
						@endif
					</td>
					<td>{{ \Carbon\Carbon::parse($data->updated_at)->locale('id')->isoFormat('D MMMM YYYY, HH:mm') }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

</body>

</html>
