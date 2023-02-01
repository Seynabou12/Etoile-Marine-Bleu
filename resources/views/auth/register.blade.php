<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>MyREVO</title>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png') }}" sizes="16x16" />

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome-free/css/all.min.css') }}">
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
            .pwd{
                height: 55px;
                border-radius: 10px !important;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="col-12">
            <div class="row">
                <div class="col-7 col-lg-5 min-vh-100 container-form-register pl-4 pr-4">
                    <form class="" method="POST"  action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 form-register-title">
                            <h2> {{ __('dashboard.inscription') }} </h2>
                        </div>
                        <div class="mb-4 mt-2 form-register-identifiant">
                            <label for="name">{{ __('dashboard.identifiant') }}</label>
                            <input type="email" name="email" required class="w-100 @error('password') is-invalid @enderror">
                            @error('email')
                            <span class="text-danger text-sm" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        </div>
                        <div class="col-12 p-0">
                            <label for="password">{{ __('dashboard.mot_de_passe') }}</small></label>
                            <div class="input-group">
                                <input data-toggle="popover" title="Mot de passe" data-placement="top" data-trigger="focus"
                                data-content="Au moins 8 caractères, au moins 1 majuscule, au moins 1 minuscule, et au moins 1 caractère spécial."
                                id="password" type="password" class="pwd form-control @error('password') is-invalid @enderror"
                                name="password" value="" required autocomplete="new-password">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="showPassword" style="height:100%;border-radius: 0 10px 10px 0 !important;">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </span>
                            </div>
                            @error('password')
                                <span class="text-danger text-sm" role="alert">
                                   {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group p-0 col-12 mt-4">
                            <label for="password-confirm">{{ __('dashboard.confirmez_votre_mot_de_passe') }}</label>
                            <input data-toggle="popover" title="Mot de passe" data-placement="top" data-trigger="focus" data-content="Doit correspondre au mot de passe saisi et être valide aussi." id="password-confirm" type="password" class="pwd form-control" name="password_confirmation" required  autocomplete="new-password">
                            @error('password')
                                <span class="text-danger text-sm" role="alert">
                                   {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 form-register-years">
                            <label for="years"> {{ __('dashboard.annee_prevue_obtention_du_diplome') }}</label>
                            <div class="input">
                                <input type="radio" name="radio" required value="0" id="en_cours">
                                <label id="radio-text" value="1" for="en_cours">{{ __('dashboard.annee_en_cours') }}</label>
                            </div>
                            <div class="input">
                                <input type="radio" name="radio" required id="annee_prochain">
                                <label id="radio-text" for="annee_prochain">{{ __('dashboard.annee_prochaine') }}</label>
                            </div>
                            <p class="d-none">Vueillez consulter les
                                <a href="#">Conditions d'utilisation.</a>la
                                <a href="#">Politique de confidentialité</a>.et les
                                <a href="#">Conditions expresses relatives à l'acquisission de donnée de caractère personnel.</a>
                                (collective dénomées "condition approuvé")
                            </p>
                            <div class="input last-radio d-none">
                                <input type="radio" name="cgu"  value="1"   id="#1" required>
                                <span id="radio-text">Je suis d'accord avec les approbations ci-dessus</span>
                            </div>
                        </div>
                        <div class="mb-2 form-register-submit mt-4">
                            <button type="submit"  id="_
                            reset-btn">{{ __('dashboard.soumettre_inscription') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-5 col-lg-3 container-desc-register">
                    <div class="row desc-register-action">
                        <h3>{{ __('home.deja_un_compte') }} ?</h3>
                        <a href="{{ route('myPathway.connexion') }}">{{__('dashboard.se_connecter')}}</a>
                    </div>
                    <div class="row desc-register-require">
                        <p class="text-primary">{{ __('dashboard.obligatoire') }}(*)</p>
                    </div>
                    <div class="row desc-register-maxlength">
                        <p>{{ __('dashboard.le_mot_de_passe_doit_contenir_au_minimum_8_caracteres') }}</p>
                    </div>
                    <div class=" desc-register-maxlength-detailsd">
                        <p id="maj"><span class="iconify " data-icon="akar-icons:check" data-width="26" data-height="26"></span> Uppercase</p>
                        <p id="min"><span class="iconify " data-icon="akar-icons:check" data-width="26" data-height="26"></span> Lowercase</p>
                        <p id="number"><span class="iconify " data-icon="akar-icons:check" data-width="26" data-height="26"></span> Number</p>
                        <p id="char"><span class="iconify " data-icon="akar-icons:check" data-width="26" data-height="26"></span> 8 characters min <span class="text-sm">(with special char)</span> </p>
                    </div>
                    <div class="row back-home">
                        <a href="{{ url('/') }}">{{ __('home.menu1') }}</a>
                    </div>
                </div>
                <div class="col-12 col-lg-4 d-lg-flex d-none container-img-register bg-primary">
                    <div class="imgR row">
                            <div class="col">
                            <img class="img" src="{{ asset('img/logo-3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/vendor/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/partials/showHidePassword.js') }}"></script>
        <script src="{{ asset('js/partials/validationPassword.js') }}"></script>
    </body>
</html>


