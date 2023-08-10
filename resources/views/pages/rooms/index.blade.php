@extends('templates.page_layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => "All Rooms"])
    @foreach($rooms as $room)
        <span> {{ $room->name }} </span>
    @endforeach
@endsection
