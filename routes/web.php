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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()){
        return redirect('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product', 'AdminController@showCRUD')->name('product');

Route::post('/productUpdate', 'AdminController@productUpdate')->name('productUpdate');
Route::post('/productDelete', 'AdminController@productDelete')->name('productDelete');
Route::post('/productLoadMore', 'AdminController@productLoadMore')->name('productLoadMore');

