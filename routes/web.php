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
    Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::post('/product/update', 'ProductController@update')->name('product.update');
    Route::post('/product/store', 'ProductController@store')->name('product.store');
    Route::post('/product/destroy', 'ProductController@destroy')->name('product.destroy');
    Route::get('/product/search/{q}', 'ProductController@search')->name('product.search');


    Route::get('/guide', 'GuideController@index')->name('guide');
    Route::get('/guide/add', 'GuideController@create')->name('guide.add');
    Route::post('/guide/store', 'GuideController@store')->name('guide.store');
    Route::get('/guide/{id}/edit', 'GuideController@edit')->name('guide.edit');
    Route::post('/guide/update', 'GuideController@update')->name('guide.update');
    Route::post('/guide/destroy', 'GuideController@destroy')->name('guide.destroy');
    Route::get('/guide/search/{q}', 'GuideController@search')->name('guide.search');


    Route::get('/brief', 'BriefController@index')->name('brief');
    Route::get('/brief/add', 'BriefController@create')->name('brief.add');
    Route::post('/brief/store', 'BriefController@store')->name('brief.store');
    Route::get('/brief/search/{q}', 'BriefController@search')->name('brief.search');
    Route::get('/brief/{id}/edit', 'BriefController@edit')->name('brief.edit');
    Route::post('/brief/update', 'BriefController@update')->name('brief.update');


    Route::get('/task', 'FreepikTaskController@index')->name('task');
    Route::get('/task/add', 'FreepikTaskController@create')->name('task.add');
    Route::post('/task/store', 'FreepikTaskController@store')->name('task.store');
    Route::get('/task/{id}/edit', 'FreepikTaskController@edit')->name('task.edit');
    Route::post('/task/update', 'FreepikTaskController@update')->name('task.update');
    Route::post('/task/destroy', 'FreepikTaskController@destroy')->name('task.destroy');
    Route::get('/task/search/{q}', 'FreepikTaskController@search')->name('task.search');


    Route::get('/plan', 'PlanController@index')->name('plan');
    Route::get('/plan/add', 'PlanController@create')->name('plan.add');
    Route::post('/plan/store', 'PlanController@store')->name('plan.store');


    

    Route::get('/accounts/settings', 'AccountController@index')->name('account');
    Route::post('/accounts/store', 'AccountController@store')->name('account.store');
    Route::post('/accounts/destroy', 'AccountController@destroy')->name('account.destroy');
    Route::put('/account/current-team-switch', 'AccountController@currentteamupdate')->name('account.currentteamupdate');
});