@extends('templates.page_layouts.generic')

@section('children')
    <div class="flex gap-4 items-center">
        @include('templates.globals.page_title', ["title" => $room->name." Room"])
        @if ($occupied)
            <span class="flex px-6 py-2 h-fit mb-2 rounded-full items-center bg-rose-400 text-rose-800 dark:bg-rose-800 dark:text-rose-200 font-bold text-sm"> Occupied </span>
        @elseif($will_soon_be_occupied)
            <span class="flex px-6 py-2 h-fit mb-2 rounded-full items-center bg-orange-400 text-orange-800 dark:bg-orange-800 dark:text-orange-200 font-bold text-sm"> Will Soon be Occupied </span>
        @else
            <span class="flex px-6 py-2 h-fit mb-2 rounded-full items-center bg-teal-400 text-teal-800 dark:bg-teal-800 dark:text-teal-200 font-bold text-sm"> Available </span>
        @endif
    </div>

    <div class="flex w-full h-64 aspect-ratio-[2/3] overflow-hidden rounded-xl dark:bg-zinc-800 bg-zinc-100 shadow mt-4">
        <div class="flex sm:w-[75%] w-full bg-slate-700"></div>
        <div class="flex sm:w-[25%] w-full flex-col bg-slate-500">
            <div class="flex aspect-square bg-sky-500"></div>
            <div class="flex aspect-square bg-sky-700"></div>
        </div>
    </div>

    <div class="flex my-12 flex-wrap gap-16">
        <div class="flex flex-col gap-4 sm:max-w-[40%]">
            <span class="select-none mb-2 opacity-50 italic">
                Attributes
            </span>

            <span class="gap-3 flex items-center">
                <i class="bi bi-person-vcard-fill absolute top-[-6px] font-bold pr-3 py-1.5 aspect-square"></i>
                <span class="ml-11 rounded-full w-fit px-5 py-1 dark:bg-teal-300 bg-teal-600 text-slate-50 font-bold dark:text-zinc-900 text-[5px]"> RID-00{{ $room->id }} </span>
            </span>

            <span class="gap-3 flex items-center">
                <i class="bi bi-geo-fill absolute top-[-4px] font-bold pr-3 py-1.5 aspect-square"></i>
                <span class="ml-12"> Located on floor {{ json_decode($room->location)->floor }}, near {{ strtolower(json_decode($room->location)->landmark) }}. </span>
            </span>

            <span class="gap-3 flex items-center">
                <i class="bi bi-people-fill absolute top-[-4px] font-bold pr-3 py-1.5 aspect-square"></i>
                <span class="ml-12"> Suitable for {{ $room->capacity }} people or less. </span>
            </span>

            <span class="gap-3 flex items-center">
                <i class="bi bi-collection-fill absolute top-[-4px] font-bold pr-3 py-1.5 aspect-square"></i>
                <span class="ml-12">
                    Equipped with a

                    <?php $size = sizeof(json_decode($room->facilities)->facilities); $counter = 0; ?>
                    @foreach (json_decode($room->facilities)->facilities as $a)
                        @if($counter == $size - 1)
                            and a <span class="tracking-wide font-bold underline dark:text-sky-300 text-sky-700">{{ $a }}</span>.
                        @else
                            <span class="tracking-wide font-bold underline dark:text-sky-300 text-sky-700">{{ $a }}</span>,
                        @endif
                        <?php $counter++ ?>
                    @endforeach
                </span>
            </span>
        </div>

        <div class="flex flex-col flex-grow gap-4 sm:max-w-[60%] justify-center">
            <div class="flex justify-between">
                <span class="select-none opacity-50 italic items-center flex">
                    Room Annoucement
                </span>

                <a
                    href="/rooms/id/{{ $room->id }}/edit-announcement"
                    class="flex gap-2 items-center rounded-full dark:hover:bg-zinc-900 hover:bg-zinc-200 px-6 py-2 absolute right-[-1.5rem] top-[-0.5rem]"
                >
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
            </div>
            <textarea class="h-full" name="" id="" cols="" rows=""></textarea>
        </div>
    </div>

    <div class="mt-3 border-t pt-16">
        @include('templates.globals.page_title', ["title" => "Room Schedule"])
    </div>

    <div class="mt-6 flex flex-col w-full overflow-x-auto border rounded-xl">
        <table class="">
            <tr class="">
                {{-- <th class=""> ID                </th> --}}
                {{-- <th class=""> Room Name           </th> --}}
                <th class=""> Reserver Name     </th>
                <th class=""> Subject           </th>
                <th class=""> Priority           </th>
                <th class=""> Start            </th>
                <th class=""> End              </th>
                <th class=""> Remark            </th>
            </tr>

            <?php $printed = false ?>
            @foreach ($schedule as $reservation)
                <?php $printed = true ?>

                <tr class="cursor-pointer" onclick="window.location.assign(`/reservations/id/{{ $reservation['id'] }}`)">
                    {{-- <td class="tiny-content"> {{ $reservation->id }}               </td> --}}
                    {{-- <td class="small-content"> {{ $reservation->Room->name }}         </td> --}}
                    <td class="regular-content"> {{ $reservation->User->name }} </td>
                    <td class="small-content break-words"> {{ $reservation->subject }}         </td>
                    <td class="small-content"> {{ $reservation->Priority->name }}         </td>
                    <td class="large-content">
                        <?php
                            $arr = explode(" ", $reservation->start);
                            $date = date("D, d-M-Y", strtotime($reservation->start));
                        ?>
                        <span class="text-2xl"> {{ $arr[1] }} </span>
                        <br>
                        <span class=""> {{ $date }} </span>
                    </td>
                    <td class="large-content">
                        <?php
                            $arr = explode(" ", $reservation->end);
                            $date = date("D, d-M-Y", strtotime($reservation->end));
                        ?>
                        <span class="text-2xl"> {{ $arr[1] }} </span>
                        <br>
                        <span class=""> {{ $date }} </span>
                    </td>
                    <td class="large-content"> {{ substr($reservation->remark, 0, 35) }} ...          </td>
                </tr>
            @endforeach

            @if (!$printed)
                <tr class="" onclick="">
                    <td colspan="6" rowspan="2" class="py-16 pb-20 text-center"> There are no booking scheduled for this room. <br><br> <a href="/reservations/new" class="px-6 py-2 rounded bg-green-700 hover:bg-green-900 text-white font-bold text-sm tracking-wider"> Reserve this room </a> </td>
                </tr>
            @endif
        </table>

    </div>

    {{ $schedule->links() }}

@endsection
