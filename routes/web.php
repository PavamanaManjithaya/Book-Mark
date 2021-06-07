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
    return view('wel');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\BookmarksController::class, 'index'])->name('home');
Route::POST('store', ['as'=>'bookmarks.store','uses'=>'App\Http\Controllers\BookmarksController@store']);
Route::delete('/bookmarks/{id}','App\Http\Controllers\BookmarksController@destroy');