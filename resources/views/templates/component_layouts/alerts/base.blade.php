<?php
    // $title     = "Title";
    // $message   = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati dolore quasi officiis necessitatibus, sequi velit.";
?>

<div class="border-2 p-4 rounded-md flex items-center gap-4
            {{ $light_classes }}
            {{ $dark_classes }}
            !bg-opacity-60 backdrop-blur-xl">
    @if (isset($icon) && strlen($icon) > 0)
        <i class="text-2xl bi {{ $icon }} h-full mt-[-7.5px]"></i>
    @endif

    <div class="flex flex-col w-full gap-2">
        @if (isset($title) && strlen($title) > 0)
            <span class="font-bold"> {{ $title }} </span>
        @endif
        <span class=""> {{ $message }} </span>
    </div>
</div>
