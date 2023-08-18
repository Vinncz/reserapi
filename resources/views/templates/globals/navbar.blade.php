<?php
    /**
     * Example:
     * localhost:8000/reservations
     *
     * Output of $_SERVER['REQUEST_URI']:
     * "/reservations"
     *
     * Example:
     * localhost:8000/about
     *
     * Output of $_SERVER['REQUEST_URI']:
     * "/about"
    */
    $path = explode("?", $_SERVER['REQUEST_URI'])[0];

    /**
     * (!) NOTE TO SELF:
     * Property "path" haruslah sama dengan yang tertulis pada "web.php"
    */
    $links = [
        [
            "display_name" => "Home",
            "path" => "/"
        ],
        [
            "display_name" => "Reservations",
            "path" => "/reservations"
        ],
        [
            "display_name" => "Rooms",
            "path" => "/rooms"
        ],
        [
            "display_name" => "New",
            "path" => "/reservations/new"
        ]
    ];

    $element_classes = "font-bold hover:bg-zinc-200 dark:hover:bg-zinc-800 rounded px-4 py-2 ";
?>
{{-- @dd($path) --}}
<navbar class="w-full border-b py-3 justify-center items-center flex">
    <navbar_wrapper style="" class="select-none px-5 max-w-5xl w-full flex relative items-center gap-10 text-xs">
        <a class="font-bold text-base" href="/"> Reserapi™ </a>
        <div class="flex gap-2 text-xs max-sm:hidden">
            @foreach ($links as $link)
                <?php $temp_element_classes = $element_classes ?>

                @if ($path != $link["path"])
                    <?php $temp_element_classes = $temp_element_classes . " opacity-25 hover:opacity-100" ?>
                @endif

                <a class="{{ $temp_element_classes }}" href='{{ $link["path"] }}'>
                    {{ $link["display_name"] }}
                </a>
            @endforeach
        </div>

        <div class=" flex ml-auto gap-4 items-center ">
            <form class="max-md:hidden gap-4 flex items-center " action="/search">
                <span class="font-bold"> Search </span>
                <input
                    class="px-4 py-2 border rounded dark:bg-transparent dark:hover:bg-zinc-800"
                    name="query"
                    type="text"
                    placeholder="Search anything.."
                    value="<?= request('query') ?>"
                />
            </form>
            @guest
                <a class="max-sm:hidden flex" href="/auth/login" alt="login">
                    <i class="text-2xl bi bi-person-circle text-rose-400"></i>
                </a>
            @else
                <a class="overflow-hidden max-sm:hidden flex border hover:outline-zinc-300 dark:hover:outline-zinc-700 hover:outline rounded-full aspect-square items-center justify-center w-[30px] h-[30px]" href="/dashboard" alt="dashboard">
                    <?php $two_letters = Str::upper(substr(auth()->user()->name, 0, 1) . substr(auth()->user()->name, -1)) ?>
                    <span class="text-base p-2 font-bold text-center hover:bg-zinc-300 dark:hover:bg-zinc-800"> {{ $two_letters }} </span>
                </a>
            @endauth
        </div>


        <span onclick="toggle_navbar_click(0)" class="font-bold text-3xl ml-auto sm:hidden z-40 px-4 py-3 hover:border-inherit border border-transparent rounded cursor-pointer "> = </span>

        <collapsible_navbar onclick="toggle_navbar_click(1)" id="collapsible_navbar" class="hidden bg-opacity-75 bg-black sm:hidden flex flex-col gap-4 fixed top-0 right-0 z-20 w-full h-full">
            <div onclick="toggle_navbar_click(2)" class="w-80 absolute h-full top-0 right-0 bg-slate-100 dark:bg-zinc-800 z-30">
                <div class="flex flex-col w-full h-full mt-36 text-end">
                    @foreach ($links as $link)
                        <?php $temp_element_classes = $element_classes ?>

                        @if ($path != $link["path"])
                            <?php $temp_element_classes = $temp_element_classes . " opacity-25 hover:opacity-100" ?>
                        @endif

                        <a class="{{ $temp_element_classes }}" href='{{ $link["path"] }}'>
                            {{ $link["display_name"] }}
                        </a>
                    @endforeach
                </div>

                <form class="max-md:hidden ml-auto gap-4 flex items-center" action="/search">
                    Search
                    <input
                        class="px-4 py-2 border rounded dark:bg-transparent dark:hover:bg-zinc-800"
                        name="query"
                        type="text"
                        placeholder="Search anything.."
                        value="<?= request('query') ?>"
                    />
                </form>
            </div>
        </collapsable_navbar>

        <script>
            function toggle_navbar_click (b) {
                console.log(b)
                if (b != 0) return
                let a = document.getElementById("collapsible_navbar");
                a.classList.toggle('hidden')
            }
        </script>

    </navbar_wrapper>
</navbar>
