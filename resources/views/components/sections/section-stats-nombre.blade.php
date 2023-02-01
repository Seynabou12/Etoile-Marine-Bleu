<div class="row mb-3">

    @isset($destinations)
        @include('components.cards.card-stats3',[
            'titre' => "Importation",
            'soustitre' => false,
            'class' => "col-12 col-lg-6",
            'nombre' => $destinations->sum('nombre'),
            'nombre_2' => $destinations->sum('somme'),
            'info' => "Opérations",
            'info_2' => "Montant (XOF)",
            // 'nombre_class' => 'text-primary',
            'icon' => 'fa fa-download',
            'color' => 'primary',
        ])
    @endisset

    @isset($provenances)

        @include('components.cards.card-stats3',[
            'titre' => "Exportation",
            'soustitre' => false,
            'class' => "col-12 col-lg-6",
            'nombre' => $provenances->sum('nombre'),
            'nombre_2' => $provenances->sum('somme'),
            'info' => "Opérations",
            'info_2' => "Montant (XOF)",
            // 'nombre_class' => 'text-primary',
            'icon' => 'fa fa-upload',
            'color' => 'success',
        ])
    @endisset
</div>
