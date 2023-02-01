<div class="form-group">
    <label for="fname">Prénom</label>
    <input type="text" name="fname" id="fname" class="form-control @error('fname') is-invalid @enderror" value="{{ $user->fname ?? old('fname') }}" required autocomplete="fname">
    @error('fname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="name">Nom de famille</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name ?? old('name') }}" required autocomplete="name">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="name">Numéro téléphone</label>
    <input type="text" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ $user->mobile ?? old('mobile') }}" required autocomplete="mobile">
    @error('mobile')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="email">Adresse email</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

@if ($_user->is_super_admin)
    <div class="form-group">
        <label for="is_admin" class="d-block border p-2">
            <input id="is_admin" name="is_admin" type="checkbox" {{ $user->exists && $user->is_super_admin ? "checked" : "" }} class="">
            Définir comme administrateur
        </label>
    </div>

    <div class="form-group">
        <label for="entreprise_id">Entreprise</label>

        @include('partials.components.selectElement', [
            'options' => $_entreprises,
            'display' => "name",
            "required" => true,
            "name" => "entreprise_id",
            "default" => old("entreprise_id") ?? $user->entreprise_id,
        ])
    </div>
@else
    <input type="hidden" name="entreprise_id" value="{{ $user->entreprise_id ?? null }}">
@endif

<div class="form-group">
    <label for="profil_id">Profil utilisateur dans l'entreprise</label>

    @include('partials.components.selectElement', [
        'options' => $_profils,
        'display' => "name",
        "required" => true,
        "name" => "profil_id",
        "default" => old("profil_id") ?? $user->profil_id,
    ])
</div>

<div class="form-group">
    <label for="password">Saisissez votre mot de passe</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password-confirm"">Confirmez votre mot de passe</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
</div>

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
