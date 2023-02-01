@php
    use App\Utils\Couleur;
    // $couleurs = new Couleur();
    $default_data[0]['label'] =  "Données test 1";
    $default_data[0]['values'] =  [1,2,3,4,5];
    $couleurs=['#d62e06','#fa9b10','black'];
    // variables
    $titre = isset($titre)?$titre:'Titre';
    $soustitre = isset($soustitre)?$soustitre:'Texte de soutitre';
    $class = isset($class)?$class:'col-12';
    $labels = isset($labels)?$labels:[1,2,3,4,5];
    $data = isset($data)?$data:$default_data;
    $height = $height??200;
    $couleurs_doughnut = [];
    $couleurs = [];
    for ($i=0; $i < count($data[0]['values']) ; $i++) {
        # code...
        $couleurs[] = Couleur::get($i);
    }
@endphp

@push('head-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
@endpush

<div class="{{$class}}">
    <div class="card shadow-none stats-doughnut bg-white">
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
        const {{$id}}_labels = @json($labels) ;
        const {{$id}}_data = {
            labels: {{$id}}_labels,
            datasets: [
                @foreach ($data as $i => $_data)
                    {
                        label: "{{ $_data['label'] }}",
                        data:   @json($_data['values']),
                        backgroundColor: @json($couleurs),
                    },
                @endforeach
            ]
        };
        const {{$id}}_config = {
            type: 'doughnut',
            data: {{$id}}_data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: false,
                        text: '{{$id}}'
                    }
                }
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
