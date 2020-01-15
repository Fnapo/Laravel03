@extends('plantilla')

@section('titulo')
Libros | {{$libro['titulo']}}
@endsection

@section('contenido')
<div>
    <h1 class="texto-hc">Modificando un libro</h1>
    <br />
    <form method="POST" action="{{route('libros.update', $libro)}}">
        @method('PUT')
        @include('libros/parciales/libroTomarDatos')
    </form>
</div>
@endsection
