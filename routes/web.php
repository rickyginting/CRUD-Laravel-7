<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('mahasiswa', 'MahasiswaController@index')->name('mahasiswa');
Route::get('mahasiswa/add', 'MahasiswaController@add');
Route::post('mahasiswa/store', 'MahasiswaController@store');
Route::delete('mahasiswa/{mahasiswa:nim}/delete', 'MahasiswaController@delete');
Route::get('mahasiswa/{mahasiswa:nim}/update', 'MahasiswaController@update');
Route::put('mahasiswa/{mahasiswa:nim}/put', 'MahasiswaController@put');
Route::get('mahasiswa/{mahasiswa:nim}', 'MahasiswaController@detail');

Route::get('api/dosen', 'DosenController@json');
Route::get('dosen', 'DosenController@index')->name('dosen');
Route::get('dosen/add', 'DosenController@add');
Route::post('dosen/store', 'DosenController@store');
Route::delete('dosen/{dosen:nip}/delete', 'DosenController@delete');
Route::get('dosen/{dosen:nip}/update', 'DosenController@update');
Route::put('dosen/{dosen:nip}/put', 'DosenController@put');
Route::get('dosen/{dosen:nip}', 'DosenController@detail');
