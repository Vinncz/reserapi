<?php

?>

<div class="flex h-full items-center">
    <input
        name="{{ strtolower($display_name) }}"
        id="{{ strtolower($display_name) }}"
        class="flex flex-grow @if (isset($buttons) && $buttons) mr-2 @endif {{ $input_classes }} @error(strtolower($display_name)) {{ $error_classes }} @enderror"
        type="number"
        placeholder="{{ $placeholder }}"
        value="{{ null !== old(strtolower($display_name)) ? old(strtolower($display_name)) : (isset( $init_value ) ? $init_value : null) }}"
        @if(isset( $min ))
            min="{{ $min }}"
        @else
            {{ $min = 0 }}
        @endif
        @if(isset( $max ))
            max="{{ $max }}"
        @endif
        @if(isset( $required ) && $required)
            required
        @endif
        @if(isset( $step ))
            step="{{ $step }}"
        @else
            {{ $step = 1 }}
        @endif
    >

    @if (isset($buttons) && $buttons)
        <div class="right-0 top-0 h-full flex w-[75px] justify-center">
            <button id="{{ "decrement_input_".strtolower($display_name) }}" type="button" class="dark:hover:bg-zinc-700 p-2 px-4 h-full w-full {{ $input_classes }}">-</button>
            <button id="{{ "increment_input_".strtolower($display_name) }}" type="button" class="dark:hover:bg-zinc-700 p-2 px-4 h-full w-full {{ $input_classes }}">+</button>
        </div>
    @endif
</div>

@if (isset($buttons) && $buttons)
    <script>
        let {{ "decrement_input_".strtolower($display_name) }} = document.getElementById("{{ 'decrement_input_'.strtolower($display_name) }}")
        let {{ "increment_input_".strtolower($display_name) }} = document.getElementById("{{ 'increment_input_'.strtolower($display_name) }}")

        if ({{ "decrement_input_".strtolower($display_name) }} != null && {{ "increment_input_".strtolower($display_name) }} != null) {
            let number_input_field_{{ strtolower($display_name) }} = document.getElementById("{{ strtolower($display_name) }}")
            if (number_input_field_{{ strtolower($display_name) }} != null) {
                {{ "decrement_input_".strtolower($display_name) }}.addEventListener("click", () => {
                    // console.log(number_input_field_{{ strtolower($display_name) }}.value);
                    if (number_input_field_{{ strtolower($display_name) }}.value > {{ $min }})
                        number_input_field_{{ strtolower($display_name) }}.value -= {{ $step }}
                })
                {{ "increment_input_".strtolower($display_name) }}.addEventListener("click", () => {
                    // console.log(number_input_field_{{ strtolower($display_name) }}.value);
                    number_input_field_{{ strtolower($display_name) }}.value = parseInt(number_input_field_{{ strtolower($display_name) }}.value) + {{ $step }}
                })
            }
        }

    </script>
@endif
