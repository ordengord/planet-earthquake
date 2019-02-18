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

Route::get('/today', 'DiagramController@today')->name('today');

Route::group(['prefix' => '/order', 'middleware' => 'auth'], function () {

    Route::any('/', 'OrderController@create')->name('order');

    //Route::any('/payment', 'TransactionController@payment')->name('transaction');

    Route::any('/transaction', 'TransactionController@create')->name('create-transaction');

    Route::get('/show', 'OrderController@show')->name('my-orders');

    Route::post('/show', 'OrderController@delete')->name('order-delete');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/diagram/upload', function () {
        return view('admin.upload');
    })->name('admin.upload');

    Route::post('/diagram/upload', [
        'uses' => 'DiagramController@store',
        'as' => 'admin.upload-store'
    ]);

    Route::get('/{table}/showtime', 'AdminController@showTime')->name('admin.showtime');

    Route::post('/{table}/showtime/update', 'AdminController@updateTableRow')->name('admin.showtime.update');
    Route::post('/{table}/showtime/delete', 'AdminController@deleteTableRow')->name('admin.showtime.delete');

});







