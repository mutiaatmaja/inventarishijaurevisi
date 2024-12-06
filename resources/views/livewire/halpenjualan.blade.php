<div>
	<div class="loading-bar" wire:loading>

	</div>
	<div class="table-container mt-4">
		<h5 class="mb-3">Penjualan Barang</h5>
		<div class="d-flex justify-content-between mb-3">

			<button class="btn btn-pink" wire:click='ubahMode("tambah")'>+ Tambah Barang</button>
			<div wire:loading>
				loading ...
			</div>

			<div class="d-flex">
				<input class="form-control me-2" type="text" placeholder="Cari Barang" wire:model.live='cari'>

			</div>
		</div>

		<hr />
		@if ($mode == 'tambah' || $mode == 'edit')

			<form wire:submit='simpan'>
				<div class="mb-3">
					<label class="form-label" for="nama_barang">Nama Barang</label>
					<select class="form-control" wire:model.live='nama_barang'>
						<option value="">Pilih Barang</option>
						@foreach ($namabarang as $data)
							<option value="{{ $data->nama }}">{{ $data->nama }}</option>
						@endforeach
						@error('nama_barang')
							<i class="text-danger">{{ $message }}</i>
						@enderror
					</select>
				</div>
				@if ($nama_barang)
					<div class="mb-3">
						<label class="form-label" for="ukuran">Ukuran</label>
						<select class="form-control" wire:model.live='ukuran' wire:loading.attr='disabled'>
							<option value="">Pilih Ukuran</option>
							@foreach ($ukuranbarang as $data)
								<option value="{{ $data->ukuran }}">{{ $data->ukuran }}</option>
							@endforeach
						</select>
						@error('ukuran')
							<i class="text-danger">{{ $message }}</i>
						@enderror
					</div>
				@endif
				@if ($ukuran)
					<div class="mb-3">
						<label class="form-label" for="jumlah_barang">Jumlah Barang (<span class="text-danger">Stok :
								{{ $barangterpilih->stok }}</span>)</label>
						<input class="form-control" id="jumlah_barang" type="number" wire:model='jumlah_barang'>
						@error('jumlah_barang')
							<i class="text-danger">{{ $message }}</i>
						@enderror
					</div>

					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								@if ($barangterpilih->foto)
									<img class="img-fluid" src="{{ asset('/storage/fotobarang/' . $barangterpilih->foto) }}" alt="nama gambar"
										style="max-width: 100px">
								@else
									<img class="img-fluid" src="{{ asset('nofoto.png') }}" alt="nama gambar" />
								@endif
							</div>
							<div class="col-6">

								<div class="mb-3">
									<label class="form-label" for="tanggal_penjualan">Tanggal Penjualan</label>
									<input class="form-control" id="tanggal_penjualan" type="date" wire:model='tanggal_penjualan'>
									@error('tanggal_penjualan')
										<i class="text-danger">{{ $message }}</i>
									@enderror
								</div>
								<div class="mb-3">
									<label class="form-label" for="harga">Harga</label>
									<input class="form-control" id="harga" type="number" min="0" wire:model='harga'>
									@error('harga')
										<i class="text-danger">{{ $message }}</i>
									@enderror
								</div>
							</div>
						</div>
					</div>

				@endif
				<button class="btn btn-primary" type="submit">Simpan</button>
			</form>
		@endif
		<hr />
		<table class="table-striped table-bordered table">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Jumlah Barang</th>
					<th>Ukuran</th>
					<th>Foto</th>
					<th>Tanggal Penjualan</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($semuadata as $data)
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
						<td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
						<td>
							<div class="d-flex">
								<button class="btn btn-warning me-2" wire:click='edit("{{ $data->id }}")'>Edit</button>
								<button class="btn btn-danger me-2" wire:click='hapus("{{ $data->id }}")'
									wire:confirm='Anda yakin ?'>Hapus</button>
								<a href="{{ route('cetaknota', ['id' => $data->id]) }}" target="_blank" class="btn btn-info me-2">Nota</a>
							</div>
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>
