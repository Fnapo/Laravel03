@extends('plantilla')

@section('titulo')
Libros | Adquirir un libro
@endsection

@section('contenido')
<div>
    <h1 class="texto-hc">Adquiriendo un libro</h1>
    <br />
    <form method="POST" action="{{route('libros.store')}}">
        @include('libros/parciales/libroTomarDatos')
    </form>
</div>
@endsection
