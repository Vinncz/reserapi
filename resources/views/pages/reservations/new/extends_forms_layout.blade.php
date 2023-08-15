@include('templates.component_layouts.forms.field_types')

<?php
    $fields = [
        [
            "display_name" => "Subject",
            "field_type" => FieldTypes::STRING,
            "max" => 1022,
            "required" => true,
            "options" => $rooms,
            "placeholder" => "Brainstorming Summer Event Ideas",
        ],
        [
            "display_name" => "Room",
            "init_value" => 0,
            "field_type" => FieldTypes::SELECT,
            "options" => $rooms,
        ],
        [
            // if you're using the nested attribute, no other attributes shall be present
            "nested" => [
                [
                    "display_name" => "Start",
                    "required" => true,
                    "field_type" => FieldTypes::DATETIME,
                    "init_value" => now(),
                    "min" => now(),
                ],
                // [
                //     "display_name" => "End",
                //     "required" => true,
                //     "field_type" => FieldTypes::DATETIME,
                //     // "init_value" => now(),
                // ],
                [
                    "display_name" => "Duration",
                    "required" => true,
                    "field_type" => FieldTypes::NUMBER,
                    "buttons" => true,
                    "step" => 15,
                    "init_value" => 30,
                    "min" => 15,
                ],
            ]
        ],
        [
            "display_name" => "Importance",
            "required" => false,
            "field_type" => FieldTypes::RADIO,
            "options" => $priorities,
            "init_value" => 3
        ],
        [
            "display_name" => "PIN",
            "required" => true,
            "field_type" => FieldTypes::NUMBER,
            "init_value" => 123456,
            "min" => 000000,
            "max" => 999999,
        ],
        [
            "display_name" => "Remark",
            "required" => false,
            "field_type" => FieldTypes::TEXT,
            "max" => 2046,
            "placeholder" => "Don't forget to prepare the subject beforehand...",
        ],
    ];
?>

@extends('templates.component_layouts.forms.base', [
    "postback_address" => "/reservations/new",
])
