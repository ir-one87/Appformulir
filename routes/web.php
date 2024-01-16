<?php

use App\Http\Controllers\BerkasController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SesiController;
use App\Models\Berkas;
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

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::get('/sesi', [SesiController::class, 'sesi_index'])->name('formlogin');
Route::post('/login', [SesiController::class, 'login'])->name('login');
Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
Route::get('/reload-captcha', [SesiController::class, 'reloadCaptcha'])->name('reloadCaptcha');


Route::get('/formulir', [FormulirController::class, 'sh_form'])->name('sh_form');
Route::get('/list', [FormulirController::class, 'list_daftar'])->name('list_daftar');
Route::get('/form/edit/{id}', [FormulirController::class, 'edit_form'])->name('edit_form');
Route::post('/formulir/save', [FormulirController::class, 'save_form'])->name('save_form');
Route::patch('/form/update/{formulir}', [FormulirController::class, 'update_form'])->name('update_form');
Route::delete('/form/delete/{formulir}', [FormulirController::class, 'delete_form'])->name('delete_form');
Route::get('/view-pdf/{encodedFileName}', [FormulirController::class, 'viewPdf'])->name('viewPdf');
Route::get('/show/{formulir}', [FormulirController::class, 'show_pdf'])->name('show_pdf');
Route::get('/update/status/{id}', [FormulirController::class, 'update_status'])->name('update_status');
Route::get('/update/statusTte/{id}', [FormulirController::class, 'status_tte'])->name('status_tte');
Route::patch('/update/statusberkas/{id}', [FormulirController::class, 'status_tolak'])->name('status_tolak');
Route::patch('/update/statusverifikasi/{id}', [FormulirController::class, 'status_verifikasi'])->name('status_verifikasi');


Route::get('/berkas', [BerkasController::class, 'sh_berkas'])->name('sh_berkas');
Route::get('/unduh/berkas', [BerkasController::class, 'unduh_berkas'])->name('unduh_berkas');
Route::post('/berkas/save', [BerkasController::class, 'save_berkas'])->name('save_berkas');
Route::patch('/berkas/update{berkas}', [BerkasController::class, 'update_berkas'])->name('update_berkas');
Route::delete('/berkas/delete{berkas}', [BerkasController::class, 'delete_berkas'])->name('delete_berkas');


Route::get('/listopd', [OrganisasiController::class, 'sh_organisasi'])->name('sh_organisasi');
Route::post('/listopd/save', [OrganisasiController::class, 'save_opd'])->name('save_opd');
Route::patch('/listopd/update/{organisasi}', [OrganisasiController::class, 'update_opd'])->name('update_opd');
Route::delete('/listopd/delete/{organisasi}', [OrganisasiController::class, 'delete_opd'])->name('delete_opd');


Route::get('/listdaftar', [RekapController::class, 'Show_List'])->name('ShowList');
Route::get('/rekapOPD', [RekapController::class, 'rekap_opd'])->name('rekap.opd');
Route::get('/detail/{formulir}', [RekapController::class, 'detail'])->name('detailberkas');
