@extends('templates.page_layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => $room->name." Room"])

    <div class="flex w-full h-72 rounded-xl dark:bg-zinc-800 mt-4 p-6">
        Room galery
    </div>

    <span class="mt-12 select-none mb-2 opacity-50 italic"> Attributes </span>
    <span class="gap-3 flex items-center"> <i class="bi bi-geo-fill    font-bold pr-3 py-2 aspect-square"></i> Floor {{ json_decode($room->location)->floor }}, near {{ strtolower(json_decode($room->location)->landmark) }}. </span>
    <span class="gap-3 flex items-center"> <i class="bi bi-people-fill font-bold pr-3 py-2 aspect-square"></i> Can fit {{ $room->capacity }} persons. </span>
    <span class="gap-3 flex items-center"> <i class="bi bi-collection-fill font-bold pr-3 py-2 aspect-square"></i> Has @foreach (json_decode($room->facilities)->facilities as $a) {{ $a }}, @endforeach </span>


    <div class="mt-16">
        @include('templates.globals.page_title', ["title" => "Room Schedule"])
    </div>

    <?php
        $reservations = App\Models\Reservation::where("room_id", "=", $room->id)->paginate(8);
    ?>

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

            @foreach ($reservations as $reservation)
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
                    <td class="large-content"> {{ $reservation->remark }}          </td>
                </tr>
            @endforeach
        </table>

    </div>

    {{ $reservations->links() }}

@endsection
