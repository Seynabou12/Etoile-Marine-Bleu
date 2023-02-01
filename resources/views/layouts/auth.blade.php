<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome-free/css/all.min.css') }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/animate.min.css') }}" rel="stylesheet">
        <!-- Theme style -->
        <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">

    </head>
    <body>
        {{-- <div class="min-vh-100 p-5 d-flex justify-content-center align-items-center">
            <div class="bg-floue bg-img__cover overlay_img" style="background-image: url({{ asset('img/bg-cnx.jpg') }})"></div>
        </div> --}}
            <div class="container-fluid min-vh-100 p-5 d-flex justify-content-center align-items-center">
                @yield('content')
            </div>

            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{ asset('js/config-vendor.js') }}"></script>
            <script src="{{ asset('js/partials/showHidePassword.js') }}"></script>
            @yield('scriptBottom')
    </body>
</html>
