<input
    name="{{ strtolower($display_name) }}"
    class="{{ $input_classes }} @error(strtolower($display_name)) {{ $error_classes }} @enderror"
    type="{{ $field_type }}"
    @if(isset( $init_value ))
        value="{{ date('Y-m-d H:i', strtotime($init_value)) }}"
    @endif
    @if(isset( $required ))
        required
    @endif
>
