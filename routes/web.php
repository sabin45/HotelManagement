<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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
    return view('index');
});

//Route::get('/aboutpage', 'FrontendController@aboutpage')->name('aboutpage');
Route::get('/random', [FrontendController::class, 'aboutpage'])->name('aboutpage');;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('about','App\Http\Controllers\AboutController');
Route::resource('blogs','App\Http\Controllers\BlogsController');
Route::resource('rooms','App\Http\Controllers\RoomsController');
Route::resource('sliders','App\Http\Controllers\SlidersController');
Route::resource('files','App\Http\Controllers\FilesController');
Route::get('/status/update', [FilesController::class, 'updateStatus']);





