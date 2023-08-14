<?php
    if ( !isset($options) ) {
        throw new Error ($a . "`options`" . $b);
    }

    $input_classes = "hidden peer";
    $label_classes = "text-sm cursor-pointer w-full px-4 py-3 h-full select-none
                        peer-checked:bg-indigo-300 peer-checked:font-bold peer-checked:px-6 bg-zinc-100 hover:bg-zinc-50
                        dark:hover:bg-zinc-800 dark:peer-checked:bg-zinc-700 dark:peer-checked:text-amber-400 dark:bg-zinc-900";
?>
<div class="flex flex-wrap">
    @foreach ($options as $opt)
        <div class="{{--divide-x divide-y --}} flex flex-grow items-center justify-center text-center">
            <input
                name="{{ strtolower($display_name) }}"
                id="{{ strtolower($opt->name) }}"
                value="{{ strtolower($opt->id) }}"
                class="{{ $input_classes }}"
                type="radio"
                @if(isset( $init_value ))
                    value="{{ $init_value }}"
                @endif
                @if(isset( $required ))
                    required
                @endif
            >
            <label class="{{ $label_classes }}" for="{{ strtolower($opt->name) }}">
                {{ $opt->name }}
            </label>
        </div>
    @endforeach
</div>
