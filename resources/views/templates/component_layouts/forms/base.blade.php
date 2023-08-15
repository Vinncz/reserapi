<?php
    $a = "Attribute ";
    $b = " must be declared/passed as parameter.";

    $field_classes = "flex flex-col flex-grow gap-2";
    if ( !isset($postback_address) ) {
        throw new Error ($a."`postback_address`".$b);
    }
?>

<div class="flex gap-6 mt-8 ">
    <form action="{{ $postback_address }}"
        method="post"
        class="flex flex-col gap-6 sm:w-[65%]"
        style="font-family: 'IBM Plex Sans'"
    >

        @csrf

        @if(session()->has('fatal-error'))
            @include('templates.component_layouts.alerts.error', [
                // "title" => "Successfully registered!",
                "message" => session('fatal-error'),
                "custom_classes" => "mb-4"
            ])
        @endif

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
                                "required"   => isset($nested['required']) ? $nested['required'] : null,
                                "step"   => isset($nested['step']) ? $nested['step'] : null,
                                "min"   => isset($nested['min']) ? $nested['min'] : null,
                                "max"   => isset($nested['max']) ? $nested['max'] : null,
                                "buttons"   => isset($nested['buttons']) ? $nested['buttons'] : null,
                            ])

                            @error(strtolower($nested['display_name']))
                                <span class="text-rose-500">
                                    {{ $message }}
                                </span>
                            @enderror
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
                            "required"  => isset($field['required']) ? $field['required'] : null,
                            "step"  => isset($field['step']) ? $field['step'] : null,
                            "min"  => isset($field['min']) ? $field['min'] : null,
                            "max"  => isset($field['max']) ? $field['max'] : null,
                            "buttons"  => isset($field['buttons']) ? $field['buttons'] : null,
                        ])
                        @error(strtolower($field['display_name']))
                            <span class="text-rose-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                @endif

            </div>
        @endforeach

        @include('templates.component_layouts.buttons.green', [
            "message" => "Submit"
        ])

    </form>

    <div class="max-sm:hidden w-[20%] min-w-[150px] ml-auto p-2 rounded-xl h-full">
        @include('templates.component_layouts.alerts.base', [
            "message" => "<span class='font-bold'> It is recommended that you change the default pin. </span> <br/><br/> <span class='text-xs opacity-60'> That pin is useful to edit or confirm your reservation. </span>",
            "icon" => "bi-info-circle-fill",
            "icon_position" => "top",
            "custom_classes" => "ss gradient-1"
        ])
    </div>
</div>
