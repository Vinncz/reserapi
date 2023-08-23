<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\Reservation\ReservationController;
use App\Http\Controllers\API\Room\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| (!) Public Routes
|--------------------------------------------------------------------------
|
| [ <!> ATTENTION <!> ]
|
| Accessible to the public. Commonly used to convey non-sensitive information.
| Take care to not put anything that is personally-identifiable in the following routes:
|
*/

    /* Auth-related */
        Route::post(
            "/login",
            [AuthenticationController::class, "login"]
        )->name("api/login");

        Route::post(
            "/register",
            [AuthenticationController::class, "register"]
        )->name("api/register");

    /* Reservations */
        Route::get(
            "/reservations/all",
            [ReservationController::class, "index"]
        )->name("api/reservations/all");

        Route::get(
            "/reservations/id/{reservation}",
            [ReservationController::class, "show"]
        )->name("api/reservations/id");

    /* Rooms */
        Route::get(
            "/rooms/all",
            [RoomController::class, "index"]
        )->name("api/rooms/all");

        Route::get(
            "/rooms/id/{room}",
            [RoomController::class, "show"]
        )->name("api/rooms/id");






/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
|
| Accessible only for the logged-in users. Used to convey sensitive/personal information.
| Only those who logged into their account can access the following routes:
|
*/

    Route::group(
        ["middleware" => ["auth:sanctum"]],
        function () {

            /* Auth-related */
                Route::post(
                    "/logout",
                    [AuthenticationController::class, "logout"]
                );

            /* Reservations */
                Route::get(
                    "/reservations/my",
                    [ReservationController::class, "my_reservation"]
                );

                Route::post(
                    "/reservations/new",
                    [ReservationController::class, "store"]
                );

        }
    );

