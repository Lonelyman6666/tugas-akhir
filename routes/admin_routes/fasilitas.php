<?php

Route::get('/admin/fasilitas', 'Admin\FasilitasController@index')->name('fasilitas-admin');
Route::get('/admin/tambahfasilitas', 'Admin\FasilitasController@create')->name('tambahfasilitas-admin');
Route::post('/admin/simpanfasilitas', 'Admin\FasilitasController@store')->name('simpanfasilitas-admin');
Route::get('/admin/editfasilitas/{id}', 'Admin\FasilitasController@edit')->name('editfasilitas-admin');
Route::patch('/admin/updatefasilitas/{id}', 'Admin\FasilitasController@update')->name('updatefasilitas-admin');
Route::get('/admin/detailfasilitas/{id}', 'Admin\FasilitasController@detail')->name('detailfasilitas-admin');
Route::get('/admin/hapusfasilitas/{id}', 'Admin\FasilitasController@destroy')->name('hapusfasilitas-admin');

?>