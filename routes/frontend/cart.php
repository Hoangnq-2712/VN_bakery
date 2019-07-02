<?php 
	//gio hang
Route::get('/gio-hang/{id}', 'HomeController@addToCart')->name('addToCart');
Route::get('/view-cart', 'HomeController@viewCart')->name('viewCart');


Route::get('update', 'HomeController@capnhat');
Route::get('gio-hang/xoa/{rowId}', 'HomeController@removeCart')->name('cart.delete');
Route::get('/huy-gio-hang', function () {
	Cart::destroy();
	return redirect('/');
})->name('destroyCart');

//route thanh toan
Route::get('/thanh-toan', 'HomeController@getcheckOut')->name('getcheckOut');
Route::post('/dat-hang', 'HomeController@postCheckOut')->name('postCheckOut');
Route::post('/dat-hang-thanh-cong', 'HomeController@bill')->name('bill');
//route lich sử đơn hàng
Route::get('/lich-su-don-hang', 'HomeController@historyCart')->name('historyCart');



?>