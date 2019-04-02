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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('image-gallery', 'ImageGalleryController@index');
// Route::post('image-gallery', 'ImageGalleryController@upload');
// Route::delete('image-gallery/{id}', 'ImageGalleryController@destroy');



Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// Esta parte é referente ao tutorial: https://itsolutionstuff.com/post/laravel-56-user-roles-and-permissions-acl-using-spatie-tutorialexample.html
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');

    Route::get('image-gallery', 'ImageGalleryController@index');
    Route::post('image-gallery', 'ImageGalleryController@upload');
    Route::delete('image-gallery/{id}', 'ImageGalleryController@destroy');
   
});
