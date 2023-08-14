@extends('templates.page_layouts.generic')

@section('children')
    {{-- <i class="text-5xl bi bi-calendar-plus opacity-90"></i> --}}
    @include('templates.globals.page_title', ["title" => "New Reservation"])

    @include('pages.reservations.new.extends_forms_layout')

@endsection
