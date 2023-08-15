<input
    name="{{ strtolower($display_name) }}"
    id="{{ strtolower($display_name) }}"
    class="{{ $input_classes }} @error(strtolower($display_name)) {{ $error_classes }} @enderror"
    type="number"
    placeholder="{{ $placeholder }}"
    @if(isset( $init_value ))
        value="{{ $init_value }}"
    @endif
    @if(isset( $required ))
        required
    @endif
    @if(isset( $step ))
        step="{{ $step }}"
    @endif
>
