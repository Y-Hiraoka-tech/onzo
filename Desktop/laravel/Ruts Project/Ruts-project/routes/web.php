<?php
use App\Http\Controllers\PostController;
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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    Route::get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

    Route::get('home', function(){
    return view('ruts.home');
    })->name('home');

    Route::get('search', function(){
        return view('ruts.search');
        })->name('search');

    Route::get('community', function(){
        return view('ruts.community');
        })->name('community');

    Route::get('profile', function(){
        return view('ruts.profile');
        })->name('profile');

    Route::get('edit', function(){
        return view('ruts.edit');
        })->name('edit');

    Route::resource('posts', 'App\Http\Controllers\PostController', ['only' => ['index','show', 'create', 'store',]]);
    Route::get('posts/edit/{id}', 'App\Http\Controllers\PostController@edit');
    Route::post('posts/update', 'App\Http\Controllers\PostController@update')->name('post.update');
    Route::post('posts/delete/{id}', 'App\Http\Controllers\PostController@destroy');
});