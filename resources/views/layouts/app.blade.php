<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('styles-links')
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Packages -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <link rel="stylesheet" href="/css/snackbar.min.css">
    <script src="/packages/snackbar/dist/snackbar.min.js"></script>
    

    <title>St. Augustine Family</title>
</head>
<body>
    @include('shared.header')

    <div class="main-content">
        @if(session('msg'))
            <script>
                Snackbar.show({
                    text: '{{ session('msg') }}',
                    pos: 'bottom-center',
                    actionTextColor: '#EC902E'
                });
            </script>
        @endif

        {{-- @yield('content') --}}
        @yield('template')
    </div>
    @yield('content')
    @include('shared.footer')

    {{-- javascript and jquery files inclusion --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    {{-- <script src="/packages/propeller/propeller.min.js"></script> --}}
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/validatePhone.js') }}"></script>

    @yield('javascript')
</body>
</html>