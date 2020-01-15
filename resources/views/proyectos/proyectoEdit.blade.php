@extends('plantilla')

@section('titulo')
Proyectos | Editar un proyecto
@endsection

@section('content')
<div>
    <h1 class="texto-hc">Editando un proyecto</h1>
    <br />
    <form method="POST" action="{{route('proyectos.update', $proyecto->id)}}">
        @method('PATCH')
        <!-- Crea un campo oculto con el method PUTCH -->
        @include('proyectos/parciales/proyectoTomarDatos')
    </form>
</div>
@endsection
