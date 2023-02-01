<div class="col-4 col-lg-3 text-center team">
    <div class="row">
        <div class="col-12">
            <div class="team_img">
                <img src="{{ asset($image??'') }}" alt="" srcset="">
            </div>
        </div>
        <div class="col-12 team_contenu">
            <h4 class="text-white">{{ $name??'Inconnye' }}</h4>
            <p class="text-primary">{{ $poste??'Inconnu' }}</p>
        </div>
        <div class="col-12">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
