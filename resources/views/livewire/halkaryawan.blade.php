<div>
	<div class="table-container mt-4">
		<h5 class="mb-3">Karyawan</h5>
		<div class="d-flex justify-content-between mb-3">

			<button class="btn btn-pink" wire:click='ubahMode("tambah")'>+ Tambah Karyawan</button>
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
					<label class="form-label" for="nama_karyawan">Nama karyawan</label>
					<input class="form-control" id="nama_karyawan" type="text" wire:model='name'>
					@error('name')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="email">Email Karyawan</label>
					<input class="form-control" id="email" type="email" wire:model='email'>
					@error('email')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="password">Password</label>
					<input class="form-control" id="password" type="text" wire:model='password'>
					@error('password')
						<i class="text-danger">{{ $message }}</i>
					@enderror
				</div>
				<div class="mb-3">
					<label class="form-label" for="peran">Peran</label>
					<select class="form-control" id="peran" wire:model='peran'>
						<option value="">Pilih Peran</option>
						@foreach ($semuaPeran as $peran)
							<option value="{{ $peran->name }}">{{ $peran->name }}</option>
						@endforeach
					</select>
					@error('peran')
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
					<th>Nama Karyawan</th>
					<th>Email</th>
					<th>Peran</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($semuadata as $data)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $data->name }}</td>
						<td>{{ $data->email }}</td>
						<td>
							@foreach ($data->roles as $peran)
								{{ $peran->name }}
							@endforeach
						</td>
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
