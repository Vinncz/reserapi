<?php
    $value = $use_old_values && old($name) !== null ? old($name) : $init_value;
?>

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
    type="text"
    {{ $required ? "required" : "" }}
    maxlength="{{ $max }}"
    minlength="{{ $min }}"
>
