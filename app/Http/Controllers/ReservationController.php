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
        // duplicate code. will refactor later (maybe)
        $ongoing = Reservation::where("end", ">", now())
                            ->where("start", "<", now())
                            ->orderBy("start", "asc");

        return view('pages/reservations/index', [
            "upcoming" => Reservation::with(["Room", "User", "Priority"])
                            ->where("end", ">", now())
                            ->whereNotIn("id", $ongoing->get("id")->values("id"))
                            ->orderBy("end", "asc")
                            ->orderBy("start", "asc")
                            ->paginate(8),
            "ongoing" => Reservation::with(["Room", "User", "Priority"])
                            ->where("end", ">", now())
                            ->where("start", "<", now())
                            ->orderBy("end", "asc")
                            ->orderBy("start", "asc")
                            ->paginate(8),
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
        $validated_data = $request->validate([
            'subject' => ['bail', 'required', 'min:8', 'max:1022'],
            'room' => ['bail', 'required', 'exists:rooms,id'], // is actually room_id
            'start' => ['bail', 'required', 'date', 'date_format:Y-m-d H:i', 'after_or_equal:'.date("Y-m-d H:i", strtotime("-5 minutes", strtotime("now")))],
            'duration' => ['bail', 'required', 'numeric', 'max:300', function ($attribute, $value, $fail) {
                if ($value % 15 !== 0) {
                    $fail($attribute.' must be divisible by 15.'); // your message
                }
            }], // in mins
            'importance' => ['bail', 'required', 'exists:priorities,id'],
            'remark' => ['bail', 'max:2046'],
            'pin' => 'numeric|min:000000|max:999999|digits:6',
        ]);

        /**
         * Pastikan kalo request kita tidak tidak bentrok dengan jadwal ruangan yang diminta.
         *
         * Ini dilakukan dengan ngecek:
         * 1.) apakah ruangan tersebut sedang dipakai saat waktu bookingan kita dimulai?
         * 2.) apakah bookingan yang kita minta akan overlap dengan booking yang akan datang?
         */

        $start_time = date("Y-m-d H:i", strtotime($validated_data["start"]));
        $end_time   = date("Y-m-d H:i", strtotime("+".$validated_data["duration"]." minutes", strtotime($start_time)));

        $overlappingExistingBookings = Reservation::where('room_id', $validated_data["room"])
            ->where('start', '<', $end_time)
            ->where('end', '>', $start_time)
            ->get();
        // dd($overlappingExistingBookings);
        $overlappingLaterBookings = Reservation::where('room_id', $validated_data["room"])
            ->where('start', '>', $start_time)
            ->where('start', '<', $end_time)
            ->get();

        if ($overlappingExistingBookings != null || $overlappingLaterBookings != null) {
            if ( $overlappingExistingBookings != null && sizeof($overlappingExistingBookings) > 0 )
                return redirect()->back()->with('fatal-error', "Booking overlaps with existing bookings for room ".Room::find($validated_data["room"])->name.". " . $overlappingExistingBookings)->withInput();
            else if ($overlappingLaterBookings != null && sizeof($overlappingLaterBookings) > 0 )
                return redirect()->back()->with('fatal-error', "Booking overlaps with a later scheduled bookings for room ".Room::find($validated_data["room"])->name.". " . $overlappingLaterBookings)->withInput();
        }

        /**
         * Ketika semuanya sudah tervalidasi,
         * kita tahu datanya aman.
         */

        $safe_data = $validated_data;

        /**
         * Prepare untuk masukkin datanya
         * kedalam database.
         */

        $res = new Reservation;
        $res->room_id = $safe_data["room"];
        $res->user_id = auth()->user()->id;
        $res->subject = $safe_data["subject"];
        $res->priority_id = $safe_data["importance"];
        $res->start = $start_time;
        $res->end = $end_time;
        $res->remark = strlen( trim($safe_data["remark"]) ) > 0 ? trim($safe_data["remark"]) : null;
        $res->pin = $safe_data["pin"];

        $success = $res->save();

        if ($success)
            return redirect('/reservations/my')->with('reservation-made-event', "Successfully reserved ".Room::find($safe_data['room'])->name." for ".$safe_data["duration"]." minutes.");
        else
            return redirect()->back()->with('fatal-error', "Something went wrong.");
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

    public function my (Request $request) {
        $var1 = "";
        $var2 = "";

        $assoc_reservation = Reservation::with(["Room", "User", "Priority"])
                                            ->where("user_id", auth()->user()->id)
                                            ->where("start", ">", now())
                                            ->orWhere(function($q) use ($var1, $var2) {
                                                $q->where("end", ">=", now())
                                                  ->where("start", "<=", now());
                                            })
                                            ->orderBy("start", "desc")
                                            ->paginate(10);

        return view('pages/reservations/my/index', [
            "reservations" => $assoc_reservation,
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
