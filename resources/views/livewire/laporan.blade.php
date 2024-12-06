<div>
	<div class="table-container mt-4">
		<div class="row">
			<div class="col-6">
				<button class="btn btn-primary w-100 mb-2" wire:click='lihatLaporan("barangmasuk")'>Laporan Barang Masuk</button>
				<button class="btn btn-primary w-100 mb-2" wire:click='lihatLaporan("barangkeluar")'>Laporan Barang Keluar</button>
				<button class="btn btn-primary w-100 mb-2" wire:click='lihatLaporan("penjualan")'>Laporan Penjualan</button>
				<button class="btn btn-primary w-100 mb-2" wire:click='lihatLaporan("pembelian")'>Laporan Pembelian</button>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-12">
				@if ($jenisLaporan == 'barangmasuk')
					<h3>Laporan Barang Masuk</h3>
					<div class="d-flex mb-2">
						<select class="form-control w-25" wire:model.live='bulan'>
							<option value="0">Semua Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
						<a class="btn btn-primary mx-3" href="/cetak/barangmasuk" target="_blank">Download PDF</a>
					</div>

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
									<td>
										<img class="img-fluid" src="{{ asset('/storage/fotobarang/' . $data->barang->foto) }}" alt="nama gambar"
											style="max-width: 100px">
									</td>
									<td>{{ $data->tanggal_masuk }}</td>
								</tr>
							@endforeach

						</tbody>
					</table>
				@endif
				@if ($jenisLaporan == 'barangkeluar')
					<h3>Laporan Barang keluar</h3>
					<div class="d-flex mb-2">
						<select class="form-control w-25" wire:model.live='bulan'>
							<option value="0">Semua Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
						<a class="btn btn-primary mx-3" href="/cetak/barangkeluar" target="_blank">Download PDF</a>
					</div>
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
										<img class="img-fluid" src="{{ asset('/storage/fotobarang/' . $data->barang->foto) }}" alt="nama gambar"
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
					<div class="d-flex mb-2">
						<select class="form-control w-25" wire:model.live='bulan'>
							<option value="0">Semua Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
						<a class="btn btn-primary mx-3" href="/cetak/penjualan" target="_blank">Download PDF</a>
						<a class="btn btn-primary mx-3" href="/excel/penjualan" target="_blank">Download excel</a>
					</div>
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
										<img class="img-fluid" src="{{ asset('/storage/fotobarang/' . $data->barang->foto) }}" alt="nama gambar"
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
					<div class="d-flex mb-2">
						<select class="form-control w-25" wire:model.live='bulan'>
							<option value="0">Semua Bulan</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
						<a class="btn btn-primary mx-3" href="/cetak/pembelian" target="_blank">Download PDF</a>
						<a class="btn btn-primary mx-3" href="/excel/pembelian" target="_blank">Download Excel</a>
					</div>
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
										<img class="img-fluid" src="{{ asset('/storage/fotobarang/' . $data->barang->foto) }}" alt="nama gambar"
											style="max-width: 100px">
									</td>
									<td>{{ $data->tanggal }}</td>
									<td>{{ $data->harga }}</td>

								</tr>
							@endforeach

						</tbody>
					</table>
				@endif

			</div>
		</div>
	</div>
</div>
