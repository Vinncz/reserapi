<?php

namespace App\Http\Controllers\API\Reservation;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Reservation\StoreReservationRequest;
use App\Http\Resources\API\Reservation\ReservationResource;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Traits\HttpResponses;

class ReservationController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return $this->success([ReservationResource::collection(
            Reservation::all(),
        )]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request) {
        $request->validated($request->only([
            "subject", "room", "start", "duration", "importance", "pin", "remark"
        ]));

        $reservation = Reservation::create([
            "room_id"       => (string) $request->room,
            "user_id"       => (string) Auth()->user()->id,
            "subject"       =>          $request->subject,
            "priority_id"   => (string) $request->importance,
            "remark"        =>          $request->remark,
            "start"         => (string) $request->start,
            "end"           => (string) $request->getEnd(),
            "pin"           =>          $request->pin,
        ]);

        return $this->success([
            "reservation" => ReservationResource::make(
                $reservation,
            ),
        ], "Successfully reserved ". Room::find((int) $request->room)->name ." room for $request->duration minutes");
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation) {
        return $this->success([ReservationResource::make(
            $reservation,
        )]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
