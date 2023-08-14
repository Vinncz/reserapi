<textarea
    name=""
    id=""
    cols="30"
    rows="5"
    class="{{ $input_classes }} code rounded transition-none
            border hover:bg-transparent
            dark:bg-zinc-900"
    style="font-family: 'IBM Plex Sans'"
    placeholder="{{ $placeholder }}"
    @if(isset( $init_value ))
        value="{{ $init_value }}"
    @endif
></textarea>
