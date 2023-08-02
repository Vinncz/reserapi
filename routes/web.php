<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
 * Note to self:
 * -> Untuk setiap page yang lu mau tampilin, buat route-nya sendiri
 * -> Nama dari view adalah nama dari blade file, dikurangi .blade.php
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});
