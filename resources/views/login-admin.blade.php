


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
        <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">

        <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        {{-- <link href="{{ asset('css/frontend.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">

        {{-- FANCYBOX --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" integrity="sha256-ygkqlh3CYSUri3LhQxzdcm0n1EQvH2Y+U5S2idbLtxs=" crossorigin="anonymous" />

        <!-- Styles -->
        <link href="{{ asset('css/vendor/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/jquery.auto-complete.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor/animate.min.css') }}" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" integrity="sha256-ygkqlh3CYSUri3LhQxzdcm0n1EQvH2Y+U5S2idbLtxs=" crossorigin="anonymous" />

        {{-- Reglage CSS ADMIN LTE --}}
        <style>
            .dropdown-toggle::after {color: white}
            .select2-container { width: 100% !important; }
            .text-sm .brand-link .brand-image { margin-left: -0.2rem; }

            /* Modification du scrollbar*/
            ::-webkit-scrollbar {
                width: 3px;
            }
            ::-webkit-scrollbar-track {
                background: #fff;
                box-shadow: inset 0 0 1px #ccc;
                border-radius: 2px;
            }
            ::-webkit-scrollbar-thumb {
                background: #d62e06;
                border-radius: 2px;
                /*box-shadow: inset 0 0 1px #ccc;*/
            }
        </style>

        @yield('customCss')

    </head>
    <body class="hold-transition sidebar-mini-md text-sm layout-navbar-fixed" style="overflow: hidden !important">
        <div class="wrapper" id="wrapper">

            <div class="col-12 min-vh-100">
                <div class="row">
                    <div class="col-lg-6 connexion col-12 min-vh-100 p-4 d-flex justify-content-center" style="flex-direction: column;">
                        <div class="connexion_img">
                            <img class="my-revo" src="{{ asset('img/logo-2.png') }}" width="70%"  alt= "logo">
                        </div>
                        @if (session::has('message'))
                        <p class="alert {{Session::get('class-alert')}}">{{Session::get('message')}}</p>
                        @endif
                        <div class="connexion_contenu">
                            <form method="POST" action="{{ route('login') }}" class="form">
                                @csrf
                                <h2 class="mt-4">{{ __('dashboard.connexion') }}</h2>
                                <div class="mt-3 group connexion_contenu_form">
                                    <label for="email" class="label">{{ __('dashboard.identifiant') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3 group connexion_contenu_form">
                                    <label for="password">{{ __('dashboard.mot_de_passe') }} *</label>
                                    <div class="input-group connexion_contenu_form">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="showPassword" style="    border-radius: 0px 10px 10px 0 !important;"><i class="fas fa-eye-slash"></i></button>
                                        </span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3 group-submit d-flex justify-content-between align-items-center">
                                    <div class="submit">
                                        <button class="btn btn-primary radius-10 pl-4 pr-4" style="padding: 10px" type="submit" >{{ __('dashboard.connexion') }}</button>
                                    </div>

                                    <div class="redirect-register">
                                        {{-- @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">
                                                {{ __('Forget your password ?') }}
                                            </a><br>
                                        @endif --}}
                                        {{-- <a href="{{ route('myPathway.inscription') }}"><span class ="text-dark"> {{ __('dashboard.pas_de_compte_sinscrire') }}</span></a> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 d-sm-block d-none" style="background: url({{ asset('img/bgLoginAdmin.png') }});background-size:cover;background-size: 100% 100%;background-repeat: no-repeat;"></div>
                </div>
            </div>
        </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            {{-- <footer class="main-footer shadow-sm border-0 text-right d-none">
                Conditions générales d'utilisation &copy; {{ env('APP_NAME') }}
            </footer> --}}
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/vendor/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/vendor/select2.min.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{ asset('js/config-vendor.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
        {{-- <script src="{{ asset('js/vendor/chart.js/Chart.min.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>


        {{-- SWEET ALERT --}}
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        {{-- <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
        <script>
            // $('.js-example-basic-multiple').select2();
            if ($("#description").html() !== undefined) {

                CKEDITOR.replace('description', {
                    // uiColor: '#4A96D2'
                });

            }
        </script> --}}
        <script src="{{ asset('js/vendor/toastr.min.js') }}"></script>
        <script>
            @if(session('success'))
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Operation completed successfully',
                    subtitle: '',
                    autohide: true,
                    delay: 6000,
                    icon: 'fas fa-check-circle fa-lg',
                    body: "{!! session('success') !!}"
                });
            @endif
            @if(session('error'))
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Operation failed',
                    subtitle: '',
                    autohide: true,
                    delay: 6000,
                    icon: 'fas fa-times-circle fa-lg',
                    body: "{!! session('error') !!}"
                });
            @endif
        </script>
        <script src="{{ asset('js/partials/showHidePassword.js') }}"></script>
        <script src="{{ asset('js/partials/validationPassword.js') }}"></script>
        <script>
            //Ajax form message
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if ($(".select").html() !== undefined) {
                $('.select').select2();
            }
        </script>
        @yield('partialScript')
        @stack('components-scripts')
        @yield('scriptBottom')
        @yield('scriptFiche')
    </body>
</html>
