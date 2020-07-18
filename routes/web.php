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
    return redirect('login');
});

Auth::routes();

// Route::match(['GET', 'POST'], '/register', function () {
//        return redirect('/login');
// })->name('register');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tambah-data','backend\WajibPajakController@TambahData')->name('wp.tambah');
Route::prefix('admin')->group(function (){
    
    // wajib pajak
    Route::get('/data-wajib-pajak','backend\WajibPajakController@index')->name('wp.index');
    Route::get('/data-wajib-pajak/create','backend\WajibPajakController@create')->name('wp.create');
    Route::post('/data-wajib-pajak/store','backend\WajibPajakController@store')->name('wp.store');
    Route::get('/data-wajib-pajak/edit/{id}','backend\WajibPajakController@edit')->name('wp.edit');
    Route::get('/data-wajib-pajak/detail/{id}','backend\WajibPajakController@show')->name('wp.show');
    Route::post('/data-wajib-pajak/update/{id}','backend\WajibPajakController@update')->name('wp.update');
    Route::get('/data-wajib-pajak/destroy','backend\WajibPajakController@destroy')->name('wp.destroy');

    // import
    Route::get('/import-data','backend\WajibPajakController@import')->name('index.import');
    Route::post('/import-master-npwp','backend\WajibPajakController@ImportMasterNpwp')->name('import.master-npwp');
    Route::post('/import-wajib-spt','backend\WajibPajakController@ImportWajibSpt')->name('import.wajib-spt');
    Route::post('/import-master-spt','backend\WajibPajakController@ImportMasterSpt')->name('import.master-spt');
    Route::post('/import-dim-wilayah','backend\WajibPajakController@ImportWilayah')->name('import.dim-wilayah');
    Route::post('/import-pegawai','backend\WajibPajakController@ImportPegawai')->name('import.pegawai');

    // sudah lapor
    Route::get('/data-wajib-pajak/sudah-lapor-spt','backend\WajibPajakController@indexSudahlapor')->name('sudahlapor.index');
    // belum lapor
    Route::get('/data-wajib-pajak/belom-lapor-spt','backend\WajibPajakController@indexBelumlapor')->name('belomlapor.index');

    // laporan spt
    Route::get('/laporan-spt','backend\LaporanSptController@index')->name('laporanspt.index');
    Route::get('/laporan-spt/detail/{id}','backend\LaporanSptController@show')->name('laporanspt.show');
    Route::get('/laporan-spt/edit/{id}','backend\LaporanSptController@edit')->name('laporanspt.edit');
    Route::post('/laporan-spt/update/{id}','backend\LaporanSptController@update')->name('laporanspt.update');
        
    // pegawai
    Route::get('/data-pegawai','backend\UserController@index')->name('user.index');
    Route::get('/data-pegawai/create','backend\UserController@create')->name('user.create');
    Route::post('/data-pegawai/store','backend\UserController@store')->name('user.store');
    Route::get('/data-pegawai/edit/{id}','backend\UserController@edit')->name('user.edit');
    Route::post('/data-pegawai/update/{id}','backend\UserController@update')->name('user.update');
    Route::get('/data-pegawai/destroy/{id}','backend\UserController@destroy')->name('user.destroy');
    Route::get('/data-pegawai/detail/{id}','backend\UserController@show')->name('user.show');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
