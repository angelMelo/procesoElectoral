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
                    </div>
                </div>
            </div>
        </div>   
        <div class="col s1 m1">
        <div class="col s1 m1">
            <div class="row">
            <p>
                <div style="text-align: right">
                    <a href="{{ route('votos.create') }}" class="btn-floating btn-large waves-effect waves-light purple">
                        <i class="large material-icons">assessment</i>
                    </a><p>
                    <a href="{{ route('casillas.edit', $casillas) }}" class="btn-floating btn-large waves-effect waves-light green">
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

</div>

@endsection