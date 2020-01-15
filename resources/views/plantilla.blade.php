<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Uso de los .css o simplemente'/css/nombre.css' -->
        <link href="@yield('css02', asset('/css/app.css'))" rel="stylesheet" type="text/css">
        <link href="@yield('css01', asset('/css/plantilla.css'))" rel="stylesheet" type="text/css">
        <script src="@yield('script01', asset('/js/app.js'))" defer></script>
        <!-- Fonts y evita el error en app.css -->
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <title>@yield('titulo', "Laravel")</title>
    </head>

    <body>
        <div id="app" class="d-flex flex-column alto-pantalla justify-content-between">
            <!-- Evita el error por el uso de /js/app.js -->
            <!-- Cambia como obtener el nombre de la ruta actual, se hace con \Route::current()->getName()
            o \Route::currentRouteName()
            Route esta definida en \vendor\laravel\...\Route.php como hija de la clase static Facade -->
            <header>
                <h1 class="texto-hc fondo-oliva">Una pequeña aplicación con Laravel ...</h1>
                @include('parciales/nav')
                <!-- Es idéntico a include('parciales.nav') -->
                <!-- También vale ('./parciales/nav'), con ./ es un poco más engorroso la visión del link, pero siempre sin .blade.php -->
                @include('parciales/estado-sesion')
            </header>
            <main>
                @yield('contenido', '')
                @yield('content', '')
                <!-- Cambio por el uso de vistas de Laravel. -->
            </main>
            <footer class="texto-hc fondo-blanco">
                {{config('app.name')}} | Copyright &copy; {{date('Y')}}
            </footer>
        </div>
    </body>

</html>
