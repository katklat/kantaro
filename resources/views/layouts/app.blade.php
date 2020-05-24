<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Kantaro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/segmented-control.css') }}">
    <link rel="stylesheet" href="{{ asset('css/includes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <script src="{{ asset('js/helper.js') }}" defer></script>
</head>

<body class="d-flex flex-column">
    @if (Request::is('*/search*'))
    @include('includes/header_api')

    @else
    @include('includes/header')
    @endif

    @yield('content')
    @include('includes/footer')
</body>


</html>