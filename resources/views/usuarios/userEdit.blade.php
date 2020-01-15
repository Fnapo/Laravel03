@extends('plantilla')

@section('titulo')
Usuarios | {{$usuario->name}}
@endsection

@section('contenido')
<div>
    <h1 class="texto-hc">Modificando un Usuario</h1>
    <br />
    <form method="POST" action="{{route('usuarios.update', $usuario)}}">
        @method('PUT')
        @include('usuarios/parciales/usuarioTomarDatos')
    </form>
</div>
@endsection
