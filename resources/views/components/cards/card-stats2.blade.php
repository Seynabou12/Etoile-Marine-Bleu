@php
    // variables
    $titre = isset($titre)?$titre:'Titre';
    $soustitre = isset($soustitre)?$soustitre:'Texte de soutitre';
    $nombre = $nombre1??'0';
    $nombre_info = $nombre_info??'Fcfa';
    $nombre_class = $nombre_class??'text-primary';
    $class = isset($class)?$class:'col-6 col-lg-4';
    $icon = isset($icon)?$icon:'fa fa-square';
@endphp

<style>
    .stats-card:hover{
        box-shadow: 0 0.125rem 0.25rem 0 rgb(58 59 69 / 20%);
        cursor: pointer;
    }
</style>

<div class="{{$class}}">
    @isset($url)
        <a href="{{ url($url) }}">
    @endisset

    <div class="card shadow-none stats-card block bg-white mb-0">
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
                    <span class="mb-4 mt-2 h1 {{$nombre_class}}">
                        {{ number_format($nombre,0,',',' ') }} <span class="h6 text-muted">{{$nombre_info}}</span>
                    </span>
                </div>
                <div class="col-auto">
                    <!-- Icon -->
                    <span class="h1 fe icone fe-dollar-sign text-muted mb-0"><i class="{{$icon}} {{$nombre_class}}"></i></span>
                </div>
            </div> <!-- / .row -->
        </div>
    </div>

    @isset($url)
        </a>
    @endisset
</div>
