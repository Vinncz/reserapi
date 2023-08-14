<?php
    if ( !isset($options) ) {
        throw new Error ($a . "`options`" . $b);
    }
?>

<select
    name="{{ strtolower($display_name) }}"
    id="{{ strtolower($display_name) }}"
    class="{{ $input_classes }}"
    placeholder="{{ $placeholder }}"
    @if ( isset($init_value) )
        value="{{ $init_value }}"
    @endif
    @if(isset( $required ))
        required
    @endif
>

    @foreach ($options as $option)
        <option value="{{ $option->id }}"> {{ $option->name }} </option>
    @endforeach

</select>
