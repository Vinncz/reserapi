<input
    name="{{ strtolower($display_name) }}"
    class="{{ $input_classes }}"
    type="{{ $field_type }}"
    @if(isset( $init_value ))
        value="{{ date('Y-m-d H:i', strtotime($init_value)) }}"
    @endif
>
