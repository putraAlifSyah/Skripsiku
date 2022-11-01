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


// Boleh diakses user
Route::get('/', 'pelamarController@index');

// biodata user
Route::middleware(['auth:sanctum', 'verified'])->get('/biodata', 'BiodataController@index');



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

    // jadwal/periode pendaftaran
    Route::get('/admin/wartawan', 'wartawanController@index');
    Route::get('/admin/wartawan/tambah', 'wartawanController@create');
    // Route::post('/admin/periode', 'wartawanController@store');
    // Route::delete('/admin/periode/{periode}', 'wartawanController@destroy');
    // Route::get('/admin/periode/{periode}/edit', 'wartawanController@edit');
    // Route::patch('/admin/periode/{periode}', 'wartawanController@update'); 
    
});

// Route::middleware(['auth', 'is_admin'])->group(function(){
// });


// Route::middleware(['auth', 'is_admin'])->group(function(){
// });


