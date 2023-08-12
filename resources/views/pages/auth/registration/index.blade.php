@extends('templates.page_layouts.generic')

@section('children')

    @include('pages.auth.registration.extends_auth_layout', [
        "postback_address" => "/auth/register",
        "title" => "Registration Portal",
        "alternate_message_enabled" => true,
        "alternate_message" => "Having an account?",
        "alternate_action_message" => "Login here.",
        "alternate_action_link" => "/auth/login",
        "submit_button_text" => "Register",
        "forgot_password_enabled" => false
    ])

@endsection
