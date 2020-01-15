@extends('plantilla')

@section('titulo')
Usuarios | Dar de alta a un Usuario
@endsection

@section('contenido')
<div>
    <h1 class="texto-hc">Dando de alta a un Usuario</h1>
    <br />
    <form method="POST" action="{{route('usuarios.store')}}">
        @include('usuarios/parciales/usuarioTomarDatos')
    </form>
</div>
@endsection
