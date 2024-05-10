@extends('layouts.navbar')
@section('nombre', 'Usuario')
@section('titulo', 'Crear Nuevos Usuarios')
@section('contenido')


<div class="boddy-create mx-auto">
    <div class="container-create">
        <h1 class="h1-create">Nuevo Usuario</h1>

            @if(session('error'))
                <div class="error-message" style="color:red">{{ session('error') }}</div>
            @endif
        <form action="{{ route('c.user') }}" method="POST">
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
            <label class="label-create" for="nombre">Profesion:</label>
            <input type="text" id="profesion" name="profesion" required>
        </div>

        <div class="input-container-create">
            <label class="label-create" for="nombre">contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="input-container-create">
            <label class="label-create"  for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        
        <div class="input-container-create">
            <label class="label-create"  for="mensaje">Direccion:</label>
            <textarea id="direccion" name="direccion" rows="4" required></textarea>
        </div>

        <div class="input-container-create">
            <label class="label-create"  for="email">Sueldo:</label>
            <input type="number" id="sueldo" name="sueldo" step="0.01" min="0"  required>
        </div>

        <div class="input-container-create">
            <label class="label-create" for="nombre" >Rol:</label>
                <select id="rol" name="rol" class="custom-select">
                <option value="1">Administrador</option>
                <option value="2">Encargado</option>
                <option value="3">Cajero</option>
            </select>
        </div>    

        <div class="input-container-create">
            <label class="label-create" for="nombre" >Horario:</label>
            <select id="horario" name="horario" class="custom-select">
                @foreach($horarios as $horario)
                    <option value= {{$horario->id}} >{{$horario->entrada}} - {{$horario->salida}} </option>
                @endforeach  
            
            </select>
        </div>


        <button type="submit">Enviar</button>

        </form>
    </div>
</div>    
@endsection