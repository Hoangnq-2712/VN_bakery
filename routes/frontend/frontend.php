<?php

Route::get('/','FrontendController@index')->name('getHome');//route trang chủ


Route::get('/tin-tuc', 'FrontendController@getBlog')->name('getBlog');//route tin tuc
Route::get('chi-tiet-tin-tuc/{id}','FrontendController@getBlogDetails')->name('getBlogDetails');//route chi tiết tin tức

Route::get('/san-pham', 'FrontendController@getProduct')->name('getProduct');//route san pham


Route::get('chi-tiet-san-pham/{id}','FrontendController@getProductDetail')->name('getDetail');//route chi tiết sản phẩm

Route::get('/san-pham-giam-gia','FrontendController@getProductSale')->name('getProductSale');//route sản phẩm giảm giá

Route::get('/Album', 'FrontendController@getAlbum')->name('getAlbum');//route Album sản phẩm


Route::get('/Video', 'FrontendController@getVideo')->name('getVideo');//route video 

Route::get('/gioi-thieu', 'FrontendController@getAbout')->name('getAbout');//route Giới thiệu


Route::post('/tim-kiem/','FrontendController@searchProduct')->name('searchProduct');//route tìm kiếm

Route::get('/lien-he/', 'FrontendController@getContact')->name('getContact');//route liên hệ

Route::get('/tuyen-dung/', 'HomeController@getTuyenDung')->name('getTuyenDung');//route tuyển dụng

Route::post('/tuyen-dung/', 'HomeController@postTuyenDung')->name('postTuyenDung');//route tuyển dụng phương thức post
Route::get('/danh-muc/{slug}', 'FrontendController@cateProduct')->name('cateProduct');//sản phẩm theo danh mục


Route::get('/Cap-nhat-tai-khoan/{id}','HomeController@getAccount')->name('getAccount');//route cập nhật tài khoản
 Route::put('/Cap-nhat-tai-khoan/{id}','HomeController@postAccount')->name('postAccount.update');

//route post lưu tài khoản
 require_once('cart.php');
?>