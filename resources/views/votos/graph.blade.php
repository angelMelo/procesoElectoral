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
</div>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
     var data = google.visualization.arrayToDataTable([
        ['Partido', 'Votos'], 
        @foreach($votos as $row) 
            [ '{{ $row->partido->nombre }}', '{{ $row->con_numero }}' ],
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
</script>

@endsection