<?php
    $fields = [
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

@section('fields')
    @foreach ($fields as $field)
        <div class="flex flex-col gap-3">
            <span class=" select-none"> {{ $field['field_name'] }} </span>
            <input <?php print $field['required'] == true ? "required" : null ?> type="{{ $field['field_type'] }}" name="{{ strtolower($field['field_name']) }}" id="{{ strtolower($field['field_name']) }}"
                    class="px-5 py-4 rounded-md border sm:bg-white bg-slate-100 dark:bg-zinc-900 dark:sm:bg-zinc-800"
                    placeholder="<?php print $field['custom_message'] == true ? $field['message'] : 'Your '.strtolower($field['field_name']).' here' ?>">
        </div>
    @endforeach
@endsection
