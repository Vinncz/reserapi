<?php

namespace App\Http\Controllers;

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
            "reservations" => Reservation::with("Room")->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // to provide room_ids
        $rooms = Room::all();

        return view('pages.reservations.new.index', ["rooms" => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $safe_data = $request->validate([
            'subject' => ['bail', 'required', 'min:8'],
            'room' => ['bail', 'required', 'exists:rooms,id'],
            'start' => ['bail', 'required', 'date', 'date_format:Y-m-d\TH:i'],
            'duration' => ['bail', 'required'],
            // 'remark' => ['bail'],
            'pin' => 'numeric|min:000000|max:999999|digits:6',
        ]);

        dd($safe_data, auth()->user()->name);
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
    public function update(UpdateReservationRequest $request, Reservation $reservation)
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
