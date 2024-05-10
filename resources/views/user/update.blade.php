@extends('layouts.navbar')
@section('nombre', 'Usuario')
@section('titulo', 'Crear Nuevos Usuarios')
@section('contenido')


<div class="boddy-create mx-auto">
    <div class="container-create">
        <h1 class="h1-create">Editar Usuario</h1>

            @if(session('error'))
                <div class="error-message" style="color:red">{{ session('error') }}</div>
            @endif
        <form action="{{ route('u.user') }}" method="POST">
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
            <label class="label-create" for="nombre">Profesion:</label>
            <input type="text" id="profesion" name="profesion" value="{{$datos->profesion}}" required>
        </div>

        <div class="input-container-create">
            <label class="label-create" for="nombre">contraseña:</label>
            <input type="password" id="password" name="password"  required>
        </div>
  

        
        <div class="input-container-create">
            <label class="label-create"  for="mensaje">Direccion:</label>
            <textarea id="direccion" name="direccion" rows="4"  required>{{$datos->direccion}}</textarea>
        </div>

        <div class="input-container-create">
            <label class="label-create"  for="email">Sueldo:</label>
            <input type="number" id="sueldo" name="sueldo" step="0.01" min="0" value="{{$datos->monto}}"  required>
        </div>

        <div class="input-container-create">
            <label class="label-create" for="nombre" >Rol:</label>
                <select id="rol" name="rol" class="custom-select" value="{{$datos->rol}}">
                <option value="1">Administrador</option>
                <option value="2">Encargado</option>
                <option value="3">Cajero</option>
            </select>
        </div>    

        <div class="input-container-create">
            <label class="label-create" for="nombre" >Horario:</label>
            <select id="horario" name="horario" class="custom-select" value="{{$datos->id_horario}}">
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