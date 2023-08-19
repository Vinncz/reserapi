@extends('templates.page_layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => "All Rooms"])
    <div class="carbon grid sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($rooms as $room)
            <a href="/rooms/id/{{ $room->id }}" class="flex rounded-xl flex-col peer overflow-hidden h-fit group dark:hover:bg-zinc-900 hover:bg-slate-200 border hover:border-inherit border-transparent">
                <upper-card class="group-hover:brightness-75 dark:group-hover:brightness-125 aspect-[2/1] rounded-lg overflow-hidden bg-sky-700">
                    <img class="w-full h-full object-cover" src="http://picsum.photos/400/300" alt="template-photos">
                </upper-card>
                <lower-card class="flex flex-col gap-1 p-3">
                    <span class="font-bold">
                        {{ $room->name }} Room
                    </span>
                    <span class="text-sm">
                        Floor {{ json_decode($room->location)->floor }}, near {{ strtolower(json_decode($room->location)->landmark) }}
                    </span>
                </lower-card>
            </a>
        @endforeach
    </div>

@endsection
