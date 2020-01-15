@extends('plantilla')

@section('titulo')
Proyectos | {{$proyecto->titulo}}
<!-- Dudo de la utilidad de usar acentos en los campos de la BD -->
@endsection

@section('content')
<div>
    <h1 class="texto-hc">Datos de {{$proyecto->titulo}}</h1>
    <br/>
    <?php
        $vacio='Proyecto vacío.';
        $proyecto=json_decode($proyecto, true); // Pasar JSON a Array.
    ?>
    @isset($proyecto)
    <div class="centraTabla">
        <table class="tabla tabla-i-b">
            <thead>
                <tr>
                    @forelse ($proyecto as $atributo => $valor)
                    <th class="celda">
                        {{$atributo}}
                    </th>
                    @empty
                    <th class="celda">
                        {{$vacio}}
                    </th>
                    @endforelse
                </tr>
            </thead>
            <tbody>
                <tr>
                    @forelse ($proyecto as $valor)
                    <td class="celda">
                        {{$valor}}
                    </td>
                    @empty
                    <td class="celda">
                        {{$vacio}}
                    </td>
                    @endforelse
                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
    @else
    <h2 class="texto-hc">
        {{$vacio}}
    </h2>
    @endisset
</div>
@endsection
