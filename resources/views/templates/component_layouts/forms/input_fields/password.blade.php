<input
    name="{{ strtolower($display_name) }}"
    id="{{ strtolower($display_name) }}"
    class="{{ $input_classes }} @error(strtolower($display_name)) {{ $error_classes }} @enderror"
    type="password"
    placeholder="{{ $placeholder }}"
    @if(isset( $init_value ))
        value="{{ $init_value }}"
    @endif
    @if(isset( $required ))
        required
    @endif
>
