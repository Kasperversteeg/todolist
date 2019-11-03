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
// TODOS
Route::delete('/{todo}', 'todocontroller@destroy');
Route::patch('/{todo}', 'todocontroller@update');
Route::get('/', 'todocontroller@index');
Route::get('/sort', 'todocontroller@sort');
Route::post('/', 'todocontroller@store');
Route::any('/search','todocontroller@search');
Route::patch('/complete/{todo}','todocontroller@complete');
// Route::resource('/', 'todocontroller');

// CATEGORIES
Route::get('/category','categorycontroller@create');
Route::post('/createCategory', 'categorycontroller@store');
