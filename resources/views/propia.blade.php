@extends('plantilla')

@section('titulo', "Laravel Propio")

@section('contenido')
    <h1>{{__('Welcome')}} a Laravel.</h1>
    @foreach ($nombres as $persona)
        <p>{{__('Welcome')}}: {{$persona."."}}</p>
    @endforeach
    @foreach ($apellidos as $apellido)
        <p>Tus apellidos son: {{$apellido.'.'}}</p>
    @endforeach
@endsection
