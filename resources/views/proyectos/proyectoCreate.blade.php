@extends('plantilla')

@section('titulo')
Proyectos | Crear un proyecto
@endsection

@section('content')
<div>
    <h1 class="texto-hc">Creando un proyecto</h1>
    <br />
    <form method="POST" action="{{route('proyectos.store')}}">
        @include('proyectos/parciales/proyectoTomarDatos')
    </form>
</div>
@endsection
