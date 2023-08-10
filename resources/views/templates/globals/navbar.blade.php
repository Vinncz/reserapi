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
    $path = $_SERVER['REQUEST_URI'];

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

<navbar class="w-full border-b py-5 justify-center items-center flex">
    <navbar_wrapper class="select-none px-5 max-w-5xl w-full flex relative items-center gap-10 text-xs">
        <a class="font-bold text-lg" href="/"> Reserapi™ </a>
        <div class="flex gap-2 font-bold ">
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
        <form class="ml-auto" action="/search">
            <input
                class="px-4 py-2 border rounded dark:bg-transparent dark:hover:bg-zinc-800"
                name="query"
                type="text"
                placeholder="Search anything.."
                value={{ request('query') }}
            />
        </form>
    </navbar_wrapper>
</navbar>
