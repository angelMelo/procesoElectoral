@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row"><p>
        <div class="col s11 m11"><p>
            <div class="row">
                <div class="card-panel white">
                    <div class="section">
                        <h4>Casilla #: {{ $casillas->num_casilla }}</h4>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                        <p><h5>Entidad: {{ $casillas->entidad }}</h5></p>
                        <p><h5>Distrito: {{ $casillas->distrito }}</h5></p>
                        <p><h5>Sección: {{ $casillas->seccion }}</h5></p>
                        <p><h5>Lugar: {{ $casillas->lugar }}</h5></p>
                        <p><h5>Tipo: {{ $casillas->tipo }}</h5></p>
                        <p><h5>Boletas: {{ $casillas->boletas }}</h5></p>
                        <p><h5>Hora de apertura: {{ $casillas->hora_apertura }}</h5></p>
                        <p><h5>Hora de cierre: {{ $casillas->hora_cierre }}</h5></p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($votos as $row)
                    <div class="col s12 m4">
                        <div class="card red darken-4 hoverable">
                            <div class="card-content white-text">
                                <span class="card-title">{{ $row->partido->nombre }}</span>
                                <h5>{{ $row->con_numero }} Votos</h5>
                            </div>
                        </div>
                    </div>   
                @empty
                    <blockquote><H5>No hay ningun voto agregado.</H5></blockquote>      
                @endforelse 
            </div>
        </div>   
        <div class="col s1 m1"></div> 
    </div>
</div>

@endsection