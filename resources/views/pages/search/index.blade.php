@extends('templates.page_layouts.generic')

@section('children')
    {{-- this is how you import "components" in Laravel --}}
    @include('templates.globals.page_title', ["title" => "Search Results"])

    <div class="flex border-b mb-8"></div>

    @include('templates.globals.page_title', ["title" => "Room"])
    <div class="flex flex-col gap-4 rounded-xl dark:bg-zinc-800 bg-slate-100 p-6 mb-6">
        <?php $printed = false ?>
        @foreach ($results["room"] as $room)
            @if ($room != null)
                <?php $printed = true ?>
                <a class="flex flex-col border dark:border-zinc-700 border-slate-300 rounded-xl p-4" href="/rooms/id/<?= $room->id ?>">
                    <span class="flex w-fit">
                        RID-00{{ $room->id }}
                    </span>
                    <span class="flex font-bold">
                        {{ $room->name }}
                    </span>
                    <span>
                        Floor {{ json_decode($room->location)->floor }}
                    </span>
                </a>
            @endif
        @endforeach

        @if ($printed == false)
            No appropriate item was found.
        @endif
    </div>

    @include('templates.globals.page_title', ["title" => "Reservation"])

    <div class="flex flex-col gap-4 rounded-xl dark:bg-zinc-800 bg-slate-100 p-6">
        <?php $printed = false ?>
        @foreach ($results["reservation"] as $reservation)
            @if ($reservation != null)
                <?php $printed = true ?>
                <a class="flex flex-col border dark:border-zinc-700 border-slate-300 rounded-xl p-4" href="/reservations/id/<?= $reservation->id ?>">
                    <span class="flex w-fit">
                        RSID-00{{ $reservation->id }}
                    </span>
                    <span class="flex font-bold">
                        {{ $reservation->reserver_name }}
                    </span>
                    <span>
                        Start {{ $reservation->start }}
                    </span>
                    <span>
                        End {{ $reservation->end }}
                    </span>
                    <span>
                        At room -> {{ $reservation->Room->name }}
                    </span>
                </a>
            @endif
        @endforeach

        @if ($printed == false)
            No appropriate item was found.
        @endif
    </div>

@endsection
