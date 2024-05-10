@extends('layouts.navbar')
@section('nombre', 'Usuario')
@section('titulo', 'Usuarios')
@section('contenido')

<div class="container">
    <!-- Botón Nuevo --> 
    @if(session('Correcto'))
                <div class="error-message" style="color:green">{{ session('Correcto') }}</div>
    @endif
    <div class="right-align">
        <a href="{{ route('ic.user') }}" class="new-button">Nuevo Usuario</a>      
    </div>

    
   
    <!-- Tu tabla aquí -->
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center">Id</th>           
            <th class="text-center">Nombres</th>  
            <th class="text-center">Correo</th>  
            <th class="text-center">Teléfono</th>  
            <th class="text-center">Sueldo</th>
            <th class="text-center">Rol</th>
            <th class="text-center">Estado</th>                                     
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($datos as $dato) : ?>
            <tr>
              <td><?=  $dato['id'] ?></td>
              <td><?=  $dato['nombre'] ?></td>
              <td><?=  $dato['email'] ?></td> 
              <td><?=  $dato['telefono'] ?></td> 
              <td><?=  $dato['monto'] ?></td> 
              <td>
                  <?php
                  switch ($dato['rol']) {
                      case 1:
                          echo 'Administrador';
                          break;
                      case 2:
                          echo 'Encargado';
                          break;
                      case 3:
                          echo 'Cajero';
                          break;
                      default:
                          echo 'Desconocido';
                          break;
                  }
                  ?>
              </td>
              <td><?= $dato['id_estado'] == 1 ? 'Activo' : 'Inactivo' ?></td>

                                                       
              <td>    
                <a id="btnEditar" href="{{ route('iu.user', ['id' => $dato->id]) }}" title="Editar" class="btn btn-success">
                    <i class="fa fa-edit"></i>
                </a>

                <a id="btnEliminar" href="{{ route('d.user', ['id' => $dato->id]) }}" title="Eliminar" class="btn btn-danger">
                  Eliminar
                </a>
                
         


                
              </td>
            </tr>
          <?php endforeach ?>                         
        </tbody>
      </table>
    </div>
  </div>




@endsection