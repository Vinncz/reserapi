<?php

namespace App\Http\Controllers\API\Reservation;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Reservation\StoreReservationRequest;
use App\Http\Resources\API\Reservation\ReservationResource;
use App\Http\Resources\API\Reservation\ReservationWithRelationResource;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Traits\HttpResponses;
use App\Policies\ReservationPolicy;

class ReservationController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return $this->success(ReservationResource::collection(
            Reservation::all(),
        ),
        "Showing every reservations");
    }

    public function withRelation () {
        return $this->success(ReservationWithRelationResource::collection(
            Reservation::with(["Room", "User", "Priority"])->get()
        ),
        "Showing every reservations along with its relations");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request) {
        $this->authorize("create", Reservation::class);

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
        // $this->authorize("view", [auth()->user(), $reservation]);

        return $this->success(ReservationResource::make(
            $reservation,
        ),
        "Showing reservation with an id of " . $reservation->id);
    }

    public function showWithRelation(Reservation $reservation) {
        // $this->authorize("view", [auth()->user(), $reservation]);

        return $this->success(ReservationWithRelationResource::make(
            Reservation::with("User", "Room", "Priority")->find($reservation->id),
        ),
        "Showing reservation with an id of " . $reservation->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation) {
        $this->authorize("update", $reservation);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation) {
        $this->authorize("delete", $reservation);

    }
}
