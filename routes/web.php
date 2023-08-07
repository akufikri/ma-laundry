<?php

use App\Http\Controllers\PaketController;
use App\Http\Controllers\SatuanController;
use App\Models\Paket;
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

Route::get('/', function () {
    return view('layouts.dashboard');
});

Route::get('/satuan', [SatuanController::class, 'satuan']);
Route::post('/post_satuan', [SatuanController::class, 'post_satuan']);
Route::get('/show_satuan/{id}', [SatuanController::class, 'show_satuan']);
Route::get('nonaktif/{id}', [SatuanController::class, 'nonaktif']);;
Route::get('aktif/{id}', [SatuanController::class, 'aktif']);
Route::put('/update_satuan/{id}', [SatuanController::class, 'update_satuan']);
Route::get('/satuan/delete/{id}', [SatuanController::class, 'delete']);

Route::get('/paket', [PaketController::class, 'paket']);
Route::post('/post_paket', [PaketController::class, 'post_paket']);
Route::get('/aktif_paket/{id}', [PaketController::class, 'aktif']);
Route::get('/nonaktif_paket/{id}', [PaketController::class, 'nonaktif']);
Route::get('/show_paket/{id}', [PaketController::class ,'show_paket']);
Route::put('/update_paket/{id}', [PaketController::class, 'update_paket']);
Route::get('/paket/delete/{id}', [PaketController::class, 'delete']);
Route::get('/filter', [PaketController::class, 'filter']);
Route::get('/paket/showTrash', [PaketController::class, 'showTrash']);
Route::get('/paket/restore/{id}', [PaketController::class, 'restore']);
Route::get('/paket/permanent_del/{id}', [PaketController::class, 'permanent_del']);