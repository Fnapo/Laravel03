@extends('plantilla')

@section('titulo', 'Roles')

@section('contenido')
<div>
    <?php $vacio = "Sin roles para mostrar"; ?>
    <h1 class="texto-hc">Roles</h1>
    <br />
    @auth
    <div class="texto-hc">
        <button class="caja-boton bordes-2">
            <a class="boton-normal" href="{{route('roles.create')}}">{{'Crear un Role'}}</a>
        </button>
    </div>
    <br />
    @endauth
    @isset($roles)
    <div class="centraTabla">
        <table class="tabla tabla-i-b colapsada">
            <thead>
                <tr>
                    <th class="celda">{{'Clave del Role'}}</th>
                    <th class="celda"> {{'Acciones'}} </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td class="celda">
                        {{$role->key}}
                    </td>
                    </td>
                    <td class="celda">
                        <button type="button" class="caja-boton bordes-2">
                            <a class="boton-normal" href="{{route('roles.show', $role->id)}}">{{'Detalles'}}</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
        <div class="texto-hc">{{$roles->links()}}</div>
    </div>
    @else
    <!-- del isset -->
    <h2>
        {{$vacio}}
    </h2>
    @endisset
</div>
@endsection
