@extends('templates.page_layouts.generic')

@section('children')

    @include('pages.auth.login.extends_auth_layout', [
        "postback_address" => "/auth/login",
        "title" => "Authentication Portal",
        "alternate_message_enabled" => true,
        "alternate_message" => "Not registered?",
        "alternate_action_message" => "Create an account.",
        "alternate_action_link" => "/auth/register",
        "submit_button_text" => "Authenticate",
        "forgot_password_enabled" => true
    ])

@endsection
