@extends('templates.page_layouts.generic')

@section('children')
    @include('templates.globals.page_title', ["title" => "My Reservations"])

    <div class="flex flex-col gap-2 mt-6">
        @if(session()->has('reservation-made-event'))
            @include('templates.component_layouts.alerts.success', [
                "title" => "Successfully registered!",
                "message" => session('reservation-made-event'),
            ])
        @endif

        {{ $reservations->links() }}

        <div class="flex flex-col w-full overflow-x-auto border rounded-xl">
            <table class="">
                <tr class="">
                    <th class=""> ID                </th>
                    <th class=""> Room Name           </th>
                    <th class=""> Subject           </th>
                    <th class=""> Priority           </th>
                    <th class=""> Start            </th>
                    <th class=""> End              </th>
                    <th class=""> Remark            </th>
                </tr>

                @foreach ($reservations as $reservation)
                    <tr class="cursor-pointer" onclick="window.location.assign(`/reservations/id/{{ $reservation['id'] }}`)">
                        <td class=""> {{ $reservation->id }}               </td>
                        <td class=""> {{ $reservation->Room->name }}         </td>
                        <td class=""> {{ $reservation->subject }}         </td>
                        <td class=""> {{ $reservation->Priority->name }}         </td>
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
                        <td class=""> {{ $reservation->remark }}          </td>
                    </tr>
                @endforeach
            </table>
        </div>

        {{ $reservations->links() }}

    </div>
@endsection
