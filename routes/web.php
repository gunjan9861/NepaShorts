<?php

use App\Http\Controllers\AboutTypeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
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
Route::redirect('/home', '/admin/home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('about-type', AboutTypeController::class);
    Route::resource('about', AboutUsController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('site-settings', SiteSettingController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('projects', ProjectController::class);
});
