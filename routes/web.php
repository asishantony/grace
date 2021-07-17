<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ClientHomeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GalleryController;


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
Route:: get('/', [ClientHomeController::class, 'home'])->name('home');
Route:: get('/page/{slug}',[ClientHomeController::class,'view']);

//Auth Middleware Group
Route::middleware(['auth'])->group(function () {
    Route:: get('/admin/news/',[NewsController::class,'index']);
    Route:: post('/admin/news/save',[NewsController::class,'store']);
    Route:: get('/admin/news/{id}',[NewsController::class,'show']);
    Route:: get('/admin/news/{id}/edit',[NewsController::class,'edit']);
    Route:: patch('/admin/news/{id}',[NewsController::class,'update']);
    Route:: post('/admin/news/delete',[NewsController::class,'destroy']);
    Route:: post('/admin/news/toggle-status',[NewsController::class,'toggleStatus']);
    Route:: post('/admin/news/toggle-featured',[NewsController::class,'toggleFeatured']);

    Route:: get('/admin/album/',[AlbumController::class,'index']);
    Route:: post('/admin/album/save',[AlbumController::class,'store']);
    Route:: get('/admin/album/{id}',[AlbumController::class,'show']);
    Route:: get('/admin/album/{id}/edit',[AlbumController::class,'edit']);
    Route:: patch('/admin/album/{id}',[AlbumController::class,'update']);
    Route:: post('/admin/album/delete',[AlbumController::class,'destroy']);
    Route:: post('/admin/album/toggle-status',[AlbumController::class,'toggleStatus']);
    Route:: post('/admin/album/toggle-featured',[AlbumController::class,'toggleFeatured']);

    Route:: get('/admin/gallery/',[GalleryController::class,'index']);
    Route:: post('/admin/gallery/save',[GalleryController::class,'store']);
    Route:: get('/admin/gallery/{id}',[GalleryController::class,'show']);
    Route:: get('/admin/gallery/{id}/edit',[GalleryController::class,'edit']);
    Route:: patch('/admin/gallery/{id}',[GalleryController::class,'update']);
    Route:: post('/admin/gallery/delete',[GalleryController::class,'destroy']);
    Route:: post('/admin/gallery/toggle-status',[GalleryController::class,'toggleStatus']);
    Route:: post('/admin/gallery/toggle-featured',[GalleryController::class,'toggleFeatured']);

    Route:: get('/admin/site_settings/',[SiteSettingController::class,'index']);
    Route:: post('/admin/site_settings/info/{id}',[SiteSettingController::class,'updateInfo']);
    Route:: post('/admin/site_settings/social/{id}',[SiteSettingController::class,'updateSocial']);
    Route:: post('/admin/site_settings/basic/{id}',[SiteSettingController::class,'updateBasic']);


    Route:: get('/admin/dashboard', [PageController::class, 'blankPage']);
    Route:: get('/page-collapse', [PageController::class, 'collapsePage']);

    // locale route
    Route:: get('lang/{locale}', [LanguageController::class, 'swap']);
    Route:: get('/admin/logout', [LogoutController::class, 'destroy'])
                    ->name('logout');
    });
Auth:: routes(['verify' => false]);

