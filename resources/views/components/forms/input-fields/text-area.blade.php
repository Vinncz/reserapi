<?php
    $value = $use_old_values && old($name) !== null ? old($name) : $init_value;
?>

<textarea
    {{
        $attributes->merge([
            "class" => $class . ($errors->has($name) ? $error_class : ''),
        ])
    }}
    name="{{ $name }}"
    id="{{ $id }}"
    rows="5"
    placeholder="{{ $placeholder }}"
    maxlength="{{ $max }}"
    minlength="{{ $min }}"
    @if($required)
        required
    @endif
>{{ $value }}</textarea>
