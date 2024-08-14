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


    {{-- map --}}

    <div class="container">

        <form action="{{route('farms.store')}}" method="POST">

            @csrf

            <div id="map" style="height: 600px"></div>
            <br>
            <div>
                <label>The layer To Be Stored:</label>
                <input id="polygon" type="text" class="form-control" name="polygon" value="{{request('polygon')}}">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
    </div>
    </form>


    {{-- map script --}}

    <script>
        ///Setting the center of the map
        var center = [7.2906, 80.6337];
        // Create the map
        var map = L.map('map').setView(center, 10);
        // Set up the Open Street Map layer
        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
                maxZoom: 18
            }).addTo(map);
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            position: 'topright',
            draw: {
                polygon: {
                    shapeOptions: {
                        color: 'purple' //polygons being drawn will be purple color
                    },
                    allowIntersection: false,
                    drawError: {
                        color: 'orange',
                        timeout: 1000
                    },
                    showArea: true, //the area of the polygon will be displayed as it is drawn.
                    metric: false,
                    repeatMode: true
                },
                polyline: {
                    shapeOptions: {
                        color: 'red'
                    },
                },
                circlemarker: false, //circlemarker type has been disabled.
                rect: {
                    shapeOptions: {
                        color: 'green'
                    },
                },
                circle: false,
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);
        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;
            drawnItems.addLayer(layer);
            $('#polygon').val(JSON.stringify(layer.toGeoJSON()));
        });
    </script>


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


{{-- map --}}
<script>
    ///Setting the center of the map
    var center = [7.2906, 80.6337];
    // Create the map
    var map = L.map('map').setView(center, 10);
    // Set up the Open Street Map layer
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);
    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
        position: 'topright',
        draw: {
            polygon: {
                shapeOptions: {
                    color: 'purple' //polygons being drawn will be purple color
                },
                allowIntersection: false,
                drawError: {
                    color: 'orange',
                    timeout: 1000
                },
                showArea: true, //the area of the polygon will be displayed as it is drawn.
                metric: false,
                repeatMode: true
            },
            polyline: {
                shapeOptions: {
                    color: 'red'
                },
            },
            circlemarker: false, //circlemarker type has been disabled.
            rect: {
                shapeOptions: {
                    color: 'green'
                },
            },
            circle: false,
        },
        edit: {
            featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);
    map.on('draw:created', function(e) {
        var type = e.layerType,
            layer = e.layer;
        drawnItems.addLayer(layer);
        $('#polygon').val(JSON.stringify(layer.toGeoJSON())); //saving the layer to the input field using jQuery
    });
</script>
    @endsection
