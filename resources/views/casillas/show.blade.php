@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row"><p>
        <div class="col s10 m10"><p>
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
        <div class="col s1 m1">
            <div class="row">
            <p>
                <div style="text-align: right">
                    <!-- modal trigger -->
                    <a class="btn-floating btn-large waves-effect waves-light green btn modal-trigger" href="#modal1">
                        <i class="large material-icons">add</i>
                    </a><p>
                    <a href="{{ route('casillas.edit', $casillas) }}" class="btn-floating btn-large waves-effect waves-light orange">
                        <i class="material-icons">border_color</i>
                    </a><p>
                    <form method="POST" action="{{ route('casillas.destroy', $casillas) }}">
                        @csrf @method('DELETE')
                        <button class="btn-floating btn-large waves-effect waves-light red" type="submit" name="action">
                            <i class="material-icons">delete_forever</i> 
                        </button>
                    </form>
                </div>
            </div>
        </div>  
    </div>

        <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Ingresa los votos</h4>
            <div class="section">
                <form method="POST" action="{{ route('votos.store') }}">
                    @csrf
                    <div class="input-field col s12 m4">
                        <select class="browser-default" name="id_partido" id="id_partido" required>
                            <option disabled selected>PARTIDO</option>
                                @foreach ($partidos as $fila) {
                                    <option value="{{ $fila->id_partido }}">{{ $fila->nombre }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="input-field col s12 m4">
                        <input placeholder="Introduce el texto" id="con_letra" name="con_letra" type="text" maxlength="30" required>
                        <label for="con_letra">Escriba con letra</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input placeholder="123" id="con_numero" name="con_numero" type="number" maxlength="10" required>
                        <label for="con_numero">Digita con número</label>
                    </div>
                    <input id="id_casilla" name="id_casilla" value="{{ $casillas->id_casilla }}" type="hidden" required>
                    <div class="right-align">
                            <button class="btn waves-effect waves-light btn-large green" type="submit">Agregar</button>
                    </div>
                </form>      
            </div>    
        </div>
    </div>

</div>

@endsection