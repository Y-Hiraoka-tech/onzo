<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

    Route::get('/register/artist', 'App\Http\Controllers\ArtistRegisterController@create' )->name('register.artist');
    Route::get('/register/artist/store', 'App\Http\Controllers\ArtistRegisterController@store');
    Route::post('/register/artist/store', 'App\Http\Controllers\ArtistRegisterController@store');
    Route::get('/register/artist/2', 'App\Http\Controllers\ArtistRegisterController@create2' )->name('register.artist.2');
    Route::get('/register/artist/store/2', 'App\Http\Controllers\ArtistRegisterController@store2');
    Route::post('/register/artist/store/2', 'App\Http\Controllers\ArtistRegisterController@store2');

    Route::get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

//home画面からの遷移
    Route::get('home', 'App\Http\Controllers\ArtistsController@index' )->name('home');
    Route::get('{id}/top', 'App\Http\Controllers\ArtistsController@show')->name('artist.top');
    Route::get('music/{id}', 'App\Http\Controllers\MusicController@show')->name('music.id');
    Route::get('gift/select/', 'App\Http\Controllers\GiftController@show')->name('gift.select');
    Route::get('gift/form/{id}', 'App\Http\Controllers\GiftController@form')->name('gift.form.id');

//search画面からの遷移
    Route::get('search','App\Http\Controllers\UserController@index')->name('search');
    Route::get('/searchresult','App\Http\Controllers\UserController@serch')->name('searchresult');
    Route::get('/follow/user/{id}','App\Http\Controllers\UserController@userprofile')->name('follow.user');

//Community画面からの遷移
    Route::get('community', function(){
        return view('ruts.community');
        })->name('community');

//profile画面からの遷移
    Route::get('/profile', 'App\Http\Controllers\UserController@show')->name('profile');
    Route::get('/profile/artist', 'App\Http\Controllers\ArtistsController@profile')->name('profile.artist');

    Route::get('/setting','App\Http\Controllers\EditAccountController@index')->name('setting');
    Route::get('/setting/artist','App\Http\Controllers\EditArtistAccountController@index')->name('setting.artist');

    Route::get('/follow/requests','App\Http\Controllers\UserController@requests')->name('follow.requests');
    Route::get('/followrequest/user/{id}','App\Http\Controllers\UserController@request')->name('followrequest.user');

    Route::get('/editaccount/{id}','App\Http\Controllers\EditAccountController@edit')->name('account.edit');
    Route::post('/editaccount/update', 'App\Http\Controllers\EditAccountController@update')->name('account.update');

    Route::get('/purchase/gift/','App\Http\Controllers\GiftController@purchase')->name('purchase.gift');
    
    Route::get('register/confirm', function(){
        return view('ruts.usercomfirm');
        })->name('register.comfirm');
      
    Route::get('/register/2', function(){
        return view('ruts.userimage');
        })->name('register.2');
        
    Route::post('/register/2','App\Http\Controllers\adduserController@storeMyImg');
});    

Route::get('admin/login','App\Http\Controllers\Auth\AdminLoginController@loginView')->name('admin.login');
Route::post('admin/login','App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.post');

Route::get('artist/login','App\Http\Controllers\Auth\ArtistLoginController@loginView')->name('artist.login');
Route::post('artist/login','App\Http\Controllers\Auth\ArtistLoginController@login')->name('artist.login.post');


//Artist権限をつける
Route::group(['middleware' => ['artist']], function(){
    //これをやるとshowの場合画像などが読み込まれなくなる　why？
    Route::get('posts', 'App\Http\Controllers\PostController@index')->name('post.index');
    Route::get('posts/show/{id}', 'App\Http\Controllers\PostController@show')->name('post.show');
    Route::get('posts/create', 'App\Http\Controllers\PostController@create')->name('post.create');
    Route::get('posts/store', 'App\Http\Controllers\PostController@store');
    Route::post('posts/store', 'App\Http\Controllers\PostController@store');


    Route::get('posts/edit/{id}', 'App\Http\Controllers\PostController@edit');
    Route::post('posts/update', 'App\Http\Controllers\PostController@update')->name('post.update');
    Route::delete('posts/delete/{id}', 'App\Http\Controllers\PostController@destroy');
});


Route::group(['middleware' => ['admin']], function(){
    Route::resource('musics', 'App\Http\Controllers\PostController', ['only' => ['index','show', 'create', 'store',]]);
    Route::get('musics/edit/{id}', 'App\Http\Controllers\PostController@edit');
    Route::post('musics/update', 'App\Http\Controllers\PostController@update')->name('music.update');
    Route::delete('musics/delete/{id}', 'App\Http\Controllers\PostController@destroy');

    Route::get('editusers', 'App\Http\Controllers\EditUserController@index')->name('edituser');
    Route::get('editusers/edit/{id}','App\Http\Controllers\EditUserController@edit');
    Route::post('editusers/update', 'App\Http\Controllers\EditUserController@update')->name('user.update');
    Route::delete('editusers/delete/{id}', 'App\Http\Controllers\EdituserController@destroy');
});

Auth::routes();
