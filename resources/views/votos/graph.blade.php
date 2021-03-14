@extends('layouts.app')

@include('partials.googlecharts')

@section('content')

<head>
    <meta name="_token" content="{{csrf_token()}}" />
</head>

<div class="container">
    <div class="row">
        <h3>Consultar información</h3>
    </div>

    <div class="row">
        <div id="chart_div"></div>
    </div>

    <div class="row">
        <div id="chart_div_candidatos"></div>
    </div>

</div>

<!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script> -->
<script type="text/javascript">

$(document).ready(function(){
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChartCandidato);
});

    function votos_candidatos(handleData){
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
        $.ajax({
            url: "{{url('/graphdata')}}",
            type: 'GET',
            success: function (data){
                handleData(data);
            },
            error: function(e){
                console.log(e);
            }
        });
    }
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Partido', 'Votos'], 
            @foreach($votos as $row) 
                [ '{{ $row->nombre }}', parseInt('{{ $row->suma }}') ],
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

        setInterval(() => {
            votos_candidatos(
                function(output){
                    var new_data = output['votos'];
                    var new_data_array = [['Partido', 'Votos']]
                    new_data.forEach(element => new_data_array.push([element.nombre, parseInt(element.suma)]) );
                    var data = google.visualization.arrayToDataTable(
                        new_data_array
                    );
                    chart.draw(data, options);
                }
            );
        }, 4000);


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

        setInterval(() => {
            votos_candidatos(
                function(output){
                    var new_data = output['candidatos'];
                    var new_data_array = [['Candidato', 'Votos']]
                    new_data.forEach(element => new_data_array.push([element.nombre, parseInt(element.suma)]) );
                    var data = google.visualization.arrayToDataTable(
                        new_data_array
                    );
                    chart.draw(data, options);
                }
            );
        }, 4000);


    }

</script>

@endsection