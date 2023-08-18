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
{{-- <span class="absolute" style="font-size: 72px"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero nemo, sit itaque adipisci iste maxime facilis quo quasi tenetur perferendis recusandae vel repellendus corporis voluptatem atque, aspernatur dolore, esse reiciendis. Quod, consequatur soluta eveniet, tempora aliquam quas nihil incidunt porro cumque recusandae dolorum dolorem ut dolores veniam quam ducimus odio quos nesciunt temporibus culpa commodi voluptas eligendi atque. Voluptate, doloribus reiciendis doloremque temporibus eveniet magnam dolores, delectus tenetur ipsam soluta quo eum? </span> --}}
<form method="post" action="{{ $postback_address }}"
        class="mt-8 flex flex-col gap-6 overflow-hidden
                sm:mt-[10vh] sm:px-9 sm:py-6 sm:pb-12 sm:rounded-xl sm:mx-auto sm:min-w-[450px] sm:max-w-[50%] sm:border sm:bg-white
                dark:sm:bg-zinc-900 dark:sm:bg-opacity-60 dark:sm:backdrop-blur-xl">
    @csrf

    {{-- the gradient background at login/register screen --}}
    <div class="opacity-80 absolute w-full h-full">
        <span class="max-sm:hidden w-[125px] aspect-square absolute bg-cyan-300 bg-opacity-20 rounded-full top-[-5%] left-[-5%] blur-3xl"></span>
        <span class="max-sm:hidden w-[300px] aspect-square absolute bg-violet-500 bg-opacity-10 rounded-full top-[12%] left-[65%] blur-3xl"></span>
        <span class="max-sm:hidden w-[200px] aspect-square absolute bg-indigo-300 bg-opacity-10 rounded-full bottom-0 left-15 blur-3xl"></span>
    </div>

    <div class="flex flex-col mb-4 mt-6">
        <i class="text-5xl bi bi-person-bounding-box opacity-90"></i>

        @include('templates.globals.page_title', ['title' => $title])

        @if (!session()->has('successfully-registered-event') && $alternate_message_enabled)
            <div class="mt-[-1rem] select-none opacity-50 flex items-center gap-x-2 gap-y">
                {{ $alternate_message }} <a class="text-blue-600 hover:underline" href="{{ $alternate_action_link }}"> {{ $alternate_action_message }} </a>
            </div>
        @else
            <div class="border-b mb-4"></div>
        @endif

    </div>

    @if(session()->has('successfully-registered-event'))
        @include('templates.component_layouts.alerts.success', [
            "title" => "Successfully registered!",
            "message" => session('successfully-registered-event'),
        ])
    @endif

    @if(session()->has('credentials-mismatch-event'))
        @include('templates.component_layouts.alerts.error', [
            "title" => "Credentials mismatch!",
            "message" => session('credentials-mismatch-event'),
        ])
    @endif

    {{-- passed fields parameter --}}
    @foreach ($fields as $field)
        <div class="flex flex-col gap-3">
            {{-- <span class=" select-none">
                {{ $field['field_name'] }}
            </span>

            <input
                                                                                                   <?php print $field['required'] == true ? "required" : null ?>
                type="{{ $field['field_type'] }}"
                name="{{ strtolower($field['field_name']) }}"
                id="{{ strtolower($field['field_name']) }}"
                class="px-5 py-4 rounded-md border
                        bg-transparent
                            sm:bg-transparent
                        dark:bg-zinc-900
                            dark:sm:bg-zinc-800
                        @error(strtolower($field['field_name']))
                            border-red-600  placeholder:text-red-600 bg-rose-50 sm:bg-rose-50 dark:bg-rose-950 dark:sm:bg-rose-950
                        @enderror"
                value="{{ old(strtolower($field['field_name'])) }}"
                placeholder="<?php print $field['custom_message'] == true ? $field['message'] : 'Your '.strtolower($field['field_name']).' here' ?>">

            @error(strtolower($field['field_name']))
                <span class="flex mt-[-4px] text-red-700 font-bold">
                    {{ $message }}
                </span>
            @enderror --}}

            @include('templates.component_layouts.forms.input_fields.base', [
                "display_name" => $field['display_name'],
                "field_type"   => $field['field_type'],
                "init_value"   => isset($field['init_value']) ? $field['init_value'] : null,
                "placeholder"   => isset($field['placeholder']) ? $field['placeholder'] : null,
                "required"   => isset($field['required']) ? $field['required'] : null,
                "step"   => isset($field['step']) ? $field['step'] : null,
            ])

            {{-- <x-forms.input-fields.text :name="$field['display_name']" :placeholder="$field['display_name']" :required="true" /> --}}

            @error(strtolower($field['display_name']))
                <span class="flex mt-[-4px] text-red-700">
                    {{ $message }}
                </span>
            @enderror
        </div>
    @endforeach

    {{-- submit --}}
    @include('templates.component_layouts.buttons.green', [
        "message" => $submit_button_text
    ])

    @if (isset($forgot_password_enabled) && $forgot_password_enabled)
        <a href="/auth/forgot-password" class="opacity-75 select-none flex justify-center hover:underline">
            Forgot Password
        </a>
    @endif

    {{-- QoL -> autofocus on the first field in sight --}}
    {{-- <script>
        const first_input_field = document.getElementById("<?= strtolower($fields[0]['field_name']) ?>")
        first_input_field.focus()
    </script> --}}
</form>
