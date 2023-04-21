<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    Route::get('lots','LotController@index')->name('admin.lot.index');
    Route::get('lots/create', 'LotController@create')->name('admin.lot.create');
    Route::post('lots', 'LotController@store')->name('admin.lot.store');
    Route::get('lots/{id}', 'LotController@show')->name('admin.lot.show');
    Route::get('lots/{id}/edit', 'LotController@edit')->name('admin.lot.edit');
    Route::put('lots/{id}/update', 'LotController@update')->name('admin.lot.update');
    Route::delete('lots/{id}/delete', 'LotController@delete')->name('admin.lot.delete');

    Route::get('categories','CategoryController@index')->name('admin.category.index');
    Route::get('categories/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('categories', 'CategoryController@store')->name('admin.category.store');
    Route::get('categories/{id}', 'CategoryController@show')->name('admin.category.show');
    Route::get('categories/{id}/edit', 'CategoryController@edit')->name('admin.category.edit');
    Route::put('categories/{id}/update', 'CategoryController@update')->name('admin.category.update');
    Route::delete('categories/{id}/delete', 'CategoryController@delete')->name('admin.category.delete');





}); // this should be the absolute last line of this file
