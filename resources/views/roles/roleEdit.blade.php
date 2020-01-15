@extends('plantilla')

@section('titulo')
Roles | {{$role->key}}
@endsection

@section('contenido')
<div>
    <h1 class="texto-hc">Modificando un Role</h1>
    <br />
    <form method="POST" action="{{route('roles.update', $role)}}">
        @method('PUT')
        @include('roles/parciales/roleTomarDatos')
    </form>
</div>
@endsection
