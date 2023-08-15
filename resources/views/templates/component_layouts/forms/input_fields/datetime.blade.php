<input
    name="{{ strtolower($display_name) }}"
    class="{{ $input_classes }} @error(strtolower($display_name)) {{ $error_classes }} @enderror"
    type="{{ $field_type }}"
    value="{{ null !== old(strtolower($display_name)) ? old(strtolower($display_name)) : (isset( $init_value ) ? date('Y-m-d H:i', strtotime($init_value)) : null) }}"
    @if(isset( $required ) && $required)
        required
    @endif
    @if(isset( $min ))
        min="{{ date('Y-m-d H:i', strtotime($min)) }}"
    @endif
    @if(isset( $max ))
        max="{{ date('Y-m-d H:i', strtotime($max)) }}"
    @endif
>
