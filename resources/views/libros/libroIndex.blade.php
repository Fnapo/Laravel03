@extends('plantilla')

@section('titulo', 'Libros')

@section('contenido')
<div>
    <?php $vacio = "Sin libros para mostrar"; ?>
    <h1 class="texto-hc">{{'Libros'}}</h1>
    <br />
    <div class="texto-hc">
        <button class="caja-boton bordes-2">
            <a class="boton-normal" href="{{route('libros.create')}}">{{'Adquirir un libro'}}</a>
        </button>
    </div>
    <br />
    @isset($libros)
    <div class="centraTabla">
        @if ($libros->count() > 0)
        <table class="tabla tabla-i-b colapsada">
            <thead>
                <tr>
                    <th class="celda">{{'Título del libro'}}</th>
                    <th class="celda"> {{'Acciones'}} </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                <tr>
                    <td class="celda">
                        {{$libro->titulo}}
                    </td>
                    <td class="celda">
                        <button type="button" class="caja-boton bordes-2">
                            <a class="boton-normal" href="{{route('libros.show', $libro)}}">{{'Detalles'}}</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
        <div class="texto-hc">{{$libros->links()}}</div>
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
