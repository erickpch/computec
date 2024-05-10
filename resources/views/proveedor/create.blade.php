@extends('layouts.navbar')
@section('nombre', 'Proveedor')
@section('titulo', 'Crear Nuevos Proveedores')
@section('contenido')



<div class="boddy-create mx-auto">
    <div class="container-create">
        <h1 class="h1-create">Nuevo Usuario</h1>

            @if(session('error'))
                <div class="error-message" style="color:red">{{ session('error') }}</div>
            @endif
        <form action="{{ route('c.proveedor') }}" method="POST">
        @csrf

        <div class="input-container-create">
            <label class="label-create" for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        
        <div class="input-container-create">
            <label class="label-create" for="nombre">Telefono:</label>
            <input type="number" id="telefono" name="telefono" required>
        </div>

        
        <div class="input-container-create">
            <label class="label-create"  for="mensaje">Direccion:</label>
            <textarea id="direccion" name="direccion" rows="4" required></textarea>
        </div>

        

        <button type="submit">Enviar</button>

        </form>
    </div>
</div>    
@endsection