<?php

use App\Models\Post;
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

Auth::routes();

Route::group(['middleware' => ['auth', 'verified']], function(){

    Route::get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

    Route::get('home', function(){
    return view('ruts.home');
    })->name('home');

    Route::get('search','App\Http\Controllers\UserController@index')->name('search');
    Route::get('/searchresult','App\Http\Controllers\UserController@serch')->name('searchresult');

    Route::get('community', function(){
        return view('ruts.community');
        })->name('community');

    Route::get('/profile', 'App\Http\Controllers\UserController@show')->name('profile');

    Route::get('/edit','App\Http\Controllers\EditAccountController@index')->name('edit');
    Route::get('/edit/editaccount/{id}','App\Http\Controllers\EditAccountController@edit')->name('account.edit');
    Route::post('/editaccount/update', 'App\Http\Controllers\EditAccountController@update')->name('account.update');
    
    Route::get('/userimage', function(){
        return view('ruts.userimage');
        })->name('userimage');
        
    Route::post('/userimage','App\Http\Controllers\adduserController@storeMyImg');
});    

Route::get('admin/login','App\Http\Controllers\Auth\AdminLoginController@loginView')->name('admin.login');
Route::post('admin/login','App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.post');

Route::get('artist/login','App\Http\Controllers\Auth\ArtistLoginController@loginView')->name('artist.login');
Route::post('artist/login','App\Http\Controllers\Auth\ArtistLoginController@login')->name('artist.login.post');

//Artist権限をつける
Route::group(['middleware' => ['artist']], function(){
    Route::resource('posts', 'App\Http\Controllers\PostController', ['only' => ['index','show', 'create', 'store',]]);
    Route::get('posts/edit/{id}', 'App\Http\Controllers\PostController@edit');
    Route::post('posts/update', 'App\Http\Controllers\PostController@update')->name('post.update');
    Route::post('posts/delete/{id}', 'App\Http\Controllers\PostController@destroy');
});


Route::group(['middleware' => ['admin']], function(){
    Route::resource('musics', 'App\Http\Controllers\PostController', ['only' => ['index','show', 'create', 'store',]]);
    Route::get('musics/edit/{id}', 'App\Http\Controllers\PostController@edit');
    Route::post('musics/update', 'App\Http\Controllers\PostController@update')->name('music.update');
    Route::post('musics/delete/{id}', 'App\Http\Controllers\PostController@destroy');

    Route::get('editusers', 'App\Http\Controllers\EditUserController@index')->name('edituser');
    Route::get('editusers/edit/{id}','App\Http\Controllers\EditUserController@edit');
    Route::post('editusers/update', 'App\Http\Controllers\EditUserController@update')->name('user.update');
    Route::post('editusers/delete/{id}', 'App\Http\Controllers\EdituserController@destroy');
});

Auth::routes();
