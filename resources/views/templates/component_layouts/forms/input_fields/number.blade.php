<?php

?>

<input
    name="{{ strtolower($display_name) }}"
    id="{{ strtolower($display_name) }}"
    class="{{ $input_classes }} @error(strtolower($display_name)) {{ $error_classes }} @enderror"
    type="number"
    placeholder="{{ $placeholder }}"
    value="{{ null !== old(strtolower($display_name)) ? old(strtolower($display_name)) : (isset( $init_value ) ? $init_value : null) }}"
    @if(isset( $min ))
        min="{{ $min }}"
    @endif
    @if(isset( $max ))
        max="{{ $max }}"
    @endif
    @if(isset( $required ))
        required
    @endif
    @if(isset( $step ))
        step="{{ $step }}"
    @endif
>
