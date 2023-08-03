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

Route::get('/p', function () {
    return view('brandnewpage');
});

Route::get('/about', function () {
    /**
     * Fun fact: you can pass an argument to a view.
     * Simply pass on an array if it's more than one argument.
     *
     * Also, the following is the JSON's counterpart in PHP.
     */
    return view('about', [
        "message" => "What the fuck",
        "images" => [
            [
                "id" => 1,
                "string" => "http://picsum.photos/200/300"
            ],
        ]
    ]);
});
