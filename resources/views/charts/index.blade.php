
@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container py-5">

    <h1 class="mb-4">Chart Types</h1>

    <div class="mb-4">
        <label for="chartType" class="form-label">Select Chart Type:</label>
        <select id="chartType" onchange="updateChart(this.value)" class="form-select">
            <option value="bar">Bar Chart</option>
            <option value="line">Line Chart</option>
            <option value="pie">Pie Chart</option>
            <option value="doughnut">Doughnut Chart</option>
            <option value="area">Area Chart</option>
            <option value="radar">Radar Chart</option>
            <option value="polarArea">Polar Area Chart</option>
        </select>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <canvas id="myChart"></canvas>
        </div>
    </div>

</div>

<script>
    let myChart;
    const ctx = document.getElementById('myChart').getContext('2d');

    function updateChart(chartType) {

        if (myChart) {
            myChart.destroy();
        }

        $.ajax({
            url: '/get-chart-data/' + chartType,
            type: 'GET',
            dataType: 'json',

            success: function(data) {

                let actualChartType = chartType === 'area' ? 'line' : chartType;

                myChart = new Chart(ctx, {
                    type: actualChartType,
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Sales Data',
                            data: data.data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1,
                            fill: chartType === 'area'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        scales: ['bar', 'line', 'area'].includes(chartType)
                            ? {
                                y: {
                                    beginAtZero: true
                                }
                            }
                            : {}
                    }
                });
            },

            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    $(document).ready(function () {
        updateChart($('#chartType').val());
    });
</script>

@endsection

