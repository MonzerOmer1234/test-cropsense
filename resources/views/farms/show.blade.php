
@extends('layouts.app')
@section('content')
<div style="width: 80%; margin: auto; margin-top : 100px">
    <canvas id="lightLineChart"></canvas>
</div>
<div style="width: 80%; margin: auto; margin-top :100px">
    <canvas id="temperatureLineChart"></canvas>
</div>
<div style="width: 80%; margin: auto; margin-top :100px">
    <canvas id="humidityLineChart"></canvas>
</div>
<div style="width: 80%; margin: auto; margin-top :100px">
    <canvas id="tdsLineChart"></canvas>
</div>
<div style="width: 80%; margin: auto; margin-top :100px">
    <canvas id="soilMoistureLineChart"></canvas>
</div>

{{-- light script --}}

<script>
    var ctx = document.getElementById('lightLineChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($lightReads['labels']),
            datasets: [{
                label: 'Light Data',
                data: @json($lightReads['data']),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

{{-- temperature script --}}
<script>
    var ctx = document.getElementById('temperatureLineChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($temperatureReads['labels']),
            datasets: [{
                label: 'Temperature Data',
                data: @json($temperatureReads['data']),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
{{-- humidity sensor script --}}
<script>
    var ctx = document.getElementById('humidityLineChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($humidityReads['labels']),
            datasets: [{
                label: 'Humidity Data',
                data: @json($humidityReads['data']),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
{{-- tds sensor script --}}
<script>
    var ctx = document.getElementById('tdsLineChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($tdsReads['labels']),
            datasets: [{
                label: 'tds Data',
                data: @json($tdsReads['data']),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
{{-- soil Moisture sensor script --}}
<script>
    var ctx = document.getElementById('soilMoistureLineChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($soilMoistureReads['labels']),
            datasets: [{
                label: 'soil Moisture Data',
                data: @json($soilMoistureReads['data']),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>



@endsection
