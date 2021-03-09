@extends('layouts.app')

@section('content')

<div class="row"><p>
        <div class="col s12 m4"></div>
        <div class="col s12 m4"><p>
            <div class="card-panel white">
                <div class="section">
                    <div class="center-align">
                        <h3>Registro</h3>
                    </div>
                </div>

                <div class="divider"></div>

                <div class="section">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="input-field col s12 m12">
                            <input placeholder="Nombre del usuario" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-field col s12 m12">
                            <input placeholder="Correo Electrónico" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-field col s12 m12">
                            <input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-field col s12 m12">
                            <input placeholder="Confirmar contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div style="text-align: center">
                            <button class="btn waves-effect waves-light btn-large pink darken-4" type="submit">Registrar</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
        <div class="col s12 m4"></div>
    </div>

@endsection
