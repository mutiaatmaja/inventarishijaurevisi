<div>
	<div class="table-container mt-4">
		<h5 class="mb-3">Stok Barang</h5>
		<div class="d-flex justify-content-between mb-3">

			{{-- <button class="btn btn-pink" wire:click='ubahMode("tambah")'>+ Tambah Barang</button> --}}

			<div class="d-flex">
				<input class="form-control me-2" type="text" placeholder="Cari Barang" wire:model.live='cari'>

			</div>

			<div wire:loading>
				loading ...
			</div><a href="{{ route('cetakstok') }}" target="_blank" class="btn btn-primary">Cetak PDF</a>
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
					<label class="form-label" for="tanggal_masuk">Tanggal Keluar</label>
					<input class="form-control" id="tanggal_masuk" type="date" wire:model='tanggal_keluar'>
					@error('tanggal_masuk')
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
					{{-- <th>Aksi</th> --}}
				</tr>
			</thead>
			<tbody>
				@foreach ($semuadata as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->nama }}</td>
						<td>{{ $data->stok }}</td>
						<td>{{ $data->ukuran }}</td>
						<td>
							@if ($data->foto == null)
							@else
								<img class="img-fluid" src="{{ asset('/storage/fotobarang/' . $data->foto) }}" alt="nama gambar"
									style="max-width: 100px">
							@endif

						</td>
						{{-- <td>
							<div class="d-flex">
								<button class="btn btn-warning me-2" wire:click='edit("{{ $data->id }}")'>Edit</button>
								<button class="btn btn-danger" wire:click='hapus("{{ $data->id }}")'
									wire:confirm='Anda yakin ?'>Hapus</button>
							</div>
						</td> --}}
					</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>
