
<div class="form-group col-md-6 col-12">
    <label for="prenom">{{ __('dashboard.prenom') }}</label>
    <input type="text" name="user_info[prenom]" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ $user->user_info->prenom ?? old('prenom') }}" required autocomplete="prenom">
    @error('prenom')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-md-6 col-12">
    <label for="name">{{ __('dashboard.nom_famille') }}</label>
    <input type="text" name="user_info[nom]" id="name" class="form-control @error('nom') is-invalid @enderror" value="{{ $user->user_info->nom ?? old('nom') }}" required autocomplete="nom">
    @error('nom')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-md-6 col-12">
    <label for="name">{{ __('dashboard.adresse') }}</label>
    <input type="text" name="user_info[adresse]" id="adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ $user->user_info->adresse ?? old('adresse') }}" autocomplete="adresse">
    @error('adresse')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-md-6 col-12">
    <label for="name">{{ __('dashboard.telephone') }}</label>
    <input type="text" name="user_info[telephone]" id="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ $user->user_info->telephone ?? old('telephone') }}" autocomplete="telephone">
    @error('telephone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


{{-- <div class="form-group col-md-6 col-12">
    <label for="profil_id">Profil</label>

    @include('partials.components.selectElement', [
        'options' => $_profils,
        'display' => "name",
        "required" => true,
        "name" => "profil_id",
        "default" => old("profil_id") ?? $user->profil_id,
    ])
</div> --}}

<div class="jumbotron p-3 col-12">
    <div class="row">
        <h4 class="col-12 text-muted">{{ __('dashboard.config_acces') }}</h4>
        <div class="form-group col-md-6 col-12">
            <label for="email">{{ __('dashboard.email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label for="password">{{ __('dashboard.le_mot_de_passe_doit_contenir_au_minimum_8_caracteres') }}</label>
                    <div class="input-group">
                    <input data-toggle="popover" title="Mot de passe" data-placement="top" data-trigger="focus"  data-content="Au moins 8 caractères, au moins 1 majuscule, au moins 1 minuscule, et au moins 1 caractère spécial." id="password" type="password" {{ $user->exists === true ? "disabled" : "" }}  class="pwd form-control @error('password') is-invalid @enderror" name="password" value="{{ $user?$user->password:'' }}" required autocomplete="new-password">
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
                    <label for="password-confirm">{{ __('dashboard.confirmation_password') }}</label>
                    <input data-toggle="popover" title="Mot de passe" data-placement="top" data-trigger="focus"
                        data-content="Doit correspondre au mot de passe saisi et être valide aussi." id="password-confirm" {{ $user->exists === true ? "disabled" : "" }}
                        type="password" class="pwd form-control" name="password_confirmation" value="{{ $user?$user->password:'' }}"
                        required  autocomplete="new-password">

                </div>
            </div>
        </div>
    </div>
</div>

@if ($_user->is_super_admin)
    <div class="form-group col-md-6 col-12">
        <label for="is_admin" class="d-block border p-2">
            <input id="is_admin" name="is_admin" type="checkbox" {{ $user->exists && $user->is_super_admin ? "checked" : "" }} class="enable">
            {{ __('dashboard.set_as_admin') }}
        </label>
    </div>
@endif
@section('partialScript')
    <script>
        $(function() {
            updateForm();
            $('body').on('change', '#is_admin', function() {
                updateForm();
            });

            function updateForm() {
                if($('#is_admin').is(':checked')) {
                    $('#entreprise_id').prop('disabled', true);
                    $('#profil_id').prop('disabled', true);
                }
                else {
                    $('#entreprise_id').prop('disabled', false);
                    $('#profil_id').prop('disabled', false);
                }
            }
        });
    </script>
@endsection
