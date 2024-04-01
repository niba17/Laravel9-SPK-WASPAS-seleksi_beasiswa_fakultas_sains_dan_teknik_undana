<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DataKasusController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\BobotMahasiswaController;

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

Route::get('/', [LandController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/akun', [AkunController::class, 'index'])->middleware('auth')->name('akun');
Route::get('/akun-add', [AkunController::class, 'create'])->middleware('auth')->name('akun-add');
Route::post('/akun-store', [AkunController::class, 'store'])->middleware('auth');
Route::get('/akun-edit/{id}', [AkunController::class, 'edit'])->middleware('auth')->name('akun-edit');
Route::put('/akun-update/{id}', [AkunController::class, 'update'])->middleware('auth');
Route::get('/akun-destroy/{id}', [AkunController::class, 'destroy'])->middleware('auth');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth')->name('mahasiswa');
Route::get('/mahasiswa-add', [MahasiswaController::class, 'create'])->middleware('auth')->name('mahasiswa-add');
Route::post('/mahasiswa-store', [MahasiswaController::class, 'store'])->middleware('auth');
Route::get('/mahasiswa-edit/{id}', [MahasiswaController::class, 'edit'])->middleware('auth')->name('mahasiswa-edit');
Route::put('/mahasiswa-update/{id}', [MahasiswaController::class, 'update'])->middleware('auth');
Route::get('/mahasiswa-destroy/{id}', [MahasiswaController::class, 'destroy'])->middleware('auth');
// Route::get('/mahasiswa-cetak/{id}', [MahasiswaController::class, 'cetak']);

Route::get('/kriteria', [KriteriaController::class, 'index'])->middleware('auth')->name('kriteria');
Route::get('/kriteria-add', [KriteriaController::class, 'create'])->middleware('auth')->name('kriteria-add');
Route::post('/kriteria-store', [KriteriaController::class, 'store'])->middleware('auth');
Route::get('/kriteria-edit/{id}', [KriteriaController::class, 'edit'])->middleware('auth')->name('kriteria-edit');
Route::put('/kriteria-update/{id}', [KriteriaController::class, 'update'])->middleware('auth');
Route::get('/kriteria-destroy/{id}', [KriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/kriteria-request', [KriteriaController::class, 'request'])->name('kriteria-request');
// Route::get('/kriteria-cetak/{id}', [KriteriaController::class, 'cetak']);

Route::get('/sub_kriteria', [SubKriteriaController::class, 'index'])->middleware('auth')->name('sub_kriteria');
Route::get('/sub_kriteria-add/{kriteria_id}', [SubKriteriaController::class, 'create'])->middleware('auth')->name('sub_kriteria-add');
Route::post('/sub_kriteria-validator_add', [SubKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/sub_kriteria-store', [SubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/sub_kriteria-edit/{id}', [SubKriteriaController::class, 'edit'])->middleware('auth')->name('sub_kriteria-edit');
Route::post('/sub_kriteria-validator_edit/{id}', [SubKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/sub_kriteria-update/{id}', [SubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/sub_kriteria-destroy/{id}', [SubKriteriaController::class, 'destroy'])->middleware('auth');
// Route::get('/sub_kriteria-cetak/{id}', [SubKriteriaController::class, 'cetak']);

Route::get('/bobot_mahasiswa', [BobotMahasiswaController::class, 'index'])->middleware('auth')->name('bobot_mahasiswa');
Route::get('/bobot_mahasiswa-add', [BobotMahasiswaController::class, 'create'])->middleware('auth')->name('bobot_mahasiswa-add');
Route::post('/bobot_mahasiswa-validator_add', [BobotMahasiswaController::class, 'validator_add'])->middleware('auth');
Route::post('/bobot_mahasiswa-store', [BobotMahasiswaController::class, 'store'])->middleware('auth');
Route::get('/bobot_mahasiswa-edit/{id}', [BobotMahasiswaController::class, 'edit'])->middleware('auth')->name('bobot_mahasiswa-edit');
Route::post('/bobot_mahasiswa-validator_edit/{id}', [BobotMahasiswaController::class, 'validator_edit'])->middleware('auth');
Route::put('/bobot_mahasiswa-update/{id}', [BobotMahasiswaController::class, 'update'])->middleware('auth');
Route::get('/bobot_mahasiswa-destroy/{id}', [BobotMahasiswaController::class, 'destroy'])->middleware('auth');
// Route::get('/bobot_mahasiswa-cetak/{id}', [BobotMahasiswaController::class, 'cetak']);

Route::get('/jurusan', [JurusanController::class, 'index'])->middleware('auth')->name('jurusan');
Route::get('/jurusan-add', [JurusanController::class, 'create'])->middleware('auth')->name('jurusan-add');
Route::post('/jurusan-store', [JurusanController::class, 'store'])->middleware('auth');
Route::get('/jurusan-edit/{id}', [JurusanController::class, 'edit'])->middleware('auth')->name('jurusan-edit');
Route::put('/jurusan-update/{id}', [JurusanController::class, 'update'])->middleware('auth');
Route::get('/jurusan-destroy/{id}', [JurusanController::class, 'destroy'])->middleware('auth');

Route::get('/kecamatan', [KecamatanController::class, 'index'])->middleware('auth')->name('kecamatan');
Route::get('/kecamatan-add', [KecamatanController::class, 'create'])->middleware('auth')->name('kecamatan-add');
Route::post('/kecamatan-store', [KecamatanController::class, 'store'])->middleware('auth');
Route::get('/kecamatan-edit/{id}', [KecamatanController::class, 'edit'])->middleware('auth')->name('kecamatan-edit');
Route::put('/kecamatan-update/{id}', [KecamatanController::class, 'update'])->middleware('auth');
Route::get('/kecamatan-destroy/{id}', [KecamatanController::class, 'destroy'])->middleware('auth');
Route::get('/kecamatan-request', [KecamatanController::class, 'request'])->name('kecamatan-request');

Route::get('/kelurahan', [KelurahanController::class, 'index'])->middleware('auth')->name('kelurahan');
Route::get('/kelurahan-add', [KelurahanController::class, 'create'])->middleware('auth')->name('kelurahan-add');
Route::post('/kelurahan-store', [KelurahanController::class, 'store'])->middleware('auth');
Route::get('/kelurahan-edit/{id}', [KelurahanController::class, 'edit'])->middleware('auth')->name('kelurahan-add');
Route::put('/kelurahan-update/{id}', [KelurahanController::class, 'update'])->middleware('auth');
Route::get('/kelurahan-destroy/{id}', [KelurahanController::class, 'destroy'])->middleware('auth');

Route::get('/perhitungan-pembobotan', [PerhitunganController::class, 'pembobotan'])->middleware('auth')->name('[perhitungan-pembobotan]');
Route::get('/perhitungan-b_c', [PerhitunganController::class, 'b_c'])->middleware('auth')->name('[perhitungan-b_c]');

// Route::get('/teachers', [TeacherController::class, 'index']);
// Route::get('/teacher/{id}', [TeacherController::class, 'show']);

// Route::get('/classrooms', [ClassroomController::class, 'index']);
// Route::get('/classroom/{id}', [ClassroomController::class, 'show']);

// Route::get('/extracurriculars', [ExtracurricularController::class, 'index']);
// Route::get('/extracurricular/{id}', [ExtracurricularController::class, 'show']);

// Route::get('/about', [AboutController::class, 'index']);
