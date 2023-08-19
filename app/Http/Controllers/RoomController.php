<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use DateTime;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('pages/rooms/index', [
            "rooms" => $rooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $schedule = Reservation::with("User", "Room", "Priority")
                        ->where("room_id", "=", $room->id)
                        ->where("end", ">=", now("ASIA/JAKARTA"))
                        ->paginate(8);

        $ongoing_reservation = Reservation::where('room_id', $room->id)
                                ->where('start', '<', now())
                                ->where('end', '>', now())
                                ->get();

        $next_reservation = Reservation::where('room_id', $room->id)
                                ->where('start', '>', now())
                                ->orderBy("start", "asc")
                                ->first();

        $is_occupied = sizeof($ongoing_reservation) > 0;

        $will_soon_be_occupied = $next_reservation != null && date($next_reservation->start) <= date("Y-m-d H:i", strtotime("+30 minutes", strtotime("now")));
        // dd($will_soon_be_occupied);
        // dd(date("Y-m-d H:i", strtotime("+30 minutes", strtotime("now"))));
        // dd($schedule, $is_occupied);

        return view('pages.rooms.id.index', [
            "room" => $room,
            "schedule" => $schedule,
            "occupied" => $is_occupied,
            "will_soon_be_occupied" => $will_soon_be_occupied,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
