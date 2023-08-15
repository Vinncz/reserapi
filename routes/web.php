<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GlobalSearchController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Models\Reservation;
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
 *
 * -> di file web.php ini seharusnya gaada function yang balikin view apa.
 *    yang ada, pindahin logikanya ke controller.
 */

Route::get('/p', function () {
    return view('welcome');
});

/**
 * Lu ternyata bisa milih property apa yang akan di-pass sama parameter.
 * Pakai aja ':', diikuti dengan nama property.
 *
 * Pastikan nama yang ada didalam '{}' sama dengan yang diterima Controller.
 * Contoh: '../id/{ANJING}' --> maka di Controller harus tertulis:
 *    function ... (Dog $ANJING) {
 *       ...
 *    }
 */
Route::get('/', function () {
    return view('pages.index');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard.index');
})->middleware('auth');

Route::get('/auth/login', [AuthenticationController::class, 'login'])->middleware('guest')->name('login');
Route::post('/auth/login', [AuthenticationController::class, 'authenticate'])->middleware('guest');
Route::get('/auth/register', [AuthenticationController::class, 'create'])->middleware('guest')->name('register');
Route::post('/auth/register', [AuthenticationController::class, 'store'])->middleware('guest');
Route::post('/auth/logout', [AuthenticationController::class, 'logout'])->middleware('auth');

Route::get('/search', [GlobalSearchController::class, "index"]);

Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/reservations/id/{reservation:id}', [ReservationController::class, 'show']);
Route::get('/reservations/new', [ReservationController::class, 'create'])->middleware('auth');
Route::post('/reservations/new', [ReservationController::class, 'store'])->middleware('auth');

Route::get('/reservations/my', [ReservationController::class, 'my'])->middleware('auth');

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/id/{room:id}', [RoomController::class, 'show']);
Route::get('/rooms/new', [RoomController::class, 'create']);

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
