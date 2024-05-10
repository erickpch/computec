@extends('layouts.navbar')
@section('nombre', 'Home')
@section('titulo', 'Bienvenido')
@section('contenido')

@if(session('prohibido'))
    <div class="alert alert-danger" role="alert">
        {{ session('prohibido') }}
    </div>
@endif


@endsection