@props([
    "postback_address",
    "method" => "post",
])

<form
    {{
        $attributes->merge([
            "class" => "flex flex-col gap-6 carbon",
        ])
    }}
    action="{{ $postback_address }}"
    method="{{ $method }}"
>
    @csrf
    {{ $slot }}
</form>
