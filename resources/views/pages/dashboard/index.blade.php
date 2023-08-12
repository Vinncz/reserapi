<?php
    $red = " bg-rose-900 dark:hover:text-white dark:text-rose-300 ";
    $neutral = "  ";
    $green = "  ";
    $blue = "  ";

    $tiles = [
        [
            "display_name" => "New Reservation",
            "color_scheme" => $red,
            "icon" => "bi-box-arrow-right",
            "path" => "/reservations/new"
        ],
        [
            "display_name" => "My Reservation",
            "color_scheme" => $red,
            "icon" => "bi-box-arrow-right",
            "path" => "/reservations/my"
        ],
    ]

?>

@extends('templates.page_layouts.generic')

@section('children')
    @auth
        @include('templates.globals.page_title', ['title' => 'Welcome, '.auth()->user()->name])
        <div class="flex gap-4 rounded-xl p-6 dark:bg-zinc-800 flex-col">
            <span class="text-xl font-bold">
                Quick Actions
            </span>
            <div class="flex gap-4 overflow-auto w-full">
                <form method="post" action="/auth/logout" class="rounded-full cursor-pointer z-10 {{ $red }} w-fit h-fit py-4 px-6">
                    @csrf
                    <button class="flex gap-2 items-center">
                        <i class="ml-2 text-3xl bi bi-box-arrow-right"></i>
                        Log Out
                    </button>
                </form>
                @foreach ($tiles as $tile)
                    <a href="{{ $tile['path'] }}" class="rounded-full cursor-pointer z-10 flex gap-2 items-center {{ $tile['color_scheme'] }} w-fit h-fit py-4 px-6">
                        <i class="ml-2 text-3xl bi {{ $tile['icon'] }}"></i>
                        {{ $tile['display_name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    @endauth



@endsection
