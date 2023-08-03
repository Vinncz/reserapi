{{-- this file is the representation of "layout.tsx" inside Laravel --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('public/css/global.css')
    <title> Reserapi </title>
</head>

{{-- PENTING: --}}
{{-- Pas ganti x-axis padding pada page, edit page ini dan juga page navbar + footer --}}
<body class="flex h-screen text-zinc-800 dark:text-zinc-300 border-zinc-300 dark:border-zinc-700 dark:bg-zinc-950 flex-col items-center w-full">

    @include('templates.globals.navbar')

    <wrapper class="flex flex-col h-full max-w-5xl w-full pt-16 px-5 pb-56">
        @yield('children')
    </wrapper>

    @include('templates.globals.footer')

</body>
</html>
