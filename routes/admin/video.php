<?php 
  //route quản lý video
    Route::get('danh-sach-video','VideoController@index')->name('danh-sach-video');
    Route::get('them-video','VideoController@add')->name('them-video');
    Route::post('them-video','VideoController@store')->name('them-video');
    Route::get('sua-video/{id}','VideoController@edit')->name('sua-video');
    Route::put('sua-video/{id}','VideoController@update')->name('video.update');
    Route::get('xoa-video/{id}','VideoController@destroy')->name('xoa-video');
 ?>