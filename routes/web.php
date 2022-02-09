<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/keluar', [UserController::class, 'keluar']);
Route::get('/masuk', [UserController::class, 'index']);
Route::get('/registrasi', [UserController::class, 'registrasi']);
Route::post('/proses_registrasi', [UserController::class, 'proses_registrasi']);
Route::post('/proses_masuk', [UserController::class, 'proses_masuk']);

// Route Masyarakat
Route::get('/masyarakat', [MasyarakatController::class, 'listpengaduan']);
Route::post('/masyarakat/pengaduan', [MasyarakatController::class, 'pengaduan']);
Route::get('/pengaduan/lihat/{id}', [MasyarakatController::class, 'show']);
Route::get('/masyarakat/list-pengaduan', [MasyarakatController::class, 'formpengaduan']);
Route::get('/masyarakat/form-pengaduan', [MasyarakatController::class, 'listpengaduan']);

// Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/masyarakat', [AdminController::class, 'masyarakat']);
Route::get('/admin/aduan', [AdminController::class, 'aduan']);
Route::get('/pengaduan/detail/{id}', [AdminController::class, 'detail']);
// Route::get('/tanggapan/{id}/status', [AdminController::class, 'status']);
Route::post('/pengaduan/detail/{id}', [AdminController::class, 'tanggapan']);
Route::get('/pengaduan/{id}/status', [AdminController::class, 'status']);

// Petugas
Route::get('/petugas', [PetugasController::class, 'index']);
Route::get('/petugas/masyarakat', [PetugasController::class, 'masyarakat']);
Route::get('/petugas/aduan', [PetugasController::class, 'aduan']);
Route::get('/pengaduan/detail/{id}', [PetugasController::class, 'detail']);
// Route::get('/tanggapan/{id}/status', [PetugasController::class, 'status']);
Route::post('/pengaduan/detail/{id}', [PetugasController::class, 'tanggapan']);
Route::get('/pengaduan/{id}/status', [PetugasController::class, 'status']);

