<?php

    //route quản lý banner
Route::get('don-hang','OrderController@index')->name('don-hang');
Route::get('don-hang/chi-tiet-don-hang/{id}','OrderDetailsController@index')->name('chi-tiet-don-hang');
Route::get('sua-don-hang/{id}','OrderController@edit')->name('sua-don-hang');
Route::put('sua-don-hang/{id}','OrderController@update')->name('sua-don-hang.update');
Route::get('xoa-don-hang/{id}','OrderController@destroy')->name('xoa-don-hang');
Route::post('order/ajax','OrderController@ajax')->name('order.ajax');
Route::post('order/a','OrderController@aj')->name('order1.ajax');

?>