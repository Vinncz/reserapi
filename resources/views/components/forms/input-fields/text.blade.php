@props([
    "name",
    "id" => null,
    "class" => null,
    "placeholder" => null,
    "init_value" => null,
    "required" => false,
    "max" => null,
    "min" => null,
    "use_old_values" => false,
])

<?php $name = strtolower($name); ?>

<input
    name="{{ $name }}"
    id="{{ isset($id) ? $id : $name }}"
    placeholder="{{ $placeholder }}"
    value="{{
        null !== old($name) ?
            old($name)
            : (  isset($init_value) ? $init_value : null  )
    }}"
    class="
        {{ $class }}
        {{ $inherited_classes }}
        @error($name)
            {{ $inherited_error_classes }}
        @enderror
    "
    type="text"
    {{ $required ? "required" : "" }}
    maxlength="{{ $max }}"
    minlength="{{ $min }}"
>
