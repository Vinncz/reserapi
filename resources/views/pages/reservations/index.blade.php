@extends('templates.page_layouts.generic')

@section('children')
    {{-- this is how you import "components" in Laravel --}}
    @include('templates.globals.page_title', ["title" => "Closest Reservations"])

    <div class="flex flex-col w-full overflow-x-auto border rounded-xl">
        <table class="">
            <tr class="">
                {{-- <th class=""> ID                </th> --}}
                <th class=""> Room Name           </th>
                <th class=""> Reserver Name     </th>
                <th class=""> Subject           </th>
                <th class=""> Start            </th>
                <th class=""> End              </th>
                <th class=""> Remark            </th>
            </tr>

            @foreach ($reservations as $reservation)
                <tr class="cursor-pointer" onclick="window.location.assign(`/reservations/id/{{ $reservation['id'] }}`)">
                    {{-- <td class="tiny-content"> {{ $reservation->id }}               </td> --}}
                    <td class="small-content"> {{ $reservation->Room->name }}         </td>
                    <td class="regular-content"> {{ $reservation->reserver_name }} </td>
                    <td class="small-content"> {{ $reservation->subject }}         </td>
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

    <br><br>

    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni harum, recusandae voluptatum corporis aliquam temporibus sapiente dolor illum ipsum, consequuntur quasi vel voluptatibus dicta ex delectus minima debitis, omnis cum!Accusantium animi accusamus eos eius aliquid corporis eum aspernatur obcaecati enim libero hic quo laudantium molestias deleniti beatae laborum iusto dicta ab est, similique voluptatem dolorem? Deleniti iusto modi atque.
@endsection
