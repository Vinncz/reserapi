<?php
    // $title     = "Title";
    // $message   = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati dolore quasi officiis necessitatibus, sequi velit.";

    if ( !isset($icon_position) ) {
        $icon_position = "side";
    }
?>

<div class="border-2 p-4 rounded-md flex items-center gap-4
            {{ isset($light_classes) ? $light_classes : "text-slate-600 border-none bg-slate-200" }}
            {{ isset($dark_classes) ? $dark_classes : "dark:text-slate-300 dark:bg-slate-800" }}
            {{ isset($custom_classes) ? $custom_classes : null }}
            !bg-opacity-60 backdrop-blur-xl">
    @if (isset($icon) && strlen($icon) > 0)
        <i class="@if ($icon_position == 'top') hidden @endif text-2xl bi {{ $icon }} h-full @if (isset($title) && strlen($title) > 0) mt-[-7.5px] @endif"></i>
    @endif

    <div class="flex flex-col w-full gap-2">
        @if (isset($icon) && strlen($icon) > 0)
            <i class="@if ($icon_position == 'side') hidden @endif text-2xl bi {{ $icon }} h-full @if (isset($title) && strlen($title) > 0) mt-[-7.5px] @endif"></i>
        @endif
        @if (isset($title) && strlen($title) > 0)
            <span class="font-bold"> {!! $title !!} </span>
        @endif
        <span class="text-sm"> {!! $message !!} </span>
    </div>
</div>
