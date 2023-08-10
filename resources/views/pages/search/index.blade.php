@extends('templates.page_layouts.generic')

@section('children')
    {{-- this is how you import "components" in Laravel --}}
    @include('templates.globals.page_title', ["title" => "Search Results"])

    <div class="flex border mb-8"></div>

    @include('templates.globals.page_title', ["title" => "Room"])
    <div class="flex flex-col gap-4 rounded-xl dark:bg-zinc-800 bg-slate-100 p-6 mb-6">
        @foreach ($results["room"] as $room)
            @if ($room != null)
                <a href="/rooms/id/<?= $room->id ?>"> {{ $room->name }} </a>
            @endif
        @endforeach
        It is empty
    </div>

    @include('templates.globals.page_title', ["title" => "Reservation"])

    <div class="flex flex-col gap-4 rounded-xl dark:bg-zinc-800 bg-slate-100 p-6">
            @foreach ($results["reservation"] as $reservation)
                @if ($reservation != null)
                    <a href="/reservations/id/<?= $reservation->id ?>"> {{ $reservation->reserver_name }} </a>
                @endif
            @endforeach
            It is empty
    </div>

@endsection
