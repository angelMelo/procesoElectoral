@extends('layouts.app')

@include('partials.googlecharts')

@section('content')

<div class="container">
    <div class="row">
        <h3>Test grafica desde base de datos</h3>
    </div>

    <div class="row">
        <div id="chart_div"></div>
    </div>

    <div class="row">
        <div id="chart_div_candidatos"></div>
    </div>

</div>

<script type="text/javascript">
    var $votosj = @json($votos);
    console.log(
        @json($candidatos)
    );
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChartCandidato);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Partido', 'Votos'], 
            @foreach($votos as $row) 
                [ '{{ $row->partido->nombre }}', parseInt('{{ $row->con_numero }}') ],
            @endforeach 
        ]);

        var options = {
            title: 'Detalles de los votos',
            hAxis: {title: 'Votos', titleTextStyle: {color: 'green'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);

        function resizeHandler () {
            chart.draw(data, options);
        }
        if (window.addEventListener) {
            window.addEventListener('resize', resizeHandler, false);
        }
        else if (window.attachEvent) {
            window.attachEvent('onresize', resizeHandler);
        }
    }

    function drawChartCandidato() {
        var data = google.visualization.arrayToDataTable([
            ['Candidato', 'Votos'], 
            @foreach($candidatos as $row) 
                [ '{{ $row->nombre }}', parseInt('{{ $row->suma }}') ],
            @endforeach 
        ]);
        
        var options = {
            title: 'Detalles de los votos de candidatos'
            // hAxis: {title: 'Votos', titleTextStyle: {color: 'green'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_candidatos'));
        chart.draw(data, options);

        function resizeHandler () {
            chart.draw(data, options);
        }
        if (window.addEventListener) {
            window.addEventListener('resize', resizeHandler, false);
        }
        else if (window.attachEvent) {
            window.attachEvent('onresize', resizeHandler);
        }


    }

</script>

@endsection