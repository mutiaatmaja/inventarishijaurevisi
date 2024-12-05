<h3>Laporan Penjualan</h3>
<table style="border-collapse: collapse; width: 100%">
	<thead>
		<tr>
			<th style="border: 1px solid black; padding: 8px">No.</th>
			<th style="border: 1px solid black; padding: 8px">Nama Barang</th>
			<th style="border: 1px solid black; padding: 8px">Jumlah</th>
			<th style="border: 1px solid black; padding: 8px">Ukuran</th>
			<th style="border: 1px solid black; padding: 8px">Tanggal</th>
			<th style="border: 1px solid black; padding: 8px">Harga</th>

		</tr>
	</thead>
	<tbody>
		@foreach ($penjualan as $data)
			<tr>
				<td style="border: 1px solid black; padding: 8px">{{ $loop->iteration }}</td>
				<td style="border: 1px solid black; padding: 8px">{{ $data->nama_barang }}</td>
				<td style="border: 1px solid black; padding: 8px">{{ $data->jumlah_barang }}</td>
				<td style="border: 1px solid black; padding: 8px">{{ $data->ukuran }}</td>
				<td style="border: 1px solid black; padding: 8px">{{ $data->tanggal }}</td>
				<td style="border: 1px solid black; padding: 8px">{{ $data->harga }}</td>

			</tr>
		@endforeach

	</tbody>
</table>
