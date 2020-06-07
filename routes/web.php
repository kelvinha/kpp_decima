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

// Route::match(['GET', 'POST'], '/register', function () {
//        return redirect('/login');
// })->name('register');

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function (){

        // wajib pajak
        Route::get('/data-wajib-pajak/kelola-wajib-pajak','backend\WajibPajakController@index')->name('wp.index');
        Route::get('/data-wajib-pajak/kelola-wajib-pajak/create','backend\WajibPajakController@create')->name('wp.create');
        Route::post('/data-wajib-pajak/kelola-wajib-pajak/store','backend\WajibPajakController@store')->name('wp.store');
        Route::get('/data-wajib-pajak/kelola-wajib-pajak/edit/{id}','backend\WajibPajakController@edit')->name('wp.edit');
        Route::get('/data-wajib-pajak/kelola-wajib-pajak/detail/{id}','backend\WajibPajakController@show')->name('wp.show');
        Route::post('/data-wajib-pajak/kelola-wajib-pajak/update/{id}','backend\WajibPajakController@update')->name('wp.update');
        Route::get('/data-wajib-pajak/kelola-wajib-pajak/destroy','backend\WajibPajakController@destroy')->name('wp.destroy');
        
        // sudah lapor
        Route::get('/data-wajib-pajak/sudah-lapor-spt','backend\WajibPajakController@indexSudahlapor')->name('sudahlapor.index');
        
        // belum lapor
        Route::get('/data-wajib-pajak/belom-lapor-spt','backend\WajibPajakController@indexBelumlapor')->name('belomlapor.index');
    
        // laporan spt
        Route::get('/laporan-spt','backend\LaporanSptController@index')->name('laporanspt.index');
        Route::get('/laporan-spt/detail/{id}','backend\LaporanSptController@show')->name('laporanspt.show');
        Route::get('/laporan-spt/edit/{id}','backend\LaporanSptController@edit')->name('laporanspt.edit');
        Route::post('/laporan-spt/update/{id}','backend\LaporanSptController@update')->name('laporanspt.update');
        
        // forum
        Route::get('/forum','backend\ForumController@index')->name('forum.index');
});
