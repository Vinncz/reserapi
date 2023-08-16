<input
    name="{{ strtolower($display_name) }}"
    id="{{ strtolower($display_name) }}"
    class="cursor-pointer {{ $input_classes }} @error(strtolower($display_name)) {{ $error_classes }} @enderror flatpickr-theme-dark"
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
    step="900"
>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>

<script>
    flatpickr("#{{ strtolower($display_name) }}", {
        enableTime: true,
        altInput: true,
        altFormat: "Y-m-d H:i",
        minDate: "{{ date('Y-m-d H:i', strtotime($min)) }}",
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        minuteIncrement: 15,
    });
</script>

