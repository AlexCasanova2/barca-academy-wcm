<?php

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

Route::get('/live', 'Admin\IndexController@livebase'); //ruta base /admin 
Route::get('/livefinal', 'Admin\IndexController@livefinal'); //ruta base /admin 

Route::get('/admin', 'Admin\IndexController@admin'); //ruta base /admin 

Route::get('/admin/{cat}', 'Admin\IndexController@cat'); //ruta base /admin
Route::get('/admin/finals/{cat}', 'Admin\IndexController@catFinals'); //ruta base /admin

Route::get('/admin/ajax/datatable', 'Admin\IndexController@datatable'); //ruta base /admin


Route::get('/ws/edit', 'Admin\IndexController@wsedit'); //ruta base /admin 
Route::get('/ws/editranking', 'Admin\IndexController@editranking'); //ruta base /admin 

Route::get('/ws/live', 'Admin\IndexController@wslive'); //ruta base /admin 
Route::get('/ws/wsranking', 'Admin\IndexController@wsranking'); //ruta base /admin 

Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');