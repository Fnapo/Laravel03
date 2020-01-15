<!-- Vista parcial con la navegación -->

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <!-- Insertar un logo -->
    <!-- Puedo cambiar ul y li por div gracias a Bootstrap -->
    <div class="nav nav-pills">
        <div class="nav-item">
            <a class="nav-link {{desActivar('home')}}" href="{{route('home')}}">
                {{config('app.name')}}
            </a>
        </div>
    </div>
    <!-- Botón para expandir la nav en un móvil -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-der" id="navbarSupportedContent">
        <div class="nav nav-pills">
            <!-- Barra horizontal con 'nav'-->
            <!-- Cambia como obtener el nombre de la ruta actual, se hace con \Route::current()->getName()
            o \Route::currentRouteName()
            Route esta definida en \vendor\laravel\...\Route.php como hija de la clase static Facade -->
            <div class="nav-item margen-5">
                <a href="{{route('home')}}" class="nav-link {{desActivar('home')}}">@lang('Home')</a>
            </div>
            <div class="nav-item margen-5">
                <a href="{{route('about')}}" class="nav-link {{desActivar('about')}}">@lang('About')</a>
            </div>
            <div class="nav-item margen-5">
                <a href="{{route('proyectos.index')}}" class="nav-link {{desActivar('proyectos.index')}}">Proyectos</a>
            </div>
            <div class="nav-item margen-5">
                <a href="{{route('contacto')}}" class="nav-link {{desActivar('contacto')}}">@lang('Contact')</a>
            </div>
            @guest
            <div class="nav-item margen-5">
                <a href="{{route('login')}}" class="nav-link {{desActivar('login')}}">@lang('Login')</a>
            </div>
            @else
            <div class="nav-item margen-5 ancho-15 dropdown">
                <div id="my-dropdown" class="nav-link color-azul dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">{{auth()->user()->getNombre()}}</div>
                <div class="nav-pills dropdown-menu" aria-labelledby="my-dropdown">
                    @if (auth()->user()->checkAdmin())
                    <div class="dropdown-item nav-item">
                        <a href="{{route('usuarios.index')}}"
                            class="dropdown-item nav-link {{desActivar('usuarios.index')}}">@lang('Users')</a>
                    </div>
                    <div class="dropdown-item nav-item">
                        <a class="dropdown-item nav-link {{desActivar('roles.index')}}"
                            href="{{route('roles.index')}}">Roles</a>
                    </div>
                    @endif
                    @if (auth()->user()->checkBiblio())
                    {{-- b-dropdown crea automáticamente un menu dop. --}}
                    <div class="dropdown-item nav-item">
                        <a href="{{route('autores.index')}}"
                            class="{{desActivar('autores.index')}} nav-link">{{'Autores'}}</a>
                    </div>
                    <div class="dropdown-item nav-item">
                        <a href="{{route('libros.index')}}"
                            class="{{desActivar('libros.index')}} nav-link">{{'Libros'}}</a>
                    </div>
                    @endif
                    <div class="dropdown-item nav-item">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="nav-link color-azul">
                                @lang('Logout')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endguest
        </div>
    </div>
</nav>
