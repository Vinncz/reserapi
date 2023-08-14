<input
    name="{{ strtolower($display_name) }}"
    id="{{ strtolower($display_name) }}"
    class="{{ $input_classes }}"
    type="text"
    placeholder="{{ $placeholder }}"
    @if(isset( $init_value ))
        value="{{ $init_value }}"
    @endif
    @if(isset( $required ))
        required
    @endif
>
