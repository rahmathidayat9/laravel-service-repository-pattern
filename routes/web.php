<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home.index');
Route::get('home/blog/{slug}', [HomeController::class, 'blogShow'])->name('home.blog.show');

Route::middleware('auth')->group(function() {
	Route::resource('blog', BlogController::class);
	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
	Route::resource('user', UserController::class);
});