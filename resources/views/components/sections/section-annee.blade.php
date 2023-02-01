<div class="row">
    @php
        $abscisses = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
        $months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $data[0]['label'] = "Montant des Exportations";
        $data[1]['label'] = "Nombre d'Exportations" ;
        $data[2]['label'] = "Montant des Importations";
        $data[3]['label'] = "Nombre d'Importations";
        // dd($archivesGlobales);
        foreach ($months as $key => $month) {
            $value0 = $archivesGlobales
                ->where('natureOperation','Export')
                ->where('month',$month)->pluck('somme')->first();
            $data[0]['ordonnees'][] = $value0??0;

            $value1 = $archivesGlobales
                ->where('natureOperation','Export')
                ->where('month',$month)->pluck('nombre')->first();
            $data[1]['ordonnees'][] = $value1??0;

            $value2 = $archivesGlobales
                ->where('natureOperation','Import')
                ->where('month',$month)->pluck('somme')->first();
            $data[2]['ordonnees'][] = $value2??0;

            $value3 = $archivesGlobales
                ->where('natureOperation','Import')
                ->where('month',$month)->pluck('nombre')->first();
            $data[3]['ordonnees'][] = $value3??0;
        }
        // dd($data);
    @endphp
    @include('components.chartjs.graph',[
        'id' => 'graphe1',
        'titre' => "Graphe des opérations par mois",
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
        @include('components.tables.table-stats-annee',[
            'data' => $archivesGlobales,
            'col0' => $abscisses,
        ])
    </div>

</div>
