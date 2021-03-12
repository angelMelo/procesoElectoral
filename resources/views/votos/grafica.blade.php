@extends('layouts.app')

@include('partials.googlecharts')

@section('content')

<!-- crear contenido -->
<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawAxisTickColors);
    function drawAxisTickColors() {
      var data = google.visualization.arrayToDataTable([
        ['City', 'PAN', 'PRI'],
        ['New York City, NY', 8175000, 8008000],
        ['Los Angeles, CA', 3792000, 3694000],
        ['Chicago, IL', 2695000, 2896000],
        ['Houston, TX', 2099000, 1953000],
        ['Philadelphia, PA', 1526000, 1517000]
      ]);

      var options = {
        title: 'Votación',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total de votos',
          minValue: 0,
          textStyle: {
            bold: true,
            fontSize: 12,
            color: '#4d4d4d'
          },
          titleTextStyle: {
            bold: true,
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: 'Municipio',
          textStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          }
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

// tabla 2
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
      var data = google.visualization.arrayToDataTable([
        ['City', 'PRI', 'PAN', {type: 'string', role: 'annotation'}],
        ['New York City, NY', 8175000, 8008000, 'Deterninante'],
        ['Los Angeles, CA', 3792000, 3694000 ,'Sin determinante'],
        ['Chicago, IL', 2695000, 2896000 ,'Determinante'],
        ['Houston, TX', 2099000, 1953000, 'Sin determinante'],
        ['Philadelphia, PA', 1526000, 1517000, 'Determinante']
      ]);

      var options = {
        title: 'Votación de la entidad',
        chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'Total de votos',
          minValue: 0,
        },
        vAxis: {
          title: 'Municipios'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div_2'));
      chart.draw(data, options);
    }

</script>

<h1 style="text-align:center">Votación </h1>
<!-- {{$resultado}} -->

<div id="chart_div"></div>
<div id="chart_div_2"></div>

@endsection
