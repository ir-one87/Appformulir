<?php

use App\Http\Controllers\BerkasController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganisasiController;
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


Route::get('/formulir', [FormulirController::class, 'sh_form'])->name('sh_form');
Route::get('/list', [FormulirController::class, 'list_daftar'])->name('list_daftar');
Route::get('/form/edit/{id}', [FormulirController::class, 'edit_form'])->name('edit_form');
Route::post('/formulir/save', [FormulirController::class, 'save_form'])->name('save_form');
Route::patch('/form/update/{formulir}', [FormulirController::class, 'update_form'])->name('update_form');
Route::delete('/form/delete/{formulir}', [FormulirController::class, 'delete_form'])->name('delete_form');


Route::get('/berkas', [BerkasController::class, 'sh_berkas'])->name('sh_berkas');
Route::get('/unduh/berkas', [BerkasController::class, 'unduh_berkas'])->name('unduh_berkas');
Route::post('/berkas/save', [BerkasController::class, 'save_berkas'])->name('save_berkas');
Route::patch('/berkas/update{berkas}', [BerkasController::class, 'update_berkas'])->name('update_berkas');
Route::delete('/berkas/delete{berkas}', [BerkasController::class, 'delete_berkas'])->name('delete_berkas');


Route::get('/listopd', [OrganisasiController::class, 'sh_organisasi'])->name('sh_organisasi');
Route::post('/listopd/save', [OrganisasiController::class, 'save_opd'])->name('save_opd');
Route::patch('/listopd/update/{organisasi}', [OrganisasiController::class, 'update_opd'])->name('update_opd');
Route::delete('/listopd/delete/{organisasi}', [OrganisasiController::class, 'delete_opd'])->name('delete_opd');
