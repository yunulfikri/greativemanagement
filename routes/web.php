<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/product', 'ProductController@index')->name('product');
    Route::get('/product/add', 'ProductController@create')->name('product.add');
    Route::post('/product/store', 'ProductController@store')->name('product.store');
    Route::get('/product/search/{q}', 'ProductController@search')->name('product.search');


    Route::get('/guide', 'GuideController@index')->name('guide');
    Route::get('/guide/add', 'GuideController@create')->name('guide.add');
    Route::post('/guide/store', 'GuideController@store')->name('guide.store');

    Route::get('/accounts/settings', 'AccountController@index')->name('account');
    Route::post('/accounts/store', 'AccountController@store')->name('account.store');
});