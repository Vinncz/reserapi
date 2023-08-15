<?php
    if ( !isset($options) ) {
        throw new Error ($a . "`options`" . $b);
    }
?>

<select
    name="{{ strtolower($display_name) }}"
    id="{{ strtolower($display_name) }}"
    class="{{ $input_classes }} @error(strtolower($display_name)) {{ $error_classes }} @enderror"
    placeholder="{{ $placeholder }}"
    @if(isset( $required ))
        required
    @endif
>

    @foreach ($options as $option)
        <option
            value="{{ $option->id }}"
            @if( $init_value == $option->id )
                selected
            @endif
        > {{ $option->name }} </option>
    @endforeach

</select>
