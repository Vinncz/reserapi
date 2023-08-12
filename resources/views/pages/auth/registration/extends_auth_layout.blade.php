<?php
    $fields = [
        [
            "field_name" => "Name",
            "field_type" => "text", # either text, password, number, etc.
            "required" => true,
            "custom_message" => false,
            "message" => null,
        ],
        [
            "field_name" => "Username",
            "field_type" => "text", # either text, password, number, etc.
            "required" => true,
            "custom_message" => false,
            "message" => null,
        ],
        [
            "field_name" => "Email",
            "field_type" => "email",
            "required" => true,
            "custom_message" => false,
            "message" => null,
        ],
        [
            "field_name" => "Password",
            "field_type" => "password",
            "required" => true,
            "custom_message" => false,
            "message" => null,
        ],
    ];
?>

@extends('templates.page_layouts.auth')
