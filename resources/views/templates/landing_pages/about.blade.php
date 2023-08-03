<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/global.css">
    @vite('public/css/global.css')
    <title>Document</title>
</head>
<body>
    {{-- this is to place a component in a template --}}
    @include('templates.globals.navbar')

    {{-- this is a fasthand to write down arguments passed in the params --}}
    {{ $message }} from the about page.

    <div class="bg p-5 border code text-white">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa adipisci obcaecati qui repellendus necessitatibus illum corporis magni ratione cupiditate doloremque sint recusandae quae voluptas modi iste perferendis, atque, sequi aut!
    </div>

    <img src="{{ $images[0]["string"] }}" alt="">

    {{-- this is to open "holes" for whoever may fill (inherits) this file --}}
    <div class="border p-5 rounded">
        @yield('templating')
    </div>

</body>
</html>
