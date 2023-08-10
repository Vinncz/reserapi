@extends('templates.page_layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => "All Rooms"])
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 sm:border rounded-xl sm:p-6 gap-4">
        @foreach($rooms as $room)
            <a href="/rooms/id/{{ $room->id }}" class="dark:bg-zinc-800 bg-slate-100 rounded flex flex-col overflow-hidden">
                <upper-card class="border-b absolute aspect-square">
                    <img class="w-[100%] h-[100%] object-cover" src="http://picsum.photos/400/300" alt="template-photos">
                </upper-card>
                <lower-card class="mt-[100%] px-3 p-2 sm:p-3 sm:px-4 md:p-4 flex flex-col gap-2">
                    <span class="text-lg font-bold">
                        {{ $room->name }}
                    </span>
                    <span class="">
                        Floor {{ json_decode($room->location)->floor }}
                    </span>
                </lower-card>
            </a>
        @endforeach
    </div>

@endsection
