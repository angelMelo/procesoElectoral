@extends('layouts.app')

@section('content')

    <div class="row"><p>
        <div class="col s12 m4"></div>
        <div class="col s12 m4"><p>
            <div class="card-panel white">
                <div class="section">
                    <div class="center-align">
                        <h3>Bienvenido</h3>
                    </div>
                </div>

                <div class="divider"></div>

                <div class="section">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="input-field col s12 m12">
                            <input placeholder="Correo Electronico" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--<label for="usuario">Email</label>-->
                        </div>
                        <div class="input-field col s12 m12">
                            <input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div style="text-align: center">
                            <button class="btn waves-effect waves-light btn-large pink darken-4" type="submit">Iniciar Sesion</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
        <div class="col s12 m4"></div>
    </div>

@endsection
