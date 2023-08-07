<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    private static $a = null;

    private static function singleton () {
        if (self::$a == null) {
            self::$a = new Reservation();
        }
    }
    public function index () {
        self::singleton();
        return view('brandnewpage', [
            "reservations" => self::$a->all(),
        ]);
    }

    public function show ($id) {
        self::singleton();
        return view('individualreservation', [
            "reservation" => self::$a->find($id)
        ]);
    }
}
