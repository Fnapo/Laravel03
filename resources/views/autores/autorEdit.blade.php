@extends('plantilla')

@section('titulo')
Autores | {{$autor->getNombreApellidos()}}
@endsection

@section('contenido')
<div>
    <h1 class="texto-hc">Modificando un autor</h1>
    <br />
    <form method="POST" action="{{route('autores.update', $autor)}}">
        @method('PUT')
        @include('autores/parciales/autorTomarDatos')
    </form>
</div>
@endsection
