@section('scriptBottom')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>

    <script>


        const dataRegions = {
            labels: @json($regionLabels),
            datasets: [{
                label: 'Réclamations par région',
                data: @json($regionValues),
                backgroundColor: ['#E52323', "#EB5F1E", "#367BBE", "#F5D822", "#2CB4BA"],
            }]
        };

        const dataSecteurs = {
            labels: Object.values(@json($secteurLabels)),
            datasets: [{
                label: 'Réclamations par secteur',
                data: Object.values(@json($secteurValues)),
                backgroundColor: [
                    '#E52323', 
                    "#EB5F1E",
                    "#EB5F1E40",
                    "#367BBE",
                    "#F5D822",
                    "#367BBE50",
                    '#E5232320', 
                    "#EB5F1E30",
                    "#F5D82280",
                    "#2CB4BA",
                    '#E5232330', 
                    "#2CB4BA60",
                    "#F5D82290",
                    '#E5232340', 
                    '#E5232360',
                    "#EB5F1E80",
                    "#367BBE80",  
                ],
            }]
        };

        const regionChart = document.getElementById("regionChart");
        var myChart = new Chart(
            regionChart,
            getConfig(dataRegions, 'Répartition des réclamations par région')
        );

        const secteurChart = document.getElementById("secteurChart");
        var myChart = new Chart(
            secteurChart,
            getConfig(dataSecteurs, 'Répartition des réclamations par secteur')
        );

        function getConfig(data, title, position = "right") {
            return {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: position,
                        },
                        title: {
                            display: true,
                            text: title
                        }
                    }
                },
            }
        }
    </script>
    {{-- @include('partials.utilities.datatableElement', ['id' => 'datatable']) --}}

@endsection
