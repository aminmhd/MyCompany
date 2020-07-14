<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'] , function () {
    Route::get('app/index', 'UserController@index')->name('app.index');
    Route::get('app/create' , 'UserController@create')->name('app.create.user');
    Route::post('app/create' , 'UserController@store')->name('app.store.user');
    Route::get('app/show/table' , 'UserController@show')->name('app.show.table');
    Route::get('app/user/deleted/{id}' , 'UserController@destroy')->name('app.user.delete');
    Route::get('app/user/edit/{id}' , 'UserController@edit')->name('app.user.edit');
    Route::post('app/user/edit/{id}' , 'UserController@update')->name('app.user.update');
   /* Route::get('app/user/modal/{id}' , 'UserController@modal')->name('app.user.modal');*/

});
