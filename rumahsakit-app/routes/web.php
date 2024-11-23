<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;

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


Route::get('/', function () {
    return redirect('/rumah-sakit');
});

// Rumah Sakit CRUD
Route::resource('rumah-sakit', RumahSakitController::class);

// Pasien CRUD
Route::resource('pasien', PasienController::class);
Route::get('pasien/filter/{id}', [PasienController::class, 'filterByRumahSakit'])->name('pasien.filter');