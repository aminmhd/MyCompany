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


Route::get('/', 'HomeController@login')->name('app.home.login');
Route::post('/', 'HomeController@DoLogin');
Route::post('app/register', 'HomeController@DoRegister')->name('app.home.register');
Route::get('app/logout', 'HomeController@Logout')->name('app.home.logout');
//profile
Route::get('app/profile', 'HomeController@profile')->name('app.home.profile');
Route::get('app/profile/edit', 'HomeController@edit')->name('app.home.edit.profile');
Route::post('app/profile/edit', 'HomeController@store')->name('app.home.edit.profile.store');
Route::get('app/profile/update/{profile_id}', 'HomeController@change')->name('app.home.update.profile');
Route::post('app/profile/update/{profile_id}', 'HomeController@update')->name('app.home.update.profile.store');
//gallery
Route::get('app/gallery', 'GalleryController@index')->name('upload.gallery.picture');
Route::post('app/gallery', 'GalleryController@store')->name('upload.gallery.store');




Route::post('app/profile/admin/message', 'MessageController@message')->name('app.home.message.profile');





/*Route::get('app/profile' , 'HomeController@index')->name('app.home.profile');*/






Route::group(['prefix' => 'admin' , 'middleware' => 'auth_check'], function () {
    Route::get('app/index', 'UserController@index')->name('app.index');
    Route::get('app/create', 'UserController@create')->name('app.create.user');
    Route::post('app/create', 'UserController@store')->name('app.store.user');
    Route::get('app/show/table', 'UserController@show')->name('app.show.table');
    Route::get('app/user/deleted/{id}', 'UserController@destroy')->name('app.user.delete');
    Route::get('app/user/edit/{id}', 'UserController@edit')->name('app.user.edit');
    Route::post('app/user/edit/{id}', 'UserController@update')->name('app.user.update');
    Route::get('app/blog/create' , 'BlogController@create')->name('app.blog.create');
    Route::post('app/blog/create' , 'BlogController@store')->name('app.blog.store');
    Route::get('app/blog/table' , 'BlogController@show')->name('app.blog.show');
    Route::get('app/blog/delete/{blog_id}' , 'BlogController@destroy')->name('app.blog.delete');
    Route::get('app/blog/edit/{blog_id}' , 'BlogController@edit')->name('app.blog.edit');
    Route::post('app/blog/edit/{blog_id}' , 'BlogController@update')->name('app.blog.update');
    /* Route::get('app/user/modal/{id}' , 'UserController@modal')->name('app.user.modal');*/

});
