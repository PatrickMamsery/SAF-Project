<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    {{-- <link rel="stylesheet" href="/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/about.css">
    {{-- <link rel="stylesheet" href="/css/register.css">
    <link rel="stylesheet" href="/css/footer.css"> --}} 
    <link rel="stylesheet" href="/css/snackbar.min.css">
    <link rel="stylesheet" href="/css/propeller.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="/packages/snackbar/dist/snackbar.min.js"></script>

    <title>St. Augustine Family</title>
</head>
<body style="background-color: #ddd;">
    @include('shared.header')

    <div class="main-content">
        @if(session('msg'))
            <script>
                Snackbar.show({
                    text: '{{ session('msg') }}',
                    pos: 'bottom-center',
                    actionTextColor: 'green'
                });
            </script>
        @endif

        @yield('content')
    </div>
    {{-- @yield('content') --}}
    @include('shared.footer')


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></scri>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/colcade@0/colcade.js"></script>
    <script src="js/app.js"></script>

    <script>
        var colc = new Colcade( '.grid', {
            columns: '.grid-col',
            items: '.grid-item'
        });
    </script>

    <script src="/packages/propeller/propeller.min.js"></script>
    <script src="js/photo_resize.js"></script>


</body>
</html>