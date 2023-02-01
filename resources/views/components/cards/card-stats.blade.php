@php
    // variables
    $titre = isset($titre)?$titre:'Titre';
    $soustitre = isset($soustitre)?$soustitre:'Texte de soutitre';
    $nombre1 = $nombre1??'0';
    $nombre2 = $nombre2??'0';
    $class = isset($class)?$class:'col-6 col-lg-4';
    $icon = isset($icon)?$icon:'fa fa-square';
@endphp

<style>
    .stats-card:hover{
        box-shadow: 0 0.025rem 0.125rem 0 rgb(58 59 69 / 20%);
        cursor: pointer;
    }
</style>

<div class="{{$class}} mb-3">
    @isset($url)
        <a href="{{ url($url) }}">
    @endisset

    <div class="card shadow-none stats-card block bg-white">
        <div class="card-body">
            <div class="row align-items-center gx-0">
                <div class="col">
                    <!-- Title -->
                    <h5 class="text-uppercase text-secondary font-weight-bold  mb-2">
                        {{ $titre }}
                    </h5>
                    <h6 class="mb-2 text-muted">
                        {{ $soustitre }}
                    </h6>
                    <!-- Heading -->
                    <span class="mb-4 mt-2 h1 text-primary">
                        {{ number_format($nombre1,0,',',' ') }} <span class="h6">opérations</span>
                    </span> <br>
                    <span class="mb-4 mt-2 h4 text-secondary">
                        {{ number_format($nombre2,0,',',' ') }} <span class="h6">Fcfa</span>
                    </span>
                </div>
                <div class="col-auto">
                    <!-- Icon -->
                    <span class="h1 fe icone fe-dollar-sign text-muted mb-0"><i class="{{$icon}} text-primary"></i></span>
                </div>
            </div> <!-- / .row -->
        </div>
    </div>

    @isset($url)
        </a>
    @endisset
</div>
