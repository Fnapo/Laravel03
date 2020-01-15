@extends('plantilla')

@section('titulo', $libro->titulo)

@section('contenido')
<div>
    <h1 class="texto-hc">{{$libro->titulo}}</h1>
    <br />
    <div class="centraTabla">
        <table class="tabla tabla-i-b colapsada">
            <thead>
                <tr>
                    <th class="celda" rowspan="2">{{'Título del libro'}}</th>
                    <th class="celda" colspan="2">{{'Ejemplares'}}</th>
                    <th class="celda" rowspan="2" colspan="1">{{'Autor(es)'}}</th>
                    <th class="celda" colspan="2" rowspan="2">
                        {{'Acciones'}}
                    </th>
                </tr>
                <tr>
                    <th class="celda">{{'Obtenidos'}}</th>
                    <th class="celda">{{'Disponibles'}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="celda">
                        {{$libro->titulo}}
                    </td>
                    <td class="celda">
                        {{$libro->obtenidos}}
                    </td>
                    <td class="celda">
                        {{$libro->disponibles}}
                    </td>
                    <td class="celda texto-hr">
                        <ul class="pad-0 margen-0 sin-estilo">
                            @forelse ($libro->autores as $autor)
                            <li>
                                <form method="POST" action="{{route('autorlibro.destroy', [$autor, $libro])}}">
                                    @csrf
                                    @method("DELETE")
                                    <a href="{{route('autores.show', $autor)}}">
                                        {{$autor->getNombreApellidos()}}</a>
                                    <input type="submit" class="boton-peligro pad-4" value="Desligar">
                                </form>
                            </li>
                            @empty
                            <li style="list-style-type:none">{{App\Modelos\Autor::anonimo()}}</li>
                            @endforelse
                        </ul>
                    </td>
                    <td class="celda">
                        <button type="button" class="caja-boton bordes-2">
                            <a class="boton-normal" href="{{route('libros.edit', $libro)}}">{{'Editar'}}</a>
                        </button>
                    </td>
                    <td class="celda">
                        <form method="POST" action="{{route('libros.destroy', $libro)}}">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="boton-peligro pad-4" value="Borrar">
                        </form>
                    </td>
                </tr>
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
</div>
@endsection
