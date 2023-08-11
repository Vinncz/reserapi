<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GlobalSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search_query = request("query");
        // dd(substr($search_query, 7));
        $room_result = collect([]);
        $reservation_result = collect([]);

        if (Str::startsWith($search_query, "RSID-")) {
            $room_result = collect([Room::find( (int) substr($search_query, 7) )]);
        } else {
            $room_result = collect(Room::where('name', 'LIKE', '%' . $search_query . "%")
                                            ->orWhere('id', 'LIKE', (int) $search_query)->get());

        }

        if (Str::startsWith($search_query, "RID-")) {
            $reservation_result = collect([Reservation::find( (int) substr($search_query, 6) )]);

        } else {
            $reservation_result = collect(Reservation::with("Room")->where('reserver_name', 'LIKE', "%" . $search_query . "%")
                                                            ->orWhere('id', 'LIKE', (int) $search_query)->get());

        }

        return view('pages.search.index', [
            "query" => $search_query,
            "results" => [
                "room" => $room_result,
                "reservation" => $reservation_result,

            ]
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
