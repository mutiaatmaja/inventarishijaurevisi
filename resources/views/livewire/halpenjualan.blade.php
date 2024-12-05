<div>
	<div class="table-container mt-4">
		<h5 class="mb-3">Penjualan</h5>
		<div class="d-flex justify-content-between mb-3">

			<button class="btn btn-pink" wire:click='ubahMode("tambah")'>+ Tambah Penjualan</button>
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
					<input class="form-control" id="nama_barang" type="text" wire:model='nama_barang'>
					@error('nama_barang')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="jumlah_barang">Jumlah Barang</label>
					<input class="form-control" id="jumlah_barang" type="number" wire:model='jumlah_barang'>
					@error('jumlah_barang')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="ukuran">Ukuran</label>
					<input class="form-control" id="ukuran" type="text" wire:model='ukuran'>
					@error('ukuran')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="foto">Foto</label>
					<input class="form-control" id="foto" type="file" wire:model='foto'>
					@error('foto')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="tanggal">Tanggal</label>
					<input class="form-control" id="tanggal" type="date" wire:model='tanggal'>
					@error('tanggal')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="harga">Harga</label>
					<input class="form-control" id="harga" type="text" wire:model='harga'>
					@error('harga')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<button class="btn btn-primary" type="submit">Simpan</button>
			</form>
		@endif
		<hr />
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
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($semuadata as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->nama_barang }}</td>
						<td>{{ $data->jumlah_barang }}</td>
						<td>{{ $data->ukuran }}</td>
						<td>
							<img class="img-fluid" src="{{ asset('/storage/fotobarang/' . $data->foto) }}" alt="nama gambar"
								style="max-width: 100px">
						</td>
						<td>{{ $data->tanggal }}</td>
						<td>{{ $data->harga }}</td>
						<td>
							<div class="d-flex">
								<button class="btn btn-warning me-2" wire:click='edit("{{ $data->id }}")'>Edit</button>
								<button class="btn btn-danger" wire:click='hapus("{{ $data->id }}")'
									wire:confirm='Anda yakin ?'>Hapus</button>
							</div>
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>