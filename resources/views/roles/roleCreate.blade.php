@extends('plantilla')

@section('titulo')
Roles | Crear un Role
@endsection

@section('contenido')
<div>
    <h1 class="texto-hc">Creando un Role</h1>
    <br />
    <form method="POST" action="{{route('roles.store')}}">
        @include('roles/parciales/roleTomarDatos')
    </form>
</div>
@endsection
