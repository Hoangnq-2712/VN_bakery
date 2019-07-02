<?php 

 //route quản lý sản phẩm
    Route::get('san-pham','ProductController@index')->name('san-pham');
    Route::get('anh-chi-tiet/{id}','ProductController@imagedetails')->name('anh-chi-tiet');
    Route::get('them-san-pham','ProductController@add')->name('them-san-pham');
    Route::post('them-san-pham','ProductController@store')->name('them-san-pham');
    Route::get('sua-san-pham/{id}','ProductController@edit')->name('sua-san-pham');
    Route::put('sua-san-pham/{id}','ProductController@update')->name('sua-san-pham.update');
    Route::get('xoa-san-pham/{id}','ProductController@destroy')->name('xoa-san-pham');
 ?>