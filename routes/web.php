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
use App\Http\Controllers\ProgrammesController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\GitController;
use App\Http\Controllers\TeamsController;

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
Route::get('/launch', [ClientHomeController::class, 'launch'])->name('launch');
Route::get('/launchButton', [ClientHomeController::class, 'launchButton'])->name('launchButton');
Route::get('/programmes', [ClientHomeController::class, 'programmes'])->name('programmes');
Route::get('/programmes/{id}', [ClientHomeController::class, 'showProgram'])->name('showProgram');
Route::get('/academics/{id}', [ClientHomeController::class, 'showAcademic'])->name('showAcademic');
Route::get('/message/{type}', [ClientHomeController::class, 'showMessage'])->name('showMessage');
Route::get('/page/{slug}', [ClientHomeController::class, 'view']);
Route::get('/gallery', [ClientHomeController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{album}', [ClientHomeController::class, 'galleryImages']);
Route::post('/contact-us', [ContactUsController::class, 'index'])->name('contact-us-email');
Route::post('/git-pull',[GitController::class,'pull'])->name('git-pull');


//Auth Middleware Group
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/news/', [NewsController::class, 'index'])->name('admin_news');
    Route::post('/admin/news/save', [NewsController::class, 'store']);
    Route::get('/admin/news/{id}', [NewsController::class, 'show']);
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit']);
    Route::put('/admin/news/{id}', [NewsController::class, 'update']);
    Route::post('/admin/news/delete', [NewsController::class, 'destroy']);
    Route::post('/admin/news/toggle-status', [NewsController::class, 'toggleStatus']);
    Route::post('/admin/news/toggle-featured', [NewsController::class, 'toggleFeatured']);


    Route::get('/admin/album/', [AlbumController::class, 'index']);
    Route::post('/admin/album/save', [AlbumController::class, 'store']);
    Route::get('/admin/album/{id}', [AlbumController::class, 'show']);
    Route::get('/admin/album/{id}/edit', [AlbumController::class, 'edit']);
    Route::patch('/admin/album/{id}', [AlbumController::class, 'update']);
    Route::post('/admin/album/delete', [AlbumController::class, 'destroy']);
    Route::post('/admin/album/toggle-status', [AlbumController::class, 'toggleStatus']);
    Route::post('/admin/album/toggle-featured', [AlbumController::class, 'toggleFeatured']);

    Route::get('/admin/facilities/', [FacilitiesController::class, 'index'])->name('admin_facilities');
    Route::post('/admin/facilities/save', [FacilitiesController::class, 'store']);
    Route::get('/admin/facilities/{id}', [FacilitiesController::class, 'show']);
    Route::get('/admin/facilities/{id}/edit', [FacilitiesController::class, 'edit']);
    Route::put('/admin/facilities/{id}', [FacilitiesController::class, 'update']);
    Route::post('/admin/facilities/delete', [FacilitiesController::class, 'destroy']);
    Route::post('/admin/facilities/toggle-status', [FacilitiesController::class, 'toggleStatus']);
    Route::post('/admin/facilities/toggle-featured', [FacilitiesController::class, 'toggleFeatured']);

    Route::get('/admin/teams/', [TeamsController::class, 'index'])->name('admin_teams');
    Route::post('/admin/teams/save', [TeamsController::class, 'store']);
    Route::get('/admin/teams/{id}', [TeamsController::class, 'show']);
    Route::get('/admin/teams/{id}/edit', [TeamsController::class, 'edit']);
    Route::put('/admin/teams/{id}', [TeamsController::class, 'update']);
    Route::post('/admin/teams/delete', [TeamsController::class, 'destroy']);
    Route::post('/admin/teams/toggle-status', [TeamsController::class, 'toggleStatus']);
    Route::post('/admin/teams/toggle-featured', [TeamsController::class, 'toggleFeatured']);

    Route::get('/admin/gallery/', [GalleryController::class, 'index'])->name('admin_gallery');
    Route::post('/admin/gallery/save', [GalleryController::class, 'store']);
    Route::get('/admin/gallery/{id}', [GalleryController::class, 'show']);
    Route::get('/admin/gallery/{id}/edit', [GalleryController::class, 'edit']);
    Route::put('/admin/gallery/{id}', [GalleryController::class, 'update']);
    Route::post('/admin/gallery/delete', [GalleryController::class, 'destroy']);
    Route::post('/admin/gallery/toggle-status', [GalleryController::class, 'toggleStatus']);
    Route::post('/admin/gallery/toggle-featured', [GalleryController::class, 'toggleFeatured']);

    Route::get('/admin/programmes/', [ProgrammesController::class, 'index'])->name('admin_programmes');
    Route::post('/admin/programmes/save', [ProgrammesController::class, 'store']);
    Route::put('/admin/programmes/{id}', [ProgrammesController::class, 'update']);
    Route::get('/admin/programmes/{id}', [ProgrammesController::class, 'show']);
    Route::get('/admin/programmes/{id}/edit', [ProgrammesController::class, 'edit']);
    Route::post('/admin/programmes/delete', [ProgrammesController::class, 'destroy']);
    Route::post('/admin/programmes/toggle-status', [ProgrammesController::class, 'toggleStatus']);
    Route::post('/admin/programmes/toggle-featured', [ProgrammesController::class, 'toggleFeatured']);


    Route::get('/admin/academics/', [AcademicController::class, 'index'])->name('admin_academic');
    Route::post('/admin/academics/save', [AcademicController::class, 'store']);
    Route::get('/admin/academics/{id}', [AcademicController::class, 'show']);
    Route::get('/admin/academics/{id}/edit', [AcademicController::class, 'edit']);
    Route::put('/admin/academics/{id}', [AcademicController::class, 'update']);
    Route::post('/admin/academics/delete', [AcademicController::class, 'destroy']);
    Route::post('/admin/academics/toggle-status', [AcademicController::class, 'toggleStatus']);
    Route::post('/admin/academics/toggle-featured', [AcademicController::class, 'toggleFeatured']);

    Route::get('/admin/site_settings/', [SiteSettingController::class, 'index']);
    Route::post('/admin/site_settings/info/{id}', [SiteSettingController::class, 'updateInfo']);
    Route::post('/admin/site_settings/social/{id}', [SiteSettingController::class, 'updateSocial']);
    Route::post('/admin/site_settings/basic/{id}', [SiteSettingController::class, 'updateBasic']);
    Route::post('/admin/site_settings/launch', [SiteSettingController::class, 'updateLaunch']);


    Route::get('/admin/dashboard', [PageController::class, 'blankPage']);
    Route::get('/page-collapse', [PageController::class, 'collapsePage']);

    // locale route
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);
    Route::get('/admin/logout', [LogoutController::class, 'destroy'])->name('logout');
});
Auth::routes(['verify' => false]);
