@extends('templates.page_layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => $room->name." Room"])

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
                <span class="ml-11 rounded-full w-fit px-5 py-1 dark:bg-teal-300 bg-zinc-400 text-slate-50 font-bold dark:text-zinc-900 text-[5px]"> RID-00{{ $room->id }} </span>
            </span>

            <span class="gap-3 flex items-center">
                <i class="bi bi-geo-fill absolute top-[-4px] font-bold pr-3 py-1.5 aspect-square"></i>
                <span class="ml-12"> Located on floor {{ json_decode($room->location)->floor }}, near {{ strtolower(json_decode($room->location)->landmark) }}. </span>
            </span>

            <span class="gap-3 flex items-center">
                <i class="bi bi-people-fill absolute top-[-4px] font-bold pr-3 py-1.5 aspect-square"></i>
                <span class="ml-12"> Suitable for {{ $room->capacity }} persons or less. </span>
            </span>

            <span class="gap-3 flex items-center">
                <i class="bi bi-collection-fill absolute top-[-4px] font-bold pr-3 py-1.5 aspect-square"></i>
                <span class="ml-12"> Equipped with @foreach (json_decode($room->facilities)->facilities as $a) {{ $a }}, @endforeach </span>
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

            @foreach ($schedule as $reservation)
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
        </table>

    </div>

    {{ $schedule->links() }}

@endsection
