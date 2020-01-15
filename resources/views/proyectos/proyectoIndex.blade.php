@extends('plantilla')

@section('titulo', 'Proyectos')

@section('content')
<!-- Lo cambio a tabla

<ul>
    <li>

    </li>
    <br />
    <li>
    -->

<!--
</li>
<li>
</li>
</ul>
-->
<!-- Para indentar -->
<div>
    <?php $vacio = "Sin proyectos para mostrar"; ?>
    <h1 class="texto-hc">Proyectos</h1>
    <br />
    @auth
    <div class="texto-hc">
        <button class="caja-boton bordes-2">
            <a class="boton-normal" href="{{route('proyectos.create')}}">{{'Crear un proyecto'}}</a>
        </button>
    </div>
    <br />
    @endauth
    @isset($proyectos)
    <div class="centraTabla">
        @if ($proyectos->count() > 0)
        <table class="tabla tabla-i-b colapsada">
            <thead>
                <tr>
                    <th class="celda">{{'Título del proyecto'}}</th>
                    @auth
                    <th class="celda" colspan="2">
                        {{'Acciones'}}
                    </th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                <tr>
                    <td class="celda" title="Haz click para verlo">
                        <a class="color-azul" href="{{route('proyectos.show', $proyecto->id)}}">{{$proyecto->titulo}}</a>
                        <!-- route('nombre', parámetros)-->
                    </td>
                    @auth
                    <td class="celda">
                        <button type="button" class="caja-boton bordes-2">
                            <a class="boton-normal" href="{{route('proyectos.edit', $proyecto->id)}}">{{'Editar'}}</a>
                        </button>
                    </td>
                    <td class="celda">
                        <!-- Para borrar necessito un pequeño form pues se utiliza el 'falso method' delete -->
                        <form method="POST" action="{{route('proyectos.destroy', $proyecto->id)}}">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="boton-peligro pad-4" value="Borrar">
                        </form>
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
        <div class="texto-hc">{{$proyectos->links()}}</div>
        @else
        <h2 class="texto-hc">
            {{$vacio}}
        </h2>
        @endif
    </div>
    @else
    <!-- del isset -->
    <h2 class="texto-hc">
        {{$vacio}}
    </h2>
    @endisset
</div>
@endsection
