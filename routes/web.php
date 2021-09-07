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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/pesan', 'HomeController@pesan')->name('pesan');
Route::post('/pesan/simpan', 'HomeController@store')->name('simpanpesan');
// Route::get('/admin', function () {
//     echo "ini adalah halaman admin";
// });

#Routing Penghuni#
#Login Penghuni
Route::get('/penghuni', 'Penghuni\AuthController@index');
Route::post('/penghuni/login', 'Penghuni\AuthController@login')->name('login-penghuni');
Route::get('/penghuni/home', 'Penghuni\HomeController@index')->name('home-penghuni')->middleware('cekPenghuni');
Route::get('/penghuni/logout', 'Penghuni\AuthController@logout')->name('penghuni-logout');

#Profil Penghuni
Route::get('/penghuni/profil', 'Penghuni\ProfilController@index')->name('profil-penghuni')->middleware('cekPenghuni');
Route::patch('/penghuni/update/{id}', 'Penghuni\ProfilController@update')->name('updateprofil-penghuni')->middleware('cekPenghuni');


#Keluhan Penghuni
Route::get('/penghuni/keluhan', 'Penghuni\KeluhanController@index')->name('keluhan-penghuni')->middleware('cekPenghuni');
Route::post('/penghuni/simpankeluhan', 'Penghuni\KeluhanController@store')->name('simpankeluhan-penghuni')->middleware('cekPenghuni');
Route::get('/penghuni/riwayatkeluhan', 'Penghuni\KeluhanController@riwayat')->name('riwayatkeluhan-penghuni')->middleware('cekPenghuni');

#Pembayaran Penghuni
Route::get('/penghuni/pembayaran', 'Penghuni\PembayaranController@index')->name('pembayaran-penghuni')->middleware('cekPenghuni');
Route::get('/penghuni/ajukanpembayaran', 'Penghuni\PembayaranController@ajukan')->name('ajukanpembayaran-penghuni')->middleware('cekPenghuni');
Route::post('/penghuni/simpanpembayaran', 'Penghuni\PembayaranController@store')->name('simpanpembayaran-penghuni')->middleware('cekPenghuni');

#Routing Admin#
#Login Admin#
Route::get('/admin', 'Admin\AuthController@index');
Route::post('/admin/login', 'Admin\AuthController@login')->name('login-admin');
Route::get('/admin/home', 'Admin\HomeController@index')->name('home-admin')->middleware('cekAdmin');
Route::get('/admin/logout', 'Admin\AuthController@logout')->name('admin-logout');

#Data Penghuni#
Route::get('/admin/penghuni', 'Admin\PenghuniController@index')->name('penghuni-admin')->middleware('cekAdmin');
Route::get('/admin/tambahpenghuni', 'Admin\PenghuniController@create')->name('tambahpenghuni-admin')->middleware('cekAdmin');
Route::post('/admin/simpanpenghuni', 'Admin\PenghuniController@store')->name('simpanpenghuni-admin')->middleware('cekAdmin');
Route::get('/admin/editpenghuni/{id}', 'Admin\PenghuniController@edit')->name('editpenghuni-admin')->middleware('cekAdmin');
Route::patch('/admin/updatepenghuni/{id}', 'Admin\PenghuniController@update')->name('updatepenghuni-admin')->middleware('cekAdmin');
Route::get('/admin/detailpenghuni/{id}', 'Admin\PenghuniController@detail')->name('detailpenghuni-admin')->middleware('cekAdmin');
Route::patch('/admin/updatedetailpenghuni/{id}', 'Admin\PenghuniController@update_detail')->name('updatedetailpenghuni-admin')->middleware('cekAdmin');
Route::get('/admin/hapuspenghuni/{id}', 'Admin\PenghuniController@destroy')->name('hapuspenghuni-admin')->middleware('cekAdmin');

#Data Admin#
Route::get('/admin/admin', 'Admin\AdminController@index')->name('admin-admin')->middleware('cekAdmin');
Route::get('/admin/tambahadmin', 'Admin\AdminController@create')->name('tambahadmin-admin')->middleware('cekAdmin');
Route::post('/admin/simpanadmin', 'Admin\AdminController@store')->name('simpanadmin-admin')->middleware('cekAdmin');
Route::get('/admin/editadmin/{id}', 'Admin\AdminController@edit')->name('editadmin-admin')->middleware('cekAdmin');
Route::patch('/admin/updateadmin/{id}', 'Admin\AdminController@update')->name('updateadmin-admin')->middleware('cekAdmin');
Route::get('/admin/detailadmin/{id}', 'Admin\AdminController@detail')->name('detailadmin-admin')->middleware('cekAdmin');
Route::get('/admin/hapusadmin/{id}', 'Admin\AdminController@destroy')->name('hapusadmin-admin')->middleware('cekAdmin');

#Data Fasilitas#
Route::get('/admin/fasilitas', 'Admin\FasilitasController@index')->name('fasilitas-admin')->middleware('cekAdmin');
Route::get('/admin/tambahfasilitas', 'Admin\FasilitasController@create')->name('tambahfasilitas-admin')->middleware('cekAdmin');
Route::post('/admin/simpanfasilitas', 'Admin\FasilitasController@store')->name('simpanfasilitas-admin')->middleware('cekAdmin');
Route::get('/admin/editfasilitas/{id}', 'Admin\FasilitasController@edit')->name('editfasilitas-admin')->middleware('cekAdmin');
Route::patch('/admin/updatefasilitas/{id}', 'Admin\FasilitasController@update')->name('updatefasilitas-admin')->middleware('cekAdmin');
Route::get('/admin/detailfasilitas/{id}', 'Admin\FasilitasController@detail')->name('detailfasilitas-admin')->middleware('cekAdmin');
Route::get('/admin/hapusfasilitas/{id}', 'Admin\FasilitasController@destroy')->name('hapusfasilitas-admin')->middleware('cekAdmin');

#Data Cabang#
Route::get('/admin/cabang', 'Admin\CabangController@index')->name('cabang-admin')->middleware('cekAdmin');
Route::get('/admin/tambahcabang', 'Admin\CabangController@create')->name('tambahcabang-admin')->middleware('cekAdmin');
Route::post('/admin/simpancabang', 'Admin\CabangController@store')->name('simpancabang-admin')->middleware('cekAdmin');
Route::get('/admin/editcabang/{id}', 'Admin\CabangController@edit')->name('editcabang-admin')->middleware('cekAdmin');
Route::patch('/admin/updatecabang/{id}', 'Admin\CabangController@update')->name('updatecabang-admin')->middleware('cekAdmin');
Route::get('/admin/detailcabang/{id}', 'Admin\CabangController@detail')->name('detailcabang-admin')->middleware('cekAdmin');
Route::get('/admin/hapuscabang/{id}', 'Admin\CabangController@destroy')->name('hapuscabang-admin')->middleware('cekAdmin');

#Data Kamar#
Route::get('/admin/kamar', 'Admin\KamarController@index')->name('kamar-admin')->middleware('cekAdmin');
Route::get('/admin/tambahkamar', 'Admin\KamarController@create')->name('tambahkamar-admin')->middleware('cekAdmin');
Route::post('/admin/simpankamar', 'Admin\KamarController@store')->name('simpankamar-admin')->middleware('cekAdmin');
Route::get('/admin/editkamar/{id}', 'Admin\KamarController@edit')->name('editkamar-admin')->middleware('cekAdmin');
Route::patch('/admin/updatekamar/{id}', 'Admin\KamarController@update')->name('updatekamar-admin')->middleware('cekAdmin');
Route::get('/admin/detailkamar/{id}', 'Admin\KamarController@detail')->name('detailkamar-admin')->middleware('cekAdmin');
Route::get('/admin/hapuskamar/{id}', 'Admin\KamarController@destroy')->name('hapuskamar-admin')->middleware('cekAdmin');

#Data Sewa#
Route::get('/admin/sewa', 'Admin\SewaController@index')->name('sewa-admin')->middleware('cekAdmin');
Route::get('/admin/tambahsewa', 'Admin\SewaController@create')->name('tambahsewa-admin')->middleware('cekAdmin');
Route::post('/admin/simpansewa', 'Admin\SewaController@store')->name('simpansewa-admin')->middleware('cekAdmin');
Route::get('/admin/editsewa/{id}', 'Admin\SewaController@edit')->name('editsewa-admin')->middleware('cekAdmin');
Route::patch('/admin/updatesewa/{id}', 'Admin\SewaController@update')->name('updatesewa-admin')->middleware('cekAdmin');
Route::get('/admin/detailsewa/{id}', 'Admin\SewaController@detail')->name('detailsewa-admin')->middleware('cekAdmin');
Route::get('/admin/hapussewa/{id}', 'Admin\SewaController@destroy')->name('hapussewa-admin')->middleware('cekAdmin');

#Data Pembayaran#
Route::get('/admin/pembayaran', 'Admin\PembayaranController@index')->name('pembayaran-admin')->middleware('cekAdmin');
Route::get('/admin/tambahpembayaran', 'Admin\PembayaranController@create')->name('tambahpembayaran-admin')->middleware('cekAdmin');
Route::post('/admin/simpanpembayaran', 'Admin\PembayaranController@store')->name('simpanpembayaran-admin')->middleware('cekAdmin');
Route::get('/admin/editpembayaran/{id}', 'Admin\PembayaranController@edit')->name('editpembayaran-admin')->middleware('cekAdmin');
Route::patch('/admin/updatepembayaran/{id}', 'Admin\PembayaranController@update')->name('updatepembayaran-admin')->middleware('cekAdmin');
Route::get('/admin/detailpembayaran/{id}', 'Admin\PembayaranController@detail')->name('detailpembayaran-admin')->middleware('cekAdmin');
Route::get('/admin/hapuspembayaran/{id}', 'Admin\PembayaranController@destroy')->name('hapuspembayaran-admin')->middleware('cekAdmin');
Route::get('/admin/eksportpembayaran', 'Admin\PembayaranController@export')->name('eksportpembayaran-admin')->middleware('cekAdmin');
Route::get('/admin/konfirmasipembayaran/{id}', 'Admin\PembayaranController@konfirmasi')->name('konfirmasipembayaran-admin')->middleware('cekAdmin');

#Data Pengeluaran#
Route::get('/admin/pengeluaran', 'Admin\PengeluaranController@index')->name('pengeluaran-admin')->middleware('cekAdmin');
Route::get('/admin/tambahpengeluaran', 'Admin\pengeluaranController@create')->name('tambahpengeluaran-admin')->middleware('cekAdmin');
Route::post('/admin/simpanpengeluaran', 'Admin\pengeluaranController@store')->name('simpanpengeluaran-admin')->middleware('cekAdmin');
Route::get('/admin/editpengeluaran/{id}', 'Admin\pengeluaranController@edit')->name('editpengeluaran-admin')->middleware('cekAdmin');
Route::patch('/admin/updatepengeluaran/{id}', 'Admin\pengeluaranController@update')->name('updatepengeluaran-admin')->middleware('cekAdmin');
Route::get('/admin/detailpengeluaran/{id}', 'Admin\pengeluaranController@detail')->name('detailpengeluaran-admin')->middleware('cekAdmin');
Route::get('/admin/hapuspengeluaran/{id}', 'Admin\pengeluaranController@destroy')->name('hapuspengeluaran-admin')->middleware('cekAdmin');
Route::get('/admin/eksportpengeluaran', 'Admin\PengeluaranController@export')->name('eksportpengeluaran-admin')->middleware('cekAdmin');

#Data Pemesanan#
Route::get('/admin/pemesanan', 'Admin\PemesananController@index')->name('pemesanan-admin')->middleware('cekAdmin');
Route::get('/admin/pemesanan/{type}/{id}', 'Admin\PemesananController@updateStatus')->name('updatepemesanan-admin')->middleware('cekAdmin');

#Data Keluhan#
Route::get('/admin/keluhan', 'Admin\KeluhanController@index')->name('keluhan-admin')->middleware('cekAdmin');
Route::get('/admin/keluhan/{type}/{id}', 'Admin\KeluhanController@updateStatus')->name('updatekeluhan-admin')->middleware('cekAdmin');
Route::get('/admin/hapuskeluhan/{id}', 'Admin\KeluhanController@destroy')->name('hapuskeluhan-admin')->middleware('cekAdmin');