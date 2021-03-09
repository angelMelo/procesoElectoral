@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row"><p>
        <div class="card-panel white">

            <div class="row">
                <div class="section">
                    <h3>Agrega una casilla</h3>
                </div>
                <div class="divider"></div>

                <div class="section">
                    <form method="POST" action="{{ route('casillas.store') }}">
                        @csrf
                        <div class="input-field col s12 m4">
                            <input placeholder="123" id="num_casilla" name="num_casilla" type="number" maxlength="10" required>
                            <label for="num_casilla">Numero Casilla</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="entidad" name="entidad" type="text" maxlength="30" required>
                            <label for="entidad">Entidad Federativa</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="distrito" name="distrito" type="text" maxlength="30" required>
                            <label for="distrito">Distrito Federal Electoral</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="seccion" name="seccion" type="text" maxlength="30" required>
                            <label for="seccion">Sección</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="lugar" name="lugar" type="text" maxlength="30" required>
                            <label for="lugar">La casilla se instalo en</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="Introduce el texto" id="tipo" name="tipo" type="text" maxlength="30" required>
                            <label for="tipo">Tipo de Casilla</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input placeholder="750" id="boletas" name="boletas" type="number" maxlength="10" required>
                            <label for="boletas">Boletas Recibidas</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input id="hora_apertura" name="hora_apertura" type="time" maxlength="30" required>
                            <label for="hora_apertura">Hora de Apertura</label>
                        </div>
                        <div class="right-align">
                            <button class="btn waves-effect waves-light btn-large green">Agregar</button>
                        </div>
                    </form>      
                </div>
            </div>

        </div>
    </div>

</div>

@endsection