<div class="row">
    @php
        $labels = $provenances->pluck('provenance')->toArray();
        $data1[0]['label'] = 'Répartatition';
        $data1[0]['values'] = $provenances->pluck('somme')->toArray();
        $data2[0]['label'] = 'Répartatition';
        $data2[0]['values'] = $provenances->pluck('nombre')->toArray();
    @endphp
    @include('components.chartjs.doughnut',[
        'id' => 'd1',
        'titre' => "Répartition des provenances par montant",
        'soustitre' => false,
        'class' => "col-12 col-lg-4",
        'labels' => $labels,
        'data' => $data1,
    ])

    @include('components.chartjs.doughnut',[
        'id' => 'd2',
        'titre' => "Répartion des provenances par nombre d'importation",
        'soustitre' => false,
        'class' => "col-12 col-lg-4",
        'labels' => $labels,
        'data' => $data2,
    ])

    {{-- Préparation du tableau --}}
    <div class="col-12 col-lg-4">
        @include('components.tables.table-stats-imp_exp',[
            'data' => $provenances,
        ])
    </div>

</div>
