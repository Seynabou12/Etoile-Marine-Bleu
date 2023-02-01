@php
    // variables
    $titre = isset($titre)?$titre:'Titre';
    $soustitre = isset($soustitre)?$soustitre:'Texte de soutitre';
    $nombre = $nombre??'0';
    $info = $info??'Fcfa';
    $info_2 = $info_2??'Fcfa';
    $nombre_class = $nombre_class??'text-primary';
    $class = isset($class)?$class:'col-6 col-lg-4';
    $icon = isset($icon)?$icon:'fa fa-square';
    $color = isset($color)?$color:'primary';
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

    <div class="card shadow-none stats-card block bg-white mb-2">
        <div class="card-body">
            <div class="row align-items-center gx-0">
                <div class="col-12">
                    <h5 class="text-capitalisze text-dark-important font-weight-bold  mb-2">
                        <i class="{{ $icon }} bg-{{ $color }} p-2 rounded"></i> {{ $titre }}
                    </h5>
                    @isset($soustitre)
                        <p>{{ $soustitre }}</p>
                    @endisset
                </div>
                <div class="col-6">
                    <p class="text-capitalize mb-0 font-weight-bold text-muted">{{ isset($info) ? $info : '' }}</p>
                    <span class="h4 text-{{ $color }} font-weight-bold">
                        {{ number_format($nombre,0,',',' ') }}
                    </span>
                </div>
                <div class="col-6 text-right">
                    <p class="text-capitalize mb-0 font-weight-bold text-muted">{{ isset($info_2) ? $info_2 : '' }}</p>
                    <span class="h4 text-{{ $color }} font-weight-bold">
                        {{ number_format($nombre_2,0,',',' ') }}
                    </span>
                </div>
            </div> <!-- / .row -->
        </div>
    </div>

    @isset($url)
        </a>
    @endisset
</div>
