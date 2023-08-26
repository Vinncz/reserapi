<?php

use App\Http\Controllers\API\Auth\AuthenticationController;
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
        Route::controller(AuthenticationController::class)->group(function () {

            Route::post(
                "/login",
                [AuthenticationController::class, "login"]
            )->name("api/login");

            Route::post(
                "/register",
                [AuthenticationController::class, "register"]
            )->name("api/register");

            Route::post(
                "/logout",
                [AuthenticationController::class, "logout"]
            )->name("api/logout");

        });

    /* Reservations */
        Route::controller(ReservationController::class)->group(function () {
            Route::prefix("/reservations")->group(function () {

                Route::get(
                    "/all",
                    [ReservationController::class, "index"]
                )->name("api/reservations/all");

                Route::get(
                    "/withRelation",
                    [ReservationController::class, "withRelation"]
                )->name("api/reservations/withRelation");

                Route::get(
                    "/id/{reservation}",
                    [ReservationController::class, "show"]
                )->name("api/reservations/id");

                Route::get(
                    "/id/{reservation}/withRelation",
                    [ReservationController::class, "showWithRelation"]
                )->name("api/reservations/id/withRelation");

            });
        });


    /* Rooms */
        Route::controller(RoomController::class)->group(function () {
            Route::prefix("/rooms")->group(function () {

                Route::get(
                    "/all",
                    [RoomController::class, "index"]
                )->name("api/rooms/all");

                Route::get(
                    "/id/{room}",
                    [RoomController::class, "show"]
                )->name("api/rooms/id");

            });
        });





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
                Route::controller(AuthenticationController::class)->group(function () {

                    Route::post(
                        "/logout",
                        [AuthenticationController::class, "logout"]
                    );

                });

            /* Reservations */
                Route::controller(ReservationController::class)->group(function () {
                    Route::prefix("/reservations")->group(function () {

                        Route::get(
                            "/my",
                            [ReservationController::class, "my_reservation"]
                        );

                        Route::post(
                            "/new",
                            [ReservationController::class, "store"]
                        );

                    });
                });


        }
    );

