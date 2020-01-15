@extends('plantilla')

@section('titulo', 'Autores')

@section('contenido')
<div>
    <?php
        $vacio="Sin autores para mostrar";
        $desconocido='Desconocido(s)';
    ?>
    <h1 class="texto-hc">{{'Autores'}}</h1>
    <br />
    <div class="texto-hc">
        <button class="caja-boton bordes-2">
            <a class="boton-normal" href="{{route('autores.create')}}">{{'Introducir un autor'}}</a>
        </button>
    </div>
    <br />
    @isset($autores)
    <div class="centraTabla">
        @if ($autores->count() > 0)
        <table class="tabla tabla-i-b colapsada">
            <thead>
                <tr>
                    <th class="celda">{{'Autor'}}</th>
                    <th class="celda"> {{'Acciones'}} </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $autor)
                <tr>
                    <td class="celda">
                        {{$autor->nombre}} {{$autor->apellidos}}
                    </td>
                    <td class="celda">
                        <button type="button" class="caja-boton bordes-2">
                            <a class="boton-normal" href="{{route('autores.show', $autor)}}">{{'Detalles'}}</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
        <div class="texto-hc">{{$autores->links()}}</div>
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
