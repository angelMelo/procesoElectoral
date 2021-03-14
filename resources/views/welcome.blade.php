<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Proceso electoral</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
</head>
<body>
  <nav class="blue accent-3" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Proceso Electoral</a>
      <ul class="right hide-on-med-and-down">
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/home') }}" >Panel de control</a></li>
            @else
                <li><a href="{{ route('login') }}" >Iniciar Sesión</a></li>
                <!--
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" >Register</a></li>
                @endif
                -->
            @endauth
        @endif
      </ul>

      <ul id="nav-mobile" class="sidenav">
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/home') }}" >Panel de control</a></li>
            @else
                <li><a href="{{ route('login') }}" >Iniciar Sesión</a></li>
                <!--
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" >Register</a></li>
                @endif
                -->
            @endauth
        @endif
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center red-text">Empieza ahora</h1>
      <div class="row center">
        <h5 class="header col s12 light">Consulta en tiempo real el proceso de elecciones</h5>
      </div>
      <div class="row center">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}" id="download-button" class="btn-large waves-effect waves-light red">Ir al panel</a>
            @else
                <a href="{{ route('login') }}" id="download-button" class="btn-large waves-effect waves-light red">Empezar</a>
                <!--
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" >Register</a></li>
                @endif
                -->
            @endauth
        @endif
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">En tiempo real</h5>

            <p class="light">Consulta la información a través de graficas en tiempo real.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Multiusuario</h5>

            <p class="light">Deja que tu equipo de trabajo ingrese la información y dedicate a consultar.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Fácil interacción</h5>

            <p class="light">Opciones intuitivas de fácil acceso.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <footer class="page-footer blue accent-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Información</h5>
          <p class="grey-text text-lighten-4">Versión preliminar 1.0.</p>


        </div>
        <div class="col l3 s12">
          <!--
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
          -->
        </div>
        <div class="col l3 s12">
          <!--
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
          -->
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="#">Lemons</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!--<script src="js/init.js"></script>-->

  </body>
</html>
