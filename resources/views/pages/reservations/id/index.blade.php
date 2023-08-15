@extends('templates.page_layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => "Reservation Detail"])

    {{-- @include('templates.component_layouts.two_sectioned_card') --}}

    {{-- what to do here to pass HTML element as child --}}

    <booking_container class="flex flex-wrap rounded-xl h-fit border resize transition-none break-words p-2 overflow-hidden mb-12">
        <left_side class="portrait:after:w-0
                          after:absolute
                            after:top-0
                            after:left-[100%]
                            after:ml-[5px]
                            after:dark:bg-zinc-800
                            after:bg-slate-100
                            after:rounded
                            after:w-[5px]
                            after:h-full
                          w-[30%]
                            min-w-[175px]
                            bg-slate-100
                            text-slate-700
                            rounded
                            p-6
                            py-8
                            gap-6
                            flex
                            flex-col
                            flex-grow
                          dark:bg-zinc-800
                            dark:text-inherit">
            <span class="flex flex-col gap-2">
                <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-10px]"> IDENTIFIER </span>
                <div class="rounded-full w-fit px-5 py-1 dark:bg-teal-300 bg-slate-500 text-slate-50 font-bold dark:text-zinc-900 text-[5px]">
                    RSID-00{{ $reservation["id"] }}
                </div>
            </span>

            <div class="flex flex-col w-full gap-x-6 gap-y-3 mt-auto pt-16">
                <span class="flex flex-col">
                    <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-4px]"> WHERE </span>
                    <span class="text-lg tracking-wide" style=""> {{ $reservation->Room->name  }} </span>
                </span>

                <span class="flex flex-col">
                    <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-4px]"> TOPIC </span>
                    <span class="text-lg tracking-wide" style=""> {{ $reservation->subject }} </span>
                </span>

                <span class="flex flex-col">
                    <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-11px]"> RESERVER NAME </span>
                    <span class="text-3xl font-extrabold text-slate-600 dark:text-amber-400 tracking-wide" style=""> {{ $reservation->User->name }} </span>
                </span>

            </div>
        </left_side>

        <right_side class="w-[70%] min-w-[200px] p-6 px-8 py-8 flex flex-col flex-grow gap-6">

            <span class="opacity-50 select-none">/////////////</span>

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
                <span class="text-3xl code tracking-tighter" style="">
                    {{ $reservation->pin }}
                </span>
            </span>
        </right_side>
    </booking_container>

    @include('templates.globals.page_title', ["title" => "Room Detail"])

    <booking_container class="flex flex-wrap rounded-xl h-fit border resize transition-none break-words p-2 overflow-hidden mb-12">
        <left_side class="portrait:after:w-0
                          after:absolute
                            after:top-0
                            after:left-[100%]
                            after:ml-[5px]
                            after:dark:bg-zinc-800
                            after:bg-slate-100
                            after:rounded
                            after:w-[5px]
                            after:h-full
                          w-[30%]
                            min-w-[175px]
                            bg-slate-100
                            text-slate-700
                            rounded
                            p-6
                            py-8
                            gap-6
                            flex
                            flex-col
                            flex-grow
                          dark:bg-zinc-800
                            dark:text-inherit">
            <span class="flex flex-col gap-2">
                <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-10px]"> IDENTIFIER </span>
                <div class="rounded-full w-fit px-5 py-1 dark:bg-teal-300 bg-slate-500 text-slate-50 font-bold dark:text-zinc-900 text-[5px]">
                    RID-00{{ $reservation->room_id }}
                </div>
            </span>

            <div class="flex flex-col w-full gap-x-6 gap-y-3 mt-auto pt-16">

                <?php
                    $room_facilities = json_decode($reservation->Room->facilities)->facilities;
                    $room_location = json_decode($reservation->Room->location);
                    $room_floor = $room_location->floor;
                    $room_landmark = $room_location->landmark;
                ?>

                <span class="flex flex-col">
                    <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-8px]"> LOCATION </span>
                    <span class="text-lg tracking-wide" style=""> {{ $room_floor }} Floor </span>
                </span>

                <span class="flex flex-col">
                    <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-8px]"> LANDMARK </span>
                    <span class="text-lg tracking-wide" style=""> {{ $room_landmark == null ? "Unspecified" : $room_landmark }} </span>
                </span>

                <span class="flex flex-col">
                    <span class="text-xs code opacity-25 select-none tracking-tight w-fit scale-75 ml-[-8px]"> ROOM NAME </span>
                    <span class="text-3xl font-extrabold text-slate-600 dark:text-amber-400 tracking-wide" style=""> {{ $reservation->Room->name }} </span>
                </span>

            </div>
        </left_side>

        <right_side class="w-[70%] min-w-[200px] p-6 px-8 py-8 flex flex-col flex-grow gap-6">

            <span class="opacity-50 select-none">/////////////</span>

            <span class="flex flex-col">
                <span class="text-xs code opacity-25 select-none tracking-tight"> FACILITIES </span>
                <span class="text-xl gap-2 flex flex-col mt-2 ml-[-3px]" style="">
                    @foreach ($room_facilities as $facilities)
                        <span> • {{ ucfirst($facilities) }} </span>
                    @endforeach
                </span>
            </span>
            <span class="flex flex-col">
                <span class="text-xs code opacity-25 select-none tracking-tight"> ROOM ANNOUNCEMENTS </span>
                <textarea class="p-4 rounded-xl mt-2 border text-xs bg-transparent transition-none dark:bg-zinc-800" style="">{{ $reservation->Room->announcement }}</textarea>
            </span>
            <span class="flex flex-col">
                <span class="text-xs code opacity-25 select-none tracking-tight"> CAPACITY </span>
                <span class="text-3xl code tracking-tighter" style="">
                    {{ $reservation->Room->capacity }}
                </span>
            </span>
        </right_side>
    </booking_container>

@endsection
