<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Proceso Electoral') }}</title>

    <!-- incluir material -->
    @include('partials.materialcss')
    @include('partials.materialjs')
</head>
<body class="#ffffff white">
    <div id="app">
        <div class="navbar-fixed">

        <nav class="blue accent-3">
            <div class="nav-wrapper">
                <div style="text-align: right">
                    <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
                        <ul class="right hide-on-med-and-down">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                    <li>
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                    </li>
                                    @endif
                                    <!--
                                    @if (Route::has('register'))
                                    <li>
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif    
                                    -->                              
                                @else
                                    <li><a href="{{ route('home') }}" class="waves-effect waves-teal">Home</a></li>
                                    <li><a href="{{ route('casillas.index') }}" class="waves-effect waves-teal">Casillas</a></li>
                                    <li>
                                        <a onclick="M.toast({html: 'Tu sesión esta Activa'})">
                                            <span>Bienvenido: </span> {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                        </ul>
                </div>
            </div>
        </nav>       

        </div> 

        <ul class="sidenav" id="menu-responsive">

            <!-- Authentication Links -->
            @guest
                <li>
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                </li>
            <!--    
            @if (Route::has('register'))
                <li>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
             -->
            @else
                <li><a href="{{ route('home') }}" class="waves-effect waves-teal">Home</a></li>
                <li><a href="{{ route('casillas.index') }}" class="waves-effect waves-teal">Casillas</a></li>
                <li>
                    <a onclick="M.toast({html: 'Tu sesión esta Activa'})">
                        <span>Bienvenido</span> {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endguest

        </ul>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
