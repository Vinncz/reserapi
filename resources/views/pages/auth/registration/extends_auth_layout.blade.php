@include('templates.component_layouts.forms.field_types')

<?php
    $fields = [
        [
            "display_name" => "Name",
            "field_type" => FieldTypes::STRING, # either text, password, number, etc.
            "required" => true,
            "placeholder" => "Abby Jane",
        ],
        [
            "display_name" => "Username",
            "field_type" => FieldTypes::STRING, # either text, password, number, etc.
            "required" => true,
            "placeholder" => "AbbyJ",
        ],
        [
            "display_name" => "Email",
            "field_type" => FieldTypes::EMAIL,
            "required" => true,
            "placeholder" => "abby.jane@gmail.com",
        ],
        [
            "display_name" => "Password",
            "field_type" => FieldTypes::PASSWORD,
            "required" => true,
            "placeholder" => "Must contain at least one capital letter",
        ],
        // [
        //     "field_name" => "Name",
        //     "field_type" => "text", # either text, password, number, etc.
        //     "required" => true,
        //     "custom_message" => false,
        //     "message" => null,
        // ],
        // [
        //     "field_name" => "Username",
        //     "field_type" => "text", # either text, password, number, etc.
        //     "required" => true,
        //     "custom_message" => false,
        //     "message" => null,
        // ],
        // [
        //     "field_name" => "Email",
        //     "field_type" => "email",
        //     "required" => true,
        //     "custom_message" => false,
        //     "message" => null,
        // ],
        // [
        //     "field_name" => "Password",
        //     "field_type" => "password",
        //     "required" => true,
        //     "custom_message" => false,
        //     "message" => null,
        // ],
    ];
?>

@extends('templates.page_layouts.auth')
