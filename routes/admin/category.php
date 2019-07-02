<?php

	 //route quản lý category
    Route::get('danh-muc','CategoryController@index')->name('danh-muc');
    Route::get('them-danh-muc','CategoryController@add')->name('them-danh-muc');
    Route::post('them-danh-muc','CategoryController@store')->name('them-danh-muc');
    Route::get('sua-danh-muc/{id}','CategoryController@edit')->name('sua-danh-muc');
    Route::put('sua-danh-muc/{id}','CategoryController@update')->name('danh-muc.update');
    Route::get('xoa-danh-muc/{id}','CategoryController@destroy')->name('xoa-danh-muc');

?>