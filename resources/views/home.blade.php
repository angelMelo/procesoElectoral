@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row"><p>
        <div class="section">   
            <div class="card-panel pink darken-3">  
                <div class="card-content white-text"> 
                    <h3>Bienvenido</h3>          
                </div>    
            </div> 
        </div>    
    </div>

    <div class="row">
        <div class="col s12 m4">
            <div class="row">
                <div class="col s12 m1"></div>
                <div class="col s12 m10">
                  <a href="{{ route('votos.graph') }}">
                    <div class="card purple darken-3 hoverable">
                        <div class="card-content white-text">
                        <span class="card-title">Graficas</span>
                        <p>Consultar información</p>
                        </div>
                    </div>
                  </a>    
                </div>
                <div class="col s12 m1"></div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="row">
                <div class="col s12 m1"></div>
                <div class="col s12 m10">
                  <a href="{{ route('votos.impugnar') }}">
                    <div class="card cyan darken-3 hoverable">
                        <div class="card-content white-text">
                        <span class="card-title">Impugnar</span>
                        <p>Consultar información</p>
                        </div>
                    </div>
                  </a>  
                </div>
                <div class="col s12 m1"></div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="row">
                <div class="col s12 m1"></div>
                <div class="col s12 m10">
                  <a href="{{ route('casillas.index') }}">
                    <div class="card red darken-3 hoverable">
                        <div class="card-content white-text">
                        <span class="card-title">Casillas</span>
                        <p>Consultar información</p>
                        </div>
                    </div>
                  </a>  
                </div>
                <div class="col s12 m1"></div>
            </div>
        </div>
    </div>

</div>

@endsection
