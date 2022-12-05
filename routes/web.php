<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
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

Route::get('/', function () {
    return view('landing-page/home');
});

Route::get('/home', function () {
    return view('landing-page/home');
});

Route::get('/about', function() {
	return view('landing-page/about');
});

// Route::get('/doctors', function() {
// 	return view('landing-page/doctors');
// });

Route::get('/services', function() {
	return view('landing-page/service');
});

Route::get('/departement', function() {
	return view('landing-page/departement');
});

Route::get('/contact', function() {
	return view('landing-page/contact');
});

Route::resource('doctors',DokterController::class);
Route::resource('pasien',PasienController::class);

Route::get('pasien-pdf', [PasienController::class,'pasienPDF']);
Route::get('pasien-excel', [PasienController::class,'pasienExcel']);