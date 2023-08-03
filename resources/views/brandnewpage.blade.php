@extends('templates.layouts.generic')

@section('children')
    {{-- this is how you import "components" in Laravel --}}
    @include('templates.globals.page_title', ["title" => "All Upcoming Bookings"])

    There are no upcoming bookings in the database.
@endsection
