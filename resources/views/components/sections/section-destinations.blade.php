<div class="row">
    @php
        $labels = $destinations->pluck('destination')->toArray();
        $data1[0]['label'] = 'Répartatition';
        $data1[0]['values'] = $destinations->pluck('somme')->toArray();
        $data2[0]['label'] = 'Répartatition';
        $data2[0]['values'] = $destinations->pluck('nombre')->toArray();
    @endphp
    @include('components.chartjs.doughnut',[
        'id' => 'd3',
        'titre' => "Répartition des destinations par montant",
        'soustitre' => false,
        'class' => "col-12 col-lg-4",
        'labels' => $labels,
        'data' => $data1,
    ])

    @include('components.chartjs.doughnut',[
        'id' => 'd4',
        'titre' => "Répartion des destinations par nombre d'exportation",
        'soustitre' => "soustitre a définir",
        'class' => "col-12 col-lg-4",
        'labels' => $labels,
        'data' => $data2,
    ])

    {{-- Préparation du tableau --}}
    <div class="col-12 col-lg-4">
        @include('components.tables.table-stats-imp_exp',[
            'nature' => "Export",
            'data' => $destinations,
        ])
    </div>

</div>
