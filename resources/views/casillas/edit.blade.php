@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row"><p>
        <div class="card-panel white">

            <div class="row">
                <div class="section">
                    <h3>Actualiza los datos de la casilla</h3>
                </div>
                <div class="divider"></div>

                <div class="section">
                    <form method="POST" action="{{ route('casillas.update', $result) }}">
                        @csrf @method('PATCH')
                        <div class="input-field col s12 m4">
                            <input placeholder="123" id="num_casilla" name="num_casilla" type="number" value="{{ $result->num_casilla }}" readonly>
                            <label for="num_casilla">Numero Casilla</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="entidad" name="entidad" type="text" value="{{ $result->entidad }}" readonly>
                            <label for="entidad">Entidad Federativa</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="distrito" name="distrito" type="text" value="{{ $result->distrito }}" readonly>
                            <label for="distrito">Distrito Federal Electoral</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="seccion" name="seccion" type="text" value="{{ $result->seccion }}" readonly>
                            <label for="seccion">Sección</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="lugar" name="lugar" type="text" value="{{ $result->lugar }}" readonly>
                            <label for="lugar">La casilla se instalo en</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="tipo" name="tipo" type="text" value="{{ $result->tipo }}" readonly>
                            <label for="tipo">Tipo de Casilla</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="750" id="boletas" name="boletas" type="number" value="{{ $result->boletas }}" readonly>
                            <label for="boletas">Boletas Recibidas</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input id="hora_apertura" name="hora_apertura" type="time" value="{{ $result->hora_apertura }}" readonly>
                            <label for="hora_apertura">Hora de Apertura</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input id="hora_cierre" name="hora_cierre" type="time" required>
                            <label for="hora_cierre">Hora de cierre</label>
                        </div>
                        <div class="right-align">
                            <button class="btn waves-effect waves-light btn-large green">Actualizar</button>
                        </div>
                    </form>      
                </div>
            </div>

        </div>
    </div>

</div>

@endsection