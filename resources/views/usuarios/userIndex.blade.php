@extends('plantilla')

@section('titulo')
@lang('Users')
@endsection

@section('contenido')
<div>
    <?php $vacio = "Sin usuarios para mostrar"; ?>
    <h1 class="texto-hc">{{__('Users')}}</h1>
    <br />
    @auth
    <div class="texto-hc">
        <button class="caja-boton bordes-2">
            <a class="boton-normal" href="{{route('usuarios.create')}}">{{'Crear un usuario'}}</a>
        </button>
    </div>
    <br />
    @endauth
    @isset($usuarios)
    <div class="centraTabla">
        <table class="tabla tabla-i-b colapsada">
            <thead>
                <tr>
                    <th class="celda">{{'Nombre del Usuario'}}</th>
                    <th class="celda"> {{'Acciones'}} </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td class="celda">
                        {{$usuario->name}}
                    </td>
                    <td class="celda">
                        <button type="button" class="caja-boton bordes-2">
                            <a class="boton-normal" href="{{route('usuarios.show', $usuario->id)}}">{{'Detalles'}}</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
        <div class="texto-hc">{{$usuarios->links()}}</div>
    </div>
    @else
    <!-- del isset -->
    <h2>
        {{$vacio}}
    </h2>
    @endisset
</div>
@endsection
