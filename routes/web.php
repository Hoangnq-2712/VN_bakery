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


require_once('admin/backend.php');
//Route admin


require_once('frontend/frontend.php');
// Route frontend
 

 //route đăng xuất
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('getHome');
    })->name('logout');






//gio hang
// Route::get('/gio-hang/{id}', 'HomeController@addToCart')->name('addToCart');
// Route::get('/view-cart', 'HomeController@viewCart')->name('viewCart');


// Route::post('gio-hang/cap-nhat', 'HomeController@updateCart')->name('cart.update');
// Route::get('gio-hang/xoa/{rowId}', 'HomeController@removeCart')->name('cart.delete');

//route thanh toan
// Route::get('/thanh-toan', 'HomeController@getcheckOut')->name('getcheckOut');
// Route::post('/dat-hang', 'HomeController@postCheckOut')->name('postCheckOut');

// route san pham
// Route::get('/danh-muc/{name}', 'FrontendController@catProduct')->name('cateProduct');
// Route::get('/san-pham/{id}', 'HomeController@detailProduct')->name('detailProduct');




