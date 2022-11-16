<?php

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


// Boleh diakses sebelum login
Route::get('/', 'pelamarController@index');

// bisa diakses oleh user
// biodata user
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    // untuk crud biodata user
    Route::get('/biodata', 'BiodataController@index');
    Route::get('/periodeDaftar/{periode}/daftar', 'BiodataController@create');
    Route::post('/IsiBiodata', 'BiodataController@store');
    Route::get('/editBiodata/{user}', 'BiodataController@edit');
    Route::patch('/simpanEdit', 'BiodataController@update');
});
// hanya boleh diakses admin

Route::middleware(['auth', 'is_admin'])->group(function(){
    Route::get('/admin/home', function () {
        return view('HalamanUtama/index');
    });
    Route::get('/admin', function () {
        return view('HalamanUtama/index');
    });
});



Route::middleware(['auth', 'is_admin'])->group(function(){
    // data kriteria
    Route::get('/admin/datakriteria', 'kriteriaController@index');
    Route::get('/admin/datakriteria/tambah', 'kriteriaController@create');
    Route::post('/admin/datakriteria', 'kriteriaController@store');
    Route::delete('/admin/datakriteria/{datakriteria}', 'kriteriaController@destroy');
    Route::get('/admin/datakriteria/{datakriteria}/edit', 'kriteriaController@edit');
    Route::patch('/admin/datakriteria/{datakriteria}', 'kriteriaController@update');

    // jadwal/periode pendaftaran
    Route::get('/admin/periode', 'PeriodeController@index');
    Route::get('/admin/periode/tambah', 'PeriodeController@create');
    Route::post('/admin/periode', 'PeriodeController@store');
    Route::delete('/admin/periode/{periode}', 'PeriodeController@destroy');
    Route::get('/admin/periode/{periode}/edit', 'PeriodeController@edit');
    Route::patch('/admin/periode/{periode}', 'PeriodeController@update');

    // Input Nilai Normal
    Route::get('/admin/nilaiawal', 'NilaiAwalController@index');
    // Route::get('/admin/nilaiawal/tambah', 'NilaiAwalController@create');
    // Route::post('/admin/nilaiawal', 'NilaiAwalController@store');
    Route::delete('/admin/nilaiawal/{nilaiawal}', 'NilaiAwalController@destroy');
    Route::get('/admin/nilaiawal/{nilaiawal}/input', 'NilaiAwalController@create');
    Route::post('/admin/nilaiawal/input', 'NilaiAwalController@store');
    Route::get('/admin/nilaiawal/{nilaiawal}/edit', 'NilaiAwalController@edit');
    Route::patch('/admin/nilaiawal/{nilaiawal}', 'NilaiAwalController@update');

    // view nilai vektor s
    Route::get('/admin/vektors', 'VektorSController@index');

    // view nilai vektor v
    Route::get('/admin/vektorv', 'VektorVController@index');

    // Hasil akhir
    Route::get('/admin/hasilakhir', 'HasilAkhirController@index');

    // jadwal/periode pendaftaran
    Route::get('/admin/wartawan', 'wartawanController@index');
    Route::get('/admin/wartawan/{wartawan}/verifikasi', 'wartawanController@verifikasi');
    // Route::post('/admin/periode', 'wartawanController@store');
    // Route::delete('/admin/periode/{periode}', 'wartawanController@destroy');
    // Route::get('/admin/periode/{periode}/edit', 'wartawanController@edit');
    // Route::patch('/admin/periode/{periode}', 'wartawanController@update'); 
    
});

// Route::middleware(['auth', 'is_admin'])->group(function(){
// });


// Route::middleware(['auth', 'is_admin'])->group(function(){
// });


