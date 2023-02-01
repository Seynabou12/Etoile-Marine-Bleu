

<script>

    const data1 = {
        labels: @json($labels),
        datasets: [{
            label: @json(isset($line_title) ? $line_title : '---'),
            backgroundColor: 'rgba(52, 152, 219, 0.8)',
            borderColor: 'rgb(255, 99, 132)',
            data: @json(isset($data[$key_1]) ? $data[$key_1] : ''),
        }]
    };
    const config1 = {
        type: 'bar',
        data: data1,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    display: true,
                    title: {
                        display: true,
                        text: @json(isset($line_title) ? $line_title : 'Nombre de réclamations')
                    },
                },
            }
        }
    };

    const chartEl1 = document.getElementById("myChart2");

    // chartEl1.height = 250;

    var myChart1 = new Chart(
        chartEl1,
        config1
    );
</script>



