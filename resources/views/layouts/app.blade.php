<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link ref="stylesheet" href="{{ asset('css/snackbar.min.css') }}">
    <script src="/packages/snackbar/dist/snackbar.min.js"></script>
    <title>St. Augustine Family</title>
</head>
<body style="background-color: #ddd;" onclick="clickBody()">
    @include('shared.header')
    @yield('content')
    @include('shared.footer')


    <script src="https://unpkg.com/colcade@0/colcade.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        var colc = new Colcade( '.grid', {
            columns: '.grid-col',
            items: '.grid-item'
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script>
        function clickBody() {
            console.log('clicked');
            Snackbar.show({text: 'Example notification text.'});
        }
    </script>

</body>
</html>