@extends('templates.layouts.generic')

@section('children')
    {{-- this is how you import "components" in Laravel --}}
    @include('templates.globals.page_title', ["title" => "Closest Reservations"])

    <div class="flex flex-col w-full overflow-x-auto border rounded-xl">
        <table class="">
            <tr class="">
                <th class=""> ID                </th>
                <th class=""> Room ID           </th>
                <th class=""> Reserver Name     </th>
                <th class=""> Subject           </th>
                <th class=""> Remark            </th>
                {{-- <th class=""> Start            </th>
                <th class=""> End              </th> --}}
            </tr>
            
            @foreach ($reservations as $reservation)
            <tr class="cursor-pointer" onclick="window.location.assign(`/reservations/{{ $reservation['id'] }}`)">
                <a class="flex absolute top-0 left-0 h-full w-full" href=""></a>

                <td class=""> {{ $reservation["id"] }}              </td>
                <td class=""> {{ $reservation["room_id"] }}         </td>
                <td class=""> {{ $reservation["reserver_name"] }}   </td>
                <td class=""> {{ $reservation["subject"] }}         </td>
                <td class=""> {{ $reservation["remark"] }}          </td>
                {{-- <td class="">
                    <?php
                        $arr = explode(" ", $reservation["start"]);
                        echo "<span class='font-bold'> $arr[0] </span>";
                        echo "<span class=''> $arr[1] </span>";
                    ?>
                </td>
                <td class="">
                    <?php
                        $arr = explode(" ", $reservation["end"]);
                        echo "<span class='font-bold'> $arr[0] </span>";
                        echo "<span class=''> $arr[1] </span>";
                    ?>
                </td> --}}
            </tr>
            @endforeach
        </table>
    </div>

    <br><br>

    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni harum, recusandae voluptatum corporis aliquam temporibus sapiente dolor illum ipsum, consequuntur quasi vel voluptatibus dicta ex delectus minima debitis, omnis cum!Accusantium animi accusamus eos eius aliquid corporis eum aspernatur obcaecati enim libero hic quo laudantium molestias deleniti beatae laborum iusto dicta ab est, similique voluptatem dolorem? Deleniti iusto modi atque.
@endsection
