@extends('templates.layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => "Reservation Detail"])
    <div class="gap-4 flex flex-col">
        <div class="rounded-full w-fit px-5 py-1 bg-teal-300 font-bold dark:text-zinc-900 select-none text-xs"> {{ $reservation["id"] }}         </div>
        <div class=""> {{ $reservation["room_id"] }}         </div>
        <div class=""> {{ $reservation["reserver_name"] }}   </div>
        <div class=""> {{ $reservation["subject"] }}         </div>
        <div class=""> {{ $reservation["remark"] }}          </div>
    </div>

@endsection
