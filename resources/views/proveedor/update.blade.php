@extends('layouts.navbar')
@section('nombre', 'Proveedores')
@section('titulo', 'Crear Nuevos roveedores')
@section('contenido')


<div class="boddy-create mx-auto">
    <div class="container-create">
        <h1 class="h1-create">Editar Proveedor</h1>

            @if(session('error'))
                <div class="error-message" style="color:red">{{ session('error') }}</div>
            @endif
        <form action="{{ route('u.proveedor') }}" method="POST">
        @csrf

        <div class="input-container-create">
            <label class="label-create" for="nombre">Nombre:</label>
            <input type="number" id="id" name="id" value="{{$datos->id}}" hidden required>
            <input type="text" id="nombre" name="nombre" value="{{$datos->nombre}}"required>
        </div>

        
        <div class="input-container-create">
            <label class="label-create" for="nombre">Telefono:</label>
            <input type="number" id="telefono" name="telefono" value="{{$datos->telefono}}" required>
        </div>


        
        <div class="input-container-create">
            <label class="label-create"  for="mensaje">Direccion:</label>
            <textarea id="direccion" name="direccion" rows="4"  required>{{$datos->direccion}}</textarea>
        </div>

      


        <button type="submit">Enviar</button>

        </form>
    </div>
</div>    
@endsection