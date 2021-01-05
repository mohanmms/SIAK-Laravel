<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PegawaiController;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $mahasiswa = Mahasiswa::all();
    $jumlah_mahasiswa = $mahasiswa->count();

    $dosen = Dosen::all();
    $jumlah_dosen = $dosen->count();

    $pegawai = Pegawai::all();
    $jumlah_pegawai = $pegawai->count();

    return view('dashboard', ['mahasiswa'=>$jumlah_mahasiswa, 'dosen'=>$jumlah_dosen, 'pegawai'=>$jumlah_pegawai]);
});
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/add', [MahasiswaController::class, 'add']);

Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);

Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);

Route::put('/mahasiswa/update', [MahasiswaController::class, 'update']);

Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);

Route::post('/mahasiswa/cari', [MahasiswaController::class, 'search']);


Route::get('/dosen', [DosenController::class, 'index']);

Route::get('/dosen/add', [DosenController::class, 'add']);

Route::post('/dosen/store', [DosenController::class, 'store']);

Route::get('/dosen/edit/{id}', [DosenController::class, 'edit']);

Route::put('/dosen/update', [DosenController::class, 'update']);

Route::get('/dosen/delete/{id}', [DosenController::class, 'delete']);

Route::post('/dosen/cari', [DosenController::class, 'search']);


Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::get('/pegawai/add', [PegawaiController::class, 'add']);

Route::post('/pegawai/store', [PegawaiController::class, 'store']);

Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit']);

Route::put('/pegawai/update', [PegawaiController::class, 'update']);

Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'delete']);

Route::post('/pegawai/cari', [PegawaiController::class, 'search']);


Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/add', [MatakuliahController::class, 'add']);

Route::post('/matakuliah/store', [MatakuliahController::class, 'store']);

Route::get('/matakuliah/edit/{id}', [MatakuliahController::class, 'edit']);

Route::put('/matakuliah/update', [MatakuliahController::class, 'update']);

Route::get('/matakuliah/delete/{id}', [MatakuliahController::class, 'delete']);

Route::get('/jadwal/search', [MatakuliahController::class, 'search']);


Route::get('/jadwal', [JadwalController::class, 'index']);

Route::get('/jadwal/add', [JadwalController::class, 'add']);

Route::post('/jadwal/store', [JadwalController::class, 'store']);

Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit']);

Route::put('/jadwal/update', [JadwalController::class, 'update']);

Route::get('/jadwal/delete/{id}', [JadwalController::class, 'delete']);

Route::get('/jadwal/search', [JadwalController::class, 'search']);

