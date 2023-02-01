<div class="form-group">
    <label for="hote">Hôte de compte FTP</label>
    <input type="text" name="hote" id="hote" class="form-control @error('hote') is-invalid @enderror" required
        value="{{ old('hote') ?? $compte->hote }}">
    @error('hote')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="identifiant">Identifiant</label>
    <input type="text" name="identifiant" class="form-control @error('identifiant') is-invalid @enderror" required
        value="{{ old('identifiant') ?? $compte->identifiant }}">
    @error('identifiant')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="port">Port</label>
    <input type="text" name="port" class="form-control @error('port') is-invalid @enderror" required
        value="{{ old('port') ?? $compte->port }}">
    @error('port')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="mot_passe">Mot de passe</label>
    <input type="password" name="mot_passe" class="form-control @error('mot_passe') is-invalid @enderror" required
        value="{{ old('mot_passe') ?? $compte->mot_passe }}">
    @error('mot_passe')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group text-right">
    <input type="hidden" name="entreprise_id" value="{{ $entreprise->id }}">
    <button type="submit" class="btn rounded btn-primary btn-lg">
        {{ $compte->exists ? "Mettre à jour" :  "Enregistrer" }}
    </button>
</div>
