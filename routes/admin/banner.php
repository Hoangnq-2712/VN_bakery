<?php

    //route quản lý banner
    Route::get('banner','BannerController@index')->name('banner');
    Route::get('them-banner','BannerController@add')->name('them-banner');
    Route::post('them-banner','BannerController@store')->name('them-banner');
    Route::get('sua-banner/{id}','BannerController@edit')->name('sua-banner');
    Route::put('sua-banner/{id}','BannerController@update')->name('sua-banner.update');
    Route::get('xoa-banner/{id}','BannerController@destroy')->name('xoa-banner');

?>