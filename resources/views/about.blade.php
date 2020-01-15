@extends('plantilla')

@section('titulo', __('About'))
{{-- Equivalente a @lang('About'), pero para la sección meta. --}}

@section('contenido')
<h1 class="texto-hc">@lang('About')</h1>
<br />
@endsection
