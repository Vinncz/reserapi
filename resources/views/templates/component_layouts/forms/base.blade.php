<?php
    $light = "";
    $dark  = "";

    $field_classes = "flex flex-col flex-grow gap-2";
    $label_classes = "opacity-1030 select-none";
    $input_classes = "border-b p-3 px-3 rounded-none placeholder:text-zinc-100
                        -outline-offset-2 focus:outline-2 focus:outline outline-blue-500
                        hover:bg-zinc-100
                        dark:hover:bg-zinc-900 dark:bg-zinc-900 dark:placeholder:text-zinc-700";
?>

<form action=""
      method=""
      class="mt-4 flex flex-col gap-6 sm:w-[60%]
             {{ $light }} {{ $dark }}"
             style="font-family: 'IBM Plex Sans'"
>

    @foreach ($fields as $field)
        <?php
            $nested_is_present = isset($field["nested"]);
            $nested_is_present_and_has_more_than_0_attributes = $nested_is_present && sizeof($field["nested"]) > 0;
        ?>

        <div class="flex flex-wrap gap-6">

            @if( $nested_is_present_and_has_more_than_0_attributes )
            {{-- then you must loop through the nested attribute --}}

                @foreach ($field["nested"] as $nested)
                    <div class="{{ $field_classes }}">
                        @include('templates.component_layouts.forms.input_fields.base', [
                            "display_name" => $nested['display_name'],
                            "field_type"   => $nested['field_type'],
                            "init_value"   => isset($nested['init_value']) ? $nested['init_value'] : null,
                            "placeholder"   => isset($nested['placeholder']) ? $nested['placeholder'] : null,
                        ])
                    </div>
                @endforeach

            @else
            {{-- you handle the given field as normal --}}

                <div class="{{ $field_classes }}">
                    @include('templates.component_layouts.forms.input_fields.base', [
                        "display_name" => $field['display_name'],
                        "field_type"   => $field['field_type'],
                        "options"      => isset($field['options']) ? $field['options'] : null,
                        "init_value"   => isset($field['init_value']) ? $field['init_value'] : null,
                        "placeholder"  => isset($field['placeholder']) ? $field['placeholder'] : null,
                    ])
                </div>

            @endif

        </div>
    @endforeach

    @include('templates.component_layouts.buttons.green', [
        "message" => "Submit"
    ])

</form>
