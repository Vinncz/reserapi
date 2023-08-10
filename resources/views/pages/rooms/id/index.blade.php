@extends('templates.page_layouts.generic')

@section('children')
@include('templates.globals.page_title', ["title" => $room->name." Room"])
    {{ $room }}

@endsection
