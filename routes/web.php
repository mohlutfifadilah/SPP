<?php

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
    return view('login');
});
Route::get('/admin/dashboard', 'DashboardController@index');
Route::get('/siswa/dashboard', 'DashboardController@siswa');

Route::resource('profile', 'EditProfileController');
Route::resource('password', 'EditPasswordController');
Route::resource('petugas', 'PetugasController');
Route::resource('siswa', 'SiswaController');
Route::resource('user', 'UserController');
Route::resource('kelas','KelasController');
Route::resource('spp','SppController');
Route::resource('kartu','KartuController');
Route::resource('proses','ProsesController');
Route::resource('pay','PayController');
Route::resource('confirm','ConfirmController');
Route::resource('history','HistoryController');
Route::resource('riwayat','RiwayatController');
Route::get('unduh-bukti/{id}', [
    "uses" => 'RiwayatController@cetak',
    "as" => 'unduh-bukti'
]);

Route::post('proses-bayar/{id}', [
    "uses" => 'BayarController@proses',
    "as" => 'proses-bayar'
]);
Route::post('/get-siswa','PayController@searchData');
Route::post('/get-kelas','PayController@searchKelas');
Route::post('/hapus-user','UserController@destroy')->name('hapus-user');
Route::get('/export-excel', 'HistoryController@generate')->name('export-excel');
Route::get('/export-pdf', 'HistoryController@cetak')->name('export-pdf');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
