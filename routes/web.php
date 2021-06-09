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
    return redirect()->route('dashboard');
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
    Route::get('/product/search/{q}/category', 'ProductController@searchcategory')->name('product.search.category');
    Route::post('/product/quickupdate', 'ProductController@quickupdate')->name('product.quickupdate');




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
    Route::get('/task/search/{q}/category', 'FreepikTaskController@searchcategory')->name('task.search.category');
    Route::post('/task/quickupdate', 'FreepikTaskController@quickUpdate')->name('task.quickupdate');



    Route::get('/product-desc', 'PlanController@index')->name('plan');
    Route::get('/product-desc/add', 'PlanController@create')->name('plan.add');
    Route::get('/product-desc/{id}/edit', 'PlanController@edit')->name('plan.edit');
    Route::post('/product-desc/store', 'PlanController@store')->name('plan.store');
    Route::post('/product-desc/update', 'PlanController@update')->name('plan.update');
    Route::post('/product-desc/destroy', 'PlanController@destroy')->name('plan.destroy');
    Route::get('/product-desc/{q}/search', 'PlanController@search')->name('plan.search');

    Route::get('/tool', 'ToolController@index')->name('tool');

    Route::get('/tool/cmtag', 'ToolController@cmindex')->name('tool.cm');
    Route::get('/tool/cmtag/add', 'ToolController@cmcreate')->name('tool.cm.add');
    Route::post('/tool/cmtag/store', 'ToolController@cmstore')->name('tool.cm.store');
    Route::post('/tool/cmtag/update', 'ToolController@cmupdate')->name('tool.cm.update');
    Route::post('/tool/cmtag/destroy', 'ToolController@cmdestroy')->name('tool.cm.destroy');
    Route::get('/tool/cmtag/{id}/edit', 'ToolController@cmedit')->name('tool.cm.edit');
    Route::get('/tool/cmtag/search/{q}', 'ToolController@cmsearch')->name('tool.cm.search');
    

    Route::get('/tool/etsy', 'ToolController@etsyindex')->name('tool.etsy');
    Route::get('/tool/etsy/add', 'ToolController@etsycreate')->name('tool.etsy.add');
    Route::post('/tool/etsy/store', 'ToolController@etsystore')->name('tool.etsy.store');
    Route::post('/tool/etsy/update', 'ToolController@etsyupdate')->name('tool.etsy.update');
    Route::post('/tool/etsy/destroy', 'ToolController@etsydestroy')->name('tool.etsy.destroy');
    Route::get('/tool/etsy/{id}/edit', 'ToolController@etsyedit')->name('tool.etsy.edit');
    Route::get('/tool/etsy/search/{q}', 'ToolController@etsysearch')->name('tool.etsy.search');


    Route::get('/tool/element', 'ToolController@elementindex')->name('tool.element');
    Route::get('/tool/element/add', 'ToolController@elementcreate')->name('tool.element.add');
    Route::post('/tool/element/store', 'ToolController@elementstore')->name('tool.element.store');
    Route::post('/tool/element/update', 'ToolController@elementupdate')->name('tool.element.update');
    Route::post('/tool/element/destroy', 'ToolController@elementdestroy')->name('tool.element.destroy');
    Route::get('/tool/element/{id}/edit', 'ToolController@elementedit')->name('tool.element.edit');
    Route::get('/tool/element/search/{q}', 'ToolController@elementsearch')->name('tool.element.search');


    Route::get('/tool/canva', 'ToolController@canvaindex')->name('tool.canva');
    Route::get('/tool/canva/add', 'ToolController@canvacreate')->name('tool.canva.add');
    Route::post('/tool/canva/store', 'ToolController@canvastore')->name('tool.canva.store');
    Route::post('/tool/canva/update', 'ToolController@canvaupdate')->name('tool.canva.update');
    Route::post('/tool/canva/destroy', 'ToolController@canvadestroy')->name('tool.canva.destroy');
    Route::get('/tool/canva/{id}/edit', 'ToolController@canvaedit')->name('tool.canva.edit');
    Route::get('/tool/canva/search/{q}', 'ToolController@canvasearch')->name('tool.canva.search');

    

    Route::get('/accounts/settings', 'AccountController@index')->name('account');
    Route::post('/accounts/store', 'AccountController@store')->name('account.store');
    Route::post('/accounts/destroy', 'AccountController@destroy')->name('account.destroy');
    Route::put('/account/current-team-switch', 'AccountController@currentteamupdate')->name('account.currentteamupdate');

    Route::get('/file/upload', 'FileController@index')->name('file.index');
    Route::get('/file/{id}/download', 'FileController@download')->name('file.download');
    Route::post('/file/upload', 'FileController@upload')->name('file.upload');
    Route::get('/file/{id}/destroy', 'FileController@destroy')->name('file.destroy');

});