<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Beranda;
use App\Livewire\Halbarangmasuk;
use App\Livewire\Halbarangkeluar;
use App\Livewire\Halpenjualan;
use App\Livewire\Halpembelian;
use App\Livewire\Halkaryawan;
use App\Livewire\Laporan;
use App\Http\Controllers\CetakController;
use App\Livewire\Stok;


Route::redirect('/', '/home');

Auth::routes(['register' => false]);

Route::get('/home', Beranda::class)->middleware('auth')->name('home');
Route::get('/barangmasuk', Halbarangmasuk::class)->middleware('auth')->name('barangmasuk');
Route::get('/barangkeluar', Halbarangkeluar::class)->middleware('auth')->name('barangkeluar');
Route::get('/penjualan', Halpenjualan::class)->middleware('auth')->name('penjualan');
Route::get('/pembelian', Halpembelian::class)->middleware('auth')->name('pembelian');
Route::get('/karyawan', Halkaryawan::class)->middleware(['auth', 'role:admin'])->name('karyawan');
Route::get('/laporan', Laporan::class)->middleware(['auth', 'role:admin'])->name('laporan');
Route::get('/stok', Stok::class)->middleware(['auth', 'role:admin'])->name('stok');

Route::get('/cetak/{jenis}', [CetakController::class, 'cetak'])->middleware(['auth', 'role:admin'])->name('cetak');
Route::get('/excel/{jenis}', [CetakController::class, 'excel'])->middleware(['auth', 'role:admin'])->name('excel');
Route::get('/cetaknota/{id}', [CetakController::class, 'cetakNota'])->middleware(['auth', 'role:admin'])->name('cetaknota');
