<textarea
    name="{{ strtolower($display_name) }}"
    id="{{ strtolower($display_name) }}"
    cols="30"
    rows="5"
    class="{{ $input_classes }} code rounded transition-none
            border hover:bg-transparent
            dark:bg-zinc-900 @error(strtolower($display_name)) {{ $error_classes }} @enderror"
    placeholder="{{ $placeholder }}"
    @if(isset( $init_value ))
        value="{{ $init_value }}"
    @endif
></textarea>
