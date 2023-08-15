@include('templates.component_layouts.forms.field_types')

<?php
    $fields = [
        // [
        //     "field_name" => "Email",
        //     "field_type" => "email", # either text, password, number, etc.
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
        [
            "display_name" => "Email",
            "field_type" => FieldTypes::EMAIL, # either text, password, number, etc.
            "required" => true,
            "placeholder" => "abby.jane@gmail.com",
        ],
        [
            "display_name" => "Password",
            "field_type" => FieldTypes::PASSWORD,
            "required" => true,
            "placeholder" => "Must contain at least one capital letter",
        ],
    ];
?>

@extends('templates.page_layouts.auth')
