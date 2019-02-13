<?php
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect()->route('about');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::any('/contact', 'ChatController')->name('contact');

Route::any('/order', 'OrderController')->name('order');

Route::post('/order/transaction', 'TransactionController')->name('transaction');

Route::get('/my-orders', 'HomeController@myOrders')->name('my-orders');

/*Route::get('/demonstrate', [
    'uses' => 'GmapController@demonstrate',
    'as' => 'demonstrate',
]);*/




