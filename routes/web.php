<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ReimController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/storeLogin',[LoginController::class,'storeLogin'])->name('storeLogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::get('/dashboard',[HomeController::class,'home'])->name('home')->middleware('auth');

Route::get('/pegawai',[PegawaiController::class,'pegawai'])->name('pegawai')->middleware('auth');
Route::post('/pegawai/addPegawai', [PegawaiController::class, 'addPegawai'])->name('addPegawai')->middleware('auth');
Route::put('/pegawai/edit/{id}', [PegawaiController::class, 'updatePegawai'])->name('updatePegawai')->middleware('auth');
Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'deletePegawai'])->name('deletePegawai')->middleware('auth');

Route::get('/reimbursement',[ReimController::class,'reimData'])->name('reimData')->middleware('auth');
Route::post('/reimbursement/addReimbursement', [ReimController::class, 'addReim'])->name('addReim')->middleware('auth');
Route::get('/reimbursement/detailReimbursement/{id}', [ReimController::class, 'detailReim'])->name('detailReim')->middleware('auth');
Route::put('/reimbursement/edit/{id}', [ReimController::class, 'updateReim'])->name('updateReim')->middleware('auth');
Route::get('/reimbursement/delete/{id}', [ReimController::class, 'deleteReim'])->name('deleteReim')->middleware('auth');

Route::get('/reimbursement/disetujui/{id}', [ReimController::class, 'disetujuiReim'])->name('disetujuiReim')->middleware('auth');
Route::get('/reimbursement/ditolak/{id}', [ReimController::class, 'ditolakReim'])->name('ditolakReim')->middleware('auth');
