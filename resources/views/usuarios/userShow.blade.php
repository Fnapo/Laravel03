@extends('plantilla')

@section('titulo', $usuario->name)

@section('contenido')
<div>
    <?php
        $vacio="Sin usuario para mostrar";
    ?>
    <h1 class="texto-hc">{{$usuario->name}}</h1>
    <br />
    @isset($usuario)
    <div class="centraTabla">
        <table class="tabla tabla-i-b colapsada">
            <thead>
                <tr>
                    <th class="celda">{{'Nombre del Usuario'}}</th>
                    <th class="celda">{{'Email'}}</th>
                    <th class="celda">{{'Password'}}</th>
                    <th class="celda">{{'Role'}}</th>
                    <th class="celda">{{'Función'}}</th>
                    <th class="celda" colspan="2">
                        {{'Acciones'}}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="celda">
                        {{$usuario->name}}
                    </td>
                    <td class="celda">
                        {{$usuario->email}}
                    </td>
                    <td class="celda">
                        {{decrypt($usuario->bcifrado)}}
                    </td>
                    <td class="celda">
                        <a href="{{route('roles.show', $usuario->role)}}">{{$usuario->role->key}}</a>
                    </td>
                    <td class="celda">
                        <button type="button" class="caja-boton bordes-2">
                            <a class="boton-normal" href="{{route('usuarios.edit', $usuario->id)}}">{{'Editar'}}</a>
                        </button>
                    </td>
                    <td class="celda">
                        <form method="POST" action="{{route('usuarios.destroy', $usuario->id)}}">
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
