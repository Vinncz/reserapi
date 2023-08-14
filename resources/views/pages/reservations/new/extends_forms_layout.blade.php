@include('templates.component_layouts.forms.field_types')

<?php
    $fields = [
        [
            "display_name" => "Subject",
            "field_type" => FieldTypes::STRING,
            "options" => $rooms,
            "placeholder" => "Brainstorming Summer Event Ideas",
        ],
        [
            "display_name" => "Room",
            "field_type" => FieldTypes::RADIO,
            "options" => $rooms,
        ],
        [
            // if you're using the nested attribute, no other attributes shall be present
            "nested" => [
                [
                    "display_name" => "Start",
                    "field_type" => FieldTypes::DATETIME,
                    "init_value" => now(),
                ],
                [
                    "display_name" => "End",
                    "field_type" => FieldTypes::DATETIME,
                    // "init_value" => now(),
                ],
            ]
        ],
        [
            "display_name" => "Remark",
            "field_type" => FieldTypes::TEXT,
            "placeholder" => "Don't forget to prepare the subject beforehand...",
        ],
        [
            "display_name" => "PIN",
            "field_type" => FieldTypes::NUMBER,
            "init_value" => 123456
        ],
    ];
?>

@extends('templates.component_layouts.forms.base')
