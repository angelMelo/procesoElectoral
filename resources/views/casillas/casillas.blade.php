@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row"><p>
        <div class="col s10 m11">
            <div class="section">
                <div class="card-panel pink darken-3">
                    <div class="card-content white-text">
                        <h3>Casillas</h3>
                    </div>    
                </div>
            </div>
            <div class="divider"></div>
            @if (session('message'))
                <div>
                    <blockquote>{{ session('message') }}</blockquote>
                </div>
            @endif
            <div class="section">
                @forelse($casillas as $row)
                    <a href="{{ route('casillas.show', $row->id_casilla) }}">
                        <div class="col s12 m4">
                            <div class="card small pink darken-3 hoverable">
                                <div class="card-image">
                                    <img src="/storage/casillasDI1Hk1QKRCylxKHV8RyZ.jpg">
                                </div>
                                <div class="card-content white-text">
                                    <h5>Casilla #{{ $row->num_casilla }}</h5>
                                    <!--<p>Entidad: {{ $row->entidad }}</p>-->
                                    <p>Lugar: {{ $row->lugar }}</p>
                                    <p>Apertura: {{ $row->hora_apertura }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <blockquote><H5>No hay ninguna casilla agregada.</H5></blockquote>   
                @endforelse     
            </div>
            <div class="divider"></div>
            <div class="section">
                <div style="text-align: center">
                    <ul class="pagination">
                        <li>{{ $casillas->links() }}</li>
                    </ul>
                </div>
            </div>
        </div>   
        <div class="col s2 m1">
            <div class="row">
                <p>
                <div style="text-align: right">
                    <a href="{{ route('casillas.create') }}" class="btn-floating btn-large waves-effect waves-light green">
                        <i class="large material-icons">add</i>
                    </a>
                </div>   
            </div>
        </div>  
    </div>

</div>

@endsection