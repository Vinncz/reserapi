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

    $element_classes = "hover:border-inherit border border-transparent rounded px-4 py-2 ";
?>
{{-- @dd($path) --}}
<navbar class="w-full border-b py-5 justify-center items-center flex">
    <navbar_wrapper style="" class="select-none px-5 max-w-5xl w-full flex relative items-center gap-10 text-xs">
        <a class="font-bold text-lg" href="/"> Reserapi™ </a>
        <div class="flex gap-2 font-bold max-sm:hidden">
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
