<script>
    const dataprovenances = {
        labels: @json($provenanceLabels),
        datasets: [{
            label: '',
            data: @json($provenanceValues),
            backgroundColor: ['#E52323', "#EB5F1E", "#367BBE", "#F5D822", "#2CB4BA"],
        }]
    };
    const provenanceChart = document.getElementById(@json($id));
    var myChart = new Chart(
        provenanceChart,
        getConfig(dataprovenances, 'Classification par provenance')
    );

    function getConfig(data, title, position = "right") {
        return {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: false,
                        text: title
                    }
                }
            },
        }
    }
    if(@json(isset($id2))){
        const datadestination = {
        labels: @json($destinationLabels),
        datasets: [{
                label: '',
                data: @json($destinationValues),
                backgroundColor: ['#E52323', "#EB5F1E", "#367BBE", "#F5D822", "#2CB4BA"],
                }]
            };
        const destinationChart = document.getElementById(@json($id2));
        var myChart1 = new Chart(
            destinationChart,
            getConfig(datadestination, 'Classification par provenance')
        );
    }
</script>
