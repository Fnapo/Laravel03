@extends('plantilla')

@section('titulo')
Autores | Dar de Alta a un Autor
@endsection

@section('contenido')
<div>
    <h1 class="texto-hc">Dando de alta a un autor</h1>
    <br />
    <form method="POST" action="{{route('autores.store')}}">
        @include('autores/parciales/autorTomarDatos')
    </form>
</div>
@endsection
