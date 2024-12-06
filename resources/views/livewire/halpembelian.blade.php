<div>
	<div class="loading-bar" wire:loading>

	</div>
	<div class="table-container mt-4">
		<h5 class="mb-3">Pembelian Barang</h5>
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
						<label class="form-label" for="jumlah_barang">Jumlah Barang</label>
						<input class="form-control" id="jumlah_barang" type="number" wire:model='jumlah_barang'>
						@error('jumlah_barang')
							<i class="text-danger">{{ $message }}</i>
						@enderror
					</div>

					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								<div class="row">
									<div class="col-6">
										@if ($barangterpilih->foto)
											<div class="card">
												<div class="card-body">
													<h5>Foto Barang</h5>
													<img class="img-fluid" src="{{ asset('/storage/fotobarang/' . $barangterpilih->foto) }}" alt="nama gambar"
														style="max-width: 100px">
												</div>
											</div>
										@else
											<img class="img-fluid" src="{{ asset('nofoto.png') }}" alt="nama gambar" />
										@endif
									</div>
									<div class="col-6">
										@if ($data_edit && $data_edit->nota)
											<div class="card">
												<div class="card-body">
													<h5>Foto Nota</h5>
													<img class="img-fluid" src="{{ asset('/storage/fotonota/' . $data_edit->nota) }}" alt="nama gambar"
														style="max-width: 100px">
												</div>
											</div>
										@endif
									</div>
								</div>

							</div>
							<div class="col-6">
								<label class="form-label" for="foto">Foto Nota</label>
								<input class="form-control" id="foto" type="file" wire:model='foto' accept="image/*">
								@error('foto')
									<i class="text-danger">{{ $message }}</i>
								@enderror
								<div class="mb-3">
									<label class="form-label" for="tanggal_beli">Tanggal beli</label>
									<input class="form-control" id="tanggal_beli" type="date" wire:model='tanggal_beli'>
									@error('tanggal_beli')
										<i class="text-danger">{{ $message }}</i>
									@enderror
								</div>
								<div class="mb-3">
									<label class="form-label" for="harga">Harga beli</label>
									<input class="form-control" id="harga" type="number" wire:model='harga'>
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
					<th>Tanggal Beli</th>
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
							<img class="img-fluid" src="{{ asset('/storage/fotonota/' . $data->nota) }}" alt="nama gambar"
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
