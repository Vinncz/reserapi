<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation
{
    use HasFactory;
    protected $primary_key = "id";

    private static $reservations = [
        [
            "id" => 1,
            "room_id" => 1,
            "reserver_name" => "Andi",
            "subject" => "Undisclosed",
            "remark" => "No remark was left",
            // "start" => date("Y-m-d H:i:s"),
            // "end" => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")." +2 hours")),
            "pin" => "123456"
        ],
        [
            "id" => 2,
            "room_id" => 1,
            "reserver_name" => "Budi",
            "subject" => "Undisclosed",
            "remark" => "No remark was left",
            // "start" => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")." +4 hours")),
            // "end" => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")." +6 hours")),
            "pin" => "123456"
        ],
    ];

    public static function all () {
        return collect(self::$reservations);
    }

    public static function find ($id) {
        $reservation = [];
        return self::all()->firstWhere("id", (int) $id);

        // foreach (self::all() as $data) {
        //     if ($data["id"] == (int) $id) {
        //         $reservation = $data;
        //     }
        // }

        // return $reservation;
    }
}
