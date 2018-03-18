<?php

use App\Http\Controllers\Hoge;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'Index@top');
Route::get('form', 'Form@top');
Route::post('form/confirm', 'Form@confirm');
Route::post('form/complete', 'Form@complete');
