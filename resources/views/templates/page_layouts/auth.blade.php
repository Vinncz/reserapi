{{--
    Example of extending this layout

    @extends('pages.auth.login.extends_auth_layout', [
        "postback_address" => "/auth/login",
        "title" => "Authentication Portal",
        "alternate_message_enabled" => true,
        "alternate_message" => "Not registered?",
        "alternate_action_message" => "Create an account.",
        "alternate_action_link" => "/auth/register",
        "submit_button_text" => "Authenticate",
        "forgot_password_enabled" => true
    ])
--}}
<form method="post" action="{{ $postback_address }}"
        class="mt-8 flex flex-col gap-6
                sm:mt-[10vh] sm:px-9 sm:py-6 sm:pb-12 sm:rounded-xl sm:mx-auto sm:min-w-[450px] sm:max-w-[50%] sm:bg-slate-100
                dark:sm:bg-zinc-900">
    @csrf

    @if ($alternate_message_enabled)
        <div class="flex flex-col mb-4">
            @include('templates.globals.page_title', ['title' => $title])

            <div class="mt-[-1rem] select-none opacity-50 flex items-center gap-x-2 gap-y">
                {{ $alternate_message }} <a class="text-blue-600 hover:underline" href="{{ $alternate_action_link }}"> {{ $alternate_action_message }} </a>
            </div>
        </div>
    @else
        @include('templates.globals.page_title', ['title' => $title])

        <div class="border-b mt-[-1.5rem] mb-4"></div>
    @endif

    @yield('fields')

    <button type="submit"
            class="select-none mt-6 font-bold rounded-md py-3 bg-green-600 text-white
                hover:bg-green-700
                dark:bg-green-700
                dark:hover:bg-green-800"
            >
        {{ $submit_button_text }}
    </button>

    @if ($forgot_password_enabled == true)
        <a href="/auth/forgot-password" class="opacity-75 select-none flex justify-center hover:underline">
            Forgot Password
        </a>
    @endif
</form>
