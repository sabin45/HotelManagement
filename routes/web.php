<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers;
use App\Http\Controllers\BlogsController;

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
Route::get('/aboutus', [FrontendController::class, 'aboutpage'])->name('aboutpage');
Route::get('/rooms', [FrontendController::class, 'roompage'])->name('roompage');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('about','App\Http\Controllers\AboutController');
Route::resource('blogs','App\Http\Controllers\BlogsController');
Route::resource('rooms','App\Http\Controllers\RoomsController');
Route::resource('sliders','App\Http\Controllers\SlidersController');
Route::resource('files','App\Http\Controllers\FilesController');

//admin route
Route::get('/FilesController/status/update/{id}/{st}',[FilesController::class,'file_status'])->name('file.status');
//admin about page route active inactive
Route::get('/status-update/{id}',[AboutController::class,'status_update'])->name('Aboutstatus.update');
//Route::get('/status-update/{id}',[BlogsController::class,'status_update'])->name('Blogstatus.update');






