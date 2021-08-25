<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <title>St. Augustine Family</title>
</head>
<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            {{-- <li>
                <a href="" class="p-3">
                    <img src="/img/logo.png" width="50" height="50" alt="">
                </a>
            </li> --}}
            <li>
                <a href="" class="p-3">Home</a>
            </li>
            <li>
                <a href="" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="" class="p-3">Gallery</a>
            </li>
        </ul>
    </nav>
    @yield('content')

    <script src="https://unpkg.com/colcade@0/colcade.js"></script>

    <script>
        var colc = new Colcade( '.grid', {
            columns: '.grid-col',
            items: '.grid-item'
        });
    </script>
</body>
</html>