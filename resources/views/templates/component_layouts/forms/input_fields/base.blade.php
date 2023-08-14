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
?>

<label
    for="{{ strtolower($display_name) }}"
    class="{{ $label_classes }}"
    @if(isset($required) && $required)
        required 
    @endif
>
    {{ $display_name }}
</label>

@if ( $field_type == FieldTypes::RADIO )

    @include($common_path."radio")

@elseif ( $field_type == FieldTypes::SELECT )

    @include($common_path."select")

@elseif ( $field_type == FieldTypes::STRING )

    @include($common_path."text")

@elseif ( $field_type == FieldTypes::TEXT )

    @include($common_path."textarea")

@elseif ( $field_type == FieldTypes::NUMBER )

    @include($common_path."number")

@elseif ( $field_type == FieldTypes::DATETIME )

    @include($common_path."datetime")

@endif
