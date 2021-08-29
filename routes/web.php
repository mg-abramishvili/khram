<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\FrontNewsController;
use App\Http\Controllers\PhotoalbumController;
use App\Http\Controllers\FrontPhotoalbumController;
use App\Http\Controllers\VideoalbumController;
use App\Http\Controllers\FrontVideoalbumController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FrontReviewController;

Route::get('/','App\Http\Controllers\FrontController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// News
Route::resource('/news', NewsController::class)->middleware('auth');
Route::get('news/delete/{id}','App\Http\Controllers\NewsController@delete');
Route::post('news/file/{method}','App\Http\Controllers\NewsController@file');
// News Front
Route::resource('/front-news', FrontNewsController::class);

// Photoalbums
Route::resource('/photoalbums', PhotoalbumController::class)->middleware('auth');
Route::get('photoalbums/delete/{id}','App\Http\Controllers\PhotoalbumController@delete');
Route::post('photoalbums/file/{method}','App\Http\Controllers\PhotoalbumController@file');
// Photoalbums Front
Route::resource('/front-photoalbums', FrontPhotoalbumController::class);

// Videoalbums
Route::resource('/videoalbums', VideoalbumController::class)->middleware('auth');
Route::get('videoalbums/delete/{id}','App\Http\Controllers\VideoalbumController@delete');
Route::post('videoalbums/file/{method}','App\Http\Controllers\VideoalbumController@file');
// Videoalbums Front
Route::resource('/front-videoalbums', FrontVideoalbumController::class);

// Banners
Route::resource('/banners', BannerController::class)->middleware('auth');
Route::get('banners/delete/{id}','App\Http\Controllers\BannerController@delete');
Route::post('banners/file/{method}','App\Http\Controllers\BannerController@file');

// Pages
Route::resource('/pages', PageController::class)->middleware('auth');
Route::get('pages/delete/{id}','App\Http\Controllers\PageController@delete');
Route::post('pages/file/{method}','App\Http\Controllers\PageController@file');
Route::post('pg/upload/image', 'App\Http\Controllers\PageController@summernoteUpload');
Route::delete('pg/remove/image', 'App\Http\Controllers\PageController@summernoteRemove');

// Pages Front
Route::resource('/front-pages', FrontPageController::class);

// SCHEMES
Route::resource('/schemes', SchemeController::class)->middleware('auth');
Route::get('schemes/delete/{id}','App\Http\Controllers\SchemeController@delete')->middleware('auth');
Route::post('schemes/file/{method}','App\Http\Controllers\SchemeController@file')->middleware('auth');

// ROUTES
Route::resource('/routes', RouteController::class)->middleware('auth');
Route::get('routes/delete/{id}','App\Http\Controllers\RouteController@delete')->middleware('auth');

// Reviews
Route::resource('/reviews', ReviewController::class)->middleware('auth');
Route::get('reviews/delete/{id}','App\Http\Controllers\ReviewController@delete');
// Reviews Front
Route::get('/front-reviews', 'App\Http\Controllers\FrontReviewController@create');
Route::post('/front-reviews', 'App\Http\Controllers\FrontReviewController@store');
Route::get('/front-reviews-success', 'App\Http\Controllers\FrontReviewController@review_success');

// Settings
Route::resource('/settings', SettingController::class);
Route::post('settings/file/{method}','App\Http\Controllers\SettingController@file');


Route::get('/{vue?}', function () {
    return view('layouts.vue');
})->where('vue', '[\/\w\.-]*');