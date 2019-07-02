<?php 

	 //ropute quản lý tin tức
    Route::get('tin-tuc','PostController@index')->name('tin-tuc');
    Route::get('them-tin-tuc','PostController@add')->name('them-tin-tuc');
    Route::post('them-tin-tuc','PostController@store')->name('them-tin-tuc');
    Route::get('sua-tin-tuc/{id}','PostController@edit')->name('sua-tin-tuc');
    Route::put('sua-tin-tuc/{id}','PostController@update')->name('tin-tuc.update');
    Route::get('xoa-tin-tuc/{id}','PostController@destroy')->name('xoa-tin-tuc');
 ?>