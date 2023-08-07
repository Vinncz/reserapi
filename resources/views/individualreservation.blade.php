@extends('templates.layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => "Reservation Detail"])

    <booking_container class="flex flex-wrap rounded-xl overflow-hidden h-fit border resize transition-none break-words">
        <left_side class="w-[30%] min-w-[175px] dark:bg-zinc-800 bg-slate-100 text-slate-700 dark:text-inherit p-6 gap-6 flex flex-col flex-grow">
            <span class="flex flex-col gap-2">
                <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-10px] italic"> /// IDENTIFIER </span>
                <div class="rounded-full w-fit px-5 py-1 dark:bg-teal-300 bg-slate-500 text-slate-50 font-bold dark:text-zinc-900 text-[5px]">
                    {{ $reservation["id"] }}
                </div>
            </span>

            <div class="flex flex-col w-full gap-x-6 gap-y-3 mt-auto pt-16">
                <span class="flex flex-col">
                    <span class="text-xs italic code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-4px]"> WHERE </span>
                    <span class="text-xl italic tracking-wide" style=""> {{ $reservation->room_id != null ? "Room 8" : null  }} </span>
                </span>

                <span class="flex flex-col">
                    <span class="text-xs italic code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-4px]"> TOPIC </span>
                    <span class="text-xl italic tracking-wide" style=""> {{ $reservation->subject }} </span>
                </span>

                <span class="flex flex-col">
                    <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-11px]"> RESERVER NAME </span>
                    <span class="text-3xl font-extrabold text-amber-600 tracking-wide" style=""> {{ $reservation->reserver_name }} </span>
                </span>

            </div>
        </left_side>

        <right_side class="w-[70%] min-w-[250px] p-6 py-8 flex flex-col flex-grow gap-6">

            <span class="opacity-50">/////////////</span>

            <span class="flex flex-col">
                <span class="text-xs code opacity-25 select-none tracking-tight"> START </span>
                <span class="text-3xl" style="">
                    <?php
                        $arr = explode(" ", $reservation->start);
                        $date = date("D, d M Y", strtotime($reservation->start));
                        echo "<span class=' font-extrabold'> $arr[1] </span>";
                        echo "<span class='text-sm'> $date </span>";
                    ?>
                </span>
            </span>
            <span class="flex flex-col">
                <span class="text-xs code opacity-25 select-none tracking-tight"> END </span>
                <span class="text-3xl" style="">
                    <?php
                        $arr = explode(" ", $reservation->end);
                        $date = date("D, d M Y", strtotime($reservation->start));
                        echo "<span class=' font-extrabold'> $arr[1] </span>";
                        echo "<span class='text-sm'> $date </span>";
                    ?>
                </span>
            </span>
            <span class="flex flex-col">
                <span class="text-xs code opacity-25 select-none tracking-tight"> REMARK </span>
                <textarea class="p-4 rounded-xl mt-2 border text-xs bg-transparent transition-none dark:bg-zinc-800" style="">{{ $reservation->remark }}</textarea>
            </span>
            <span class="flex flex-col">
                <span class="text-xs code opacity-25 select-none tracking-tight"> PIN </span>
                <span class="text-3xl code" style="">
                    {{ $reservation->pin }}
                </span>
            </span>
        </right_side>
    </booking_container>

    {{-- <div class="gap-4 flex flex-col">
        <div class="flex gap-4">
            Reservation id:
            <div class="rounded-full w-fit px-5 py-1 bg-teal-300 font-bold dark:text-zinc-900 select-none text-[5px]"> {{ $reservation["id"] }}         </div>
        </div>
        <div class="rounded-xl p-6 bg-zinc-800">
            Room name:
            {{ $reservation["room_id"] }}
        </div>
        <div class=""> {{ $reservation["reserver_name"] }}   </div>
        <div class=""> {{ $reservation["subject"] }}         </div>
        <div class=""> {{ $reservation["remark"] }}          </div>
    </div> --}}

@endsection
