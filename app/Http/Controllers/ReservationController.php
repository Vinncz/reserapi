<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Room;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/reservations/index', [
            "reservations" => Reservation::with(["Room", "User", "Priority"])->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $a = new Room;
        $a->id = 0;
        $a->name = "-- Select a room --";

        return view('pages.reservations.new.index', [
            // "rooms" => dd(collect(collect([$a]))->concat(Room::all())),
            "rooms" => collect(collect([$a]))->concat(Room::all()),
            "priorities" => Priority::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $safe_data = $request->validate([
            'subject' => ['bail', 'required', 'min:8', 'max:1022'],
            'room' => ['bail', 'required', 'exists:rooms,id'], // is actually room_id
            'start' => ['bail', 'required', 'date', 'date_format:Y-m-d\TH:i'],
            'duration' => ['bail', 'required'], // in mins
            'remark' => ['bail', 'max:2046'],
            'pin' => 'numeric|min:000000|max:999999|digits:6',
        ]);

        // dd($safe_data, auth()->user()->name);

        $start_time = date("Y-m-d H:i", strtotime($safe_data["start"]));
        $end_time   = date("Y-m-d H:i", strtotime("+".$safe_data["duration"]." minutes", strtotime($start_time)));

        $res = new Reservation;
        $res->room_id = $safe_data["room"];
        $res->user_id = auth()->user()->id;
        $res->subject = $safe_data["subject"];
        $res->priority_id = 3;
        $res->start = $start_time;
        $res->end = $end_time;
        $res->remark = $safe_data["remark"];
        $res->pin = $safe_data["pin"];

        $success = $res->save();
        if ($success)
            return redirect('/reservations/my')->with('reservation-made-event', "Successfully reserved ".Room::find($safe_data['room'])->name." for ".$safe_data["duration"]." minutes.");
        else
            return back()->withErrors('failed-to-make-reservation-event', "Something went wrong.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('pages/reservations/id/index', [
            "reservation" => $reservation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
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
