<?php
    $value = $use_old_values && ( old($name) !== null ) ? old($name) : $init_value;
?>

<div class="flex h-full items-center">
    <input
        {{
            $attributes->merge([
                "class" => $class . ($errors->has($name) ? $error_class : ''),
            ])
        }}
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
        {{-- class="
            {{ $class }}
            @error($name)
                {{ $error_class }}
            @enderror
        " --}}
        type="number"
        {{ $required ? "required" : "" }}
        max="{{ $max }}"
        min="{{ $min }}"
        step="{{ $step }}"
    >

    @if ($enable_buttons)
        <div class="right-0 top-0 h-full flex w-[75px] justify-center">
            <button id="{{ "decrement_input_".$name }}" type="button" class="@error($name){{ $error_class }}@enderror dark:hover:bg-zinc-700 p-2 px-4 h-full w-full {{ $class }}">-</button>
            <button id="{{ "increment_input_".$name }}" type="button" class="@error($name){{ $error_class }}@enderror dark:hover:bg-zinc-700 p-2 px-4 h-full w-full {{ $class }}">+</button>
        </div>

        <script>
            let {{ "decrement_input_".$name }} = document.getElementById("{{ 'decrement_input_'.$name }}")
            let {{ "increment_input_".$name }} = document.getElementById("{{ 'increment_input_'.$name }}")

            if ({{ "decrement_input_".$name }} != null && {{ "increment_input_".$name }} != null) {
                let number_input_field_{{ $name }} = document.getElementById("{{ $name }}")
                if (number_input_field_{{ $name }} != null) {
                    {{ "decrement_input_".$name }}.addEventListener("click", () => {
                        if (number_input_field_{{ $name }}.value > {{ $min }})
                            number_input_field_{{ $name }}.value -= {{ $step }}
                    })
                    {{ "increment_input_".$name }}.addEventListener("click", () => {
                        if (number_input_field_{{ $name }}.value < {{ $max }})
                            number_input_field_{{ $name }}.value = parseInt(number_input_field_{{ $name }}.value) + {{ $step }}
                    })
                }
            }
        </script>
    @endif
</div>
