<?php

namespace App\Http\Controllers\API\Room;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\Room\RoomResource;
use App\Http\Traits\HttpResponses;

class RoomController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return $this->success(RoomResource::collection(
            Room::all(),
        ), "Showing every rooms");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room) {
        return $this->success(RoomResource::make(
            $room,
        ), "Showing reservation with an id of " . $room->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
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
