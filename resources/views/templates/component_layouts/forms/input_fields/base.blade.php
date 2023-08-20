{{-- THIS FILE IS MARKED TO BE REPLACED WITH COMPONENTS --}}

<?php
    $a = "Attribute ";
    $b = " must be declared/passed as parameter.";
    $common_path = "templates/component_layouts/forms/input_fields/";

    /* Required attributes */
    if ( !isset($display_name) ) {
        throw new Error($a . "`display_name`" . $b);
    }
    if ( !isset($field_type) ) {
        throw new Error($a . "`field_type`" . $b);
    }

    $error_classes = "!bg-rose-200 border-rose-500 dark:!bg-rose-950 dark:border-rose-500 dark:placeholder:!text-rose-700 dark:text-rose-200 placeholder:!text-rose-300";

    $label_classes = "opacity-1030 select-none";
    $input_classes = "border-b p-3 rounded-none placeholder:text-zinc-300 w-full
                        -outline-offset-2 focus:outline-2 focus:outline outline-blue-500
                        hover:bg-zinc-100 h-full
                        dark:hover:bg-zinc-900 dark:bg-zinc-900 dark:placeholder:text-zinc-700";
?>

<label
    for="{{ strtolower($display_name) }}"
    class="{{ $label_classes }} @if(isset($required) && $required) after:content-['required*'] after:italic after:opacity-50 after:text-xs @endif"

>
    {{ $display_name }}
</label>

@if ( $field_type == FieldTypes::RADIO )

    @include($common_path."radio")

@elseif ( $field_type == FieldTypes::SELECT )

    @include($common_path."select")

@elseif ( $field_type == FieldTypes::STRING )

    {{-- @include($common_path."text") --}}
    {{-- pass param yang depannya ":" itu diterima sama class miliknya component/forms/input-fields/Text --}}
    <x-forms.input-fields.text name="{{ $display_name }}" placeholder="{!! $placeholder !!}" />

@elseif ( $field_type == FieldTypes::TEXT )

    <x-forms.input-fields.text-area :min="$min"  :value="$init_value" :required="$required" :max="$max" :name="$display_name" :placeholder="$placeholder" />

@elseif ( $field_type == FieldTypes::PASSWORD )

    @include($common_path."password")

@elseif ( $field_type == FieldTypes::EMAIL )

    @include($common_path."email")

@elseif ( $field_type == FieldTypes::NUMBER )

    {{-- ALWAYS pakai : didepannya --}}
    <x-forms.input-fields.number  :value="$init_value" :required="true" :max="$max" :useOldValues="true" :enableButtons="isset($buttons) && $buttons ? $buttons : false" :min="$min" :step="isset($step) == true ? $step : 1" :name="$display_name" :placeholder="$placeholder" />

@elseif ( $field_type == FieldTypes::DATETIME )

    @include($common_path."datetime")

@endif
