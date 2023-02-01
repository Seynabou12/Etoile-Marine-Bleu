@php
    $default_data[0]['label'] =  "Données test 1";
    $default_data[0]['ordonnees'] =  [1,2,3,4,5];
    $default_data[1]['label'] =  "Données test 2";
    $default_data[1]['ordonnees'] =  [4,6,3,2,5];
    $default_couleurs=['black','#28A745','rgba(255, 99, 132, 0.2)','#0156BB'];

    // variables
    $titre = isset($titre)?$titre:'Titre';
    $soustitre = isset($soustitre)?$soustitre:'Texte de soutitre';
    $class = isset($class)?$class:'col-12';
    $abscisses = isset($abscisses)?$abscisses:[1,2,3,4,5];
    $data = isset($data)?$data:$default_data;
    $type_graph = isset($type_graph)?$type_graph:['linear','bar'];
    $yAxes_nbr = isset($yAxes_nbr)?$yAxes_nbr:1;
    $yAxes = isset($yAxes)?$yAxes:[true,true];
    $height = $height??200;
    $couleurs = $couleurs??$default_couleurs;
@endphp

@push('head-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
@endpush

<div class="{{$class}}">
    <div class="card shadow-none stats-graphe bg-white">
        <div class="card-body">
            <h5 class="text-uppercase text-secondary font-weight-bold  mb-2 text-center">
                {{ $titre }}
            </h5>
            <h6 class="mb-2 text-muted text-center">
                {{ $soustitre }}
            </h6>
            <div class="tab-height">
                <canvas id="{{$id}}_myChart"></canvas>
            </div>
        </div>
    </div>
</div>
@push('components-scripts')
    <script>
        const {{$id}}_labels = @json($abscisses) ;
        const {{$id}}_data = {
            labels: {{$id}}_labels,
            datasets: [
                @foreach ($data as $i => $_data)
                    {
                        label: @json($_data["label"]),
                        data:   @json($_data['ordonnees']),
                        cubicInterpolationMode: 'monotone',
                        backgroundColor: [
                            '{{ isset($couleurs[$i])?$couleurs[$i]:"gray" }}',
                        ],
                        borderColor: [
                            '{{ isset($couleurs[$i])?$couleurs[$i]:"gray" }}',
                        ],
                        borderWidth: 3,
                        yAxisID: '{{ $yAxes[$i] }}',
                        type:'{{ $type_graph[$i] }}',
                    },
                @endforeach
            ]
        };
        const {{$id}}_config = {
            data: {{$id}}_data,

            options: {
                plugins:{
                    legend : {
                        position: 'bottom'
                    },
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            userCallback: function(value, index, values) {
                                // when the floored value is the same as the value we have a whole number
                                if (Math.floor(value) === value) {
                                    return value;
                                }
                            },
                        },
                        scaleLabel: { // Titre sur l'axe Y
                            display: true,
                            labelString: "test"
                        }
                    }],
                },

                scales: {
                    @for($i=0;$i<$yAxes_nbr;$i++)
                        y{{$i}}: {
                            type: 'linear',
                            display: true,
                            @if( $i==0 )
                                // alignement à gauche
                                position: 'left',
                            @else
                                // grid line settings
                                grid: {
                                    drawOnChartArea: false, // only want the grid lines for one axis to show up
                                },
                                position: 'right',
                            @endif
                            scaleLabel: { // Titre sur l'axe Y
                                display: true,
                                labelString: "test ordonnée"
                            }
                        },
                    @endfor
                },
            },
        };
        var {{$id}}_chartEl = document.getElementById("{{$id}}_myChart");
        {{$id}}_chartEl.height = {{$height}};
        var {{$id}}_myChart = new Chart(
            {{$id}}_chartEl,
            {{$id}}_config
        );
    </script>
@endpush
