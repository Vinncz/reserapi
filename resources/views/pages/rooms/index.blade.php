@extends('templates.page_layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => "All Rooms"])
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 sm:border rounded-xl sm:p-6 gap-4">
        @foreach($rooms as $room)
            <card class="dark:bg-zinc-800 bg-slate-100 rounded flex flex-col gap-4">
                <upper-card class="border-b">
                    <img class="w-full h-full" src="http://picsum.photos/300/300" alt="template-photos">
                </upper-card>
                <lower-card class="p-2 flex flex-col gap-2">
                    <span class="text-xl font-bold">
                        {{ $room->name }}
                    </span>
                    <span class="">
                        Floor {{ json_decode($room->location)->floor }}
                    </span>
                </lower-card>
            </card>
        @endforeach
    </div>

@endsection
