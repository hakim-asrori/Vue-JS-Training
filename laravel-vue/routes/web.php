<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    dd(Str::random(40));
    return view('welcome');
});

// Route::any('{slug1}/{slug2}', function () {
//     return view('latihan');
// });

Route::get('/{any}', function () {
    return view('latihan');
})->where('any', '.*');
