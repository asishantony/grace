<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ClientHomeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SiteSettingController;


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

// Page Route
// Route::get('/', [PageController::class, 'blankPage'])->middleware('verified');
Route::get('/', [ClientHomeController::class, 'home'])->name('home');
Route::get('/page/{slug}',[ClientHomeController::class,'view']);
Route::get('/admin/news/',[NewsController::class,'index']);
Route::get('/admin/site_settings/',[SiteSettingController::class,'index']);
Route::post('/admin/site_settings/info/{id}',[SiteSettingController::class,'updateInfo']);
Route::post('/admin/site_settings/social/{id}',[SiteSettingController::class,'updateSocial']);
Route::post('/admin/site_settings/basic/{id}',[SiteSettingController::class,'updateBasic']);
Route::get('/dashboard', [PageController::class, 'blankPage'])->middleware('auth');
Route::get('/page-collapse', [PageController::class, 'collapsePage']);

// locale route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::post('/logout', [LogoutController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
Auth::routes(['verify' => false]);

