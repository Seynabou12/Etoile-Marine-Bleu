
    {{-- Contenu de la page --}}
    <div class="row">
        <div class="col-7 col-lg-9 pr-4 mt-3">
            <div class="row">
                @include('admin.etudes.formulaire',[
                    'route' => 'admin.universites.store',
                    'titre'=>"Add a new study",
                    'titre2'=>"Edit study",
                    'data'=>[
                        0=>[
                            'label'=>__('dashboard.sigle'),
                            'placeholder'=>"",
                            'col' =>'col-6',
                            'name'=>'sigle',
                            'input'=>'text',
                            'id'=>'_sigle',
                            'id2'=>'sigle',
                            'required'=>true,
                            'value'=> $universite->sigle??''
                        ],
                        1=>[
                            'label'=>__('dashboard.nom'),
                            'placeholder'=>"",
                            'col' =>'col-6',
                            'name'=>'name',
                            'input'=>'text',
                            'id'=>'_name',
                            'id2'=>'name',
                            'required'=>true,
                            'value'=> $universite->name??''
                        ],
                        2=>[
                            'label'=>__('dashboard.adresse'),
                            'placeholder'=>"",
                            'col' =>'col-6',
                            'name'=>'adresse',
                            'input'=>'text',
                            'id'=>'_adresse',
                            'id2'=>'adresse',
                            'required'=>false,
                            'value'=> $universite->adresse??''

                        ],
                        3=>[
                            'label'=>__('dashboard.code_postal '),
                            'placeholder'=>"",
                            'col' =>'col-6',
                            'name'=>'code_postal',
                            'input'=>'number',
                            'id'=>'_code_postal',
                            'id2'=>'code_postal',
                            'value'=> $universite->code_postal??''

                        ],
                        4=>[
                            'label'=>__('dashboard.telephone'),
                            'placeholder'=>"",
                            'col' =>'col-6',
                            'name'=>'telephone',
                            'input'=>'number',
                            'id'=>'_telephone',
                            'id2'=>'telephone',
                            'value'=> $universite->telephone??''

                        ],
                        5=>[
                            'label'=>__('dashboard.municipalite '),
                            'placeholder'=>"",
                            'col' =>'col-6',
                            'name'=>'municipalite',
                            'input'=>'text',
                            'id'=>'_municipalite',
                            'id2'=>'municipalite',
                            'required'=>false,
                            'value'=> $universite->municipalite??''

                        ],

                    ]
                ])
                <div class="form-group col-lg-6 col-12">
                    <label for="prefecture_id">{{ __('dashboard.prefecture') }}</label>

                    @include('partials.components.selectElement', [
                        'options' => $_prefectures??[],
                        'display' => "name",
                        "required" => true,
                        "name" => "prefecture_id",
                        "default" => old("prefecture_id") ?? $universite->prefecture_id,
                    ])
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="daj_id">{{ __('dashboard.daj') }}</label>

                    @include('partials.components.selectElement', [
                        'options' => $_dajs,
                        'display' => "name",
                        "required" => true,
                        "name" => "daj_id",
                        "default" => old("daj_id") ?? $universite->daj_id,
                    ])
                </div>
            </div>
        </div>
        
        <div class="col-5 col-lg-3 mt-4">
            <div class="row justify-content-end">
                <div class="p-4 bg-light universite_cadre" style="border-radius: 8px">
                    <div class="row justify-content-md-center">
                        <div class="col-12 profil">
                            <div class="profil_image profil_image_edit mx-auto">
                                <img src="{{ asset('img/vector.png') }}" width="100%" alt="Profil"  id="img-logo" class="rounded mx-auto d-block photo" id="photo" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="col-12 mt-4 text-primary">{{ __('dashboard.config_acces') }}</h4>
        <div class="jumbotron p-3 col-12">
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label for="email">{{ __('dashboard.email') }}  (*)</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="user[email]" value="{{ $universite->user->email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('user.email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="password">{{ __('dashboard.le_mot_de_passe_doit_contenir_au_minimum_8_caracteres') }}</label>
                            <div class="input-group">
                                <input data-toggle="popover" name="user[password]" title="Mot de passe" data-placement="top" data-trigger="focus" data-content="Au moins 8 caractères, au moins 1 majuscule, au moins 1 minuscule, et au moins 1 caractère spécial." id="password" type="password"
                                {{ isset($universite->user->exists) && $universite->user->exists === true ? "disabled" : "" }} value="{{ $universite->user->password ?? old('password') }}"
                                 class="pwd form-control @error('user.password') is-invalid @enderror" value="" required autocomplete="new-password">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="showPassword" style="height:100%"><i class="fas fa-eye-slash"></i></button>
                                </span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="password-confirm"> {{ __('dashboard.confirmation_password') }} (*)</label>
                            <input data-toggle="popover" title="Mot de passe" data-placement="top" {{ isset($universite->user->exists) && $universite->user->exists === true ? "disabled" : "" }} value="{{ $universite->user->password ?? old('password') }}"
                              data-trigger="focus" data-content="Doit correspondre au mot de passe saisi et être valide aussi." id="password-confirm" {{ $universite->user === true ? "disabled" : "" }}  type="password" class="pwd form-control" name="user[password_confirmation]" required  autocomplete="new-password">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @isset($universite->user->exists)
        <div class="row">
            <div class="col-12 text-primary">
                <input type="checkbox" name="" id="" class="form-checkbox m-2 enable">
                {{ __('dashboard.activer_champs') }}
            </div>
        </div>
    @endisset
    <div class="text-right">
        <hr>
        <button type="submit" class="btn btn-primary btn-style">
            {{ __('dashboard.enregistrer') }}
        </button>
    </div>
