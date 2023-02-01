<script>
    const data = {
        labels: @json($labels),
        datasets: [
            {
                type: 'line',
                label: @json(isset($line_title_1) ? $line_title_1 : ''),
                data: @json(isset($arrayImport[$line_key_1]) ? $arrayImport[$line_key_1] : ''),
                fill: false,
                borderColor: '#E4032F',
                backgroundColor: 'rgba(52, 152, 219, 0.2)',
                cubicInterpolationMode: 'monotone',
                yAxisID: 'y1',
            },
            {
                type: 'line',
                label: @json(isset($line_title_2) ? $line_title_2 : ''),
                data: @json(isset($arrayExport[$line_key_2]) ? $arrayExport[$line_key_2] : ''),
                fill: false,
                borderColor: 'rgb(255, 159, 64)',
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                cubicInterpolationMode: 'monotone',
                yAxisID: 'y1',
            },
            {

                type: 'bar',
                label: @json(isset($bar_title_1) ? $bar_title_1 : ''),
                data: @json(isset($data[$key_2]) ? $data[$key_2] : ''),
                fill: false,
                borderColor: '#E4032F',
                backgroundColor: 'rgba(52, 152, 219, 0.8)',
                tension: 0.4

            },
            {

                type: 'bar',
                label: @json(isset($bar_title_2) ? $bar_title_2 : ''),
                data: @json(isset($data2[$key_2]) ? $data2[$key_2] : ''),
                fill: false,
                borderColor: '#E4032F',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.4

            }
        ]
    };
    const config = {
        type: 'scatter',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    display: true,
                    title: {
                        display: true,
                        text: @json(isset($line_title) ? $line_title : '')
                    },
                },
                y1: {
                    beginAtZero: true,
                    display: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: @json(isset($bar_title) ? $bar_title :'')
                    },
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: '{{ isset($title) ? $title : 'soldes' }} sur les 12 mois de l\'année'
                },
            },
        }
    };
    const chartEl = document.getElementById(@json(isset($id) ? $id : 'myChart'));

    // chartEl.height = 250;

    var myChart = new Chart(
        chartEl,
        config
    );


    @if (isset($data1))
        const data1 = {
            labels: @json($labels1),
            datasets: [
                {
                type: 'line',
                label: @json(isset($bar_title) ? $bar_title : ''),
                data: @json(isset($data1[$key_1]) ? $data1[$key_1] : ''),
                fill: false,
                borderColor: '#E4032F',
                backgroundColor: 'rgba(52, 152, 219, 0.2)',
                cubicInterpolationMode: 'monotone',
                yAxisID: 'y1',
            },
            {

                type: 'bar',
                label: @json(isset($line_title) ? $line_title : ''),
                data: @json(isset($data1[$key_2]) ? $data1[$key_2] : ''),
                fill: false,
                borderColor: '#E4032F',
                backgroundColor: 'rgba(52, 152, 219, 0.8)',
                tension: 0.4

            }]
        };

        const config1 = {
            type: 'scatter',
            data: data1,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        display: true,
                        title: {
                            display: true,
                            text: @json(isset($line_title) ? $line_title : '')
                        },
                    },
                    y1: {
                        beginAtZero: true,
                        display: true,
                        position: 'right',
                        title: {
                            display: true,
                            text: @json(isset($bar_title) ? $bar_title :'')
                        },
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: '{{ isset($title) ? $title : 'soldes' }} sur les 12 mois de l\'année'
                    },
                },
            }
        };
        const chartEl1 = document.getElementById('myChart2');

        // chartEl1.height = 250;

        var myChart = new Chart(
            chartEl1,
            config1
        );

    @endif
</script>
