{{-- <div class="form-group">
    <label for="fname">Prénom</label>
    <input type="text" name="fname" id="fname" class="form-control @error('user.fname') is-invalid @enderror" value="{{ old('user.fname') }}" required autocomplete="fname">
    @error('user.fname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="user.name">Nom de famille</label>
    <input type="text" name="name" id="user.name" class="form-control @error('user.name') is-invalid @enderror" value="{{ old('user.name') }}" required autocomplete="name">
    @error('user.name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="user.name">Numéro téléphone</label>
    <input type="text" name="mobile" id="user.mobile" class="form-control @error('user.mobile') is-invalid @enderror" value="{{ old('user.mobile') }}" required autocomplete="mobile">
    @error('user.mobile')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="email">Adresse email</label>
    <input id="email" type="email" class="form-control @error('user.email') is-invalid @enderror" name="email" value="{{ old('user.email') }}" required autocomplete="email">

    @error('user.email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password">Saisissez votre mot de passe <small class="small">(longueur 8 caractères minimum)</small></label>
    <div class="input-group border" style="border-radius: 8px">
        <input data-toggle="popover" title="Mot de passe" data-placement="top" data-trigger="focus" data-content="Au moins 8 caractères, au moins 1 majuscule, au moins 1 minuscule, et au moins 1 caractère spécial." id="password" type="password"  class="pwd form-control @error('user.password') is-invalid @enderror" name="password" value="" required autocomplete="new-password">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button" id="showPassword"><i class="fas fa-eye-slash"></i></button>
        </span>
    </div>
    @error('user.password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password-confirm">Confirmez votre mot de passe</label>
    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label>
    <input data-toggle="popover" title="Mot de passe" data-placement="top" data-trigger="focus" data-content="Doit correspondre au mot de passe saisi et être valide aussi." id="password-confirm"  type="password" class="pwd form-control" name="password_confirmation" required  autocomplete="new-password">
</div> --}}
