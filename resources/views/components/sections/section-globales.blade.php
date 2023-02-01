<div class="row">
    @php
        $id = $id??'graphe1';
        $abscisses = $archivesGlobales->unique('year')->pluck('year')->toArray();
        $data[0]['label'] = 'Montant des Exportations';
        $data[0]['ordonnees'] = [];
        $data[1]['label'] = 'Nombre d\'Exportations';
        $data[1]['ordonnees'] = [];
        $data[2]['label'] = 'Montant des Importations';
        $data[2]['ordonnees'] = [];
        $data[3]['label'] = 'Nombre d\'Importations';
        $data[3]['ordonnees'] = [];
        // dd($archivesGlobales);
        foreach ($abscisses as $key => $abscisse) {
            $value0 = $archivesGlobales
                ->where('natureOperation','Export')
                ->where('year',$abscisse)->pluck('somme')->first();
            $data[0]['ordonnees'][] = $value0??0;

            $value1 = $archivesGlobales
                ->where('natureOperation','Export')
                ->where('year',$abscisse)->pluck('nombre')->first();
            $data[1]['ordonnees'][] = $value1??0;

            $value2 = $archivesGlobales
                ->where('natureOperation','Import')
                ->where('year',$abscisse)->pluck('somme')->first();
            $data[2]['ordonnees'][] = $value2??0;

            $value3 = $archivesGlobales
                ->where('natureOperation','Import')
                ->where('year',$abscisse)->pluck('nombre')->first();
            $data[3]['ordonnees'][] = $value3??0;
        }
    @endphp
    @include('components.chartjs.graph',[
        'id' => $id,
        'titre' => "Graphe des Opérations par année",
        'soustitre' => false,
        'class' => "col-12 col-lg-7",
        'abscisses' => $abscisses,
        'data' => $data,
        'type_graph' => ['bar','line','bar','line'],
        'yAxes_nbr' => 2,
        'yAxes' => ['y0','y1','y0','y1'],
    ])


    {{-- Préparation du tableau --}}
    <div class="col-12 col-lg-5">
        @include('components.tables.table-stats-globales',[
            'data' => $archivesGlobales,
            'col0' => $abscisses,
        ])
    </div>

</div>
