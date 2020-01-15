@extends('plantilla')

@section('titulo', $role->key)

@section('contenido')
<div>
    <?php
        $vacio="Sin role para mostrar";
    ?>
    <h1 class="texto-hc">{{$role->key}}</h1>
    <br />
    @isset($role)
    <div class="centraTabla">
        <table class="tabla tabla-i-b colapsada">
            <thead>
                <tr>
                    <th class="celda">{{'Clave del Role'}}</th>
                    <th class="celda">{{'Función'}}</th>
                    <th class="celda">{{'Descripción'}}</th>
                    <th class="celda" colspan="2">
                        {{'Acciones'}}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="celda">
                        {{$role->key}}
                    </td>
                    <td class="celda">
                        {{$role->funcion}}
                    </td>
                    <td class="celda">
                        {{$role->descripcion ?? 'Sin descripción'}}
                    </td>
                    <td class="celda">
                        <button type="button" class="caja-boton bordes-2">
                            <a class="boton-normal" href="{{route('roles.edit', $role)}}">{{'Editar'}}</a>
                        </button>
                    </td>
                    <td class="celda">
                        <form method="POST" action="{{route('roles.destroy', $role)}}">
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
    @else
    <!-- del isset -->
    <h2>
        {{$vacio}}
    </h2>
    @endisset
</div>
@endsection
