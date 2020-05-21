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
    return view('auth.login1');
});

Auth::routes();

Route::match(['GET', 'POST'], '/register', function () {
       return redirect('/login');
})->name('register');

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function (){
    // wajib pajak
    Route::get('/data-wajib-pajak/kelola-wajib-pajak','backend\WajibPajakController@index')->name('wp.index');
    Route::get('/data-wajib-pajak/sudah-lapor-spt','backend\WajibPajakController@indexSudahlapor')->name('sudahlapor.index');
    Route::get('/data-wajib-pajak/belom-lapor-spt','backend\WajibPajakController@indexBelumlapor')->name('belomlapor.index');

    // laporan spt
    Route::get('/laporan-spt','backend\LaporanSptController@index')->name('laporanspt.index');
    
    // forum
    Route::get('/forum','backend\ForumController@index')->name('forum.index');

});
