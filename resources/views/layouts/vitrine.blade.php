<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} @hasSection ('name') -  @yield('title') @endif </title>

        <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />

         <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!--Script -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ mix('js/popper.js') }}"></script>

    </head>
    <body class="layout-top-nav">

        <div class="wrapper" id="wrapper">

            <div class="preloader"></div>

            {{-- Navbar --}}
            @include('components.navs.vitrine')

            {{-- <aside class="main-sidebar">
            </aside> --}}

            <div class="content-wrapper">
                <div class="content-header"></div>
                <div class="content"></div>
            </div>

            <footer class="main-footer">
                test
            </footer>

        </div>
    </body>
</html>
