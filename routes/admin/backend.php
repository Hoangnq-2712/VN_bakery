<?php
/**
 * Created by PhpStorm.
 * User: quoch
 * Date: 3/11/2019
 * Time: 9:52 PM
 * ,'middleware'=>'auth'
 */

Route::group(['namespace' => 'Backend', 'prefix' => 'admin','middleware' => ['Checklevel','auth']], function () {


    Route::get('/', function () {
     return view('admin.home.index');
 })->name('admin');

   require_once('category.php');
   require_once('banner.php');
   require_once('user.php');
   require_once('post.php');
   require_once('product.php');
   require_once('video.php');
   require_once('order.php');


    //route quản lý liên hệ 
    Route::get('danh-sach-yeu-cau','ContactController@index')->name('lien-he');

    Route::get('quan-ly-hinh-anh',function(){

        return view('admin.home.image');

    })->name('quan-ly-hinh-anh');

    //Route::post('order/ajax','OrderController@ajax')->name('order.ajax');
    //Route::post('order/a','OrderController@aj')->name('order1.ajax');
   // Route::get('/don-hang/{id}', 'OrderDetailController@index')->name('don-hang');

   
});
Auth::routes();
//Route admin
// Route::get('admin/login','Auth\LoginController@index')->name('admin');
// Route::post('admin/login','Backend\DashboardController@post_login')->name('login');
Route::get('/view', function () {
 return view('admin.layouts.backend');                                                                                                                                                                                                                                                                                                                                   
});
